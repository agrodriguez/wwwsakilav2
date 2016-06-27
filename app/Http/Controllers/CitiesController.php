<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\City;

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
        $cities = City::paginate(10);
        return view('cities.index', compact('cities'));
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
}
