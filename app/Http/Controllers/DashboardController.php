<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Flash;

class DashboardController extends Controller
{
    public function index()
    {
    	if ( Auth::user() ) {

            if (Auth::user()->activated == "non") {

                Flash::warning('You must activate you account in gmail link');
                return redirect('AccountActivate');

            } else {

                $id = Auth::user()->id;
                $user = User::find($id);
                return view('dashboard', ['user' => $user]);

            }
    	
    	}

    		return redirect('/');
    }

    public function create()
    {
    	return view('createcredit');
    }


    public function store(Request $request) {

    	$this->validate($request, [
    	        'amount' => 'required | numeric',
    	    ]);

    	$credit = 0;
    	$count = $request->amount;
    	$id = Auth::user()->id;

    	$results = DB::table('credits')
    			->where('used_by', 0)
    			->where('used', 0)
    			->limit($count)->get();
    	
    	foreach ($results as $result) {
    		
    		DB::table('credits')
    			->where('id', $result->id)
    			->update(['used_by' => $id, 'used' => 1]);

    		$credit += 1000; 

    	}

    	$data = DB::table('users')
    		->where('id', $id)->first();

    	$credit = $credit + $data->credits;

    	DB::table('users')
    		->where('id', $id)
    		->update(['credits' => $credit]);

    	Flash::success('credit bought successfully');

    	return redirect(route('dashboard.index'));


    }
}
