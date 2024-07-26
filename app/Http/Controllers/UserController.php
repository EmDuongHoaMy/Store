<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCatalogue;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    protected $userService;
    protected $provinceRepository;
    protected $districtRepository;
    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository,
        DistrictRepository $districtRepository
    )
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->districtRepository = $districtRepository;
    }

    public function login(){
        return view('user.login.login');
    }

    public function postlogin(Request $request){
        $this->userService->lgvalidate($request);
        $info = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];
        if (Auth::attempt($info)) {
            return redirect(route('home'))->with('success','Đăng nhập thành công');
        }
        return back()->with('error','Email hoặc mật khẩu không đúng');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','Bạn đã đăng xuất thành công');
    }

    public function signin(){
        $province = $this->provinceRepository->getAll();
        $user_catalogue = UserCatalogue::all();
        return view('user.login.signin',compact('province','user_catalogue'));
    }

    public function postsignin(Request $request){
        $this->userService->validate($request);
        $this->userService->create($request);
        return redirect('/')->with('success','Bạn đã đăng ký thành công');    
    }

    public function index(Request $request){
        $users = $this->userService->paginate($request);
        return view('user.index',compact('users','request'));
    }

    public function add(){
        $province = $this->provinceRepository->getAll();
        $user_catalogue = UserCatalogue::all();
        return view('user.create',compact('province','user_catalogue'));
    }

    public function create(Request $request){
        $this->userService->validate($request);
        $this->userService->create($request);
        return redirect(route('user.index'))->with('success','Thêm mới thành viên thành công');   
    }

    public function edit($id){
        $users = $this->userService->get($id);
        $province_all = $this->provinceRepository->getAll();
        $province = $this->provinceRepository->getProvince($users->province_id);
        $district = $this->districtRepository->getDistrict($users->district_id);
        return view('user.update',compact('users','province','district','province_all'));
    }

    public function update($id,Request $request){
        $this->userService->update($id,$request);
        return redirect(route('user.index'))->with('success','Cập nhật thông tin thành công');
    }

    public function userUpdate($id,Request $request){
        $this->userService->update($id,$request);
        return back()->with('success','Cập nhật thông tin thành công');
    }

    public function delete($id){
        $users = $this->userService->get($id);
        return view('user.destroy',compact('users'));
    }

    public function destroy($id){
        $this->userService->destroy($id);
        return redirect(route('user.index'))->with('success','Xoá thông tin thành công');

    }

    public function info(){
        $user = User::find(Auth::id());
        $province_all = $this->provinceRepository->getAll();
        $province = $this->provinceRepository->getProvince($user->province_id);
        $district = $this->districtRepository->getDistrict($user->district_id);
        return view('user.info',compact('user','province_all','province','district'));
    }


}
