@extends('adminlte::page')

@section('title', 'User::Edit')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Usuário</h1>
@stop
@section('content')
    <form action="{{ route('user.update', ['idu' => $user->id, 'ide' => $end->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="card">
            <div class="card-body">

                <h3>Informações Pessoais</h3>

                <hr>

                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" style="text-transform: uppercase;"
                        value="{{ $user->nome }}">
                </div>

                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="number" class="form-control" name="telefone" id="telefone"
                        value="{{ $user->telefone }}">
                </div>

                <div class="form-group">
                    <label for="">CPF</label>
                    <input type="number" class="form-control" name="cpf" id="cpf"
                        value="{{ $user->cpf }}">
                </div>

                <div class="form-group">
                    <label for="">RG</label>
                    <input type="number" class="form-control" name="rg" id="rg"
                        value="{{ $user->rg }}">
                </div>

                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ $user->email }}">
                </div>

                <hr>

                <h3>Endereço</h3>

                <hr>

                <div class="form-group">
                    <label for="">Rua</label>
                    <input type="text" class="form-control" name="rua" id="rua"
                        value="{{ $end->rua }}">
                </div>

                <div class="form-group">
                    <label for="">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro"
                        value="{{ $end->bairro }}">
                </div>

                <div class="form-group">
                    <label for="">Número</label>
                    <input type="number" class="form-control" name="numero" id="numero"
                        value="{{ $end->numero }}">
                </div>

                <div class="form-group">
                    <label for="">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade"
                        value="{{ $end->cidade }}">
                </div>

                <div class="form-group">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" name="estado" id="estado"
                        value="{{ $end->estado }}">
                </div>

                <div class="form-group">
                    <label for="">País</label>
                    <input type="text" class="form-control" name="pais" id="pais"
                        value="{{ $end->pais }}">
                </div>

                <div class="text-center">
                    <button type="submit" style="width: 50%;" class="btn btn-success">ALTERAR</button>
                </div>
            </div>
        </div>

    </form>
@endsection