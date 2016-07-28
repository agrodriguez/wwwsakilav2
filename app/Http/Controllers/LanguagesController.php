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
        $languages = Language::with('films')->orderBy('name')->paginate(10);
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
     * @param String $locale the selected locale
     * @param App\Http\Requests\LanguageRequest  $request
     * @param App\Language $language the selected language
     * @return \Illuminate\Http\Response
     */
    public function store($locale, LanguageRequest $request)
    {
        $language = Language::create($request->all());
        flash(trans('messages.store', ['name' => trans('language.language')]), 'success');
        return redirect(\App::getLocale().'/languages/'.$language->name);
    }

    /**
     * Display the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Language $language the selected language
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Language $language)
    {
        $language->load('films');
        $films = $language->films()->paginate(8);
        return view('languages.show', compact('language', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Language $language the selected language
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\LanguageRequest  $request
     * @param App\Language $language the selected language
     * @return \Illuminate\Http\Response
     */
    public function update($locale, LanguageRequest $request, Language $language)
    {
        $language->update($request->all());
        flash(trans('messages.update', ['name' => trans('language.language')]), 'success');
        return redirect(\App::getLocale().'/languages/'.$language->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\Language $language the selected language
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Language $language)
    {
        try {
            $language->delete();
            flash(trans('messages.delete', ['name' => trans('language.language')]), 'success');
            return redirect(\App::getLocale().'/languages');
        } catch (\Illuminate\Database\QueryException $e) {
            //add flash
            return redirect('errors.503');//dd($e);
        } catch (PDOException $e) {
            dd($e);
        }
    }
}
