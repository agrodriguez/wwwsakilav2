@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ trans('language.languages') }} <a href="{{ action('LanguagesController@create') }}" title="{{ trans('language.create') }}" alt="{{ trans('language.create') }}"><span class="glyphicon glyphicon-plus-sign"></span></a></b></div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('language.language') }}</th>
                            <th class="text-center">{{ trans('film.films') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="2">{!! $languages->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($languages as $language)
                            <tr>
                                <td><a href="{{ action('LanguagesController@show', $language->name) }}" title="" alt="">{{ $language->name}}</a></td>
                                <td class="text-right">{{ $language->films->count() }}</td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>             
            </div>
        </div>
    </div>
</div>
@stop