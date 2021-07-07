<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Cartd;
use App\Models\Profile;
use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal as Paypal;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class CheckoutController extends Controller
{

   public function CheckOut ()
   {

       $id= Auth::user()->id;
       $email=Auth::user()->email;
       $carts=Cartd::where('userid', $id)->get();

        $amount=  array_map(function($price){
            return
            $price['amount'];
        },$carts->toarray());

       // Enter Your Stripe Secret
       \Stripe\Stripe::setApiKey('sk_test_rcfuqteZTJmU3bTME2BLsoqX00H1X85ME5');

$sum= array_sum($amount);

       $payment_intent = \Stripe\PaymentIntent::create([
           'description' => 'Stripe Test Payment',
           'amount' => 50,
           'currency' => 'USD',
           'description' => $email,
           'payment_method_types' => ['card'],
       ]);
       $intent = $payment_intent->client_secret;

       $profiles=Profile::where('userid',  $id)->get();
       return view('beforecheckout ', compact('carts','intent','sum','profiles'));
   }

    public function getCart(){
        $id= Auth::user()->id;
        $carts=Cartd::where('userid', $id)->get();
        return $carts;
    }




}
