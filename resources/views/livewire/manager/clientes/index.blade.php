<div>
    <!-- formulario -->
    <form class="row pt-2 pb-3 my-2 bg-white shadow rounded">
        <div class="col-md-3">
            <label class="text-dark"><strong>Nome</strong></label>
            <input type="text" placeholder="Nome" wire:model.defer="nome_cliente" id="nome_cliente"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-3">
            <label class="text-dark"><strong>Cidade</strong></label>
            <input type="text" placeholder="Cidade" wire:model.defer="cidade_cliente" id="cidade_cliente"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Telefone</strong></label>
            <input type="text" placeholder="Telefone" wire:model.defer="telefone_celular_cliente" id="telefone_celular_cliente"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Status</strong></label>
            <select class="form-select border rounded py-1 px-3 shadow-sm" wire:model.defer="status_cliente" id="status_cliente">
                <option value="">Todos</option>
                <option value=1>Ativo</option>
                <option value=0>Inativo</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-sm mt-4 px-4" wire:click="search_cliente">Pesquisar</button>
            <a href="{{ route('clientes.pdf') }}" target="_blank" title="Imprimir lista de clientes" 
                class="btn btn-secondary btn-sm px-auto mt-4">
                <i class="bi bi-printer"></i>
            </a>
            <button type="button" class="btn btn-sm btn-secondary px-auto mt-4" onclick="location.reload();">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
    </form>

    <!-- tabela de clientes -->
    <div class="row table-responsive p-2 bg-white shadow rounded">
        <table class="table table-hover table-striped table-bordered caption-top text-center">
            <caption>Lista de clientes</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome/Razão social</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ver</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome_cliente }}</td>
                        <td>{{ $cliente->tipo_cliente }}</td>
                        @if($cliente->cpf_cliente != null)
                            <td class="cpf">{{ $cliente->cpf_cliente }}</td>
                        @else
                            <td> - </td>
                        @endif
                        <td class="celular">{{ $cliente->telefone_celular_cliente }}</td>
                        @if($cliente->status_cliente)
                            <td class="">Ativo</td>
                        @else    
                            <td class="text-danger">Inativo</td>
                        @endif    
                        <td>
                            <button class="btn btn-primary btn-sm" title="Visualizar dados do cliente" data-bs-toggle="modal" data-bs-target="#clienteModal" onclick="carregarCliente({{ $cliente->id }})">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" title="Editar cliente" href="{{ route('clientes.edit', $cliente) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" title="Deletar cliente"  
                                data-token="{{ csrf_token() }}" 
                                data-route="{{ route('clientes.destroy', $cliente) }}"
                                data-redirect="{{ route('clientes.show', $cliente) }}"
                                id="delete{{ $cliente->id }}"
                                onclick="deleteData({{ $cliente->id }})">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
        
        @include('livewire.manager.clientes._modal')

        <div class="pagination-sm text-dark">
            {{ $clientes->links() }}
        </div>
    </div>
</div>
