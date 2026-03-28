<?php

namespace App\Http\Controllers\Manager\Produtos;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Models\Manager\Fornecedores\Fornecedor;
use Illuminate\Http\Request;
use App\Models\Manager\Produtos\Produto;
use App\Models\Manager\Produtos\Categorias\CategoriaProduto;
use App\Models\Manager\Produtos\TiposMedidas\TipoMedida;
use App\Helpers\Swal;
use Carbon\Carbon;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Route: produtos/
     * Name: produtos.show
     * Method: GET
     **/    
    public function show()
    {
        $categoria_produtos = CategoriaProduto::all();
        $fornecedores = Fornecedor::all();

        return view('manager.produtos.index', compact('categoria_produtos', 'fornecedores'));
    }

    /**
     * Route: produtos/create/
     * Name: produtos.create
     * Method: GET
     **/
    public function create()
    {
        $tipo_medidas = TipoMedida::all();
        $categoria_produtos = CategoriaProduto::all();
        $fornecedores = Fornecedor::all();

        return view('manager.produtos.create', compact('tipo_medidas', 'categoria_produtos', 'fornecedores'));
    }

    /**
     * Route: produtos/store/
     * Name: produtos.store
     * Method: POST
     **/
    public function store(Request $request)
    {
        $request->validate([
            'descricao_produto'      => 'required|max:255',
            'codigo_barras_produto' => 'nullable',
            'categoria_produto'      => 'required',
            'tipo_medida'            => 'required',
            'fornecedor'             => 'required',
            'quantidade_produto'     => 'required',
            'preco_custo_produto'    => 'required',
            'desconto_produto'       => 'nullable',
            'preco_venda_produto'    => 'required',
            'status_produto'         => 'required',
            'observacoes_produto'    => 'nullable',
        ]);

        $format = new Formatter;
        
        Produto::create([
            'descricao_produto'      => $request->descricao_produto,
            'codigo_barras_produto' => $request->codigo_barras_produto,
            'categoria_produto'      => $request->categoria_produto,
            'tipo_medida'            => $request->tipo_medida,
            'fornecedor'             => $request->fornecedor,
            'quantidade_produto'     => $request->quantidade_produto,
            'preco_custo_produto'    => $format->formatMoney($request->preco_custo_produto),
            'desconto_produto'       => $request->desconto_produto,
            'preco_venda_produto'    => $format->formatMoney($request->preco_venda_produto),
            'status_produto'         => $request->status_produto,
            'observacoes_produto'    => $request->observacoes_produto,
            'hora_ultima_entrada'    => Carbon::now(),
            'qtd_ultima_entrada'     => $request->quantidade_produto,
        ]);

        return Swal::redirect(
            'success',
            'Cadastro de produtos',
            'Produto cadastrado com sucesso no sistema!',
            'produtos.show'
        );
    }

    /**
     * Route: produtos/{produto}/edit/
     * Name: produtos.edit
     * Method: GET
     **/
    public function edit(Produto $produto)
    {
        $tipo_medidas = TipoMedida::all();
        $categoria_produtos = CategoriaProduto::all();
        $fornecedores = Fornecedor::all();

        return view('manager.produtos.edit', compact('produto', 'tipo_medidas', 'categoria_produtos', 'fornecedores'));
    }

    /**
     * Route: produtos/{produto}/
     * Name: produtos.update
     * Method: PUT
     **/
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'descricao_produto'      => 'required|max:255',
            'codigo_barras_produto' => 'nullable',
            'categoria_produto'      => 'required',
            'tipo_medida'            => 'required',
            'fornecedor'             => 'required',
            'quantidade_produto'     => 'required',
            'preco_custo_produto'    => 'required',
            'desconto_produto'       => 'nullable',
            'preco_venda_produto'    => 'required',
            'status_produto'         => 'required',
            'observacoes_produto'    => 'nullable',
        ]);

        $format = new Formatter;
        //dd($request->preco_custo_produto);

        $produto->update([
            'descricao_produto'      => $request->descricao_produto,
            'codigo_barras_produto' => $request->codigo_barras_produto,
            'categoria_produto'      => $request->categoria_produto,
            'tipo_medida'            => $request->tipo_medida,
            'fornecedor'             => $request->fornecedor,
            'quantidade_produto'     => $request->quantidade_produto,
            'preco_custo_produto'    => $format->formatMoney($request->preco_custo_produto),
            'desconto_produto'       => $request->desconto_produto,
            'preco_venda_produto'    => $format->formatMoney($request->preco_venda_produto),
            'status_produto'         => $request->status_produto,
            'observacoes_produto'    => $request->observacoes_produto,
            'hora_ultima_entrada'    => Carbon::now(),
            'qtd_ultima_entrada'     => $request->quantidade_produto,
        ]);

        return Swal::redirect(
            'info',
            'Atualização de fornecedor',
            'O fornecedor foi atualizado com sucesso em nosso sistema!',
            'produtos.show'
        );
    }

    /**
     * Route: produtos/{produto}/
     * Name: produtos.create
     * Method: DELETE
     **/
    public function destroy(Produto $produto)
    {
        $produto->delete();
    }

    /**
     * Route: produtos/{id}/
     * Name: produtos.showModal
     * Method: GET
     **/
    public function showModal($id)
    {
        $produto = Produto::findOrFail($id);

        return view('livewire.manager.produtos.detalhes', compact('produto'));
    }
}
