<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/detail-produk/{product}', [ProductController::class, 'show']);
Route::get('/login', function () {
    return view('login', ['page' => 'login']);
});
Route::get('/profil', function () {
    return view('profile', ['page' => 'profile']);
});
Route::get('/pesanan', function () {
    return view('orders', ['page' => 'orders']);
});
Route::get('/detail-pesanan', function () {
    return view('order-detail', ['page' => 'order-detail']);
});
Route::get('/lengkapi-pesanan', function () {
    return view('order-completion', ['page' => 'order-completion']);
});
