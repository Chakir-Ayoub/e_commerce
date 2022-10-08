<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>



{{-- @extends('layouts.layout')

@section('content')

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url({{asset('template/img/bg-img/bg-1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Profitez de nos produits illimité pour vous faire<br> plaisir ou faire plaisir à vos proches ♥</h6><br>
                        <a href="{{asset('template/shop.html')}}" class="btn essence-btn">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('template/img/bg-img/bg-2.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Vêtements</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('template/img/bg-img/bg-3.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Chaussures</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('template/img/bg-img/bg-4.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Accessoires</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Nouvel arrivage</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        <!-- Single Product -->
                        @foreach ($produits as $produit)
                            
                        


                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ $produits->image }}" value="BYDGEL41094-741231" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/robe1.jpg')}}" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Robe à col en V à manches courtes pour femme</h6>
                                </a>
                                <p class="product-price">92.29 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/robe.jpg')}}" value="BYDGEL41094-741231" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/robe1.jpg')}}" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Robe à col en V à manches courtes pour femme</h6>
                                </a>
                                <p class="product-price">92.29 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/GML000200179DS1.jpeg')}}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/ch1.jpeg')}}" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="single-product-details.html">
                                    <h6>Blouse à ornements serpent</h6>
                                </a>
                                <p class="product-price">120 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/CKT0189D1194SYH.jpeg')}}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/vest1.jpeg')}}" alt="">

                                <!-- Product Badge -->
                                <div class="product-badge offer-badge">
                                    <span>-30%</span>
                                </div>

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Veste blazer noire pour homme</h6>
                                </a>
                                <p class="product-price"><span class="old-price">200 dh</span> 140 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/enf1.jpeg')}}" alt="" value="MK045-2901-011">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/enf2.jpeg')}}" alt="">

                                <!-- Product Badge -->
                                <div class="product-badge new-badge">
                                    <span>Nouveau</span>
                                </div>

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Ensemble de vêtements gris noir bébé garçon - 2 pièces</h6>
                                </a>
                                <p class="product-price">56.31 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/sh1.jpg')}}" alt="" value="BKNKNKKLS001SBT-5531">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/sh2.jpg')}}" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Chaussures classiques noires pour hommes</h6>
                                </a>
                                <p class="product-price">139.63 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/jac2.jpg')}}" alt="" value="SPSP-0000003925-3700">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/jac1.jpg')}}" alt="">

                                <!-- Product Badge -->
                                <div class="product-badge offer-badge">
                                    <span>-30%</span>
                                </div>

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Veste en Jean pour femme</h6>
                                </a>
                                <p class="product-price"><span class="old-price">‏285.32 dh</span> 199,724 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/chem1.jpg')}}" value="SI17104-1425" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/chem2.jpg')}}" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Chemise à manches courtes pour homme</h6>
                                </a>
                                <p class="product-price">101.03 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('template/img/product-img/ELB0063Y2686MVI.jpeg')}}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{asset('template/img/product-img/R1.jpeg')}}" alt="">

                                <!-- Product Badge -->
                                <div class="product-badge new-badge">
                                    <span>Nouveau</span>
                                </div>

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{asset('template/single-product-details.html')}}">
                                    <h6>Robe fille</h6>
                                </a>
                                <p class="product-price">119.06 dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </section>
    <!-- ##### New Arrivals Area End ##### -->

@endsection --}}






















