<?php

namespace App\Http\Controllers\Manager\Vendas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Produtos\Produto;
use App\Models\Manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;

class VendaController extends Controller
{
    public function show()
    {
        $produto = Produto::where('status_produto', 'ativo')->get();
        $cliente = Cliente::all();
        $formasPagamento = FormasPagamento::all();

        return view(
            'manager.vendas.venda', 
            compact('produto', 'cliente', 'formasPagamento')
        );
    }
}
