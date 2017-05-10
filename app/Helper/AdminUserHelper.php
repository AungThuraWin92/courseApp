<?php

namespace App\Helper;
use Mail;
use App\Mail\OrderShipped;

class AdminUserHelper 
{

   public function checkisadmin($request)
   {

        if ($request->is_admin) {
            $is_admin = $request['is_admin'];
            return $is_admin;
        }

        $is_admin = 0;
        return $is_admin;
        
   }

   public function sendmail($email)
   {

        $content = [
                    'title'=> 'Itsolutionstuff.com mail', 
                    'body'=> 'The body of your message.',
                    'button' => 'Click Here'
                    ];

        $receiverAddress = $email;

        // Mail::to($receiverAddress)->send(new OrderShipped($content));

   }

}