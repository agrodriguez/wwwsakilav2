@extends('layouts.app')
@section('title', trans('staff.edit'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('staff.staff') }} <p class="lead"> {{ trans('staff.edit') }} </p></h2>

				{!! Form::model($staff,['action'=>['StaffsController@update',$staff->slug],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0','files'=>true]) !!}
						
						@include('staffs._form',['submitButtonText' => trans('staff.update'), 'year' => $staff->release_year, 'cid'=>$staff->address->city->country_id, 'ccid'=>$staff->address->city_id, 'loc'=>$staff->address->location, 'picture'=>$staff->picture, 'sto' => null])

				{!! Form::close() !!}
				<h2><p class="lead"> {{ trans('staff.delete') }} </p></h2>
				{!! Form::model($staff,['action'=>['StaffsController@destroy',$staff->slug],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                <div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('staff.delete') ,['class'=>'btn btn-primary']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('staff.delete'), 'name' => trans('staff.staff')])
@stop