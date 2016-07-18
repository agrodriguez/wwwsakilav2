@extends('layouts.app')

@section('title', trans('store.stores'))

@section('content')
    <div class="container">
    @include('flash')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                <div class="panel-heading">{{ trans('store.stores') }}</div>
                <div class="panel-body">
                    <a class="btn btn-primary pull-left" href="{{ action('StoresController@create') }}" title="{{ trans('store.create') }}" alt="{{ trans('store.create') }}">{{ trans('store.create') }}</a>
                </div>
                    <table class="table table-hover table-bordered">
                        
                        <thead>
                            <tr>
                                <th class="text-center">{{ trans('store.store') }}</th>
                            </tr>
                        </thead>
                        @if($stores->links())
                        <tfoot><tr><td>{!! $stores->links() !!}</td></tr></tfoot>
                        @endif
                        <tbody> 
                            @foreach ($stores as $store)
                                <tr>
                                    <td><a href="{{ action('StoresController@show', $store->store_id) }}" title="" alt="">{{ $store->address->getCity() }}, {{ $store->address->getCountry() }}</a></td>
                                </tr>   
                            @endforeach 
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('div#flash_message').delay(2000).slideUp(300);
        });
    </script>
    
@endpush