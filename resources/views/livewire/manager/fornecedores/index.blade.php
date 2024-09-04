<div>
    <!-- formulario -->
    <form class="row pt-2 pb-3 my-2 bg-white shadow rounded">
        <div class="col-md-5">
            <label class="text-dark"><strong>Nome</strong></label>
            <input type="text" placeholder="Nome" wire:model.defer="nome_fornecedor" id="nome_fornecedor"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-3">
            <label class="text-dark"><strong>Cidade</strong></label>
            <input type="text" placeholder="Cidade" wire:model.defer="cidade_fornecedor" id="cidade_fornecedor"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Status</strong></label>
            <select class="form-select border rounded py-1 px-3 shadow-sm" wire:model.defer="status_fornecedor" id="status_fornecedor">
                <option value="">Todos</option>
                <option value=1>Ativo</option>
                <option value=0>Inativo</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-sm mt-4 px-4" wire:click="search_fornecedor">Pesquisar</button>
            <a href="{{-- route('clientes.pdf') --}}" target="_blank" title="Imprimir lista de fornecedores" 
                class="btn btn-secondary btn-sm px-auto mt-4">
                <i class="bi bi-printer"></i>
            </a>
            <button type="button" class="btn btn-sm btn-secondary px-auto mt-4" onclick="location.reload();">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
    </form>

    <!-- tabela de fornecedores -->
    <div class="row table-responsive p-2 bg-white shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center sortable">
            <caption>Lista de fornecedores</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome/Razão social</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ver</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{ $fornecedor->nome_fornecedor}}</td>
                        @if($fornecedor->cnpj_fornecedor != null)
                            <td class="cpf">{{ $fornecedor->cnpj_fornecedor }}</td>
                        @else
                            <td> - </td>
                        @endif
                        <td class="celular">{{ $fornecedor->telefone_fixo_fornecedor }}</td>
                        @if($fornecedor->status_fornecedor)
                            <td class="">Ativo</td>
                        @else    
                            <td class="text-danger">Inativo</td>
                        @endif    
                        <td>
                            <button class="btn btn-primary btn-sm" title="Visualizar dados do fornecedor" data-bs-toggle="modal" data-bs-target="#fornecedorModal" onclick="carregarFornecedor({{ $fornecedor->id }})">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" title="Editar fornecedor" href="{{ route('fornecedores.edit', $fornecedor) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar fornecedor"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('fornecedores.destroy', $fornecedor) }}"
                                data-redirect="{{ route('fornecedores.show', $fornecedor) }}"
                                id="delete{{ $fornecedor->id }}"
                                onclick="deleteData({{ $fornecedor->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
        
        {{-- @include('livewire.manager.clientes._modal') --}}

        <div class="pagination-sm text-dark">
            {{ $fornecedores->links() }}
        </div>
    </div>
</div>
