<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\configuration;

class configurationcontroller extends Controller
{
//    public function index()
// {
// $data = configuration::all();
// // dd($result->toArray());
// // foreach ($result as $value) {

// // $data[$value['key_name']] = array('title' =>$value['title'],'value'=>$value['value']);

// // }
// // dd($data);
// return view('content',compact('data'));
// }



/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
 
$req = $request->all();

 
unset($req['_token']);
unset($req['_method']);

foreach ($req as $key=>$value) {
$configuration = configuration::findOrFail($key);
$configuration->update(array('value' => $value ));

}
return redirect()->back();
}
}


