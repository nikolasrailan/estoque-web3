@extends('layouts.app')

@section('content')
<h2>Saídas de Estoque</h2>
<table>
    <tr>
        <th>Cliente</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor Total</th>
        <th>Data</th>
    </tr>
    @foreach($saidas as $saida)
    <tr>
        <td>{{ $saida->cliente->nome }}</td>
        <td>{{ $saida->produto->nome }}</td>
        <td>{{ $saida->quantidade }}</td>
        <td>R$ {{ number_format($saida->valor_total, 2, ',', '.') }}</td>
        <td>{{ $saida->data_hora }}</td>
    </tr>
    @endforeach
</table>
<a href="{{ route('saidas.create') }}">Registrar Saída</a>
@endsection
