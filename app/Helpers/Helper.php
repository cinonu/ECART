<?php

use App\configuration;

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




?>