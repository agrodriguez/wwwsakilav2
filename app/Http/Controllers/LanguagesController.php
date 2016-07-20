<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Language;

use App\Http\Requests\LanguageRequest;

class LanguagesController extends Controller
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
        $languages = Language::with('films')->paginate(10);
        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $language = Language::create($request->all());
        flash(trans('messages.store', ['name' => trans('language.language')]), 'success');
        return redirect('languages/'.$language->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        $language->load('films');
        $films = $language->films()->paginate(8);
        return view('languages.show', compact('language', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $language->update($request->all());
        flash(trans('messages.update', ['name' => trans('language.language')]), 'success');
        return redirect('languages/'.$language->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        try {
            $language->delete();
            flash(trans('messages.delete', ['name' => trans('language.language')]), 'success');
            return redirect('languages');
        } catch (\Illuminate\Database\QueryException $e) {
            //add flash
            return redirect('errors.503');//dd($e);
        } catch (PDOException $e) {
            dd($e);
        }
    }
}
