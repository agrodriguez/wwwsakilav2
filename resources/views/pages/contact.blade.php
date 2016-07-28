@extends('layouts.app')
@section('title', trans('menu.contact'))
@section('content')
<div class="container">
@include('flash')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('menu.contact') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/'.App::getLocale().'/contact') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">{{ trans('staff.email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" placeholder="email" name="email" value="@if (!Auth::guest()) {{ Auth::user()->email }} @endif">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">{{ trans('staff.first_name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="name" placeholder="Name" class="form-control" name="name" value="@if (!Auth::guest()) {{ Auth::user()->fullname }} @endif">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-3 control-label">{{ trans('film.description') }}</label>

                            <div class="col-md-8">
                                <textarea class="form-control" placeholder="Descripcion" name="message" cols="30" rows="5" id="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>      

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-send-o"></i> {{ trans('menu.contact') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('errors.list')
@stop