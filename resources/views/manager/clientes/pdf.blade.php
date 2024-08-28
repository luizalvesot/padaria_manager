<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10%; 
        }
        table, th, td {
            border: 1px solid rgb(105, 105, 105);
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
    </style>
    <title>Listagem de clientes</title>
</head>
<body>
    <h1>Listagem de clientes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>CPF</th>
                <th>RG</th>
                <th>CNPJ</th>
                <th>Status</th>
                <th>Celular</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cliente as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome_cliente }}</td>
                    <td>{{ $item->tipo_cliente }}</td>
                    <td>{{ $item->cpf_cliente ?? ' - ' }}</td>
                    <td>{{ $item->rg_cliente ?? ' - ' }}</td>
                    <td>{{ $item->cnpj_cliente ?? ' - ' }}</td>
                    <td>{{ $item->status_cliente }}</td>
                    <td>{{ $item->telefone_celular_cliente ?? ' - ' }}</td>
                    <td>{{ $item->email_cliente ?? ' - ' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>