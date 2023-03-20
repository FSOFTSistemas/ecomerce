@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Editar Categoria</h1>
<hr>
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
                            <form action="{{route('categoria.update', $categoria->id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">

                                @include('categoria.form')

                                <button class="btn btn-primary"> Atualizar </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop