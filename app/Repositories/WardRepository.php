<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Repositories\Interfaces\WardRepositoryInterface;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;




/**
 * Class WardRepository.
 */
class WardRepository implements WardRepositoryInterface
{
    public function getAll(){
        return Ward::all();
    }

    public function getByDistrict($district_code)
    {
        $wards = Ward::where('district_code', $district_code)->get();
        return $wards;
    }
}
