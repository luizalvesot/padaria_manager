<div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">Código</th>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Descrição</th>
                        <td>{{ $produto->descricao_produto }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Código de barras</th>
                        <td colspan="2">{{ $produto->codigo_barras_produto ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Categoria</th>
                        <td colspan="2">{{ $produto->categoria_produto->nome_categoria }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        @if($produto->status_produto == "ativo")
                            <td colspan="2" class="text-success">Ativo</td>
                        @else
                            <td colspan="2" class="text-danger">Inativo</td>
                        @endif
                    </tr>
                    <tr>
                        <th scope="row">Fornecedor</th>
                        <td colspan="2">{{ $produto->fornecedor->nome_fornecedor }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo de medida</th>
                        <td colspan="2">{{ $produto->tipo_medida->representacao_medida }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Quantidade</th>
                        <td>{{ $produto->quantidade_produto }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">Preço de custo</th>
                        <td>R$ {{ $produto->preco_custo_produto }}</td>
                     </tr>
                    <tr>
                        <th scope="row">Preço de venda</th>
                        <td colspan="2">R$ {{ $produto->preco_venda_produto}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Desconto</th>
                        <td colspan="2">{{ $produto->desconto_produto }} %</td>
                    </tr>
                    <tr>
                        <th scope="row">Horário da última entrada</th>
                        <td colspan="2" id="data">{{ $produto->hora_ultima_entrada ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Horário da última saída</th>
                        <td colspan="2" id="data">{{ $produto->hora_ultima_saida ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Quantidade da última entrada</th>
                        <td colspan="2">{{ $produto->qtd_ultima_entrada ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Quantidade da última saída</th>
                        <td colspan="2">{{ $produto->qtd_ultima_saida ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Observações</th>
                        <td colspan="2">{{ $produto->observacoes_produto }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-success px-auto">Editar informações</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function formatData(data){
            data = data.replace(/\D/g, '');
            return data.replace(/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '$3/$2/$1 $4:$5:$6');
        }

        $(document).ready(function() {
            var data = $('#data').text();
            $('#data').text(formatData(data));
        });
    </script>
</div>