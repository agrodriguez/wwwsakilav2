@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('language.languages') }}</caption>
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
                                <td><a href="{{ action('LanguagesController@show', $language->language_id) }}" title="" alt="">{{ $language->name}}</a></td>
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