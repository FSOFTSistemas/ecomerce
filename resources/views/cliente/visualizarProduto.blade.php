@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('carrossel')
<div class="row">
    <div class="ecommerce-gallery col-lg-5 col-md-6" " data-mdb-zoom-effect="true" data-mdb-auto-height="true">
 
         
              
                    <img src="{{ asset($produto->foto) }}"
                        alt="Gallery image 1" class="img-fluid w-100 pb-1"width="200px" />

                    <div class="small-img-group" style="display: flex; justify-content: space-between">
                        <div class="small-img-col" style="flex-basis: 24%; cursor: pointer;">
                            <img src="{{ asset($produto->foto) }}"
                                alt="Gallery image 1" class="small-img" width="200px"/>
                        </div>
                        <div class="small-img-col" style="flex-basis: 24%; cursor: pointer">
                            <img src="{{ asset($produto->foto) }}"
                                alt="Gallery image 1" class="small-img" width="200px"/>
                        </div>
                        <div class="small-img-col" style="flex-basis: 24%; cursor: pointer">
                            <img src="{{ asset($produto->foto) }}"
                                alt="Gallery image 1" class="small-img"width="200px" />
                        </div>
                    </div>
                
           

            
    </div>
    <div class="col-lg-5 col-md-6">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, atque. Libero odit quam quia tenetur, beatae ut numquam esse nemo odio placeat consectetur quod culpa delectus qui dicta at corrupti.</p>
    </div>
</div>

@endsection

@section('conteudo')



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

            <tr>
                <td> {{ $produto->nome }} </td>
                <td>{{ $produto->descricao }}</td>
                <td> {{ $produto->quantidade }}</td>
                <td> {{ $produto->preco_venda }}</td>
                <td> {{ $produto->desconto }} </td>
                <td>{{ $produto->precoTotal }}</td>
            </tr>


            <tr>
                <td colspan="6" style="text-align:right">Desconto total: </td>


            </tr>
            <tr>
                <td colspan="6" style="text-align:right"><strong>Total </strong></td>
                <td class="label label-important" style="display:block"> <strong> R$ </strong>
                </td>
            </tr>
        </tbody>
    </table>

@endsection
