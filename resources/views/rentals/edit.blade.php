@extends('layouts.app')
@section('content')
	<h1>Model</h1>

	<hr/>
	{!! Form::model($<model>,['action'=>['<model>sController@update',$<model>-><model>_id],'method'=>'PATCH','class'=>'form-horizontal']) !!}
		
		@include('<model>._form',['submitButtonText' => 'Update <model>'])

	{!! Form::close() !!}

	@include('errors.list')

@stop