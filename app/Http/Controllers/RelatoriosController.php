<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaidaEstoque;
use App\Models\Produto;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as Pdf;

class RelatoriosController extends Controller
{
    public function index()
    {
        return view('relatorios.index');
    }

    public function relatorioRetiradasPorPeriodo(Request $request)
    {
        $periodo = $request->input('periodo', 'diario'); // Padrão: diário

        $query = SaidaEstoque::with('produto', 'cliente')
            ->selectRaw('produto_id, cliente_id, SUM(estoque) as total_quantidade, 
                        SUM(valor_total) as total_valor, DATE(data_hora) as data')
            ->groupBy('produto_id', 'cliente_id', 'data_hora');

        if ($periodo === 'semanal') {
            $query->selectRaw('WEEK(data_hora) as data')->groupByRaw('WEEK(data_hora)');
        } elseif ($periodo === 'mensal') {
            $query->selectRaw('MONTH(data_hora) as data')->groupByRaw('MONTH(data_hora)');
        }

        $relatorio = $query->get();

        return view('relatorios.retiradas_periodo', compact ('relatorio', 'periodo'));
    }

    public function relatorioRetiradasPorCliente()
    {
        $relatorio = SaidaEstoque::with('produto', 'cliente', 'produto.unidade', 'produto.categoria')
            ->selectRaw('cliente_id, produto_id, SUM(quantidade) as total_quantidade, 
                        SUM(valor_total) as total_valor, DATE(data_hora) as data')
            ->groupBy('cliente_id', 'produto_id', 'data') // Aqui mudou de 'data_hora' para 'data'
            ->get();

        return view('relatorios.retiradas_cliente', compact('relatorio'));
    }



    public function relatorioProdutosComEstoque()
    {
        $produtos = Produto::where('estoque', '>', 0) // Apenas produtos com estoque maior que 0
            ->select('id', 'nome', 'id_unidade', 'id_categoria', 'estoque')
            ->get();

        return view('relatorios.produtos_com_estoque', compact('produtos'));
    }



    public function gerarRelatorioProdutosSemEstoque()
    {
        // Busca produtos com estoque zerado e data em que zeraram
        $produtos = Produto::where('estoque', 0)
            ->orderBy('created_at', 'desc') 
            ->get();

        return view('relatorios.produtos_sem_estoque', compact('produtos'));
    }

}
