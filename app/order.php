<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
      // protected $table = 'orders';

      protected $fillable = ['users_id','users_email','name','address','city','state','pincode','mobile',
           'shipping_charges','coupon_code','coupon_amount','order_status','payment_method','grand_total','error','product_name','product_image','product_qty','product_id'];
        
    protected $casts = [
    'product_name' => 'array',
    'product_id' => 'array',
    'product_image' =>'array',
    'product_qty' => 'array'
];

      
       public function products()
       {
        return $this->belongsToMany('App\product')->withPivot('quantity');
       }
      

}
  