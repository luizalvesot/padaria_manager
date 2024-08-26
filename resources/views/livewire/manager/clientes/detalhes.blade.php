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
                        <td colspan="2">{{ $cliente->nascimento_cliente }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo de cliente</th>
                        <td colspan="2">{{ $cliente->tipo_cliente }}</td>
                    </tr>
                    <tr>
                        <th scope="row">CPF</th>
                        <td colspan="2">{{ $cliente->cpf_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">RG</th>
                        <td colspan="2">{{ $cliente->rg_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">CNPJ</th>
                        <td colspan="2">{{ $cliente->cnpj_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome fantasia</th>
                        <td colspan="2">{{ $cliente->nome_fantasia_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td colspan="2">{{ $cliente->status_cliente }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Celular</th>
                        <td colspan="2">{{ $cliente->telefone_celular_cliente ?? ' - ' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Telefone fixo</th>
                        <td colspan="2">{{ $cliente->telefone_fixo_cliente ?? ' - ' }}</td>
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
                        <td>{{ $cliente->cep_cliente ?? ' - ' }}</td>
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
</div>