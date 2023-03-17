@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Adiministradores</h1>
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

                            @foreach ($admin as $adm)

                            <tbody>
                                <td>{{ $adm->id }}</td>
                                <td>{{ $adm->nome }}</td>
                                <td>{{ $adm->email }}</td>
                                <td>{{ $adm->cpf }}</td>
                                <td>{{ $adm->telefone }}</td>
                                <td>
                                    {{-- <button class="btn">
                                        <a href="{{ route('produto.show', $produto->id) }}"><i class="fas fa-eye"></i></a>
                                    </button> --}}

                                    <button class="btn">
                                        <a href="{{ route('user.edit', $adm->id) }}"><i class="fas fa-pen"></i></a>
                                    </button>

                                    <button class="btn">
                                        <a href="{{ route('user.destroy', $adm->id) }}"><i class="fas fa-trash-alt"></i></a>
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