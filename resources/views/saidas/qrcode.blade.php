<x-app-layout>
  <div class="container mt-4">
      <h3 class="text-center">Saída registrada com sucesso!</h3>
      <div class="text-center mt-3">
          {!! $qrCode !!}
      </div>
      <a href="/saidas" class="btn btn-primary mt-3">Voltar</a>
  </div>
</x-app-layout>
