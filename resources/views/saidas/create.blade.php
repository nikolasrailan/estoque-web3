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
                    <div class="form-group">
                        <label for="cliente_id">Cliente</label>
                        <select class="form-control" id="cliente_id" name="cliente_id" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="produto_id">Produto</label>
                        <select class="form-control" id="produto_id" name="produto_id" required>
                            @foreach($produtos as $produto)
                                <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}" data-estoque="{{ $produto->quantidade_disponivel }}">
                                    {{ $produto->nome }} (Estoque: {{ $produto->quantidade_disponivel }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required min="1">
                    </div>
                
                    <div class="form-group">
                        <label for="valor_total">Valor Total</label>
                        <input type="text" class="form-control" id="valor_total" name="valor_total" readonly>
                    </div>
                
                    <button type="submit" class="btn btn-success">Registrar Saída</button>
                </form>
                
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let quantidadeInput = document.getElementById("quantidade");
                        let produtoSelect = document.getElementById("produto_id");
                        let valorTotalInput = document.getElementById("valor_total");
                    
                        function atualizarValorTotal() {
                            let produtoSelecionado = produtoSelect.selectedOptions[0];
                            let preco = parseFloat(produtoSelecionado.getAttribute("data-preco"));
                            let quantidade = parseInt(quantidadeInput.value) || 0; // Evita NaN
                    
                            // Atualiza o valor total dinamicamente
                            valorTotalInput.value = (quantidade * preco).toFixed(2);
                        }
                    
                        quantidadeInput.addEventListener("input", atualizarValorTotal);
                        produtoSelect.addEventListener("change", atualizarValorTotal);
                    });
                    </script>
                    
                
              </div> 
              </div>
          </div>
      </div>
  </div>
</x-app-layout>