@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('conteudo')
    <div class="span9" style="width: 100%">
        <ul class="breadcrumb">
            <li><a href="{{ route('home')}}">Home</a> <span class="divider">/</span></li>
            <li class="active"> Carrinho</li>
        </ul>
        <h3> Carrinho
            {{-- <a href="{{ route('pedido.historico')}}" class="btn btn-large pull-right">
             Histórico de pedidos </a> --}}
        </h3>
        <hr class="soft" />


        <table class="table table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Descricao</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Desconto</th>
                    <th colspan="2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itens as $item)
                    <tr>
                        <td> <img width="60" src="{{ 'data:image/jpeg;base64,'.$item['foto1'] }}" alt="" /></td>
                        <td>{{ $item['descricao'] }}</td>
                        <td>
                            <div class="input-append">
                                <input class="span1" style="max-width:34px;" id="appendedInputButtons" size="16"
                                    type="text" placeholder="{{ $item['quantidade'] }}">
                                <a href="{{ route('carrinho.diminuir', $item['produto_id']) }}">
                                    <button class="btn" type="button">
                                        <i class="icon-minus"></i>
                                    </button>
                                </a>
                                {{-- <a href="{{ route('carrinho.adicionar', $item['produto_id']) }}">
                                    <button class="btn" type="button">
                                        <i class="icon-plus"></i>
                                    </button>
                                </a> --}}
                                <a href="{{ route('carrinho.remover', $item['produto_id']) }}">
                                    <button class="btn btn-danger" type="button">
                                        <i class="icon-remove icon-white"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                        <td>R$ {{ number_format($item['preco'], 2) }}</td>
                        <td>R$ {{ number_format($item['desconto'], 2) }}</td>
                        <td colspan="2">R$ {{ number_format(($item['total']), 2) }}</td>
                    </tr>
                @endforeach
                {{-- <tr>
                <td> <img width="60" src="themes/images/products/8.jpg" alt="" /></td>
                <td>MASSA AST<br />Color : black, Material : metal</td>
                <td>
                    <div class="input-append"><input class="span1" style="max-width:34px" placeholder="1"
                            size="16" type="text"><button class="btn" type="button"><i
                                class="icon-minus"></i></button><button class="btn" type="button"><i
                                class="icon-plus"></i></button><button class="btn btn-danger" type="button"><i
                                class="icon-remove icon-white"></i></button> </div>
                </td>
                <td>$7.00</td>
                <td>--</td>
                <td>$1.00</td>
                <td>$8.00</td>
            </tr>
            <tr>
                <td> <img width="60" src="themes/images/products/3.jpg" alt="" /></td>
                <td>MASSA AST<br />Color : black, Material : metal</td>
                <td>
                    <div class="input-append"><input class="span1" style="max-width:34px" placeholder="1"
                            size="16" type="text"><button class="btn" type="button"><i
                                class="icon-minus"></i></button><button class="btn" type="button"><i
                                class="icon-plus"></i></button><button class="btn btn-danger" type="button"><i
                                class="icon-remove icon-white"></i></button> </div>
                </td>
                <td>$120.00</td>
                <td>$25.00</td>
                <td>$15.00</td>
                <td>$110.00</td>
            </tr> --}}

                {{-- <tr>
                    <td colspan="6" style="text-align:right">Preço total: </td>
                    {{$total = 0;}}
                    @foreach ($itens as $item)
                        {{$total = $total + $item['total']}}
                    @endforeach
                    <td> {{$total}}</td>
                </tr> --}}
                <tr>
                    <td colspan="6" style="text-align:right">Desconto total: </td>

                    <td>R$ {{number_format($totalDesconto,2)}}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right"><strong>Total </strong></td>
                    <td class="label label-important" style="display:block"> <strong> R${{number_format($totalPreco,2)}} </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">Selecione a forma de pagamento:</td>
                    <td>
                        <form action="{{ route('pedido.cliente.visualizar', $pedido->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$pedido->id}}">
                            <select name="forma_pagamento" id="">
                                <option value="">Selecione</option>
                                <option value="dinheiro">Dinheiro</option>
                                <option value="pix">Pix</option>
                                <option value="cartao">Cartão</option>
                            </select>

                    </td>
                </tr>
            </tbody>
        </table>

        <a href="{{route('home')}}" class="btn btn-success"><i class="icon-arrow-left"></i> Continue comprando
        </a>
        <button class="btn btn-success pull-right" type="submit"> <i class="icon-arrow-right"></i>Concluir pedido</button>
    </form>
    </div>
@endsection