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
});

Route::post('/calculateshippings', [App\Http\Controllers\ShippingController::class, 'calculateShipping'])->name('calculateShipping');
Route::get('/dashboard', [App\Http\Controllers\ShippingController::class, 'dashboard']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ship', [App\Http\Controllers\ShippingController::class, 'index'])->name('ship');
Route::get('/home', [App\Http\Controllers\ItemController::class, 'index'])->name('getitem');
Route::post('/item', [App\Http\Controllers\ItemController::class, 'store']);
Route::post('/box', [App\Http\Controllers\ItemController::class, 'box']);
Route::post('/addtobox', [App\Http\Controllers\ItemController::class, 'addtobox']);
Route::put('updateitem/{id}', [App\Http\Controllers\ItemController::class, 'update']);
Route::delete('deleteitem/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('deleteProduct');
//Route::get('/readytoships', [App\Http\Controllers\ShippingController::class, 'ready'])->name('ready');
Route::post('/return', [App\Http\Controllers\ItemController::class, 'return']);
Route::get('/readytoships', [App\Http\Controllers\ItemController::class, 'calculate'])->name('ready');
Route::post('/cart', [App\Http\Controllers\ShippingController::class, 'addToCart']);
Route::post('/itemcart', [App\Http\Controllers\ShippingController::class, 'itemtocart']);
Route::get('/carts', [App\Http\Controllers\CartdController::class, 'index'])->name('cart');
Route::post('/deletecart', [App\Http\Controllers\CartdController::class, 'deletecart']);
Route::post('/deleteitemcart', [App\Http\Controllers\CartdController::class, 'deleteItemCart']);
Route::post('/doshipping', [App\Http\Controllers\CartdController::class, 'doShipping']);
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/profileedit', [App\Http\Controllers\HomeController::class, 'profileedit']);
Route::post('/addtocart', [App\Http\Controllers\CartdController::class, 'cart']);
Route::post('/checkouts', [App\Http\Controllers\CartdController::class, 'afterPayment'])->name('checkout.credit-card');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'checkOut'])->name('checkout');
//Route::get('/getcart', [App\Http\Controllers\CheckoutController::class, 'getCart']);



