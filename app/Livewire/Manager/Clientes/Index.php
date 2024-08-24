<?php

namespace App\Livewire\Manager\Clientes;

use Livewire\Component;
use App\Models\Manager\Clientes\Cliente;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $clientes = Cliente::where('nome_cliente', '!=', null)
                    ->paginate(1);

        return view('livewire.manager.clientes.index', compact('clientes'));
    }
}
