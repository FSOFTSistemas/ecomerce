@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Listar Pedidos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table>
                            <thead>
                                <tr>
                                    <th>User_id</th>
                                    <th>Subtotal</th>
                                    <th>Desconto</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td>{{ $pedido->user_id }}</td>
                                        <td>{{ $pedido->subtotal }}</td>
                                        <td>{{ $pedido->desconto }}</td>
                                        <td>{{ $pedido->total }}</td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('pedido.visualizar', $pedido->id) }}">Visualizar itens</a>
                                                @if ($pedido->status == "aberto")
                                                <a class="btn btn-warning"
                                                href="{{ route('pedido.finalizar', $pedido->id) }}">Finalizar</a>
                                                @endif
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
