@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @include('actors._table')
        </div>
    </div>
</div>
@stop