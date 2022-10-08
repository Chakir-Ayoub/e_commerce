<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    


    <!-- Title  -->
    <title>WITHOUT LIMITS</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('template/img/core-img/WL_logoBlanc.png') }}">

    <!-- Core Style CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/style.css') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{asset('../')}}"><img src="{{asset('template/img/core-img/W_L_logo2.png')}}" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Femme</li>
                                        @foreach ($Femme as $f)
                                            <li><a href="{{ route('categorie.produit', ['SousCategorie' => $f->SousCategorie, 'Categorie' => 'Femme']) }}">{{ $f->SousCategorie }}</a></li>
                                        @endforeach

                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Homme</li>
                                        @foreach ($Homme as $h)
                                            <li><a href="{{ route('categorie.produit', ['SousCategorie' => $h->SousCategorie, 'Categorie' => 'Homme']) }}">{{ $h->SousCategorie }}</a></li>
                                        @endforeach

                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Enfant</li>
                                        @foreach ($Enfant as $e)
                                            <li><a href="{{ route("categorie.produit", ['SousCategorie' => $e->SousCategorie, 'Categorie' => 'Enfant']) }}">{{ $e->SousCategorie }}</a></li>
                                        @endforeach

                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img style="height: 200px;" src="{{asset('template/img/bg-img/bg-5.jpg')}}" alt="">
                                        {{-- <img style="height: 200px;" src="{{asset('template/img/bg-img/bg1.jpg')}}" alt=""> --}}
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{asset('../contact')}}">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                @if ($errors->count() > 0)
                        <div class="alert alert-danger mt-3">
                            <button data-dismiss="alert" class="close" type="button">x</button>
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{$message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="search-area">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <input type="search" name="rechercher" id="rechercher" placeholder="Tapez pour la recherche">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- User Login Info -->                
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <div id="user-login-info">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->UserName }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Deconnexion') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                                </div>
                            @else
                            <div class="user-login-info">
                                <a href="{{ route('login') }}"><img src="{{asset('template/img/core-img/user.svg')}}" alt=""></a>
                            </div>
                            @endauth
                    @endif
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="{{ asset('../cart') }}" id="essenceCartBtn"><img src="{{asset('template/img/core-img/bag.svg')}}" alt=""> <span>{{ $items->count() }}</span></a>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    {{-- <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{asset('template/img/core-img/bag.svg')}}" alt=""> <span>3</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{asset('template/img/product-img/SPS8Y144A601319-4249.jpg')}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <h6>Une robe de soirée rose brodée avec un design distinctif pour les femmes</h6>
                            <p class="size">Taille: S</p>
                            <p class="color">Couleur: Rose</p>
                            <p class="price">450 dh</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{asset('template/img/product-img/SPSP-0000003873-3990.jpg')}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <h6>Robe de soirée en tulle à pois noir pour femme</h6>
                            <p class="size">Taille: S</p>
                            <p class="color">Couleur: Noir</p>
                            <p class="price">199 dh</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{asset('template/img/product-img/SPSP-0000004819-5570.jpg')}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <h6>Robe à col à volants</h6>
                            <p class="size">Taille: S</p>
                            <p class="color">Couleur: écru</p>
                            <p class="price">150 dh</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Résumé</h2>
                <ul class="summary-table">
                    <li><span>Sous-total:</span> <span>799 dh</span></li>
                    <li><span>livraison:</span> <span>20 dh</span></li>
                    <li><span>total:</span> <span>819 dh</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="{{asset('../checkout')}}" class="btn essence-btn">Commander</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### --> --}}
    


    @yield('content')


    
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img class="logo_footer" src="{{asset('template/img/core-img/W_L_logo1_Blanc.png')}}" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{asset('../shop')}}">Shop</a></li>
                                <li><a href="{{asset('../contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Statut de la commande</a></li>
                            <li>
                            	<a href="#" data-toggle="tooltip" data-placement="bottom" title="Paypal ou Paiement à la livraison">Options de paiement</a>
                            </li>
                            <li><a href="#">Livraison à domicile</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                        	<h5 style="color: white;">SUIVEZ-NOUS</h5>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

			<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
    					&copy;<script>document.write(new Date().getFullYear());</script> Without Limits . Tous les droits sont réservés.
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <script src="{{asset('template/jquery.js')}}"></script>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('template/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('template/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('template/js/plugins.js')}}"></script>
    <!-- Classy Nav js -->
    <script src="{{asset('template/js/classy-nav.min.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('template/js/active.js')}}"></script>

</body>

</html>