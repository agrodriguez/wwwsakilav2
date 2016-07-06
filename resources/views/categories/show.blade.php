@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12 col-md-offset-0">            
            <h3>{{ $category->name }}</h3>
            <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <caption>{{ trans('film.films') }} {{ $category->films->count() }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('film.title') }}</th>
                            <th class="text-center">{{ trans('film.description') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="2">{!! $films->links() !!}</td></tr></tfoot>
                    <tbody>                         

                        @foreach ($films as $film)
                            <tr>                                    
                                <td><a href="{{ action('FilmsController@show', $film->film_id) }}" title="" alt="">{{ $film->title }}</a></td>
                                <td>{{ $film->description }}</td>
                            </tr>   
                        @endforeach 
                        
                    </tbody>
                </table>                
            </div>
            </div>
        </div>
    </div>
</div>
@stop