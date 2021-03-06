@extends('layouts.app')
@section('title', trans('language.edit'))
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

				{!! Form::model($language,['action'=>['LanguagesController@update',$language->{'name'}, 'locale' => App::getLocale() ],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('languages._form',['submitButtonText' => trans('language.update')])

				{!! Form::close() !!}

				<h2><p class="lead"> {{ trans('language.delete') }} </p></h2>
                {!! Form::model($language,['action'=>['LanguagesController@destroy',$language->{'name'}, 'locale' => App::getLocale() ],'method'=>'DELETE','class'=>'form-horizontal', 'id' => 'delete_form']) !!}
                <div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('language.delete') ,['class'=>'btn btn-primary', 'id' => 'delete_button']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('language.delete'), 'name' => trans('language.language')])
@stop