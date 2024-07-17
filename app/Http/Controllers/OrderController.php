<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\OrderServiceInterface as OrderService;

class OrderController extends Controller
{   
    protected $orderService;
    public function __construct(
        OrderService $orderService
    )
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request){
        $order = $this->orderService->index($request);
        return view('order.index',compact('order','request'));
    }

    public function detail($id){
        $detail = $this->orderService->detail($id);
        return view('order.detail',compact('detail'));
    }

    public function psOrder(){
        $order = $this->orderService->privateOrder();
        return view('order.private',compact('order'));
    }

    public function updateStatus($id,Request $request){
        $result = $this->orderService->updateStatus($id,$request);
        return response()->json(['status'=> $result]);
    }
}
