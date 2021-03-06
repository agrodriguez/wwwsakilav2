@extends('layouts.app')
@section('title', trans('customer.customer'))
@section('content')
@include('errors.list')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('customer.customer') }}
                    <p class="lead">
                        {{ trans('customer.edit') }} 
                    </p>
                </h2>
                <form class="form-horizontal col-sm-offset-0">
                   
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label" for="first_name">{{ trans('customer.first_name') }}</label>
                            <input type="text" class="form-control" id="first_name" placeholder="{{ trans('customer.first_name') }}" value="{{ $customer->{'first_name'} }}" readonly="readonlly">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="last_name">{{ trans('customer.last_name') }}</label>
                            <input type="text" class="form-control" id="last_name" placeholder="{{ trans('customer.last_name') }}" value="{{ $customer->{'last_name'} }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label" for="email">{{ trans('customer.email') }}</label>
                            <input type="text" class="form-control" id="email" placeholder="{{ trans('customer.email') }}" value="{{ $customer->{'email'} }}" readonly="readonly">    
                        </div>
                    
                        <div class="col-sm-1">
                            <label class="control-label" for="active">{{ trans('customer.active') }}</label>
                            <div class="col-sm-2">
                                <span class="glyphicon glyphicon-{{ $customer->{'active'}? 'ok': 'remove' }}" aria-hidden="true"></span>
                            </div>

                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="create_date">{{ trans('customer.create_date') }}</label>
                            <input type="text" class="form-control" id="create_date" placeholder="{{ trans('address.address') }}" value="{{ $customer->{'create_date'}->format('d/m/Y') }}" readonly="readonly">    
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label" for="address">{{ trans('address.address') }}</label>
                            <input type="text" class="form-control" id="address" placeholder="{{ trans('address.address') }}" value="{{ $customer->{'address'}->{'address'} }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label" for="address2">{{ trans('address.address2') }}</label>
                            <input type="text" class="form-control" id="address2" placeholder="{{ trans('address.address2') }}" value="{{ $customer->{'address'}->{'address2'} }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-3">
                            <label class="control-label" for="country_id">{{ trans('country.country') }}</label>
                            <input type="text" class="form-control" id="country_id" placeholder="{{ trans('country.country') }}" value="{{ $customer->{'address'}->{'countryName'} }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-3">
                            <label class="control-label" for="city_id">{{ trans('city.city') }}</label>
                            <input type="text" class="form-control" id="city_id" placeholder="{{ trans('city.city') }}" value="{{ $customer->{'address'}->{'cityName'} }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="district">{{ trans('address.district') }}</label>
                            <input type="text" class="form-control" id="district" placeholder="{{ trans('address.district') }}" value="{{ $customer->{'address'}->{'district'} }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-2">
                            <label class="control-label" for="postal_code">{{ trans('address.postal_code') }}</label>
                            <input type="text" class="form-control" id="postal_code" placeholder="{{ trans('address.postal_code') }}" value="{{ $customer->{'address'}->{'postal_code'} }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-2">
                            <label class="control-label" for="phone">{{ trans('address.phone') }}</label>
                            <input type="text" class="form-control" id="phone" placeholder="{{ trans('address.phone') }}" value="{{ $customer->{'address'}->{'phone'} }}" readonly="readonly">    
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-5">
                            <label class="control-label" for="map">{{ trans('address.location') }}</label>
                            <div class="" id="map_div" style=" height: 240px; border: 1px solid #d4d065;"></div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="store">{{ trans('store.store') }}</label>
                            <input type="text" class="form-control" id="store" placeholder="store" value="{{ $customer->{'store'}->{'storeName'} }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <a class="btn btn-primary pull-left" href="{{ action('CustomersController@edit', [$customer->{'slug'}, 'locale' => App::getLocale() ]) }}" title="{{ trans('customer.edit') }}" alt="{{ trans('customer.edit') }}">{{ trans('customer.edit') }}</a>
                        </div>
                    </div>
                    
                </form>
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('rental.rentals') }}
                </div>
                <div class="panel-body">
                    <div class="col-sm-3">
                        <label class="control-label" for="total">{{ trans('customer.balance') }}</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control text-right" id="total" placeholder="0.00" value="{{ number_format($customer->{'balance'},2) }}" readonly="readonly">    
                        </div>
                    </div>
                </div>                
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">{{ trans('film.film') }}</th>
                                <th class="text-center">{{ trans('rental.rental_date') }}</th>
                                <th class="text-center">{{ trans('rental.return_date') }}</th>                                
                            </tr>
                        </thead>
                        @if($rentals->links())
                        <tfoot><tr><td colspan="3">
                        
                        {!! $rentals->links() !!}
                        </td></tr></tfoot>
                        @endif
                @foreach( $rentals as $rental)
                        <tbody>
                            <tr>
                                <td>
                                <a href="{{ action('FilmsController@show',[ $rental->{'inventory'}->{'film'}->{'film_id'}, 'locale'=>App::getLocale() ]) }}" title="" alt="">{{ $rental->{'inventory'}->{'film'}->{'title'} }}</a></td>
                                <td>{{ $rental->{'rental_date'}->{'format'}('d/m/Y') }}</td>
                                
                                
                                    @if($rental->{'return_date'})
                                    <td>
                                        {{ $rental->{'return_date'}->{'format'}('d/m/Y') }}
                                    @else
                                    <td class="text-center">
                                        <a href="{{ url(\App::getLocale().'/rentals/'.$rental->{'rental_id'}) }}" title="{{ trans('rental.return') }}" alt="{{ trans('rental.return') }}" class="btn btn-primary btn-xs">{{ trans('rental.return') }}</a>
                                    @endif
                                </td>

                            </tr>
                        </tbody>
                @endforeach
                    </table>                    
            </div>
        </div>
    </div>    
</div>
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf55wT2Bn6Juy0yBok2tSuGU3nuNluTgw"></script>
<script type="text/javascript">    
    google.maps.event.addDomListener(window, 'load', function(){initShowMap("map_div",{{ $customer->{'address'}->{'location'} }})});
</script>
@endpush
@stop