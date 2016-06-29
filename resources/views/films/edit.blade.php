@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('film.film') }} <p class="lead"> {{ trans('film.edit') }} </p></h2>

				{!! Form::model($film,['action'=>['FilmsController@update',$film->film_id],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('films._form',['submitButtonText' => trans('film.update'), 'year' => $film->release_year])

				{!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>

@stop