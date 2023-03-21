<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Produto::all();
        $categorias = Categoria::where('status', '=', 'ativo')->get(); //talvez remover essa linha
        return view('produto/index', ['produtos' => $registros, 'categorias' => $categorias]);
    }

    public function desativados()
    {
        $registros = Produto::all();
        return view('produto/desativados', ['produtos' => $registros]);
    }

    public function welcome()
    {
        $registros = Produto::where('item_ativo', '=', 'sim')->get();
        $registosDestaque = Produto::where('item_destaque', '=', 'sim')->where('item_ativo', '=', 'sim')->get();
        $categorias = Categoria::all();
        // dd($registosDestaque);
        return view('cliente/index', ['produtos' => $registros, 'produtosDestaques' => $registosDestaque, 'categorias' => $categorias]);
        // return view('cliente/welcome',['produtos' => $registros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('status', '=', 'ativo')->get();
        return view('produto/adicionar', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dados = $request->all();
        if ($dados['categoria_id'] != "Selecione uma categoria") {

            if (isset($dados['item_ativo'])) {
                $dados['item_ativo'] = 'sim';
            } else {
                $dados['item_ativo'] = 'nao';
            }

            if (isset($dados['promocao_ativa'])) {
                $dados['promocao_ativa'] = 'sim';
            } else {
                $dados['promocao_ativa'] = 'nao';
            }

            if (isset($dados['item_destaque'])) {
                $dados['item_destaque'] = 'sim';
            } else {
                $dados['item_destaque'] = 'nao';
            }

            if ($request->hasFile('foto')) {
                $imagem = $request->file('foto');
                $num = rand(1111, 9999);
                $dir = "img/produtos";
                $ext = $imagem->guessClientExtension();
                $nomeImagem = "imagem_" . $num . "." . $ext;
                $imagem->move($dir, $nomeImagem);
                $dados['foto'] = $dir . "/" . $nomeImagem;
            }

            Produto::create($dados);

            return redirect()->route('produto.index');
        }else{
            $categorias = Categoria::where('status', '=', 'ativo')->get();
            $produto = new Produto();
            $produto->nome = $dados['nome'];
            $produto->estoque = $dados['estoque'];
            $produto->referencia = $dados['referencia'];
            $produto->codigo_de_barras = $dados['codigo_de_barras'];
            $produto->preco_venda = $dados['preco_venda'];
            $produto->preco_promocao = $dados['preco_promocao'];
            $produto->tamanho = $dados['tamanho'];
            $produto->descricao = $dados['descricao'];
            //dd($produto);
            return view('produto/adicionar', ['produto'=>$produto,'categorias' => $categorias]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto, $id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::where('status', '=', 'ativo')->get();
        return view('produto/visualizar', ['produto' => $produto , 'categorias' => $categorias]);
    }

    public function showCliente($id)
    {
        $usuario = Auth::user();
        $produto = Produto::find($id);
        // $categorias = Categoria::where('status', '=', 'ativo')->get();
        return view('cliente.visualizarProduto', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto,  $id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::where('status', '=', 'ativo')->get();
        return view('produto/editar', ['produto' => $produto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $dados = $request->all();

        if (isset($dados['item_ativo'])) {
            $dados['item_ativo'] = 'sim';
        } else {
            $dados['item_ativo'] = 'nao';
        }

        if (isset($dados['promocao_ativa'])) {
            $dados['promocao_ativa'] = 'sim';
        } else {
            $dados['promocao_ativa'] = 'nao';
        }

        if (isset($dados['item_destaque'])) {
            $dados['item_destaque'] = 'sim';
        } else {
            $dados['item_destaque'] = 'nao';
        }

        if ($request->hasFile('foto')) {
            $imagem = $request->file('foto');
            $num = rand(1111, 9999);
            $dir = "img/produtos";
            $ext = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ext;
            $imagem->move($dir, $nomeImagem);
            $dados['foto'] = $dir . "/" . $nomeImagem;
        }

        Produto::find($id)->update($dados);

        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        $produto->item_ativo = 'nao';
        $produto->update();

        return redirect()->route('produto.index');
    }

    public function reativar($id)
    {
        $produto = Produto::find($id);

        $produto->item_ativo = 'sim';
        $produto->update();

        return redirect()->route('produto.index');
    }

    public function categoriaHome($id)
    {
        $registros = Produto::where('item_ativo', '=', 'sim')->where('categoria_id', '=', $id)->get();
        $registosDestaque = Produto::where('item_destaque', '=', 'sim')->where('item_ativo', '=', 'sim')->get();
        $categorias = Categoria::all();
        return view('cliente/index', ['produtos' => $registros, 'produtosDestaques' => $registosDestaque, 'categorias' => $categorias]);
    }
}
