<?php

use App\Http\Controllers\addressController;
use App\Http\Controllers\admin\barangController;
use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\buktiController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\characterController;
use App\Http\Controllers\admin\pesananController;
use App\Http\Controllers\admin\seriesController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\wishlistController;
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
    
    Route::get('/logout', [authController::class, 'logout']);
    
    Route::middleware(['onlyAdmin'])->group(function () {
        Route::view('/app', 'admin.index');
        Route::resource('/category', categoryController::class);
        Route::resource('/produk', barangController::class);
        Route::resource('/pesanan', pesananController::class);
        Route::resource('/bukti', buktiController::class);
        Route::resource('/series', seriesController::class);
        Route::resource('/character', characterController::class);
        Route::resource('/brand', brandController::class);
        Route::get('/status/{id}/{inv}', [orderController::class, 'status']);
        Route::get('/status/{id}', [orderController::class, 'selesai']);
    });

    
    Route::middleware(['onlyUser'])->group(function () {
        Route::post('/confirmation', [orderController::class, 'bukti']);
        Route::resource('/cart', cartController::class);
        Route::resource('/wishlist', wishlistController::class);
        Route::get('/transaksi', [transaksiController::class, 'index']);
        Route::get('/transaksi/{id}', [transaksiController::class, 'view']);
        Route::get('/riwayat', [transaksiController::class, 'riwayat']);
        Route::post('/wishlist/store', [wishlistController::class, 'storeAjax']);
        Route::post('/cart/store', [cartController::class, 'storeAjax']);
        Route::get('/payment', [addressController::class, 'index']);
        Route::post('/payment/address', [addressController::class, 'store']);
        Route::get('/payment/city', [orderController::class, 'searchCityPayment']);
        // Route::get('/payment/address', [addressController::class, 'store']);

    });

});


Route::middleware(['guest'])->group(function(){
    
    Route::view('/auth/login', 'auth.login')->name('login');
    Route::get('/login', [authController::class, 'login']);
    
    Route::get('/register', [authController::class, 'register']);
    Route::view('/auth/register', 'auth.register');
});

Route::get('/search', [indexController::class, 'search']);
Route::get('/payment/confirmation', [indexController::class, 'confirm']);
Route::get('/store', [indexController::class, 'index']);
Route::get('items/{id}/{slug}', [indexController::class, 'product']);
Route::get('/c/{id}', [indexController::class, 'category']);
