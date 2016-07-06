        <div class="form-group">
            <div class="col-sm-6">
            	{!! Form::label('country',trans('country.country'),['class'=>'control-label']) !!}
                {!! Form::text('country',null,['class'=>'form-control','placeholder'=>trans('country.country')]) !!}
                <small class="text-danger">{{ $errors->first('country') }}</small>
            </div>            
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-left']) !!}
            </div>
        </div>  