<?php

namespace App\Http\Controllers;

use Request;

use Illuminate\Http\Request as HttpRequest;

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
        $cities = City::OrderByCountry()->paginate(10);
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HttpRequest $request)
    {
        $cid=isset($request->cid)?$request->cid:null;
        return view('cities.create', compact('cid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, CityRequest $request)
    {
        $city = city::create($request->all());
        flash(trans('messages.store', ['name' => trans('city.city')]), 'success');
        return redirect(\App::getLocale().'/countries/'.$city->country->country);
    }

    /**
     * show city detail
     *
     * @param String $locale the selected locale
     * @param App\City $city the selected city
     * @return view
     */
    public function show($locale, City $city)
    {
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\City $city the selected city
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, city $city)
    {
        return view('cities.edit', compact('city'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\CityRequest  $request
     * @param App\City $city the selected city
     * @return \Illuminate\Http\Response
     */
    public function update($locale, CityRequest $request, city $city)
    {
        $city->update($request->all());
        flash(trans('messages.update', ['name' => trans('city.city')]), 'success');
        return redirect(\App::getLocale().'/cities/'.$city->city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\City $city the selected city
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, City $city)
    {
        try {
            $country=$city->country->country;
            $city->delete();
            flash(trans('messages.delete', ['name' => trans('city.city')]), 'success');
            return redirect(\App::getLocale().'/countries/'.$country);
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
        } catch (PDOException $e) {
            dd($e);
        }
    }
}
