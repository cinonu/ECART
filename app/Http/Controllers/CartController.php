<!-- <?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;
use Cart;
use Gloudemans\Shoppingcart\Contracts\Buyable;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       // / return view('Frontend.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $product = product::find($id);
        $img = $product->images->first();
        $image = $img->image;
        (Cart::add($request->id,$request->name,1,$request->price,['img' => $image,$request->size]));
        // $user = Auth()->user()->email;
         
        // Cart::store($user);


        // return redirect(url('/cart'))->with('success_message','Item was added to the cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth()->user()->email;
        Cart::restore($user);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $rowId)
    {
        $req = $request->qtyremove;
        Cart::update($rowId,$req-1);
        return redirect(url('/cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $req = $request->qtyadd;
        Cart::update($rowId,$req+1);
        return redirect(url('/cart'));

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @rturn \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {  
       Cart::remove($rowId);
       return redirect(url('/cart'));
    }
}
 -->