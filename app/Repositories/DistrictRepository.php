<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Models\Province;
use App\Models\District;



/**
 * Class DistrictRepository.
 */
class DistrictRepository implements DistrictRepositoryInterface
{
    public function getAll(){
        return District::all();
    }

    public function getByProvince($province_code){
        $districts = District::where('province_code', $province_code)->get();
        return $districts;
    }

    public function getDistrict($id){
        $districts = District::where('code', $id)->get();
        return $districts;
    }
}
