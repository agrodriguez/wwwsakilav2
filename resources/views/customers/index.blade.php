@extends('layouts.app')
@section('title', trans('customer.customers'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ trans('customer.customers') }}</b></div class="panel-heading">
                <div class="panel-body">
                        <a class="btn btn-primary pull-left" href="{{ action('CustomersController@create') }}" title="{{ trans('customer.create') }}" alt="{{ trans('customer.create') }}">{{ trans('customer.create') }}</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('customer.customer') }}</th>
                            <th class="text-center">{{ trans('address.address') }}</th>
                            <th class="text-center">{{ trans('customer.email') }}</th>
                            <th class="text-center">{{ trans('customer.active') }}</th>
                            <th class="text-center">{{ trans('customer.create_date') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="5">{!! $customers->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($customers as $customer)
                            <tr>
                                <td><a href="{{ action('CustomersController@show', $customer->{'slug'}) }}" title="" alt="">{{ $customer->{'fullName'} }}</a></td>
                                <td>{{ $customer->{'addressName'} }}</td>
                                <td>{{ $customer->{'email'} }}</td>
                                <td class="text-center"><span class="glyphicon glyphicon-{{ $customer->{'active'}? 'ok': 'remove' }}" aria-hidden="true"></span></td>
                                <td>{{ $customer->{'create_date'}->format('d-M-Y') }}</td>
                                
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop