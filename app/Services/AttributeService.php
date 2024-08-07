<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Services\Interfaces\AttributeServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/**
 * Class AttributeService
 * @package App\Services
 */
class AttributeService implements AttributeServiceInterface
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $attribute = Attribute::all();
        }
        else{
            $attribute = Attribute::where('attribute_name', 'like', '%' . $keyword . '%')
            ->get();
        }
        return $attribute;
    }

    public function validate(Request $request){
        $validation = $request->validate([
            'attribute_name' =>'required|unique:attributes',
        ],[
            'attribute_name.unique'=>'Tên thuộc tính đã tồn tại',
            'attribute_name.required'=>'Tên thuộc tính không thể để trống'
        ]);
        return $validation;
    }

    public function create(Request $request){
        Attribute::create([
            'attribute_name'=>$request->input('attribute_name')
        ]);
    }

    public function valueIndex(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $attribute = AttributeValue::all();
        }
        else{
            $attribute = AttributeValue::where('attribute_id', 'like', '%' . $keyword . '%')
            ->get();
        }
        return $attribute;
    }
    public function valueValidate(Request $request){
        $validation = $request->validate([
            'attribute_value' =>'required',
        ],[
            'attribute_value.required'=>'Giá trị thuộc tính không thể để trống',
        ]);
        return $validation;
    }
    public function valueCreate(Request $request){
        AttributeValue::create([
            'attribute_id'=>$request->input('attribute_id'),
            'attribute_value'=>$request->input('attribute_value')
        ]);
    }

    public function getAttibute(Request $request){
        $attributeList = $request->input('option');
        $attribute = [];
        if ($attributeList) {
            foreach ($attributeList as $value) {
                $attributeName = Attribute::find($value)->attribute_name;
                $attributeValue = AttributeValue::where('attribute_id','=',$value)->get();
                $attribute[] = [
                    'name'  => $attributeName,
                    'value' => $attributeValue
                ];
            }
        }
        return $attribute;

    }
    

}
