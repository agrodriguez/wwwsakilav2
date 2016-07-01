<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\Staff;

use App\Http\Requests\StaffRequest;

class StaffsController extends Controller
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
        $staffs = Staff::paginate(10);
        return view('staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=[];
        return view('staffs.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $this->storeStaff($request);
        return redirect('staffs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $city=[$staff->address->city_id=>$staff->address->city->city];
        return view('staffs.edit', compact('staff', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        $this->updateStaff($staff, $request);
        return redirect('staffs');
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
     * store the staff address image and info
     *
     * @param  StaffRequest $request
     * @return void
     **/
    private function storeStaff(StaffRequest $request)
    {
        /** set the address values and create */
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id), 'location', $request->location);
        $address = Address::create($address_array);
        
        /** set the customer values */
        $staff_array = array_add(array_add($request->except('address', 'city_id', 'country_id', 'location'), 'address_id', $address->address_id), 'active', $request->has('active'));
        $staff_array['password'] = bcrypt($request['password']);
        $staff =Staff::create($staff_array);

        $tmpName='images/uploads/upload'.time().'.png';

        if (!is_null($request->file('picture'))) {
             $img = Image::make($request->file('picture'))->fit(121, 117)->save($tmpName);
             $staff->picture = $img->encode('png');
        }
        $staff->save();
        //$staff = Staff::create($request->all());
    }

    /**
     * update the staff address image and password
     *
     * @param  Staff $staff
     * @param  StaffRequest $request
     * @return void
     **/
    private function updateStaff(Staff $staff, StaffRequest $request)
    {
        $tmpName='images/uploads/upload'.time().'.png';

        if (!is_null($request->file('picture'))) {
             $img = Image::make($request->file('picture'))->fit(121, 117)->save($tmpName);
             $staff->picture = $img->encode('png');
        }

        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id), 'location', $request->location);
        $staff->address->update($address_array);

        $staff->active = $request->has('active');
        if ($request->has('password')) {
            $request['password'] = bcrypt($request['password']);
            $staff->update($request->except('address', 'city_id', 'country_id', 'location', 'picture'));
        } else {
            $staff->update($request->except('address', 'city_id', 'country_id', 'location', 'picture', 'password'));
        }
    }
}
