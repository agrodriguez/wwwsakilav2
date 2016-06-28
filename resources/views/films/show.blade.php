@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <h2>{{ trans('film.film') }} <p class="lead"></p></h2>
                <form class="form-horizontal col-sm-offset-0">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="CompanyName">{{ trans('film.title') }}</label>
                            <input type="text" class="form-control" id="CompanyName" placeholder="{{ trans('film.title') }}" value="{{ $film->title }}" readonly="readonlly">
                        </div>
                        <div class="col-sm-4">
                            <label for="ContactName">{{ trans('film.language') }}</label>
                            <input type="text" class="form-control" id="ContactName" placeholder="{{ trans('film.language') }}" value="{{ $film->language->name }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label for="ContactTitle">{{ trans('film.release_year') }}</label>
                            <input type="text" class="form-control" id="ContactTitle" placeholder="{{ trans('film.release_year') }}" value="{{ $film->release_year }}" readonly="readonly">    
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                            <label for="Address">{{ trans('film.description') }}</label>
                            <input type="text" class="form-control" id="Address" placeholder="{{ trans('film.description') }}" value="{{ $film->description }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="City">{{ trans('film.original_language') }}</label>
                            <input type="text" class="form-control" id="City" placeholder="{{ trans('film.original_language') }}" value="{{ $film->originalLanguage->name }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label for="Region">{{ trans('film.rental_duration') }}</label>
                            <input type="text" class="form-control" id="Region" placeholder="{{ trans('film.rental_duration') }}" value="{{ $film->rental_duration }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label for="PostalCode">{{ trans('film.rental_rate') }}</label>
                            <input type="text" class="form-control" id="PostalCode" placeholder="{{ trans('film.rental_rate') }}" value="{{ $film->rental_rate }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label for="Country">{{ trans('film.replacement_cost') }}</label>
                            <input type="text" class="form-control" id="Country" placeholder="{{ trans('film.replacement_cost') }}" value="{{ $film->replacement_cost }}" readonly="readonly">    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Phone">{{ trans('film.rating') }}</label>
                            <input type="text" class="form-control" id="Phone" placeholder="{{ trans('film.rating') }}" value="{{ $film->rating }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label for="Fax">{{ trans('film.length') }}</label>
                            <input type="text" class="form-control" id="Fax" placeholder="{{ trans('film.length') }}" value="{{ $film->length }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label for="Fax">{{ trans('film.special_features') }}</label>
                            <input type="text" class="form-control" id="Fax" placeholder="{{ trans('film.special_features') }}" value="@if(count($film->special_features)) {{ implode(', ', $film->special_features) }} @endif" readonly="readonly">    
                        </div>
                    </div> 
                    
                </form>
            
        </div>
        
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>{{ trans('actor.actors') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('actor.first_name') }}</th>                            
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $actors->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($actors as $actor)
                            <tr>                                    
                                <td><a href="{{ action('ActorsController@show', $actor->actor_id) }}" title="" alt="">{{ $actor->getFullName() }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>            
        </div>
        <div class="col-md-3 col-md-offset-0">
            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>{{ trans('category.categories') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('category.name') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td>{!! $categories->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ action('CategoriesController@show', $category->category_id) }}" title="" alt="">{{ $category->name}}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop