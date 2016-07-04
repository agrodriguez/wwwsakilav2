@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('staff.staff') }} <p class="lead"> {{ trans('staff.edit') }} </p></h2>

				{!! Form::model($staff,['action'=>['StaffsController@update',$staff->staff_id],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0','files'=>true]) !!}
						
						@include('staffs._form',['submitButtonText' => trans('staff.update'), 'year' => $staff->release_year, 'cid'=>$staff->address->city->country_id, 'ccid'=>$staff->address->city_id, 'loc'=>$staff->address->location, 'picture'=>$staff->picture])

				{!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@stop