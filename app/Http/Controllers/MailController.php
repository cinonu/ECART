<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email(Request $req) 
   { 
      
       // $subject = $req->subject;
       // $messages = $req->message;
       // $email   = $req->email;
        $email = emailTemplate('contact_us');
        $email->subject = str_replace("{SUBJECT}","Message Received",$email->subject);
        $email->message = str_replace("{RECIPIENT}","Admin",$email->message);
        $email->message = str_replace("{SENDER}",$req->name,$email->message);
        $email->message = str_replace("{NAME}",$req->name,$email->message);
        $email->message = str_replace("{EMAIL}",$req->email,$email->message);
        $email->message = str_replace("{SUBJECT}",$req->subject,$email->message);
        $email->message = str_replace("{COMMENT}",$req->message,$email->message);
        $data['subject'] = $email->subject;
        $data['mess'] = $email->message;
        $data['email'] = $req->email;
       
   
       
      Mail::send('Email.email', $data, function($message) use ($data) {
         $message->from('harshnarigra1530@gmail.com','ADMIN');
            $message->to($data['email'])->subject
            ($data['subject']);
       
      
          });
            //       Mail::send('email', $data, function($message)use($data) {
            // $message->to($data['email'], 'Tutorials Point')->subject
            // ($data['subject']);
            // });
     return redirect()->back()->with('success','user has been emailed');
   }
   // public function html_email() {
   //    $data = array('name'=>"Virat Gandhi");
   //    Mail::send('mail', $data, function($message) {
   //       $message->to('abc@gmail.com', 'Tutorials Point')->subject
   //          ('Laravel HTML Testing Mail');
   //       $message->from('xyz@gmail.com','Virat Gandhi');
   //    });
   //    echo "HTML Email Sent. Check your inbox.";
   // }
   // public function attachment_email() {
   //    $data = array('name'=>"Virat Gandhi");
   //    Mail::send('mail', $data, function($message) {
   //       $message->to('abc@gmail.com', 'Tutorials Point')->subject
   //          ('Laravel Testing Mail with Attachment');
   //       $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
   //       $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
   //       $message->from('xyz@gmail.com','Virat Gandhi');
   //    });
   //    echo "Email Sent with attachment. Check your inbox.";
   // }
   public function store(Request $request)
        {
        // dd($request);

        ContactUs::create($request->all());
        $email = emailTemplate('contact_us');
        $email->subject = str_replace("{SUBJECT}","Message Received",$email->subject);
        $email->message = str_replace("{RECIPIENT}","Admin",$email->message);
        $email->message = str_replace("{SENDER}",$request->name,$email->message);
        $email->message = str_replace("{NAME}",$request->name,$email->message);
        $email->message = str_replace("{EMAIL}",$request->email,$email->message);
        $email->message = str_replace("{SUBJECT}",$request->subject,$email->message);
        $email->message = str_replace("{COMMENT}",$request->message,$email->message);
        $data['subject'] = $email->subject;
        $data['mess'] = $email->message;
        $data['email'] = getConfig('email');
        // dd($data);
        $this->mailctr->register_email($data);


        \Session::flash('message', 'Wait For Response!');
        return redirect()->back();
        }
}