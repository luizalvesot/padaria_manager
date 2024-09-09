<?php

namespace App\Http\Controllers\Manager\Produtos\TiposMedidas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Swal;
use App\Models\Manager\Produtos\TiposMedidas\TipoMedida;

class MedidasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Route: medidas/
     * Name: medidas.show
     * Method: GET
     **/
    public function show()
    {
        return view('manager.produtos.tipo_medidas.index');
    }

    /**
     * Route: medidas/create/
     * Name: medidas.create
     * Method: GET
     **/
    public function create()
    {
        return view('manager.produtos.tipo_medidas.create');
    }

    /**
     * Route: medidas/store/
     * Name: medidas.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'descricao_medida' => 'required|max:255',
            'representacao_medida' => 'required',
        ]);

        TipoMedida::create([
            'descricao_medida'     => $request->descricao_medida,
            'representacao_medida' => $request->representacao_medida,
            'chave_medida'         => $request->chave_medida, //ajustar
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de medida de produtos',
            'Medida cadastrada com sucesso no sistema!',
            'medidas.show'
        );
    }

    /**
     * Route: medidas/{medida}/
     * Name: medidas.edit
     * Method: GET
     **/
    public function edit(TipoMedida $medida)
    {
        return view('manager.produtos.tipo_medidas.edit', compact('medida'));
    }

     /**
     * Route: medidas/update/
     * Name: medidas.update
     * Method: PUT
     **/
    public function update(Request $request, TipoMedida $medida)
    {
        $request->validate([
            'descricao_medida'     => 'required|max:255',
            'representacao_medida' => 'required'
        ]);

        $medida->update([
            'descricao_medida'     => $request->descricao_medida,
            'representacao_medida' => $request->representacao_medida,
        ]);

        return Swal::redirect(
            'info',
            'Atualização de medida',
            'Medida atualizada com sucesso no sistema!',
            'medidas.show'
        );
    }

    /**
     * Route: medidas/
     * Name: medidas.delete
     * Method: DELETE
     **/
    public function destroy(TipoMedida $medida)
    {
        $medida->delete();
    }
}
