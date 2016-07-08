<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Store;

use App\Http\Requests\StoreRequest;

use App\Address;

class StoresController extends Controller
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
        $stores = Store::paginate(10);
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=[];
        return view('stores.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        flash('Store Created', 'success');
        $this->storeStore($request);
        return redirect('stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $city=[$store->address->city_id=>$store->address->city->city];
        return view('stores.edit', compact('store', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        flash('Store Updated', 'success');
        $this->updateStore($store, $request);
        return redirect('stores/'.$store->store_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        try {
            flash('Store Deleted', 'success');
            $store->delete();
            return redirect('stores');
        } catch (\Illuminate\Database\QueryException $e) {
            //add flash
            return redirect('errors.503');//dd($e);
        } catch (PDOException $e) {
            dd($e);
        }
    }

    /**
     * save the address and the store to each model
     *
     * @param  App\CustomerRequest $request
     * @return void
     */
    private function storeStore(StoreRequest $request)
    {
        // set the address values and create
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id), 'location', $request->location);
        $address = Address::create($address_array);

        // set the store values
        $store_array = array_add($request->except('address', 'city_id', 'country_id', 'location'), 'address_id', $address->address_id);
        $store =Store::create($store_array);
    }

    /**
     * update the address and store model
     *
     * @param  Store $Store
     * @param  StoreRequest $request
     * @return void
     */
    private function updateStore(Store $store, StoreRequest $request)
    {
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id), 'location', $request->location);
        $store->address->update($address_array);
        
        $store->update($request->except('address', 'city_id', 'country_id', 'location'));
    }
}
