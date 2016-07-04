@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-0">&nbsp;</div>    
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading"><h3 class="panel-title">Panel title</h3></div>
                        <div class="panel-body">
                            Panel content
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading"><h3 class="panel-title">Panel title</h3></div>
                        <div class="panel-body">
                            Panel content
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-md-offset-0">
                <div class="page-header">                
                    <h1>{{ trans('menu.home') }} <small>{{ $name }}</small></h1>
                </div>
                
                {!! trans('menu.text1') !!}
        </div>

    </div>

</div>
@stop