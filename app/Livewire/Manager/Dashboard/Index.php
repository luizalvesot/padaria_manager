<?php

namespace App\Livewire\Manager\Dashboard;

use App\Models\Manager\Clientes\Cliente;
use App\Models\Manager\Produtos\Produto;

use Livewire\Component;

class Index extends Component
{
    public $clientes_ativos;
    public $clientes_inativos;
    public $produtos_ativos;
    public $produtos_inativos;

    public function mount()
    {
        $this->clientes_ativos = Cliente::where('status_cliente', 1)->count();
        $this->clientes_inativos = Cliente::where('status_cliente', 0)->count();
        $this->produtos_ativos = Produto::where('status_produto', 'ativo')->count();
        $this->produtos_inativos = Produto::where('status_produto', 'inativo')->count();
    }

    public function render()
    {
        return view('livewire.manager.dashboard.index');
    }
}
