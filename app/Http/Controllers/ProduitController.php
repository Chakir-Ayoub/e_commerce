<?php

namespace App\Http\Controllers;

use App\Image;
use App\Produit;
use App\Taille;
use App\Couleur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateSearchRequest;


class ProduitController extends Controller
{
    /**
     * Display a listing of the Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop')->with([
            "produits" => DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
            ->join('images','produits.id','images.produit_id')->groupBy('produits.id')
            ->orderBy('produits.created_at', 'DESC')->paginate(9),
            "cat" => 'false',
            ]);
    }


    /**
     * Show product by category
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductByCategory($SousCategorie='1',$Categorie='2')
    {
        if($SousCategorie=='All')
        {
            // $produits = Produit::where('produits.Categorie',$Categorie)
            // ->latest()->paginate(9);

            $produits = DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
            ->join('images','produits.id','images.produit_id')
            ->where('produits.Categorie',$Categorie)
            ->groupBy('produits.id')
            ->orderBy('produits.created_at', 'DESC')->paginate(9);
        }
        else if($Categorie=='All')
        {
            if($SousCategorie!='Vêtements')
            {
                // $produits = Produit::where('produits.SousCategorie',$SousCategorie) 
                // ->latest()->paginate(9);
                $produits = DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
                ->join('images','produits.id','images.produit_id')
                ->where('produits.SousCategorie',$SousCategorie) 
                ->groupBy('produits.id')
                ->orderBy('produits.created_at', 'DESC')->paginate(9);

            }
            else
            {
                // $produits = Produit::whereNotIn('SousCategorie', ['Chaussures','Accessoires']) 
                // ->latest()->paginate(9);
                $produits = DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
                ->join('images','produits.id','images.produit_id')
                ->whereNotIn('SousCategorie', ['Chaussures','Accessoires']) 
                ->groupBy('produits.id')
                ->orderBy('produits.created_at', 'DESC')->paginate(9);
            }
        }
        else
        {
            // $produits = Produit::where([
            //     ['produits.SousCategorie',$SousCategorie],
            //     ['produits.Categorie',$Categorie],
            // ]) 
            // ->latest()->paginate(9);
            $produits = DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
                ->join('images','produits.id','images.produit_id')
                ->where([
                        ['produits.SousCategorie',$SousCategorie],
                        ['produits.Categorie',$Categorie],
                    ])
                ->groupBy('produits.id')
                ->orderBy('produits.created_at', 'DESC')->paginate(9);
        }

        return view('shop')->with([
            "produits" => $produits,
            "cat" => 'true',
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Produit  $Produit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('single-product-details')->with([
            "produits" => Produit::find($id) ,

            "images" => DB::table('images')
                ->where('images.produit_id',$id)
                ->select(['*'])
                ->get(),

            "couleurs" => DB::table('couleurs')
            ->join('stocks', 'couleurs.id',  'stocks.couleur_id')
            ->where('stocks.prouduit_id',$id)
            ->select(['couleurs.Couleur'])->distinct()
            ->get(),

            "tailles" => DB::table('tailles')
            ->join('stocks', 'tailles.id',  'stocks.taille_id')
            ->where('stocks.prouduit_id',$id)
            ->select(['tailles.Taille'])->distinct()
            ->get(),

            "disp" => "x",
            ]);
    }

    public function search(Request $request, CreateSearchRequest $req)
    {
        $produits = DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
            ->join('images','produits.id','images.produit_id')
            ->where('produits.NomP', 'like', '%'.$request->rechercher.'%')
            ->orWhere('produits.id',$request->rechercher)
            ->groupBy('produits.id')
            ->orderBy('produits.created_at', 'DESC')->paginate(9);

            // dd($request->rechercher);
        return view('shop')->with([
            'produits' => $produits
        ]);
    }

    public function filterByColor($color)
    {
        $produits = DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
            ->join('images','produits.id','images.produit_id')
            ->join('stocks','produits.id','stocks.prouduit_id')
            ->join('couleurs','stocks.couleur_id','couleurs.id')
            ->where('couleurs.Couleur', 'like', '%'.$color.'%')
            ->groupBy('produits.id')
            ->orderBy('produits.created_at', 'DESC')->paginate(9);

            // dd($request->rechercher);
        return view('shop')->with([
            'produits' => $produits
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $Produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $Produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $Produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $Produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $Produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $Produit)
    {
        //
    }

    // public function test($T,$Col,$qty,$p)
    // {
    //     $QCol= DB::table("couleurs")
    //         ->join('stockprodcols', 'couleurs.id',  'stockprodcols.idCouleur')
    //         ->where([
    //             ['stockprodcols.idProduit',$p],
    //             ['couleurs.Couleur',$Col]
    //         ])
    //         ->select('stockprodcols.QteProdcol');

    //     $QT= DB::table("tailles")
    //         ->join('stockprodts', 'tailles.id',  'stockprodts.idTaille')
    //         ->where([
    //             ['stockprodts.idProduit',$p],
    //             ['tailles.Taille',$T],
    //         ])
    //         ->select('stockprodts.QteProdT');

    //     if($qty <= $QCol && $qty <= $QT)
    //             // back();
                
    //         // redirect()
    //         return view("/");

    // }

   
    // public function getAllProduct()
    // {
    //     $prod = DB::table('produits')->get();
    //     return view('shop',['products'=>$prod]);
    // }
}
