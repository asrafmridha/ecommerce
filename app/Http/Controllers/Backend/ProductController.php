<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::paginate(10);
        return view('backend.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'image'=>'required|image|mimes:jpeg,png,jpg|dimensions:width=350,height=250',
            // 'product_title'=>'required',
            'product_name'=>'required',
            'short_description'=>'required',
            'product_price'=>'required',
            'status'=>'required|numeric',
            'star'=>'required',
        ]);
        
        
        $image = request()->file('image');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/product');
        $image->move($location, $image_name);

        $product=new Product();
        // $product->product_title=$request->product_title;
        $product->product_name=$request->product_name;
        $product->short_description=$request->short_description;
        $product->product_price=$request->product_price;
        $product->status=$request->status;
        $product->star=$request->star;
        $product->image = $image_name;

        $product->save();
        return redirect()->route('product.index')->withSuccess("Prdouct Added Successfully");
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->withSuccess('Product Delete Successfully');
    }
    
    public function dateFilter(){
        
        dd('asraf');
        // $product=Product::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        // return view('backend.product.index',compact('product'));
    }
}
