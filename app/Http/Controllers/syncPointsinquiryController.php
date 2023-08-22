<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class syncPointsinquiryController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $points = DB::select('SELECT ViewCustomerLoyaltyPoints.FullName,ViewCustomerLoyaltyPoints.Earnings,ViewCustomerLoyaltyPoints.Adjustments,ViewCustomerLoyaltyPoints.Redemptions,dbo.Cards.DVALIDFROM,dbo.Cards.DVALIDUNTIL,
       dbo.Cards.STATUS, ViewCustomerLoyaltyPoints.CustomerID,dbo.Customers.STATUS,dbo.Cards.ID FROM ViewCustomerLoyaltyPoints INNER JOIN  dbo.Customers ON dbo.Customers.ID = ViewCustomerLoyaltyPoints.CustomerID
       INNER JOIN dbo.Cards ON dbo.Cards.ID = ViewCustomerLoyaltyPoints.CardID WHERE ViewCustomerLoyaltyPoints.CardNo =?',[$id]) ;

        return response()->json([

            "Retval"=>$points

        ]);
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
