@extends('layouts.app')
@section('title', trans('category.edit'))
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('category.category') }} <p class="lead"> {{ trans('category.edit') }} </p></h2>

				{!! Form::model($category,['action'=>['CategoriesController@update',$category->name],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('categories._form',['submitButtonText' => trans('category.update')])

				{!! Form::close() !!}
				<h2><p class="lead"> {{ trans('category.delete') }} </p></h2>
                {!! Form::model($category,['action'=>['CategoriesController@destroy',$category->name],'method'=>'DELETE','class'=>'form-horizontal', 'id' => 'delete_form']) !!}
				<div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('category.delete') ,['class'=>'btn btn-primary', 'id' => 'delete_button']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('category.delete'), 'name' => trans('category.category')])
@stop