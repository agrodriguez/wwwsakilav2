@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<h1>{{ trans('menu.about') }}</h1>

		{!! trans('menu.text') !!}	
	</div>
</div>

@stop