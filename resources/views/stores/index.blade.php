@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            <div class="panel-body">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('store.stores') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('store.store') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $stores->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($stores as $store)
                            <tr>
                                <td><a href="{{ action('StoresController@show', $store->store_id) }}" title="" alt="">{{ $store->address->getCity() }}, {{ $store->address->getCountry() }}</a></td>
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