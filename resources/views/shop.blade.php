@extends('layouts.layout')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('template/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        @if ($produits->count()==0)
                            <h2>Aucun produit trouvée !!</h2>
                            @else
                                <h2>Tous les produits</h2>
                        @endif       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catégories</h6>

                            <!--  Categories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">Femme</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="{{ route('categorie.produit', ['SousCategorie' => 'All' , 'Categorie' => 'Femme']) }}">Tous</a></li>
                                            @foreach ($Femme as $f)
                                            <li><a href="{{ route('categorie.produit', ['SousCategorie' => $f->SousCategorie, 'Categorie' => 'Femme']) }}">{{ $f->SousCategorie }}</a></li>
                                            @endforeach

                                        </ul>  
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                        <a href="#">Homme</a>
                                        <ul class="sub-menu collapse" id="shoes">
                                            <li><a href="{{ route('categorie.produit', ['SousCategorie' => 'All' , 'Categorie' => 'Homme']) }}">Tous</a></li>
                                            @foreach ($Homme as $h)
                                            <li><a href="{{ route('categorie.produit', ['SousCategorie' => $h->SousCategorie, 'Categorie' => 'Homme']) }}">{{ $h->SousCategorie }}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                        <a href="#">Enfant</a>
                                        <ul class="sub-menu collapse" id="accessories">
                                            <li><a href="{{ route('categorie.produit', ['SousCategorie' => 'All' , 'Categorie' => 'Enfant']) }}">Tous</a></li>
                                            @foreach ($Enfant as $e)
                                            <li><a href="{{ route("categorie.produit", ['SousCategorie' => $e->SousCategorie, 'Categorie' => 'Enfant']) }}">{{ $e->SousCategorie }}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Filtrer par</h6>
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Prix</p> 

                            <input id="rangeInput" type="text" />
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="40" data-max="2000" data-unit="dh" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="40" data-value-max="2000" data-label-result="Range:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div id="range" class="range-price" onchange="range();">Range: DH40.00 - DH2000.00</div>
                                </div>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget color mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Couleur</p>
                            <div class="widget-desc">
                                <ul class="d-flex">
                                    <li><a href="{{ route('filter.color', 'Blanc') }}" class="color1"></a></li>
                                    <li><a href="{{ route('filter.color', 'Gris') }}" class="color2"></a></li>
                                    <li><a href="{{ route('filter.color', 'Noir') }}" class="color3"></a></li>
                                    <li><a href="{{ route('filter.color', 'Bleu') }}" class="color4"></a></li>
                                    <li><a href="{{ route('filter.color', 'Rose') }}" class="color5"></a></li>
                                    <li><a href="{{ route('filter.color', 'Jaune') }}" class="color6"></a></li>
                                    <li><a href="{{ route('filter.color', 'Orange') }}" class="color7"></a></li>
                                    <li><a href="{{ route('filter.color', 'Marron') }}" class="color8"></a></li>
                                    <li><a href="{{ route('filter.color', 'Vert') }}" class="color9"></a></li>
                                    <li><a href="{{ route('filter.color', 'Violet') }}" class="color10"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>{{ $produits->total() }}</span> Produits trouvés</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Trier par:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Les plus récents</option>
                                                <option value="value">Les plus demandés</option>
                                                <option value="value">Les plus anciens</option>
                                                <option value="value">Les plus chers</option>
                                                <option value="value">Les moins chers</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                           
                            <!-- Single Product -->
                            @foreach ($produits as $prd)
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <?php
                                            $p = App\Produit::find($prd->id);
                                            $img = App\Image::find($prd->idImage);
                                        ?>
                                        <img src="{{ asset("/template/img/product-img/$img->Image") }}" alt="">
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <a href="{{ route("single-product-details.show",$p->id) }}">
                                            <h6>{{ $p->NomP }}</h6>
                                        </a>
                                        <p class="product-price">{{ $p->Prix }} dh</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="{{ route("single-product-details.show",$p->id) }}" class="btn essence-btn">Ajouter au panier</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                </div>
                <div class="justify-content-center d-flex">
                    {{ $produits->links() }}                        
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

@endsection