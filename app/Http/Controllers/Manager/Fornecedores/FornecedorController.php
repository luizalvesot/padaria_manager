<?php

namespace App\Http\Controllers\Manager\Fornecedores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Fornecedores\Fornecedor;
use App\Helpers\Swal;
use App\Helpers\Formatter;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;

class FornecedorController extends Controller
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
}
