@extends('layouts.app')
@section('title', trans('actor.create'))
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <h2>{{ trans('actor.actor') }} <p class="lead"> {{ trans('actor.create') }} </p></h2>

				{!! Form::open(['url'=>'actors','class'=>'form-horizontal']) !!}
		
					@include('actors._form',['submitButtonText' => trans('actor.add')])

				{!! Form::close() !!}
		</div>	
	</div>
</div>
@stop