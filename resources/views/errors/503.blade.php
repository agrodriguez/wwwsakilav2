@extends('layouts.app')
@section('content')
        <div class="container">
        
    
            <div class="content">
                <div class="title">{{ trans('messages.db_error') }}</div>

                <div>Error {{ $myError->getCode() }}</div>
                <div>{{-- $myError->getMessage() --}}</div>
                                                
            </div>
        </div>
@endsection

