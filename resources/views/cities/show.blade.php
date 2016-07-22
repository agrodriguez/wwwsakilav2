@extends('layouts.app')
@section('title', trans('city.citiy'))
@section('content')	
	<div class="container">
@include('flash')

		<div class="row">
	        <div class="col-md-12 col-md-offset-0">
	        	<h2>{{ trans('city.city') }}
		        	<p class="lead">{{ trans('city.edit') }} </p>
	        	</h2>
            	<form class="form-horizontal col-sm-offset-0">
	                <div class="form-group">
	                    <div class="col-sm-6">
	                        <label class="control-label" for="city">{{ trans('city.city') }}</label>
	                        <input type="text" class="form-control" id="city" placeholder="{{ trans('city.city') }}" value="{{ $city->{'city'} }}" readonly="readonly">
	                    </div>
	                    <div class="col-sm-3">
	                        <label class="control-label" for="country_id">{{ trans('country.country') }}</label>
	                        <input type="text" class="form-control" id="country_id" placeholder="{{ trans('country_id.country_id') }}" value="{{ $city->{'countryName'} }}" readonly="readonly">
	                    </div>
	                </div>
	                <div class="form-group">
			            <div class="col-sm-12">
			                <a class="btn btn-primary pull-left" href="{{ action('CitiesController@edit', [$city->{'city'}, 'locale' => App::getLocale() ]) }}" title="{{ trans('city.edit') }}" alt="{{ trans('city.edit') }}">{{ trans('city.edit') }}</a>
			            </div>
			        </div>
                </form>
            </div>
         </div>	    
	</div>

@stop