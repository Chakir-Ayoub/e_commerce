@extends('layouts.layout')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('template/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Passer commande</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container"> 
                <div class="row">
                    <div class="col-12 col-md-6">
                        @if ($errors->count() > 0)
                                <br>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-2">
                                        <div class="alert alert-danger">
                                            <button data-dismiss="alert" class="close" type="button">x</button>
                                            <strong>Merci de bien remplir tous les champs du formulaire</strong>
                                            <ul>
                                                @foreach ($errors->all() as $message)
                                                    <li>&nbsp;&nbsp;->{{$message }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @else @if (empty($validation ))
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-2">
                                            <div class="alert alert-secondary">
                                                <button data-dismiss="alert" class="close" type="button">x</button>
                                                <strong>Merci de valider vos informations</strong>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-2">
                                                <div class="alert alert-success">
                                                    <button data-dismiss="alert" class="close" type="button">x</button>
                                                    <strong>Validation passé avec succès</strong>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endif
                        <div class="checkout_details_area mt-50 clearfix">
                            <form action="{{ route("make.payment") }}" method="post">
                                @csrf
                            <div class="cart-page-heading mb-30">
                                <h5>Adresse de livraison</h5>
                            </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="Prenom">Prénom <span>*</span></label>
                                        <input type="text" class="form-control" name="Prenom" id="Prenom" value="{{ $Client->PrenomUsr }}" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Nom">Nom <span>*</span></label>
                                        <input type="text" class="form-control" name="Nom" id="Nom" value="{{ $Client->NomUsr }}" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Pays">Pays  <span>*</span></label>
                                        <input type="text" class="form-control" name="Pays" id="Pays" value="{{ $Client->PaysUsr }}">
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Ville">Ville <span>*</span></label>
                                        <input type="text" class="form-control" name="Ville" id="Ville" value="{{ $Client->VilleUsr }}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Adresse_Numero">Adresse <span>*</span></label>
                                        <input placeholder="Numéro" type="text" class="form-control mb-3" name="Adresse_Numero" id="Adresse_Numero" value="{{ $Client->AdresseNumUsr }}">
                                        <input placeholder="Rue" type="text" class="form-control" name="Adresse" id="Adresse" value="{{ $Client->AdresseUsr }}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Code_Postale">Code postal <span>*</span></label>
                                        <input type="text" class="form-control" name="Code_Postale" id="Code_Postale" value="{{ $Client->CodePostalClt }}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="Telephone">Téléphone <span>*</span></label>
                                        <input type="text" class="form-control" name="Telephone" id="Telephone" value="{{ $Client->TelUsr }}">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="Email">Adresse email <span>*</span></label>
                                        <input type="email" class="form-control" name="Email" id="Email" value="{{ $Client->email }}" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn essence-btn">
                                    Valider
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">
                            <div class="cart-page-heading">
                                <h5>Votre commande</h5>
                                <p>Les détails</p>
                            </div>
                            <ul class="order-details-form mb-4">
                                <li><span>Produit</span> <span>Total</span></li>
                                @foreach ($items as $item)
                                <li>
                                    <img src="{{ asset("/template/img/product-img/$item->associatedModel") }}" alt="" width="50"
                                    height="50" class="img-fluid rounded"> &nbsp;&nbsp;  
                                    <span>{{ $item->name }}</span> <span>{{ $item->price }} DH</span>
                                </li>
                                @endforeach
                                <li><span>Sous total</span> <span>{{ Cart::getSubtotal() }} DH</span></li>
                                <li><span>Livraison</span> <span>20 DH</span></li>
                                <li><span>Total</span> <span>{{ Cart::getSubtotal() + 20 }}  DH </span></li>
                            </ul>
                            @isset($validation)
                                <div style="width:75%;" id="accordion" role="tablist" class="mb-4">
                                    <input type="hidden" value="{{ Cart::getSubtotal() + 20 }}" id="hidden">
                                    <div  id="paypal-payment-button">
                                    </div>
                                    <a href="{{ route('success.payment') }}" class="btn essence-btn">Paiement à la livraison</a>
                                </div>
                            @endisset
                               
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=AdonGwjLSPCekL5JgFXo8y-fQM6HJ5VVF4Wg-bc4dLRAwqUv_8xfPgDrHY1gVn-BbbkB0PSzyto9Mg0_&disable-funding=credit,card"></script>
    <script src="{{ asset('template/index.js') }}"></script>
    <!-- ##### Checkout Area End ##### -->
@endsection