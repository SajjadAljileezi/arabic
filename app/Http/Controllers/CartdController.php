<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartd;
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

        return view('cart',compact('carts','items'  ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Cartd  $cartd
     * @return \Illuminate\Http\Response
     */
    public function show(Cartd $cartd)
    {
        //
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
