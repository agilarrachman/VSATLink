<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Laravolt\Indonesia\Facade as Indonesia;

class RegionController extends Controller
{
    public function provinces()
    {
        return Region::provinces();
    }

    public function cities($provinceId)
    {
        return Region::cities($provinceId);
    }

    public function districts($cityId)
    {
        return Region::districts($cityId);
    }

    public function villages($districtId)
    {
        return Region::villages($districtId);
    }

    public function postalcode($villageId)
    {
        return Region::postalcode($villageId);
    }
}
