@extends('layouts.app')
@section('title', trans('country.countries'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><b>{{ trans('country.countries') }} </b></div class="panel-heading">   
                <div class="panel-body"><a class="btn btn-primary pull-left" href="{{ action('CountriesController@create') }}" title="{{ trans('country.create') }}" alt="{{ trans('country.create') }}">{{ trans('country.create') }}</a></div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('country.country') }}</th>
                            <th class="text-center">{{ trans('city.cities') }}</th>
                        </tr>
                    </thead>
                    <tfoot><tr><td colspan="2">{!! $countries->links() !!}</td></tr></tfoot>
                    <tbody> 
                        @foreach ($countries as $country)
                            <tr>                                    
                                <td><a href="{{ action('CountriesController@show', $country->country) }}" title="" alt="">{{ $country->country }}</a></td>
                                <td class="text-right">{{ $country->cities->count() }}</td>                                
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