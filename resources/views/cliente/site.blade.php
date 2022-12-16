@include('cliente.cabecalho')
@include('cliente.carrossel')
<div id="mainBody">
    <div class="container">
        <div class="row">

            @include('cliente.barraLateral')

            @yield('conteudo')

        </div>
    </div>
</div>

@include('cliente.footer')
