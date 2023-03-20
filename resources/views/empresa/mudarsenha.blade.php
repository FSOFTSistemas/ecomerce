@extends('adminlte::page')

@section('title', 'User::Edit')

@section('content_header')
    <h1 class="m-0 text-dark">Editar minha senha</h1>

    <hr>
@stop
@section('content')
    <form action="{{ route('senha.update', ['id' => $eu[0]->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="card">
            <div class="card-body">

                <h3>Informe a nova senha</h3>

                <hr>

                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" class="form-control" disabled name="email" id="email" value="{{ $eu[0]->email }}">
                </div>

                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Nova senha">
                </div>

                <div class="form-group">
                    <label for="">Confirmação de Senha</label>
                    <input type="password" class="form-control" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar senha">
                </div>


                <div class="text-center">
                    <button type="submit" style="width: 50%;" class="btn btn-success">SALVAR</button>
                </div>
            </div>
        </div>

    </form>
@endsection