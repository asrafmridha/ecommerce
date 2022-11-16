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
  
        if(Auth::check()){

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
            }
            else{
                
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
           }
        else{
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
            }
            else
            {
                $addcart=new AddCart();
                $item=Product::find($id);
                // $clientIP = \Request::getClientIp(true); 
                //  $clientIP = request()->ip();
                // dd($clientIP);
                //  dd($clientIP);
                    $addcart->user_ip=request()->ip();
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

            }
        }

      
        //    else{

            // if(AddCart::where('product_id',$id)->exists()){
            //     $item=Product::find($id);
            //     $cart = AddCart::where('product_id', $id)->first();
            //     $cart->increment('quantity', '1');
            //     $cart->price=$item->product_price*$cart->quantity;
            //     $cart->save();
            //     $cartcount=$cart->quantity;
    
            //     return response()->json([
            //           'user_status'=>'success',
            //           'cartcount'=>$cartcount,
            //         ]);  
            // }

            // else{
                
            //     $addcart=new AddCart();
            //     $item=Product::find($id);
            //     // $bb=AddCart::where('product_id',$id)->exists();
                
            //         $addcart->user_id= 000000000000;
            //         // $addcart->user_id=request()->ip();
            //         $addcart->product_id=$id;
            //         $addcart->name=$item->product_name;
            //         $addcart->price=$item->product_price;
            //         $addcart->image=$item->image;
            //         $addcart->quantity=1;
            //         $addcart->save();
         
            //     return response()->json([
            //     'quantity'=>$addcart->quantity,
            //       'new_status'=>'success'
            //     ]);   
            // }
        //    }

        
        
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

    // }

    public function countQnt(){

        if(Auth::check()){

        $addcart=AddCart::where('user_id',Auth::user()->id)->count();
        return response()->json([
            'status'=>'success',
            'data'=>$addcart,
        ]);
        }
        else{

        $addcart=AddCart::where('user_ip',request()->ip())->count();
        return response()->json([
            'status'=>'success',
            'data'=>$addcart,
        ]);
        }   
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
       
        if(Auth::check()){

            $totalamount=AddCart::where('user_id',Auth::user()->id)->sum('price');
            return response()->json([
                'status'=>'success',
                'totalamount'=>$totalamount,
    
            ]);
        }
        else{

            $totalamount=AddCart::where('user_ip',request()->ip())->sum('price');
            return response()->json([
                'ip_status'=>'success',
                'totalamount'=>$totalamount,
    
            ]);

        }
       

      }
}
