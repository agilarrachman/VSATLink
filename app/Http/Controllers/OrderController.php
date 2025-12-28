<?php

namespace App\Http\Controllers;

use App\Models\ActivationAddress;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Pengguna Belum Login'], 401);
        }

        Order::createOrder(
            Auth::user(),
            $request->product_id,
            $request->latitude,
            $request->longitude
        );

        return redirect('/pesanan')->with('success', 'Pesanan berhasil dibuat! Saat ini pesanan Anda sedang kami verifikasi. Notifikasi akan dikirimkan melalui email, mohon cek secara berkala.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
