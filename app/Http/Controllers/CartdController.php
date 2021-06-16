<?php

namespace App\Http\Controllers;
use App\Models\Boxes;
use App\Models\Profile;
use Shippo;
use App\Models\Cart;
use App\Models\Cartd;
use App\Models\Item;
use App\Models\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;

        $carts= Cart::where('userid', '=', $id)->whereNotNull('size')->selectRaw('size as size    ,SUM(weight) as weight,SUM(height) as height,SUM(length) as length,SUM(width) as width', )
            ->groupBy('size' )->get();
        $items= Cart::where('userid', '=', $id)->where('size', '=', null)->get();
        $profiles=Profile::where('userid',  $id)->get();

        return view('cart',compact('carts','items','profiles' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function deletecart(Request $request)
    {
        $size= $request->size;
        $id= Auth::user()->id;
        $cartItems= Cart::where('userid', '=', $id)->where('size', '=', $size)->get();
        foreach($cartItems as $cartItem) {
            $weight  = $cartItem->weight;
            $height  = $cartItem->height;
            $length  = $cartItem->length;
            $width  = $cartItem->width;
            $sizes  = $cartItem->size;
            $userid  = $cartItem->userid;
            $tracking  = $cartItem->tracking;
            $company  = $cartItem->company;

            $addAll = array('userid' => $userid,'size' => $sizes,'weight' => $weight,'height' => $height
            ,'width' => $width,'length' => $length,'company' => $company,'tracking' => $tracking);

            Measure::create($addAll);
        }
        $delete=  Cart::where('size', $size)->where('userid', $id)->delete();

        $response = array(

            'status' => 'success',
            'msg' => 'added to cart successfully',
        );

        return json_encode($response);

    }


    public function deleteItemCart(Request $request)
    {
        $tracking= $request->tracking;
        $id= Auth::user()->id;
        $cartItems= Cart::where('userid', '=', $id)->where('tracking', '=', $tracking)->get();
        foreach($cartItems as $cartItem) {
            $weight  = $cartItem->weight;
            $height  = $cartItem->height;
            $length  = $cartItem->length;
            $width  = $cartItem->width;
            $arrived  = 1;
            $userid  = $cartItem->userid;
            $trackings  = $cartItem->tracking;
            $company  = $cartItem->company;

            $addAll = array('userid' => $userid,'arrived' => $arrived,'weight' => $weight,'height' => $height
            ,'width' => $width,'length' => $length,'company' => $company,'tracking' => $trackings);

            Item::create($addAll);
        }
        $delete=  Cart::where('tracking', $tracking)->where('userid', $id)->delete();

        $response = array(

            'status' => 'success',
            'msg' => 'added to cart successfully',
        );

        return json_encode($response);

    }


    public function doShipping(Request $request)
    {

        $id= Auth::user()->id;
        $profile =Profile::where('userid',$id)->get();

        if ( $profile->isEmpty()){
            $profileUser['name']=$request->name ;
            $profileUser['email']=$request->email;
            $profileUser['phone']=$request->phone;
            $profileUser['address']=$request->address;
            $profileUser['country']=$request->country;
            $profileUser['city']=$request->city;
            $profileUser['userid']=$id;
            Profile::create($profileUser);
        }


        Shippo::setApiKey("shippo_live_6b99157b14c1d754acde698663d67c746ab797ab");

        $fromAddress = array(
            'name' => 'Shawn Ippotle',
            'street1' => '12428 NE Haley st.',
            'city' => 'Portland',
            'state' => 'OR',
            'zip' => '97230',
            'country' => 'US',
            'phone' => '+1 555 341 9393',
            'email' => 'shippotle@goshippo.com'
        );

        $toAddress = array(
            'name' => $request->name,
            'street1' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email
        );

        $carts= Cart::where('userid', '=', $id)->whereNotNull('size')->selectRaw('size as size    ,SUM(weight) as weight,SUM(height) as height,SUM(length) as length,SUM(width) as width', )
            ->groupBy('size' )->get();

        $items= Cart::where('userid', '=', $id)->where('size', '=', null)->get();


        $itemIn = array();
        foreach($items as $k=> $item) {

            $itemIn[$k]['weight']= $item->weight;
            $itemIn[$k]['height']= $item->height;
            $itemIn[$k]['length']= $item->length;
            $itemIn[$k]['width']= $item->width;
            $itemIn[$k]['size']= $item->size;
            $itemIn[$k]['distance_unit']= 'in';
            $itemIn[$k]['mass_unit']= 'lb';

        }

        $boxSize =array();
        foreach($carts as $k=> $cart) {

            $boxSize[$k]= $cart->size ;
        }

           $originalBoxSizeFrom = preg_replace("/[^a-zA-Z]/", '', $boxSize );


            $getBoxOriginalsizes = Boxes::whereIn('size',   $originalBoxSizeFrom )->get();
                dd(count($getBoxOriginalsizes));
       $box=array();
        foreach($getBoxOriginalsizes as $k=> $boxy) {

            $box[$k]['weight']= $boxy->weight;
            $box[$k]['height']= $boxy->height;
            $box[$k]['length']= $boxy->length;
            $box[$k]['width']= $boxy->width;
            $box[$k]['size']= $boxy->size;
            $box[$k]['distance_unit']= 'in';
            $box[$k]['mass_unit']= 'lb';

        }
dd($box);

        $result = array_merge($box, $itemIn);


            $shipment = \Shippo_Shipment::create(
                array(
                    "address_from" => $fromAddress,
                    "address_to" => $toAddress,
                    "parcels" => $result,
                    "async" => false
                )
            );


      echo $shipment;

          }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cartd  $cartd
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {


            // Enter Your Stripe Secret
            \Stripe\Stripe::setApiKey('sk_test_rcfuqteZTJmU3bTME2BLsoqX00H1X85ME5');

            $amount = 100;
            $amount *= 100;
            $amount = (int) $amount;

            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $amount,
                'currency' => 'INR',
                'description' => 'Payment From Codehunger',
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;

            return view('checkout ', compact('intent'));

        }

        public function cart(Request $request)
        {


        }

        public function savesession()
        {
            echo 'Payment Has been Received';
        }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cartd  $cartd
     * @return \Illuminate\Http\Response
     */
    public function edit(Cartd $cartd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cartd  $cartd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cartd $cartd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cartd  $cartd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cartd $cartd)
    {
        //
    }
}
