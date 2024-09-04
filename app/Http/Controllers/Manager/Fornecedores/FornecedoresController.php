<?php

namespace App\Http\Controllers\Manager\Fornecedores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Fornecedores\Fornecedor;
use App\Helpers\Formatter;
use App\Helpers\Swal;

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
     * Route: fornecedores/store/
     * Name: fornecedores.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'nome_fornecedor' => 'required|max:255',
            'cnpj_fornecedor' => 'nullable',
            'nome_fantasia_fornecedor' => 'nullable',
            'status_fornecedor' => 'required',
            'telefone_celular_fornecedor' => 'nullable',
            'telefone_fixo_fornecedor' => 'required',
            'email_fornecedor' => 'nullable',
            'cep_fornecedor' => 'nullable',
            'cidade_fornecedor' => 'nullable',
            'estado_fornecedor' => 'nullable',
            'bairro_fornecedor' => 'nullable',
            'logradouro_fornecedor' => 'nullable',
            'referencia_fornecedor' => 'nullable',
            'numero_fornecedor' => 'nullable',
            'observacoes_fornecedor' => 'nullable',
        ]);

        $format = new Formatter;

        fornecedor::create([
            'nome_fornecedor'              => $request->nome_fornecedor,
            'cnpj_fornecedor'              => $format->formatCnpj($request->cnpj_fornecedor),
            'nome_fantasia_fornecedor'     => $request->nome_fantasia_fornecedor,
            'status_fornecedor'            => $request->status_fornecedor,
            'telefone_celular_fornecedor'  => $format->formatCelular($request->telefone_celular_fornecedor),
            'telefone_fixo_fornecedor'     => $format->formatTelefone($request->telefone_fixo_fornecedor),
            'email_fornecedor'             => $request->email_fornecedor,
            'cep_fornecedor'               => $format->formatCep($request->cep_fornecedor),
            'cidade_fornecedor'            => $request->cidade_fornecedor,
            'estado_fornecedor'            => $request->estado_fornecedor,
            'bairro_fornecedor'            => $request->bairro_fornecedor,
            'logradouro_fornecedor'        => $request->logradouro_fornecedor,
            'referencia_fornecedor'        => $request->referencia_fornecedor,
            'numero_fornecedor'            => $request->numero_fornecedor,
            'observacoes_fornecedor'       => $request->observacoes_fornecedor,
        ]);

        return Swal::redirect(
            'info',
            'Atualização de fornecedor',
            'O fornecedor foi atualizado com sucesso no sistema!',
            'fornecedores.show'
        );
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
     * Route: fornecedores/update/
     * Name: fornecedores.update
     * Method: PUT
     **/
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome_fornecedor' => 'required|max:255',
            'cnpj_fornecedor' => 'nullable',
            'nome_fantasia_fornecedor' => 'nullable',
            'status_fornecedor' => 'required',
            'telefone_celular_fornecedor' => 'nullable',
            'telefone_fixo_fornecedor' => 'required',
            'email_fornecedor' => 'nullable',
            'cep_fornecedor' => 'nullable',
            'cidade_fornecedor' => 'nullable',
            'estado_fornecedor' => 'nullable',
            'bairro_fornecedor' => 'nullable',
            'logradouro_fornecedor' => 'nullable',
            'referencia_fornecedor' => 'nullable',
            'numero_fornecedor' => 'nullable',
            'observacoes_fornecedor' => 'nullable',
        ]);

        $format = new Formatter;

        $fornecedor->update([
            'nome_fornecedor'              => $request->nome_fornecedor,
            'cpf_fornecedor'               => $format->formatCpf($request->cpf_fornecedor),
            'cnpj_fornecedor'              => $format->formatCnpj($request->cnpj_fornecedor),
            'nome_fantasia_fornecedor'     => $request->nome_fantasia_fornecedor,
            'status_fornecedor'            => $request->status_fornecedor,
            'telefone_celular_fornecedor'  => $format->formatCelular($request->telefone_celular_fornecedor),
            'telefone_fixo_fornecedor'     => $format->formatTelefone($request->telefone_fixo_fornecedor),
            'email_fornecedor'             => $request->email_fornecedor,
            'cep_fornecedor'               => $format->formatCep($request->cep_fornecedor),
            'cidade_fornecedor'            => $request->cidade_fornecedor,
            'estado_fornecedor'            => $request->estado_fornecedor,
            'bairro_fornecedor'            => $request->bairro_fornecedor,
            'logradouro_fornecedor'        => $request->logradouro_fornecedor,
            'referencia_fornecedor'        => $request->referencia_fornecedor,
            'numero_fornecedor'            => $request->numero_fornecedor,
            'observacoes_fornecedor'       => $request->observacoes_fornecedor,
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de fornecedor',
            'O fornecedor foi cadastrado com sucesso em nosso sistema!',
            'fornecedores.show'
        );
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
