<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddCart;
use App\Models\Cupon;
use App\Models\CustomerInformation;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;

class FrontendController extends Controller
{
    public function index(){
        $product=Product::all();
        $product_count=Product::count('product_name');
        return view('frontend.home',compact('product'));
    }

    public function checkout($id){
        // dd('hlw');

         $checkout=AddCart::where('user_id',$id)->get();
         $totalprice=Addcart::sum('price');
        return view('frontend.pages.check_out',compact('checkout','totalprice'));
    }
    public function details($slug){
 
        $product=Product::where('slug',$slug)->first();
        return view('frontend.pages.details',compact('product'));
    }

    public function remove_item($id){
        $remove=AddCart::find($id)->delete();
        return back();
    }

    public function cupon_apply($cuponvalue){
        // dd($request->all());

        
        $data=AddCart::where('user_id',Auth::user()->id)->first()->sum('price');
        
        // dd($data);
        $cupon_check=Cupon::where('cupon_code',$cuponvalue)->first();

           if($cupon_check){
            $totalamount=$data;
            $cuponamount=$cupon_check->discount_amount;
            $charge=$cupon_check->charge;
            return response()->json([

                'data'=>$totalamount,
                'cuponamount'=>$cuponamount,
                'charge' =>$charge,
            ]);
           }
           else{

            return response()->json([
                 'error'=>'invalid Token',
            ]);    
        }    
    }

    public function customer_store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'house_no'=>'required',
            'town'=>'required',
            'state'=>'required',
            'address_type'=>'required',
        ]);
        CustomerInformation::create($request->except('_token'));
        return redirect()->route('user.payment')->withSuccess('Thank You, Please Payment Now'); 
    }

    public function user_address(){
        return view('frontend.pages.address');
    }
    public function user_payment(){
        return view('frontend.pages.payment');
        
    }
    

  
  
}
