<?php

namespace App\Http\Controllers\Manager\Produtos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function show()
    {
        return view('manager.produtos.index');
    }
}
