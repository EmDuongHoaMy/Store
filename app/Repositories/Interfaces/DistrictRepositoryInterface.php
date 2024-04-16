<?php

namespace App\Repositories\Interfaces;

/**
 * Interface DistrictRepositoryInterface
 * @package App\Repositories
 */
interface DistrictRepositoryInterface
{
    public function getAll();
    public function getByProvince($province_code);
    public function getDistrict($id);

}
