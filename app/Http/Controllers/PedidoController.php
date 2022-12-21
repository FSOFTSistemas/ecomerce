<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
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
        return view('cliente/product_summary');
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
        $pedido = Pedido::find($usuario->pedido_id);
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
            return redirect()->route('home');
        }else{
            $itemPedido = ItemPedido::find($itemPedidoId);
            $itemPedido->quatidade = $itemPedido->quatidade + 1;
            $itemPedido->subtotal = $itemPedido->subtotal * $itemPedido->quatidade;
            $itemPedido->desconto = $itemPedido->desconto * $itemPedido->quatidade;
            $itemPedido->total = $itemPedido->subtotal;
            $itemPedido->update();
            return redirect()->route('home');
        }
    }
}
