@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            <div class="panel-body">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('rental.rentals') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('rental.rental') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="">{!! $rentals->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($rentals as $rental)
                            <tr>
                                <td><a href="{{ action('RentalsController@show', $rental->rental_id) }}" title="" alt="">{{ $rental->rental_id}}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
            </div>
        </div>
    </div>
</div>
@stop