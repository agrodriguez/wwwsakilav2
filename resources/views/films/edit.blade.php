@extends('layouts.app')
@section('title', trans('film.edit'))
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('film.film') }} <p class="lead"> {{ trans('film.edit') }} </p></h2>

				{!! Form::model($film,['action'=>['FilmsController@update',$film->film_id],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('films._form',['submitButtonText' => trans('film.update'), 'year' => $film->release_year])

				{!! Form::close() !!}
				<h2><p class="lead"> {{ trans('film.delete') }} </p></h2>
				{!! Form::model($film,['action'=>['FilmsController@destroy',$film->film_id],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                <div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('film.delete') ,['class'=>'btn btn-primary']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
</div>
@stop