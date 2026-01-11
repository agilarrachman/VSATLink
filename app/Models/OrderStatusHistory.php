<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusHistory extends Model
{
    /** @use HasFactory<\Database\Factories\OrderStatusHistoryFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public static function getLatestStatusOrder($order)
    {
        return self::where('order_id', $order)
            ->latest()
            ->first();
    }

    public static function getStatusCompletedOrder($orderId)
    {
        return self::where('order_id', $orderId)
            ->where('order_status_id', 3)
            ->orderBy('created_at')
            ->first();
    }
}
