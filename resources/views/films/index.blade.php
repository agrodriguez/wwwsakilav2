@extends('layouts.app')
@section('title', trans('film.films'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        @include('films._table')
        </div>
    </div>
</div>
@stop