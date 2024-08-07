<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Services\Interfaces\AttributeServiceInterface as AttributeService;

class AttributeController extends Controller
{
    protected $attributeService;
    public function __construct(
        AttributeService $attributeService
    )
    {
        $this->attributeService = $attributeService;
    }

    public function index(Request $request){
        $attribute = $this->attributeService->index($request);
        return view('attribute.index',compact('attribute','request'));
    }

    public function add(){
        return view('attribute.create');
    }

    public function create(Request $request){
        $this->attributeService->validate($request);
        $this->attributeService->create($request);
        return redirect(route('attribute.index'))->with('success','Thêm mới nhóm thuộc tính thành công');
    }

    public function valueIndex(Request $request){
        $attribute = $this->attributeService->valueIndex($request);
        return view('attribute.valueIndex',compact('attribute','request'));
    }

    public function valueAdd(){
        $attribute = Attribute::all();
        return view('attribute.valueCreate',compact('attribute'));
    }

    public function valueCreate(Request $request){
        $this->attributeService->valueValidate($request);
        $this->attributeService->valueCreate($request);
        return redirect(route('attribute_value.index'))->with('success','Thêm mới giá trị thuộc tính thành công');
    }

    public function addAttribute(Request $request){
        $attribute = $this->attributeService->getAttibute($request);
        return response()->json(['attribute' =>$attribute]);
    }
}
