@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('conteudo')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ route('home')}}">Home</a> <span class="divider">/</span> Carrinho <span class="divider">/</span></li>
            <li class="active"> Histórico</li>
        </ul>
        <h3> Pedido Nº {{$pedido->id}}<a href="{{ route('pedido.historico')}}" class="btn btn-large pull-right">
             Histórico de pedidos </a>
        </h3>
        <hr class="soft" />
        {{-- <table class="table table-bordered">
        <tr>
            <th> I AM ALREADY REGISTERED </th>
        </tr>
        <tr>
            <td>
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="inputUsername">Username</label>
                        <div class="controls">
                            <input type="text" id="inputUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword1">Password</label>
                        <div class="controls">
                            <input type="password" id="inputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Sign in</button> OR <a href="register.html"
                                class="btn">Register Now!</a>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <a href="forgetpass.html" style="text-decoration:underline">Forgot
                                password ?</a>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    </table> --}}

    {{-- 
        @foreach ($produtos as $produto)
                    
                        <div class="card cartao">
                          <img class="card-img-top" src=""  alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"></p>
                            <p class="card-text">Quantidade:  | Valor: </p>
                            <p class="card-text"><small class="text-muted"><a class="btn btn-success"
                                href="{{ route('produto.show', $produto['idProduto']) }}">Visualizar</a></small></p>
                          </div>
                        </div>
                    
                    @endforeach --}}
        <table class="table table-bordered">
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
                        <td> <img width="60" src="{{ asset($produto['fotoProduto']) }}" alt="" /></td>
                        <td> {{ $produto['nomeProduto'] }} </td>
                        <td>{{ $produto['descricaoProduto'] }}</td>
                        <td> {{ $produto['quantidadeProduto'] }}</td>
                        <td> {{ $produto['precoProduto']}}</td>
                        <td> {{ $produto['descontoProduto']}} </td>
                        <td>{{ $produto['precoTotalProduto']}}</td>
                    </tr>
                @endforeach
               
                <tr>
                    <td colspan="6" style="text-align:right">Desconto total: </td>
                    
                    <td> {{$totalDesconto}}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right"><strong>Total </strong></td>
                    <td class="label label-important" style="display:block"> <strong> R${{$totalPreco}} </strong>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="#" class="btn btn-large" onclick="location.href = document.referrer;">Voltar</a>
        {{-- <a href="{{route('carrinho.concluir',$pedido->id)}}" class="btn btn-large pull-right">Concluir <i class="icon-arrow-right"></i></a> --}}

    </div>
@endsection