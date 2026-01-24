<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationAddress extends Model
{
    /** @use HasFactory<\Database\Factories\ActivationAddressFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
