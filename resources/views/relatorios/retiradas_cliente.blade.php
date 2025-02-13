<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  
  </head>
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Relatorio Por Cliente') }}
            </h2>
            
            <a href="{{ route('relatorios.index') }}"><button class="btn btn-primary">Voltar</button></a>
        </div>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="form-container">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Nome do Produto</th>
                                    <th>Unidade</th>
                                    <th>Categoria</th>
                                    <th>Quantidade Retirada</th>
                                    <th>Valor Total</th>
                                    <th>Data da Retirada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($relatorio as $index => $registro)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $registro->cliente->nome }}</td>
                                        <td>{{ $registro->produto->nome }}</td>
                                        <td>{{ $registro->produto->unidade->sigla }}</td>
                                        <td>{{ $registro->produto->categoria->nome }}</td>
                                        <td class="font-weight-bold">{{ $registro->total_quantidade }}</td>
                                        <td>R$ {{ number_format($registro->total_valor, 2, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($registro->data)->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>

    
  </x-app-layout>
  