        <div class="form-group">
            <div class="col-sm-6">
            	{!! Form::label('name',trans('language.name'),['class'=>'control-label']) !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>trans('language.name')]) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>            
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-left']) !!}
            </div>
        </div>  