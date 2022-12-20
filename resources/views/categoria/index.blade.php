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
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                @if($categoria->status == "ativo")
                                    <tr>
                                        <td>{{ $categoria->descricao }}</td>
                                        <td>{{ $categoria->status }}</td>
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ route('categoria.edit', $categoria->id) }}">Editar</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('categoria.destroy', $categoria->id) }}">Deletar</a>
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
