@extends('adminlte::page')

@section('title', 'Empresa::Edit')

@section('content_header')

    <h1 class="m-0 text-dark">Empresa</h1>

    <hr>

@stop
@section('content')


<?php
$recupera = 1;
if (isset($config)) {
    if ($config->count() > 0) {
        $recupera = 0;
    }
}
?>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('criar.config') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social"
                    style="text-transform: uppercase;" value="{{ $recupera == 0 ? $config[0]->razao_social : '' }}">
            </div>

            <div class="form-group">
                <label for="">Nome Fantazia</label>
                <input type="text" class="form-control" id="nome_fantazia" name="nome_fantazia"
                    style="text-transform: uppercase;" value="{{ $recupera == 0 ? $config[0]->nome_fantazia : '' }}">
            </div>

            <div class="form-group">
                <label for="">CNPJ/CPF</label>
                <input type="text" onblur="this.value = formatarCpfCnpj(this.value);" maxlength="14" class="form-control" id="cnpj_cpf" name="cnpj_cpf"
                    value="{{ $recupera == 0 ? $config[0]->cnpj_cpf : '' }}">
            </div>

            <div class="form-group">
                <label for="">IE</label>
                <input type="text" class="form-control" id="ie" name="ie"
                    value="{{ $recupera == 0 ? $config[0]->ie : '' }}">
            </div>

            <div class="form-group">
                <label for="">Telefone</label>
                <input type="tel" maxlength="15" onkeyup="handlePhone(event)" class="form-control" id="telefone"
                    name="telefone" placeholder="(DD) 99999-9999" value="{{ $recupera == 0 ? $config[0]->telefone : '' }}">
            </div>

            <div class="form-group">
                <label for="">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" style="text-transform: uppercase;"
                    value="{{ $recupera == 0 ? $config[0]->endereco : '' }}">
            </div>

            <div class="form-group">
                <label for="">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" style="text-transform: uppercase;"
                    value="{{ $recupera == 0 ? $config[0]->cidade : '' }}">
            </div>

            <div class="form-group">
                <label for="">Chave Pix</label>
                <input type="text" class="form-control" id="chave_pix" name="chave_pix"
                    style="text-transform: uppercase;" value="{{ $recupera == 0 ? $config[0]->chave_pix : '' }}">
            </div>

            <div class="form-group">
                <label for="">Titular Chave Pix</label>
                <input type="text" class="form-control" id="pix_titular" name="pix_titular"
                    style="text-transform: uppercase;" value="{{ $recupera == 0 ? $config[0]->pix_titular : '' }}">
            </div>

            <div class="form-group">
                <label for="">TX id</label>
                <input type="text" class="form-control" id="tx_id" name="tx_id" style="text-transform: uppercase;"
                    value="{{ $recupera == 0 ? $config[0]->tx_id : '' }}">
            </div>


            <div class="text-center">
                <button type="submit" style="width: 50%;" class="btn btn-success">SALVAR</button>
            </div>
            <br>

            </form>
        </div>
    </div>

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
        function formatarCpfCnpj(valor) {
            // Remove qualquer caracter que não seja número
            valor = valor.replace(/\D/g, '');
            // Verifica se é CPF (11 dígitos)
            if (valor.length === 11) {
                // Formata o CPF ###.###.###-##
                return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }
            // Verifica se é CNPJ (14 dígitos)
            else if (valor.length === 14) {
                // Formata o CNPJ ##.###.###/####-##
                return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
            }
            // Não é CPF nem CNPJ
            else {
                return valor;
            }
        }
    </script>

@endsection
