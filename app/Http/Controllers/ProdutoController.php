<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

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
        return view('produto/index',['produtos' => $registros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto/adicionar');
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

        if(isset($dados['item_ativo'])){
            $dados['item_ativo'] = 'sim';
        }else{
            $dados['item_ativo'] = 'nao';
        }

        if(isset($dados['promocao_ativa'])){
            $dados['promocao_ativa'] = 'sim';
        }else{
            $dados['promocao_ativa'] = 'nao';
        }

        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $num =rand(1111,9999);
            $dir = "img/produtos";
            $ext = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ext;
            $imagem->move($dir,$nomeImagem);
            $dados['foto'] = $dir."/".$nomeImagem;
        }

        Produto::create($dados);

        return redirect()->route('home');
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
        return view('produto/visualizar',['produto'=>$produto]);
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
        return view('produto/editar',['produto'=>$produto]);
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

        if(isset($dados['item_ativo'])){
            $dados['item_ativo'] = 'sim';
        }else{
            $dados['item_ativo'] = 'nao';
        }

        if(isset($dados['promocao_ativa'])){
            $dados['promocao_ativa'] = 'sim';
        }else{
            $dados['promocao_ativa'] = 'nao';
        }

        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $num =rand(1111,9999);
            $dir = "img/produtos";
            $ext = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ext;
            $imagem->move($dir,$nomeImagem);
            $dados['foto'] = $dir."/".$nomeImagem;
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
}
