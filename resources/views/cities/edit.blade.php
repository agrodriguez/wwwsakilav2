@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('city.city') }} <p class="lead"> {{ trans('city.edit') }} </p></h2>

				{!! Form::model($city,['action'=>['CitiesController@update',$city->city_id],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('cities._form',['submitButtonText' => trans('city.update'), 'cid'=>$city->country_id])

				{!! Form::close() !!}
		</div>	
	</div>
</div>
@stop