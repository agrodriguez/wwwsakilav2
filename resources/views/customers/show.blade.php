@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('customer.customer') }} <p class="lead">
                    <a href="{{ action('CustomersController@edit', $customer->customer_id) }}" title="Edit customer" alt="Edit customer">{{ trans('customer.edit') }} <span class="glyphicon glyphicon-pencil"></span></a>
                </p></h2>
                <form class="form-horizontal col-sm-offset-0">
                   
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label" for="first_name">{{ trans('customer.first_name') }}</label>
                            <input type="text" class="form-control" id="first_name" placeholder="{{ trans('customer.first_name') }}" value="{{ $customer->first_name }}" readonly="readonlly">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="last_name">{{ trans('customer.last_name') }}</label>
                            <input type="text" class="form-control" id="last_name" placeholder="{{ trans('customer.last_name') }}" value="{{ $customer->last_name }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label" for="email">{{ trans('customer.email') }}</label>
                            <input type="text" class="form-control" id="email" placeholder="{{ trans('customer.email') }}" value="{{ $customer->email }}" readonly="readonly">    
                        </div>
                    
                        <div class="col-sm-2">
                            <label class="control-label" for="active">{{ trans('customer.active') }}</label>
                            <p>
                            <span class="glyphicon glyphicon-{{ $customer->active? 'ok': 'remove' }}" aria-hidden="true"></span>
                            </p>

                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="create_date">{{ trans('customer.create_date') }}</label>
                            <input type="text" class="form-control" id="create_date" placeholder="{{ trans('address.address') }}" value="{{ $customer->create_date->format('d/m/Y') }}" readonly="readonly">    
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label" for="address">{{ trans('address.address') }}</label>
                            <input type="text" class="form-control" id="address" placeholder="{{ trans('address.address') }}" value="{{ $customer->address->address }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label" for="address2">{{ trans('address.address2') }}</label>
                            <input type="text" class="form-control" id="address2" placeholder="{{ trans('address.address2') }}" value="{{ $customer->address->address2 }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-3">
                            <label class="control-label" for="country_id">{{ trans('country.country') }}</label>
                            <input type="text" class="form-control" id="country_id" placeholder="{{ trans('country.country') }}" value="{{ $customer->address->getCountry() }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-3">
                            <label class="control-label" for="city_id">{{ trans('city.city') }}</label>
                            <input type="text" class="form-control" id="city_id" placeholder="{{ trans('city.city') }}" value="{{ $customer->address->getCity() }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="district">{{ trans('address.district') }}</label>
                            <input type="text" class="form-control" id="district" placeholder="{{ trans('address.district') }}" value="{{ $customer->address->district }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-2">
                            <label class="control-label" for="postal_code">{{ trans('address.postal_code') }}</label>
                            <input type="text" class="form-control" id="postal_code" placeholder="{{ trans('address.postal_code') }}" value="{{ $customer->address->postal_code }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-2">
                            <label class="control-label" for="phone">{{ trans('address.phone') }}</label>
                            <input type="text" class="form-control" id="phone" placeholder="{{ trans('address.phone') }}" value="{{ $customer->address->phone }}" readonly="readonly">    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label" for="store">{{ trans('store.store') }}</label>
                            <input type="text" class="form-control" id="store" placeholder="store" value="{{ $customer->store->getStoreName() }}" readonly="readonly">    
                        </div>
                    </div>
                    
                </form>
            
        </div>
        <div class="col-md-7 col-md-offset-0">
            
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            
        </div>
    </div>
</div>
@stop