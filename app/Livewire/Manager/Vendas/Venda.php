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

    public function mount($cliente, $produto, $formasPagamento)
    {
        $this->clientes = $cliente;
        $this->produtos = $produto;
        $this->formasPagamento = $formasPagamento;
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