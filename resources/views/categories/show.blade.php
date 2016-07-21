@extends('layouts.app')
@section('title', trans('category.category'))
@section('content')
<div class="container">   
@include('flash') 
    <div class="row">
        <div class="col-md-12 col-md-offset-0">            
            <h2>{{ trans('category.category') }} <p class="lead">
                <a href="{{ action('CategoriesController@edit', $category->{'name'}) }}" title="{{ trans('category.edit') }}" alt="{{ trans('category.edit') }}">
                {{ trans('category.edit') }} <span class="glyphicon glyphicon-pencil"></span></a>
                </p></h2>
            <form class="form-horizontal col-sm-offset-0">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="control-label" for="category">{{ trans('category.category') }}</label>
                        <input type="text" class="form-control" id="category" placeholder="{{ trans('category.category') }}" value="{{ $category->{'name'} }}" readonly="readonly">
                    </div>                    
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <a class="btn btn-primary pull-left" href="{{ action('CategoriesController@edit', $category->{'name'}) }}" title="{{ trans('category.edit') }}" alt="{{ trans('category.edit') }}">{{ trans('category.edit') }}</a>
                    </div>
                </div>
            </form>
            @include('films._shortTable', ['count'=> $category->films->count() ])            
        </div>
    </div>
</div>
@stop