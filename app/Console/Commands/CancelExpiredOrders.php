<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\OrderStatusHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CancelExpiredOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cancel-expired-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Order was automatically cancelled due to payment not being completed within 2 days after the order was fully completed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::where('current_status_id', 3)
            ->where('payment_success', 0)
            ->get();

        foreach ($orders as $order) {

            $statusCompletedOrder = OrderStatusHistory::getStatusCompletedOrder($order->id);
            $expiredAt = Carbon::parse($statusCompletedOrder->created_at)->addDays(2);

            if (now()->greaterThan($expiredAt)) {
                Order::cancelExpiredOrder($order->id);
                Log::info('Pesanan dengan nomor ' . $order->unique_order . ' dibatalkan secara otomatis karena melewati batas waktu pembayaran.');
            }
        }

        return Command::SUCCESS;
    }
}
