<?php

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

use App\Produit;
use App\Commande;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/Categorie', 'CategorieController')->middleware('App\Http\Middleware\Authenticate');
Route::resource('/Produit', 'ProduitController')->middleware('App\Http\Middleware\Authenticate');
Route::resource('/Client', 'ClientController')->middleware('App\Http\Middleware\Authenticate');

Route::get('/Produit/showProduit/{id}', function () {
    $Produit=Produit::findOrFail(request('id'));
     return [
        "status" => 1,
        "data" => $Produit
    ];
})->middleware('App\Http\Middleware\Authenticate');

Route::get('/Commande/showCommande/{id}', function () {
    $Commande=Commande::findOrFail(request('id'));
     return [
        "status" => 1,
        "data" => $Commande
    ];
})->middleware('App\Http\Middleware\Authenticate');

Route::get('/Commande/showCommandeClient/{id}', function () {
    $Commande=Commande::where('tiers_id',request('id'))->get();
     return [
        "status" => 1,
        "data" => $Commande
    ];
})->middleware('App\Http\Middleware\Authenticate');

Route::get('/Commande/showCart/{id}', function () {
    $Cart=Cart::where('commande_id',request('id'))->get();
     return [
        "status" => 1,
        "data" => $Cart
    ];
})->middleware('App\Http\Middleware\Authenticate');