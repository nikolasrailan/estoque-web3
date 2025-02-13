<?php
    namespace App\Http\Controllers;
    use App\Models\Categoria;
    use Illuminate\Http\Request;

    class CategoriaController extends Controller
    {
        // Exibe todos as categorias
        public function index()
        {
            $categorias = Categoria::all();
            return view('categorias.index', compact('categorias'));
        }

        // Exibe o formulário para criar uma novo categoria
        public function create()
        {
            return view('categorias.create');
        }

        // Armazena uma nova categoria
        public function store(Request $request)
        {

            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
            ]);

            Categoria::create($request->all());

            return redirect()->route('categorias.index')
                            ->with('success', 'Categoria cadastrada com sucesso!');
        }

        // Exibe os detalhes de uma categoria
        public function show(Categoria $categoria)
        {
            return view('categorias.show', compact('categoria'));
        }

        // Exibe o formulário de edição de uma categoria
        public function edit(Categoria $categoria)
        {
            return view('categorias.edit', compact('categoria'));
        }

        // Atualiza os dados de uma categoria
        public function update(Request $request, Categoria $categoria)
        {
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
            ]);

            $categoria->update($request->all());

            return redirect()->route('categorias.index')
                            ->with('success', 'Categoria atualizada com sucesso!');
        }

        // Exclui uma categoria
        public function destroy(Categoria $categoria)
        {
            try {
                $categoria->delete();
                return redirect()->route('categorias.index')
                                ->with('success', 'Categoria excluída com sucesso!');
            } catch (\Illuminate\Database\QueryException $e) {
                // Verifica se é a violação de chave estrangeira (erro 1451)
                if ($e->getCode() == 23000) {
                    return redirect()->route('categorias.index')
                                    ->with('error', 'Erro, categoria vinculada');
                }
                
                // Em caso de outro erro, você pode capturar ou logar
                return redirect()->route('categorias.index')
                                ->with('error', 'Erro ao tentar excluir a categoria.');
            }
        }


    }