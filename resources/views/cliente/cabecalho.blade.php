<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
 <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
 <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
 <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
 -->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
 <script src="themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link href="{{ URL::asset('themes/bootshop/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('themes/css/base.css') }}" rel="stylesheet" type="text/css">
    {{-- <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen" />
    <link href="themes/css/base.css" rel="stylesheet" media="screen" /> --}}
    <!-- Bootstrap style responsive -->
    <link href="{{ URL::asset('themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('themes/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css"> --}}
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>

<body>
    <div id="header" style="height: 100%">
        <div class="container" style="width: 100%;">
            {{-- <div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> User</strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="product_summary.html"><span class="">Fr</span></a>
		<a href="product_summary.html"><span class="">Es</span></a>
		<span class="btn btn-mini">En</span>
		<a href="product_summary.html"><span>&pound;</span></a>
		<span class="btn btn-mini">$155.00</span>
		<a href="product_summary.html"><span class="">$</span></a>
		<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
	</div>
	</div>
</div> --}}


            <!-- Navbar ================================================== -->
            <div id="logoArea" class="navbar" style="margin: 0">
                <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-inner" style="height: 100%">
                    <a class="brand" href="{{ route('home') }}"><img src="{{ asset('themes/images/logo.png') }}"
                            alt="Bootsshop" /></a>
                    
                    <ul class="nav pull-left">
                        <li class=""><a href="{{ route('home') }}">Home</a></li>
                        <li class=""><a href="#destaque">Destaques</a></li>
                        <li class=""><a href="#produtos">Produtos</a></li>
                    </ul>
                    <ul id="topMenu" class="nav pull-right">
                        {{-- <li class=""><a href="special_offer.html">Specials Offer</a></li>
	 <li class=""><a href="normal.html">Delivery</a></li> --}}
                        @if (Auth::check())
                            <li class="">
                                <a href="{{ route('perfil') }}">Perfil
                                </a>
                            </li>

                            <li class="">
                                <a href="{{ route('pedido.historico') }}">Histórico de pedidos
                                </a>
                            </li>

                            <li class="">
                                <a id="myCart" href="{{ route('carrinho') }}">
                                    <i class="fa-thin fa-cart-shopping"></i>
                                    <p style="font-size: 20px">🛒</p>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="" onclick="avisoParaLogar()">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </a>
                            </li>
                        @endif
                        @if (Auth::check())
                            <li class=""><a href="{{ route('user.sair') }}">Sair</a></li>
                        @else
                            <li class=""><a href="{{ route('registrar') }}">Registrar</a></li>
                            <li class="">
                                <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span
                                        class="btn btn-large btn-primary">Entrar</span></a>
                                <div id="login" class="modal hide fade in" tabindex="-1" role="dialog"
                                    aria-labelledby="login" aria-hidden="false">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                        <h3>Login</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal loginFrm" action="{{ route('login.entrar') }}"
                                            method="POST">
                                            @csrf
                                            <div class="control-group">
                                                <input type="text" name="email" id="inputEmail"
                                                    placeholder="Email">
                                            </div>
                                            <div class="control-group">
                                                <input type="password" name="password" id="inputPassword"
                                                    placeholder="Password">
                                            </div>
                                            <div class="control-group">
                                                <label class="checkbox">
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-success">Sign in</button>
                                            <button class="btn" data-dismiss="modal"
                                                aria-hidden="true">Close</button>
                                        </form>


                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End====================================================================== -->
