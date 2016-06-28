@extends('layouts.app')
@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-6 col-md-offset-3">
	        	<h3>{{ $country->country }}</h3>
	            <div class="panel panel-default">

	                <table class="table table-hover table-bordered">
	                    <caption>{{ trans('city.cities') }}</caption>
	                    <thead>
	                        <tr>
	                            
	                            <th class="text-center">{{ trans('city.city') }}</th>
	                            
	                        </tr>
	                    </thead>
	                    <tfoot><tr><td>{!! $cities->links() !!}</td></tr></tfoot>
	                    <tbody> 
	                        @foreach ($cities as $city)
	                            <tr>                                    
	                                <td><a href="{{ action('CitiesController@show', $city->city_id) }}" title="" alt="">{{ $city->city }}</a></td>
                           
	                            </tr>   
	                        @endforeach 
	                    </tbody>
	                </table>                
	            </div>
	        </div>
	    </div>
	</div>
@stop