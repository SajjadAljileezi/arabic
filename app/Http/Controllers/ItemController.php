<?php

namespace App\Http\Controllers;

use App\Models\BosexCarts;
use App\Models\Item;
use App\Models\Boxes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=Auth::user()->id;
        $getItems = Item::where('userid',$userid)->get();
        return view("home", [ "getItems" => $getItems ]);
    }
    public function box(Request  $request)
    {
        $dataBox['userid'] = Auth::user()->id;
    $size = $request->size;
    $addBoxs= Boxes::where('type',$size)->get();
    foreach ($addBoxs as $addBox ){
    $dataBox['type']=$addBox->type ;
    $dataBox['weight']=$addBox->weight;
    $dataBox['height']=$addBox->height;
    $dataBox['length']=$addBox->length;
    $dataBox['width']=$addBox->width;
    }
        BosexCarts::create($dataBox);
        $response = array(

            'status' => 'success',
            'msg'    => 'customer created successfully',
        );

        return json_encode($response);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data= $request->validate([
            'company'=>'required',
            'tracking'=>'required',
            'length'=>'required',
            'height'=>'required|integer',
            'weight'=>'required|integer',
            'width'=>'required|integer',
        ]);
        $data['userid'] = Auth::user()->id;
        $data['arrived'] = 0;
        Item::create($data);
        $response = array(

            'status' => 'success',
            'msg'    => 'customer created successfully',
        );

        return json_encode($response);

      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $person = Item::findOrFail($id);
         $person->update($request->all());
        return back();
//         return view('person.edit', compact('person'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $delete = Item::findOrFail($id);
        $delete->delete();
        return back();
    }
}
