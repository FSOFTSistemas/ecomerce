@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Listar Categorias Desativadas</h1>
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
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                @if($categoria->status == "inativo")
                                    <tr>
                                        <td>{{ $categoria->descricao }}</td>
                                        <td>{{ $categoria->status }}</td>
                                        <td>
                                            <button class="btn">
                                            <a href="{{ route('categoria.reativa', $categoria->id) }}"><i class="fas fa-undo-alt"></i></a>
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
