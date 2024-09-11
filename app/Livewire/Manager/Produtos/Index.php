<?php

namespace App\Livewire\Manager\Produtos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Manager\Produtos\Produto;

class Index extends Component
{
    use WithPagination;

    public $descricao_produto = '';
    public $id_produto = null;
    public $codigo_barras_produto = '';
    public $fornecedor_produto = '';
    public $categoria_produto = '';

    public function search_produto()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->id_produto != null)
        {
            $produtos = Produto::where('descricao_produto', 'like', "%".$this->descricao_produto."%")
                    ->where('id', $this->id_produto)
                    ->where('codigo_barras_produto', 'like', "%".$this->codigo_barras_produto."%")
                    ->where('fornecedor', 'like', "%".$this->fornecedor_produto."%")
                    ->where('categoria_produto', 'like', "%".$this->categoria_produto."%")
                    ->paginate(15);

            return view('livewire.manager.produtos.index', compact('produtos'));
        } else {
            $produtos = Produto::where('descricao_produto', 'like', "%".$this->descricao_produto."%")
                    ->where('codigo_barras_produto', 'like', "%".$this->codigo_barras_produto."%")
                    ->where('fornecedor', 'like', "%".$this->fornecedor_produto."%")
                    ->where('categoria_produto', 'like', "%".$this->categoria_produto."%")
                    ->paginate(15);
            
            return view('livewire.manager.produtos.index', compact('produtos'));
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
