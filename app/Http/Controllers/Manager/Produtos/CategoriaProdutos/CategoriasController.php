<?php

namespace App\Http\Controllers\Manager\Produtos\CategoriaProdutos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Swal;
use App\Models\Manager\Produtos\Categorias\CategoriaProduto;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Route: categorias/
     * Name: categorias.show
     * Method: GET
     **/
    public function show()
    {
        return view('manager.produtos.categoria_produtos.index');
    }

    /**
     * Route: categorias/create/
     * Name: categorias.create
     * Method: GET
     **/
    public function create()
    {
        return view('manager.produtos.categoria_produtos.create');
    }

    /**
     * Route: categorias/store/
     * Name: categorias.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'nome_categoria' => 'required|max:255',
            'descricao_categoria' => 'nullable',
        ]);

        $chave = strtolower($request->nome_categoria);
        $chave_formatada = preg_replace('/[ -]+/' , '_' , $chave);

        CategoriaProduto::create([
            'nome_categoria'              => $request->nome_categoria,
            'descricao_categoria'         => $request->descricao_categoria,
            'chave_categoria'             => $chave_formatada,
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de categoria',
            'Categoria cadastrada com sucesso no sistema!',
            'categorias.show'
        );
    }

    /**
     * Route: categorias/{categoria}/
     * Name: categorias.edit
     * Method: GET
     **/
    public function edit(CategoriaProduto $categoria)
    {
        return view('manager.produtos.categoria_produtos.edit', compact('categoria'));
    }

     /**
     * Route: categorias/update/
     * Name: categorias.update
     * Method: PUT
     **/
    public function update(Request $request, CategoriaProduto $categoria)
    {
        $request->validate([
            'nome_categoria' => 'required|max:255',
            'descricao_categoria' => 'nullable'
        ]);

        $categoria->update([
            'nome_categoria'              => $request->nome_categoria,
            'descricao_categoria'         => $request->descricao_categoria,
            'chave_categoria'             => $request->nome_categoria,
        ]);

        return Swal::redirect(
            'info',
            'Atualização de categoria',
            'Categoria atualizada com sucesso no sistema!',
            'categorias.show'
        );
    }

    /**
     * Route: categorias/
     * Name: categorias.delete
     * Method: DELETE
     **/
    public function destroy(CategoriaProduto $categoria)
    {
        $categoria->delete();
    }
}
