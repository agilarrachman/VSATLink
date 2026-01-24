<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log as Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ActivationNota extends Model
{
    /** @use HasFactory<\Database\Factories\ActivationNotaFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'installation_date' => 'datetime',
        'online_date' => 'datetime',
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function activation_statuses()
    {
        return $this->belongsTo(ActivationStatus::class, 'current_status_id');
    }

    public function activation_status_histories()
    {
        return $this->hasMany(ActivationStatusHistory::class);
    }

    public function statusBadge(): array
    {
        return match ($this->current_status_id) {
            1 => [
                'label' => 'Belum Dijadwalkan',
                'class' => 'bg-[#ff3e1d] text-white',
            ],
            2 => [
                'label' => 'Konfirmasi Jadwal',
                'class' => 'bg-[#ff3e1d] text-white',
            ],
            3 => [
                'label' => 'Belum Dijadwalkan',
                'class' => 'bg-[#ff3e1d] text-white',
            ],
            4 => [
                'label' => 'Sudah Dijadwalkan',
                'class' => 'bg-[#ffab00] text-white',
            ],
            5 => [
                'label' => 'Menunggu Instalasi',
                'class' => 'bg-[#03c3ec] text-white',
            ],
            6 => [
                'label' => 'Teknisi Dalam Perjalanan',
                'class' => 'bg-[#03c3ec] text-white',
            ],
            7 => [
                'label' => 'Teknisi Tiba Di Lokasi',
                'class' => 'bg-[#03c3ec] text-white',
            ],
            8 => [
                'label' => 'Dalam Proses',
                'class' => 'bg-gray-300 text-[var(--primary-color)]',
            ],
            9 => [
                'label' => 'Berhasil Diaktivasi',
                'class' => 'bg-[#71dd37] text-white',
            ],
            10 => [
                'label' => 'SPA Ditandatangani',
                'class' => 'bg-[#71dd37] text-white',
            ]
        };
    }

    public static function getAllMyActivations($user, ?string $status = null)
    {
        $query = self::select('activation_notas.*')
            ->join('orders', 'activation_notas.id', '=', 'orders.activation_nota_id')
            ->where('orders.customer_id', $user->id);

        if ($status && $status !== 'Semua') {
            $statusMap = [
                'Konfirmasi Jadwal' => [2],
                'Sudah Dijadwalkan' => [4],
                'Perjalan Teknisi' => [6],
                'Sedang Diproses' => [7, 8, 9],
                'Belum Ditandatangani' => [9],
                'Selesai' => [10],
            ];

            if (isset($statusMap[$status])) {
                $query->whereIn('activation_notas.current_status_id', $statusMap[$status]);
            }
        }

        return $query->latest()->paginate(5)->withQueryString();
    }

    public static function confirmSchedule($activationNotaId)
    {
        $activationNota = self::findOrFail($activationNotaId);

        $activationNota->update([
            'current_status_id'  => 4,
        ]);

        ActivationStatusHistory::create([
            'activation_status_id' => 4,
            'activation_nota_id'   => $activationNota->id,
            'note' => 'Pelanggan telah mengonfirmasi jadwal instalasi dan aktivasi layanan',
        ]);

        return $activationNota;
    }

    public static function rejectSchedule($activationNotaId, $rejectReason)
    {
        $activationNota = self::findOrFail($activationNotaId);

        $activationNota->update([
            'current_status_id'  => 3,
        ]);

        ActivationStatusHistory::create([
            'activation_status_id' => 3,
            'activation_nota_id'   => $activationNota->id,
            'note' => 'Jadwal instalasi ditolak oleh pelanggan dengan alasan: ' . $rejectReason,
        ]);

        return $activationNota;
    }

    public static function generateActivationDocument($nota)
    {
        $pdf = Pdf::loadView('pdf.activation-document', [
            'nota' => $nota
        ]);

        $fileName = 'SPA-' . $nota->order->unique_order . '.pdf';
        $databasePath = 'activation_documents/' . $fileName;

        Storage::disk('public')->put($databasePath, $pdf->output());

        $nota->update(['activation_document_url' => $databasePath]);
        Log::info("Generate Activation Document Success", [
            'order_id' => $nota->order->unique_order,
            'activation_document_url' => $nota->activation_document_url,
            'online_date' => $nota->online_date,
        ]);
    }

    public static function signingActivationDocument($nota, $signatureBase64)
    {
        Storage::disk('public')->delete($nota->activation_document_url);

        $pdf = Pdf::loadView('pdf.signed-activation-document', [
            'nota' => $nota,
            'signatureCustomer' => $signatureBase64
        ]);

        $fileName = 'SPA-' . $nota->order->unique_order . '.pdf';
        $databasePath = 'activation_documents/' . $fileName;

        Storage::disk('public')->put($databasePath, $pdf->output());

        $nota->update([
            'current_status_id'  => 10,
            'activation_document_url' => $databasePath,
            'is_document_signed' => true,
        ]);

        $timestamp = Carbon::now()->translatedFormat('d F Y H:i');

        ActivationStatusHistory::create([
            'activation_status_id' => 10,
            'activation_nota_id'   => $nota->id,
            'note' => "Dokumen SPA telah ditandatangani oleh pelanggan pada {$timestamp}",
        ]);
    }
}
