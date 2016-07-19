@extends('layouts.app')
@section('title', trans('store.edit'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('store.store') }} <p class="lead"> {{ trans('store.edit') }} </p></h2>

				{!! Form::model($store,['action'=>['StoresController@update',$store->store_id],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0','files'=>true]) !!}
						
						@include('stores._form',['submitButtonText' => trans('store.update'), 'year' => $store->release_year, 'cid'=>$store->address->city->country_id, 'ccid'=>$store->address->city_id, 'loc'=>$store->address->location, 'manager'=>$store->manager_staff_id])

				{!! Form::close() !!}

				<h2><p class="lead"> {{ trans('store.delete') }} </p></h2>
                {!! Form::model($store,['action'=>['StoresController@destroy',$store->store_id],'method'=>'DELETE','class'=>'form-horizontal', 'id' => 'delete_form']) !!}
                <div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('store.delete') ,['class'=>'btn btn-primary', 'id' => 'delete_button']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('store.delete'), 'name' => trans('store.store')])
@stop