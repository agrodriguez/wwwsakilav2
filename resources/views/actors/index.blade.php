@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>Actors</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('actor.f_name') }}</th>
                            <th class="text-center">{{ trans('actor.l_name') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="3">{!! $actors->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($actors as $actor)
                            <tr>                                    
                                <td><a href="{{ action('ActorsController@show', $actor->actor_id) }}" title="" alt="">{{ $actor->first_name }}</a></td><td><a href="{{ action('ActorsController@show', $actor->actor_id) }}" title="" alt="">{{ $actor->last_name }}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
</div>
@stop