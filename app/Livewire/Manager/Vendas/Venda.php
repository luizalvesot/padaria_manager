<?php

namespace App\Livewire\Manager\Vendas;

use Livewire\Component;
use App\Models\Manager\Produtos\Produto;
use App\Models\manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;
use Carbon\Carbon;
use App\Models\Manager\Produtos\CodigoBarra;
use App\Models\Manager\Vendas\Venda AS VendaModel;
use App\Models\Manager\Vendas\AuxVenda;
use App\Helpers\Swal;
use App\Helpers\Formatter;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Exception;
use Illuminate\Support\Str;

class Venda extends Component
{
    public $clientes;
    public $produtos;
    public $formasPagamento;
    public $selectedCliente;
    public $selectedFormaPagamento = 1;
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
    public $isFiado = false;
    public $tipoVenda = '';
    public $horarioEncerramento;
    public $statusVenda = 'aberto';
    public $produtoUniqueid = '';

    public function mount()
    {
        $this->clientes = Cliente::all();                // Recebe todos os clientes cadastrados
        $this->formasPagamento = FormasPagamento::all(); // Recebe todas as formas de pagamento cadastrados
        $this->updateProdutos();                         // Chama o método para carregar todos os produtos inicialmente
    }

    /**
     * Método que atualiza a lista de produtos conforme o termo de pesquisa
     * - os produtos são pesquisados apenas pela descrição e pelo id
     * - são buscados apenas os ativos
     */
    public function updateProdutos()
    {
        $this->produtos = Produto::where('status_produto', 'ativo')
             ->where('descricao_produto', 'like', '%' . $this->searchTerm . '%')
             ->orWhere('id', 'like', '%' . $this->searchTerm . '%')
             ->get();
    }

    /**
     * Método responsável por procurar o produto pelo código de barras e adicionar no carrinho
     */
    public function updatedBarcode()
    {
        // Localiza o produto no banco de dados de acordo com o código de barras
        /*$produto = Produto::where('codigo_barras_produto', $this->barcode)
                            ->where('status_produto', 'ativo')
                            ->first();*/
    
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

    /**
     * Método responsável por filtrar os produtos sempre que o searchTerm for atualizado
     */
    public function updatedSearchTerm()
    {
        $this->updateProdutos();
    }

    /**
     * Método que adiciona os produtos no carrinho
     * - recebe por parâmetro o ID do produto e o localiza no banco de dados
     * - insere o objeto produto, a quantidade, o preco dele e a data atual no array carrinho
     * - chama o método para atualizar o valor total do carrinho
     */
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

    /**
     * Método reponsável por atualizar a quantidade de cada produto no carrinho, quando necessário
     * - recebe o index do produto no carrinho e a nova quantidade no parâmetro e faz a substituição no array
     * - chama o método para atualizar o valor total do carrinho
     * - se a nova quantidade do produto for igual ou menor a zero, chma-se o método para remover produto do array
     */
    public function atualizarQuantidade($index, $novaQuantidade)
    {
        if ($novaQuantidade > 0) {
            $this->carrinho[$index]['quantidade'] = $novaQuantidade;
            $this->atualizarTotal();
        } else {
            $this->removerProduto($index);
        }
    }

    /**
     * Método utilizado para remover produto do carrinho
     * - a função UNSET do PHP é usada para destruir um ídice do array, nesse caso remove o produto do carrinho
     * - é chamado a função ARRAY_VALUES do PHP para reorganizar os índices do array
     * - o método para atualizar o valor total é invocado
     */
    public function removerProduto($index)
    {
        unset($this->carrinho[$index]);
        $this->carrinho = array_values($this->carrinho); // Reindexa o array
        $this->atualizarTotal();
    }

    /**
     * Método utilizado para atualizar o valor total do carrinho
     * - a função ARRAY_REDUCE do PHP pega o preço de cada item do carrinho e multiplica pela sua quantidade para retornar o valor total do carrinho
     * - invoca a função para calcular o troco a devolver para o cliente
     */
    public function atualizarTotal()
    {
        $this->total = array_reduce($this->carrinho, function ($total, $item) {
            return $total + ($item['quantidade'] * $item['preco']);
        }, 0);

        $this->calcularTroco(); // Sempre recalcula o troco ao atualizar o total
    }

    /**
     * Método utiliza para chamar o cálculo de troco quando o valor pago é atualizado
     */
    public function updatedValorPago($value)
    {
        $this->calcularTroco();
    }

    /**
     * Função utilizada para calcular o troco do cliente de acordo com o valor pago
     */
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

   

    /**
     * Método utilizado para salvar a venda no banco de dados
     */
    public function salvarVenda()
    {
        // Verifica se o carrinho está vazio
        if (empty($this->carrinho)) {
            return Swal::redirect(
                'warning',
                'Carrinho vazio',
                'Adicione produtos antes de finalizar a venda.',
                'vendas.show'
            );
        }

        // Define o tipo da venda
        if ($this->isFiado) {
            $this->tipoVenda = 'fiado';
            $this->horarioEncerramento = null;
            
            // Formatar descrição da venda
            $objCliente = Cliente::find($this->selectedCliente);
            $this->vendaDescricao = Formatter::formatDescricaoVenda($objCliente->nome_cliente);
        } else {
            $this->tipoVenda = 'normal';
            $this->horarioEncerramento = Carbon::now();

            // Formatar descrição da venda
            $objCliente = Cliente::where('nome_cliente', 'generico')->first();
            $this->vendaDescricao = Formatter::formatDescricaoVenda($objCliente->nome_cliente);
            $this->selectedCliente = $objCliente->id;
        }

        // Define o status do pagamento
        if ($this->saldoDevedor > 0) {
            $this->statusPagamento = 'devedor';
        } else {
            $this->statusPagamento = 'pago';
        }

        // Criar a venda
        $venda = VendaModel::create([
            'descricao_venda'        => $this->vendaDescricao,
            'cliente_id'             => $this->selectedCliente, // chave estrangeira
            'horario_abertura'       => Carbon::now(),
            'prazo_encerramento'     => $this->selectedPrazoPagamento,
            'horario_encerramento'   => $this->horarioEncerramento,
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

        // Verifica se a venda foi criada com sucesso
        if (!$venda) {
            return false;
        }

        // Salvar os itens no AuxVenda
        foreach ($this->carrinho as $item) {
            AuxVenda::create([
                'venda_id'      => $venda->id,
                'produto_id'    => $item['produto']->id,
                'cliente_id'    => $venda->cliente->id,
                'qtd_produto'   => $item['quantidade'],
                'preco'         => $item['preco'],
                'horario_venda' => Carbon::now(),
                'tipo_venda'    => $this->tipoVenda,
                'uniqueid'      => $item['uniqueid'],
            ]);
        }

        return Swal::redirect(
            'success',
            'Venda salva com sucesso',
            '',
            'vendas.show'
        );
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
            'vendas.show'
        );
    }

    public function imprimir($vendaId)
    {
        // Recupera a venda e os itens da venda
        $venda = VendaModel::find($vendaId);
        
        //dd($venda->produtos);

        // Tente enviar o cupom para a impressora
        try {
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
            $printer->text("Data: " . $venda->created_at->format('d/m/Y H:i:s') . "\n");
            $printer->text("Forma de Pagamento: " . $venda->forma_pagamento->descricao_fpagamento . "\n");

            $printer->text("------------------------------------------------\n");

            // Exibe os produtos
            foreach ($venda->produtos as $item) {
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

            return Swal::redirect(
                'success',
                'Venda finalizada',
                'Cupom impresso com sucesso!',
                'vendas.show'
            );
            //return response()->json(['message' => 'Cupom impresso com sucesso!']);
        } catch (Exception $e) {
            // Tratamento de erro
            return Swal::redirect(
                'error',
                'Falha ao imprimir',
                $e->getMessage(),
                'vendas.show'
            );
            //return response()->json(['error' => 'Erro ao imprimir o cupom: ' . $e->getMessage()], 500);
        }
    }

    public function render()
    {
        return view('livewire.manager.vendas.venda');
    }
}