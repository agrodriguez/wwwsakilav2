@extends('layouts.app')
@section('content')	
	<div class="container">
@include('flash')
	    <div class="row">
	        <div class="col-md-12 col-md-offset-0">
	        	<h2>{{ trans('country.country') }} <p class="lead">
            	<a href="{{ action('CountriesController@edit', $country->country_id) }}" title="Edit Country" alt="Edit Country">
            	{{ trans('country.edit') }} <span class="glyphicon glyphicon-pencil"></span></a>
            	</p></h2>
            	<form class="form-horizontal col-sm-offset-0">
	                <div class="form-group">
	                    <div class="col-sm-6">
	                        <label class="control-label" for="country">{{ trans('country.country') }}</label>
	                        <input type="text" class="form-control" id="country" placeholder="{{ trans('country.country') }}" value="{{ $country->country }}" readonly="readonly">
	                    </div>
	                </div>
	                 <div class="form-group">
			            <div class="col-sm-12">
			                <a class="btn btn-primary pull-left" href="{{ action('CountriesController@edit', $country->country_id) }}" title="Edit Country" alt="Edit Country">{{ trans('country.edit') }}</a>
			            </div>
			        </div>
                </form>
            </div>
         </div>
        <hr>    
    	<div class="row">
    		<div class="col-md-6 col-md-offset-3">
	            <div class="panel panel-default">
	            	<div class="panel-heading">{{ trans('city.cities') }}</div>
	                <table class="table table-hover table-bordered">	                    
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
	</div>
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('div#flash_message').delay(2000).slideUp(300);
    });
</script>
@endsection
@stop

