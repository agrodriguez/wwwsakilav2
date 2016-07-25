<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Film;

use App\Http\Requests\FilmRequest;

use Auth;

class FilmsController extends Controller
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
        $films = Film::paginate(10);
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\FilmRequest  $request
     * @param App\Film $film the selected film
     * @return \Illuminate\Http\Response
     */
    public function store($locale, FilmRequest $request)
    {
        flash('Film Added', 'success');
        $film = Film::create($request->all());
        $this->syncFields($film, $request);
        flash(trans('messages.store', ['name' => trans('film.film')]), 'success');
        return redirect(\App::getLocale().'/films/'.$film->film_id);
    }

    /**
     * Display the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Film $film the selected film
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Film $film)
    {
        $actors = $film->actors()->paginate(5, ['*'], 'actors_page');
        $categories = $film->categories()->paginate(5, ['*'], 'categories_page');
        $inventories = $film->inventories()->where('store_id', Auth::user()->store_id)->paginate(8);
        return view('films.show', compact('film', 'actors', 'categories', 'inventories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Film $film the selected film
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Film $film)
    {
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\FilmRequest  $request
     * @param App\Film $film the selected film
     * @return \Illuminate\Http\Response
     */
    public function update($locale, FilmRequest $request, Film $film)
    {
        flash('Film Updated', 'success');
        $film->update($request->all());
        $this->syncFields($film, $request);
        flash(trans('messages.update', ['name' => trans('film.film')]), 'success');
        return redirect(\App::getLocale().'/films/'.$film->film_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\Film $film the selected film
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Film $film)
    {
        try {
            //create new request to delete related categories and actors via sync
            $request = new FilmRequest;
            $this->syncFields($film, $request);
            $film->delete();
            flash(trans('messages.delete', ['name' => trans('film.film')]), 'success');
            return redirect(\App::getLocale().'/films');
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
        } catch (PDOException $e) {
            dd($e);
        }
    }

    /**
     * update the edited film
     *
     * @param Film $film
     * @param $actors
     * @param $categories
     * @return void
     */
    private function syncFields(Film $film, FilmRequest $request)
    {
        if (!$request->has('actor_list')) {
            array_add($request, 'actor_list', []);
        }

        if (!$request->has('category_list')) {
            array_add($request, 'category_list', []);
        }
        $film->categories()->sync($request->input('category_list'));
        $film->actors()->sync($request->input('actor_list'));
    }
}
