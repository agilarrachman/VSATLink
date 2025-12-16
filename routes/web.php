<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['page' => 'home']);
});
Route::get('/login', function () {
    return view('login', ['page' => 'login']);
});
Route::get('/orders', function () {
    return view('orders', ['page' => 'orders']);
});
Route::get('/detail-product', function () {
    return view('detail-product', ['page' => 'detail-product']);
});
