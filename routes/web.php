<?php

use App\Http\Controllers\FrontendController;
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

Route::get('/',[FrontendController::class,'index'])->name('homepage');
Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/product',[FrontendController::class,'product'])->name('product');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
