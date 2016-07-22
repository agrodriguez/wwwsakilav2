@extends('layouts.app')
@section('title', trans('store.create'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('store.store') }} <p class="lead"> {{ trans('store.create') }} </p></h2>

				{!! Form::open(['url'=>App::getLocale().'/stores','class'=>'form-horizontal']) !!}
		
					@include('stores._form',['submitButtonText' => trans('store.add'), 'cid'=>null, 'ccid'=>null, 'loc'=>'0,0','manager'=>null])

				{!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@stop