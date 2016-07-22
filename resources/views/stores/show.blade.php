@extends('layouts.app')
@section('title', trans('store.stores'))
@section('content')
    @include('errors.list')
    <div class="container">
        @include('flash')
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                    <h2>{{ trans('store.store') }}
                    	<p class="lead">
                        	{{ trans('store.edit') }}
                        </p>
                    </h2>
                    <form class="form-horizontal col-sm-offset-0">                    
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="address">{{ trans('address.address') }}</label>
                                <input type="text" class="form-control" id="address" placeholder="{{ trans('address.address') }}" value="{{ $store->{'address'}->{'address'} }}" readonly="readonly">    
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="address2">{{ trans('address.address2') }}</label>
                                <input type="text" class="form-control" id="address2" placeholder="{{ trans('address.address2') }}" value="{{ $store->{'address'}->{'address2'} }}" readonly="readonly">    
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-2">
                                <label class="control-label" for="country_id">{{ trans('country.country') }}</label>
                                <input type="text" class="form-control" id="country_id" placeholder="{{ trans('country.country') }}" value="{{ $store->{'address'}->{'countryName'} }}" readonly="readonly">    
                            </div>

                            <div class="col-sm-2">
                                <label class="control-label" for="city_id">{{ trans('city.city') }}</label>
                                <input type="text" class="form-control" id="city_id" placeholder="{{ trans('city.city') }}" value="{{ $store->{'address'}->{'cityName'} }}" readonly="readonly">    
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label" for="district">{{ trans('address.district') }}</label>
                                <input type="text" class="form-control" id="district" placeholder="{{ trans('address.district') }}" value="{{ $store->{'address'}->{'district'} }}" readonly="readonly">    
                            </div>

                            <div class="col-sm-2">
                                <label class="control-label" for="postal_code">{{ trans('address.postal_code') }}</label>
                                <input type="text" class="form-control" id="postal_code" placeholder="{{ trans('address.postal_code') }}" value="{{ $store->{'address'}->{'postal_code'} }}" readonly="readonly">    
                            </div>

                            <div class="col-sm-2">
                                <label class="control-label" for="phone">{{ trans('address.phone') }}</label>
                                <input type="text" class="form-control" id="phone" placeholder="{{ trans('address.phone') }}" value="{{ $store->{'address'}->{'phone'} }}" readonly="readonly">    
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label class="control-label" for="map">{{ trans('address.location') }}</label>
                                <div class="" id="map_div" style=" height: 240px; border: 1px solid #d4d065;"></div>
                            </div>                        
                            <div class="col-sm-2">
                                <label class="control-label" for="manager_staff_id">{{ trans('store.manager_staff_id') }}</label>
                                <input type="text" class="form-control" id="manager_staff_id" placeholder="{{ trans('store.manager_staff_id') }}" value="{{ $store->{'managerName'} }}" readonly="readonly">    
                            </div>
                        </div>

                        <div class="form-group">
    	                    <div class="col-sm-12">
    	                        <a class="btn btn-primary pull-left" href="{{ action('StoresController@edit', [$store->{'store_id'}, 'locale' => App::getLocale() ]) }}" title="{{ trans('store.edit') }}" alt="{{ trans('store.edit') }}">{{ trans('store.edit') }}</a>
    	                    </div>
    	                </div>                        
                    </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('staff.staffs') }}</div>
                    <div class="panel-body"><a class="btn btn-primary pull-left" href="{{ action('StaffsController@create', ['sto'=>$store->{'store_id'}, 'locale' => App::getLocale() ]) }}" title="{{ trans('staff.create') }}" alt="{{ trans('staff.create') }}">{{ trans('staff.create') }}</a></div>
                    <table class="table table-hover table-bordered">                        
                        <thead>
                            <tr>
                                <th class="text-center">{{ trans('staff.staff') }}</th>
                                <th class="text-center">{{ trans('store.manager_staff_id') }}</th>
                            </tr>
                        </thead>
                        <tfoot><tr><td colspan="2"></td></tr></tfoot>
                        <tbody> 
                            @foreach ($store->staffs as $staff)
                                <tr>                                    
                                    <td><a href="{{ action('StaffsController@show',[ $staff->{'slug'}, 'locale' => App::getLocale() ]) }}" title="" alt="">{{ $staff->{'fullName'} }}</a></td>
                                    <td class="text-center"><span class="glyphicon glyphicon-{{ $staff{'manages'}? 'ok': 'remove' }}" aria-hidden="true"></span></td>
                                </tr>   
                            @endforeach 
                        </tbody>
                    </table>                
                </div>
            </div>            
        </div>
    </div>
    
@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf55wT2Bn6Juy0yBok2tSuGU3nuNluTgw"></script>
<script type="text/javascript">    
    google.maps.event.addDomListener(window, 'load', function(){initShowMap("map_div",{{ $store->{'address'}->{'location'} }})});
</script>
@endpush