@extends('layouts.app')
@section('content')	
	<div class="container">
@include('flash')

		<div class="row">
	        <div class="col-md-12 col-md-offset-0">
	        	<h2>{{ trans('city.city') }} <p class="lead">
            	<a href="{{ action('CountriesController@edit', $city->city_id) }}" title="Edit city" alt="Edit city">
            	{{ trans('city.edit') }} <span class="glyphicon glyphicon-pencil"></span></a>
            	</p></h2>
            	<form class="form-horizontal col-sm-offset-0">
	                <div class="form-group">
	                    <div class="col-sm-6">
	                        <label class="control-label" for="city">{{ trans('city.city') }}</label>
	                        <input type="text" class="form-control" id="city" placeholder="{{ trans('city.city') }}" value="{{ $city->city }}" readonly="readonly">
	                    </div>
	                    <div class="col-sm-3">
	                        <label class="control-label" for="country_id">{{ trans('country.country') }}</label>
	                        <input type="text" class="form-control" id="country_id" placeholder="{{ trans('country_id.country_id') }}" value="{{ $city->country->country }}" readonly="readonly">
	                    </div>
	                </div>
	                 <div class="form-group">
			            <div class="col-sm-12">
			                <a class="btn btn-primary pull-left" href="{{ action('CitiesController@edit', $city->city) }}" title="Edit city" alt="Edit city">{{ trans('city.edit') }}</a>
			            </div>
			        </div>
                </form>
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