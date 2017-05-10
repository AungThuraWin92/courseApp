<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Mail;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->is_admin == 1) {

            return view('admin.home');

        } else {

            $activated = Auth::user()->activated;

            if ($activated == 'non') {

                return redirect('dashboard');

            }

            return redirect('/');

        }
    }

}
