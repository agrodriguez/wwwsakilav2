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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $film = Film::create($request->all());
        $this->syncFields($film, $request);
        return redirect('films');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $actors = $film->actors()->paginate(8);
        $categories = $film->categories()->paginate(8);
        $inventories = $film->inventories()->where('store_id', Auth::user()->store_id)->paginate(8);
        return view('films.show', compact('film', 'actors', 'categories', 'inventories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, Film $film)
    {
        $film->update($request->all());
        $this->syncFields($film, $request);
        return redirect('films/'.$film->film_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
