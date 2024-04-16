<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCatalogue;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;

use Illuminate\Support\Facades\Auth;

class UserCatalogueController extends Controller
{   
    protected $userCatalogueService;
    public function __construct(
        UserCatalogueService $userCatalogueService,
    )
    {
        $this->userCatalogueService = $userCatalogueService;
    }

    public function index(Request $request){
        $usercatalogue = $this->userCatalogueService->paginate($request);
        return view('usercatalogue.index',compact('usercatalogue','request'));
    }

    public function add(){
        return view('usercatalogue.create');
    }

    public function create(Request $request){
        $this->userCatalogueService->validate($request);
        $this->userCatalogueService->create($request);
        return redirect(route('usercatalogue.index'))->with('success','Thêm mới thành viên thành công');   
    }

    public function edit($id){
        $usercatalogue = $this->userCatalogueService->get($id);
        return view('usercatalogue.update',compact('usercatalogue'));
    }

    public function update($id,Request $request){
        $this->userCatalogueService->update($id,$request);
        return redirect(route('usercatalogue.index'))->with('success','Cập nhật thông tin thành công');
    }

    public function delete($id){
        $usercatalogue = $this->userCatalogueService->get($id);
        return view('usercatalogue.destroy',compact('usercatalogue'));
    }

    public function destroy($id){
        $this->userCatalogueService->destroy($id);
        return redirect(route('usercatalogue.index'))->with('success','Xoá thông tin thành công');

    }
}
