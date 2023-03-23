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
                    <input type="text" class="form-control" name="nome" id="nome"
                        style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="tel" maxlength="15" onkeyup="handlePhone(event)" class="form-control" id="telefone"
                    name="telefone" placeholder="(DD) 99999-9999">
                </div>

                <div class="form-group">
                    <label for="">CPF</label>
                    <input type="text" onblur="this.value = formatarCpf(this.value);" maxlength="11" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00">
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

    <script>
        const handlePhone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }
        const phoneMask = (value) => {
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
        function formatarCpf(valor) {
            // Remove qualquer caracter que não seja número
            valor = valor.replace(/\D/g, '');
            // Verifica se é CPF (11 dígitos)
            if (valor.length === 11) {
                // Formata o CPF ###.###.###-##
                return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }
            // Não é CPF
            else {
                return valor;
            }
        }
    </script>

@endsection
