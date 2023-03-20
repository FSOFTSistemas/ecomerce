@extends('adminlte::page')

@section('title', 'Banner::Edit')

@section('content_header')
    <h1 class="m-0 text-dark">Banners</h1>
    <hr>
@stop
@section('content')

    <form action="{{ route('salvar.banner') }}" method="POST" enctype="multipart/form-data">
        @csrf

                                                                        {{-- FOTO 1 --}}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <label for=""><h4>Banner principal</h4></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="BannerMain" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <label for=""><p>OBS: A imagem deve ter dimensões 500x500.</p></label>
                </div>
                <div class="col-12">
                    @if (isset($banner->foto))
                    <label for="">Banner Pricipal atual</label>
                        <img src="{{ asset($banner[0]->foto) }}" class="rounded float-left" width="150">
                    @endif
                </div>
            </div>

        </div>
    </div>

                                                                        {{-- FOTO 2 --}}

    <div class="card">
        <div class="card-body">
    <div class="row">
        <div class="col-12">
            <label for=""><h4>Banner 2</h4></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="Banner2" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <label for=""><p>OBS: A imagem deve ter dimensões 500x500.</p></label>
        </div>
        <div class="col-12">
            @if (isset($banner->foto))
            <label for="">Banner 2 atual</label>
                <img src="{{ asset($banner->foto) }}" class="rounded float-left" width="150">
            @endif
        </div>
    </div>

        </div>
    </div>

                                                                        {{-- FOTO 3 --}}

    <div class="card">
        <div class="card-body">
    <div class="row">
        <div class="col-12">
            <label for=""><h4>Banner 3</h4></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="Banner3" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <label for=""><p>OBS: A imagem deve ter dimensões 500x500.</p></label>
        </div>
        <div class="col-12">
            @if (isset($banner->foto))
            <label for="">Banner 3 atual</label>
                <img src="{{ asset($banner->foto) }}" class="rounded float-left" width="150">
            @endif
        </div>
    </div>

        </div>
    </div>

        <button type="submit" class="btn btn-primary"> Salvar </button>
    </form>
    <br>

@endsection
