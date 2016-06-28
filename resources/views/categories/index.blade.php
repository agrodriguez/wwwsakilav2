@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('category.categories') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('category.name') }}</th>
                            <th class="text-center">{{ trans('film.films') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="2">{!! $categories->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($categories as $category)
                            <tr>
                                <td><a href="{{ action('CategoriesController@show', $category->category_id) }}" title="" alt="">{{ $category->name}}</a></td>
                                <td class="text-right">{{ $category->films->count() }}</td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop