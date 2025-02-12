<?php

namespace App\Livewire\Manager\Vendas;

use Livewire\Component;

use App\Models\Manager\Produtos\Produto;
use App\Models\Manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;
use Carbon\Carbon;
use App\Models\Manager\Produtos\CodigoBarra;
use App\Models\Manager\Vendas\Venda AS VendaModel;
use App\Models\Manager\Vendas\AuxVenda;
use App\Helpers\Swal;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Exception;
use Illuminate\Support\Str;

use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;


class EditVendas extends Component
{
    public $clientes;
    public $produtos;
    public $formasPagamento;
    public $selectedCliente;
    public $selectedFormaPagamento;
    public $selectedPrazoPagamento;
    public $carrinho = [];         // Array que armazena os produtos da compra
    public $total = 0;             // Inicializaçãoo do valor total
    public $searchTerm = '';       // Variável para armazenar o termo de pesquisa
    public $barcode = '';          // Variável para armazenar o código de barras
    public $valorPago = 0;         // Variável que recebe o valor pago pelo cliente
    public $troco = 0;             // Troco a ser calculado
    public $saldoDevedor = 0;
    public $vendaDescricao = '';
    public $statusPagamento = '';
    public $clienteVenda;
    public $vendaId;
    public $statusVenda = 'aberto';
    public $tipoVenda = 'fiado';
    public $produtoUniqueid = '';

    public function mount($vendaId, $clienteId)
    {
        $this->clientes = Cliente::all();                // Recebe todos os clientes cadastrados
        $this->formasPagamento = FormasPagamento::all(); // Recebe todas as formas de pagamento cadastrados
        $this->updateProdutos();                         // Chama o método para carregar todos os produtos inicialmente
        
        $this->clienteVenda = Cliente::find($clienteId);
        $this->vendaId = $vendaId;

        if ($vendaId) {
            $this->editarVenda($vendaId);
        }
    }

    public function updateProdutos()
    {
        $this->produtos = Produto::where('status_produto', 'ativo')
             ->where('descricao_produto', 'like', '%' . $this->searchTerm . '%')
             ->orWhere('id', 'like', '%' . $this->searchTerm . '%')
             ->get();
    }

    public function updatedBarcode()
    {
        $codigoBarra = CodigoBarra::where('codigo', $this->barcode)->first();
        $produto = Produto::where('id', $codigoBarra->produto->id)
                            ->where('status_produto', 'ativo')->first();
        
        if ($produto) {
            $this->adicionarProduto($produto->id); // Chama método para adicionar o produto ao carrinho
            $this->barcode = ''; // Limpa o campo de código de barras após adicionar o produto
        } else {
            session()->flash('message', 'Produto não encontrado.');
            $this->barcode = '';
        }
    }

    public function updatedSearchTerm()
    {
        $this->updateProdutos();
    }

    public function adicionarProduto($produtoId)
    {
        $produto = Produto::find($produtoId);
        
        $this->carrinho[] = [
            'produto'       => $produto,
            'quantidade'    => 1,
            'preco'         => $produto->preco_venda_produto,
            'adicionado_em' => Carbon::now(),
            'uniqueid'      => (string) Str::uuid()
        ];

        $this->atualizarTotal();
    }

    public function atualizarQuantidade($index, $novaQuantidade)
    {
        if ($novaQuantidade > 0) {
            $this->carrinho[$index]['quantidade'] = $novaQuantidade;
            $this->atualizarTotal();
        } else {
            $this->removerProduto($index);
        }
    }

    public function removerProduto($index)
    {
        unset($this->carrinho[$index]);
        $this->carrinho = array_values($this->carrinho); // Reindexa o array
        $this->atualizarTotal();
    }

    public function atualizarTotal()
    {
        $this->total = array_reduce($this->carrinho, function ($total, $item) {
            return $total + ($item['quantidade'] * $item['preco']);
        }, 0);

        $this->calcularTroco(); // Sempre recalcula o troco ao atualizar o total
    }

    public function updatedValorPago($value)
    {
        $this->calcularTroco();
    }

    public function calcularTroco()
    {
        if ($this->valorPago >= $this->total) 
        {
            $this->troco = $this->valorPago - $this->total;
            $this->saldoDevedor = 0;
        } else {
            $this->troco = 0; // Sem troco, pois o valor pago é menor que o total
            $this->saldoDevedor = $this->total - $this->valorPago;
        }
    }

    public function removerDoCarrinho($produtoId, $horarioVenda, $uniqueId)
    {
        // Remove o item do banco de dados
        AuxVenda::where('venda_id', $this->vendaId) // Ajuste conforme necessário
            ->where('produto_id', $produtoId)
            ->where('horario_venda', $horarioVenda)
            ->where('uniqueid', $uniqueId)
            ->delete();

        // Remove o item do array $carrinho
        //$this->carrinho = array_filter($this->carrinho, function ($item) use ($produtoId, $uniqueId) {
        //    return $item['produto']->id != $produtoId && $item['uniqueid'] != $uniqueId;
        //});

        $this->carrinho = array_filter($this->carrinho, function ($item) use ($produtoId, $uniqueId) {
            return !(
                isset($item['produto']->id, $item['uniqueid']) && 
                $item['produto']->id == $produtoId && 
                $item['uniqueid'] == $uniqueId
            );
        });

        $this->atualizarTotal();

        // Atualiza a página no Livewire
        $this->dispatch('swal',
            title: 'Produto removido',
            text: 'O produto foi removido do carrinho!',
            icon: 'success'
        );
    }

    public function salvarVenda()
    {
        // Verifica se o carrinho está vazio
        if (empty($this->carrinho)) {
            return Swal::redirect(
                'warning',
                'Carrinho vazio',
                'Adicione produtos.',
                'vendas.show'
            );
        }

        // Define o status do pagamento
        if ($this->saldoDevedor > 0) {
            $this->statusPagamento = 'devedor';
        } else {
            $this->statusPagamento = 'pago';
        }
        

        $venda = VendaModel::find($this->vendaId); // busca a venda pelo ID

        if ($venda) {
            $venda->update([
                'prazo_encerramento'     => $this->selectedPrazoPagamento,
                'horario_encerramento'   => Carbon::now(),
                'valor_total_venda'      => $this->total,
                'forma_pagamento_id'     => $this->selectedFormaPagamento, // chave estrangeira
                'status_pagamento_venda' => $this->statusPagamento,
                'status_venda'           => $this->statusVenda,
                'valor_receber'          => $this->saldoDevedor,
                'valor_recebido'         => $this->valorPago,
                'valor_troco'            => $this->troco,
                'tipo_venda'             => $this->tipoVenda,
                'observacoes_venda'      => null,
            ]);    

            // Salvar os itens no AuxVenda
            foreach ($this->carrinho as $item) {
                // Verifica se já existe esse produto na venda
                $auxVenda = AuxVenda::where('venda_id', $venda->id)
                    ->where('produto_id', $item['produto']->id)
                    ->where('horario_venda', $item['adicionado_em'])
                    ->where('uniqueid', $item['uniqueid'])
                    ->first();

                if ($auxVenda) {
                    // Atualiza a quantidade e o preço
                    $auxVenda->update([
                        'qtd_produto'   => /*$auxVenda->qtd_produto + */$item['quantidade'],
                        'preco'         => $item['preco'], // Atualiza o preço
                        'horario_venda' => Carbon::now(),
                        'tipo_venda'    => $this->tipoVenda,
                    ]);
                } else {
                    // Cria um novo registro se o produto não existir
                    AuxVenda::create([
                        'venda_id'      => $venda->id,
                        'produto_id'    => $item['produto']->id,
                        'cliente_id'    => $venda->cliente->id,
                        'qtd_produto'   => $item['quantidade'],
                        'preco'         => $item['preco'],
                        'horario_venda' => Carbon::now(),
                        'tipo_venda'    => $this->tipoVenda,
                        'uniqueid'      => (string) Str::uuid()
                    ]);
                }
            }
            $this->atualizarTotal();
            return $this->dispatch('swal',
                title: 'Venda salva',
                text: 'A venda foi salva corretamente!',
                icon: 'success'
            );
        } else {
            return Swal::redirect(
                'error',
                'Venda não encontrada',
                'Não encontramos a venda para atualizar! Contate o administrador do sistema.',
                'listagem.show'
            );
        }
    }

    /**
     * Método utilizado para finalizar a venda, atualizando as informações no banco de dados
     */
    public function finalizarVenda()
    {
        if (empty($this->carrinho)) {
            return Swal::redirect(
                'warning',
                'Carrinho vazio',
                'Adicione produtos antes de finalizar a venda.',
                'vendas.show'
            );
        }
    
        $this->validate([
            'carrinho'  => 'required',
            'valorPago' => 'required'
        ]);

        $this->statusVenda = 'finalizada';

        // Tenta salvar a venda
        $venda = $this->salvarVenda();

        if (!$venda) {
            return Swal::redirect(
                'error',
                'Erro ao finalizar a venda',
                'Tente novamente mais tarde.',
                'vendas.show'
            );
        }

        // Limpa o carrinho após finalizar a venda
        $this->reset(['carrinho', 'total', 'valorPago', 'troco', 'selectedCliente', 'selectedFormaPagamento']);
    
        //$this->imprimir($venda->id);

        $this->saldoDevedor = 0;

        return Swal::redirect(
            'success',
            'Venda finalizada',
            '',
            'listagem.show'
        );
    }

    public $modoEdicao = false;

    public function editarVenda($vendaId)
    {
        // Recupera a venda pelo ID
        $venda = VendaModel::with(['cliente', 'auxVendas.produto'])->where('id', $vendaId)->first();

        if (!$venda) {
            return Swal::redirect(
                'error',
                'Venda não encontrada',
                'Não foi possível localizar a venda.',
                'vendas.show'
            );
        }

        // Carrega os dados da venda para o componente
        $this->selectedCliente = $this->clienteVenda;
        $this->selectedFormaPagamento = $venda->forma_pagamento->id;
        $this->selectedPrazoPagamento = $venda->prazo_encerramento;
        $this->valorPago = $venda->valor_recebido;
        $this->troco = $venda->valor_troco;
        $this->saldoDevedor = $venda->valor_receber;
        $this->vendaDescricao = $venda->descricao_venda;

        // Carrega os produtos da venda no carrinho
        $this->carrinho = $venda->auxVendas->map(function ($auxVenda) {
            return [
                'produto'       => $auxVenda->produto,
                'quantidade'    => $auxVenda->qtd_produto,
                'preco'         => $auxVenda->preco,
                'adicionado_em' => $auxVenda->horario_venda,
                'uniqueid'      => $auxVenda->uniqueid
            ];
        })->toArray();

        // Atualiza o total do carrinho
        $this->atualizarTotal();

        $this->modoEdicao = true;
    }

    public function imprimir($vendaId)
    {
        // Recupera a venda e os itens da venda
        $venda = VendaModel::with(['cliente', 'auxVendas.produto'])->where('id', $vendaId)->first();

        //dd($venda->auxVendas->pluck('produto'));

        // Tente enviar o cupom para a impressora
        try {
            //$ipImpressora = "192.168.1.100"; // Substitua pelo IP da impressora
            //$porta = 9100; // A maioria das impressoras térmicas usa essa porta

            //$connector = new NetworkPrintConnector($ipImpressora, $porta);

	    // Nome da impressora (pode variar de acordo com o sistema operacional)
            $nomeImpressora = "cupom"; // Nome configurado para a impressora no seu sistema

            // Conexão com a impressora
            $connector = new WindowsPrintConnector($nomeImpressora);

            $printer = new Printer($connector);
            /*$printer->text("Teste de impressão via rede\n");
            $printer->cut();
            $printer->close();*/
            // Nome da impressora (pode variar de acordo com o sistema operacional)
            $nomeImpressora = "Cupom"; // Nome configurado para a impressora no seu sistema

            // Conexão com a impressora
            $connector = new WindowsPrintConnector($nomeImpressora);
            $printer = new Printer($connector);

            // Início do cupom
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Padaria e Conveniência Novo Pão\n");
            $printer->text("Rua João Pedro Anunciação, 396\n");
            $printer->text("Botelhos - MG\n");
            $printer->text("Telefone: (35) 99842-3938\n");
            $printer->feed();

            $printer->text("------------------------------------------------\n");

            // Exibe informações do cliente (se houver)
            if ($venda->cliente) {
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->text("Cliente: " . $venda->cliente->nome_cliente . "\n");
            }

            // Data da venda
            $printer->text("Data: " . $venda->horario_encerramento . "\n");
            $printer->text("Forma de Pagamento: " . $venda->forma_pagamento->descricao_fpagamento . "\n");

            $printer->text("------------------------------------------------\n");

            // Exibe os produtos
            foreach ($venda->auxVendas as $item) {
                $produto = $item->produto;
                $printer->text($produto->descricao_produto . "  - ");
                $printer->text(" " . $item->qtd_produto . " x R$ " . number_format($item->preco, 2, ',', '.') . "\n");
            }

            $printer->text("------------------------------------------------\n");

            // Exibe o total, valor pago e troco
            $printer->setJustification(Printer::JUSTIFY_RIGHT);
            $printer->text("TOTAL: R$ " . number_format($venda->valor_total_venda, 2, ',', '.') . "\n");
            $printer->text("Pago: R$ " . number_format($venda->valor_recebido, 2, ',', '.') . "\n");
            $printer->text("Troco: R$ " . number_format($venda->valor_troco, 2, ',', '.') . "\n");

            $printer->feed(2); // Alimenta o papel (pula algumas linhas)
            $printer->text("Obrigado pela preferência!\n");
            $printer->feed(2);

            // Corta o papel
            $printer->cut();

            // Fecha a conexão com a impressora
            $printer->close();

            return $this->dispatch('swal',
                title: 'Venda impressa',
                text: 'A venda foi impressa corretamente!',
                icon: 'success'
            );
            //return response()->json(['message' => 'Cupom impresso com sucesso!']);
        } catch (Exception $e) {
            // Tratamento de erro
            return $this->dispatch('swal',
                title: 'Falha ao imprimir',
                text: $e->getMessage(),
                icon: 'error'
            );
            
            /*Swal::redirect(
                'error',
                'Falha ao imprimir',
                $e->getMessage(),
                'listagem.show'
            );*/
            //return response()->json(['error' => 'Erro ao imprimir o cupom: ' . $e->getMessage()], 500);
        }
    }

    public function render()
    {
        return view('livewire.manager.vendas.edit-vendas');
    }
}
