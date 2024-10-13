<?php

namespace App\Http\Controllers\Manager\Produtos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Produtos\Produto;
use App\Models\Manager\Produtos\CodigoBarra;
use App\Helpers\Swal;
use Carbon\Carbon;

class CodigoBarrasController extends Controller
{
    public function create(){
        $produtos = Produto::all();
        return view('manager.produtos.codigo_barras.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto' => 'required',
            'codigo'  => 'required|unique:codigo_barras,codigo',
        ]);

        $produto = Produto::findOrFail($request->produto);

        //dd($produto->id);
        CodigoBarra::create([
            'codigo'       => $request->codigo,
            'produto'      => $produto->id,
            'hora_entrada' => Carbon::now(),
        ]);

        // Atualiza a quantidade de produtos
        $produto->increment('quantidade_produto', 1); // Aumenta a quantidade em 1

        return Swal::redirect(
            'success',
            'Cadastro de produtos',
            'Produto cadastrado com sucesso!',
            'produtos.show'
        );
    }
}
