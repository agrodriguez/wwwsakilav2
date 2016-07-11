@extends('layouts.app')
@section('title', trans('language.language'))
@section('content')
<div class="container">   
@include('flash') 
    <div class="row">
        <div class="col-md-12 col-md-offset-0">                        
            <h2>{{ trans('language.language') }} <p class="lead">
               
                {{ trans('language.edit') }} 
                </p></h2>
            <form class="form-horizontal col-sm-offset-0">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label class="control-label" for="language">{{ trans('language.language') }}</label>
                        <input type="text" class="form-control" id="language" placeholder="{{ trans('language.language') }}" value="{{ $language->name }}" readonly="readonly">
                    </div>                    
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <a class="btn btn-primary pull-left" href="{{ action('LanguagesController@edit', $language->name) }}" title="{{ trans('language.edit') }}" alt="{{ trans('language.edit') }}">{{ trans('language.edit') }}</a>
                    </div>
                </div>
            </form>
            
            @include('films._shortTable', ['count'=> $language->films->count() ])
            
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