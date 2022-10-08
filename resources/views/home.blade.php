@extends('layouts.layout')

@section('content')

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url({{asset('template/img/bg-img/bg-1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Profitez de nos produits illimité pour vous faire<br> plaisir ou faire plaisir à vos proches ♥</h6><br>
                        <a href="{{ route('shop') }}" class="btn essence-btn">Découvrir</a>
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
                            <a href="{{ route("categorie.produit", ['SousCategorie' => 'Vêtements', 'Categorie' => 'All']) }}">Vêtements</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('template/img/bg-img/bg-3.jpg')}});">
                        <div class="catagory-content">
                            <a href="{{ route("categorie.produit", ['SousCategorie' => 'Chaussures', 'Categorie' => 'All']) }}">Chaussures</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{asset('template/img/bg-img/bg-4.jpg')}});">
                        <div class="catagory-content">
                            <a href="{{ route("categorie.produit", ['SousCategorie' => 'Accessoires', 'Categorie' => 'All']) }}">Accessoires</a>
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
                        @foreach ($produits as $prd)
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <?php
                                    // $img = App\Image::find($produit->id);
                                    $produit = App\Produit::find($prd->id);
                                    $img = App\Image::find($prd->idImage);
                                    $im = $img->Image;
                                ?>
                                <img src='{{ asset("/template/img/product-img/$im") }}' alt="">
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="{{ route("single-product-details.show",$produit->id) }}">
                                    <h6>{{ $produit->NomP }}</h6>
                                </a>
                                <p class="product-price">{{ $produit->Prix }} dh</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="{{ route("single-product-details.show",$produit->id) }}" class="btn essence-btn">Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->
@endsection
