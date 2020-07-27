<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\product;
use App\Productimage;
use App\Category;
use App\ProductAttributes;

class ProductDisplayController extends Controller
{
    public function show($id)
    {
      $product = product::where('id',$id)->first();
      $images = $product->images->all();
     
      $code=$product->Product_code;
      
      $Same_product = DB::table('products')->where('Product_code',$code)->get();

      $pro = DB::table('products')->where('Product_code',$code)
                                  ->join('product_images','product_images.product_id','products.id')
                                  ->select('image','product_id','Product_color')
                                  ->groupby('product_id')
                                  ->get();


                                  // 
       
      return view('Frontend.product',compact('product','images','Same_product','pro'));
    }
}
