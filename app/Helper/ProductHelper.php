<?php

namespace App\Helper;
use App\Product;

class ProductHelper 
{

   public function adminproduct()
   {

       $products = Product::orderBy('id', 'DESC')->paginate(5);
       return view('admin.product.index', ['products' => $products]);

   }

   public function userproduct() 
   {

       $products = Product::orderBy('id', 'DESC')->paginate(12);
       return view('productlist', ['products' => $products]);

   }
}