@extends('layouts.app')
@section('title', trans('staff.staff'))
@section('content')
@include('errors.list')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('staff.staff') }} <p class="lead">
                    {{ trans('staff.edit') }} 
                </p></h2>
                <form class="form-horizontal col-sm-offset-0">
                    <div class="form-group">
                        <div class="col-sm-4">                            
                            <label class="control-label" for="picture">{{ trans('staff.picture') }}</label>
                            <div>
                                <img width="121" height="117" src="data:image/png;base64,{!! base64_encode($staff->picture) !!}" alt="Picture" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label" for="first_name">{{ trans('staff.first_name') }}</label>
                            <input type="text" class="form-control" id="first_name" placeholder="{{ trans('staff.first_name') }}" value="{{ $staff->first_name }}" readonly="readonlly">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="last_name">{{ trans('staff.last_name') }}</label>
                            <input type="text" class="form-control" id="last_name" placeholder="{{ trans('staff.last_name') }}" value="{{ $staff->last_name }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-5">
                            <label class="control-label" for="email">{{ trans('staff.email') }}</label>
                            <input type="text" class="form-control" id="email" placeholder="{{ trans('staff.email') }}" value="{{ $staff->email }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-1">
                            <label class="control-label" for="active">{{ trans('staff.active') }}</label>
                            <div class="col-sm-2">
                                <span class="glyphicon glyphicon-{{ $staff->active? 'ok': 'remove' }}" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label" for="username">{{ trans('staff.username') }}</label>
                            <input type="text" class="form-control" id="username" placeholder="{{ trans('staff.username') }}" value="{{ $staff->username }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="password">{{ trans('staff.password') }}</label>
                            <input type="password" class="form-control" id="password" placeholder="{{ trans('staff.password') }}" value="{{ $staff->password }}" readonly="readonly">    
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label" for="address">{{ trans('address.address') }}</label>
                            <input type="text" class="form-control" id="address" placeholder="{{ trans('address.address') }}" value="{{ $staff->address->address }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label" for="address2">{{ trans('address.address2') }}</label>
                            <input type="text" class="form-control" id="address2" placeholder="{{ trans('address.address2') }}" value="{{ $staff->address->address2 }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-2">
                            <label class="control-label" for="country_id">{{ trans('country.country') }}</label>
                            <input type="text" class="form-control" id="country_id" placeholder="{{ trans('country.country') }}" value="{{ $staff->address->getCountry() }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-2">
                            <label class="control-label" for="city_id">{{ trans('city.city') }}</label>
                            <input type="text" class="form-control" id="city_id" placeholder="{{ trans('city.city') }}" value="{{ $staff->address->getCity() }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="district">{{ trans('address.district') }}</label>
                            <input type="text" class="form-control" id="district" placeholder="{{ trans('address.district') }}" value="{{ $staff->address->district }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-2">
                            <label class="control-label" for="postal_code">{{ trans('address.postal_code') }}</label>
                            <input type="text" class="form-control" id="postal_code" placeholder="{{ trans('address.postal_code') }}" value="{{ $staff->address->postal_code }}" readonly="readonly">    
                        </div>

                        <div class="col-sm-2">
                            <label class="control-label" for="phone">{{ trans('address.phone') }}</label>
                            <input type="text" class="form-control" id="phone" placeholder="{{ trans('address.phone') }}" value="{{ $staff->address->phone }}" readonly="readonly">    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-5">
                            <label class="control-label" for="map">{{ trans('address.location') }}</label>
                            <div class="" id="map_div" style=" height: 240px; border: 1px solid #d4d065;"></div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="store">{{ trans('store.store') }}</label>
                            <input type="text" class="form-control" id="store" placeholder="store" value="{{ $staff->store->getStoreName() }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <a class="btn btn-primary pull-left" href="{{ action('StaffsController@edit', $staff->staff_id) }}" title="{{ trans('staff.edit') }}" alt="{{ trans('staff.edit') }}">{{ trans('staff.edit') }}</a>
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
@section('footer')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf55wT2Bn6Juy0yBok2tSuGU3nuNluTgw&callback=initMap">
    </script>
    <script type="text/javascript">

        var map;
        function initMap() {

            var latlng = new google.maps.LatLng({{ $staff->address->location }});


            map = new google.maps.Map(document.getElementById('map_div'), {
                center: latlng,
                zoom: 5
            });

            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: false,
            });

        }

        $(document).ready(function(){
            $('div#flash_message').delay(2000).slideUp(300);
        });


        </script>
@endsection
@stop