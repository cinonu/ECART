<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\product;
use App\Category;

use App\order;

class OrderInfoController extends Controller
{
    public function index()
    { 
      

       $id =  Auth::user()->id;
       $orders = order::where('users_id',$id)->get();

       // foreach($orders as $item)
       // {
       // 	foreach($item->products as $pro )
       // 	{
       // 		foreach($pro->images as $img)
       // 		{
       // 			print_r($img->product_id);
       // 		}
       // 	}
       // }
       
        return view('Frontend.orderinfo',compact('orders'));
    }
}
