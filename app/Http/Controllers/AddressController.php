<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Region;
use App\Models\Settlement;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function districts($regionId)
    {
        return District::where('region_id', $regionId)->get();
    }

    public function settlements($districtId)
    {
        return Settlement::where('district_id', $districtId)->get();
    }

    public function  regions()
    {
        return Region::all();
    }
}
