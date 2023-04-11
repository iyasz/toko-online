<?php

use App\Http\Controllers\admin\barangController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\orderController;
use App\Models\category;
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


Route::middleware(['auth'])->group(function () {
    
    Route::view('/app', 'admin.index');

    Route::resource('/cart', cartController::class);
    Route::resource('/category', categoryController::class);
    Route::resource('/produk', barangController::class);

    Route::get('/logout', [authController::class, 'logout']);
    Route::get('/payment', [orderController::class, 'index']);
    Route::post('/payment', [orderController::class, 'store']);
});


Route::middleware(['guest'])->group(function(){
    
    Route::view('/auth/login', 'auth.login')->name('login');
    Route::get('/login', [authController::class, 'login']);
    
    Route::get('/register', [authController::class, 'register']);
    Route::view('/auth/register', 'auth.register');
});

Route::get('/payment/confirmation', [indexController::class, 'confirm']);
Route::get('/store', [indexController::class, 'index']);
Route::get('items/{id}', [indexController::class, 'product']);
