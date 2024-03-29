                <!-- Sidebar ================================================== -->
                <div id="sidebar" class="span3">
                    @if (Auth::check())
                        <div class="well well-small">
                            <a id="myCart" href="{{route('carrinho')}}">
                                <img src="{{ asset('themes/images/ico-cart.png') }}" alt="cart">Carrinho
                            </a>
                        </div>
                    @else
                        <div class="well well-small">
                            <a id="myCart" href="" onclick="avisoParaLogar()">
                                <img src="{{ asset('themes/images/ico-cart.png') }}" alt="cart">Carrinho
                            </a>
                        </div>
                    @endif
                    @if( isset($categorias) )
                    <ul id="sideManu" class="nav nav-tabs nav-stacked">
                        @foreach ($categorias as $categoria)
                        <li><a href="{{ route('home.categoria',$categoria->id) }}">{{ strtoupper($categoria->descricao)}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    {{-- <ul id="sideManu" class="nav nav-tabs nav-stacked">
                        <li class="subMenu open"><a> ELECTRONICS [230]</a>
                            <ul>
                                <li><a class="active" href="products.html"><i class="icon-chevron-right"></i>Cameras
                                        (100) </a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Computers, Tablets &
                                        laptop (30)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Mobile Phone (80)</a>
                                </li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Sound & Vision (15)</a>
                                </li>
                            </ul>
                        </li>
                        <li class="subMenu"><a> CLOTHES [840] </a>
                            <ul style="display:none">
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Women's Clothing
                                        (45)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Women's Shoes (8)</a>
                                </li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Women's Hand Bags
                                        (5)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Men's Clothings (45)</a>
                                </li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Men's Shoes (6)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Kids Clothing (5)</a>
                                </li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Kids Shoes (3)</a></li>
                            </ul>
                        </li>
                        <li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
                            <ul style="display:none">
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Angoves (35)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Bouchard Aine & Fils
                                        (8)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>French Rabbit (5)</a>
                                </li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Louis Bernard (45)</a>
                                </li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box)
                                        (8)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Other Liquors & Wine
                                        (5)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Garden (3)</a></li>
                                <li><a href="products.html"><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>
                            </ul>
                        </li>
                        <li><a href="products.html">HEALTH & BEAUTY [18]</a></li>
                        <li><a href="products.html">SPORTS & LEISURE [58]</a></li>
                        <li><a href="products.html">BOOKS & ENTERTAINMENTS [14]</a></li>
                    </ul> --}}
                    <br />
                    @if (isset($produtos))
                        @foreach ($produtos as $produto)
                            @if ($produto->promocao_ativa == 'sim')
                                <div class="thumbnail">
                                    <img src="{{ $produto['foto'] }}" alt="Bootshop panasonoc New camera" />
                                    <div class="caption">
                                        <h5>{{ $produto['nome'] }}</h5>
                                        <h4 style="text-align:center"><a class="btn" href="#"> <i
                                                    class="icon-zoom-in"></i></a>
                                                     {{-- <a class="btn"
                                                href="{{route('carrinho.adicionar',$produto->id)}}">Adicionar <i class="icon-shopping-cart"></i></a> --}}
                                                 <a
                                                class="btn btn-primary"
                                                href="#">R${{ $produto['preco_promocao'] }}</a></h4>
                                    </div>
                                </div><br />
                            @endif
                        @endforeach
                    @endif
                    {{-- <div class="thumbnail">
                        <img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera" />
                        <div class="caption">
                            <h5>Panasonic</h5>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i
                                        class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i
                                        class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
                                    href="#">$222.00</a></h4>
                        </div>
                    </div><br />
                    <div class="thumbnail">
                        <img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
                        <div class="caption">
                            <h5>Kindle</h5>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i
                                        class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i
                                        class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
                                    href="#">$222.00</a></h4>
                        </div>
                    </div><br /> --}}

                </div>
                <!-- Sidebar end=============================================== -->

                <script>
                    function avisoParaLogar() {
                      alert("Por favor, faça login! Aperte no botão Entrar");
                    }
                    </script>