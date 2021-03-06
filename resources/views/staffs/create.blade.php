@extends('layouts.app')
@section('title', trans('staff.create'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('staff.staff') }} <p class="lead"> {{ trans('staff.create') }} </p></h2>

				{!! Form::open(['url'=>App::getLocale().'/staffs','class'=>'form-horizontal']) !!}
		
					@include('staffs._form',['submitButtonText' => trans('staff.add'), 'cid'=>null, 'ccid'=>null, 'loc'=>'0,0','picture'=>null, 'sto'=>$sto])

				{!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@stop