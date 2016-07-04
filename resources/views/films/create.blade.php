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
                <h2>{{ trans('film.film') }} <p class="lead"> {{ trans('film.create') }} </p></h2>

				{!! Form::open(['url'=>'films','class'=>'form-horizontal']) !!}
		
					@include('films._form',['submitButtonText' => trans('film.add'), 'year' => '2016'])

				{!! Form::close() !!}
		</div>	
	</div>
</div>


@stop