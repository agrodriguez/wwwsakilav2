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
                <h2>{{ trans('country.country') }} <p class="lead"> {{ trans('country.edit') }} </p></h2>

				{!! Form::model($country,['action'=>['CountriesController@update',$country->country],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('countries._form',['submitButtonText' => trans('country.update')])

				{!! Form::close() !!}
				<div class="col-sm-6">
                {!! Form::model($country,['action'=>['CountriesController@destroy',$country->country],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                        {!! Form::submit(trans('country.delete') ,['class'=>'btn btn-primary pull-right']) !!}           
                {!! Form::close() !!}
                </div>
		</div>	
	</div>
</div>
@stop