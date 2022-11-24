<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
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

// Frontend Controller
Route::get('/',[FrontendController::class,'index'])->name('homepage');
Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/product',[FrontendController::class,'product'])->name('product');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');

//User Authentication
Route::get('user/login',[UserController::class,'loginView'])->name('user.login');
Route::get('user/loginChk',[UserController::class,'loginChk'])->name('user.loginChk');
Route::get('user/signup',[UserController::class,'signUpView'])->name('user.signup');
Route::get('user/store',[UserController::class,'userStore'])->name('user.store');
