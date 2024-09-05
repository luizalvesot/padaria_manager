<div>
    <!-- formulario -->
    <form class="row pt-2 pb-3 my-2 bg-white shadow rounded">
        <div class="col-md-5">
            <label class="text-dark"><strong>Nome</strong></label>
            <input type="text" placeholder="Nome" wire:model.defer="nome_categoria" id="nome_categoria"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-5">
            <label class="text-dark"><strong>Chave</strong></label>
            <input type="text" placeholder="Chave" wire:model.defer="chave_categoria" id="chave_categoria"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-sm mt-4 px-4" wire:click="search_categoria">Pesquisar</button>
            <button type="button" class="btn btn-sm btn-secondary px-auto mt-4" onclick="location.reload();">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
    </form>

    <!-- tabela de categorias -->
    <div class="row table-responsive p-2 bg-white shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center sortable">
            <caption>Lista de categorias</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Chave</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nome_categoria}}</td>
                        <td>{{ $categoria->descricao_categoria ?? ' - '}}</td>  
                        <td>{{ $categoria->chave_categoria}}</td>
                        <td>{{ $categoria->created_at}}</td>
                        <td>
                            <a class="btn btn-secondary btn-sm" title="Editar categoria" href="{{ route('categorias.edit', $categoria) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar categoria"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('categorias.destroy', $categoria) }}"
                                data-redirect="{{ route('categorias.show', $categoria) }}"
                                id="delete{{ $categoria->id }}"
                                onclick="deleteData({{ $categoria->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>

        <div class="pagination-sm text-dark">
            {{ $categorias->links() }}
        </div>
    </div>
</div>
