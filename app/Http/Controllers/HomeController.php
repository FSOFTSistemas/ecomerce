<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
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
        $servico = new HomeController();
        $produtos = $servico->BuscaEstoque();

        // dd($estoques);
        return view('home', ['produtos' => $produtos]);
    }

    public function BuscaEstoque(){
        $estoque = DB::table('produtos')
        ->select('produtos.estoque', 'produtos.nome')
        ->where('produtos.item_ativo', '=', 'sim')
        ->get();

        return $estoque;
    }

}
