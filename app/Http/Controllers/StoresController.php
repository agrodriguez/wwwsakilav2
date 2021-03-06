<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Store;

use App\Http\Requests\StoreRequest;

use App\Address;

use App\Staff;

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
        $staffs= Staff::getNotManager()->lists('name', 'staff_id');
        return view('stores.create', compact('city', 'staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\StoreRequest  $request
     * @param App\Store $store the selected store
     * @return \Illuminate\Http\Response
     */
    public function store($locale, StoreRequest $request)
    {
        $store=$this->storeStore($request);
        flash(trans('messages.store', ['name' => trans('store.store')]), 'success');
        return redirect(\App::getLocale().'/stores/'.$store->store_id);
    }

    /**
     * Display the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Store $store the selected store
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Store $store)
    {
        $films=$store->films()->paginate(6);
        return view('stores.show', compact('store', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Store $store the selected store
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Store $store)
    {
        $city=[$store->address->city_id=>$store->address->city->city];
        $staffs= Staff::getNotManager()->where('store.store_id', $store->store_id)->lists('name', 'staff_id');
        return view('stores.edit', compact('store', 'city', 'staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\StoreRequest  $request
     * @param App\Store $store the selected store
     * @return \Illuminate\Http\Response
     */
    public function update($locale, StoreRequest $request, Store $store)
    {
        $this->updateStore($store, $request);
        flash(trans('messages.update', ['name' => trans('store.store')]), 'success');
        return redirect(\App::getLocale().'/stores/'.$store->store_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\Store $store the selected store
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Store $store)
    {
        try {
            // \Schema::disableForeignKeyConstraints();
            // Nota no borrar usuario actual ni tienda actual
            $store->delete();
            flash(trans('messages.delete', ['name' => trans('store.store')]), 'success');
            return redirect(\App::getLocale().'/stores');
            // \Schema::enableForeignKeyConstraints();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
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
        // allow create the store with null manager to be addes later
        \Schema::disableForeignKeyConstraints();
        if ($request->manager_staff_id==0) {
            $request->manager_staff_id=null;
        }
        $store_array = array_add($request->except('address', 'city_id', 'country_id', 'location'), 'address_id', $address->address_id);
        $store =Store::create($store_array);
        \Schema::enableForeignKeyConstraints();
        return $store;
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
        //disable constraints to update store without manager
        \Schema::disableForeignKeyConstraints();
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id), 'location', $request->location);
        $store->address->update($address_array);
        $store->update($request->except('address', 'city_id', 'country_id', 'location'));
        \Schema::enableForeignKeyConstraints();
    }
}
