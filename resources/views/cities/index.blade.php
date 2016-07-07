@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            
                <div class="panel-heading"><b>{{ trans('city.cities') }} <a href="{{ action('CitiesController@create') }}" title="{{ trans('city.create') }}" alt="{{ trans('city.create') }}"><span class="glyphicon glyphicon-plus-sign"></span></a></b></div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('country.country') }}</th>
                            <th class="text-center">{{ trans('city.city') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="3">{!! $cities->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($cities as $city)
                            <tr>
                                <td><a href="{{ action('CountriesController@show', $city->country->country) }}" title="" alt="">{{ $city->country->country }}</a></td>
                                <td><a href="{{ action('CitiesController@show', $city->city) }}" title="" alt="">{{ $city->city }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>                
            
            </div>
        </div>
    </div>
</div>
@stop