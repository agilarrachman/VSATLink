<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
                'label' => 'Lihat Detail',
                'url' => '/detail-pesanan/' . $this->unique_order,
                'show_price' => false,
            ],
            2 => [
                'label' => 'Lengkapi Pemesanan',
                'url' => '/lengkapi-pesanan',
                'show_price' => false,
            ],
            3 => [
                'label' => 'Bayar Sekarang',
                'url' => '#',
                'show_price' => true,
                'note' => '*Pesanan otomatis dibatalkan jika 2x24jam tidak dibayarkan',
            ],
            default => [
                'label' => 'Lihat Detail',
                'url' => '/detail-pesanan/' . $this->unique_order,
                'show_price' => true,
            ],
        };
    }

    public static function getAllMyOrders($user)
    {
        return self::where('customer_id', $user->id)
            ->latest()
            ->get();
    }
}
