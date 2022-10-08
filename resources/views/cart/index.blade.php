@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 card p-3">
                <h4 class="text-dark">Votre panier</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Taille</th>
                            <th>Couleur</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                @if ($item->attributes['Stock'] < $item->quantity)
                                    <td class="alert alert-danger">Epuisé</td>
                                    @else
                                        <td></td>
                                @endif
                                <td>
                                    <a href="{{ route("single-product-details.show",$item->id) }}">
                                        <img src="{{ asset("/template/img/product-img/$item->associatedModel") }}" alt="" width="50"
                                        height="50" class="img-fluid rounded">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route("single-product-details.show",$item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td>{{ $item->attributes["Taille"] }}</td>
                                <td>{{ $item->attributes["Couleur"] }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }} DH</td>
                                <td>{{ $item->price * $item->quantity }} DH</td>
                                <td>
                                    <form class="d-flex flex-row justify-content-center align-items-center" action="{{ route('remove.cart',$item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                
                            </tr>
                            
                        @endforeach
                        <tr class="txt-dark font-weight-bold">
                            <td colspan="7" class="border border-success">
                                Total
                            </td>
                            <td colspan="2" class="border border-success">
                                {{ Cart::getSubtotal() }} DH
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php $b=true ?>
                    @foreach ($items as $item)
                        @if ($item->attributes['Stock'] < $item->quantity)
                            <?php $b=false ?>
                            @break
                        @endif
                    @endforeach

                @if(Cart::getSubtotal() > 0 && $b == true)
                    <div class="form-group">
                         <a href="{{ route("checkout") }}" class="btn essence-btn"> 
                            PAYER
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection