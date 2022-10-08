<?php


namespace App\Http\Controllers;

use App\Produit;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');

    }

    /**
     * Show the latest product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home')->with([
        //     "produits" => Produit::latest()->paginate(10),
        //     ]);
        $produits = DB::table('produits')->select('produits.id', DB::raw('MIN(images.id) as idImage'))
            ->join('images','produits.id','images.produit_id')->groupBy('produits.id')
            ->orderBy('produits.created_at', 'DESC')->paginate(10);
            // dd($produits);
        return view('home')->with([
            'produits' => $produits
            ]);
    }
}
