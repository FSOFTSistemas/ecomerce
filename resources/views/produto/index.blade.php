@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Listar Produtos</h1>
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
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                @if($produto->item_ativo == 'sim')
                                    <tr>
                                        <td>{{ $produto->nome }}</td>
                                        <td>{{ $produto->descricao }}</td>
                                        <td>{{ $produto->preco_venda }}</td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('produto.show', $produto->id) }}">Visualizar</a>
                                            <a class="btn btn-warning"
                                                href="{{ route('produto.edit', $produto->id) }}">Editar</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('produto.destroy', $produto->id) }}">Deletar</a>
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
