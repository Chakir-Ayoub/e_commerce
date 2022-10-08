<?php

namespace App\Http\Controllers;

use App\Image;
use App\Couleur;
use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function index()
    {
        $items = \Cart::getContent();
        if($items->count() > 0)
        {
            foreach($items as $item)
            $QteStoquee = DB::table('stocks')
            ->select('stocks.Qte')
            ->join('couleurs','couleurs.id','stocks.couleur_id')        
            ->join('tailles','tailles.id','stocks.taille_id')
            ->where([
                ['prouduit_id',$item->id],
                ['Couleur',$item->attributes["Couleur"]],
                ['Taille',$item->attributes["Taille"]],
            ])->get();
            $item->attributes["Stock"] = $QteStoquee[0]->Qte;
        }
        // dd($item->attributes['Stock']);
        return view('cart.index')->with([
            "items" => $items
        ]);
    }

    //add item too cart
    public function addProductToCart(Request $request, Produit $produit)
    {
        $q = $request->all();
        $QteStoquee = DB::table('stocks')
        ->select('stocks.Qte')
        ->join('couleurs','couleurs.id','stocks.couleur_id')        
        ->join('tailles','tailles.id','stocks.taille_id')
        ->where([
            ['prouduit_id',$produit->id],
            ['Couleur',$request->Couleur],
            ['Taille',$request->Taille],
        ])->get();
        
        if( $q["Qte"] > $QteStoquee[0]->Qte )
        {
            return back()->with([
                'Couleur' => $request->Couleur,
                'Taille' => $request->Taille,
                'Qte' => $q["Qte"],
                'message' => "Désolé, votre choix( $request->Taille, $request->Couleur, ". $q["Qte"].") n'est
                 pas disponible. Essayez de réduire la quantité ou de changer la couleur !!",
            ]);
        }
        else
        {
            $img = DB::table('images')
            ->where([
                'produit_id' => $produit->id,
                'couleur_id' => Couleur::where('Couleur',$request->Couleur)->first()->id,
                ])
            ->select('Image')->get();
            \Cart::add(array(
                "id" => $produit->id,
                "name" => $produit->NomP,
                "price" => $produit->Prix,
                "quantity" => (isset($q["Qte"])) ? $request->Qte : 1,
                "attributes" => array(
                    'desc' => $produit->Description,
                    'Taille' => $request->Taille,
                    'Couleur' => $request->Couleur,
                    'Stock' => $QteStoquee[0]->Qte,
                     ),
                "associatedModel" => $img[0]->Image,
            ));
            return redirect()->route("cart.index");
        }
        
    }
    //update item from cart
    public function updateProductOnCart(Request $request, Produit $produit)
    {
        $q = $request->all();
        $QteStoquee = DB::table('stocks')
        ->select('stocks.Qte')
        ->join('couleurs','couleurs.id','stocks.couleur_id')        
        ->join('tailles','tailles.id','stocks.taille_id')
        ->where([
            ['prouduit_id',$produit->id],
            ['Couleur',$request->Couleur],
            ['Taille',$request->Taille],
        ])->get();
        
        if( $q["Qte"] > $QteStoquee[0]->Qte )
        {
            return back()->with([
                'Couleur' => $request->Couleur,
                'Taille' => $request->Taille,
                'Qte' => $q["Qte"],
                'message' => "Désolé, votre choix( $request->Taille, $request->Couleur, ". $q["Qte"].") n'est
                 pas disponible. Essayez de réduire la quantité ou de changer la couleur !!",
            ]);
        }
        else
        {
            \Cart::update($produit->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => (isset($q["Qte"])) ? $request->Qte : 1,
                    ),

                    "attributes" => array(
                            'desc' => $produit->Description,

                            'Taille' => $request->Taille,
                            
                            'Couleur' => $request->Couleur,

                            'Stock' => $QteStoquee[0]->Qte,
                            
                        ),
            ));
            return redirect()->route("cart.index");
        }
    }
    //remove item from cart
    public function removeProductFromCart(Produit $produit)
    {
        \Cart::remove($produit->id);
        return redirect()->route("cart.index");
    }
}
