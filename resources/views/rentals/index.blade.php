@extends('layouts.app')
@section('title', trans('rental.rentals'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('rental.rentals') }}
            </div>
            <div class="panel-body">
                <a class="btn btn-primary pull-left" href="{{ action('RentalsController@create') }}" title="{{ trans('rental.create') }}" alt="{{ trans('rental.create') }}">{{ trans('rental.create') }}</a>
            </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">N° {{ trans('rental.rental') }}</th>
                            <th class="text-center">{{ trans('rental.rental_date') }}</th>
                            <th class="text-center">{{ trans('rental.return_date') }}</th>
                            <th class="text-center">{{ trans('film.film') }}</th>
                            <th class="text-center">{{ trans('customer.customer') }}</th>
                            <th class="text-center">{{ trans('staff.staff') }}</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="7">{!! $rentals->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($rentals as $rental)
                            <tr>
                                <td><a href="{{ action('RentalsController@show', $rental->{'rental_id'}) }}" title="" alt="">{{ $rental->{'rental_id'} }}</a></td>
                                <td>{{ $rental->{'rental_date'}->format('d-m-Y') }}</td>
                                <td>
                                @if ( $rental->{'return_date'})
                                {{ $rental->{'return_date'}->format('d-m-Y') }}
                                @endif
                                </td>                                
                                <td>{{ $rental->{'filmTitle'} }}</td>
                                <td>{{ $rental->{'customerName'} }}</td>
                                <td>{{ $rental->{'staffName'} }}</td>
                                <td class="text-right">$ {{ number_format($rental->{'total'},2) }}</td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop