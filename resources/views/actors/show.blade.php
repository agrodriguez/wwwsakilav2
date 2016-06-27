@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <h3>{{ $actor->first_name }}, {{ $actor->last_name }}</h3>
            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>{{ trans('film.films')}}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('film.title') }}</th>
                            <th class="text-center">{{ trans('film.description') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="3"></td></tr></tfoot>
                    <tbody> 
                        @foreach ($actor->films as $film)
                            <tr>                                    
                                <td><a href="{{ action('FilmsController@show', $film->film_id) }}" title="" alt="">{{ $film->title }}</a></td>
                                <td><a href="{{ action('FilmsController@show', $film->film_id) }}" title="" alt="">{{ $film->description }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>
@stop