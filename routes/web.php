<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
})->name('home');


Route::get('/login',[AuthManager::class, 'login'])->name('login');

Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register',[AuthManager::class, 'register'])->name('register');

Route::post('/register',[AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/users/index',[UserController::class,'index']);

Route::resource('users',UserController::class);

Route::get('/delete/{id}',[UserController::class,'delete']);

Route::get('/show/{id}',[UserController::class,'show']);

Route::get('/productRegister',[ProductController::class, 'registerProduct'])->name('register.product');

Route::post('/productRegister',[ProductController::class, 'registerProductPost'])->name('register.product.post');

Route::post('/products/index',[ProductController::class, 'store']);

Route::get('/products/index',[ProductController::class,'index']);

Route::get('fetch-products',[ProductController::class,'fetchProducts']);

Route::resource('products',ProductController::class);

Route::get('products/index',[ProductController::class,'listProducts']);

Route::resource('products',ProductController::class);

Route::get('/delete/{id}',[ProductController::class,'delete']);

Route::get('/show/{id}',[ProductController::class,'show']);

Route::get('edit_product/{id}',[ProductController::class,'edit']);

Route::put('update-student/{id}',[ProductController::class,'update']);