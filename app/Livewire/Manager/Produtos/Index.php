<?php

namespace App\Livewire\Manager\Produtos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Manager\Produtos\Produto;

class Index extends Component
{
    use WithPagination;

    public $descricao_produto = '';
    public $id_produto;
    public $codigo_barras_produto = '';
    public $fornecedor_produto;
    public $categoria_produto;
    public $status;
    public $paginate = 15;

    public $fornecedores;
    public $categoria_produtos;

    public function search_produto()
    {
        $this->resetPage();
    }

    public function mount($fornecedores, $categoria_produtos)
    {
        $this->fornecedores = $fornecedores;
        $this->categoria_produtos = $categoria_produtos;
    }

    public function render()
    {
        $query = Produto::query();

        if($this->descricao_produto){
            $query->where('descricao_produto', 'like', '%'.$this->descricao_produto.'%');
        }

        if($this->id_produto){
            $query->find($this->id_produto);
        }

        if($this->codigo_barras_produto){
            $query->where('codigo_barras_produto', 'like', '%'.$this->codigo_barras_produto.'%');
        }

        if($this->fornecedor_produto){
            $query->where('fornecedor', $this->fornecedor_produto);
        }

        if($this->categoria_produto){
            $query->where('categoria_produto', $this->categoria_produto);
        }

        if($this->status){
            $query->where('status_produto', $this->status);
        }

        $produtos = $query->get();

        return view('livewire.manager.produtos.index', compact('produtos'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
