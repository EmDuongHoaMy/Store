<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCatalogue;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Services\Interfaces\ProductCatalogueServiceInterface as ProductCatalogueService;
// use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        return view('product.index',compact('product','request'));
    }

    public function add(){
        $productcatalogue_all = $this->productCatalogueService->getAll();
        $attribute = Attribute::all();
        return view('product.create',compact('productcatalogue_all','attribute'));
    }

    public function create(Request $request){
        $this->productService->validate($request);
        $this->productService->create($request);
        return redirect(route('product.index'))->with('success','Thêm mới sản phẩm thành công');   
    }

    public function edit($id){
        $product = $this->productService->get($id);
        return view('product.update',compact('product'));
    }

    public function update($id,Request $request){
        $this->productService->update($id,$request);
        return redirect(route('product.index'))->with('success','Cập nhật thông tin thành công');
    }

    public function delete($id){
        $product = $this->productService->get($id);
        return view('product.destroy',compact('product'));
    }

    public function destroy($id){
        $this->productService->destroy($id);
        return redirect(route('product.index'))->with('success','Xoá thông tin thành công');
    }
}
