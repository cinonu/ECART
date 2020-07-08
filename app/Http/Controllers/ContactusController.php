<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Contactus;

use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index()
    {
    	return view('Frontend.contactus');
    }

    public function store(Request $req)
    {
    	 $msg = new Contactus();
         $msg->user_id = Auth::user()->id;
         $msg->email = Auth::user()->email;
         $msg->Subject = request('subject');
         $msg->Message = request('message');
         $msg->save();

    	return redirect()->back()->with('success','Ticket Raised successfully');
    }
}
