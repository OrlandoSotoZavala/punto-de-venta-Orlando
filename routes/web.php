<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/fer', function () {
    return view('fer');
});

Route::get('purchases/pdf/{purchase}','App\Http\Controllers\PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}','App\Http\Controllers\SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}','App\Http\Controllers\SaleController@print')->name('sales.print');





Route::resource('categories', 'App\Http\Controllers\CategoryController')->names('categories');
Route::resource('clients', 'App\Http\controllers\ClientController')->names('clients');
Route::resource('products', 'App\Http\controllers\ProductController')->names('products');
Route::resource('providers', 'App\Http\controllers\ProviderController')->names('providers');
Route::resource('purchases', 'App\Http\controllers\PurchaseController')->names('purchases');
Route::resource('sales', 'App\Http\controllers\SaleController')->names('sales');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
