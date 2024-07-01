<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    public function paginate(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $user = User::paginate(30);
        }
        else{
            $user = User::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('phone_number', 'like', '%' . $keyword . '%')
            ->paginate(30);
        }
        return $user;
    }

    public function validate(Request $request){
        $validate = $request->validate([
        'name'  =>'required',
        'email' =>'required|email|unique:users',
        'password'=>'required|min:8|confirmed'

        ],[
            'name.required'=>'Tên không được để trống',
            'email.required' =>'Email không thể để trống',
            'email.email' =>'Email phải có dạng abc@gmail.com',
            'email.unique' =>'Email đã được đăng ký ',
            'password.min' =>'Mật khẩu phải có ít nhất 8 ký tự',
            'password.confirmed'=>'Mật khẩu không trùng khớp',
            'password.required'=>'Mật khẩu không thể để trống'
        ]);
        return $validate;
    }

    public function create(Request $request){
        User::create([
            'name'  =>$request->input('name'),
            'email' =>$request->input('email'),
            'address'=>$request->input('address'),
            'phone_number'=>$request->input('phone_number'),
            'user_catalogues_id'=>2,
            'password'  =>Hash::make($request->input('password')),
            'province_id'=>$request->input('province_code'),
            'district_id'=>$request->input('district_code'),
            
        ]);
    }

    public function update(int $id,Request $request){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address=$request->input('address');
        $user->phone_number=$request->input('phone_number');
        $user->province_id = $request->input('province_code');
        $user->district_id = $request->input('district_code');
        $user->save();
    }

    public function destroy(int $id){
        User::find($id)->delete();
    }

    public function lgvalidate(Request $request){
        $validate = $request->validate([
        'email' =>'required|email',
        'password'=>'required|min:8'

        ],[
            'email.required' =>'Email không thể để trống',
            'email.email' =>'Email phải có dạng abc@gmail.com',
            'password.min' =>'Mật khẩu phải có ít nhất 8 ký tự',
            'password.required' =>'Mật khẩu không thể để trống',
        ]);
        return $validate;
    }

    public function get($id){
        return User::find($id);
    }

}
