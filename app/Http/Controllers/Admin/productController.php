<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProductAttributes;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword))
        {
            $product = product::where('category_id', 'LIKE', "%$keyword%")
                ->orWhere('Product_name', 'LIKE', "%$keyword%")
                ->orWhere('Price', 'LIKE', "%$keyword%")
                ->orWhere('Product_color', 'LIKE', "%$keyword%")
                ->orWhere('Product_Description', 'LIKE', "%$keyword%")
                ->orWhere('Product_code', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } 
        
        else
        {
            $product = product::latest()->paginate($perPage);

        }
             // dd($product[0]->categories->toArray());      // $pro = $product->categories[0]['category_name'];
        // dd($pro);
          
 



        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        $categories = category::pluck('category_name','id');
        
        
        return view('admin.product.create',compact('categories'));
        // return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			// 'category' => 'required',
			// 'product name' => 'required',
			// 'Price' => 'required',
			// 'Product color' => 'required',
			// 'Product code' => 'required',
			// 'Product Description' => 'required'
		]);
        $requestData = $request->all();

        $product = new Product($requestData);
// dd($request['category_id']);
        $product->save();
        if ($request->has('category_id'))
         {
            $product->categories()->sync($request['category_id']);
         }

        // dd($product);


        // product::create($requestData);

        return redirect('admin/product')->with('flash_message', 'product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = product::findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = product::findOrFail($id);
        $categories = category::pluck('category_name','id');



        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			// 'category' => 'required',
			// 'product name' => 'required',
			// 'Price' => 'required',
			// 'Product color' => 'required',
			// 'Product code' => 'required',
			// 'Product Description' => 'required'
		]);
        $requestData = $request->all();
        
        $product = product::findOrFail($id);

        $product->update($requestData);
          $product->save();
        if ($request->has('category_id'))
         {
            $product->categories()->sync($request['category_id']);
        }


        return redirect('admin/product')->with('flash_message', 'product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        product::destroy($id);

        return redirect('admin/product')->with('flash_message', 'product deleted!');
    }

    public function ProCat(Request $request)
    {
      
       $cat_id = $request->category_id;
       $products = Db::table('products')
             ->join('product_images','product_images.product_id','products.id')
             ->join('categories','categories.id','products.category_id')
             ->where('products.category_id',$cat_id)
             ->get();
      // dd($products);
       
        return view('Frontend.procat',compact('products'));

    }

    public function ProPrice(request $request)
    {
        $data = $request->idsize;
        $proArr = explode("-",$data);
        $proAttr = ProductAttributes::where(['products_id' => $proArr[0],'size' => $proArr[1]])->first();
        echo  $proAttr->price;?>
        <input type="hidden" value="<?php echo $proAttr->price;?>" name="price">
        <?php
     }
}
