<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CartController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/Register', function () {
//     return view('Register');
// });

// Route::get('/single-product-details', function () {
//     return view('single-product-details');
// });


//route contactt
Route::get('/contact', function () {
    return view('contact');
});



//login logout & register routes
Auth::routes();
//route home
Route::get('/', 'HomeController@index')->name('home');
//routes produit
Route::resource('single-product-details', 'ProduitController');
Route::get('shop', 'ProduitController@index')->name('shop');
Route::get('shop/categorie/{SousCategorie?}/{Categorie?}','ProduitController@getProductByCategory')->name("categorie.produit");
// Route::get('single-product-details/{T?}/{Col?}/{qty?}/{p?}', 'ProduitController@test')->name('test');

//route panier
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/add/cart/{produit}', 'CartController@addProductToCart')->name('add.cart');
Route::put('/update/cart/{produit}/cart', 'CartController@updateProductOnCart')->name('update.cart');
Route::delete('/remove/{produit}/cart', 'CartController@removeProductFromCart')->name('remove.cart');
//checkout route
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@updateClient')->name('make.payment');
// Route::get('/handle-payment', 'CheckoutController@handlePayment')->name('make.payment2');
Route::get('/cancel-payment', 'CheckoutController@paymentCancel')->name('cancel.payment');
Route::get('/success-payment', 'CheckoutController@paymentSuccess')->name('success.payment');
// Route search
Route::post('shop', 'ProduitController@search')->name('search');
// Route filter
Route::get('shop/{color}', 'ProduitController@filterByColor')->name('filter.color');


// View Composer
    view::Composer(['*'],function($view){
        $view -> with([
            "Femme" => DB::table("produits")
                ->select("produits.SousCategorie")->distinct()
                ->where("produits.Categorie","=","Femme")->get(),

            "Homme" => DB::table("produits")
                ->select("produits.SousCategorie")->distinct()
                ->where("produits.Categorie","=","Homme")->get(),

            "Enfant" => DB::table("produits")
                ->select("produits.SousCategorie")->distinct()
                ->where("produits.Categorie","=","Enfant")->get(),

            "items" => \Cart::getContent(),


        ]);
    });

