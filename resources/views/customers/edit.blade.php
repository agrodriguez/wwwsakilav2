@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('customer.customer') }} <p class="lead"> {{ trans('customer.edit') }} </p></h2>
				
				{!! Form::model($customer,['action'=>['CustomersController@update',$customer->customer_id],'method'=>'PATCH','class'=>'form-horizontal']) !!}

					@include('customers._form',['submitButtonText' => trans('customer.update'), 'cid'=>$customer->address->city->country_id, 'ccid'=>$customer->address->city_id,'loc'=>$customer->address->location])

				{!! Form::close() !!}
		</div>	
	</div>
	@include('errors.list')
</div>

@stop