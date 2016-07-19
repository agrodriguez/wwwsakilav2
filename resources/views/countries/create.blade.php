@extends('layouts.app')
@section('title', trans('country.create'))
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('country.country') }} <p class="lead"> {{ trans('country.create') }} </p></h2>

				{!! Form::open(['url'=>'countries','class'=>'form-horizontal']) !!}
		
					@include('countries._form',['submitButtonText' => trans('country.add'), 'cid'=>null])

				{!! Form::close() !!}
		</div>	
	</div>
</div>
@stop