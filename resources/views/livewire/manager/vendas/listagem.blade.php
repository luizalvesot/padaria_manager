<div>
    <div class="row">
        @include('livewire.manager.vendas._form-fields')
    </div>
    <div class="row bg-indigo-300 rounded py-3">
        <div class="row mb-2">
            <div class="col-md-3">
                <p class="text-white bg-dark rounded px-4 py-1"><strong>Total de vendas exibidas: {{ $vendas->count() }}</strong></p>
            </div>
            <div class="col-md-3">
                <p class="text-white bg-dark rounded px-4 py-1"><strong>Valor total: R$ {{ number_format($vendas->sum('valor_total_venda'), 2, ',', '.') }}</strong></p>
            </div>
            <div class="col-md-2">
                <p class="text-white bg-dark rounded px-4 py-1"><strong>Receber: R$ {{ number_format($vendas->sum('valor_receber'), 2, ',', '.') }}</strong></p>
            </div>
            <div class="col-md-2">
                <p class="text-white bg-dark rounded px-4 py-1"><strong>Pagas: {{ $vendas->where('status_pagamento_venda', 'pago')->count() }}</strong></p>
            </div>
            <div class="col-md-2">
                <p class="text-white bg-dark rounded px-4 py-1"><strong>Finalizadas: {{ $vendas->where('status_venda', 'finalizada')->count() }}</strong></p>
            </div>
        </div>
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
                                    @if ($venda->status_pagamento_venda === 'pago')
                                        <td><button class="btn btn-success btn-sm py-0"><small>Pago</small></button></td>
                                    @else
                                        <td><button class="btn btn-danger btn-sm py-0"><small>Devedor</small></button></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th><small>Tipo de venda</small></th>
                                    <td><small>{{ $venda->tipo_venda }}</small></td>
                                </tr>
                                <tr>
                                    <th><small>Status da venda</small></th>
                                    @if ($venda->status_venda === 'finalizada')
                                        <td><button class="btn btn-success btn-sm py-0"><small>Finalizada</small></button></td>
                                    @else
                                    <td><button class="btn btn-danger btn-sm py-0"><small>Aberta</small></button></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" title="Visualizar detalhes da venda" data-bs-toggle="modal" data-bs-target="#vendaModal" onclick="carregarVenda({{ $venda->id }})">
                            <i class="bi bi-eye"></i> Visualizar
                        </button>
                        @if ($venda->status_venda !== 'finalizada')
                            <a href="{{ route('vendas.editar', ['id' => $venda->id]) }}" class="btn btn-sm btn-danger">Editar</a>
                        @endif
                    </div>
                </div>
            </div>

            @empty
            <div class="h3">Nenhuma venda encontrada</div>
        @endforelse 
        @include('livewire.manager.vendas._modal')
    </div>
</div>