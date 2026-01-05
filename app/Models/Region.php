<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Region extends Model
{
    public static function provinces()
    {
        return DB::table('provinces')
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public static function cities($provinceId)
    {
        return DB::table('cities')
            ->select('id', 'name')
            ->where('province_id', $provinceId)
            ->orderBy('name')
            ->get();
    }

    public static function districts($cityId)
    {
        return DB::table('districts')
            ->select('id', 'name')
            ->where('city_id', $cityId)
            ->orderBy('name')
            ->get();
    }

    public static function villages($districtId)
    {
        return DB::table('villages')
            ->select('id', 'name', 'tariff_code')
            ->where('district_id', $districtId)
            ->orderBy('name')
            ->get();
    }
    
    public static function postalcode($villageId)
    {
        return DB::table('villages')
            ->select('postal_code')
            ->where('id', $villageId)
            ->first();
    }
}
