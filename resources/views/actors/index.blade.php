@extends('layouts.app')
@section('title', trans('actor.actors'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            @include('actors._table', ['show'=>'true'])
        </div>
    </div>
</div>
@stop