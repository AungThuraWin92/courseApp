<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Flash;
use Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id == 1) {
            $categories = Category::orderBy('id', 'DESC')->paginate(5);
            return view('admin.category.index', ['categories' => $categories]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->id == 1) {
            return view('admin.category.create');
        } else {
            return reditect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        Flash::success('category saved successfully');

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (Auth::user()->id == 1) {

            $category = Category::find($id);

            if (empty($category)) {

                Flash::error('category not found');

                return redirect(route('category.index'));

            }

            return view('admin.category.show', ['category' => $category]);

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

        if (Auth::user()->id == 1) {

            $category = Category::find($id);

            if (empty($category)) {

                Flash::error('category not found');

                return redirect(route('category.index'));

            }

            return view('admin.category.edit', ['category' => $category ]);

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
    public function update(CategoryRequest $request, $id)
    {
        if (Auth::user()->id == 1) {

            Category::find($id)->update($request->all());
            
            Flash::success('Category updated successfully');

            return redirect(route('category.index'));

        } else {

            return redirect('/');
        
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        Flash::success('Category deleted successfully');

        return redirect(route('category.index'));

    }
}
