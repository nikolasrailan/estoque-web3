<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaidaEstoque;
use App\Models\Produto;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Route;


class SaidaEstoqueController extends Controller
{
    public function index()
    {
        $saidas = SaidaEstoque::with('cliente', 'produto')->get();
        return view('saidas.index', compact('saidas'));
    }

    public function create()
    {
        $clientes = \App\Models\Cliente::all();
        $produtos = \App\Models\Produto::all();
        return view('saidas.create', compact('clientes', 'produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $produto = Produto::findOrFail($request->produto_id);

        if ($request->quantidade > $produto->estoque) {
            return back()->withErrors(['quantidade' => 'Quantidade insuficiente no estoque.']);
        }

        $valor_total = $request->quantidade * $produto->valor_unitario;

        // Registrar saída no banco
        $saida = SaidaEstoque::create([
            'cliente_id' => $request->cliente_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'valor_total' => $valor_total,
            'data_hora' => now(),
        ]);

        // Atualizar estoque
        $produto->decrement('estoque', $request->quantidade);

        // Gerar QR Code
        $qrCode = QrCode::size(200)->generate(json_encode($saida));

        return view('saidas.qrcode', compact('saida', 'qrCode'));
    }

    

}
