<?php

namespace App\Http\Controllers;

use Request;

use Illuminate\Http\Request as HttpRequest;

use App\Http\Requests;

use App\Staff;

use App\Address;

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
     * @param Illuminate\Http\Requests $request use the request to get the store param
     * @return \Illuminate\Http\Response
     */
    public function create(HttpRequest $request)
    {
        $city=[];
        $sto=isset($request->sto)?$request->sto:null;
        return view('staffs.create', compact('city', 'sto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\StaffRequest  $request
     * @param App\Staff $staff the selected staff
     * @return \Illuminate\Http\Response
     */
    public function store($locale, StaffRequest $request)
    {
        $staff=$this->storeStaff($request);
        flash(trans('messages.store', ['name' => trans('staff.staff')]), 'success');
        return redirect(\App::getLocale().'/staffs/'.$staff->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Staff $staff the selected staff
     * @return \Illuminate\Http\Response
     */
    public function show($locale, Staff $staff)
    {
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param String $locale the selected locale
     * @param App\Staff $staff the selected staff
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Staff $staff)
    {
        $city=[$staff->address->city_id=>$staff->address->city->city];
        return view('staffs.edit', compact('staff', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param String $locale the selected locale
     * @param App\Http\Requests\StaffRequest  $request
     * @param App\Staff $staff the selected staff
     * @return \Illuminate\Http\Response
     */
    public function update($locale, StaffRequest $request, Staff $staff)
    {
        $this->updateStaff($staff, $request);
        flash(trans('messages.update', ['name' => trans('staff.staff')]), 'success');
        return redirect(\App::getLocale().'/staffs/'.$staff->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param String $locale the selected locale
     * @param App\Staff $staff the selected staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Staff $staff)
    {
        try {
            $staff->delete();
            flash(trans('messages.delete', ['name' => trans('staff.staff')]), 'success');
            return redirect(\App::getLocale().'/staffs');
        } catch (\Illuminate\Database\QueryException $e) {
            return view('errors.503', ['myError'=>$e]);
        } catch (PDOException $e) {
            dd($e);
        }
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
        return $staff;
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
        $tmpName='upload_'.uniqid('', true).'.png';

        if (!is_null($request->file('picture'))) {
            $request->file('picture')->move('images/uploads', $tmpName);
            //$img = Image::make($request->file('picture'))->fit(121, 117)->save($tmpName);
            //$staff->picture = $img->encode('png');
            //$staff->picture = base64_encode(hex2bin($request->file('picture')));
            $img = file_get_contents('images/uploads/'.$tmpName);
            $staff->picture = $img;
            //\Storage::disk('local')->delete('images/uploads/'.$tmpName);
            \File::delete('images/uploads/'.$tmpName);
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
