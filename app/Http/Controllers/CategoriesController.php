<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Category;

use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('films')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        flash(trans('messages.store', ['name' => trans('category.category')]), 'success');
        return redirect('categories/'.$category->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category->load('films');
        $films = $category->films()->paginate(8);
        return view('categories.show', compact('category', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        flash(trans('messages.update', ['name' => trans('category.category')]), 'success');
        return redirect('categories/'.$category->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            flash(trans('messages.delete', ['name' => trans('category.category')]), 'success');
            return redirect('categories');
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
        } catch (PDOException $e) {
            dd($e);
        }
        
    }
}
