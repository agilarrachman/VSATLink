<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/detail-produk/{product}', [ProductController::class, 'show']);
Route::get('/login', [CustomerController::class, 'login'])->name('login');
Route::post('/login', [CustomerController::class, 'authenticate']);
Route::middleware(['auth'])->group(
    function () {
        Route::post('/logout', [CustomerController::class, 'logout']);
        Route::get('/profil', [CustomerController::class, 'profile']);
        
        Route::post('/create-order', [OrderController::class, 'store']);
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
