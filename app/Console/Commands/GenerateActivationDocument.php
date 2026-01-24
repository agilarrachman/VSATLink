<?php

namespace App\Console\Commands;

use App\Models\ActivationNota;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GenerateActivationDocument extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-activation-document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate activation document and send it to the customer via email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notas = ActivationNota::where('current_status_id', 9)
            ->whereNull('activation_document_url')
            ->get();

        foreach ($notas as $nota) {
            ActivationNota::generateActivationDocument($nota);

            $nota->refresh();

            $activationDocumentPath = storage_path(
                'app/public/' . $nota->activation_document_url
            );

            $dataNota = [
                'nota' => $nota
            ];

            Mail::send('emails.activation-document', $dataNota, function ($message) use ($nota, $activationDocumentPath) {
                $message->to($nota->order->customer->email)
                    ->subject('[NOTIFIKASI] Aktivasi Berhasil - ' . $nota->order->unique_order);

                if (file_exists($activationDocumentPath)) {
                    $message->attach($activationDocumentPath, [
                        'as' => 'SPA-' . $nota->order->unique_order . '.pdf',
                        'mime' => 'application/pdf',
                    ]);
                }
            });

            if (
                $nota->customer->customer_type !== 'Perorangan'
                && $nota->customer->contact_email
            ) {

                Mail::send('emails.activation-document', $dataNota, function ($message) use ($nota, $activationDocumentPath) {
                    $message->to($nota->order->customer->contact_email)
                        ->subject('[NOTIFIKASI] Aktivasi Berhasil - ' . $nota->order->unique_order);

                    if (file_exists($activationDocumentPath)) {
                        $message->attach($activationDocumentPath, [
                            'as' => 'SPA-' . $nota->order->unique_order . '.pdf',
                            'mime' => 'application/pdf',
                        ]);
                    }
                });
            }
        }

        return Command::SUCCESS;
    }
}
