<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AddCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart($id){
        $item=Product::find($id);
        $addcart=new AddCart();
        $addcart->user_id=Auth::user()->id;
        $addcart->product_id=$id;

        $addcart->name=$item->product_name;
        $addcart->price=$item->product_price;
        $addcart->image=$item->image;
        $addcart->quantity=1;
        $addcart->save();

        return response()->json([
          'status'=>'success'
        ]);   
    }

    public function countQnt(){

        $addcart=AddCart::where('user_id',Auth::user()->id)->count();
        return response()->json([
            'status'=>'success',
            'data'=>$addcart,
        ]);
    }

    public function cartshow(){
        $cart_all_data=AddCart::where('user_id',Auth::user()->id)->get();
        $cartshow=AddCart::where('user_id',Auth::user()->id)->count();
        return response()->json([
            'status'=>'success',
            'count'=>$cartshow,
            'alldata'=>$cart_all_data,

        ]);
    }

    public function increase_quantity(Request $request, $id){
        $data=AddCart::find($id);
        $product=Product::where('id',$data->product_id)->first(); 
        if($product->quantity < $request->quantity){
          return response()->json([

            'status'=>'failed',
            'quantity'=>'Sorry this item Stock Out',

          ]);
        }
        $price= $data->price=$product->product_price*$request->quantity;
        $data->quantity=$request->quantity;
 
        $data->update();
        return response()->json([
            'status'=>'success',
            'price'=>$price,
        ]);
    }

}
