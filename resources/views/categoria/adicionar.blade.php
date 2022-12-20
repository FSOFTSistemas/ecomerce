@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Produto adicionar</h1>
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
                            <form action="{{route('categoria.store')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('categoria.form')

                                <button class="btn btn-primary"> Salvar </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop