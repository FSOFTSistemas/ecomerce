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
                <div class="input-field">
                    <div class="row">
                        <div class="col-12">
                                @include('produto.form')
                                {{-- <a class="btn btn-secondary"
                                href="{{ route('produto.index') }}">Voltar</a> --}}
                                {{-- onclick="location.href = document.referrer;" // usada para voltar para a pagina anterior 
                                de forma generica --}}
                                <button class="btn btn-secondary" onclick="location.href = document.referrer;">Voltar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop