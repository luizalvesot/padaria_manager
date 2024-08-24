<?php

namespace App\Http\Controllers\Manager\Clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
