<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use App\Repositories\Interfaces\WardRepositoryInterface as WardRepository;


class LocationController extends Controller
{   
    protected $districtRepository;
    protected $wardRepository;
    public function __construct(
        DistrictRepository $districtRepository,
        WardRepository $wardRepository
    )
    {
        $this->districtRepository = $districtRepository;
        $this->wardRepository = $wardRepository;
    }
    public function getDistrict(Request $request){
        $province_code = $request->input('province_code');
        $districts = $this->districtRepository->getByProvince($province_code);
        return response()->json($districts);
    }

    public function getWard(Request $request){
        $district_code = $request->input('district_code');
        $wards = $this->wardRepository->getByDistrict($district_code);
        return response()->json($wards);
    }
}
