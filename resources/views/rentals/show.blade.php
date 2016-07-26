@extends('layouts.app')
@section('title', trans('rental.rental'))
@section('content')
@include('errors.list')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <h2>{{ trans('rental.rental') }}
                <p class="lead">{{ trans('rental.edit') }}</p>
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
                </div>
            </form>            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ trans('payment.payments') }}</b></div>
                
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('payment.payment') }}</th>
                            <th class="text-center">{{ trans('payment.amount') }}</th>
                            <th class="text-center">{{ trans('payment.payment_date') }}</th>
                            <th class="text-center">{{ trans('customer.customer') }}</th>
                            <th class="text-center">{{ trans('staff.staff') }}</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($rental->payments as $payment)
                            <tr>
                                <td>
                                    {{ $payment->{'payment_id'} }}
                                </td>
                                <td>
                                    ${{ $payment->{'amount'} }}
                                </td>
                                <td>
                                    {{ $payment->{'payment_date'}->format('d/m/Y')}}
                                </td>
                                <td>
                                    {{ $payment->{'customerName'} }}
                                </td>
                                <td>
                                    {{ $payment->{'staffName'} }}
                                </td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>            
        </div>
    </div>    
</div>
@stop