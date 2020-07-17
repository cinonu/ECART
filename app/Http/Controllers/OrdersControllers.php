<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

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
         $order->payment_method = request('payment_method');
         $order->coupon_amount = session()->get('Coupon')['discount'] ?? 0;
         $order->product_name = productdetails()->get('product_name');
         $order->product_image = productdetails()->get('product_image');
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
       // Orderstore($Request,$error);
        
        if(request('payment_method')=="COD")
        {
            return redirect('/cod');
        }
        else
        {
            return redirect('/paypal/'.$order->id);
        }
        
     }


     public function payment($id)
    {
        $data = [];
        $data['items'] = [
            [
                'name' =>  productdetails()->get('product_name'),
                'price' => getprice()->get('newTotal'),
                'qty' => productdetails()->get('product_qty'),
         
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = getprice()->get('newTotal');
  
        $provider = new ExpressCheckout;
       
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    }
     
    public function cancel(Request $request)
    { 
      return view('payment.fail');

    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']))
        {
            $message = "payment success";
            
            dd('Your payment was successfull. You can create success page here.');
        }
        $message = "payment_failed";
        dd('Something is wrong.');
    }
   
  


    public function cod()
    {
        $user_order=order::where('users_id',Auth::id())->first();
         return view('payment.cod',compact('user_order'));
    }
    public function paypal(Request $request)
    {
        $who_buying=order::where('users_id',Auth::id())->first();
        return view('payment.paypal',compact('who_buying'));
    }
}
