@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Listar Pedidos</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User_id</th>
                                    <th>Subtotal</th>
                                    <th>Desconto</th>
                                    <th>Total</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td>{{ $pedido->user_id }}</td>
                                        <td> R$ {{ number_format($pedido->subtotal, 2) }}</td>
                                        <td> R$ {{ number_format($pedido->desconto, 2) }}</td>
                                        <td> R$ {{ number_format($pedido->total, 2) }}</td>
                                        <td>

                                            <button class="btn">
                                                <a href="{{ route('pedido.visualizar', $pedido->id) }}"><i class="fas fa-eye"></i></a>
                                            </button>

                                            <button class="btn">
                                                @if ($pedido->status == "aberto")
                                                <a href="{{ route('pedido.finalizar', $pedido->id) }}">Finalizar</a>
                                                @endif
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @stop
