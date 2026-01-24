<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderContact extends Model
{
    /** @use HasFactory<\Database\Factories\OrderContactFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
