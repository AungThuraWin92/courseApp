<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\CategoryProduct;
use Flash;
use Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Helper\ImageHelper;
use App\Helper\ProductHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductHelper $producthelper)
    {

        if (Auth::user()) {

            if (Auth::user()->is_admin == 1) {

                return $producthelper->adminproduct();

            } else {

                return $producthelper->userproduct();
            
            }

        } else {
            
            return $producthelper->userproduct();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->is_admin == 1) {

            $categories = Category::all();
            return view('admin.product.create', ['categories' => $categories]);

        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ImageHelper $imagehelper)
    {
        $feature_image = $imagehelper->save($request, 'feature_image');
        $image_one = $imagehelper->save($request, 'image_one');
        $image_two = $imagehelper->save($request, 'image_two');

        $data = $request->all();
        $data['feature_image'] = $feature_image;
        $data['image_one'] = $image_one;
        $data['image_two'] = $image_two;

        $product = Product::create($data);

        $product->categories()->sync($request->category);
        Flash::success('product saved the successfully!');
        return redirect(route('product.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->is_admin == 1) {

            $product = Product::find($id);

            if (empty($product)) {

                Flash::error('Product not found');

                return redirect(route('product.index'));

            }

            return view('admin.product.show', ['product' => $product]);

        } else {
        
            return redirect('/');
        
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::user()->is_admin == 1) {

            $product = Product::find($id);

            if (empty($product)) {

                Flash::error('Product not found');

                return redirect(route('product.index'));

            }

            
            $categories = Category::all();

            $selected = $product->categories()->pluck('category_id')->all();

            return view('admin.product.edit', 
                [
                    'product' => $product,
                    'categories' => $categories,
                    'selected' => $selected,
                ]);

        } else {

            return redirect('/');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id, ImageHelper $imagehelper)
    {

        $feature_image = $imagehelper->update($request, 'feature_image', $request->img);
        $image_one = $imagehelper->update($request, 'image_one', $request->img_one);
        $image_two = $imagehelper->update($request, 'image_two', $request->img_two);

        $data = $request->all();
        $data['feature_image'] = $feature_image;
        $data['image_one'] = $image_one;
        $data['image_two'] = $image_two;

        $product = Product::find($id)->update($data);
        $product = Product::find($id);
        $product->categories()->sync($request->category);

        Flash::success('product updated the successfully!');
        
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        Flash::success('product deleted successfully');
    
        return redirect(route('product.index'));
    }
}
