<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Newsletter;

class NewsLetterController extends Controller
{
    public function index()
    {
       // dd("hello");
    	// dd(config('laravel-newsletter'));
       $email = Auth::user()->email;
       $name = Auth::user()->name;
     
    Newsletter::subscribe($email, ['FNAME'=>$name]);
    return redirect()->back()->with('success','You are Now Subscribed');

    }
}
