<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatusHistory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders', [
            "page" => "orders",
            'orders' => Order::getAllMyOrders(Auth::user())
        ]);
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
        $order = Order::createOrder(
            Auth::user(),
            $request->product_id,
            $request->latitude,
            $request->longitude
        );        

        $data = [
            'customer_name' => $order->customer->name,
            'unique_order'  => $order->unique_order,
            'product_name'  => $order->product->name,
            'order_date' => $order->created_at->translatedFormat('d F Y H:i'),
        ];

        $salesEmail = $order->customer->sales->email;

        Mail::send('emails.order-created', $data, function ($message) use ($salesEmail) {
            $message->to($salesEmail)
                ->subject('[NOTIFIKASI] Pesanan Baru dari Customer');
        });;

        return redirect('/pesanan')->with('success', 'Pesanan berhasil dibuat! Saat ini pesanan Anda sedang kami verifikasi. Notifikasi akan dikirimkan melalui email, mohon cek secara berkala.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        if ($order->customer_id !== Auth::id()) {
            abort(403, 'Anda bukan pemilik pesanan ini.');
        }

        return view('order-detail', [
            'page' => 'order-detail',
            'order' => $order,
            'order_status' => OrderStatusHistory::getLatestStatusOrder($order->id)
        ]);
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
