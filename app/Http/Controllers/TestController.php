<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function index()
    {
        $a = str_replace('xo','viet','duong xo');
        echo $a;

    }
     public function searchAutocomplete(Request $request)
    {
          $search = $request->input('keyword');
          dd($search);die;
     
          $result = User::where('name', 'like', '%' . $search . '%')->pluck('name');
          
          return response()->json($result);
           
    } 
}