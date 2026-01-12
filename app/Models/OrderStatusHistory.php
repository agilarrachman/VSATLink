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

    public static function getConfirmedStatusOrder($order)
    {
        return self::where('order_id', $order)
            ->where('order_status_id', 2)
            ->first();
    }

    public static function getReceivedStatusOrder($order)
    {
        return self::where('order_id', $order)
            ->where('order_status_id', 7)
            ->first();
    }

    public static function getStatusCompletedOrder($orderId)
    {
        return self::where('order_id', $orderId)
            ->where('order_status_id', 3)
            ->orderBy('created_at')
            ->first();
    }

    public static function getCancelStep($orderId)
    {
        $statusIds = self::where('order_id', $orderId)
            ->pluck('order_status_id')
            ->toArray();

        if (!in_array(8, $statusIds)) {
            return null;
        }

        sort($statusIds);

        return match (true) {
            $statusIds === [1, 8] => 'konfirmasi',
            $statusIds === [1, 2, 3, 8] => 'pembayaran',
            default => null,
        };
    }
}
