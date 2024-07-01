<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Interfaces\ProductCatalogueServiceInterface;
use App\Models\ProductCatalogue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/**
 * Class ProductCatalogueService
 * @package App\Services
 */
class ProductCatalogueService implements ProductCatalogueServiceInterface
{
    public function paginate(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $product_catalogue = ProductCatalogue::paginate(30);
        }
        else{
            $product_catalogue = ProductCatalogue::where('name', 'like', '%' . $keyword . '%')
            ->paginate(30);
        }
        return $product_catalogue;
    }

    public function validate(Request $request){
        $validate = $request->validate([
        'name'  =>'required',
        'description'=>'required'
        ],[
        'name.required'=>'Tên nhóm sản phẩm không được để trống',
        'description'=>'Mô tả nhóm sản phẩm không được để trống',
        ]);
        return $validate;
    }

    public function create(Request $request){
        // ProductCatalogue::create([
        //     'name'=>$request->input('name'),
        //     'description'=>$request->input('description'),
        //     'parent_id'=>$request->input('parent_id'),
        //     'user_id'  =>Auth::id()
        // ]);
        DB::beginTransaction();

        try {
            ProductCatalogue::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'parent_id'=>$request->input('parent_id'),
                'user_id'  =>Auth::id()
            ]);
            ProductCatalogue::fixTree();
            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, rollback transaction
            DB::rollback();
        }

    }

    public function update(int $id,Request $request){
        $nodes = ProductCatalogue::find($id);
        $parent = ProductCatalogue::find($request->input('parent_id'));
        ProductCatalogue::where('id',$id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'parent_id'=>$request->input('parent_id')
        ]);
        ProductCatalogue::fixTree();

    }

    public function destroy(int $id){
        ProductCatalogue::find($id)->delete();
        ProductCatalogue::fixTree();

    }

    public function get($id){
        return ProductCatalogue::find($id);
    }

    public function getAll(){
        return ProductCatalogue::all();
    }

    public function getAncestors($id){
        $productCatalogue = ProductCatalogue::find($id);
        $group = $productCatalogue->ancestors()->get();
        return $group;
    }
    
}
