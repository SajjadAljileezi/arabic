<?php

namespace App\Http\Controllers;

use App\Models\BosexCarts;
use App\Models\Boxes;
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
        $userid=Auth::user()->id;
        $getItems = Item::where('userid',$userid)->where('arrived', '=', 1)->get();
        $boxes= Boxes::all();

        return view("shipping", [ "getItems" => $getItems ],[ "boxes" => $boxes ]);

    }
    public function ready()
    {
        $id=Auth::user()->id;
        $getReadys = Measure::where('userid',$id)->get();
        return view("readytoship", [ "getReadys" => $getReadys ]);
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
            'length'=> $request->length,
            'width'=> $request->width,
            'height'=> $request->height,
            'distance_unit'=> 'in',
            'weight'=> $request->weight,
            'mass_unit'=> 'lb',
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
            echo $rates ;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $userid= Auth::user()->name;

//        return view('dashboard', $userid);
        return \View::make('dashboard')->with('userid', $userid);
//        return view('dashboard',compact('userid', ));
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
    public function show(Shipping $shipping)
    {
        //
    }

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
