<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Transaction;

class CheckMidtransPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-midtrans-payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Midtrans payment status and update order';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Config::$serverKey    = config('app.midtrans_server_key');
        Config::$isProduction = false;
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        $orders = Order::where('current_status_id', 3)
            ->where('payment_success', 0)
            ->whereNotNull('payment_token')
            ->get();

        foreach ($orders as $order) {
            try {
                $status = (object) Transaction::status($order->unique_order);

                if (in_array($status->transaction_status, ['settlement', 'capture'])) {
                    Order::processPaymentSuccess($order, $status->payment_type);
                }

                if ($status->transaction_status === 'expire') {
                    Order::processPaymentExpired($order);
                }
            } catch (\Exception $e) {
                Log::error('Midtrans Scheduler Error', [
                    'order_id' => $order->unique_order,
                    'message'  => $e->getMessage(),
                ]);
            }
        }

        return Command::SUCCESS;
    }
}
