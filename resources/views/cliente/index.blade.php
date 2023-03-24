@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('carrossel')
    @include('cliente.carrossel')
@endsection

@section('conteudo')

    <div class="span9" style="padding-inline: 1%; width: 100%; text-align: center">
        <div class="categorias row" style="padding: 20px;">
            <h4>Categorias</h4>
            @if (isset($categorias))
                <ul style="list-style-type: none;margin: 0;padding: 0;verflow: hidden; display: inline-block; " id="sideManu"
                    class="nav nav-tabs nav-stacked">
                    @foreach ($categorias as $categoria)
                        <li style="float: left; padding: 5px;"><a
                                style="display: block; text-align: center; padding: 10px; text-decoration: none;"

                                href="{{ route('home.categoria', $categoria->id) }}">{{ strtoupper($categoria->descricao) }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        @if (isset($produtos))
            <div class="well well-small">
                <h4>Produtos em Destaque <a name="destaque"></a> <small class="pull-right"></small></h4>
                <div class="row-fluid">
                    <div id="featured" class="carousel slide">

                        <div class="carousel-inner">
                            <ul style="list-style-type: none;margin: 0;padding: 0;verflow: hidden; display: inline-block; ">
                            @foreach($produtos as $key => $prod)
                            <li>
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <h3>teste</h3>
                                <p>{{ $prod->nome }}</p>
                                <img src="{{ 'data:image/jpeg;base64,'.$prod->foto1 }}" alt="{{ $prod->nome }}">
                            </div>
                        </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>

                        <a class="left carousel-control" href="#featured" data-slide="prev" style="">‹</a>

                        <a class="right carousel-control" href="#featured" data-slide="next">›</a>
                    </div>
                </div>
            </div>
        @endif

        <h4>Produtos<a name="produtos"></a></h4>
        <ul class="thumbnails">
            @foreach ($produtos as $produto)
                <li class="span3">
                    <div class="thumbnail">
                        <img src="{{'data:image/jpeg;base64,'.$produto->foto1 }}" alt="" />
                        <div class="caption">
                            <h5>{{ $produto['nome'] }}</h5>
                            <p>
                                {{ $produto['descricao'] }}
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="/produtos/visualizar/{{$produto->id}}"> <i class="icon-zoom-in"></i></a>
                                {{-- <a class="btn" href="{{ route('carrinho.adicionar', $produto->id) }}">Adicionar
                                    <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> R$

                                    {{ $produto['preco_venda'] }}</a> --}}
                                </h4>



                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
