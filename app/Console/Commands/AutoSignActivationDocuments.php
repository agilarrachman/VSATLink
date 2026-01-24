<?php

namespace App\Console\Commands;

use App\Models\ActivationNota;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AutoSignActivationDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-sign-activation-documents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically signs activation documents that were not manually signed after exceeding the 2-day signing deadline since the online date.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notas = ActivationNota::where('current_status_id', 9)
            ->whereNotNull('activation_document_url')
            ->where('is_document_signed', 0)
            ->get();

        foreach ($notas as $nota) {        
            $expiredAt = Carbon::parse($nota->online_date)->addDays(2);

            if (now()->greaterThan($expiredAt)) {
                ActivationNota::AutoSignActivationDocument($nota);
                Log::info('Pesanan dengan nomor ' . $nota->order->unique_order . ' ditandatangani secara otomatis karena melewati batas waktu tandatangan manual.');
            }
        }

        return Command::SUCCESS;
    }
}
