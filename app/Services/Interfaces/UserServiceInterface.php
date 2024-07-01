<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    public function paginate(Request $request);
    public function validate(Request $request);
    public function create(Request $request);
    public function update(int $id,Request $request);
    public function destroy(int $id);
    public function lgvalidate(Request $request);
    public function get($id);
}
