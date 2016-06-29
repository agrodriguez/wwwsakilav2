@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('film.film') }} <p class="lead">
                <a href="{{ action('FilmsController@edit', $film->film_id) }}" title="Edit Film" alt="Edit Film">
                {{ trans('film.edit') }} <span class="glyphicon glyphicon-pencil"></span></a>
                </p></h2>
                <form class="form-horizontal col-sm-offset-0">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label" for="title">{{ trans('film.title') }}</label>
                            <input type="text" class="form-control" id="title" placeholder="{{ trans('film.title') }}" value="{{ $film->title }}" readonly="readonly">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="release_year">{{ trans('film.release_year') }}</label>
                            <input type="text" class="form-control" id="release_year" placeholder="{{ trans('film.release_year') }}" value="{{ $film->release_year }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="length">{{ trans('film.length') }}</label>
                            <div class="input-group">
                                <div class="input-group-addon">{{ trans('labels.mins') }}</div>
                                <input type="text" class="form-control" id="length" placeholder="{{ trans('film.length') }}" value="{{ $film->length }}" readonly="readonly">    
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="rating">{{ trans('film.rating') }}</label>
                            <input type="text" class="form-control" id="rating" placeholder="{{ trans('film.rating') }}" value="{{ $film->rating }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label" for="description">{{ trans('film.description') }}</label>
                            <textarea type="textarea" class="form-control" id="description" placeholder="{{ trans('film.description') }}" value="{{ $film->description }}" readonly="readonly">{{ $film->description }}</textarea>    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label" for="language">{{ trans('film.language') }}</label>
                            <input type="text" class="form-control" id="language" placeholder="{{ trans('film.language') }}" value="{{ $film->language->name }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="original_language">{{ trans('film.original_language') }}</label>
                            <input type="text" class="form-control" id="original_language" placeholder="{{ trans('film.original_language') }}" value="{{ $film->originalLanguage->name }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="rental_duration">{{ trans('film.rental_duration') }}</label>
                            <div class="input-group">
                                <div class="input-group-addon">{{ trans('labels.days') }}</div>
                                <input type="text" class="form-control" id="rental_duration" placeholder="{{ trans('film.rental_duration') }}" value="{{ $film->rental_duration }}" readonly="readonly">    
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="rental_rate">{{ trans('film.rental_rate') }}</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="text" class="form-control" id="rental_rate" placeholder="{{ trans('film.rental_rate') }}" value="{{ $film->rental_rate }}" readonly="readonly">    
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="replacement_cost">{{ trans('film.replacement_cost') }}</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="text" class="form-control" id="replacement_cost" placeholder="{{ trans('film.replacement_cost') }}" value="{{ $film->replacement_cost }}" readonly="readonly">    
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="control-label" for="special_features">{{ trans('film.special_features') }}</label>
                            <input type="text" class="form-control" id="special_features" placeholder="{{ trans('film.special_features') }}" value="@if(count($film->special_features)) {{ implode(', ', $film->special_features) }} @endif" readonly="readonly">    
                        </div>
                    </div> 
                </form>
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-md-3 col-md-offset-0">
            @include('actors._table')
        </div>
        <div class="col-md-3 col-md-offset-0">
            @include('categories._table')
        </div>
        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <p>{{ trans('inventory.inventory') }}</p>
            </div>
        </div>
    </div>
</div>
@stop