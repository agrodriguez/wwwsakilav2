<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Country;

use App\Http\Requests\CountryRequest;

class CountriesController extends Controller
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
     * default view for countries
     *
     * @return view
     */
    public function index()
    {
        $countries = Country::orderBy('country')->paginate(10);
        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\CountryRequest  $request
     * @param App\Country $country the selected country
     * @return \Illuminate\Http\Response
     */
    public function store($locale, CountryRequest $request)
    {
        $country = Country::create($request->all());
        flash(trans('messages.store', ['name' => trans('country.country')]), 'success');
        return redirect(\App::getLocale().'/countries/'.$country->country);
    }

    /**
     * show customere detail
     *
     * @param String $locale the selected locale
     * @param App\Country $country the selected country
     * @return view
     */
    public function show($locale, Country $country)
    {
        $cities = $country->cities()->orderBy('city')->paginate(6);
        return view('countries.show', compact('country', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Country $country the selected country
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Country $country)
    {
        return view('countries.edit', compact('country'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\CountryRequest  $request
     * @param App\Country $country the selected country
     * @return \Illuminate\Http\Response
     */
    public function update($locale, CountryRequest $request, Country $country)
    {
        $country->update($request->all());
        flash(trans('messages.update', ['name' => trans('country.country')]), 'success');
        return redirect(\App::getLocale().'/countries/'.$country->country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\Country $country the selected country
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Country $country)
    {
        try {
            $country->delete();
            flash(trans('messages.delete', ['name' => trans('country.country')]), 'success');
            return redirect(\App::getLocale().'/countries');
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
        } catch (PDOException $e) {
            dd($e);
        }
    }
}
