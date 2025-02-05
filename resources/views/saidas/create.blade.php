<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<x-app-layout>
  <x-slot name="header">
  <div class="d-flex justify-content-between align-items-center">
       <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
          {{ __('Registrar Saida do Estoque ') }}
      </h2>
          <a href="/saidas"><button class="btn btn-primary btn-lg">Listar Saidas</button></a>
</div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="border:solid 1px black;">
              <div class="p-6 text-gray-900 dark:text-gray-900">
              <div class="form-container">
              <form action="{{ route('saidas.store') }}" method="POST" class="container mt-4">
                  @csrf
              <div style="padding:15px">
                      <h3 class="text-center font-weight-bold mt-4 mb-4">Saida</h3>
                      
                      
                  </form>
              </div> 
              </div>
          </div>
      </div>
  </div>
</x-app-layout>