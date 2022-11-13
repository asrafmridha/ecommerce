<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddCart;
use App\Models\Cupon;
use App\Models\CustomerInformation;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use session;
use Illuminate\Support\Facades\Session;

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

    // public function remove_item($id){
    //     $remove=AddCart::find($id)->delete();
    //     return response()->json([
    //         'success'=>"Remove From Cart Successfully",
    //     ]);
    // }

    public function cupon_apply($cuponvalue){

        $data=AddCart::where('user_id',Auth::user()->id)->first()->sum('price');
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

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'house_no'=>'required',
            'town'=>'required',
            'state'=>'required',
            'address_type'=>'required',
            'amount'=>'required',
        ]);

        Session::put('customer_info',['name'=> $request->name,'phone'=>$request->phone,'house_no'=> $request->house_no,'town'=> $request->town,'state'=> $request->state,'address_type'=> $request->address_type,'amount'=>$request->amount]);

        // CustomerInformation::create($request->except('_token'));
        $customer=new CustomerInformation();
        $customer->user_id=Auth::user()->id;
        $customer->email=Auth::user()->email;
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->house_no=$request->house_no;
        $customer->town=$request->town;
        $customer->state=$request->state;
        $customer->address_type=$request->address_type;
        $customer->amount=$request->amount;
        $customer->save();

        
        
        // Session::save();

        return redirect()->route('user.payment')->withSuccess('Thank You, Please Payment Now');

        // 
        // return redirect()->route('user.payment')->withSuccess('Thank You, Please Payment Now'); 
    }

    public function user_address(){
         
        
        return view('frontend.pages.address');
    }
    public function user_payment(){
        
        return view('frontend.pages.payment');
        
    }

    // public function check(){
    //     $allSessions = session()->();
    //     dd($allSessions);
    // }
    

  
  
}
