<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Productimage;
use App\product;


class ProductImagesController extends Controller
{
    public function create($id)
    {
        
        
           
        $product = Product::find($id);

        return view('admin.product.images',compact('product'));
    }

    public function Store(Request $request)
    {
     $requestData = $request->all();

      if ($request->hasFile('Image')) 
            {
            $requestData['Image'] = $request->file('Image')
            ->store('Productimage', 'public');
             }

        Productimage::create($requestData);
        return redirect()->back();
    }
   public function delete($id)
   {
    
    $image = Productimage::find($id);
    $image->delete();
    return redirect()->back();     
   }
}


