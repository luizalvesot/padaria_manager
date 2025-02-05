<div>
    <div class="row">
        @include('livewire.manager.vendas._form-fields')
    </div>
    <div class="row bg-indigo-300 rounded py-3">
        @forelse ($vendas as $venda)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <h5 class="card-header">{{ $venda->cliente->nome_cliente }} <strong>#{{ $venda->id }}</strong></h5>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th><small>Abertura</small></th>
                                    <td><small>{{ $venda->horario_abertura }}</small></td>
                                </tr>
                                <tr>
                                    <th><small>Valor total</small></th>
                                    <td><small>{{ $venda->valor_total_venda }}</small></td>
                                </tr>
                                <tr>
                                    <th><small>Valor a receber</small></th>
                                    <td><small>{{ $venda->valor_receber }}</small></td>
                                </tr>
                                <tr>
                                    <th><small>Forma de pgto</small></th>
                                    <td><small>{{ $venda->forma_pagamento->descricao_fpagamento }}</small></td>
                                </tr>
                                <tr>
                                    <th><small>Status</small></th>
                                    <td><small>{{ $venda->status_pagamento_venda }}</small></td>
                                </tr>
                                <tr>
                                    <th><small>Tipo de venda</small></th>
                                    <td><small>{{ $venda->tipo_venda }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" title="Visualizar detalhes da venda" data-bs-toggle="modal" data-bs-target="#vendaModal" onclick="carregarVenda({{ $venda->id }})">
                            <i class="bi bi-eye"></i> Visualizar
                        </button>
                        <a href="{{ route('vendas.editar', ['id' => $venda->id]) }}" class="btn btn-sm btn-danger">Editar</a>
                    </div>
                </div>
            </div>

            @empty
            <div class="h3">Nenhuma venda encontrada</div>
        @endforelse 
        @include('livewire.manager.vendas._modal')
    </div>
</div>