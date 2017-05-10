<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Mail;

class SendMailController extends Controller
{
    public function sendMail()
    {
    	// Mail::to('mgaungthurawin@gmail.com')->send(new OrderShipped);

        $content = [
                    'html'=> 'email.sendemail', 
                    'body'=> 'The body of your message.',
                    'button' => 'Click Here'
                    ];

                $receiverAddress = 'mgaungthurawin@gmail.com';

                Mail::to($receiverAddress)->send(new OrderShipped($content));

                dd('mail send successfully');
    }
}
