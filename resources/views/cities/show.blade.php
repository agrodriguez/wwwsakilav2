@extends('layouts.app')
@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-6 col-md-offset-3">
	        	<h3>{{ $city->city }}</h3>
	            <p>{{$city->country->country}}</p>
	        </div>
	    </div>
	</div>
@stop