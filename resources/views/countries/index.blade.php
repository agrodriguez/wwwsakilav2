@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ trans('country.countries') }} <a href="{{ action('CountriesController@create') }}" title="{{ trans('country.create') }}" alt="{{ trans('country.create') }}"><span class="glyphicon glyphicon-plus-sign"></span></a></b></div class="panel-heading">            
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('country.country') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $countries->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($countries as $country)
                            <tr>                                    
                                <td><a href="{{ action('CountriesController@show', $country->country) }}" title="" alt="">{{ $country->country }}</a></td>                                
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>
@stop