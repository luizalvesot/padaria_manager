<?php

namespace App\Http\Controllers\Manager\Clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\Clientes\Cliente;
use App\Helpers\Swal;
use App\Helpers\Formatter;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;

class ClientesController extends Controller
{
    public $cep_cliente = null;
    public $cidade_cliente = null;
    public $estado_cliente = null;

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Route: clientes/
     * Name: clientes.show
     * Method: GET
     **/
    public function show()
    {
        return view('manager.clientes.index');
    }

    /**
     * Route: clientes/create/
     * Name: clientes.create
     * Method: GET
     **/
    public function create()
    {
        return view('manager.clientes.create');
    }

    /**
     * Route: clientes/store/
     * Name: clientes.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'nome_cliente' => 'required|max:255',
            'nascimento_cliente' => 'required',
            'tipo_cliente' => 'required',
            'cpf_cliente' => 'nullable',
            'rg_cliente' => 'nullable',
            'cnpj_cliente' => 'nullable',
            'nome_fantasia_cliente' => 'nullable',
            'status_cliente' => 'required',
            'telefone_celular_cliente' => 'required',
            'telefone_fixo_cliente' => 'nullable',
            'email_cliente' => 'nullable',
            'cep_cliente' => 'nullable',
            'cidade_cliente' => 'nullable',
            'estado_cliente' => 'nullable',
            'bairro_cliente' => 'nullable',
            'logradouro_cliente' => 'nullable',
            'referencia_cliente' => 'nullable',
            'numero_cliente' => 'nullable',
            'observacoes' => 'nullable',
        ]);

        $format = new Formatter;

        if($request->cidade_cliente == null)
        {
            $this->cidade_cliente = 'Botelhos';
            $this->cep_cliente = '37720000';
            $this->estado_cliente = 'MG';
        } else {
            $this->cidade_cliente = $request->cidade_cliente;
            $this->cep_cliente = $request->cep_cliente;
            $this->estado_cliente = $request->estado_cliente;
        }

        Cliente::create([
            'nome_cliente'              => $request->nome_cliente,
            'nascimento_cliente'        => $request->nascimento_cliente,
            'tipo_cliente'              => $request->tipo_cliente,
            'cpf_cliente'               => $format->formatCpf($request->cpf_cliente),
            'rg_cliente'                => $format->formatRg($request->rg_cliente),
            'cnpj_cliente'              => $format->formatCnpj($request->cnpj_cliente),
            'nome_fantasia_cliente'     => $request->nome_fantasia_cliente,
            'status_cliente'            => $request->status_cliente,
            'telefone_celular_cliente'  => $format->formatCelular($request->telefone_celular_cliente),
            'telefone_fixo_cliente'     => $format->formatTelefone($request->telefone_fixo_cliente),
            'email_cliente'             => $request->email_cliente,
            'cep_cliente'               => $format->formatCep($this->cep_cliente),
            'cidade_cliente'            => $this->cidade_cliente,
            'estado_cliente'            => $this->estado_cliente,
            'bairro_cliente'            => $request->bairro_cliente,
            'logradouro_cliente'        => $request->logradouro_cliente,
            'referencia_cliente'        => $request->referencia_cliente,
            'numero_cliente'            => $request->numero_cliente,
            'observacoes'               => $request->observacoes,
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de Cliente',
            'O cliente foi cadastrado com sucesso em nosso sistema!',
            'clientes.show'
        );
    }

    /**
     * Route: clientes/{cliente}/edit/
     * Name: clients.edit
     * Method: GET
     **/
    public function edit(Cliente $cliente)
    {
        return view('manager.clientes.edit', compact('cliente'));
    }

    /**
     * Route: clientes/{cliente}/
     * Name: clientes.update
     * Method: PUT
     **/
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome_cliente' => 'required|max:255',
            'nascimento_cliente' => 'required',
            'tipo_cliente' => 'required',
            'cpf_cliente' => 'nullable',
            'rg_cliente' => 'nullable',
            'cnpj_cliente' => 'nullable',
            'nome_fantasia_cliente' => 'nullable',
            'status_cliente' => 'required',
            'telefone_celular_cliente' => 'required',
            'telefone_fixo_cliente' => 'nullable',
            'email_cliente' => 'nullable',
            'cep_cliente' => 'nullable',
            'cidade_cliente' => 'nullable',
            'estado_cliente' => 'nullable',
            'bairro_cliente' => 'nullable',
            'logradouro_cliente' => 'nullable',
            'referencia_cliente' => 'nullable',
            'numero_cliente' => 'nullable',
            'observacoes' => 'nullable',
        ]);

        $format = new Formatter;

        $cliente->update([
            'nome_cliente'              => $request->nome_cliente,
            'nascimento_cliente'        => $request->nascimento_cliente,
            'tipo_cliente'              => $request->tipo_cliente,
            'cpf_cliente'               => $format->formatCpf($request->cpf_cliente),
            'rg_cliente'                => $format->formatRg($request->rg_cliente),
            'cnpj_cliente'              => $format->formatCnpj($request->cnpj_cliente),
            'nome_fantasia_cliente'     => $request->nome_fantasia_cliente,
            'status_cliente'            => $request->status_cliente,
            'telefone_celular_cliente'  => $format->formatCelular($request->telefone_celular_cliente),
            'telefone_fixo_cliente'     => $format->formatTelefone($request->telefone_fixo_cliente),
            'email_cliente'             => $request->email_cliente,
            'cep_cliente'               => $format->formatCep($request->cep_cliente),
            'cidade_cliente'            => $request->cidade_cliente,
            'estado_cliente'            => $request->estado_cliente,
            'bairro_cliente'            => $request->bairro_cliente,
            'logradouro_cliente'        => $request->logradouro_cliente,
            'referencia_cliente'        => $request->referencia_cliente,
            'numero_cliente'            => $request->numero_cliente,
            'observacoes'               => $request->observacoes,
        ]);

        return Swal::redirect(
            'info',
            'Alteração de Cliente!',
            'As informações do cliente foram atualizadas com sucesso em nosso sistema!',
            'clientes.show'
        );
    }

    /**
     * Route: clientes/{id}/
     * Name: clients.showModal
     * Method: GET
     **/
    public function showModal($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('livewire.manager.clientes.detalhes', compact('cliente'));
    }

    /**
     * Route: clientes/
     * Name: clients.showModal
     * Method: GET
     **/
    public function geraPdf()
    {
        $cliente = Cliente::all();
        $pdf = PDF::loadView('manager.clientes.pdf', compact('cliente'));

        return $pdf->setPaper('a4', 'landscape')->stream('Clientes_Cadastrados.pdf');
    }

    /**
     * Route: clientes/{cliente}/
     * Name: clients.destroy
     * Method: DELETE
     **/
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
    }
}
