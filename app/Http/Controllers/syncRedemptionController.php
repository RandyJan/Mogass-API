<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\syncRedemption;
use Illuminate\Support\Facades\Log;

class syncRedemptionController extends Controller
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

        try{

        $jsondata = json_encode($request->LOYALTYREDEMPTIONS);
        $jsondatab = json_decode($jsondata);
            foreach($jsondatab as $data){

                syncRedemption::insert([
                'BRANCHID' => $data->BRANCHID,
                'ID'=> $data->ID,
                'DATE'=> $data->DATE,
                'CUSTOMERID'=> $data->CUSTOMERID,
                'CARDID'=> $data->CARDID,
                'QUANTITY'=> $data->QUANTITY,
                'UNITPTS'=> $data->UNITPTS,
                'POINTS'=> $data->POINTS,
                'UINS'=> $data->UINS,
                'DINS'=> $data->DINS,
                'TINS'=> $data->TINS,
                'CATEGORYCODE'=> $data->CATEGORYCODE,
                'STATUS'=> $data->STATUS

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
