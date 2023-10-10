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
                $maxredemption = syncRedemption::max('ID');
                $nextredemptionId = $maxredemption + 1;
                LOG::info($maxredemption);
                LOG::info($nextredemptionId);
             $dataRedemption =    syncRedemption::insert([
                'BRANCHID' => $data->BRANCHID,
                'ID'=> $nextredemptionId,
                'DATE'=> $data->DATE,
                'CUSTOMERID'=> $data->CUSTOMERID,
                'CARDID'=> $data->CARDID,
                'REWARDID'=>$data->REWARDID,
                'QUANTITY'=> $data->QUANTITY,
                'UNITPTS'=> $data->UNITPTS,
                'POINTS'=> $data->POINTS,
                'CATEGORYCODE'=> $data->CATEGORYCODE,
                'STATUS'=> $data->STATUS

            ]);
            if (!$dataRedemption) {
                // If insertion failed for a record, add an error status to the results array
                $results[] = [
                    'StatusCode'=>500,
                    'BRANCHID' => $data->BRANCHID,
                    'ID' => $nextredemptionId,
                    'Message' => 'Failed',
                ];
            } else {
                // If insertion was successful for a record, add a success status to the results array
                $results[] = [
                    'StatusCode'=>200,
                    'BRANCHID' => $nextredemptionId,
                    // 'ID' => $data->ID,
                    'Message' => 'Success',
                ];
            }
        }

        return response()->json([$results]);
    }

        catch(\Exception $e){
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json([
                "StatusCode"=>500,
                "StatusDescription"=>"Failed",
                "DATA"=>[$jsondatab],
                "Message"=>$e->getMessage()
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
