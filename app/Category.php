<?php

namespace App;
use App\product;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
     use Searchable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected static function boot()
    {
      static::bootTraits();
    }

    protected $table = 'categories';

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
    protected $fillable = ['category_name', 'parent_id'];


    public function products()
    {
        return $this->belongsToMany(product::class, 'product_catagories', 'category_id', 'product_id');
    }
    
}
