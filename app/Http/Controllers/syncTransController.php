<?php

namespace App\Http\Controllers;

use App\Models\syncTrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class syncTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $jsondata = json_encode($request->LOYALTYTRANS);
        $jsondatab = json_decode($jsondata);

        try{
            foreach($jsondatab as $data){

                syncTrans::insert([
                'BRANCHID' => $data->BRANCHID,
                'ID'=> $data->ID,
                'TRANSID'=> $data->TRANSID,
                'PRODUCTID'=> $data->PRODUCTID,
                'LITERS'=> $data->LITERS,
                'AMOUNT'=> $data->AMOUNT,
                'UNITPOINT'=> $data->UNITPOINT,
                'TOTALPOINTS'=> $data->TOTALPOINTS,
                'UPLOADED'=> $data->UPLOADED,
                 ]);

        }
        return response()->json([
            "StatusCode"=>200,
            "StatusDescription" => "Success",
            "Data"=>[$jsondatab],
            "Message"=>"Insert Successful"
        ],200);
    }
        catch(\Exception $e){
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json([
                "StatusCode"=>500,
                "StatusDescription"=>"Failed",
                "DATA"=>[$jsondatab],
                "Message"=>"Something went wrong"
            ],500);

        }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
