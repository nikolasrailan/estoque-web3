@extends('layouts.app')

@section('content')
<h2>Saída Registrada</h2>
<p>Cliente: {{ $saida->cliente->nome }}</p>
<p>Produto: {{ $saida->produto->nome }}</p>
<p>Quantidade: {{ $saida->quantidade }}</p>
<p>Valor Total: R$ {{ number_format($saida->valor_total, 2, ',', '.') }}</p>
<p>Data: {{ $saida->data_hora }}</p>

<h3>QR Code</h3>
{!! $qrcode !!}
<a href="{{ route('saidas.index') }}">Voltar</a>
@endsection
