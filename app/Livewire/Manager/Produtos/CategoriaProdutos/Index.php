<?php

namespace App\Livewire\Manager\Produtos\CategoriaProdutos;

use Livewire\Component;
use App\Models\Manager\Produtos\Categorias\CategoriaProduto;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $nome_categoria = '';
    public $chave_categoria = '';

    public function search_categoria()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categorias = CategoriaProduto::where('nome_categoria', 'like', "%".$this->nome_categoria."%")
                    ->where('chave_categoria', 'like', "%".$this->chave_categoria."%")
                    ->paginate(10);
        return view('livewire.manager.produtos.categoria-produtos.index', compact('categorias'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
