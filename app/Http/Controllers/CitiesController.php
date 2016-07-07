<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\City;

use App\Http\Requests\CityRequest;

class CitiesController extends Controller
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
     * default view for cities
     *
     * @return view
     */
    public function index()
    {
        $cities = City::orderBy('country_id')->orderBy('city')->paginate(10);
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city = city::create($request->all());
        return redirect('cities');
    }

    /**
     * show city detail
     *
     * @param  App\Customer $city
     * @return view
     */
    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city)
    {
        return view('cities.edit', compact('city'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, city $city)
    {
        flash('City Updated', 'success');
        $city->update($request->all());
        //$this->syncFields($city, $request);
        return redirect('cities/'.$city->city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect('cities');
    }
}
