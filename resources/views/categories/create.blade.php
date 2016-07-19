@extends('layouts.app')
@section('title', trans('category.create'))
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('category.category') }} <p class="lead"> {{ trans('category.create') }} </p></h2>

				{!! Form::open(['url'=>'categories','class'=>'form-horizontal']) !!}
		
					@include('categories._form',['submitButtonText' => trans('category.add')])

				{!! Form::close() !!}
		</div>	
	</div>
</div>
@stop