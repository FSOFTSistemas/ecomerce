<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        $pedido = Pedido::where('user_id','=',$usuario->id)->where('status','=','pendente')->first();
        $itemPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        $itens = array();
        $totalPreco = 0;
        $totalDesconto = 0;
        for ($i = 0; $i < count($itemPedidos); $i++) {
            $produto = Produto::where('id','=',$itemPedidos[$i]['produto_id'])->first();
            $itens[$i]['produto_id'] = $produto['id'];
            $itens[$i]['produto_id'] = $produto['id'];
            $itens[$i]['nome'] = $produto['nome'];
            $itens[$i]['descricao'] = $produto['descricao'];
            $itens[$i]['foto'] = $produto['foto'];
            if($produto['promocao_ativa'] == 'sim'){
                $itens[$i]['preco'] = $produto['preco_promocao'];
            }else{
                $itens[$i]['preco'] = $produto['preco_venda'];
            }
            $itens[$i]['total'] = $itemPedidos[$i]['total'];
            $itens[$i]['desconto'] = $itemPedidos[$i]['desconto'];
            $itens[$i]['quantidade'] = $itemPedidos[$i]['quatidade'];
            $totalPreco = $totalPreco + $itemPedidos[$i]['total'];
            $totalDesconto = $totalDesconto + $itemPedidos[$i]['desconto'];
        }
        return view('cliente/product_summary',['itens' => $itens,'pedido' => $pedido,'totalPreco' => $totalPreco, 'totalDesconto' => $totalDesconto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function adicionarQuantidade($id)
    {
        # code...

    }

    public function adicionar($id)
    {
        $usuario = Auth::user();
        $pedido = Pedido::where('user_id','=',$usuario->id)->where('status','=','pendente')->first();
        $produto = Produto::find($id);
        $itemPedidoId = 0;
        $produtoExiste = 0; // 0 - produto não existe ainda | 1 - produto já existe no pedido, apenas adicionar a quantidade
        $itensPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        foreach($itensPedidos as $item){
            if($item->produto_id == $produto->id){
                $produtoExiste = 1;
                $itemPedidoId = $item->id;
            }
        }
        if($produtoExiste == 0){
           
            $itemPedido = new ItemPedido();
            $itemPedido->pedido_id = $pedido->id;
            $itemPedido->produto_id = $produto->id;
            $itemPedido->quatidade = 1;
            if($produto->promocao_ativa == 'sim'){
                $itemPedido->subtotal = $produto->preco_promocao;
                $itemPedido->desconto = ($produto->preco_venda - $produto->preco_promocao);
            }else{
                $itemPedido->subtotal = $produto->preco_venda;
                $itemPedido->desconto = 0;
            }
            $itemPedido->total = $itemPedido->subtotal;
        
            $itemPedido->save();
        }else{
            $itemPedido = ItemPedido::find($itemPedidoId);
            $itemPedido->quatidade = $itemPedido->quatidade + 1;
            if($produto->promocao_ativa == 'sim'){
                $itemPedido->subtotal = $produto->preco_promocao * $itemPedido->quatidade;
                $itemPedido->desconto = ($produto->preco_venda - $produto->preco_promocao) * $itemPedido->quatidade;
            }else{
                $itemPedido->subtotal = $produto->preco_venda * $itemPedido->quatidade;
                $itemPedido->desconto = 0;
            }
            $itemPedido->total = $itemPedido->subtotal;
            $itemPedido->update();
        }
        return redirect()->route('carrinho');
    }
    public function remover($id)
    {
        $usuario = Auth::user();
        $pedido = Pedido::where('user_id','=',$usuario->id)->where('status','=','pendente')->first();
        $produto = Produto::find($id);
        $itemPedidoId = 0;
        $itensPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        foreach($itensPedidos as $item){
            if($item->produto_id == $produto->id){
                $itemPedidoId = $item->id;
            }
        }

        
        $itemPedido = ItemPedido::find($itemPedidoId);
        ItemPedido::find($itemPedido->id)->delete();

        return redirect()->route('carrinho');
    }

    public function diminuir($id)
    {
        $usuario = Auth::user();
        $pedido = Pedido::where('user_id','=',$usuario->id)->where('status','=','pendente')->first();
        $produto = Produto::find($id);
        $itemPedidoId = 0;
        $itensPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        foreach($itensPedidos as $item){
            if($item->produto_id == $produto->id){
                $itemPedidoId = $item->id;
            }
        }
        
        $itemPedido = ItemPedido::find($itemPedidoId);
        $itemPedido->quatidade = $itemPedido->quatidade - 1;
        if($produto->promocao_ativa == 'sim'){
            $itemPedido->subtotal = $produto->preco_promocao * $itemPedido->quatidade;
            $itemPedido->desconto = ($produto->preco_venda - $produto->preco_promocao) * $itemPedido->quatidade;
        }else{
            $itemPedido->subtotal = $produto->preco_venda * $itemPedido->quatidade;
            $itemPedido->desconto = 0;
        }
        $itemPedido->total = $itemPedido->subtotal;
        $itemPedido->update();
        if( $itemPedido->quatidade == 0){
            $this->remover($id);
        }
        return redirect()->route('carrinho');
    }
    public function concluir($id)
    {
        $pedido = Pedido::find($id);
        $itensPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        $subtotal = 0;
        $desconto = 0;
        foreach ($itensPedidos as $item) {
            $subtotal = $subtotal + $item['subtotal'];
            $desconto = $desconto + $item['desconto'];
        }
        $pedido->subtotal = $subtotal;
        $pedido->desconto = $desconto;
        $pedido->total = $subtotal-$desconto;
        $pedido->status = "aberto";
        $pedido->update();

        $newPedido = new Pedido();
        $newPedido->status = "pendente";
        $newPedido->user_id = Auth::user()->id;
        $newPedido->save();

        return redirect()->route('home');
    }

    public function pedidosAbertos()
    {
        $pedidos = Pedido::where('status','=','aberto')->get();
        return view('pedido/index',['pedidos'=>$pedidos]);
    }

    public function pedidosFinalizados()
    {
        $pedidos = Pedido::where('status','=','finalizado')->get();
        return view('pedido/index',['pedidos'=>$pedidos]);
    }

    public function visualizarItens($id)
    {
        $pedido = Pedido::find($id);
        $itensPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        $produtos = array();
        for ($i=0; $i < count($itensPedidos); $i++) { 
            $produtos[] = Produto::find($itensPedidos[$i]->produto_id);
        }
        // dd($produtos[0]->nome);
        return view('pedido/listarProdutoDoPedido',['produtos'=>$produtos]);
    }

    public function finalizar($id)
    {
        $pedido = Pedido::find($id);
        $pedido->status = "finalizado";
        $pedido->update();
        return redirect()->route("pedido.abertos");
    }
}
