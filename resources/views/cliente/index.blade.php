@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('carrossel')
@include('cliente.carrossel')
@endsection

@section('conteudo')
<div class="span9">
    @if(isset($produtosDestaques[0]))
    <div class="well well-small">
        <h4>Produtos em Destaque <small class="pull-right"></small></h4>
        <div class="row-fluid">
            <div id="featured" class="carousel slide">
                <div class="carousel-inner">
                    {{-- @for ($contador = 0; $contador < count($produtosDestaques); $contador = $contador+4)
                    <div class="item active">
                        <ul class="thumbnails">
                            @if(isset($produtosDestaques[$contador]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="{{$produtosDestaques[$contador]['foto']}}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador]['nome'] }}</h5>
                                        <h4><a class="btn" href="product_details.html">Ver</a>
                                            <span class="pull-right">R${{$produtosDestaques[$contador]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if(isset($produtosDestaques[$contador+1]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="{{$produtosDestaques[$contador+1]['foto']}}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador+1]['nome'] }}</h5>
                                        <h4><a class="btn" href="product_details.html">Ver</a>
                                            <span class="pull-right">R${{$produtosDestaques[$contador+1]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if(isset($produtosDestaques[$contador+2]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="{{$produtosDestaques[$contador+2]['foto']}}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador+2]['nome'] }}</h5>
                                        <h4><a class="btn" href="product_details.html">Ver</a>
                                            <span class="pull-right">R${{$produtosDestaques[$contador+2]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>  
                            @endif
                            @if(isset($produtosDestaques[$contador+3]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="{{$produtosDestaques[$contador+3]['foto']}}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador+3]['nome'] }}</h5>
                                        <h4><a class="btn" href="product_details.html">Ver</a>
                                            <span class="pull-right">R${{$produtosDestaques[$contador+3]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @endfor
                    <div class="item active">
                        <ul class="thumbnails">
                            <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="{{$produtosDestaques[3]['foto']}}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[3]['nome'] }}</h5>
                                        <h4><a class="btn" href="product_details.html">Ver</a>
                                            <span class="pull-right">R${{$produtosDestaques[3]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="item active">
                        <ul class="thumbnails">
                            @for ($contador = 0; $contador < 4; $contador++)
                            @if (isset($produtosDestaques[$contador]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="product_details.html"><img
                                            src="{{ asset($produtosDestaques[$contador]['foto']) }}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador]['nome']}}</h5>
                                        <h4><a class="btn" href="product_details.html">Ver</a>
                                            <span class="pull-right">{{$produtosDestaques[$contador]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endfor
                            {{-- <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="themes/images/products/b1.jpg" alt=""></a>
                                    <div class="caption">
                                        <h5>Product name</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">$222.00</span></h4>
                                    </div>
                                </div>
                            </li>   --}}
                            {{-- <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="themes/images/products/b1.jpg" alt=""></a>
                                    <div class="caption">
                                        <h5>Product name</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">$222.00</span></h4>
                                    </div>
                                </div>
                            </li>                             --}}
                        </ul>
                    </div>
                    {{-- <div class="item">
                        <ul class="thumbnails">
                            <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="product_details.html"><img
                                            src="themes/images/products/5.jpg" alt=""></a>
                                    <div class="caption">
                                        <h5>Product name</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">$222.00</span></h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                    {{-- <div class="item">
                        <ul class="thumbnails">
                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="product_details.html"><img
                                            src="themes/images/products/9.jpg" alt=""></a>
                                    <div class="caption">
                                        <h5>Product name</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">$222.00</span></h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                    @for ($contador = 4; $contador < count($produtosDestaques); $contador = $contador+4)
                    <div class="item">
                        <ul class="thumbnails">
                            @if (isset($produtosDestaques[$contador]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="product_details.html"><img
                                            src="{{ asset($produtosDestaques[$contador]['foto']) }}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador]['nome']}}</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">{{$produtosDestaques[$contador]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if (isset($produtosDestaques[$contador+1]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="product_details.html"><img
                                            src="{{ asset($produtosDestaques[$contador+1]['foto']) }}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador+1]['nome']}}</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">{{$produtosDestaques[$contador+1]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if (isset($produtosDestaques[$contador+2]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="product_details.html"><img
                                            src="{{ asset($produtosDestaques[$contador+2]['foto']) }}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador+2]['nome']}}</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">{{$produtosDestaques[$contador+2]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if (isset($produtosDestaques[$contador+3]))
                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="product_details.html"><img
                                            src="{{ asset($produtosDestaques[$contador+3]['foto']) }}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{$produtosDestaques[$contador+3]['nome']}}</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a>
                                            <span class="pull-right">{{$produtosDestaques[$contador+3]['preco_venda']}}</span></h4>
                                    </div>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @endfor
                </div> 
                <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#featured" data-slide="next">›</a>
            </div>
        </div>
    </div>
    @endif
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
        <li class="span3">
            <div class="thumbnail">
                <a href="product_details.html"><img src="{{ asset($produto['foto']) }}"
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
        </li>
        @endforeach
    </ul>

</div>
@endsection
