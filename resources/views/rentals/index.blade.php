@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
            	<table class="table table-hover table-bordered">
                    <caption>{{ trans('') }}</caption>
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="">{!! $->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($ as $)
                            <tr>
                                <td><a href="{{ action('Controller@show', $->_id) }}" title="" alt="">{{ $->}}</a></td>
                            </tr>   
                        @endforeach 
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@stop