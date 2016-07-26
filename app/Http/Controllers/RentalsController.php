<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Rental;

use App\Payment;

use App\Http\Requests\RentalRequest;

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
        $films = \DB::table('film')->select(\DB::raw('film_id, concat(title," - ", SUBSTRING(description,1,50),"...") as name, rental_rate'))->lists('name', 'film_id');
        $customers= \DB::table('customer')->select(\DB::raw('customer_id, concat(first_name," ", last_name) as name'))->lists('name', 'customer_id');
        return view('rentals.create', compact('films', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, RentalRequest $request)
    {
                
        $rental = Rental::create($request->except(['film_id', 'staff', 'return_date']));
        return redirect(\App::getLocale().'/rentals/'.$rental->rental_id.'/payment');
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

    /**
     * payment methos for the rental or overdue charges
     * @param  App\Rental $rental
     * @return mixed
     */
    public function payment($locale, Rental $rental)
    {
        $queryString='select get_customer_balance('.$rental->customer_id.',NOW()) as amount;';
        $amount=\DB::select($queryString);
        /** if returned in  time no overdue charges */
        if ($amount[0]->amount==0.00) {
            return redirect(\App::getLocale().'/rentals');
        } else {
            return view('rentals.payment', compact('rental', 'amount'));
        }
    }

    /**
     * pay the amount due
     *
     * @param  Rental $rental
     * @param  RentalRequest $request
     * @return redirect
     */
    public function payUp($locale, Rental $rental, RentalRequest $request)
    {
        $payment= new Payment;
        $payment->customer_id=$rental->customer_id;
        $payment->staff_id=\Auth::user()->staff_id;
        $payment->rental_id=$rental->rental_id;
        $payment->amount=$request->amount;
        $payment->save();
        return redirect(\App::getLocale().'/rentals');
    }
}
