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
                <h2>{{ trans('category.category') }} <p class="lead"> {{ trans('category.edit') }} </p></h2>

				{!! Form::model($category,['action'=>['CategoriesController@update',$category->name],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('categories._form',['submitButtonText' => trans('category.update')])

				{!! Form::close() !!}

				<div class="col-sm-6">
                {!! Form::model($category,['action'=>['CategoriesController@destroy',$category->name],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                        {!! Form::submit(trans('category.delete') ,['class'=>'btn btn-primary pull-right']) !!}           
                {!! Form::close() !!}
                </div>
		</div>	
	</div>
</div>
@stop