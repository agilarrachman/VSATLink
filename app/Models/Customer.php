<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Customer extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function province()
    {
        return DB::table('provinces')
            ->where('id', $this->province_id)
            ->first();
    }

    public function city()
    {
        return DB::table('cities')
            ->where('id', $this->city_id)
            ->first();
    }

    public function district()
    {
        return DB::table('districts')
            ->where('id', $this->district_id)
            ->first();
    }

    public function village()
    {
        return DB::table('villages')
            ->where('id', $this->village_id)
            ->first();
    }
}
