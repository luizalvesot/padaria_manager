<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
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
    <title>Listagem de fornecedores</title>
</head>
<body>
    <h1>Listagem de fornecedores</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Status</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Cidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fornecedor as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome_fornecedor }}</td>
                    <td>{{ $item->cnpj_fornecedor ?? ' - '}}</td>
                    @if($item->status_fornecedor === 1)
                        <td>Ativo</td>
                    @else
                        <td>Inativo</td>
                    @endif
                    <td>{{ $item->telefone_fixo_fornecedor ?? ' - ' }}</td>
                    <td>{{ $item->email_fornecedor ?? ' - ' }}</td>
                    <td>{{ $item->cidade_fornecedor ?? ' - '}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>