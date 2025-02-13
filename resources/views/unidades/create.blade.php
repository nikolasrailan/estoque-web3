<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<x-app-layout>
    <x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('Cadastro de Unidade de Medida') }}
        </h2>
            <a href="/unidades"><button class="btn btn-primary btn-lg">Listar Unidades</button></a>
</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="border:solid 1px black;">
                <div class="p-6 text-gray-900 dark:text-gray-900">
                <div class="form-container">
                <form action="{{ route('unidades.store') }}" method="POST" class="container mt-4">
                    @csrf
                <div style="padding:15px">
                        <h3 class="text-center font-weight-bold mt-4 mb-4">Unidade</h3>
                        <!-- Nome -->
                        <div class="form-group">
                            <label for="nome">Sigla</label>
                            <input type="text" id="sigla" name="sigla" class="form-control" required>
                        </div>

                        <!-- Descrição -->
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" required>
                        </div>
                         <!-- Botão de Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                        </div>
                    </form>
                </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>