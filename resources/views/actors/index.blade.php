@extends('layouts.app')
@section('title', trans('actor.actors'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @include('actors._table', ['show'=>'true'])
        </div>
    </div>
</div>
@stop