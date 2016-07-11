@extends('layouts.app')
@section('title', trans('rental.rental'))
@section('content')
@include('errors.list')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('rental.rental') }} <p class="lead">
                    {{ trans('rental.edit') }} 
                </p></h2>
                
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-7 col-md-offset-0">
            
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            
        </div>
    </div>
</div>
@stop