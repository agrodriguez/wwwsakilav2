@extends('layouts.app')
@section('title', trans('category.categories'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('categories._table',['show'=>'true'])
        </div>
    </div>
</div>
@stop