<?php

namespace App\Http\Controllers\Manager\Vendas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Produtos\Produto;
use App\Models\Manager\Clientes\Cliente;
use App\Models\Manager\Pagamentos\FormasPagamento;
use App\Models\Manager\Vendas\Venda;

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

    public function listar()
    {
        $vendas = Venda::all();
        return view('manager.vendas.listagem', compact('vendas'));
    }

    public function editar($id)
    {
        $venda = Venda::findOrFail($id);
        return view('livewire.manager.vendas.venda', compact('venda'));
    }
    /**
     * Route: vendas/{id}/
     * Name: vendas.showModal
     * Method: GET
     **/
    public function showModal($id)
    {
        $venda = Venda::findOrFail($id);

        return view('livewire.manager.vendas.detalhes', compact('venda'));
    }
}
