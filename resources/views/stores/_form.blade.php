        
        <div class="form-group">
            <div class="col-sm-6">
                {!! Form::label('address',trans('address.address'),['class'=>'control-label']) !!}
                {!! Form::text('address[address]',null,['class'=>'form-control','placeholder'=>trans('address.address')]) !!}
                <small class="text-danger">{{ $errors->first('address') }}</small>
            </div>
            <div class="col-sm-6">
                {!! Form::label('address2',trans('address.address2'),['class'=>'control-label']) !!}
                {!! Form::text('address[address2]',null,['class'=>'form-control','placeholder'=>trans('address.address2')]) !!}
                <small class="text-danger">{{ $errors->first('address2') }}</small>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                {!! Form::label('country_id',trans('country.country'),['class'=>'control-label']) !!}
                {!! Form::select('country_id',$countries,$cid, ['class'=>'form-control','id'=>'country_id']) !!}
                <small class="text-danger">{{ $errors->first('country_id') }}</small>
            </div>

            <div class="col-sm-2">
                {!! Form::label('city_id',trans('city.city'),['class'=>'control-label']) !!}
                {!! Form::select('city_id',$city,$ccid, ['class'=>'form-control','id'=>'city_id']) !!}
                <small class="text-danger">{{ $errors->first('city_id') }}</small>
            </div>
            <div class="col-sm-2">
                {!! Form::label('district',trans('address.district'),['class'=>'control-label']) !!}
                {!! Form::text('address[district]',null,['class'=>'form-control','placeholder'=>trans('address.district')]) !!}
                <small class="text-danger">{{ $errors->first('district') }}</small>  
            </div>

            <div class="col-sm-2">
                {!! Form::label('postal_code',trans('address.postal_code'),['class'=>'control-label']) !!}
                {!! Form::text('address[postal_code]',null,['class'=>'form-control','placeholder'=>trans('address.postal_code')]) !!}
                <small class="text-danger">{{ $errors->first('postal_code') }}</small>    
            </div>

            <div class="col-sm-2">
                {!! Form::label('phone',trans('address.phone'),['class'=>'control-label']) !!}
                {!! Form::text('address[phone]',null,['class'=>'form-control','placeholder'=>trans('address.phone')]) !!}
                <small class="text-danger">{{ $errors->first('phone') }}</small>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-5">
                {!! Form::label('location',trans('address.location'),['class'=>'control-label']) !!}
                {!! Form::hidden('location',null) !!}
                <div id="map_div" style=" height:240px; border: 1px solid #d4d065;"></div>
                <small class="text-danger">{{ $errors->first('location') }}</small>                
            </div>
            <div class="col-sm-2">
                {!! Form::label('manager_staff_id',trans('store.manager_staff_id'),['class'=>'control-label']) !!}
                {!! Form::select('manager_staff_id',$staffs,$manager, ['class'=>'form-control','id'=>'manager_staff_id']) !!}
                <small class="text-danger">{{ $errors->first('manager_staff_id') }}</small>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary ']) !!}
            </div>
        </div>  

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf55wT2Bn6Juy0yBok2tSuGU3nuNluTgw"></script>
<script type="text/javascript"> 
    $(document).ready(function(){        
        loadAddressSelect();
    });    
    google.maps.event.addDomListener(window, 'load', function(){initEditMap("map_div",{{ $loc }})});
</script>
@endpush
