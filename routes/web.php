<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['page' => 'home']);
});
Route::get('/login', [CustomerController::class, 'login'])->name('login');
Route::post('/login', [CustomerController::class, 'authenticate']);
Route::get('/detail-produk', function () {
    return view('product-detail', ['page' => 'product-detail']);
});
Route::middleware(['auth'])->group(
    function () {
        Route::post('/logout', [CustomerController::class, 'logout']);
        Route::get('/profil', [CustomerController::class, 'profile']);
        Route::get('/pesanan', function () {
            return view('orders', ['page' => 'orders']);
        });
        Route::get('/detail-pesanan', function () {
            return view('order-detail', ['page' => 'order-detail']);
        });
        Route::get('/lengkapi-pesanan', function () {
            return view('order-completion', ['page' => 'order-completion']);
        });
    }
);
