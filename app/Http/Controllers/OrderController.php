<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatusHistory;
use App\Models\Region;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravolt\Indonesia\Facade as Indonesia;

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
    public function complete(Order $order)
    {
        if ($order->customer_id !== Auth::id()) {
            abort(403, 'Anda bukan pemilik pesanan ini.');
        }

        $provinces = Region::provinces();

        return view('order-completion', [
            'page' => 'order-completion',
            'order' => $order,
            'provinces' => $provinces
        ]);
    }

    public function getTariffJNE(Request $request)
    {
        $url_jne = config('app.url_jne');
        $username = config('app.username_jne');
        $api_key = config('app.api_key_jne');
        $village_id = $request->input('village_id') ?? 95811;
        $village = DB::table('villages')->select('tariff_code')->where('id', $village_id)->first();
        $berat = 39.95;

        $response = Http::asForm()->withOptions(['verify' => false])->post($url_jne . 'pricedev', [
            'username' => $username,
            'api_key' => $api_key,
            'from' => 'BOO10000',
            'thru' => $village->tariff_code,
            'weight' => $berat,
        ]);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'error'   => false,
                'message' => 'Berhasil mendapatkan tarif JNE',
                'data' => $response->json(),
            ], 200);
        }

        return response()->json([
            'success' => false,
            'error'   => true,
            'message' => 'Gagal mendapatkan tarif JNE',
            'status'  => $response->status(),
            'response_raw' => $response->body(),
        ], $response->status());
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
