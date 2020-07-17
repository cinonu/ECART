<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cm;

class FooterController extends Controller
{
	public function page(){

    $cms = cm::all();
    dd($cms);
    return view('Frontend.footer',compact('cms'));
    }
}
