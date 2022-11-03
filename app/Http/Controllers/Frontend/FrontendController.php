<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('frontend.home',compact('product'));
    }

    public function checkout(){
        return view('frontend.pages.check_out');
    }
}
