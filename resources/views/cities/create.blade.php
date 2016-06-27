@extends('layouts.app')
@section('content')
	<h1>MODEL</h1>

	<hr/>

	{!! Form::open(['url'=>'<model>','class'=>'form-horizontal']) !!}
		
		@include('<model>._form',['submitButtonText' => 'Add <model>'])

	{!! Form::close() !!}

	@include('errors.list')	
@stop