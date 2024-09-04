<?php

namespace App\Http\Controllers\Manager\Fornecedores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Fornecedores\Fornecedor;

class FornecedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Route: fornecedores/
     * Name: fornecedores.show
     * Method: GET
     **/
    public function show()
    {
        return view('manager.fornecedores.index');
    }

    /**
     * Route: fornecedores/create/
     * Name: fornecedores.create
     * Method: GET
     **/
    public function create()
    {
        return view('manager.fornecedores.create');
    }

    /**
     * Route: fornecedores/{fornecedor}/
     * Name: fornecedores.edit
     * Method: GET
     **/
    public function edit(Fornecedor $fornecedor)
    {
        return view('manager.fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Route: fornecedores/
     * Name: fornecedores.delete
     * Method: DELETE
     **/
    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
    }
}
