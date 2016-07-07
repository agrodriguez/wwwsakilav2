@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <h2>{{ trans('actor.actor') }} <p class="lead"> {{ trans('actor.edit') }} </p></h2>

				{!! Form::model($actor,['action'=>['ActorsController@update',$actor->getSlug()],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('actors._form',['submitButtonText' => trans('actor.update')])

				{!! Form::close() !!}

				<div class="col-sm-6">
                {!! Form::model($actor,['action'=>['ActorsController@destroy',$actor->getSlug()],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                        {!! Form::submit(trans('actor.delete') ,['class'=>'btn btn-primary pull-right']) !!}           
                {!! Form::close() !!}
                </div>
		</div>	
	</div>
</div>
@stop