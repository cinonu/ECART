<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
   
   protected $fillable = ['product_id','Image'];

   protected $table = 'product_images';

   public function product()
   {
     

    return $this->belongsTo(Product::class);
    
   }
 
}
