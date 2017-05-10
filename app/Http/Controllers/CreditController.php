<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credit;
use Flash;
use Auth;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user()->id == 1) {

            $used = \Request::get('used');
            
            if (empty($used)) {

                $credits = Credit::orderBy('id', 'DESC')->paginate(25);
                return view('admin.credit.index', compact('credits'));

            } else {

                $credit = Credit::where('used', $used)->first();
                return view('admin.credit.show', compact('credit'));
            
            }

        } 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        for ($i=0; $i < 100; $i++) { 
            
            $this->store();
        }

        Flash::success('credit created successfully');
        return redirect(route('credit.index'));

    }

    public function generatecredit()
    {
        
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $random_string_length = 4;
        $string = '';

        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        return $string;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $strArr = [];
        $count = 2;
        for ($i=0; $i <= $count; $i++) { 
            $strArr[] = $this->generatecredit();
        }

        $string = implode($strArr, "-");
        $result = Credit::where('serial_no', $string)->first();
        if ($result) {

            $strArr = [];
            $count = 2;
            for ($i=0; $i <= $count; $i++) { 
                $strArr[] = $this->generatecredit();
            }

            $string = implode($strArr, "-");

        }

        Credit::create(['serial_no' => $string]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Credit::find($id)->delete();
        
        Flash::success('Credit deleted successfully');

        return redirect(route('credit.index'));

    }
}
