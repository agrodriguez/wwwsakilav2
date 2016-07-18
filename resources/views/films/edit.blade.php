@extends('layouts.app')
@section('title', trans('film.edit'))
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			@include('errors.list')
		</div>
	</div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
                <h2>{{ trans('film.film') }} <p class="lead"> {{ trans('film.edit') }} </p></h2>

				{!! Form::model($film,['action'=>['FilmsController@update',$film->film_id],'method'=>'PATCH','class'=>'form-horizontal col-sm-offset-0']) !!}
						
						@include('films._form',['submitButtonText' => trans('film.update'), 'year' => $film->release_year])

				{!! Form::close() !!}
				<h2><p class="lead"> {{ trans('film.delete') }} </p></h2>
				{!! Form::model($film,['action'=>['FilmsController@destroy',$film->film_id],'method'=>'DELETE','class'=>'form-horizontal']) !!}
                <div class="form-group">
				<div class="col-sm-6">
                        {!! Form::submit(trans('film.delete') ,['class'=>'btn btn-primary']) !!}           
                </div>
                </div>
                {!! Form::close() !!}
		</div>	
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>       
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        //$('#myModal').modal('show')
    });
    $('#myModal').on('hidden.bs.modal', function (e) {
        ;//alert(e);
    })
</script>
@endpush

@stop