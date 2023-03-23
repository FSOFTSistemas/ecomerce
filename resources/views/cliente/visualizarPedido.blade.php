@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('conteudo')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a> <span class="divider">/</span> Carrinho <span class="divider">/</span>
            </li>
            <li class="active"> Histórico</li>
        </ul>
        <h3> Resumo do Pedido Nº {{ $pedido->id }}
            {{-- <a href="{{ route('pedido.historico')}}" class="btn btn-large pull-right">
             Histórico de pedidos </a> --}}
        </h3>
        <hr class="soft" />

        <div style="display: flex; flex-direction: column; ">
            <h4 style="font-weight: bold">Dados do cliente</h4>
            <table class="table table-bordered" style="">
                <tbody>
                    <tr>
                        <th width="15%">Nome</th>
                        <td> {{ $cliente->nome }} </td>
                    </tr>
                    <tr>
                        <th>CPF</th>
                        <td>{{ $cliente->cpf }}</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td> {{ $cliente->telefone }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td> {{ $cliente->email }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div style="display: flex; flex-direction: column;  ">
            <h4 style="font-weight: bold">Endereço</h4>
        <table class="table table-bordered" style="">
            <tbody>
                <tr>
                    <th width="15%">Rua</th>
                    <td> {{ $endereco->rua }} </td>
                </tr>
                <tr>
                    <th>Bairro</th>
                    <td>{{ $endereco->bairro }}</td>
                </tr>
                <tr>
                    <th>Número</th>
                    <td> {{ $endereco->numero }}</td>
                </tr>

                <tr>
                    <th>Cidade</th>
                    <td> {{ $endereco->cidade }}</td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td> {{ $endereco->estado }}</td>
                </tr>

            </tbody>
        </table>
    </div>
            
            

            <table class="table table-bordered" style="">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Desconto</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtosPedidos as $produto)
                        <tr>
                            <td> <img width="60" src="{{ 'data:image/jpeg;base64,'.$produto['fotoProduto'] }}" alt="" /></td>
                            <td> {{ $produto['nomeProduto'] }} </td>
                            <td>{{ $produto['descricaoProduto'] }}</td>
                            <td> {{ $produto['quantidadeProduto'] }}</td>
                            <td> {{ $produto['precoProduto'] }}</td>
                            <td> {{ $produto['descontoProduto'] }} </td>
                            <td>{{ $produto['precoTotalProduto'] }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="6" style="text-align:right">Desconto total: </td>

                        <td> {{ $totalDesconto }}</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:right"><strong>Total: </strong></td>
                        <td class="label label-important" style="display:block"> <strong> R${{ $totalPreco }} </strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:right;"><strong>Forma de pagamento: </strong></td>
                        <td>{{$pedido->forma_pagamento}}</td>
                    </tr>
                </tbody>
            </table>
        

        <a href="#" class="btn btn-success" onclick="location.href = document.referrer;">Voltar</a>
        <button class="btn btn-success pull-right" type="submit"><a href="{{route('carrinho.concluir', $pedido->id)}}"> <i class="icon-arrow-right"></i>Finalizar compra</a></button>
        {{-- <a href="{{route('carrinho.concluir',$pedido->id)}}" class="btn btn-large pull-right">Concluir <i class="icon-arrow-right"></i></a> --}}

    </div>
@endsection
