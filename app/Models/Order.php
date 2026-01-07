<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'unique_order';
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class, 'current_status_id');
    }

    public function order_status_histories()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function order_contact()
    {
        return $this->belongsTo(OrderContact::class);
    }

    public function order_address()
    {
        return $this->belongsTo(OrderAddress::class);
    }

    public function activation_address()
    {
        return $this->belongsTo(ActivationAddress::class);
    }

    public static function createOrder($user, $productId, $latitude, $longitude)
    {
        return DB::transaction(function () use ($user, $productId, $latitude, $longitude) {

            $today = Carbon::now()->format('Ymd');

            $lastOrder = self::whereDate('created_at', Carbon::today())
                ->lockForUpdate()
                ->orderBy('id', 'desc')
                ->first();

            if ($lastOrder) {
                $lastIncrement = (int) substr($lastOrder->unique_order, -4);
                $increment = $lastIncrement + 1;
            } else {
                $increment = 1;
            }

            $uniqueOrder = 'VSL-' . $today . '-' . str_pad($increment, 4, '0', STR_PAD_LEFT);

            $activationAddress = ActivationAddress::create([
                'latitude' => $latitude,
                'longitude' => $longitude,
                'google_maps_url' => "https://www.google.com/maps?q={$latitude},{$longitude}",
            ]);

            $product = Product::findOrFail($productId);

            $order = self::create([
                'customer_id' => $user->id,
                'product_id' => $productId,
                'current_status_id' => 1,
                'order_contact_id' => null,
                'order_address_id' => null,
                'unique_order' => $uniqueOrder,
                'activation_address_id' => $activationAddress->id,
                'product_cost' => $product->otc_cost,
            ]);

            OrderStatusHistory::create([
                'order_status_id' => 1,
                'order_id' => $order->id,
                'note' => "Pesanan {$uniqueOrder} berhasil dibuat oleh {$user->name} dan menunggu verifikasi pesanan.",
            ]);

            return $order;
        });
    }

    public function statusBadge(): array
    {
        return match ($this->current_status_id) {
            1 => [
                'label' => 'Menunggu Konfirmasi',
                'class' => 'bg-gray-300 text-[var(--primary-color)]',
            ],
            2 => [
                'label' => 'Pesanan Dikonfirmasi',
                'class' => 'bg-gray-300 text-[var(--primary-color)]',
            ],
            3 => [
                'label' => 'Belum Dibayar',
                'class' => 'bg-[#ffab00] text-white',
            ],
            7 => [
                'label' => 'Selesai',
                'class' => 'bg-[#71dd37] text-white',
            ],
            8 => [
                'label' => 'Dibatalkan',
                'class' => 'bg-[#ff3e1d] text-white',
            ],
            default => [
                'label' => 'Sedang Diproses',
                'class' => 'bg-[#03c3ec] text-white',
            ],
        };
    }

    public function actionConfig(): array
    {
        return match ($this->current_status_id) {
            1, 8 => [
                'id' => 'detail-button',
                'label' => 'Lihat Detail',
                'url' => '/detail-pesanan/' . $this->unique_order,
                'show_price' => false,
            ],
            2 => [
                'id' => 'complete-button',
                'label' => 'Lengkapi Pemesanan',
                'url' => '/lengkapi-pesanan/' . $this->unique_order,
                'show_price' => false,
            ],
            3 => [
                'id' => 'pay-button',
                'label' => 'Bayar Sekarang',
                'url' => '#',
                'show_price' => true,
                'note' => '*Pesanan otomatis dibatalkan jika 2x24jam tidak dibayarkan',
            ],
            default => [
                'id' => 'detail-button',
                'label' => 'Lihat Detail',
                'url' => '/detail-pesanan/' . $this->unique_order,
                'show_price' => true,
            ],
        };
    }

    public static function getAllMyOrders($user, ?string $status = null)
    {
        $query = self::where('customer_id', $user->id);

        if ($status && $status !== 'Semua') {
            $statusMap = [
                'Menunggu Konfirmasi' => [1],
                'Dikonfirmasi' => [2],
                'Belum Dibayar' => [3],
                'Sedang Diproses' => [4, 5, 6],
                'Selesai' => [7, 8],
            ];

            if (isset($statusMap[$status])) {
                $query->whereIn('current_status_id', $statusMap[$status]);
            }
        }

        return $query->latest()->get();
    }

    public static function completeOrder(Order $order, array $data)
    {
        DB::transaction(function () use ($order, $data) {
            $contact = OrderContact::create([
                'name'  => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);

            $address = null;

            if ($data['shipping'] === 'JNE') {
                $address = OrderAddress::create([
                    'province_id' => $data['province'],
                    'city_id'     => $data['city'],
                    'district_id' => $data['district'],
                    'village_id'  => $data['village'],
                    'rt'          => $data['rt'] ?? null,
                    'rw'          => $data['rw'] ?? null,
                    'postal_code' => $data['postal-code'] ?? null,
                    'full_address' => $data['address'],
                ]);
            }

            $order->update([
                'shipping'   => $data['shipping'],
                'shipping_cost'     => $data['shipping_cost'],
                'tax_cost'          => $data['tax_cost'],
                'total_cost'        => $data['total_cost'],
                'order_contact_id'  => $contact->id,
                'order_address_id'  => $address?->id,
                'current_status_id' => 3,
            ]);

            OrderStatusHistory::create([
                'order_status_id' => 3,
                'order_id'        => $order->id,
                'note'            => "Pesanan {$order->unique_order} telah dilengkapi",
            ]);
        });

        return $order;
    }

    public static function createOrGetPayment(Order $order): array
    {
        Config::$serverKey = config('app.midtrans_server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        if ($order->payment_token) {
            return [
                'snap_token'   => $order->payment_token,
                'unique_order' => $order->unique_order,
            ];
        }

        $midtransOrderId = $order->unique_order . '-' . now()->timestamp;

        $params = [
            'transaction_details' => [
                'order_id'     => $midtransOrderId,
                'gross_amount' => (int) $order->total_cost,
            ],
            'customer_details' => [
                'first_name' => $order->customer->name,
                'email'      => $order->customer->email,
                'phone'      => $order->customer->phone ?? '',
            ],
            'callbacks' => [
                'finish' => route('pembayaran.selesai'),
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $order->update([
            'payment_token'        => $snapToken,
            'midtrans_order_id'    => $midtransOrderId,
        ]);

        return [
            'snap_token'        => $snapToken,
            'unique_order'      => $order->unique_order,
            'midtrans_order_id' => $midtransOrderId,
        ];
    }

    public static function generateInvoicePdfStatic($order): string
    {
        $pdf = Pdf::loadView('pdf.invoice', [
            'order' => $order
        ]);

        $fileName = 'INVOICE-' . $order->unique_order . '.pdf';
        $databasePath = 'invoices/' . $fileName;

        Storage::disk('public')->put($databasePath, $pdf->output());

        return $databasePath;
    }

    public static function processPaymentSuccess($order, $paymentType)
    {
        $order->update([
            'payment_success'   => 1,
            'payment_method'    => $paymentType,
            'payment_date'      => now(),
            'current_status_id' => 4,
        ]);

        if (!$order->invoice_document_url) {
            $invoiceUrl = self::generateInvoicePdfStatic($order);
            $order->update(['invoice_document_url' => $invoiceUrl]);
        }

        OrderStatusHistory::create([
            'order_status_id' => 4,
            'order_id'        => $order->id,
            'note'            => "Pesanan {$order->unique_order} telah dibayar dan invoice di-generate",
        ]);

        Log::info("Midtrans Payment Success", [
            'order_id' => $order->unique_order,
            'payment_method' => $paymentType,
            'invoice_url' => $order->invoice_document_url,
            'payment_date' => $order->payment_date,
        ]);
    }

    public static function processPaymentExpired($order)
    {
        $order->update([
            'payment_token' => null,
            'midtrans_order_id' => null,
        ]);

        Log::warning("Midtrans Payment Expired", [
            'order_id' => $order->unique_order
        ]);
    }
}
