@extends('layouts.app')
@section('title', trans('customer.create'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('customer.customer') }} <p class="lead"> {{ trans('customer.create') }} </p></h2>

				{!! Form::open(['url'=>App::getLocale().'/customers','class'=>'form-horizontal']) !!}
		
					@include('customers._form',['submitButtonText' => trans('customer.add'), 'cid'=>null, 'ccid'=>null, 'loc'=>'0,0', 'cd' => \Carbon\Carbon::now()->format('d/m/Y')])

				{!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@stop