<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Auth;
use App\UserProduct;
use DB;
use App\Product;
use App\Helper\CartHelper;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        if (Auth::user()->activated == "non") {

            Flash::warning('You must activate you account in gmail link');
            return redirect('AccountActivate');

        }

        $items = Cart::getContent();
        return view('cart', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Cart::getContent();
        return view('cartcheckout', ['items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartHelper $carthelper)
    {
        if(Auth::user()) {

            return $carthelper->checkquantity($request);

        } else {

            Flash::warning('You must login to shop product');
            return redirect('login');
        }
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
    public function edit($amount, CartHelper $carthelper)
    {
        $items = Cart::getContent();
        $credit = Auth::user()->credits;

        return $carthelper->checkamount($amount, $credit);

        $carthelper->checkout($items, $credit);

        Flash::success('you purchase process successfully');

        return redirect('/');


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

        $product = Product::find($id);
        $qty = $product->stock;

        $items = Cart::getContent($id)->all();
        $addqty = $items[1]['quantity'];
        $qty = $qty + $addqty;

        Product::find($id)->update([
                'stock' => $qty,
            ]);

        Cart::remove($id);

        Flash::success('removed product from cart successfully');

        return redirect(route('cart.index'));
    }
}
