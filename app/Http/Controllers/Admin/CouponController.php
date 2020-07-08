<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $coupon =DB::select('CALL GetCoupons()');

     return view('admin.coupons.index',compact('coupon'));

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin.coupons.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $coupon_code = $request->coupon_code;
       $amount = $request->amount;
       $amount_type = $request->amount_type;
       $status = $request->status;

        DB::insert("CALL InsertCoupon('$coupon_code', '$amount','$amount_type','$status')");

        return redirect()->route('coupons.index')
       
                        ->with('success','coupon created successfully.');
 
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $coupon =DB::select("CALL GetCoupon('$id')");
        // dd($coupon);

        return view('admin.coupons.edit',compact('coupon'));
   
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

        $id = $request->id;
        $coupon_code = $request->coupon_code;
        $amount = $request->amount;
        $amount_type = $request->amount_type;
        $status = $request->status;
   
     DB::select("CALL UpdateCoupons('$id','$coupon_code','$amount','amount_type','$status')");   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::select("CALL DeleteCoupons('$id')");

         return redirect()->route('coupons.index');

    }
}
