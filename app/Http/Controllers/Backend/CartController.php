<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AddCart;
use App\Models\Product;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class CartController extends Controller
{
    public function add_cart(Request $request, $id){
  
            if(AddCart::where('product_id',$id)->exists()){
                $item=Product::find($id);
                $cart = AddCart::where('product_id', $id)->first();
                $cart->increment('quantity', '1');
                $cart->price=$item->product_price*$cart->quantity;
                $cart->save();
                $cartcount=$cart->quantity;
    
                return response()->json([
                      'status'=>'success',
                      'cartcount'=>$cartcount,
                    ]);  
            }else{
                
                $addcart=new AddCart();
                $item=Product::find($id);
                // $bb=AddCart::where('product_id',$id)->exists();
                
                    $addcart->user_id=Auth::user()->id;
                    $addcart->product_id=$id;
                    $addcart->name=$item->product_name;
                    $addcart->price=$item->product_price;
                    $addcart->image=$item->image;
                    $addcart->quantity=1;
                    $addcart->save();
         
                return response()->json([
                'quantity'=>$addcart->quantity,
                  'status'=>'success'
                ]);   
            }

        
        
        // if(AddCart::where('product_id',$id)->exists()){
        //     $item=Product::find($id);
        //     $cart = AddCart::where('product_id', $id)->first();
        //     $cart->increment('quantity', '1');
        //      $cart->price=$item->product_price*$cart->quantity;
        //     $cart->save();
        //     $cartcount=$cart->quantity;

        //     return response()->json([
        //           'status'=>'success',
        //           'cartcount'=>$cartcount,
        //         ]);  
        // }else{
            
        //     $addcart=new AddCart();
        //     $item=Product::find($id);
        //     // $bb=AddCart::where('product_id',$id)->exists();
            
        //         $addcart->user_id=Auth::user()->id;
        //         $addcart->product_id=$id;
        //         $addcart->name=$item->product_name;
        //         $addcart->price=$item->product_price;
        //         $addcart->image=$item->image;
        //         $addcart->quantity=1;
        //         $addcart->save();
     
        //     return response()->json([
        //     'quantity'=>$addcart->quantity,
        //       'status'=>'success'
        //     ]);   
        // }

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
        $cartshow=AddCart::where('user_id',Auth::user()->id)->count('quantity');
        
        return response()->json([
            'status'=>'success',
            'count'=>$cartshow,
            'alldata'=>$cart_all_data,

        ]);
    }

    public function increase_quantity(Request $request, $id){
        $data=AddCart::find($id);
        $product=Product::where('id',$data->product_id)->first(); 
        // dd($request->quantity*$product->product_price);
        if($product->quantity < $request->quantity){
          return response()->json([

            'status'=>'failed',
            'quantity'=> $request->quantity.' Item Not Availavilable',
            'available'=>$product->quantity.' Item are Available',

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
      public function cartcount(){
       
        $totalamount=AddCart::where('user_id',Auth::user()->id)->sum('price');

        return response()->json([
            'status'=>'success',
            'totalamount'=>$totalamount,

        ]);

      }
}
