<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = $this->BuscaEstoque();
        $vendas = $this->BuscaVendas();
        return view('home', ['produtos' => $produtos, 'vendas' => $vendas]);
    }

    public function BuscaEstoque(){
        $estoque = DB::table('produtos')
        ->select('produtos.estoque', 'produtos.nome')
        ->where('produtos.item_ativo', '=', 'sim')
        ->get();

        return $estoque;
    }

    public function BuscaVendas(){
        $mes = date('m');

        $vendas = DB::table('pedidos')
        ->whereMonth("data",$mes)
        ->where('pedidos.status', '=', 'finalizado')
        ->selectRaw('count(id) as cnt')->pluck('cnt');

        return $vendas;
    }



}
