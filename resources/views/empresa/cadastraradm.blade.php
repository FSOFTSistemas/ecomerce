@extends('adminlte::page')

@section('title', 'User::Edit')

@section('content_header')
    <h1 class="m-0 text-dark">Cadastrar Admin</h1>

    <hr>
@stop
@section('content')
    <form action="{{ route('salvar.adm') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-body">

                <h3>Informações Pessoais</h3>

                <hr>

                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="number" class="form-control" name="telefone" id="telefone">
                </div>

                <div class="form-group">
                    <label for="">CPF</label>
                    <input type="number" class="form-control" name="cpf" id="cpf">
                </div>

                <div class="form-group">
                    <label for="">RG</label>
                    <input type="number" class="form-control" name="rg" id="rg">
                </div>

                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha">
                </div>

                <div class="form-group">
                    <label for="">Confirmação de Senha</label>
                    <input type="password" class="form-control" name="confirmar_senha" id="confirmar_senha">
                </div>

                <hr>

                <h3>Endereço</h3>

                <hr>

                <div class="form-group">
                    <label for="">Rua</label>
                    <input type="text" class="form-control" name="rua" id="rua">
                </div>

                <div class="form-group">
                    <label for="">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro">
                </div>

                <div class="form-group">
                    <label for="">Número</label>
                    <input type="number" class="form-control" name="numero" id="numero">
                </div>

                <div class="form-group">
                    <label for="">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade">
                </div>

                <div class="form-group">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" name="estado" id="estado">
                </div>

                <div class="form-group">
                    <label for="">País</label>
                    <input type="text" class="form-control" name="pais" id="pais">
                </div>

                <div class="text-center">
                    <button type="submit" style="width: 50%;" class="btn btn-success">SALVAR</button>
                </div>
            </div>
        </div>

    </form>
@endsection