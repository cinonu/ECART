<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Category;

class CategoryWiseProductController extends Controller//This Class Is used to control Category wise product diplay as well as range slider product diplay//
{
	public function index()
	{
     $category = Category::all();
     return view('Frontend.Category_wise_product',compact('category'));
    }

    public function Productdisplay(Request $request)
    {
       $cat_id = $request->category_id;
       $products = DB::table('products')
            ->where('products.category_id',$cat_id)
            ->join('product_images','product_images.product_id','products.id')
            ->join('categories','categories.id','products.category_id')
            ->select('product_id','image','Product_name','Price')
            ->groupby('product_id')                     
            ->get();
        
        return view('Frontend.procat1',compact('products'));
    }

    public function show($id)
    {
        $category = Category::all();
        $products = DB::table('products')
            ->where('products.category_id',$id)
            ->join('product_images','product_images.product_id','products.id')
            ->join('categories','categories.id','products.category_id')
            ->select('product_id','image','Product_name','Price')
            ->groupby('product_id')  
            ->paginate(15);                   
            
        return view('Frontend.Category_wise_product',compact('products','category'));
    }

    public function Pricerange(Request $Request)
    {
      
        $price_range = $Request->p;
        $category_id = $Request->id;
        $proArr = explode(":",$price_range);
        $Request->session()->put('price',$proArr);
        
        $products = DB::table('products')
                ->where('products.category_id',$category_id)
                ->where('Price', '>=',$proArr[0])
                ->where('Price','<=',$proArr[1])
                ->join('product_images','product_images.product_id','products.id')
                ->join('categories','categories.id','products.category_id')
                ->select('product_id','image','Product_name','Price')
                ->groupby('product_id') 
                ->paginate(15);                   
           
            if ($Request->ajax()) 
            {
                return view('Frontend.procat2', compact('products'));
            }
            
         return view('Frontend.Category_wise_product',compact('products'));
    }

}
