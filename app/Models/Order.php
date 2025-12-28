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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order_statuses()
    {
        return $this->belongsTo(OrderStatus::class);
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

            return self::create([
                'customer_id' => $user->id,
                'product_id' => $productId,
                'current_status_id' => 1,
                'order_contact_id' => null,
                'order_address_id' => null,
                'unique_order' => $uniqueOrder,
                'activation_address_id' => $activationAddress->id,
                'product_cost' => $product->otc_cost,
            ]);
        });
    }
}
