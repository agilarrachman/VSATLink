<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getAllProducts()
    {
        return self::all();
    }
    public static function getAllPromoProducts()
    {
        return self::where('is_promo', true)->get();
    }
}
