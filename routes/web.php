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
Route::put('updateitem/{id}', [App\Http\Controllers\ItemController::class, 'update']);
Route::delete('deleteitem/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('deleteProduct');
