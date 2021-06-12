<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $id= Auth::user()->id;
        $profiles=Profile::where('userid',  $id)->get();

        return view('profile',compact('profiles',  ));
    }

    public function profileedit(Request $request)
    {
        $id= Auth::user()->id;
        $deleteProfile=Profile::where('userid',$id)->delete();

        $insertNewProfile['name']=$request->name ;
        $insertNewProfile['email']=$request->email;
        $insertNewProfile['phone']=$request->phone;
        $insertNewProfile['address']=$request->address;
        $insertNewProfile['country']=$request->country;
        $insertNewProfile['city']=$request->city;
        $insertNewProfile['card_number']=$request->card_number;
        $insertNewProfile['name_card']=$request->name_card;
        $insertNewProfile['card_type']=$request->card_type;
        $insertNewProfile['card_zip']=$request->card_zip;
        $insertNewProfile['card_address']=$request->card_address;
        $insertNewProfile['card_city']=$request->card_city;
        $insertNewProfile['card_country']=$request->card_country;
        $insertNewProfile['userid']=$id;
        Profile::create($insertNewProfile);


    }
}
