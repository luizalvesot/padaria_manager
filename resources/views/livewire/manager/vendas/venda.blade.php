<div>
    <div class="row my-2">
        <!-- Seleção do Cliente -->
        <div class="col-md-8">
            <label for="cliente" class="text-dark"><strong>Cliente</strong></label>
            <select wire:model="selectedCliente" class="form-select border rounded py-1">
                <option value="">Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome_cliente }}</option>
                @endforeach
            </select>
        </div>

        <!-- Seleção da Forma de Pagamento -->
        <div class="col-md-4">
            <label for="formaPagamento" class="text-dark"><strong>Forma de pagamento</strong></label>
            <select wire:model="selectedFormaPagamento" class="form-select border rounded py-1">
                <option value="">Selecione a forma de pagamento</option>
                @foreach ($formasPagamento as $forma)
                    <option value="{{ $forma->id }}">{{ $forma->descricao_fpagamento }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row my-2 mx-1">
        <div class="col-md-5 border p-4 bg-white">
            <!-- Lista de Produtos -->
            <div>
                <h4 class="h4">Produtos</h4>
                <ul>
                    @foreach ($produtos as $produto)
                        <li>
                            {{ $produto->descricao_produto }} - R$ {{ number_format($produto->preco_venda_produto, 2, ',', '.') }}
                            <button wire:click="adicionarProduto({{ $produto->id }})" class="btn btn-sm btn-primary">Adicionar</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-7 border p-4">
            <!-- Carrinho de Compras -->
            <div>
                <h4 class="h4">Carrinho</h4>
                <ul>
                    @foreach ($carrinho as $index => $item)
                        <li>
                            {{ $item['produto']->descricao_produto }} - R$ {{ number_format($item['preco'], 2, ',', '.') }} x {{ $item['quantidade'] }}
                            <button wire:click="removerProduto({{ $index }})" class="btn btn-sm btn-danger">Remover</button>
                        </li>
                    @endforeach
                </ul>
                <div class="row my-3">
                    <h5 class="text-dark h5">Total: R$ {{ number_format($total, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md text-right">
            <!-- Botão de Finalizar Venda -->
            <button wire:click="finalizarVenda" class="btn btn-success">Finalizar Venda</button>
        </div>
    </div>
</div>
