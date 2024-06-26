<?php

namespace App\Services;

// use App\Models\User;
use App\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;
use App\Models\ProductCatalogue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;


/**
 * Class ProductService
 * @package App\Services
 */
class ProductService implements ProductServiceInterface
{
    public function paginate(Request $request){
        $keyword = $request->input('keyword');
        if ($keyword==null) {
            $product = Product::all();
        }
        else{
            $product = Product::where('name', 'like', '%' . $keyword . '%')->get();
        }
        return $product;
    }

    public function validate(Request $request){
        $validate = $request->validate([
        'name'  =>'required',
        'description'=>'required',
        'price' =>'required',
        'image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],[
        'name.required'=>'Tên sản phẩm không được để trống',
        'description'=>'Mô tả sản phẩm không được để trống',
        'price' => 'Giá sản phẩm không thể để trống',
        'image' => 'Hình ảnh định dạng không phù hợp'
        ]);
        return $validate;
    }

    public function create(Request $request){
        $image = $this->getImageUrl($request);
        Product::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price' =>$request->input('price'),
            'products_catalogue_id'=> $request->input('products_catalogue_id'),
            'images'=>$image
        ]);
    }

    public function update(int $id,Request $request){
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->images = $request->file('image') != null ? $this->getImageUrl($request) : $product->images;
        $product->save();
    }

    public function destroy(int $id){
        Product::find($id)->delete();
    }

    public function get(int $id){
        return Product::find($id);
    }

    public function storevalidate(Request $request){
        $validate = $request->validate([
            'size'=>'required',
            'quantity'=>'required'
        ],[
            'size'=>'Vui lòng chọn size muốn mua',
            'quantity'=>"Hãy chọn số lượng mà bạn muốn mua"
        ]);
        return $validate;
    }

    public function addtocart(Request $request){
        $this->storevalidate($request);
        $productId = $request->input('id');
        $quantity = $request->input('quantity', 1);
        $size = $request->input('size');
        $cartItemId = $request->input('cart_item_id');
        // Make card ID by size and product ID from request
        $card_id = $size . '-' . $productId;

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$card_id])) {
            // Update quantity if product is already in the cart
            $cart[$card_id]['quantity'] += $quantity;
        } else {
            // Add new item to the cart
            $cart[$card_id] = [
                'id' => $card_id,
                'product_id'=>$product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'size' =>$size,
                'images'    =>$product->images
            ];
        }

        session()->put('cart', $cart);

        // Calculate the total quantity
        $totalQuantity = 0;
        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
        }
        return response()->json(['message' => 'Thêm vào giỏ thành công', 'cartCount' => $totalQuantity], 200);
    }

    public function delete_item(string $id){
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }
    
    public function paginateByCatalogue(int $id){
            $product_catalogue = ProductCatalogue::find($id);
            // Lấy ra tất cả các sản phẩm của nhóm cha
            $product = Product::where('products_catalogue_id','like',$product_catalogue->id)->get()->toArray();
            //Tìm các nhóm con của nó
            $child = $product_catalogue->descendants()->get();
            // dd($child);die;
            foreach ($child as $item) {
            //Lấy các sản phẩm của nhóm con và thêm chúng vào mảng sản phẩm
            $product_child = Product::where('products_catalogue_id', 'like',$item->id)->get()->toArray();
            $product = array_merge($product,$product_child);

            }
        return $product;
    }

    public function getImageUrl(Request $request){
        // Tạo đường dẫn ảnh
        if ($files = $request->file('image')) {
            //insert new file
            $destinationPath = 'products/images/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $image = "products/images/$profileImage";
         }
         else {
            $image = "";
         }
        return $image; 
    }
}
