@extends('layouts.app')
@section('content')
@include('errors.list')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <h2>{{ trans('rental.rental') }}
                <p class="lead">{{ trans('rental.edit') }}</p>
            </h2>
            {!! Form::open(['url'=>\App::getLocale().'/rentals','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    

                    <div class="col-sm-2">
                    	{!! Form::label('rental_date',trans('rental.rental_date'),['class'=>'control-label']) !!}                        
                        
                        {!! Form::date('rental_date', \Carbon\Carbon::now()->format('d/m/Y'), ['class'=>'form-control','id'=>'rental_date', 'readonly'=>'readonly' ]) !!}
						<small class="text-danger">{{ $errors->first('rental_date') }}</small>
                        
                    </div>

                    <div class="col-sm-2">
                    	{!! Form::label('return_date',trans('rental.return_date'),['class'=>'control-label']) !!}                        
                        
                        {!! Form::date('return_date', null, ['class'=>'form-control','id'=>'return_date', 'placeholder'=>trans('rental.return_date'), 'readonly'=>'readonly' ]) !!}
						<small class="text-danger">{{ $errors->first('return_date') }}</small>
                        
                    </div>

                    <div class="col-sm-4">
                    	{!! Form::label('customer_id',trans('customer.customer'),['class'=>'control-label']) !!}                        
                        
                        {!! Form::select('customer_id',$customers,null, ['class'=>'form-control','id'=>'customer_id' ]) !!}
						<small class="text-danger">{{ $errors->first('customer_id') }}</small>
                        
                    </div>

                    <div class="col-sm-4">
                    	{!! Form::label('staff',trans('staff.staff'),['class'=>'control-label']) !!}                        
                        
                        {!! Form::date('staff', Auth::user()->fullName, ['class'=>'form-control','id'=>'staff', 'placeholder'=>trans('staff.staff'), 'readonly'=>'readonly' ]) !!}
						<small class="text-danger">{{ $errors->first('staff') }}</small>
                        
                    </div>
                    
                </div>
                <div class="form-group">                    
                	<div class="col-sm-4">
                		{!! Form::label('film_id','Film:',['class'=>'control-label']) !!}
						{!! Form::select('film_id',$films,null, ['class'=>'form-control','id'=>'film_id']) !!}
						<small class="text-danger">{{ $errors->first('film_id') }}</small>
                    </div>

					<div class="col-sm-2">
                    	{!! Form::label('inventory_id','Inventory:',['class'=>'control-label']) !!}
						{!! Form::select('inventory_id',[],null, ['class'=>'form-control', 'id'=>'inventory_id']) !!}
						<small class="text-danger">{{ $errors->first('inventory_id') }}</small>
					</div>
					{!! Form::hidden('store_id',Auth::user()->store_id ,['id'=>'store_id']) !!}
					{!! Form::hidden('staff_id',Auth::user()->staff_id ,['id'=>'staff_id']) !!}
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						{!! Form::submit('Add rental',['class'=>'btn btn-primary']) !!}			
					</div>
                    {{-- 
                
                    <div class="col-sm-2">
                        <label class="control-label" for="total">Total</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control text-right" id="total" placeholder="0.00" value="{{ number_format($rental->{'total'},2) }}" readonly="readonly">    
                        </div>
                    </div>      
                    <div class="col-sm-2">
                        <label class="control-label" for="total">{{ trans('customer.balance') }}</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control text-right" id="total" placeholder="0.00" value="{{ number_format($rental->{'customer'}->{'balance'},2) }}" readonly="readonly">    
                        </div>
                    </div>
                     --}}      
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
		@push('scripts')
			<script type="text/javascript">
				$(document).ready(function(){
					loadRentalSelect();
				});			  
			</script>
		@endpush

@stop