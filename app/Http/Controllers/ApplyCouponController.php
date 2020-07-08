<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Http\Controllers\Controller;
use Cart;



class ApplyCouponController extends Controller
{
    public function store(Request $request)
    {   
    	// $req = $request->Coupon;
        $coupon = Coupon::where('coupon_code',$request->Coupon)->first();

        if(!$coupon)
        {
        return redirect(url('/cart'))->withErrors('invalid coupon code.please try again');
        }

       
        session()->put('Coupon',[
        	'name' => $coupon->coupon_code,
            'discount' => $coupon->discount(Cart::subtotal()),
         ]);
        return redirect(url('/cart'))->with('success_message','coupon code applied');
    
    }

    public function destroy()
    {
    	session()->forget('Coupon');

    	return redirect(url('/cart'));
    }

    public function Finaldiscount()
    {
        $tax = config('cart.tax')/100;
        $discount = session()->get('Coupon')['discount'] ?? 0;
        $sub= Cart::subtotal();
        $newsubtotal = ($sub-$discount);
        $newTax = $newsubtotal * $tax;
        $newtotal = $newsubtotal + $newTax;

        // $id = Auth::user()->id;
        // $address = DB::table('delivery_address')->where('users_id',$id)->first();
        // dd($address);
        return view('Frontend.cart',compact('newsubtotal','newTax','newtotal'));
   
    }
}