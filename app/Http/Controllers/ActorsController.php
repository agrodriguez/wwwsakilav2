<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Actor;

use App\Http\Requests\ActorRequest;

class ActorsController extends Controller
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
        $actors = Actor::orderBy('first_name')->paginate(10, ['*'], 'actors_page');
        return view('actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\ActorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, ActorRequest $request)
    {
        $actor = actor::create($request->all());
        flash(trans('messages.store', ['name' => trans('actor.actor')]), 'success');
        return redirect(\App::getLocale().'/actors/'.$actor->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Actor $actor the selected actor
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Actor $actor)
    {
        $films = $actor->films()->paginate(6);
        return view('actors.show', compact('actor', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Actor $actor the selected actor
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\ActorRequest  $request
     * @param App\Actor $actor the selected actor
     * @return \Illuminate\Http\Response
     */
    public function update($locale, ActorRequest $request, Actor $actor)
    {
        $actor->update($request->all());
        flash(trans('messages.update', ['name' => trans('actor.actor')]), 'success');
        return redirect(\App::getLocale().'/actors/'.$actor->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\Actor $actor the selected actor
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Actor $actor)
    {
        try {
            $actor->delete();
            flash(trans('messages.delete', ['name' => trans('actor.actor')]), 'success');
            return redirect(\App::getLocale().'/actors');
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
        } catch (PDOException $e) {
            dd($e);
        }
    }
}
