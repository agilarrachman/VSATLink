<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['page' => 'home']);
});
Route::get('/login', function () {
    return view('login', ['page' => 'login']);
});
Route::get('/detail-produk', function () {
    return view('product-detail', ['page' => 'detail-produk']);
});
Route::get('/pesanan', function () {
    return view('orders', ['page' => 'orders']);
});
Route::get('/detail-pesanan', function () {
    return view('order-detail', ['page' => 'order-detail']);
});
