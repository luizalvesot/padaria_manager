<?php

namespace App\Livewire\Manager\Vendas;

use Livewire\Component;
use App\Models\Manager\Produtos\Produto;
use App\Models\manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;
use Carbon\Carbon;

class Venda extends Component
{
    public $clientes;
    public $produtos;
    public $formasPagamento;
    public $selectedCliente;
    public $selectedFormaPagamento;
    public $carrinho = [];         // Array que armazena os produtos da compra
    public $total = 0;             // Inicializaçãoo do valor total
    public $searchTerm = '';       // Variável para armazenar o termo de pesquisa
    public $barcode = '';          // Variável para armazenar o código de barras
    public $valorPago = 0;         // Variável que recebe o valor pago pelo cliente
    public $troco = 0;             // Troco a ser calculado

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
        $produto = Produto::where('codigo_barras_produto', $this->barcode)
                            ->where('status_produto', 'ativo')
                            ->first();
        
        if ($produto) {
            $this->adicionarProduto($produto->id); // Chama método para adicionar o produto ao carrinho
            $this->barcode = ''; // Limpa o campo de código de barras após adicionar o produto
        } else {
            session()->flash('message', 'Produto não encontrado.');
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
            'adicionado_em' => Carbon::now()
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
        if ($this->valorPago >= $this->total) {
            $this->troco = $this->valorPago - $this->total;
        } else {
            $this->troco = 0; // Sem troco, pois o valor pago é menor que o total
        }
    }

    /**
     * Método utilizado para salvar a venda no banco de dados
     */
    public function salvarVenda()
    {
        
    }

    /**
     * Método utilizado para finalizar a venda, atualizando as informações no banco de dados
     */
    public function finalizarVenda()
    {
        
    }

    public function render()
    {
        return view('livewire.manager.vendas.venda');
    }
}