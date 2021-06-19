<?php

namespace App\Http\Controllers;

use App\Models\Cartd;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class CheckoutController extends Controller
{
   public function CheckOut ()
   {

       $id= Auth::user()->id;
       $email=Auth::user()->email;
       $carts=Cartd::where('userid', $id)->get();
       foreach ($carts as $cart)
        $amount= $cart->amount;
       // Enter Your Stripe Secret
       \Stripe\Stripe::setApiKey('sk_test_rcfuqteZTJmU3bTME2BLsoqX00H1X85ME5');


       $payment_intent = \Stripe\PaymentIntent::create([
           'description' => 'Stripe Test Payment',
           'amount' => $amount,
           'currency' => 'USD',
           'description' => $email,
           'payment_method_types' => ['card'],
       ]);
       $intent = $payment_intent->client_secret;

       $profiles=Profile::where('userid',  $id)->get();
       return view('beforecheckout ', compact('carts','intent','amount','profiles'));
   }


   public function paypal ( )
   {
// Creating an environment
       $clientId = "AQOvU2MphKYxd_lZgHgnBCSXn9UT9KmvXUZoaxg5r__DOZI7kySf9u-uTm2bwePO3yE7cisl8J4iC0Oz";
       $clientSecret = "EBV_8IXtvEs2EqskT-U0ibNBBpWX2Sh4sgMhZOw6whxlGBaHOvh-cq1pLZVG9y3TFgmaBdRO71n3D3KW";

       $environment = new SandboxEnvironment($clientId, $clientSecret);
       $client = new PayPalHttpClient($environment);
   }
}
