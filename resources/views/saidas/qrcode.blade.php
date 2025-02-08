
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<x-app-layout>
  <x-slot name="header">
      <div class="d-flex justify-content-between align-items-center">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
              {{ __('Saida Registrada') }}
          </h2>
          <a href="/saidas"><button class="btn btn-primary">Voltar</button></a>
      </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-900">
                  <div class="form-container ">

                      <div class="container mt-4 ">
                          <h3 class="text-center">Saída registrada com sucesso!</h3>
                          <div class="text-center mt-3 d-flex justify-content-center">
                              {!! $qrCode !!}
                          </div>
                          
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
