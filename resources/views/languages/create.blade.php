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
                <h2>{{ trans('language.language') }} <p class="lead"> {{ trans('language.create') }} </p></h2>

				{!! Form::open(['url'=>'languages','class'=>'form-horizontal']) !!}
		
					@include('languages._form',['submitButtonText' => trans('language.add')])

				{!! Form::close() !!}
		</div>	
	</div>
</div>


@stop