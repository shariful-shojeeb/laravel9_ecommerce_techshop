<?php

use App\Http\Controllers\AdminController;
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
Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/product', [FrontendController::class, 'product'])->name('product');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

//User Authentication
Route::get('user/login', [UserController::class, 'loginView'])->name('user.login');
Route::get('user/loginChk', [UserController::class, 'loginChk'])->name('user.loginChk');
Route::get('user/signup', [UserController::class, 'signUpView'])->name('user.signup');
Route::post('user/store', [UserController::class, 'userStore'])->name('user.store');
Route::get('user/loguot', [UserController::class, 'userLogout'])->name('user.logout');


//Backend Routes
Route::group(['prefix' => 'admin'], function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/admin/attempt', [AdminController::class, 'loginChk'])->name('admin.login.attempt');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    //Admin Category Routes
    Route::get('/admin/category/list', [AdminCategoryController::class, 'index'])->name('category.list');
    Route::get('/admin/category/add', [AdminCategoryController::class, 'create'])->name('category.add');
    Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/view/{id}', [AdminCategoryController::class, 'show'])->name('category.view');
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/admin/category/changeStatus/{id}/{status}', [AdminCategoryController::class, 'changeStatus'])->name('category.changeStatus');
});
