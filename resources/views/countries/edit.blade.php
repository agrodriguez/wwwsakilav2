@extends('layouts.app')
@section('title', trans('country.edit'))
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

				{!! Form::model($country,['action'=>['CountriesController@update',$country->{'country'}, 'locale' => App::getLocale() ],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('countries._form',['submitButtonText' => trans('country.update')])

				{!! Form::close() !!}
				<h2><p class="lead"> {{ trans('country.delete') }} </p></h2>
                {!! Form::model($country,['action'=>['CountriesController@destroy',$country->{'country'}, 'locale' => App::getLocale() ],'method'=>'DELETE','class'=>'form-horizontal', 'id' => 'delete_form']) !!}

                <div class="form-group">
            		<div class="col-sm-12">
                        {!! Form::submit(trans('country.delete') ,['class'=>'btn btn-primary', 'id' => 'delete_button']) !!}           
                     </div>
                </div>
                {!! Form::close() !!}
                </div>
		</div>	
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('country.delete'), 'name' => trans('country.country')])
@stop