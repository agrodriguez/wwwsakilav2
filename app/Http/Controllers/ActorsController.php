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
        $actors = Actor::orderBy('first_name')->paginate(10);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActorRequest $request)
    {
        $actor = actor::create($request->all());
        flash(trans('messages.store', ['name' => trans('actor.actor')]), 'success');
        return redirect('actors/'.$actor->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        $films = $actor->films()->paginate(6);
        return view('actors.show', compact('actor', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActorRequest $request, Actor $actor)
    {
        $actor->update($request->all());
        flash(trans('messages.update', ['name' => trans('actor.actor')]), 'success');
        return redirect('actors/'.$actor->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        try {
            $actor->delete();
            flash(trans('messages.delete', ['name' => trans('actor.actor')]), 'success');
            return redirect('actors');
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
        } catch (PDOException $e) {
            dd($e);
        }
    }
}
