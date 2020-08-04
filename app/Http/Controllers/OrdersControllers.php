<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\ProductAttributes;
use App\order;
use app\Helpers;
use App\OrderProduct;
use App\product;
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
         if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }
        

        try{
            $charge = Stripe::charges()->create([
                'amount' => getprice()->get('newTotal'),
                'currency' => 'INR',
                'source' => $Request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $Request->users_email,
                'metadata' => [
                    // 'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                  
                ],
            ]);
         $order = $this->addToOrdersTables($Request, null);
          $this->decreaseQuantities();
            Cart::instance('default')->destroy();
            session()->forget('coupon');
           $user = Auth()->user()->email;
        Cart::store($user);


        return redirect()->route('cod')->with('success_message', 'Thank you! Your payment has been successfully accepted!');

         
        }
        catch (CardErrorException $e){
        $order = $this->addToOrdersTables($Request,$e->getMessage());
        return back()->withErrors('Error! ' . $e->getMessage());
      
          
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

    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
         $order = order::create([
         'users_id' => $request->users_id,
         'users_email' => request('users_email'),
         'name' => request('name'),
         'address' => request('address'),
          'city' => request('city'),
         'state' => request('state'),
         'pincode' => request('pincode'),
          'mobile' => request('mobile'),
         'shipping_charges' => request('shipping_charges'),
         'coupon_code' => request('coupon_code'),
         // 'payment_method' => request('payment_method'),
         'coupon_amount' => session()->get('Coupon')['discount'] ?? 0,
          'product_name' => productdetails()->get('product_name'),
         'product_image' => productdetails()->get('product_image'),
         'grand_total' => getprice()->get('newTotal'),
          'product_id' => request('product_id'),
          'product_qty' => productdetails()->get('product_qty'),
          'error' => $error,
          ]);

       
         foreach(Cart::content() as $item)

         {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
            ]);
         }
    

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) 
        {  
              $pro_qty = ProductAttributes::where('products_id',$item->id)->get();
              // dd($pro_qty);
               // foreach($pro_qty as $stock)
               // {
               //   print_r($stock->stock);
               // }
              $qty = DB::table('product_att')->where('products_id',$item->id)
                                           ->where('size',$item->options->size)
                                           ->select('stock')
                                           ->get();
              // dd($qty);
              $new_quantity = $qty[0]->stock - $item->qty ;

                DB::table('product_att')->where('products_id',$item->id)
                                        ->where('size',$item->options->size)
                                        ->update(['stock' => $new_quantity ]);
        }
        
               
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) 
        {
            $qty = DB::table('product_att')->where('products_id',$item->id)
                                           ->where('size',$item->options->size)
                                           ->select('stock')
                                           ->get();
            if ($qty[0]->stock < $item->qty) 
            {
            return true;
            }
        }
        return false;
    }
}
