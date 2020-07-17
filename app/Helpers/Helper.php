<?php

use App\configuration;
use App\order;
use App\OrderProduct;
use App\EmailTemplates;

// if (!function_exists('getconfig')) 
// {
//     *
//      * Returns a human readable file size
//      *
//      * @param integer $bytes
//      * Bytes contains the size of the bytes to convert
//      *
//      * @param integer $decimals
//      * Number of decimal places to be returned
//      *
//      * @return string a string in human readable format
//      *
//      * 
//     function getconfig($identifier)
//     {  
//       return configuration::where('identifier',$identifier)->first()->toArray()['value'];

      
//     }
// }

// if (!function_exists('get_config_list')) 
// {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function get_config_list()
    {  
  

     return configuration::all();
      
           
    }
    
    function presentPrice($price)
    {
    return money_format('$%i', $price / 100);
    }
    
    function getprice()
    {
        $tax = config('cart.tax')/100;
        $discount = session()->get('Coupon')['discount'] ?? 0;
        $sub= Cart::subtotal();
        if($sub > 0)
        {
        $newSubtotal = ($sub-$discount);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;
        }
        else
        {
        $newSubtotal = 0;
        $newTax = 0;
        $newTotal = 0;
       
        }
        return collect([
        'tax' => $tax,
        'discount' => $discount,
        // 'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
      ]);
    }

    function productdetails()
    {
        foreach(Cart::content() as $item)
        {
            
            $product_name[] = $item->name;
            $product_qty[] = $item->qty;
            $product_image[] = $item->options->img;


        }

            return collect([
                'product_name' => $product_name,
                'product_qty' => $product_qty,
                'product_image' => $product_image,
            ]);
    }
    
    function Orderstore($request,$error)
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
         $order->errror = $error ;
       
         foreach(Cart::content() as $item)

         {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
            ]);
         }
         $order->save();
        
          // dd($order->payment_method);
        if(request('payment_method')=="COD")
        {
            return redirect('/cod');
        }else
        {
            return redirect('/paypal');
        }


       
         
    }
    function emailTemplate($slug)
    {
        return $email = EmailTemplates::where('slug',$slug)->first();
    }

    // function PaymentStatus()
    // {
    //     $message = "User canceled The Payment";
    //      $order = order::findOrFail(Auth::user()->id);
    //      dd($order);
    // }



?>