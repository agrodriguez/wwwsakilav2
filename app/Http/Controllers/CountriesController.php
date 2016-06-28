<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;

use App\Http\Requests;

use App\Country;

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
}
