<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Inventory;

class ApiController extends Controller
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
     * return a list of cities from the provided country
     *
     * @return list
     */
    public function cities(Request $request)
    {
        if (isset($request['id'])) {
            return \DB::table('city')->select('city_id as id', 'city as text')->where('country_id', $request['id'])->get();
        }
    }

    /**
     * retrun the list inventory ids from a given film and store
     *
     * @return Array
     */
    public function inventories(Request $request)
    {
        if (isset($request['id']) && isset($request['store'])) {
            $queryString='SELECT inventory_id as id, CONCAT("#",inventory_id) as text
            FROM inventory
            WHERE film_id = '.$request['id'].'
            AND store_id = '.$request['store'].'
            AND inventory_in_stock(inventory_id);';
        }
        return \DB::select($queryString);
    }

    /**
     * create a new inventory for the film and store
     *
     * @param  Request $request
     * @return redirect
     */
    public function storeInventory(Request $request)
    {
        Inventory::create($request->all());
        return redirect('films/'.$request->film_id);
    }
}
