<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'Product_name', 'Price', 'Product_color', 'Product_Description', 'Product_code'];

   
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_catagories', 'product_id', 'category_id');
    }
     
   public function images()

    {
      return $this->hasMany(Productimage::class);
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttributes::class,'products_id','id');
    }
    
    
}
