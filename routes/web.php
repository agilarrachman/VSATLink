<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [ProductController::class, 'index']);
Route::get('/detail-produk/{product}', [ProductController::class, 'show']);
Route::get('/login', [CustomerController::class, 'login'])->name('login');
Route::post('/login', [CustomerController::class, 'authenticate']);
Route::middleware(['auth'])->group(
    function () {
        Route::post('/logout', [CustomerController::class, 'logout']);
        Route::get('/profil', [CustomerController::class, 'profile']);
        Route::get('/download/dokumen/{filename}', [CustomerController::class, 'downloadDocument']);

        Route::get('/cities/{province}', [RegionController::class, 'cities']);
        Route::get('/districts/{city}', [RegionController::class, 'districts']);
        Route::get('/villages/{district}', [RegionController::class, 'villages']);
        Route::get('/postalcode/{village}', [RegionController::class, 'postalcode']);

        Route::post('/create-order', [OrderController::class, 'store']);
        Route::get('/pesanan', [OrderController::class, 'index']);
        Route::get('/detail-pesanan/{order}', [OrderController::class, 'show']);
        Route::get('/lengkapi-pesanan/{order}', [OrderController::class, 'complete']);
        Route::put('/lengkapi-pesanan/{order}', [OrderController::class, 'update']);
        Route::get('/jne/tarif', [OrderController::class, 'getTariffJNE']);
        Route::post('/pembayaran/{order}', [OrderController::class, 'payment']);
        Route::get('/pembayaran/selesai', [OrderController::class, 'paymentFinish'])->name('pembayaran.selesai');
        Route::post('/pembayaran/verifikasi/{orderId}', [OrderController::class, 'verifyPayment']);
        Route::get('/download/invoice/{filename}', [OrderController::class, 'downloadInvoice']);        
    }
);
