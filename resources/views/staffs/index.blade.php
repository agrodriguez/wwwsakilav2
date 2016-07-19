@extends('layouts.app')
@section('title', trans('staff.staffs'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('staff.staffs') }} </div class="panel-heading">
                <div class="panel-body">
                        <a class="btn btn-primary pull-left" href="{{ action('StaffsController@create') }}" title="{{ trans('staff.create') }}" alt="{{ trans('staff.create') }}">{{ trans('staff.create') }}</a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('staff.staff') }}</th>
                            <th class="text-center">{{ trans('address.address') }}</th>
                            <th class="text-center">{{ trans('staff.email') }}</th>
                            <th class="text-center">{{ trans('staff.active') }}</th>
                            <th class="text-center">{{ trans('store.store') }}</th>

                        </tr>
                    </thead>
                    @if($staffs->links())
                    <tfoot><tr><td colspan="5">{!! $staffs->links() !!}</td></tr></tfoot>
                    @endif 
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
</div>
@stop