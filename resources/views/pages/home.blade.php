@extends('layouts.app')
@section('title', trans('menu.home'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-0">&nbsp;</div>    
    </div>
    <div class="row">
@if(!Auth::guest())
        <div class="col-md-3 col-md-offset-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading"><h3 class="panel-title">{{ trans('staff.staff') }} - {{ Auth::user()->fullName }}</h3></div>
                        <ul class="list-group">
                            
                            <li class="list-group-item">{{ trans('rental.rentals') }}<span class="badge">{{  Auth::user()->rentals->count() }}</span></li>
                            <li class="list-group-item">{{ trans('rental.rentals') }}<span class="badge">$ {{  number_format(Auth::user()->rentals->sum('total'),2) }}</span></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading"><h3 class="panel-title">{{ trans('store.store') }} - {{ Auth::user()->store->storeName }}</h3></div>
                        <ul class="list-group">
                            <li class="list-group-item">{{ trans('film.films') }}<span class="badge">{{ Auth::user()->store->films->count() }}</span></li>
                            <li class="list-group-item">{{ trans('inventory.inventories') }}<span class="badge">{{  Auth::user()->store->inventories->count() }}</span></li>
                            <li class="list-group-item">{{ trans('customer.customers') }}<span class="badge">{{ Auth::user()->store->customers->count() }}</span></li>
                            <li class="list-group-item">{{ trans('rental.rentals') }}<span class="badge">{{  Auth::user()->store->rentals->count() }}</span></li>
                            <li class="list-group-item">{{ trans('rental.rentals') }}<span class="badge">$ {{  number_format(Auth::user()->store->rentals->sum('total'),2) }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading"><h3 class="panel-title">Total</h3></div>                        
                        <ul class="list-group">
                            <li class="list-group-item">{{ trans('film.films') }}<span class="badge">{{ $films->count() }}</span></li>
                            <li class="list-group-item">{{ trans('inventory.inventories') }}<span class="badge">{{ $inventories->count() }}</span></li>
                            <li class="list-group-item">{{ trans('customer.customers') }}<span class="badge">{{ $customers->count() }}</span></li>
                            <li class="list-group-item">{{ trans('rental.rentals') }}<span class="badge">{{ $rentals->count() }}</span></li>
                            <li class="list-group-item">{{ trans('rental.rentals') }}<span class="badge">$ {{  number_format($rentals->sum('total'),2) }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endif
        <div class="col-md-9 col-md-offset-0">
                <div class="page-header">                
                    <h1>{{ trans('menu.home') }} <small>{{ $name }}</small></h1>
                </div>                
                {!! trans('menu.text1') !!}
        </div>

    </div>

</div>
@stop