<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\banner;
use App\product;
use App\User;
use App\Category;
use App\cm;
use App\Configuration;
use Cart;

class Frontendshow extends Controller
{
   public function show(Request $Request)
   {
   	   
       $catid = $Request->catid;
   	   // $category = Category::with('products')->find($catid);
   	   $category = Category::all();
       
      
       $featured_products =  Product::paginate(6);
   	   

   	  // dd($category);
   	  $user = Auth()->user();
      if(isset($user->email))
      {
         Cart::restore($user->email);
      }
   	  $banner = banner::all();
   	  // $categories = category::where('parent_id',NULL)->get();
   	  $categories = DB::table('categories')->where('parent_id', NULL)->get();
        // dd($categories);
   	  $product = product::all();
      $cms = cm::all();

      $item = product::where('category_id',1)->take(4)->get();

      $Configuration = Configuration::pluck('config_value');
      // dd($mobile);

      


       // dd($pro); 
      
   	  return view('Frontend.content',compact('banner','product','user','categories','category','featured_products','cms','item','Configuration'));

   }

}
?>