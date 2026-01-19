<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                'label' => 'Sudah Dijadwalkan',
                'class' => 'bg-[#ffab00] text-white',
            ],
            3 => [
                'label' => 'Siap Instalasi',
                'class' => 'bg-[#03c3ec] text-white',
            ],
            4 => [
                'label' => 'Teknisi Dalam Perjalanan',
                'class' => 'bg-[#03c3ec] text-white',
            ],
            5 => [
                'label' => 'Teknisi Tiba Di Lokasi',
                'class' => 'bg-[#03c3ec] text-white',
            ],
            6 => [
                'label' => 'Request Aktivasi',
                'class' => 'bg-gray-300 text-[var(--primary-color)]',
            ],
            7 => [
                'label' => 'Aktivasi Terverifikasi',
                'class' => 'bg-[#71dd37] text-white',
            ],
            8 => [
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
                'Sudah Dijadwalkan' => [2, 3],
                'Perjalan Teknisi' => [4, 5],
                'Sedang Diproses' => [6],
                'Belum Ditandatangani' => [7],
                'Selesai' => [8],
            ];

            if (isset($statusMap[$status])) {
                $query->whereIn('current_status_id', $statusMap[$status]);
            }
        }

        return $query->latest()->paginate(5)->withQueryString();
    }
}
