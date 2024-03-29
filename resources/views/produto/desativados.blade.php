@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Listar Produtos Desativados</h1>
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
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                @if($produto->item_ativo == 'nao')
                                    <tr>
                                        <td>{{ $produto->nome }}</td>
                                        <td>{{ $produto->descricao }}</td>
                                        <td> R$ {{ number_format($produto->preco_venda) }}</td>
                                        <td>

                                            <button class="btn">
                                            <a href="{{ route('produto.show', $produto->id) }}"><i class="fas fa-eye"></i></a>
                                            </button>

                                            <button class="btn">
                                            <a href="{{ route('produto.reativa', $produto->id) }}"><i class="fas fa-undo-alt"></i></a>
                                            </button>

                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @stop
