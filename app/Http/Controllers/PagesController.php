<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\cm;

class PagesController extends Controller
{
    
    // Show the requested page
    public function show(cm $cm)
    {
        
    	$page = cm::findorfail($cm);

        return view('pages', compact('page'));
    }
}
