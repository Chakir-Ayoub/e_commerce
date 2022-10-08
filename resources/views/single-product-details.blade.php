@extends('layouts.layout')

@section('content')                         
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
            <div class="single_product_thumb clearfix">
                <div class="product_thumbnail_slides owl-carousel">
                    @if ($images->count()>1)
                        @foreach ($images as $img)
                            <img src="{{ asset("/template/img/product-img/$img->Image") }}" alt="">
                        @endforeach
                    @endif
                    
                </div>
                @if ($images->count()==1)
                    <?php $imgg = $images[0]->Image; ?>
                    <img src="{{ asset("/template/img/product-img/$imgg") }}" alt="">
                @endif
            </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <h3>{{$produits->NomP}}</h2>
            <p class="product-price"></span>{{ $produits->Prix }} dh</p>
            <h5>Description</h5>
            <p class="product-desc">{{$produits->Description}}</p>

            <!-- Form -->
            <?php $bool=false ?>
            @foreach(\Cart::getContent() as $item)
                @if($item->id==$produits->id)
                    <?php $bool=true ?>
                    @break
                @endif
            @endforeach

            @if ($bool)
                <form action="{{ route('update.cart',$produits) }}" class="cart-form clearfix" method="post">
                @csrf
                @method("PUT")
            @else
                <form action="{{ route('add.cart',$produits) }}" class="cart-form clearfix" method="post">
                @csrf
            @endif
                                            
                <input value="{{$produits->id}}" type="hidden">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <label style="margin-top: 15px;" for="selectT" class="label-input">Taille&nbsp;&nbsp;</label>
                    <select name="Taille" id="productSize" class="mr-2" value="{{ Session::get('Taille') }}">
                        @foreach ($tailles as $t)
                            <option>{{$t->Taille}}</option>
                        @endforeach
                    </select>
                    <label style="margin-top: 15px;" for="selectCol" class="label-input">Couleur&nbsp;&nbsp;</label>
                    <select name="Couleur" id="productColor"  value="{{ Session::get('Couleur') }}"> 
                        @foreach ($couleurs as $c)
                            <option>{{$c->Couleur}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Quantity Box -->
                <div class="col-sm-11 clearfix">
                    <label for="qty" class="label-input">Quantité</label>
                    <input type="number" name="Qte" id="qty"
                    max="50" min="1" 
                    class="form-control" value="1">
                </div><br>
                <h6 class="text-danger">{{ Session::get('message') }}</h6>
                <div class="cart-fav-box d-flex align-items-center">
                    <button type="submit" class="btn essence-btn">
                        Ajouter au panier
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
@endsection 