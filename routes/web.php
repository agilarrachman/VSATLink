<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['page' => 'home']);
});
Route::get('/login', function () {
    return view('login', ['page' => 'login']);
});
Route::get('/detail-produk', function () {
    return view('product-detail', ['page' => 'product-detail']);
});
Route::get('/pesanan', function () {
    return view('orders', ['page' => 'orders']);
});
Route::get('/detail-pesanan', function () {
    return view('order-detail', ['page' => 'order-detail']);
});
Route::get('/lengkapi-pesanan', function () {
    return view('order-complete', ['page' => 'order-complete']);
});
