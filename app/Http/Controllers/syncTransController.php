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
            foreach( $jsondatab as $item){
                $results[] = [
                    'StatusCode'=>500,
                    'BRANCHID' => $item->BRANCHID,
                    'ID' => $item->ID,
                    'Message' => 'Failed',
                ];
            }
        try {

            foreach ($jsondatab as $data) {
                $dataEarnings = syncTrans::insert([
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


                if (!$dataEarnings) {
                    // If insertion failed for a record, add an error status to the results array
                    $results[] = [
                        'StatusCode'=>500,
                        'BRANCHID' => $data->BRANCHID,
                        'ID' => $data->ID,
                        'Message' => 'Failed',
                    ];
                } else {
                    // If insertion was successful for a record, add a success status to the results array
                    $results[] = [
                        'StatusCode'=>200,
                        'BRANCHID' => $data->BRANCHID,
                        'ID' => $data->ID,
                        'Message' => 'Success',
                    ];
                }

            }

            // Return the results array as the response
            return response()->json($results);
        }

        catch (\Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return response()->json([
                'StatusCode' => 500,
                'StatusDescription' => 'Failed',
                'DATA' => $jsondatab,
                'Message' => $e->getMessage(),
            ], 500);
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
