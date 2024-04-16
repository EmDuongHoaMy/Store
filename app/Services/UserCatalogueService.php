<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserCatalogueServiceInterface;
use App\Models\UserCatalogue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class UserCatalogueService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{
    public function paginate(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $user_catalogue = UserCatalogue::paginate(30);
        }
        else{
            $user_catalogue = UserCatalogue::where('name', 'like', '%' . $keyword . '%')
            ->paginate(30);
        }
        return $user_catalogue;
    }

    public function validate(Request $request){
        $validate = $request->validate([
        'name'  =>'required',
        'description'=>'required'
        ],[
        'name.required'=>'Tên nhóm thành viên không được để trống',
        'description'=>'Mô tả nhóm thành viên không được để trống',
        ]);
        return $validate;
    }

    public function create(Request $request){
        UserCatalogue::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
    }

    public function update(int $id,Request $request){
        $user_catalogue = UserCatalogue::find($id);
        $user_catalogue->name = $request->input('name');
        $user_catalogue->description = $request->input('description');
        $user_catalogue->save();
    }

    public function destroy(int $id){
        UserCatalogue::find($id)->delete();
    }

    public function get($id){
        return UserCatalogue::find($id);
    }
    
}
