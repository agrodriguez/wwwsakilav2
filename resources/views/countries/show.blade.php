@extends('layouts.app')
@section('title', trans('country.country'))
@section('content')	
	<div class="container">
@include('flash')
	    <div class="row">
	        <div class="col-md-12 col-md-offset-0">
	        	<h2>{{ trans('country.country') }}
	        		<p class="lead">{{ trans('country.edit') }}</p>
	        	</h2>
            	<form class="form-horizontal col-sm-offset-0">
	                <div class="form-group">
	                    <div class="col-sm-6">
	                        <label class="control-label" for="country">{{ trans('country.country') }}</label>
	                        <input type="text" class="form-control" id="country" placeholder="{{ trans('country.country') }}" value="{{ $country->{'country'} }}" readonly="readonly">
	                    </div>
	                </div>
	                <div class="form-group">
			            <div class="col-sm-12">
			                <a class="btn btn-primary pull-left" href="{{ action('CountriesController@edit', [$country->{'country'}, 'locale' => App::getLocale() ]) }}" title="{{ trans('country.edit') }}" alt="{{ trans('country.edit') }}">{{ trans('country.edit') }}</a>
			            </div>
			        </div>
                </form>
            </div>
        </div>
        <hr>    
    	<div class="row">
    		<div class="col-md-6 col-md-offset-0">
	            <div class="panel panel-default">
	            	<div class="panel-heading">{{ trans('city.cities') }}</div>
	            	<div class="panel-body"><a class="btn btn-primary pull-left" href="{{ action('CitiesController@create', ['cid'=>$country->{'country_id'}, 'locale' => App::getLocale() ]) }}" title="{{ trans('city.create') }}" alt="{{ trans('city.create') }}">{{ trans('city.create') }}</a></div>
	                <table class="table table-hover table-bordered">	                    
	                    <thead>
	                        <tr>
	                            <th class="text-center">{{ trans('city.city') }}</th>
	                        </tr>
	                    </thead>
	                    @if($cities->links())
	                    <tfoot><tr><td>{!! $cities->links() !!}</td></tr></tfoot>
	                    @endif
	                    <tbody> 
	                        @foreach ($cities as $city)
	                            <tr>                                    
	                                <td><a href="{{ action('CitiesController@show', [$city->{'city'}, 'locale' => App::getLocale() ]) }}" title="" alt="">{{ $city->{'city'} }}</a></td>
	                            </tr>   
	                        @endforeach 
	                    </tbody>
	                </table>                
	        	</div>
	        </div>
	    </div>
	</div>
@stop
