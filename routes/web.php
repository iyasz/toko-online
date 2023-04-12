<?php

use App\Http\Controllers\admin\barangController;
use App\Http\Controllers\admin\buktiController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\pesananController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\transaksiController;
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
    
    

    
    Route::middleware(['onlyAdmin'])->group(function () {
        Route::view('/app', 'admin.index');
        Route::resource('/category', categoryController::class);
        Route::resource('/produk', barangController::class);
        Route::resource('/pesanan', pesananController::class);
        Route::resource('/bukti', buktiController::class);
        Route::get('/status/{id}/{inv}', [orderController::class, 'status']);
        Route::get('/status/{id}', [orderController::class, 'selesai']);
    });

    Route::get('/logout', [authController::class, 'logout']);

    Route::middleware(['onlyUser'])->group(function () {
        Route::post('/confirmation', [orderController::class, 'bukti']);
        Route::resource('/cart', cartController::class);
        Route::get('/payment', [orderController::class, 'index']);
        Route::get('/transaksi', [transaksiController::class, 'index']);
        Route::get('/transaksi/{id}', [transaksiController::class, 'view']);
        Route::get('/riwayat', [transaksiController::class, 'riwayat']);
    });

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
