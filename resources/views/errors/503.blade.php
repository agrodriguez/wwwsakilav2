@extends('layouts.app')
@section('content')
@include('flash')
@include('errors.list')
        <div class="container">
            <div class="content">
                <div class="title">{{ trans('messages.db_error') }}</div>
            	<div class="alert alert-danger">
            		<p>{{ trans('messages.nodelete') }}</p>
            		<p>Error {{ $myError->getCode() }}</p>
            	</div>
                
                <div>{{-- $myError->getMessage() --}}</div>
                                                
            </div>
        </div>
@endsection

