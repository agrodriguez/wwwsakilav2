@extends('layouts.app')
@section('title', trans('category.categories'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            @include('categories._table',['show'=>'true'])
        </div>
    </div>
</div>
@stop