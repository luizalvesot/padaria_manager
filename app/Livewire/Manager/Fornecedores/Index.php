<?php

namespace App\Livewire\Manager\Fornecedores;

use Livewire\Component;
use App\Models\Manager\Fornecedores\Fornecedor;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $nome_fornecedor = '';
    public $cidade_fornecedor = '';
    public $status_fornecedor = '';

    public function search_fornecedor()
    {
        $this->resetPage();
    }

    public function render()
    {
        $fornecedores = Fornecedor::where('nome_fornecedor', 'like', "%".$this->nome_fornecedor."%")
                    ->where('cidade_fornecedor', 'like', "%".$this->cidade_fornecedor."%")
                    ->where('status_fornecedor', 'like', "%".$this->status_fornecedor."%")
                    ->paginate(10);

        return view('livewire.manager.fornecedores.index', compact('fornecedores'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
