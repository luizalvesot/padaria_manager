<?php

namespace App\Livewire\Manager\Vendas;

use Livewire\Component;
use App\Models\Manager\Produtos\Produto;
use App\Models\manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;

class Venda extends Component
{
    public $clientes;
    public $produtos;
    public $formasPagamento;
    public $selectedCliente;
    public $selectedFormaPagamento;
    public $carrinho = [];
    public $total = 0;
    public $searchTerm = ''; // Variável para armazenar o termo de pesquisa
    public $barcode = ''; // Variável para armazenar o código de barras

    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->formasPagamento = FormasPagamento::all();
        $this->updateProdutos(); // Carrega os produtos inicialmente
    }

    // Atualiza a lista de produtos conforme o termo de pesquisa
    public function updateProdutos()
    {
        $this->produtos = Produto::where('status_produto', 'ativo')
            ->where('descricao_produto', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('id', 'like', '%' . $this->searchTerm . '%')
            ->get();
    }

    // Função para adicionar produto pelo código de barras
    public function updatedBarcode()
    {
        $produto = Produto::where('codigo_barras_produto', $this->barcode)
                            ->where('status_produto', 'ativo')
                            ->first();
        
        if ($produto) {
            $this->adicionarProduto($produto->id); // Adiciona o produto ao carrinho
            $this->barcode = ''; // Limpa o campo de código de barras após adicionar o produto
        } else {
            session()->flash('message', 'Produto não encontrado.');
        }
    }

    public function updatedSearchTerm()
    {
        // Sempre que o searchTerm for atualizado, os produtos serão filtrados
        $this->updateProdutos();
    }

    public function adicionarProduto($produtoId)
    {
        $produto = Produto::find($produtoId);
        $this->carrinho[] = [
            'produto' => $produto,
            'quantidade' => 1,
            'preco' => $produto->preco_venda_produto
        ];
        $this->atualizarTotal();
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
    }

    public function finalizarVenda()
    {
        // Lógica para registrar a venda no banco de dados
    }

    public function render()
    {
        return view('livewire.manager.vendas.venda');
    }
}