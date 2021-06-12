<?php

namespace App\Http\Controllers;

use App\Models\BosexCarts;
use App\Models\Boxes;
use App\Models\Cart;
use App\Models\Measure;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Shippo;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $getItems = Item::where('userid', $userid)->where('arrived', '=', 1)->get();
        $boxes = Boxes::all();
        $items = Measure::where('userid', '=',
            $userid)->selectRaw('size as size ,SUM(weight) as weight,SUM(height) as height,SUM(length) as length,SUM(width) as width',)
            ->groupBy('size')->get();;

        return view('shipping', compact('items', 'boxes', 'getItems'));
//        return view("shipping", [ "getItems" => $getItems ],[ "boxes" => $boxes ]);

    }

    public function ready()
    {
        $id = Auth::user()->id;
        $getReadys = Measure::where('userid', $id)->get();
        foreach ($getReadys as $getReady) {
            $allSize = $getReady->size;
        }

        $originalBoxSizeMeasure = preg_replace("/[^a-zA-Z]/", '', $allSize);
        dd($originalBoxSizeMeasure);
        return view("readytoship", ["originalBoxSizeMeasure" => $originalBoxSizeMeasure]);
    }

    public function calculateShipping(Request $request)
    {

        $request->validate([
            'country' => 'required|string',
            'city' => 'required|string',
            'length' => 'required|integer',
            'weight' => 'required|integer',
            'width' => 'required|integer',
            'height' => 'required|integer',
        ]);
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
            'name' => 'Mr Hippo"',
            'street1' => 'Broadway 1',
            'city' => $request->city,
            'state' => 'NY',
            'zip' => '10007',
            'country' => $request->country,
            'phone' => '+1 555 341 9393',
            'email' => 'mrhippo@goshippo.com'
        );

        $parcel_1 = array(
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'distance_unit' => 'in',
            'weight' => $request->weight,
            'mass_unit' => 'lb',
        );


        $shipment = \Shippo_Shipment::create(
            array(
                "address_from" => $fromAddress,
                "address_to" => $toAddress,
                "parcels" => array($parcel_1),
                "async" => false
            )
        );
        $rates = $shipment;
        echo $rates;


    }

    public function addToCart(Request $request)
    {
        $id = Auth::user()->id;
        $size = $request->size;
        $addToCarts = Measure::where('size', $size)->where('userid', $id)->get();


        foreach($addToCarts as $addToCart) {
            $weight  = $addToCart->weight;
            $height  = $addToCart->height;
            $length  = $addToCart->length;
            $width  = $addToCart->width;
            $sizes  = $addToCart->size;
            $userid  = $addToCart->userid;
            $tracking  = $addToCart->tracking;
            $company  = $addToCart->company;

            $addAll = array('userid' => $userid,'size' => $sizes,'weight' => $weight,'height' => $height
            ,'width' => $width,'length' => $length,'company' => $company,'tracking' => $tracking);

        Cart::create($addAll);
        }
        $delete=  Measure::where('size', $size)->where('userid', $id)->delete();

        $response = array(

            'status' => 'success',
            'msg' => 'added to cart successfully',
        );

        return json_encode($response);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemtocart(Request $request)
    {
        $id = Auth::user()->id;
        $tracking = $request->tracking;
        $itemToCarts = Item::where('tracking', $tracking)->where('userid', $id)->get();
        foreach($itemToCarts as $itemToCart) {
            $weight  = $itemToCart->weight;
            $height  = $itemToCart->height;
            $length  = $itemToCart->length;
            $width   = $itemToCart->width;
            $tracking = $itemToCart->tracking;
            $company  = $itemToCart->company;
        }

        $itemCard['height'] = $height;
        $itemCard['weight'] = $weight;
        $itemCard['length'] = $length;
        $itemCard['width'] = $width;
        $itemCard['company'] = $company;
        $itemCard['tracking'] = $tracking;
        $itemCard['userid'] = $id;

        Cart::create($itemCard);
        Item::where('tracking', $tracking)->firstorfail()->delete();
        $response = array(

            'status' => 'success',
            'msg' => 'added to cart successfully',
        );

        return json_encode($response);

    }


    public function create()
    {
        //
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
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
