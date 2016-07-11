@extends('layouts.app')
@section('title', trans('city.create'))
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('city.city') }} <p class="lead"> {{ trans('city.create') }} </p></h2>

				{!! Form::open(['url'=>'cities','class'=>'form-horizontal']) !!}
		
					@include('cities._form',['submitButtonText' => trans('city.add'), 'cid'=>$cid])

				{!! Form::close() !!}
		</div>	
	</div>
</div>


@stop