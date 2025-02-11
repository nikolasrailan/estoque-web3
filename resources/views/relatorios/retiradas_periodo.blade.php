<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Relatório de Retiradas por Período') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  <h3>Relatório de Retiradas por Período</h3>
                  
                  <table class="table">
                      <thead>
                          <tr>
                              <th>Produto</th>
                              <th>Cliente</th>
                              <th>Quantidade</th>
                              <th>Valor Total</th>
                              <th>Data</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($relatorio as $item)
                              <tr>
                                  <td>{{ $item->produto->nome }}</td>
                                  <td>{{ $item->cliente->nome }}</td>
                                  <td>{{ $item->total_quantidade }}</td>
                                  <td>{{ number_format($item->total_valor, 2, ',', '.') }}</td>
                                  <td>{{ $item->data }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>

              </div>
          </div>
      </div>
  </div>
</x-app-layout>
