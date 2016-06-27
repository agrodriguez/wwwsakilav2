@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>Countries</caption>
                    <thead>
                        <tr>
                            <th class="text-center">Country</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="3">{!! $countries->links() !!}</td></tr></tfoot>
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