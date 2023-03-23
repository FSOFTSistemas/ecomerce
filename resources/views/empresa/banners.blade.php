@extends('adminlte::page')

@section('title', 'Banner::Edit')

@section('content_header')
    <h1 class="m-0 text-dark">Banners</h1>
    <hr>
@stop
@section('content')

    <form action="{{ route('salvar.banner') }}" method="POST" enctype="multipart/form-data" style="border: 0" >
        @csrf

        {{-- FOTO 1 --}}

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="form-group">
                        <label for="imagem">IMAGEM</label>
                        <input type="file" class="form-group" name="BannerMain" id="BannerMain">
                    </div>

                    <div class="col-12">
                        @if (isset($banner1))
                        <div class="form-group">
                        <label for="">Banner Main atual</label>
                            <img width="100" height="100" name="img" id="img" src="{{ $banner1 }}">
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>

        {{-- FOTO 2 --}}

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="form-group">
                        <label for="imagem">IMAGEM 2</label>
                        <input type="file" class="form-group" name="Banner2" id="Banner2">
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            @if (isset($banner2))
                                <label for="">Banner 2 atual</label>
                                <img width="100" height="100" name="img2" id="img2" src="{{ $banner2 }}">
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>

        {{-- FOTO 3 --}}

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="form-group">
                        <label for="imagem">IMAGEM 3</label>
                        <input type="file" class="form-group" name="Banner3" id="Banner3">
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            @if (isset($banner3))
                                <label for="">Banner 3 atual</label>
                                <img width="100" height="100" name="img3" id="img3" src="{{ $banner3 }}">
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>

        <div class="text-center">
            <button type="submit" style="width: 50%;" class="btn btn-success">SALVAR</button>
        </div>

    </form>
    <br>

@endsection

