<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\order;
use app\Helpers;
use App\OrderProduct;
use Cart;



class OrdersControllers extends Controller
{
    public function index()
    {
    	$tax = config('cart.tax')/100;
    	$discount = session()->get('Coupon')['discount'] ?? 0;
    	$sub= Cart::subtotal();
    	$newsubtotal = ($sub-$discount);
    	$newTax = $newsubtotal * $tax;
    	$newtotal = $newsubtotal + $newTax;

    	$id = Auth::user()->id;
        $address = DB::table('delivery_address')->where('users_id',$id)->first();
        // dd($address);
    	return view('Frontend.revieworders',compact('address','newsubtotal','newTax','newtotal'));
    }
    public function Store(Request $Request)
    {
          // dd(productdetails());
        // getprice();
        $order = new order();
         $order->users_id = request('users_id');
         $order->users_email = request('users_email');
         $order->name = request('name');
         $order->address = request('address');
         $order->city = request('city');
         $order->state = request('state');
         $order->pincode = request('pincode');
         $order->mobile = request('mobile');
         $order->shipping_charges = request('shipping_charges');
         $order->coupon_code = request('coupon_code');
         $order->coupon_amount = session()->get('Coupon')['discount'] ?? 0;
         $order->product_name = productdetails()->get('product_name');
         $order->product_image = productdetails()->get('product_image');
         $order->payment_method = request('payment_method');
         $order->grand_total = getprice()->get('newTotal');
         $order->product_id = request('product_id');
         $order->product_qty = productdetails()->get('product_qty'); 
         $order->save();

         foreach(Cart::content() as $item)
         {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
            ]);
         }
        

    }
}
