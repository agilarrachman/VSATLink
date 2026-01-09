<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public static function getAllLogicticEmail()
    {
        return self::where('role', 'Logistic Admin')
            ->pluck('email')
            ->toArray();
    }
}
