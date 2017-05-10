<?php

namespace App\Helper;

use App\Product;
use Flash;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Auth;
use App\UserProduct;
use DB;

class CartHelper 
{

   public function checkquantity($request)
   {
    
        $product = Product::find($request->id);
        $qty = $product->stock;
        $cartqty = $request->qty;

        if (empty($request->qty)) {
            $cartqty = 1;
        }

        if (empty($qty)) {

            Flash::success('Sorry! This product is empty');
            return redirect('/');

        }

        if ($cartqty > $qty) {

            Flash::success('Your stock is more than our products. We have only ' . $qty . ' stock');
            return redirect('/');

        }

        return $this->addtocart($request, $qty, $cartqty);

   }

   public function addtocart($request, $qty, $cartqty)
   {

        Cart::add($request->id, $request->name, $request->price, $cartqty, array());

        $qty = $qty - $cartqty;

        Product::find($request->id)->update([
                'stock' => $qty,
            ]);

        Flash::success('product added successfully');
        return redirect('/');

   }

   public function checkamount($amount, $credit)
   {

        if ($amount > $credit) {
            Flash::warning('Credit not enough');
            return redirect('/');
        }


   }

   public function checkout($items, $credit)
   {
        foreach ($items as $item) {
            
            UserProduct::create(
                [
                    'product_id' => $item->id,
                    'user_id' => Auth::user()->id,
                    'product_name' => $item->name,
                    'qty' => $item->quantity,
                    'totalprice' => Cart::getSubTotal(),

                ]);
            
            $credit = $credit - Cart::getSubTotal();
            Auth::user()->credit = $credit;
            Cart::remove($item->id);
    
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['credits' => Auth::user()->credit]);

        }
    }
}