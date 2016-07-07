@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
        @include('films._table')
        </div>
    </div>
</div>
@stop