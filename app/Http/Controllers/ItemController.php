<?php

namespace App\Http\Controllers;

use App\Models\BosexCarts;
use App\Models\Item;
use App\Models\Boxes;
use App\Models\Measure;
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
    $addBoxs= Boxes::where('size',$size)->get();
    foreach ($addBoxs as $addBox ){
    $dataBox['size']=$addBox->size ;
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
    public function addtobox(Request $request)
    {
       $id= Auth::user()->id;
          $size= $request->size;
        $boxSizeFrom= $request->size;
        $weightFrom= $request->weight;
        $lengthFrom= $request->length;
        $widthFrom= $request->width;
        $heightFrom= $request->height;
        $companyFrom= $request->company;
        $trackingFrom= $request->tracking;

                         $items= Measure::where('userid', '=', $id)->where('size','=', $size)->get();
                         $weight = $items->sum('weight');
                         $length = $items->sum('length');
                         $width = $items->sum('width');
                         $height = $items->sum('height');

        $originalBoxSizeFrom = preg_replace(  "/[^a-zA-Z]/",  '', $size);
        $getBoxOriginalsizes= Boxes::where('size', '=', $originalBoxSizeFrom)->get();
        foreach($getBoxOriginalsizes as $getBoxOriginalsize ) {
            $originalBoxSizes = $getBoxOriginalsize->size;
            $originalBoxWeight = $getBoxOriginalsize->weight;
            $originalBoxLength = $getBoxOriginalsize->length;
            $originalBoxWidth = $getBoxOriginalsize->width;
            $originalBoxHeight = $getBoxOriginalsize->height;
        }
        $addSizeToDb= $boxSizeFrom;
        $addWeightToDb=  $weight +  $weightFrom; // = 30
        $addLengthToDb=  $length + $lengthFrom ;
        $addWidthToDb=  $width + $widthFrom;
        $addHeightToDb=  $height + $heightFrom;

        if ( $originalBoxWeight  >  $addWeightToDb &&
            $originalBoxLength >  $addLengthToDb    &&
            $originalBoxWidth >  $addWidthToDb  &&
            $originalBoxHeight  > $addHeightToDb  )
        {
            $data['weight'] = $weightFrom;
            $data['length'] = $lengthFrom;
            $data['width'] = $widthFrom;
            $data['height'] = $heightFrom;
            $data['userid'] = $id;
            $data['size'] = $size;
            $data['company'] = $companyFrom;
            $data['tracking'] = $trackingFrom;

                Measure::create($data);

             Item::where('tracking', $trackingFrom)->firstorfail()->delete();


            $response = array(

                'status' => 'success',
                'msg'    => 'customer created successfully',
            );

            return json_encode($response);

        }
        else{
           echo('تاكد من الحجم والوزن والارتفاع');
        }






        }





    public function return(Request $request)
    {
        $userId= Auth::user()->id;
        $id = $request->id;
        $getReturnItems = Measure::where('id', '=', $id)->get();
        foreach ($getReturnItems as $getReturnItem) {


            $ReturnId = $userId;
            $ReturnWeight = $getReturnItem->weight;
            $ReturnCompany = $getReturnItem->company;
            $ReturnTracking = $getReturnItem->tracking;
            $ReturnHeight = $getReturnItem->height;
            $ReturnLength = $getReturnItem->length;
            $ReturnWidth = $getReturnItem->width;
            $ReturnArrived = 1;
        }
        $ReturnData['weight'] = $ReturnWeight;
        $ReturnData['company'] = $ReturnCompany;
        $ReturnData['tracking'] = $ReturnTracking;
        $ReturnData['height'] = $ReturnHeight;
        $ReturnData['length'] = $ReturnLength;
        $ReturnData['width'] = $ReturnWidth;
        $ReturnData['arrived'] = $ReturnArrived;
        $ReturnData['userid'] = $userId;

        Item::create($ReturnData);
        Measure::where('id', $id)->firstorfail()->delete();
        $response = array(

            'status' => 'success',
            'msg'    => 'تمت العملية بنجاح',
        );

        return json_encode($response);

}


//Calculate boxes in Measure
    public function calculate()
    {
        echo ('hello');
        $id= Auth::user()->id;

        $items= Measure::where('userid', '=', $id)->select('size','weight', Measure::raw( 'size','weight'))
            ->groupBy('size','weight' )
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($items as $item){
            $sizes= $item->size;
            $lengths = $item->sum('length');
            $widths = $item->sum('width');
            $heights = $item->sum('height');
            $weights = $item->sum('weight');
        }

        $originalBoxSizeFrom = preg_replace(  "/[^a-zA-Z]/",  '', $sizes);
        $getBoxOriginalsizes= Boxes::where('size', '=', $originalBoxSizeFrom)->get();
        foreach($getBoxOriginalsizes as $getBoxOriginalsize ) {
            $originalBoxSizes = $getBoxOriginalsize->size;
            $originalBoxWeight = $getBoxOriginalsize->weight;
            $originalBoxLength = $getBoxOriginalsize->length;
            $originalBoxWidth = $getBoxOriginalsize->width;
            $originalBoxHeight = $getBoxOriginalsize->height;
        }

        $returnBoxWeight= $weights - $originalBoxWeight;
        $returnBoxLength= $lengths - $originalBoxLength;
        $returnBoxWidth= $widths - $originalBoxWidth;
        $returnBoxHeight= $heights - $originalBoxHeight;
        dd($returnBoxWeight, $sizes );

        }

    public function edit(Item $item)
    {


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
