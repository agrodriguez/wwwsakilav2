@extends('layouts.app')
@section('title', trans('city.edit'))
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

				{!! Form::model($city,['action'=>['CitiesController@update',$city->{'city'}],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('cities._form',['submitButtonText' => trans('city.update'), 'cid'=>$city->{'country_id'}])

				{!! Form::close() !!}
				<h2><p class="lead"> {{ trans('city.delete') }} </p></h2>
		        {!! Form::model($city,['action'=>['CitiesController@destroy',$city->{'city'}],'method'=>'DELETE','class'=>'form-horizontal', 'id' => 'delete_form']) !!}
				<div class="form-group">
					<div class="col-sm-6">
		                        {!! Form::submit(trans('city.delete') ,['class'=>'btn btn-primary', 'id' => 'delete_button']) !!}           
		            </div>
		        </div>
				{!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('city.delete'), 'name' => trans('city.city')])
@stop