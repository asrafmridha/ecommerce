<?php
    
namespace App\Http\Controllers;
     
use Illuminate\Http\Request;
// use Session;
use Stripe;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
     
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        
        Stripe\Stripe::setApiKey("sk_test_51M1wePJ6DiRBqXyyJlXF5SR8yGpc0mdy5t3cTHWoeKHd8A7Fg4oyvEaG3atmeUEFyUCXR1E1LlC9cUhyTion9NRq00jvuldXwh");
    
        Stripe\Charge::create ([
                "amount" => Session::get('customer_info')['amount'] * 100, 
            //  "amount" => Session::get('amount') * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." ,
                // "customer"=>Auth::user()->email,
        ]);
      
        Session::flash('success', 'Payment successful!');  
        return back();
    }
}