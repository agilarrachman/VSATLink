<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Mail;

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
                $status = (object) Transaction::status($order->midtrans_order_id);

                if (in_array($status->transaction_status, ['settlement', 'capture'])) {
                    Order::processPaymentSuccess($order, $status->payment_type);

                    $order->refresh();

                    $invoicePath = storage_path(
                        'app/public/' . $order->invoice_document_url
                    );

                    $dataOrder = [
                        'order' => $order
                    ];

                    Mail::send('emails.invoice-paid-customer', $dataOrder, function ($message) use ($order, $invoicePath) {
                        $message->to($order->customer->email)
                            ->subject('[NOTIFIKASI] Invoice Pembayaran - ' . $order->unique_order);

                        if (file_exists($invoicePath)) {
                            $message->attach($invoicePath, [
                                'as' => 'INVOICE-' . $order->unique_order . '.pdf',
                                'mime' => 'application/pdf',
                            ]);
                        }
                    });

                    if (
                        $order->customer->customer_type !== 'Perorangan'
                        && $order->customer->contact_email
                    ) {

                        Mail::send('emails.invoice-paid-customer', $dataOrder, function ($message) use ($order, $invoicePath) {
                            $message->to($order->customer->contact_email)
                                ->subject('[NOTIFIKASI] Invoice Pembayaran - ' . $order->unique_order);

                            if (file_exists($invoicePath)) {
                                $message->attach($invoicePath, [
                                    'as' => 'INVOICE-' . $order->unique_order . '.pdf',
                                    'mime' => 'application/pdf',
                                ]);
                            }
                        });
                    }

                    $logisticEmails = Admin::getAllLogicticEmail();

                    Mail::send('emails.order-paid-logistic', $dataOrder, function ($message) use ($order, $logisticEmails) {
                        $message->to($logisticEmails)
                            ->subject('[NOTIFIKASI] Pembayaran Diterima - ' . $order->unique_order);
                    });
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
