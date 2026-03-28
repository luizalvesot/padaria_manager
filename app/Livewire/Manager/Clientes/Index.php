<?php

namespace App\Livewire\Manager\Clientes;

use Livewire\Component;
use App\Models\Manager\Clientes\Cliente;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $nome_cliente = '';
    public $cidade_cliente = '';
    public $telefone_celular_cliente = '';
    public $status_cliente = '';

    public function search_cliente()
    {
        $this->resetPage();
    }

    public function render()
    {
        $clientes = Cliente::where('nome_cliente', 'like', "%".$this->nome_cliente."%")
                    ->where('cidade_cliente', 'like', "%".$this->cidade_cliente."%")
                    ->where('telefone_celular_cliente', 'like', "%".$this->telefone_celular_cliente."%")
                    ->where('status_cliente', 'like', "%".$this->status_cliente."%")
                    ->paginate(10);

        return view('livewire.manager.clientes.index', compact('clientes'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
