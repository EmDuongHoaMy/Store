<?php

namespace App\Repositories\Interfaces;

/**
 * Interface ProvinceServiceInterface
 * @package App\Repositories
 */
interface ProvinceRepositoryInterface
{
    public function getAll();
    public function getProvince($id);
}
