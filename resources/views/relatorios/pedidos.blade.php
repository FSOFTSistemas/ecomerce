@extends('adminlte::page')

@section('title', 'Relatórios')

@section('content_header')
    <h1 class="m-0 text-dark">Relatório de Pedidos</h1>
    <hr>
@stop
@section('content')

    <div class="card text-center">

        <div class="card-body">
            <div class="row">

                <form class="" action="{{ route('filter.pedido') }}" method="POST">
                    @csrf

                    <div class="col">
                        <div class="row">

                            <div class="col" style="text-align: center">
                                <label for="nome">Data Inicial: </label>
                                <input type="date" name="inicial" id="inicial">
                            </div>
                            <div class="col" style="text-align: center">
                                <label for="nome">Data Final: </label>
                                <input type="date" name="final" id="final">
                            </div>

                            <div class="col" style="text-align: center">
                                <input class="btn btn-success" type="submit" value="Pesquisar">
                            </div>

                        </div>
                    </div>
                </form>

                <form class="" action="{{ route('imprime.pedido') }}" method="POST">
                    @csrf
                    <div class="col">

                        <div class="row" style="text-align: right">
                                <input class="btn btn-secondary" type="submit" value="Imprimir">
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="container overflow-auto">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Subtotal</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($pedidos as $pdd)
                                <tr>
                                    <td>{{ $pdd->data }}</td>
                                    <td>{{ $pdd->user_id }}</td>
                                    <td>R$ {{ number_format($pdd->subtotal, 2) }}</td>
                                    <td>R$ {{ number_format($pdd->total, 2) }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection
