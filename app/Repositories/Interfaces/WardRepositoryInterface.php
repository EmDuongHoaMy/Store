<?php

namespace App\Repositories\Interfaces;

/**
 * Interface WardRepositoryInterface
 * @package App\Repositories
 */
interface WardRepositoryInterface
{
    public function getAll();
    public function getByDistrict($district_code);
}
