@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>{{ trans('country.countries') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('country.country') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $countries->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($countries as $country)
                            <tr>                                    
                                <td><a href="{{ action('CountriesController@show', $country->country_id) }}" title="" alt="">{{ $country->country }}</a></td>                                
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>
@stop