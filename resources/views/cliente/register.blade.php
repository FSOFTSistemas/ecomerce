@extends('cliente.site')

@section('titulo', 'Loja de produtos')

@section('conteudo')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a> <span class="divider">/</span></li>
            <li class="active">Registro</li>
        </ul>
        <h3>Registro</h3>
        <div class="well">
            <form class="form-horizontal" action="{{ route('user.store') }}" method="POST">
                {{ csrf_field() }}
                <h4>Informações pessoais</h4>
                <div class="control-group">
                    <div class="control-group">
                        <label class="control-label" for="inputFname1"> Nome </label>
                        <div class="controls">
                            <input type="text" id="inputFname1" name="nome" placeholder="Nome">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputLnam">Telefone</label>
                        <div class="controls">
                            <input type="text" id="inputLnam" name="telefone" placeholder="Telefone">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputLnam">CPF</label>
                        <div class="controls">
                            <input type="text" id="inputLnam" name="cpf" placeholder="CPF">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputLnam">RG</label>
                        <div class="controls">
                            <input type="text" id="inputLnam" name="rg" placeholder="RG">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_email">Email</label>
                        <div class="controls">
                            <input type="text" id="input_email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword1">Senha</label>
                        <div class="controls">
                            <input type="password" id="inputPassword1" name="senha" placeholder="Senha">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword1">Confirmar senha</label>
                        <div class="controls">
                            <input type="password" id="inputPassword1" name="confirmar_senha" placeholder="Senha">
                        </div>
                    </div>


                    {{-- <div class="alert alert-block alert-error fade in">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting
                                    industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div> --}}

                    <h4>Endereço</h4>
                    <div class="control-group">
                        <label class="control-label" for="inputFname">Rua</label>
                        <div class="controls">
                            <input type="text" id="inputFname" name="rua" placeholder="Rua">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputLname">Número</label>
                        <div class="controls">
                            <input type="text" id="inputLname" name="numero" placeholder="Número" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="company">Bairro</label>
                        <div class="controls">
                            <input type="text" id="company" name="bairro" placeholder="Bairro" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="address">Cidade</label>
                        <div class="controls">
                            <input type="text" id="address" name="cidade" placeholder="Cidade" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="address2">Estado</label>
                        <div class="controls">
                            <input type="text" id="address2" name="estado" placeholder="Estado" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="city">Pais</label>
                        <div class="controls">
                            <input type="text" id="city" name="pais" placeholder="Pais" value="Brasil" />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="email_create" value="1">
                            <input type="hidden" name="is_new_customer" value="1">
                            <input class="btn btn-large btn-success" type="submit" value="Salvar" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
