<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use Cart;
use Redirect;

class WishListController extends Controller
{
  
  public function index($id)
  {
    $product = product::where('id',$id)->first();
      $img = $product->images->first();
      $image = $img->image;
      Cart::instance('wishlist')->add($id,$product->Product_name,1,$product->Price,['img' => $image]);
      $user = Auth()->user()->email;
      Cart::instance('wishlist')->store($user);

    return Redirect::back()->withErrors(['Msg', 'The Message']); 
  }

  public function show()
  {
    return view('Frontend.Wishlist');
  }
 
  public function destroy($rowId)
  { 
   Cart::instance('wishlist')->remove($rowId);

      $user = Auth()->user()->email;
      Cart::instance('wishlist')->store($user);

   return redirect(url('/Wishlist'));
  }
  
  public function filteredproduct(Request $Request)
  {
    $id = $Request->id;
    $product = product::find($id);
    $img = $product->images->first();
    $image = $img->image;
    Cart::instance('wishlist')->add($id,$product->Product_name,1,$product->Price,['img' => $image]);
    $user = Auth()->user()->email;
        // dd($user);
    Cart::instance('wishlist')->store($user);

    return Redirect::back()->withErrors(['Msg', 'The Message']); 
 
  }

}
