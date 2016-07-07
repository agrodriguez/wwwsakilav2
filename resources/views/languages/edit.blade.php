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
                <h2>{{ trans('language.language') }} <p class="lead"> {{ trans('language.edit') }} </p></h2>

				{!! Form::model($language,['action'=>['LanguagesController@update',$language->name],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('languages._form',['submitButtonText' => trans('language.update')])

				{!! Form::close() !!}

				<div class="col-sm-6">
                {!! Form::model($language,['action'=>['LanguagesController@destroy',$language->name],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                        {!! Form::submit(trans('language.delete') ,['class'=>'btn btn-primary pull-right']) !!}           
                {!! Form::close() !!}
                </div>
		</div>	
	</div>
</div>
@stop