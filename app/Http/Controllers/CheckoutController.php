<?php

namespace App\Http\Controllers;

use App\Image;
use App\Stock;
use App\Commande;
use App\Detailcommande;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateClientRequest;
use Srmklive\PayPal\Services\ExpressCheckout;
use PayPal\Api\PaymentExecution;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout')->with([
                "Client" => Auth::user(),
                "items" => \Cart::getContent(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateClient(Request $request,CreateClientRequest $req)//
    {
        $id=Auth::user();
        $affected = DB::table('users')
              ->where('id', $id)
              ->update([
                'PrenomUsr' => $request->Prenom,
                'NomUsr' => $request->Nom,
                'PaysUsr' => $request->Pays,
                'VilleUsr' => $request->Ville,
                'AdresseNumUsr' => $request->Adresse_Numero,
                'AdresseUsr' => $request->Adresse,
                'CodePostalClt' => $request->Code_Postale,
                'TelUsr' => $request->Telephone,
                  ]);
                return view('checkout')->with([
                    "Client" => $id,
                    "items" => \Cart::getContent(),
                    "validation" => "true"
                ]);
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function paymentCancel(){
        return redirect()->route('cart.index')->with([
            'info' => "Vous avez annuler l'opération"
        ]);
    }

    public function paymentSuccess(Request $request){
            //diminuer les quantités stockées
            foreach(\Cart::getContent() as $item){
                $Q=DB::table('stocks')
                ->select(array('Qte', 'couleur_id', 'taille_id'))
                ->join('couleurs','couleurs.id','stocks.couleur_id')        
                ->join('tailles','tailles.id','stocks.taille_id')
                ->where([
                    ['prouduit_id',$item->id],
                    ['Couleur',$item->attributes["Couleur"]],
                    ['Taille',$item->attributes["Taille"]],
                ])->get();
                Stock::where([
                    ['prouduit_id',$item->id],
                    ['couleur_id',$Q[0]->couleur_id],
                    ['taille_id',$Q[0]->taille_id],
                ])
                ->update([
                        'Qte' => $Q[0]->Qte - $item->quantity,
                    ]);
              }
              //creer la commande
            $commande = Commande::create([
                "user_id" => auth()->user()->id,
                "paid" => 1,
            ]);
            //creer les details de la commande
            foreach(\Cart::getContent() as $item){
                $img=DB::table('images')->select('images.id')
                ->where('Image',$item->associatedModel)->get();
            Detailcommande::create([
                "commande_id" => $commande->id,
                "produit_id" => $item->id,
                "image_id" => $img[0]->id,
                // Image::where('Image', $item->associatedModel)->id,
                "QteCommande" => $item->quantity,
            ]);
            
        }
        \Cart::clear();
        
            return redirect()->route('cart.index')->with([
                'success' => 'Paiement effectué avec succés'
            ]);
    }
}
