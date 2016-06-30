@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('staff.staffs') }} <a href="{{ action('StaffsController@create') }}" title="{{ trans('staff.create') }}" alt="{{ trans('staff.create') }}"><span class="glyphicon glyphicon-plus-sign"></span></a></caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('staff.staff') }}</th>
                            <th class="text-center">{{ trans('address.address') }}</th>
                            <th class="text-center">{{ trans('staff.email') }}</th>
                            <th class="text-center">{{ trans('staff.active') }}</th>
                            <th class="text-center">{{ trans('store.store') }}</th>

                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="5">{!! $staffs->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($staffs as $staff)
                            <tr>
                                <td><a href="{{ action('StaffsController@show', $staff->staff_id) }}" title="" alt="">{{ $staff->getFullName()}}</a></td>
                                <td>{{ $staff->address->getCity() }}, {{ $staff->address->getCountry() }}</td>
                                <td>{{ $staff->email }}</td>
                                <td class="text-center"><span class="glyphicon glyphicon-{{ $staff->active? 'ok': 'remove' }}" aria-hidden="true"></span></td>
                                <td>{{ $staff->store->getStoreName() }}</td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop