<?php

namespace App\Http\Controllers;

use App\EmailTemplates;
use Illuminate\Http\Request;

class EmailTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EmailTemplates::latest()->get();
        return view('admin.EmailTemplate.index',compact('data'));
          
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailTemplates  $emailTemplates
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = EmailTemplates::findOrFail($id);

        return view('admin.EmailTemplate.show',compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailTemplates  $emailTemplates
     * @return \Illuminate\Http\Response
     */
      public function edit($id)
    {
        $email = EmailTemplates::findOrFail($id);
        return view('admin.EmailTemplate.edit', compact('email')); 
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
       $this->validate($request, [
            'slug' => 'required',
            'subject' => 'required',
            'message' => 'required', 
        ]);
        $requestData = $request->all();
        $email = EmailTemplates::findOrFail($id);
        $email->update($requestData);
        return redirect('admin/EmailTemplates')->with('flash_message', 'Page updated!');
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
