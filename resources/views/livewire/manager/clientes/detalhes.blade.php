<div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{ $cliente->nome_cliente }}</td>
                     </tr>
                    <tr>
                        <th scope="row">Data de nascimento</th>
                        <td colspan="2" id="data">{{ $cliente->nascimento_cliente }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo de cliente</th>
                        <td colspan="2">{{ $cliente->tipo_cliente }}</td>
                    </tr>
                    <tr>
                        <th scope="row">CPF</th>
                        <td colspan="2" id="cpf">{{ $cliente->cpf_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">RG</th>
                        <td colspan="2" id="rg">{{ $cliente->rg_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">CNPJ</th>
                        <td colspan="2" id="cnpj">{{ $cliente->cnpj_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome fantasia</th>
                        <td colspan="2">{{ $cliente->nome_fantasia_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        @if($cliente->status_cliente == 1)
                            <td colspan="2" class="text-success">Ativo</td>
                        @else
                            <td colspan="2" class="text-danger">Inativo</td>
                        @endif
                    </tr>
                    <tr>
                        <th scope="row">Celular</th>
                        <td colspan="2" id="celular">{{ $cliente->telefone_celular_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Telefone fixo</th>
                        <td colspan="2" id="telefone">{{ $cliente->telefone_fixo_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">E-mail</th>
                        <td colspan="2">{{ $cliente->email_cliente ?? ' - ' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">CEP</th>
                        <td id="cep">{{ $cliente->cep_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Cidade</th>
                        <td>{{ $cliente->cidade_cliente ?? ' - ' }}</td>
                     </tr>
                    <tr>
                        <th scope="row">Estado</th>
                        <td colspan="2">{{ $cliente->estado_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Bairro</th>
                        <td colspan="2">{{ $cliente->bairro_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Logradouro</th>
                        <td colspan="2">{{ $cliente->logradouro_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Referência</th>
                        <td colspan="2">{{ $cliente->referencia_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Número</th>
                        <td colspan="2">{{ $cliente->numero_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Observações</th>
                        <td colspan="2">{{ $cliente->observacoes }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-success px-auto">Editar informações</a>
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
        });

    </script>
</div>