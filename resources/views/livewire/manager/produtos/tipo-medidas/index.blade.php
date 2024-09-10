<div>
    <!-- formulario -->
    <form class="row pt-2 pb-3 my-2 bg-white shadow rounded">
        <div class="col-md-5">
            <label class="text-dark"><strong>Descrição</strong></label>
            <input type="text" placeholder="Descrição" wire:model.defer="descricao_medida" id="descricao_medida"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-5">
            <label class="text-dark"><strong>Representação</strong></label>
            <input type="text" placeholder="Representação" wire:model.defer="representacao_medida" id="representacao_medida"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-sm mt-4 px-4" wire:click="search_categoria">Pesquisar</button>
            <button type="button" class="btn btn-sm btn-secondary px-auto mt-4" onclick="location.reload();">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
    </form>

    <!-- tabela tipos de medidas -->
    <div class="row table-responsive p-2 bg-white shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center sortable">
            <caption>Lista de tipos de medidas de produtos</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Chave</th>
                    <th scope="col">Representação</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medidas as $medida)
                    <tr>
                        <td>{{ $medida->id }}</td>
                        <td>{{ $medida->descricao_medida }}</td>
                        <td>{{ $medida->chave_medida }}</td>  
                        <td>{{ $medida->representacao_medida}}</td>
                        <td>{{ $medida->created_at}}</td>
                        <td>
                            <a class="btn btn-secondary btn-sm" title="Editar medida" href="{{ route('medidas.edit', $medida) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar medida"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('medidas.destroy', $medida) }}"
                                data-redirect="{{ route('medidas.show', $medida) }}"
                                id="delete{{ $medida->id }}"
                                onclick="deleteData({{ $medida->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>

        <div class="pagination-sm text-dark">
            {{ $medidas->links() }}
        </div>
    </div>
</div>
