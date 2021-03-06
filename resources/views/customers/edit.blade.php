@extends('layouts.app')
@section('title', trans('customer.edit'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('customer.customer') }} <p class="lead"> {{ trans('customer.edit') }} </p></h2>
				
				{!! Form::model($customer,['action'=>['CustomersController@update',$customer->{'slug'}, 'locale' => App::getLocale() ],'method'=>'PATCH','class'=>'form-horizontal']) !!}

					@include('customers._form',['submitButtonText' => trans('customer.update'), 'cid'=>$customer->{'address'}->{'city'}->{'country_id'}, 'ccid'=>$customer->{'address'}->{'city_id'},'loc'=>$customer->{'address'}->{'location'}, 'cd' => $customer->{'create_date'}->format('d/m/Y')])

				{!! Form::close() !!}

				<h2><p class="lead"> {{ trans('customer.delete') }} </p></h2>
				{!! Form::model($customer,['action'=>['CustomersController@destroy', $customer->{'slug'}, 'locale' => App::getLocale() ], 'method'=>'DELETE', 'class'=>'form-horizontal', 'id' => 'delete_form']) !!}
                <div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('customer.delete') ,['class'=>'btn btn-primary', 'id' => 'delete_button']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>
@include('confirm', ['title' => trans('customer.delete'), 'name' => trans('customer.customer')])
@stop