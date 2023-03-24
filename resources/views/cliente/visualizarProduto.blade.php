@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('carrossel')
    <div class="row" style="padding: 30px; display:flex; justify-content: center; text-align: center">
        <div class="ecommerce-gallery col-lg-5 col-md-6" data-mdb-zoom-effect="true" data-mdb-auto-height="true">

            <img src="{{ $foto1}}" id="mainImg" alt="Gallery image 1"
                class="img-fluid w-100 pb-1"width="250px" />

            <div class="small-img-group" style="display: flex; justify-content: center; ">
                <div class="small-img-col" style="flex-basis: 24%; cursor: pointer;">
                    <img src="{{ $foto1 }}" alt="Gallery image 1" id="small-img1" class="small-img" width="150px"/>
                </div>
                <div class="small-img-col" style="flex-basis: 24%; cursor: pointer">
                    <img src="{{ $foto2}}" alt="Gallery image 1" id="small-img2" class="small-img" width="150px"/>
                </div>
                <div class="small-img-col" style="flex-basis: 24%; cursor: pointer">
                    <img src="{{ $foto3 }}"  alt="Gallery image 1" id="small-img3" class="small-img" width="150px"/>
                </div>
            </div>

        </div>
        <div class="col-lg-5 col-md-6" style="align-items: center; display: flex">
            <form action="{{ route('carrinho.adicionar', [$produto->id]) }}"
                style="display:flex; flex-direction: column; text-align: center; align-items: center; justify-content: space-between">
                <div style="display: flex; ">
                    <p style="font-weight: bold">Produto: </p>
                    <p>{{ $produto->nome }}</p>
                </div>

                <div style="display: flex; flex-direction: column" >
                    <p style="font-weight: bold" >Descrição do produto</p>
                    <p style="width: 300px">{{ $produto->descricao }}</p>
                </div>

                <div style="display: flex; font-weight: bold; color: green; font-size: 18px; margin: 12px 0%">
                    <p style="">Preço: </p>
                    <p > R${{ number_format($preco, 2) }}</p>
                </div>
                <input type="number" placeholder="Quantidade" name="qtde" id="qtde">

                <button class="btn btn-success" type="submit" style="padding: 10px">Adicionar ao carrinho</button>
            </form>

        </div>
    </div>

    <script>
        var mainImg = document.getElementById('mainImg');
        var smallImg1 = document.getElementById('small-img1');
        var smallImg2 = document.getElementById('small-img2');
        var smallImg3 = document.getElementById('small-img3');

        smallImg1.onclick = function() {
            mainImg.src = smallImg1.src;

        }
        smallImg2.onclick = function() {
            mainImg.src = smallImg2.src;
        }
        smallImg3.onclick = function() {
            mainImg.src = smallImg3.src;
        }
    </script>

@endsection

@section('conteudo')





@endsection
