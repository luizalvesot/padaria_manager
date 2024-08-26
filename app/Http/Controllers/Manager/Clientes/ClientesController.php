<?php

namespace App\Http\Controllers\Manager\Clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Clientes\Cliente;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show()
    {
        return view('manager.clientes.index');
    }

    public function create()
    {
        return view('manager.clientes.create');
    }

    public function showModal($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('livewire.manager.clientes.detalhes', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('manager.clientes.edit');
    }
}
