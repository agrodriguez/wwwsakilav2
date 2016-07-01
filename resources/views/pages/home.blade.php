@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="title">Laravel 5</div>

    <h1>{{ trans('menu.home') }} {{ $name }}</h1>

    {!! trans('menu.text1') !!}

  </div>
</div>

@stop