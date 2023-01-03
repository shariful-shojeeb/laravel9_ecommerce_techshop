<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;

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
Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/cart2', [FrontendController::class, 'cart'])->name('cart2');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/product', [FrontendController::class, 'product'])->name('product');
Route::get('/product/{id}', [FrontendController::class, 'product'])->name('product');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/category/{id}', [FrontendController::class, 'category'])->name('category');
Route::get('/billing', [FrontendController::class, 'billing'])->name('billing');

//Cart Routes
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::get('cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('update', [CartController::class, 'updateCart'])->name('cart.update');

//Customer Authentications
Route::get('customer_login', [FrontendController::class, 'loginView'])->name('login.view');
Route::get('customer_register', [FrontendController::class, 'regView'])->name('reg.view');
Route::get('customer/add', [FrontendController::class, 'customerCreate'])->name('customer.add');
Route::get('customer/login/check', [FrontendController::class, 'loginCkeck'])->name('login.check');

//User Authentication
Route::get('user/login', [UserController::class, 'loginView'])->name('user.login');
Route::get('user/loginChk', [UserController::class, 'loginChk'])->name('user.loginChk');
Route::get('user/signup', [UserController::class, 'signUpView'])->name('user.signup');
Route::post('user/store', [UserController::class, 'userStore'])->name('user.store');
Route::get('user/loguot', [UserController::class, 'userLogout'])->name('user.logout');



Route::group(['prefix' => 'admin'], function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('attempt', [AdminController::class, 'loginChk'])->name('admin.login.attempt');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    //Category Routes
    Route::get('category/list', [CategoryController::class, 'index'])->name('category.list');
    Route::get('category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/view/{id}', [CategoryController::class, 'show'])->name('category.view');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('category/changeStatus/{id}/{status}', [CategoryController::class, 'changeStatus'])->name('category.changeStatus');

    //Brand Routes
    Route::get('brand/view/{id}',[BrandController::class,'show'])->name('brand.view');
    Route::get('brand/list',[BrandController::class,'index'])->name('brand.list');
    Route::get('brand/add',[BrandController::class,'create'])->name('brand.add');
    Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('brand/delete/{id}',[BrandController::class,'destroy'])->name('brand.delete');
    Route::get('brand/changeStatus/{id}/{status}', [BrandController::class, 'changeStatus'])->name('brand.changeStatus');
});
