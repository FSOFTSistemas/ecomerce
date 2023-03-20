@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('carrossel')
    <div class="row" style="padding: 30px; display:flex; justify-content: center; text-align: center">
        <div class="ecommerce-gallery col-lg-5 col-md-6" data-mdb-zoom-effect="true" data-mdb-auto-height="true">

            <img src="{{ asset($produto->foto) }}" id="mainImg" alt="Gallery image 1"
                class="img-fluid w-100 pb-1"width="300px" />

            <div class="small-img-group" style="display: flex; justify-content: center; ">
                <div class="small-img-col" style="flex-basis: 24%; cursor: pointer;">
                    <img src="{{ asset('img/imagem_3467.jpg') }}" alt="Gallery image 1" id="small-img1" class="small-img" />
                </div>
                <div class="small-img-col" style="flex-basis: 24%; cursor: pointer">
                    <img src="{{ asset($produto->foto) }}" alt="Gallery image 1" id="small-img2" class="small-img" />
                </div>
                <div class="small-img-col" style="flex-basis: 24%; cursor: pointer">
                    <img src="{{ asset($produto->foto) }}" alt="Gallery image 1" id="small-img3" class="small-img" />
                </div>
            </div>

        </div>
        <div class="col-lg-5 col-md-6" style="align-items: center; display: flex">
            <form action="{{ route('carrinho.adicionar', [$produto->id]) }}"
                style="display:flex; flex-direction: column; text-align: center; align-items: center; justify-content: space-between">
                <div style="display: flex; ">
                    <p style="font-weight: bold">Produto:</p>
                    <p>{{ $produto->nome }}</p>
                </div>
                <div style="display: flex;">
                    <p  style="font-weight: bold">Preço:</p>
                    <p>R${{ $produto->preco_venda }}</p>
                </div>
                <input type="number" placeholder="Quantidade" name="qtde" id="qtde">
                <p  style="font-weight: bold">Descrição do produto</p>
                <p>{{ $produto->descricao }}</p>
                <button type="submit" style="padding: 10px">Adicionar ao carrinho</button>
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
