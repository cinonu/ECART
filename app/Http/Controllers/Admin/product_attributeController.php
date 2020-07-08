<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\product_attribute;
use Illuminate\Http\Request;

class product_attributeController extends Controller
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

        if (!empty($keyword)) {
            $product_attribute = product_attribute::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product_attribute = product_attribute::latest()->paginate($perPage);
        }

        return view('admin.product_attribute.index', compact('product_attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product_attribute.create');
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
			'name' => 'required|unique:product_attributes'
		]);
        $requestData = $request->all();
        
        product_attribute::create($requestData);

        return redirect('admin/product_attribute')->with('flash_message', 'product_attribute added!');
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
        $product_attribute = product_attribute::findOrFail($id);

        return view('admin.product_attribute.show', compact('product_attribute'));
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
        $product_attribute = product_attribute::findOrFail($id);

        return view('admin.product_attribute.edit', compact('product_attribute'));
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
            'name' => 'required|unique:product_attributes'
			
		]);
        $requestData = $request->all();
        
        $product_attribute = product_attribute::findOrFail($id);
        $product_attribute->update($requestData);

        return redirect('admin/product_attribute')->with('flash_message', 'product_attribute updated!');
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
        product_attribute::destroy($id);

        return redirect('admin/product_attribute')->with('flash_message', 'product_attribute deleted!');
    }
}
