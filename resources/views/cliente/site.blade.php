@include('cliente.cabecalho')
@yield('carrossel')
<div id="mainBody">
    <div class="container" style="width: 90%; justify-items: center; ">
        <div class="row">

            @include('cliente.barraLateral')

            @yield('conteudo')

        </div>
    </div>
</div>

@include('cliente.footer')
