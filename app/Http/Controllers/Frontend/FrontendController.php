<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddCart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('frontend.home',compact('product'));
    }

    public function checkout($id){
        // dd('hlw');

         $checkout=AddCart::where('user_id',$id)->get();
        return view('frontend.pages.check_out',compact('checkout'));
    }
    public function details($slug){
 
        $product=Product::where('slug',$slug)->first();
        return view('frontend.pages.details',compact('product'));
    }

    public function remove_item($id){
        $remove=AddCart::find($id)->delete();
        return back();



    }
    

  
  
}
