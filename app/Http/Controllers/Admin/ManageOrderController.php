<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\order;
use App\user;

class ManageOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = order::paginate(5);

        return view('admin.orders.index',compact('order'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = order::findOrFail($id);
        

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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

        $requestData = $request->all();
        $order_status = $request->order_status;
        $order = order::findOrFail($id); 
        $user_id=$order->users_id;
        $name = $order ->name;

        $user_info = DB::table('users')->where('id',$user_id)->get();
        $email = $user_info[0]->email;
       
        $order->update($requestData);
        $data = array('subject'=> $order_status,
                      'email'=>$email,
                      'name'=>$name,
                      'id'=>$id
                    );
   

        Mail::send('orderstatus', $data, function($message) use ($email, $order_status) {
            $message->from('harshnarigra1530@gmail.com','ADMIN');
            $message->to($email)->subject
            ('Status of your Recent order');
        });
    
        
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
