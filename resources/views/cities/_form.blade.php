        <div class="form-group">
            <div class="col-sm-6">
            	{!! Form::label('city',trans('city.city'),['class'=>'control-label']) !!}
                {!! Form::text('city',null,['class'=>'form-control','placeholder'=>trans('city.city')]) !!}
                <small class="text-danger">{{ $errors->first('city') }}</small>
            </div>            
            <div class="col-sm-3">
                {!! Form::label('country_id',trans('country.country'),['class'=>'control-label']) !!}
                {!! Form::select('country_id',$countries,$cid, ['class'=>'form-control','id'=>'country_id']) !!}
                <small class="text-danger">{{ $errors->first('country_id') }}</small>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-left']) !!}
            </div>
        </div>  
   