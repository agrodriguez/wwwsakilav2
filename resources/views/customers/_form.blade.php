        <div class="form-group">
            <div class="col-sm-2">
                {!! Form::label('first_name',trans('customer.first_name'),['class'=>'control-label']) !!}
                {!! Form::text('first_name',null,['class'=>'form-control','placeholder'=>trans('customer.first_name')]) !!}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>

            </div>
            <div class="col-sm-2">
                {!! Form::label('last_name',trans('customer.last_name'),['class'=>'control-label']) !!}
                {!! Form::text('last_name',null,['class'=>'form-control','placeholder'=>trans('customer.last_name')]) !!}
                <small class="text-danger">{{ $errors->first('last_name') }}</small>  
            </div>
            <div class="col-sm-4">
                {!! Form::label('email',trans('customer.email'),['class'=>'control-label']) !!}
                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>trans('customer.email')]) !!}
                <small class="text-danger">{{ $errors->first('email') }}</small>
            </div>
            <div class="col-sm-1">                
                {!! Form::label('active',trans('customer.active'),['class'=>'control-label']) !!}
                <div class="col-sm-2">{!! Form::checkbox('active') !!}</div>                
                <small class="text-danger">{{ $errors->first('active') }}</small>
            </div>
            <div class="col-sm-3">                
                {!! Form::label('create_date',trans('customer.create_date'),['class'=>'control-label']) !!}
                {!! Form::text('create_date',null,['class'=>'form-control','placeholder'=>trans('customer.create_date')]) !!}
                <small class="text-danger">{{ $errors->first('create_date') }}</small>
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
            <div class="col-sm-3">
                {!! Form::label('country_id',trans('country.country'),['class'=>'control-label']) !!}
                {!! Form::select('country_id',$countries,$cid, ['class'=>'form-control','id'=>'country_id']) !!}
                <small class="text-danger">{{ $errors->first('country_id') }}</small>
            </div>

            <div class="col-sm-3">
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
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf55wT2Bn6Juy0yBok2tSuGU3nuNluTgw&callback=initMap">
            </script>
            <script type="text/javascript">


                var map;
                function initMap() {

                    var latlng = new google.maps.LatLng({{ $loc }});


                    map = new google.maps.Map(document.getElementById('map_div'), {
                        center: latlng,
                        zoom: 5
                    });

                    var marker = new google.maps.Marker({
                        map: map,
                        position: latlng,
                        draggable: true
                    });

                    marker.addListener('dragend', function() {

                        var point = marker.getPosition();
                        map.panTo(point);
                        //alert(point.lat().toFixed(5)+', '+point.lng().toFixed(5));
                        document.getElementById("location").value =point.lat().toFixed(5)+', '+point.lng().toFixed(5) ;
                    });

                }

            </script>
        @endsection