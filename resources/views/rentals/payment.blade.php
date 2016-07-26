@extends('layouts.app')
@section('title', trans('rental.rental'))
@section('content')
@include('errors.list')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <h2>{{ trans('rental.rental') }}
                <p class="lead">{{ trans('payment.payment') }}</p>
            </h2>

            <form class="form-horizontal col-sm-offset-0">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label class="control-label" for="rental_date">{{ trans('rental.rental_date') }}</label>
                        <input type="text" class="form-control" id="rental_date" placeholder="{{ trans('rental.rental_date') }}" value="{{ $rental->{'rental_date'}->format('d/m/Y') }}" readonly="readonly">
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="return_date">{{ trans('rental.return_date') }}</label>
                        <input type="text" class="form-control" id="return_date" placeholder="{{ trans('rental.return_date') }}" value="@if($rental->{'return_date'}) {{ $rental->{'return_date'}->format('d/m/Y') }} @endif" readonly="readonly">
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="customer_id">{{ trans('customer.customer') }}</label>
                        <input type="text" class="form-control" id="customer_id" placeholder="{{ trans('customer.customer') }}" value="{{ $rental->{'customerName'} }}" readonly="readonly">
                    </div>

                    <div class="col-sm-4">
                        <label class="control-label" for="staff_id">{{ trans('staff.staff') }}</label>
                        <input type="text" class="form-control" id="staff_id" placeholder="{{ trans('staff.staff') }}" value="{{ $rental->{'staffName'} }}" readonly="readonly">
                    </div>                   
                </div>
                <div class="form-group">                    

                    <div class="col-sm-4">
                        <label class="control-label" for="film">{{ trans('film.film') }}</label>
                        <input type="text" class="form-control" id="film" placeholder="{{ trans('film.film') }}" value="{{ $rental->{'filmTitle'} }}" readonly="readonly">
                    </div>

                    <div class="col-sm-2">
                        <label class="control-label" for="inventory_id">{{ trans('inventory.inventory') }}</label>
                        <input type="text" class="form-control" id="inventory_id" placeholder="{{ trans('inventory.inventory') }}" value="{{ $rental->{'inventory_id'} }}" readonly="readonly">
                    </div>  
                
                    
                </div>
            </form> 

	
			{!! Form::open(['class'=>'form-horizontal']) !!}
				{!! Form::hidden('store_id',Auth::user()->store_id ,['id'=>'store_id']) !!}
				{!! Form::hidden('staff_id',Auth::user()->staff_id ,['id'=>'staff_id']) !!}
				{!! Form::hidden('inventory_id',$rental->{'inventory_id'} ,['id'=>'inventory_id']) !!}
				<div class="form-group">
                    

                    <div class="col-sm-2">
                    	{!! Form::label('aount',trans('payment.amount'),['class'=>'control-label']) !!}                        
                        
                        

                        <div class="input-group">
							<div class="input-group-addon">$</div>
							
							{!! Form::text('amount',$amount[0]->amount,['class'=>'form-control','id'=>'amount']) !!}
						</div>
						<small class="text-danger">{{ $errors->first('amount') }}</small>
                        
                    </div>

                </div>
                <div class="form-group">
                	<div class="col-sm-offset-0 col-sm-12">
						{!! Form::submit( trans('payment.pay') ,['class'=>'btn btn-primary']) !!}			
					</div>
                </div>
            {!! Form::close() !!}
			
		</div>
    </div>
</div>
@stop




