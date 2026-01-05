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

        if ($order->current_status_id >= 3) {
            abort(403, 'Pesanan sudah dilengkapi.');
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
        $device_weight = $request->input('device_weight');

        $response = Http::asForm()->withOptions(['verify' => false])->post($url_jne . 'pricedev', [
            'username' => $username,
            'api_key' => $api_key,
            'from' => 'BOO10000',
            'thru' => $village->tariff_code,
            'weight' => $device_weight,
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
        try {
            $validatedData = $request->validate([
                // order
                'shipping_cost' => 'required|integer|min:0',
                'tax_cost'      => 'required|integer|min:0',
                'total_cost'    => 'required|integer|min:0',
                'shipping'      => 'required|in:JNE,Ambil Ditempat',

                // contact
                'name'  => 'required|string|max:255',
                'email' => 'required|email:dns',
                'phone' => 'required|string|max:20',

                // address
                'province' => 'required_if:shipping,JNE',
                'city'     => 'required_if:shipping,JNE',
                'district' => 'required_if:shipping,JNE',
                'village'  => 'required_if:shipping,JNE',
                'rt'       => 'required_if:shipping,JNE|string',
                'rw'       => 'required_if:shipping,JNE|string',
                'postal-code' => 'required_if:shipping,JNE|string',
                'address'  => 'required_if:shipping,JNE|string',
            ], [
                'email.email' => 'Format email tidak valid atau domain tidak ditemukan',
                'email.dns' => 'Domain email tidak valid atau tidak dapat ditemukan',
                'required_if' => 'Field :attribute wajib diisi ketika pengiriman menggunakan JNE',
            ]);

            Log::info('Mulai melengkapi pesanan', [
                'order_id' => $order->id,
                'payload'  => $validatedData,
            ]);

            $order = Order::completeOrder($order, $validatedData);

            Log::info('Pesanan berhasil dilengkapi', [
                'order_id' => $order->id,
            ]);

            return redirect()
                ->to("/detail-pesanan/{$order->unique_order}")
                ->with('success', 'Pesanan berhasil dilengkapi silakan melakukan pembayaran!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validasi gagal', [
                'order_id' => $order->id ?? null,
                'errors'   => $e->errors(),
            ]);

            return back()
                ->withInput()
                ->withErrors($e->validator);
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memproses pesanan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
