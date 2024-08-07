<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface AttributeServiceInterface
 * @package App\Services\Interfaces
 */
interface AttributeServiceInterface
{
    public function index(Request $request);
    public function validate(Request $request);
    public function create(Request $request);
    public function valueIndex(Request $request);
    public function valueValidate(Request $request);
    public function valueCreate(Request $request);
    public function getAttibute(Request $request);
}
