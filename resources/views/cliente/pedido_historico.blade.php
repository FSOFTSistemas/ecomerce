@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('conteudo')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ route('home')}}">Home</a> <span class="divider">/</span> Carrinho <span class="divider">/</span></li>
            <li class="active"> Histórico</li>
        </ul>
        <h3> Histórico de pedidos <a href="#" class="btn btn-success pull-right" onclick="location.href = document.referrer;">
            <i class="icon-arrow-left"></i>Voltar</a>
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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nº do pedido</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th colspan="4"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td> {{ $pedido->id}}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>{{ $pedido->total }}</td>
                        <td colspan="4"><a href="{{ route('pedido.cliente.visualizar', $pedido->id) }}" class="btn"> Visualizar</a></td>
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
            </tbody>
        </table>

        <a href="{{route('home')}}" class="btn btn-success"><i class="icon-arrow-left"></i> Continue comprando
        </a>

    </div>
@endsection