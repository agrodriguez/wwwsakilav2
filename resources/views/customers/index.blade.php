@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('customer.customers') }}</caption>
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
                                <td><a href="{{ action('CustomersController@show', $customer->customer_id) }}" title="" alt="">{{ $customer->getFullName() }}</a></td>
                                <td>{{ $customer->address->getCity() }}, {{ $customer->address->getCountry() }}</td>
                                <td>{{ $customer->email }}</td>
                                <td class="text-center"><span class="glyphicon glyphicon-{{ $customer->active? 'ok': 'remove' }}" aria-hidden="true"></span></td>
                                <td>{{ $customer->create_date->format('d-M-Y') }}</td>
                                
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop