<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos Sem Estoque</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Relatório de Produtos Sem Estoque</h2>
    <table>
        <thead>
            <tr>
                <th>Nome do Produto</th>
                <th>Unidade</th>
                <th>Categoria</th>
                <th>Data em que o estoque findou</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->unidade }}</td>
                    <td>{{ $produto->categoria->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($produto->data_estoque_zero)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
