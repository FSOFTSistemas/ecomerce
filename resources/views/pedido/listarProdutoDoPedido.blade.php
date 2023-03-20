@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Itens do Pedido</h1>
    <hr>
    <br>
    <a href="/pedido/abertos"><button class="btn btn-secondary">Voltar</button></a>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-group cartoes">

                    @foreach ($produtos as $produto)

                        <div class="card cartao">
                          <img class="card-img-top" src="{{ asset($produto['fotoProduto']) }}"  alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">{{ $produto['nomeProduto'] }}</h5>
                            <p class="card-text">{{ $produto['descricaoProduto'] }}</p>
                            <p class="card-text">Quantidade: {{ $produto['quantidadeProduto'] }} | Valor: {{ $produto['precoTotalProduto']}}</p>
                            <p class="card-text"><small class="text-muted"><a class="btn btn-success"
                                href="{{ route('produto.show', $produto['idProduto']) }}">Visualizar</a></small></p>
                          </div>
                        </div>

                    @endforeach
                    </div>
                    @if ($pedido->status == "aberto")
                <div class="row fim-linha">

                    <a class="btn btn-warning" href="{{ route('pedido.finalizar', $pedido->id) }}">Finalizar pedido</a>

                </div>
                @endif
                </div>

            </div>

        </div>
    </div>

@endsection

{{-- @extends('../cliente.site')

@section('titulo', 'Loja de produtos')

@section('conteudo')
<div class="span9">
    <h4>Produtos </h4>
    <ul class="thumbnails">
        {{-- <li class="span3">
            <div class="thumbnail">
                <a href="product_details.html"><img src="themes/images/products/6.jpg"
                        alt="" /></a>
                <div class="caption">
                    <h5>Product name</h5>
                    <p>
                        Lorem Ipsum is simply dummy text.
                    </p>

                    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i
                                class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to
                            <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
                            href="#">$222.00</a></h4>
                </div>
            </div>
        </li> --}}
@foreach ($produtos as $produto)
    {{-- <li class="span3">
            <div class="thumbnail">
                <a href="product_details.html"><img src="{{$produto['foto']}}"
                        alt="" /></a>
                <div class="caption">
                    <h5>{{$produto['nome']}}</h5>
                    <p>
                        {{$produto['descricao']}}
                    </p>
                    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i
                                class="icon-zoom-in"></i></a> <a class="btn" href="{{route('carrinho.adicionar',$produto->id)}}">Adicionar
                            <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
                            href="#"> R$ {{$produto['preco_venda']}}</a></h4>
                </div>
            </div>
        </li> --}}
@endforeach
{{-- </ul>

</div>
@endsection --}}
