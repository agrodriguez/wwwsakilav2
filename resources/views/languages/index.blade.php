@extends('layouts.app')
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ trans('language.languages') }} </b></div>
                <div class="panel-body"><a class="btn btn-primary pull-left" href="{{ action('LanguagesController@create') }}" title="{{ trans('language.create') }}" alt="{{ trans('language.create') }}">{{ trans('language.create') }}</a></div>         
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('language.language') }}</th>
                            
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="2">{!! $languages->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($languages as $language)
                            <tr>
                                <td><a href="{{ action('LanguagesController@show', $language->name) }}" title="" alt="">{{ $language->name}}</a></td>
                                
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>             
            </div>
        </div>
    </div>
</div>
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('div#flash_message').delay(2000).slideUp(300);
    });
</script>
@endsection
@stop