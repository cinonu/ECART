<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'couponinsert_procedure';
  
  public static function findbycode($code)
  {
  	return self::where('coupon_code',$code)->first();
  }
    
  public function discount($total)
  {
    
  	if($this->amount_type == 'fixed')
  	{

  		return $this->amount;
  	}
    elseif($this->amount_type == 'percentage')
    {
      // dd($this->amount);
      return($this->amount / 100) * $total;
    }
    else
    {
    	return 0;
    }
 }
}
