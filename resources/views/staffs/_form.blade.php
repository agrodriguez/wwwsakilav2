        <div class="form-group">
            <div class="col-sm-2">
                {!! Form::label('picture',trans('staff.picture'),['class'=>'control-label']) !!}
                <div>
                    <img src="data:image/png;base64,{!! base64_encode($picture) !!}" alt="Picture" />
                </div>
            </div>
            <div class="col-sm-6">
                {!! Form::file('picture',['id'=>'imgInp']) !!}
                <small class="text-danger">{{ $errors->first('picture') }}</small>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">
                {!! Form::label('first_name',trans('staff.first_name'),['class'=>'control-label']) !!}
                {!! Form::text('first_name',null,['class'=>'form-control','placeholder'=>trans('staff.first_name')]) !!}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>

            </div>
            <div class="col-sm-3">
                {!! Form::label('last_name',trans('staff.last_name'),['class'=>'control-label']) !!}
                {!! Form::text('last_name',null,['class'=>'form-control','placeholder'=>trans('staff.last_name')]) !!}
                <small class="text-danger">{{ $errors->first('last_name') }}</small>  
            </div>
            <div class="col-sm-5">
                {!! Form::label('email',trans('staff.email'),['class'=>'control-label']) !!}
                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>trans('staff.email')]) !!}
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
            <div class="col-sm-1">                
                {!! Form::label('active',trans('staff.active'),['class'=>'control-label']) !!}
                <div class="col-sm-2">{!! Form::checkbox('active') !!}</div>
                <small class="text-danger">{{ $errors->first('active') }}</small>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-3">
                {!! Form::label('username',trans('staff.username'),['class'=>'control-label']) !!}
                {!! Form::text('username',null,['class'=>'form-control','placeholder'=>trans('staff.username')]) !!}
                <small class="text-danger">{{ $errors->first('username') }}</small>
            </div>
            <div class="col-sm-3">
                
                {!! Form::label('password',trans('staff.password'),['class'=>'control-label']) !!}
                {!! Form::password('password',['class'=>'form-control','placeholder'=>trans('staff.password')]) !!}
                <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>
            <div class="col-sm-3">
                
                {!! Form::label('password_confirmation',trans('staff.password_confirmation'),['class'=>'control-label']) !!}
                {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>trans('staff.password_confirmation')]) !!}                
                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
            </div>
            
        </div>

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
            <div class="col-sm-3">
                {!! Form::label('store_id', trans('store.store'), ['class'=>'control-label']) !!}                
                {!! Form::select('store_id',$stores,null, ['class'=>'form-control','id'=>'store_id']) !!}
                <small class="text-danger">{{ $errors->first('store_id') }}</small>
            </div>                
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary pull-right']) !!}
            </div>
        </div>  

        @section('footer')
            <script type="text/javascript">
                $('#store_id,#country_id').select2();
                $(document).ready(function(){
                    
                    //$("#store_id,#country_id").select2();

                    $("#city_id").select2({
                        minimumInputLength: 0,
                        ajax: {
                            url: "/api/cities",
                            dataType: 'json',
                            data: function (term) {
                                return {
                                    id:$("#country_id").val()
                                };
                            },
                            processResults: function (data) {
                                return { results: data };
                            }
                        }               
                    });

                    $("#country_id").on("change", function(e){ 
                        $("#city_id").val(null).trigger("change");
                    });
                    
                });
            </script>
        @endsection
