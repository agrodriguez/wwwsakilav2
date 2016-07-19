@extends('layouts.app')
@section('title', trans('actor.actor'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>{{ trans('actor.actor') }}
                <p class="lead">{{ trans('actor.edit') }}</p>
            </h2>
            <form class="form-horizontal col-sm-offset-0">
                <div class="form-group">
                    <div class="col-sm-3">
                        <label class="control-label" for="actor">{{ trans('actor.first_name') }}</label>
                        <input type="text" class="form-control" id="actor" placeholder="{{ trans('actor.first_name') }}" value="{{ $actor->first_name }}" readonly="readonly">
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label" for="actor">{{ trans('actor.last_name') }}</label>
                        <input type="text" class="form-control" id="actor" placeholder="{{ trans('actor.last_name') }}" value="{{ $actor->last_name }}" readonly="readonly">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-sm-12">
                        <a class="btn btn-primary pull-left" href="{{ action('ActorsController@edit', $actor->slug) }}" title="{{ trans('actor.edit') }}" alt="{{ trans('actor.edit') }}">{{ trans('actor.edit') }}</a>
                    </div>
                </div>
            </form>
            @include('films._shortTable', ['count'=> $actor->films->count() ])            
        </div>
    </div>
</div>
@stop