<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductDetailController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$categories = $product->categories;
    	return view('productdetail', ['product' => $product, 'categories' => $categories]);
    }
}
