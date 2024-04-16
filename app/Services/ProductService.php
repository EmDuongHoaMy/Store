<?php

namespace App\Services;

// use App\Models\User;
use App\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;


/**
 * Class ProductService
 * @package App\Services
 */
class ProductService implements ProductServiceInterface
{
    public function paginate(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $product = Product::paginate(30);
        }
        else{
            $product = Product::where('name', 'like', '%' . $keyword . '%')
            ->paginate(30);
        }
        return $product;
    }

    public function validate(Request $request){
        $validate = $request->validate([
        'name'  =>'required',
        'description'=>'required',
        'price' =>'required'
        ],[
        'name.required'=>'Tên sản phẩm không được để trống',
        'description'=>'Mô tả sản phẩm không được để trống',
        'price' => 'Giá sản phẩm không thể để trống'
        ]);
        return $validate;
    }

    public function create(Request $request){
        $faker = Faker::create();
        Product::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price' =>$request->input('price'),
            'products_catalogue_id'=> $request->input('products_catalogue_id'),
            'images'=>$faker->imageUrl(500,500,'shirt',true)
        ]);
    }

    public function update(int $id,Request $request){
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
    }

    public function destroy(int $id){
        Product::find($id)->delete();
    }

    public function get(int $id){
        return Product::find($id);
    }

    public function storevalidate(Request $request){
        $validate = $request->validate([
            'size'=>'required',
            'quantity'=>'required'
        ],[
            'size'=>'Vui lòng chọn size muốn mua',
            'quantity'=>"Hãy chọn số lượng mà bạn muốn mua"
        ]);
    }
    
}
