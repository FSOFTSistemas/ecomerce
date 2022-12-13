@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Produto Visualizar</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <p class="mb-0">Produto adicionar!</p> -->
                <div class="input-field">
                    <div class="row">
                        <div class="col-12">
                                @include('produto.form')
                                <a class="btn btn-secondary"
                                href="{{ route('produto.index') }}">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop