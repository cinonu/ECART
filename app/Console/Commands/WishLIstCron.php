<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\User;
use DB;
use Cart;
use Mail;


class WishLIstCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wishlist:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
      $user = User::all();
      foreach($user as $people)
      {

       // \Log::info(print_r($people->email, true));
      $wish = DB::table('shoppingcart')->where('instance','wishlist')
                                ->where('identifier',$people->email)
                                ->get();
       
       

       foreach ($wish as $value) 
        {
         $pp=unserialize($value->content);
         foreach($pp as $item)
         {

             \Log::info(print_r($item->name, true));
             \Log::info(print_r($item->options->img, true));
             \Log::info(print_r($item->price, true));
             // $name[] = $item->name;
         }
             \Log::info(print_r($people->email, true));
             // \Log::info(print_r($name, true));

         // $data = array('email' => $people->email);
         $email = $people->email;
         $email = emailTemplate('Wishlist');
            // $email->subject = str_replace("{SUBJECT}","Message Received",$email->subject);
            // $email->message = str_replace("{RECIPIENT}","Admin",$email->message);
            // $email->message = str_replace("{SENDER}",$people->email,$email->message);
            // $email->message = str_replace("{SITE_NAME}",,'E-shopper');
            $email->message = str_replace("{EMAIL}",$people->email,$email->message);
            // $email->message = str_replace("{SUBJECT}",$req->subject,$email->message);
            // $email->message = str_replace("{COMMENT}",$name,$email->message);
            // $data['subject'] = $email->subject;
            $data['mess'] = $email->message;
            $data['email'] = $people->email;
           
          
         Mail::send('Email.email',$data, function($message) use ($data)  {
         $message->from('harshnarigra1530@gmail.com','ADMIN');
         $message->to($data['email'])->subject
         ('here is your wishlist');
        });
          // $name = [];
         
        }

        }   
       $this->info('Demo:Cron Cummand Run successfully!');
       
   }

}