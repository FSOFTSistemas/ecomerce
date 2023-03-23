@extends('cliente.site')

@section('titulo', 'Loja de produtos')


@section('conteudo')
    <ul class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a> <span class="divider">/</span></li>
        <li class="active"> Perfil </li>
    </ul>
    <h3> Perfil do Cliente
        {{-- <a href="{{ route('pedido.historico')}}" class="btn btn-large pull-right">
     Histórico de pedidos </a> --}}
    </h3>
    <hr class="soft" />
    <form action="{{ route('perfil.editar', ['idu' => $cliente->id, 'ide' => $endereco->id]) }}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PUT')
    <div class="card">
        <div class="card-body">

            <h4>Informações Pessoais</h4>

            <hr>

            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" style="text-transform: uppercase;"
                    value="{{ $cliente->nome }}">
            </div>

            <div class="form-group">
                <label for="">Telefone</label>
                <input type="number" class="form-control" name="telefone" id="telefone" value="{{ $cliente->telefone }}">
            </div>

            <div class="form-group">
                <label for="">CPF</label>
                <input type="number" class="form-control" name="cpf" id="cpf" value="{{ $cliente->cpf }}">
            </div>

            <div class="form-group">
                <label for="">RG</label>
                <input type="number" class="form-control" name="rg" id="rg" value="{{ $cliente->rg }}">
            </div>

            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $cliente->email }}">
            </div>

            <hr>

            <h4>Endereço</h4>

            <hr>

            <div class="form-group">
                <label for="">Rua</label>
                <input type="text" class="form-control" name="rua" id="rua" value="{{ $endereco->rua }}">
            </div>

            <div class="form-group">
                <label for="">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $endereco->bairro }}">
            </div>

            <div class="form-group">
                <label for="">Número</label>
                <input type="number" class="form-control" name="numero" id="numero" value="{{ $endereco->numero }}">
            </div>

            <div class="form-group">
                <label for="">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $endereco->cidade }}">
            </div>

            <div class="form-group">
                <label for="">Estado</label>
                <input type="text" class="form-control" name="estado" id="estado" value="{{ $endereco->estado }}">
            </div>

            <div class="form-group">
                <label for="">País</label>
                <input type="text" class="form-control" name="pais" id="pais" value="{{ $endereco->pais }}">
            </div>

            <div class="text-center">
                <button type="submit" style="width: 50%;" class="btn btn-success">ALTERAR</button>
            </div>
        </div>
    </div>
</form>
@endsection
