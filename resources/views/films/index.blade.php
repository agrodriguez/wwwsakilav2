@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('film.films') }} <a href="{{ action('FilmsController@create') }}" title="{{ trans('film.create') }}" alt="{{ trans('film.create') }}"><span class="glyphicon glyphicon-plus-sign"></span></a></caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('film.title') }}</th>
                            <th class="text-center">{{ trans('film.description') }}</th>
                            <th class="text-center">{{ trans('film.release_year') }}</th>
                            <th class="text-center">{{ trans('film.language') }}</th>
                            <th class="text-center">{{ trans('film.length') }}</th>
                            <th class="text-center">{{ trans('film.rating') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="6">{!! $films->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($films as $film)
                            <tr>
                                <td><a href="{{ action('FilmsController@show', $film->film_id) }}" title="" alt="">{{ $film->title}}</a></td>
                                <td>{{ $film->description }}</td>
                                <td class="text-right">{{ $film->release_year }}</td>
                                <td>{{ $film->language->name }}</td>
                                <td class="text-right">{{ $film->length }}</td>
                                <td>{{ $film->rating }}</td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop