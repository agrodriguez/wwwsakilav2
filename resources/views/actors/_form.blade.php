        <div class="form-group">
            <div class="col-sm-3">
            	{!! Form::label('first_name',trans('actor.first_name'),['class'=>'control-label']) !!}
                {!! Form::text('first_name',null,['class'=>'form-control','placeholder'=>trans('actor.first_name')]) !!}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
            </div>            
       
            <div class="col-sm-3">
                {!! Form::label('last_name',trans('actor.last_name'),['class'=>'control-label']) !!}
                {!! Form::text('last_name',null,['class'=>'form-control','placeholder'=>trans('actor.last_name')]) !!}
                <small class="text-danger">{{ $errors->first('last_name') }}</small>
            </div>            
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-left']) !!}
            </div>
        </div>  