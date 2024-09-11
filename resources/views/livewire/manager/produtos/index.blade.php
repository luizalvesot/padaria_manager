<div>
    <!-- formulario -->
    <form class="row pt-2 pb-3 my-2 bg-white shadow rounded">
        <div class="col-md-3">
            <label class="text-dark"><strong>Descrição</strong></label>
            <input type="text" placeholder="Descrição" wire:model.defer="descricao_produto" id="descricao_produto"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-1">
            <label class="text-dark"><strong>Códido</strong></label>
            <input type="text" placeholder="Código" wire:model.defer="id_produto" id="id"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-3">
            <label class="text-dark"><strong>Código de barras</strong></label>
            <input type="text" placeholder="Código de barras" wire:model.defer="codigo_barras_produto" id="codigo_barras_produto"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-3">
            <label class="text-dark"><strong>Fornecedor</strong></label>
            <input type="text" placeholder="Fornecedor" wire:model.defer="fornecedor_produto" id="fornecedor_produto"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Categoria</strong></label>
            <input type="text" placeholder="Categoria" wire:model.defer="categoria_produto" id="categoria_produto"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="row text-center">
            <div class="col-md">
                <button type="button" class="btn btn-secondary shadow-sm btn-sm mt-3 px-4" wire:click="search_produto">Pesquisar</button>
                <a href="{{ route('clientes.pdf') }}" target="_blank" title="Imprimir lista de clientes" 
                    class="btn btn-secondary btn-sm px-auto mt-3">
                    <i class="bi bi-printer"></i>
                </a>
                <button type="button" class="btn btn-sm btn-secondary px-auto mt-3" onclick="location.reload();">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- tabela de clientes -->
    <div class="row table-responsive p-2 bg-white shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center sortable">
            <caption>Lista de clientes</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Medida</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Custo</th>
                    <th scope="col">Desconto</th>
                    <th scope="col">Preço de venda</th>
                    <th scope="col">Status</th>
                    <th scope="col">Última saída</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->descricao_produto }}</td>
                        <td>{{ $produto->categoria_produto->nome_categoria }}</td>
                        <td>{{ $produto->tipo_medida->representacao_medida }}</td>
                        <td>{{ $produto->quantidade_produto }}</td>
                        <td>{{ $produto->preco_custo_produto }}</td>
                        <td>{{ $produto->desconto_produto ?? '0'}}</td>
                        <td>{{ $produto->preco_venda_produto }}</td>
                        @if($produto->status_produto != 0)
                            <td class="text-success">Ativo</td>
                        @else
                            <td class="text-danger">Inativo</td>
                        @endif
                        <td>{{ $produto->hora_ultima_saida }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" title="Visualizar todos os dados do produto" data-bs-toggle="modal" data-bs-target="#produtoModal" onclick="carregarProduto({{ $produto->id }})">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" title="Editar produto" href="{{ route('produtos.edit', $produto) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar produto"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('produtos.destroy', $produto) }}"
                                data-redirect="{{ route('produtos.show', $produto) }}"
                                id="delete{{ $produto->id }}"
                                onclick="deleteData({{ $produto->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
        
        {{--@include('livewire.manager.produtos._modal')--}}

        {{--<div class="pagination-sm text-dark">
            {{ $produtos->links() }}
        </div>--}}
    </div>
</div>
