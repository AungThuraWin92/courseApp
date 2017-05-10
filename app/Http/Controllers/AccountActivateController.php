<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Flash;
use App\User;

class AccountActivateController extends Controller
{
    public function index()
    {

    	$activated = \Request::get('activate');

    	if (!empty($activated)) {

    		$id = Auth::user()->id;
    		User::find($id)->update(['activated' => $activated]);

    		Flash::success('Your account activated successfully');

    		return redirect('/');
    	
    	} else {
    	
    		return view('account');
    	
    	}

    }

}
