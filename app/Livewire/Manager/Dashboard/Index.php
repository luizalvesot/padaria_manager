<?php

namespace App\Livewire\Manager\Dashboard;

use App\Models\Manager\Clientes\Cliente;

use Livewire\Component;

class Index extends Component
{
    public $clientes_ativos;
    public $clientes_inativos;

    public function mount()
    {
        $this->clientes_ativos = Cliente::where('status_cliente', 1)->count();
        $this->clientes_inativos = Cliente::where('status_cliente', 0)->count();
    }

    public function render()
    {
        return view('livewire.manager.dashboard.index');
    }
}
