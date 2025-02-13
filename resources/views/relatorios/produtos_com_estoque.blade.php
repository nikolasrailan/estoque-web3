<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>
  
  <x-app-layout>
      <x-slot name="header">
          <div class="d-flex justify-content-between align-items-center">
              <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                  {{ __('Relatório de Produtos com Estoque') }}
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
                                      <th>Nome do Produto</th>
                                      <th>Unidade</th>
                                      <th>Categoria</th>
                                      <th>Quantidade</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($produtos as $index => $produto)
                                      <tr>
                                          <td>{{ $index + 1 }}</td>
                                          <td>{{ $produto->nome }}</td>
                                          <td>{{ $produto->unidade->sigla }} ({{ $produto->unidade->descricao }})</td>
                                          <td>{{ $produto->categoria->nome }}</td>
                                          <td class="font-weight-bold">{{ $produto->estoque }}</td>
                                          
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
  