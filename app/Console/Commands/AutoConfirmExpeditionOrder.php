<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AutoConfirmExpeditionOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-confirm-expedition-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto confirm expedition order if exceeded time limit';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::where('current_status_id', 5)
            ->where('shipping', 'JNE')
            ->whereNull('proof_of_delivery_image_url')
            ->get();

        foreach ($orders as $order) {
            $estimatedReceivedAt = $order->estimated_arrival_date;
            $autoConfirmAt = $estimatedReceivedAt->addDays(7);

            if (now()->greaterThan($autoConfirmAt)) {
                Order::autoConfirmExpeditionOrder($order->id);
                Log::info('Pesanan dengan nomor ' . $order->unique_order . ' dikonfirmasi diterima secara otomatis karena melewati batas waktu konfirmasi.');
            }
        }

        return Command::SUCCESS;
    }
}
