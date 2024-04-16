<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCatalogue;
use App\Services\Interfaces\ProductCatalogueServiceInterface as ProductCatalogueService;

use Illuminate\Support\Facades\Auth;

class ProductCatalogueController extends Controller
{   
    protected $productCatalogueService;
    public function __construct(
        ProductCatalogueService $productCatalogueService,
    )
    {
        $this->productCatalogueService = $productCatalogueService;
    }

    public function index(Request $request){
        $productcatalogue = $this->productCatalogueService->paginate($request);
        return view('productcatalogue.index',compact('productcatalogue','request'));
    }

    public function add(){
        $productcatalogue = $this->productCatalogueService->getAll();
        return view('productcatalogue.create',compact('productcatalogue'));
    }

    public function create(Request $request){
        $this->productCatalogueService->validate($request);
        $this->productCatalogueService->create($request);
        return redirect(route('productcatalogue.index'))->with('success','Thêm mới thành viên thành công');   
    }

    public function edit($id){
        $productcatalogue = $this->productCatalogueService->get($id);
        $parent = $this->productCatalogueService->get($productcatalogue->parent_id);
        $productcatalogue_all = $this->productCatalogueService->getAll();
        return view('productcatalogue.update',compact('productcatalogue','productcatalogue_all','parent'));
    }

    public function update($id,Request $request){
        $this->productCatalogueService->update($id,$request);
        return redirect(route('productcatalogue.index'))->with('success','Cập nhật thông tin thành công');
    }

    public function delete($id){
        $productcatalogue = $this->productCatalogueService->get($id);
        $parent = $this->productCatalogueService->get($productcatalogue->parent_id);
        $productcatalogue_all = $this->productCatalogueService->getAll();
        return view('productcatalogue.destroy',compact('productcatalogue','parent','productcatalogue_all'));
    }

    public function destroy($id){
        $this->productCatalogueService->destroy($id);
        return redirect(route('productcatalogue.index'))->with('success','Xoá thông tin thành công');

    }

    public function getDescription(Request $request){
        $productcatalogue = $this->productCatalogueService->get($request->input('products_catalogue_id'));
        return response()->json($productcatalogue);
    }


}
