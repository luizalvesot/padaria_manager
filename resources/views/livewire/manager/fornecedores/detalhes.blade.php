<div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $fornecedor->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome</th>
                        <td>{{ $fornecedor->nome_fornecedor }}</td>
                    </tr>
                    <tr>
                        <th scope="row">CNPJ</th>
                        <td colspan="2" id="cnpj">{{ $fornecedor->cnpj_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome fantasia</th>
                        <td colspan="2">{{ $fornecedor->nome_fantasia_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        @if($fornecedor->status_fornecedor == 1)
                            <td colspan="2" class="text-success">Ativo</td>
                        @else
                            <td colspan="2" class="text-danger">Inativo</td>
                        @endif
                    </tr>
                    <tr>
                        <th scope="row">Telefone fixo</th>
                        <td colspan="2" id="telefone">{{ $fornecedor->telefone_fixo_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">E-mail</th>
                        <td colspan="2">{{ $fornecedor->email_fornecedor ?? ' - ' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <tr>
                        <th scope="row">CEP</th>
                        <td id="cep">{{ $fornecedor->cep_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Cidade</th>
                        <td>{{ $fornecedor->cidade_fornecedor ?? ' - ' }}</td>
                     </tr>
                    <tr>
                        <th scope="row">Estado</th>
                        <td colspan="2">{{ $fornecedor->estado_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Bairro</th>
                        <td colspan="2">{{ $fornecedor->bairro_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Logradouro</th>
                        <td colspan="2">{{ $fornecedor->logradouro_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Referência</th>
                        <td colspan="2">{{ $fornecedor->referencia_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Número</th>
                        <td colspan="2">{{ $fornecedor->numero_fornecedor ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Observações</th>
                        <td colspan="2">{{ $fornecedor->observacoes_fornecedor }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('fornecedors.edit', $fornecedor) }}" class="btn btn-sm btn-success px-auto">Editar informações</a>
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