@extends('layouts.app')

@section('content')
<h2>Registrar Saída de Estoque</h2>

@if ($errors->any())
    <div>
        <strong>Erro!</strong> Verifique os campos abaixo.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('saidas.store') }}" method="POST">
    @csrf
    <label>Cliente:</label>
    <select name="cliente_id" required>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
        @endforeach
    </select>

    <label>Produto:</label>
    <select name="produto_id" required>
        @foreach($produtos as $produto)
            <option value="{{ $produto->id }}">{{ $produto->nome }} ({{ $produto->estoque }} disponíveis)</option>
        @endforeach
    </select>

    <label>Quantidade:</label>
    <input type="number" name="quantidade" required min="1">

    <button type="submit">Registrar</button>
</form>
@endsection
