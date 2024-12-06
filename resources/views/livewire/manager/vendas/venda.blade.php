<div>
    <div class="row m-1 shadow-lg" style="height: 80vh;">
        <div class="col-md-4 shadow bg-white">
            <!-- Lista de Produtos -->
            <div class="row mt-2 mb-2 mx-1 shadow p-2" style="background-color: rgb(127, 146, 255)">
                <strong class="h5 text-white mb-3">Adicionar produtos</strong>
                <div>
                    <label class="text-white"><strong>Pesquisa: </strong></label>
                    <input type="search" class="form-control py-1 rounded borded rounded" id="search"
                        wire:model.live="searchTerm" placeholder="Pesquise pelo nome ou código do produto">
                    
                    @if ($searchTerm != '')
                        <table class="table table-hover table-sm text-center my-1">
                            <tbody>
                                @forelse ( $produtos as $produto )
                                    <tr>
                                        <td>{{ $produto->descricao_produto }}</td>
                                        <td>R$ {{ number_format($produto->preco_venda_produto, 2, ',', '.') }}</td>
                                        <td>
                                            <button wire:click="adicionarProduto({{ $produto->id }})" 
                                                    class="btn btn-sm btn-warning">
                                                <i class="bi bi-cart-plus-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="5">
                                            <span class="text-danger">Produto não encontrado...</span>
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>    
                    @else
                        <div></div>
                    @endif
                </div>
                
                 <!-- Campo de Código de Barras -->
                <div class="my-3">
                    <label class="text-white"><strong>Código de barras: </strong></label>
                    <input type="search" class="form-control py-1 bordered rounded" wire:model.live="barcode"  
                        id="barcode" placeholder="Escaneie ou digite o código de barras">

                    <!-- Exibir mensagem de erro se o produto não for encontrado -->
                    @if (session()->has('message'))
                        <div class="row bg-white mx-1 my-1">
                            <strong class="text-danger">{{ session('message') }}...</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row shadow p-2 mx-1 mb-2" style="background-color: rgba(185, 123, 123, 0.795)">
                <!-- Seleção do Cliente -->
                <div>
                    <label for="cliente" class="text-white"><strong>Cliente</strong></label>
                    <select wire:model="selectedCliente" class="form-select border rounded py-1">
                        <option value="">Selecione um cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome_cliente.' | '.$cliente->telefone_celular_cliente }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Seleção da Forma de Pagamento -->
                <div class="my-2">
                    <label for="formaPagamento" class="text-white"><strong>Forma de pagamento</strong></label>
                    <select wire:model="selectedFormaPagamento" class="form-select border rounded py-1">
                        <option value="">Selecione a forma de pagamento</option>
                        @foreach ($formasPagamento as $forma)
                            <option value="{{ $forma->id }}">{{ $forma->descricao_fpagamento }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Prazo de pagamento -->
                <div class="my-2 col-md-6">    
                    <label class="text-white" for="end_date"><strong>Prazo para pagamento</strong></label>
                    <input type="datetime-local" wire:model="selectedPrazoPagamento"
                            class="form-control py-1 bordered rounded">
                </div>
            </div>
        </div>

        <div class="col-md-8 p-2 bg-light">
            <!-- Carrinho de Compras -->
            <div>
                <div class="row text-center">
                    <h4 class="h4"><i class="bi bi-cart-fill"></i> Carrinho</h4>
                </div>
                <div class="row mx-2">
                    <div class="table-container">
                        <table class="table table-hover table-sm text-center my-1">
                            <thead>
                                <tr>
                                    <th scope="col">Qtd</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Adicionado em</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $carrinho as $index => $item )
                                <tr>
                                    <td class="text-center">
                                        <input type="number" class="form-control input-qtd border rounded" 
                                                wire:model.lazy="carrinho.{{ $index }}.quantidade" 
                                                wire:change="atualizarQuantidade({{ $index }}, $event.target.value)" 
                                                min="1" value="{{ $item['quantidade'] }}">
                                    </td>
                                    <td>{{ $item['produto']->descricao_produto }}</td>
                                    <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                                    <td>{{ $item['adicionado_em']->format('d/m/Y H:i:s') }}</td>
                                    <td>
                                        <button wire:click="removerProduto({{ $index }})">
                                            <i class="bi bi-trash3-fill text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="5">
                                        <span class="text-danger">Nenhum produto adicionado...</span>
                                    </th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row my-3 justify-content-center">
                    <div class="col-md-3 m-1">
                        <div class="row text-center">
                            <strong class="text-dark">Total</strong>
                        </div>
                        <div class="row">
                            <button class="btn btn-info py-2 px-auto rounded">
                                <strong class="text-white">
                                    R$ {{ number_format($total, 2, ',', '.') }}
                                </strong>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2 m-1">
                        <div class="row text-center">
                            <strong class="text-dark">Valor pago</strong>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary py-1 px-2 rounded">
                                <input type="number" class="form-control input-vlr border rounded" wire:model.lazy="valorPago" min="0" 
                                    step="0.01" placeholder="Digite o valor pago">
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3 m-1">
                        <div class="row text-center">
                            <strong class="text-dark">Troco</strong>
                        </div>
                        <div class="row">
                            <button class="btn btn-danger py-2 px-auto rounded">
                                <strong class="text-white">
                                    R$ {{ number_format($troco, 2, ',', '.') }}
                                </strong>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- coluna do botão de finalizar Venda -->
                <div class="col-md text-center">
                    <button wire:click="salvarVenda" class="btn btn-sm btn-secondary px-5 mx-1">Salvar</button>
                    <button wire:click="finalizarVenda" class="btn btn-sm btn-secondary px-5 mx-1">Finalizar Venda</button>
                </div>
            </div>
        </div>
    </div>
</div>
