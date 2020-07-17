<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\cm;
use Illuminate\Http\Request;

class cmsController extends Controller
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
            $cms = cm::where('slug', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('body', 'LIKE', "%$keyword%")
                ->orWhere('other_title', 'LIKE', "%$keyword%")
                ->orWhere('foooter', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cms = cm::latest()->paginate($perPage);
        }

        return view('admin.cms.index', compact('cms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cms.create');
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
			// 'slug' => 'unique',
			// 'image' => 'required',
			'title' => 'required',
			'body' => 'required',
			'image' => 'required',
			'other_title' => 'required',
			'foooter' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        cm::create($requestData);

        return redirect('admin/cms')->with('flash_message', 'cm added!');
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
        $cm = cm::findOrFail($id);

        return view('admin.cms.show', compact('cm'));
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
        $cm = cm::findOrFail($id);

        return view('admin.cms.edit', compact('cm'));
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
			// 'slug' => 'unique',
			'image' => 'required',
			'title' => 'required',
			'body' => 'required',
			'image' => 'required',
			'other_title' => 'required',
			'foooter' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $cm = cm::findOrFail($id);
        $cm->update($requestData);

        return redirect('admin/cms')->with('flash_message', 'cm updated!');
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
        cm::destroy($id);

        return redirect('admin/cms')->with('flash_message', 'cm deleted!');
    }
}
