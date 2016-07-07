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
        $countries = Country::paginate(10);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $country = Country::create($request->all());
        return redirect('countries');
    }

    /**
     * show customere detail
     *
     * @param  App\Customer $customer
     * @return view
     */
    public function show(Country $country)
    {
        //eager load address city and country
        //$country->load('address.city.country', 'store.address.city.country')->get();
        $cities = $country->cities()->paginate(6);
        return view('countries.show', compact('country', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        flash('Country Updated', 'success');
        $country->update($request->all());
        //$this->syncFields($country, $request);
        return redirect('countries/'.$country->country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try {
            $country->delete();
            return redirect('countries');
        } catch (\Illuminate\Database\QueryException $e) {
            //add flash
            return redirect('errors.503');//dd($e);
        } catch (PDOException $e) {
            dd($e);
        }
        /**
        * $country->delete();
        * return redirect('countries');
        */
    }
}
