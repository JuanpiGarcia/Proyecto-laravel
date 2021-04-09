<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('main');


//pagina principal de productos
Route::get('products', 'ProductsController@index')->name('products.index');

//pagina para crear los productos
Route::get('products/create','ProductsController@create')->name('products.create');


//este los va a mandar a la tienda
Route::post('products','ProductsController@store')->name('products.store');


//mostrando el id del producto por URL
Route::get('products/{product}','ProductsController@show')->name('products.show');

//editando el producto
Route::get('products/{product}/edit','ProductsController@edit')->name('products.edit');

//put - puede  modificar cualquier campo del producto
// patch - puede modificar todos los campos del producto
Route::match(['put','patch'],'products/{product}','ProductsController@update')->name('products.update');

//eliminando el producto
Route::delete('products/{product}','ProductsController@delete')->name('products.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
