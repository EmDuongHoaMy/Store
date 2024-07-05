<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCatalogue;
use App\Models\User;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Services\Interfaces\ProductCatalogueServiceInterface as ProductCatalogueService ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class StoreController extends Controller
{   
    protected $productService;
    protected $productCatalogueService;
    public function __construct(
        ProductService $productService,
        ProductCatalogueService $productCatalogueService
    )
    {
        $this->productService = $productService;
        $this->productCatalogueService = $productCatalogueService;
    }

    public function index(Request $request){
        $product = $this->productService->paginate($request);
        $product_catalogue = ProductCatalogue::where('parent_id','=',1)
        ->orWhere('parent_id','=',null)->get();
        return view('store.index',compact('product','request','product_catalogue'));
    }

    public function review(int $id){
        $product = $this->productService->get($id);   
        $productCatalogue = $this->productCatalogueService->get($product->products_catalogue_id);
        $productAncestors = $this->productCatalogueService->getAncestors($productCatalogue->id);
        $other = Product::where('products_catalogue_id','=',$product->products_catalogue_id)->paginate(4);
        return view('store.review',compact('product','other','productCatalogue','productAncestors'));
    }

    public function pay(Request $request){
        $user = User::find(Auth::id());
        return view('store.pay',compact('user'));
    }

    
    public function cart(){
        return view('cart.index');
    }

    public function addToCart(Request $request){
        $this->productService->addtocart($request);
    }
    

    public function deleteItem($id){
        $this->productService->delete_item($id);
        return redirect(route('store.cart'));
    }

    public function index_by_catalogue(int $id,Request $request){
        $product = $this->productService->paginateByCatalogue($id);
        $product_catalogue = ProductCatalogue::where('parent_id','=',1)
        ->orWhere('parent_id','=',null)->get();
        return view('store.index',compact('product','request','product_catalogue'));
    }

    public function order(Request $request){
        dd($request->all());
    }
}
