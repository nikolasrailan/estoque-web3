<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<x-app-layout>
  <x-slot name="header">
      <div class="d-flex justify-content-between align-items-center">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
              {{ __('Lista de Saidas') }}
          </h2>
          <a href="{{ route('saidas.create') }}"><button class="btn btn-primary">nova saida</button></a>
      </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="form-container">

                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Cliente</th>
                                  <th>Produto</th>
                                  <th>Quantidade</th>
                                  <th>Valor Total</th>
                                  <th>Data</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($saidas as $saida)
                            <tr>
                                <td>{{ $saida->id }}</td>
                                <td>{{ $saida->cliente->nome }}</td>
                                <td>{{ $saida->produto->nome }}</td>
                                <td>{{ $saida->quantidade }}</td>
                                <td>R$ {{ number_format($saida->valor_total, 2, ',', '.') }}</td>
                                <td>{{ $saida->data_hora }}</td>
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
