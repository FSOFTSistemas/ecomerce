<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Endereco;
use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Foundation\Auth\User;
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
        $x = 0;
        $usuario = Auth::user();
        $pedido = Pedido::where('user_id','=',$usuario->id)->where('status','=','aberto')->first();
        if($pedido){
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
            $itens[$i]['foto1'] = $produto['foto1'];
            if($produto['promocao_ativa'] == 'sim'){
                $itens[$i]['preco'] = $produto['preco_promocao'];
            }else if($produto['promocao_ativa'] == 'nao'){
                $itens[$i]['preco'] = $produto['preco_venda'];
            }
            $itens[$i]['total'] = $itemPedidos[$i]['total'];
            $itens[$i]['desconto'] = $itemPedidos[$i]['desconto'];
            $itens[$i]['quantidade'] = $itemPedidos[$i]['quatidade'];
            $totalPreco = $totalPreco + $itemPedidos[$i]['total'];
            $totalDesconto = $totalDesconto + $itemPedidos[$i]['desconto'];
            $x = $itens[$i]['quantidade'] - $produto['estoque'];

        }

        if ($x > 0){
            // Toastr()->success('Item adicionado com sucesso', "Success");
            return redirect()->route('vizualizar',['itens' => $itens,'pedido' => $pedido,'totalPreco' => $totalPreco, 'totalDesconto' => $totalDesconto]);
        } else {
            // Toastr()->error('Erro ao adicionar item', "Error");
            return redirect()->route('home');
        }

        }
        else{
            return redirect()->route('home');
        }
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
        return view('cliente/product_summary');
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

    public function adicionar(Request $request)
    {
        $usuario = Auth::user();
        $produto = Produto::findOrFail($request->id);

        $pedidoAberto = Pedido::where('status','=','aberto')->get();
        $pedido = '';
        if(count($pedidoAberto)>0){
            $itemProduto = ItemPedido::create([
                'pedido_id' => $pedidoAberto[0]->id,
                'produto_id' => $produto->id,
                'quatidade' => $request->qtde,
                'subtotal' => $produto->preco_venda,
                'desconto' => 0,
                'total' => ($produto->preco_venda * $request->qtde)
            ]);
            $pedido = $pedidoAberto[0];
        }
        else{
            $pedidoNovo = Pedido::create([
                'user_id' => $usuario->id,
                'status' => 'aberto',
                'data' => date('Y-m-d'),
                'forma_pagamento' => ''
            ]);
            $itemProduto = ItemPedido::create([
                'pedido_id' => $pedidoNovo->id,
                'produto_id' => $produto->id,
                'quatidade' => $request->qtde,
                'subtotal' => $produto->preco_venda,
                'desconto' => 0,
                'total' => ($produto->preco_venda * $request->qtde)
            ]);
            $pedido = $pedidoNovo;
        }
        return redirect()->route('carrinho');
    }
    public function remover($id)
    {
        $usuario = Auth::user();
        $pedido = Pedido::where('user_id','=',$usuario->id)->where('status','=','aberto')->first();
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
        $pedido = Pedido::where('user_id','=',$usuario->id)->where('status','=','aberto')->first();
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
            $subtotal = $subtotal + $item['total'];
            $desconto = $desconto + $item['desconto'];
        }
        $pedido->subtotal = $subtotal;
        $pedido->desconto = $desconto;
        $pedido->total = $subtotal-$desconto;
        $pedido->status = "pendente";
        $pedido->update();


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
        $aux = array();
        $produtos = array();
        for ($i=0; $i < count($itensPedidos); $i++) {
            $aux["fotoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->foto1;
            $aux["nomeProduto"] = Produto::find($itensPedidos[$i]->produto_id)->nome;
            $aux["idProduto"] = Produto::find($itensPedidos[$i]->produto_id)->id;
            $aux["descricaoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->descricao;
            $aux["precoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->preco_venda;
            $aux["quantidadeProduto"] = $itensPedidos[$i]->quatidade;
            $aux["precoTotalProduto"] = $itensPedidos[$i]->total;

            $produtos[] = $aux;
        }

        return view('pedido/listarProdutoDoPedido',['produtos'=>$produtos,'pedido'=>$pedido]);
    }

    public function finalizar($id)
    {
        $pedido = Pedido::find($id);
        $pedido->status = "finalizado";
        $pedido->update();
        return redirect()->route("pedido.abertos");
    }

    public function historico()
    {
        $usuario = Auth::user();
        $pedidos = Pedido::where('user_id','=',$usuario->id)->where('status','!=','aberto')->get();

        return view('cliente/pedido_historico',['pedidos' => $pedidos]);
    }

    public function visualizarItensCliente(Request $request)
    {

        $pedido = Pedido::find($request->id);
        $pedido->forma_pagamento = $request->forma_pagamento;
        $cliente = User::find($pedido->user_id);
        $endereco = Endereco::find($cliente->endereco_id);
        $itensPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        $aux = array();
        $produtos = array();
        $totalPreco = 0;
        $totalDesconto = 0;
        for ($i=0; $i < count($itensPedidos); $i++) {
            $aux["fotoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->foto1;
            $aux["nomeProduto"] = Produto::find($itensPedidos[$i]->produto_id)->nome;
            $aux["idProduto"] = Produto::find($itensPedidos[$i]->produto_id)->id;
            $aux["descricaoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->descricao;
            $aux["precoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->preco_venda;
            $aux["quantidadeProduto"] = $itensPedidos[$i]->quatidade;
            $aux["precoTotalProduto"] = $itensPedidos[$i]->total;
            $aux["descontoProduto"] = $itensPedidos[$i]->desconto;

            $totalPreco = $totalPreco + $itensPedidos[$i]->total;
            $totalDesconto = $totalDesconto + $itensPedidos[$i]->desconto;

            $produtos[] = $aux;
        }
        return view('cliente/visualizarPedido',['cliente'=>$cliente, 'endereco'=>$endereco,'produtosPedidos'=>$produtos,'pedido'=>$pedido,'totalPreco' => $totalPreco, 'totalDesconto' => $totalDesconto]);
    }
    public function visualizarItensClienteGet($id)
    {
        $pedido = Pedido::find($id);
        $cliente = User::find($pedido->user_id);
        $endereco = Endereco::find($cliente->endereco_id);
        $itensPedidos = ItemPedido::where('pedido_id','=',$pedido->id)->get();
        $aux = array();
        $produtos = array();
        $totalPreco = 0;
        $totalDesconto = 0;
        for ($i=0; $i < count($itensPedidos); $i++) {
            $aux["fotoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->foto1;
            $aux["nomeProduto"] = Produto::find($itensPedidos[$i]->produto_id)->nome;
            $aux["idProduto"] = Produto::find($itensPedidos[$i]->produto_id)->id;
            $aux["descricaoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->descricao;
            $aux["precoProduto"] = Produto::find($itensPedidos[$i]->produto_id)->preco_venda;
            $aux["quantidadeProduto"] = $itensPedidos[$i]->quatidade;
            $aux["precoTotalProduto"] = $itensPedidos[$i]->total;
            $aux["descontoProduto"] = $itensPedidos[$i]->desconto;

            $totalPreco = $totalPreco + $itensPedidos[$i]->total;
            $totalDesconto = $totalDesconto + $itensPedidos[$i]->desconto;

            $produtos[] = $aux;
        }
        return view('cliente/visualizarPedido',['cliente'=>$cliente, 'endereco'=>$endereco,'produtosPedidos'=>$produtos,'pedido'=>$pedido,'totalPreco' => $totalPreco, 'totalDesconto' => $totalDesconto]);
    }

}
