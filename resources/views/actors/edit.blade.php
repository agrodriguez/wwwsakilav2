@extends('layouts.app')
@section('title', trans('actor.edit'))
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

				{!! Form::model($actor,['action'=>['ActorsController@update',$actor->slug],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('actors._form',['submitButtonText' => trans('actor.update')])

				{!! Form::close() !!}

				<h2><p class="lead"> {{ trans('actor.delete') }} </p></h2>
                {!! Form::model($actor,['action'=>['ActorsController@destroy',$actor->slug],'method'=>'DELETE','class'=>'form-horizontal', 'id' => 'delete_form']) !!}
				<div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('actor.delete') ,['class'=>'btn btn-primary', 'id' => 'delete_button']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('actor.delete'), 'name' => trans('actor.actor')])
@stop