<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Rental;

class RentalsController extends Controller
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
        $rentals = Rental::paginate(10);
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\RentalRequest  $request
     * @param App\Rental $rental the selected rental
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Rental $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Rental $rental the selected rental
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\RentalRequest  $request
     * @param App\Rental $rental the selected rental
     * @return \Illuminate\Http\Response
     */
    public function update($locale, Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\Rental $rental the selected rental
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {
        //
    }
}
