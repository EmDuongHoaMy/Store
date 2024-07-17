<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface OrderServiceInterface
 * @package App\Services\Interfaces
 */
interface OrderServiceInterface
{
    public function create(Request $request);
    public function index(Request $request);
    public function detail($id);
    public function privateOrder();
    public function updateStatus($id,Request $request);
}
