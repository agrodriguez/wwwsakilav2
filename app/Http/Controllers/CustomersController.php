<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Customer;

use App\Address;

use App\Http\Requests\CustomerRequest;

class CustomersController extends Controller
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
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=[];
        return view('customers.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $this->storeCustomer($request);
        flash(trans('messages.store', ['name' => trans('customer.customer')]), 'success');
        return redirect('customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $city=[$customer->address->city_id=>$customer->address->city->city];
        return view('customers.edit', compact('customer', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $this->updateCustomer($customer, $request);
        flash(trans('messages.update', ['name' => trans('customer.customer')]), 'success');
        return redirect('customers/'.$customer->customer_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * save the address and the customer to each model
     *
     * @param  App\CustomerRequest $request
     * @return void
     */
    private function storeCustomer(CustomerRequest $request)
    {
        // set the address values and create
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id), 'location', $request->location);
        $address = Address::create($address_array);

        // set the customer values
        $customer_array = array_add(array_add($request->except('address', 'city_id', 'country_id', 'location'), 'address_id', $address->address_id), 'active', $request->has('active'));
        $customer =Customer::create($customer_array);
    }

    /**
     * update the address and customer model
     *
     * @param  Customer $customer
     * @param  CustomerRequest $request
     * @return void
     */
    private function updateCustomer(Customer $customer, CustomerRequest $request)
    {
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id), 'location', $request->location);
        $customer->address->update($address_array);

        $customer->active = $request->has('active');
        $customer->update($request->except('address', 'city_id', 'country_id', 'location'));
    }
}
