@extends('layouts.app')
@section('title', trans('city.cities'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
            
                <div class="panel-heading"><b>{{ trans('city.cities') }}</b></div>
                <div class="panel-body"><a class="btn btn-primary pull-left" href="{{ action('CitiesController@create', [ 'locale'=>App::getLocale() ]) }}" title="{{ trans('city.create') }}" alt="{{ trans('city.create') }}">{{ trans('city.create') }}</a></div> 
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
                                <td><a href="{{ action('CountriesController@show', [$city->{'countryName'}, 'locale'=>App::getLocale() ]) }}" title="" alt="">{{ $city->{'countryName'} }}</a></td>
                                <td><a href="{{ action('CitiesController@show', [$city->{'city'}, 'locale'=>App::getLocale() ]) }}" title="" alt="">{{ $city->{'city'} }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>                
            
            </div>
        </div>
    </div>
</div>
@stop