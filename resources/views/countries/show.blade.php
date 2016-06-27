@extends('layouts.app')
@section('content')
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-6 col-md-offset-3">
	        	<h3>{{ $country->country }}</h3>
	            <div class="panel panel-default">

	                <table class="table table-hover table-bordered">
	                    <caption>Cities</caption>
	                    <thead>
	                        <tr>
	                            
	                            <th class="text-center">City</th>
	                            
	                        </tr>
	                    </thead>
	                    <tfoot><tr><td colspan="3"></td></tr></tfoot>
	                    <tbody> 
	                        @foreach ($country->cities as $city)
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