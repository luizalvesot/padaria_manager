<div>
    <!-- linha dos botões -->
    <div class="row pt-2 pb-2 text-center">
        <div class="col">
            <a href="{{route('clientes.create')}}" class="btn btn-sm btn-dark px-3"><i class="bi bi-plus-lg"></i></a>
        </div>
    </div>

    <!-- formulario -->
    <form class="row pt-2 pb-3 my-2 bg-white shadow rounded">
        <div class="col-md-3">
            <label class="text-dark"><strong>Nome</strong></label>
            <input type="text" placeholder="Nome" 
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-3">
            <label class="text-dark"><strong>Cidade</strong></label>
            <input type="text" placeholder="Cidade" 
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Telefone</strong></label>
            <input type="text" placeholder="Telefone" 
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Status</strong></label>
            <select class="form-select border rounded py-1 px-3 shadow-sm">
                <option value="">Todos</option>
                <option value=1>Ativo</option>
                <option value=0>Inativo</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary btn-sm px-5 mt-4">Pesquisar</button>
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
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome_cliente }}</td>
                        <td>{{ $cliente->tipo_cliente }}</td>
                        <td>{{ $cliente->cpf_cliente }}</td>
                        <td>{{ $cliente->telefone_celular_cliente }}</td>
                        <td>{{ $cliente->status_cliente }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#clienteModal" onclick="carregarCliente({{ $cliente->id }})">Ver</button>
                            <a class="btn btn-dark btn-sm" href="{{ route('clientes.edit', $cliente) }}">Editar</a>
                            <a class="btn btn-danger btn-sm" href="{{-- route('clients.edit', $client) --}}">Excluir</a>
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
