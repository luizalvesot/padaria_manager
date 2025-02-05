<div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $venda->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Descrição</th>
                        <td>{{ $venda->descricao_venda }}</td>
                     </tr>
                    <tr>
                        <th scope="row">Cliente</th>
                        <td colspan="2">{{ $venda->cliente->nome_cliente }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Horário da abertura</th>
                        <td colspan="2" id="datahora">{{ $venda->horario_abertura }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Prazo de encerramento</th>
                        <td colspan="2" id="datahora">{{ $venda->prazo_encerramento ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Horário de encerramento</th>
                        <td colspan="2" id="datahora">{{ $venda->horario_encerramento ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Valor total da venda</th>
                        <td colspan="2">{{ $venda->valor_total_venda ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Forma de pagamento</th>
                        <td colspan="2">{{ $venda->forma_pagamento->descricao_fpagamento ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        @if($venda->status_pagamento_venda == "pago")
                            <td colspan="2" class="text-success">Pago</td>
                        @else
                            <td colspan="2" class="text-danger">Devedor</td>
                        @endif
                    </tr>
                    <tr>
                        <th scope="row">Valor a receber</th>
                        <td colspan="2">{{ $venda->valor_receber ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Valor recebido</th>
                        <td colspan="2">{{ $venda->valor_recebido ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Valor de troco</th>
                        <td colspan="2">{{ $venda->valor_troco ?? ' - ' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">Tipo da venda</th>
                        <td>{{ $venda->tipo_venda ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Observações</th>
                        <td colspan="2">{{ $venda->observacoes_venda }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{-- route('vendas.edit', $venda) --}}" class="btn btn-sm btn-success px-auto">Editar venda</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function formatCpf(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove qualquer caractere não numérico
            return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        }

        function formatCnpj(cnpj){
            cnpj = cnpj.replace(/\D/g, '');
            return cnpj.replace(/(\d{1})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
        }

        function formatRg(rg){
            //rg = rg.replace(/\D/g, '');
            return rg.replace(/(\d{2})(\d{3})(\d{3})/, '-$1.$2.$3');
        }

        function formatCelular(celular){
            celular = celular.replace(/\D/g, '');
            return celular.replace(/(\d{2})(\d{5})(\d{4})/, '($1)$2-$3');
        }

        function formatTelefone(telefone){
            telefone = telefone.replace(/\D/g, '');
            return telefone.replace(/(\d{2})(\d{4})(\d{4})/, '($1)$2-$3');
        }

        function formatCep(cep){
            cep = cep.replace(/\D/g, '');
            return cep.replace(/(\d{5})(\d{3})/, '$1-$2');
        }

        function formatData(data){
            data = data.replace(/\D/g, '');
            return data.replace(/(\d{4})(\d{2})(\d{2})/, '$3/$2/$1');
        }

        function formatDataHora(datahora){
            datahora = datahora.replace(/\D/g, '');
            return datahora.replace(/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/, '$3/$2/$1 $4:$5:$6');
        }

        $(document).ready(function() {
            var cpf = $('#cpf').text();
            $('#cpf').text(formatCpf(cpf));

            var cnpj = $('#cnpj').text();
            $('#cnpj').text(formatCnpj(cnpj));

            var rg = $('#rg').text();
            $('#rg').text(formatRg(rg));

            var celular = $('#celular').text();
            $('#celular').text(formatCelular(celular));

            var telefone = $('#telefone').text();
            $('#telefone').text(formatTelefone(telefone));

            var cep = $('#cep').text();
            $('#cep').text(formatCep(cep));

            var data = $('#data').text();
            $('#data').text(formatData(data));

            var datahora = $('#datahora').text();
            $('#datahora').text(formatDataHora(datahora));
        });

    </script>
</div>