<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface ProductServiceInterface
 * @package App\Services\Interfaces
 */
interface ProductServiceInterface
{
    public function paginate(Request $request);
    public function validate(Request $request);
    public function create(Request $request);
    public function update(int $id,Request $request);
    public function destroy(int $id);
    public function get(int $id);
    public function storevalidate(Request $request);
    public function addtocart(Request $request);
    public function delete_item(string $id);
    public function paginateByCatalogue(int $id);
    public function getImageUrl(Request $request);
    public function getAttribute($product_id);
}
