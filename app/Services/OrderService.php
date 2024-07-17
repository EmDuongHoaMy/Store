<?php

namespace App\Services;

use App\Services\Interfaces\OrderServiceInterface;
use App\Models\OrderItem;
use App\Models\OrderPayment;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/**
 * Class OrderService
 * @package App\Services
 */
class OrderService implements OrderServiceInterface
{
    public function create(Request $request)
    {
        $order = Order::create([
            "customer_id" => Auth::id(),
            "current_status"=>"Chờ xử lý",
        ]);

        if (session('cart')) {
            $cart = session()->get('cart', []);
            $amount = 0;
            foreach ($cart as $item) {
                OrderItem::create([
                    "order_id" => $order->id,
                    "product_id" => $item['product_id'],
                    "product_name" => $item['name'],
                    "product_attribute_id" => $item['attribute'],
                    "product_quantity" => $item['quantity'],
                    "product_images"   => $item['images'],
                    "product_price" => $item['quantity'] * $item['price'],
                ]);
                $amount += $item['quantity'] * $item['price'];
                //Dieu chinh so luong san pham theo thuoc tinh
                $product_attr = ProductAttribute::find($item['attribute']);
                $product_attr['quantity'] -= $item['quantity'];
                $product_attr->save();
                //Dieu chinh so luong tong san pham
                $product = Product::find($item['product_id']);
                $product->quantity -= $item['quantity'];
                $product->save();

            }
        }

        OrderPayment::create([
            "order_id" => $order->id,
            "payment_method" => "Thanh toán trực tiếp",
            "amount" => $amount
        ]);
    }

    public function index(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $order = Order::all();
        }
        else{
            $order = Order::where('customer_id', 'like', '%' . $keyword . '%')->get();
        }
        return $order;

    }

    public function detail($id){
        $order_detail = OrderItem::where("order_id","=",$id)->get();
        return $order_detail;
    }

    public function privateOrder()
    {
        $order = Order::where('customer_id',"=",Auth::id())->get();
        return $order;
    }

    public function updateStatus($id,Request $request){
        $order = Order::find($id);
        $order->current_status = $request->input('status');
        $order->save();
    
        return $order->current_status;
    }
    


    
}
