@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1 class="m-0 text-dark">Clientes</h1>
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
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>EMAIL</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            @foreach ($cliente as $clt)

                            <tbody>

                                <td>{{ $clt->id }}</td>
                                <td>{{ $clt->nome }}</td>
                                <td>{{ $clt->email }}</td>
                                <td>{{ $clt->cpf }}</td>
                                <td>{{ $clt->telefone }}</td>
                                <td>

                                    {{-- <button class="btn">
                                        <a href="{{ route('produto.show', $produto->id) }}"><i class="fas fa-eye"></i></a>
                                    </button> --}}

                                    <button class="btn">
                                        <a href="{{ route('user.edit', ['id' => $clt->id]) }}"><i class="fas fa-pen"></i></a>
                                    </button>

                                    <button class="btn">
                                        <a href="{{ route('user.destroy', ['id' => $clt->id]) }}"><i class="fas fa-trash-alt"></i></a>
                                    </button>

                                </td>
                            </tbody>

                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    @stop