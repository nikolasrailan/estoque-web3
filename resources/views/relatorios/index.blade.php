<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>
  
  <x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Relatórios') }}
            </h2>
        </div>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-900">
                    <div class="form-container text-center">
  
                        <h3 class="mb-4">Selecione um Relatório</h3>
  
                        <div class="d-flex flex-column gap-3">
                            <a href="{{ route('relatorios.retiradas.periodo') }}" class="btn btn-secondary mb-3">
                                Relatório de Retiradas por Período
                            </a>
  
                            <a href="{{ route('relatorios.retiradas.cliente') }}" class="btn btn-primary mb-3">
                                Relatório de Retiradas por Cliente
                            </a>
  
                            <a href="{{ route('relatorios.produtos.sem_estoque') }}" class="btn btn-secondary mb-3">
                                Relatório de Produtos Sem Estoque
                            </a>
  
                            <a href="{{ route('relatorios.produtos.com_estoque') }}" class="btn btn-primary">
                                Relatório de Produtos com Estoque
                            </a>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
  