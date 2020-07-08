<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
       // $size = $product->attributes->all();
        
      return view('Frontend.product',compact('product','images'));
    }
}
