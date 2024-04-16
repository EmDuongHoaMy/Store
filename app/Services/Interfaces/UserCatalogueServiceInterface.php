<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface UserCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface UserCatalogueServiceInterface
{
    public function paginate(Request $request);
    public function validate(Request $request);
    public function create(Request $request);
    public function update(int $id,Request $request);
    public function destroy(int $id);
    public function get($id);
}
