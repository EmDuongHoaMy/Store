<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Interfaces\ProductServiceInterface as ProductService;

class StoreController extends Controller
{   
    protected $productService;
    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }

    public function index(Request $request){
        $product = $this->productService->paginate($request);
        return view('store.index',compact('product','request'));
    }

    public function review(int $id){
        $product = $this->productService->get($id);
        $other = Product::where('id','!=',$id)->paginate(4);
        return view('store.review',compact('product','other'));
    }

    public function pay(int $id,Request $request){
        $this->productService->storevalidate($request);
        return view('store.pay');
    }
}
