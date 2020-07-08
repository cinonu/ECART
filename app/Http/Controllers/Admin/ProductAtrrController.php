<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\ProductAttributes;

class ProductAtrrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
          $this->validate($request,[
            'sku'=>'required',
            'size'=>'required',
            // 'price'=>'required|numeric|between:0,99.99',
            'stock'=>'required|numeric'
        ]);
        ProductAttributes::create($request->all());
        return back()->with('message','Add Attribute Successed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
         public function show($id)
    {
        $menu_active =3;
        $attributes=ProductAttributes::where('products_id',$id)->get();
        $product=product::findOrFail($id);
        return view('admin.product.add_pro_atrr',compact('menu_active','product','attributes'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_data=$request->all();
        foreach ($request_data['id'] as $key=>$attr){
            $update_attr=ProductAttributes::where([['products_id',$id],['id',$request_data['id'][$key]]])
                ->update(['sku'=>$request_data['sku'][$key],'size'=>$request_data['size'][$key],'price'=>$request_data['price'][$key],
                    'stock'=>$request_data['stock'][$key]]);
        }
        return back()->with('message','Update Attribute Successed');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
