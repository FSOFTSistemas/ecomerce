@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
    <hr>
    <link rel="stylesheet" href="{{asset('site/bootstrap.js')}}">
@stop

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row" style="justify-content: center">
    <div class="card col-md-5 col-xs-10">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Vendas por mês
            </h3>

        </div>
        <div class="vendas">
            <canvas id="vendasMes"></canvas>
        </div>
    </div>

    <div class="col-md-1 col-xs-4"></div>

    <div class="card col-md-5 col-xs-10">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Estoque
            </h3>

        </div>
        <div class="estoque">
            <canvas id="estoqueDia"></canvas>
        </div>
    </div>

</div>

<?php
    $id = array();
    $label = array('Vendas');
    $cor1 ='#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    foreach ($vendas as $venda) {
    array_push($id, $venda);
}

    $nomeProd= array();
    $qtdeProd= array();
    $cores1 ='#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    $cores2 ='#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    foreach ($produtos as $produto) {
        array_push($nomeProd, $produto->nome);
        array_push($qtdeProd, $produto->estoque);
    }
?>

<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>

<script type="text/javascript" >
const vendas = new Chart(document.getElementById('vendasMes'), {
    type: 'bar',
    data: {
        labels: {{Js::from($label)}},
        datasets: [{
            label: 'Esse Mês',
            data:  {{Js::from($vendas)}},
            backgroundColor: {{Js::from($cor1)}}
        }]
    }
});
    const estoque = new Chart(document.getElementById('estoqueDia'), {
        type: 'bar',
        data: {
            labels: {{Js::from($nomeProd)}},
            datasets: [
                {
                label: 'Hoje',
                data:  {{Js::from($qtdeProd)}},
                backgroundColor: {{Js::from($cores1)}}
                }
            ]
        }
    });
</script>


@stop
