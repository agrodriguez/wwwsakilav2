        
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

        @section('footer')
        <style type="text/css">
                .btn-file {
                    position: relative;
                    overflow: hidden;
                }
                .btn-file input[type=file] {
                    position: absolute;
                    top: 0;
                    right: 0;
                    min-width: 100%;
                    min-height: 100%;
                    font-size: 100px;
                    text-align: right;
                    filter: alpha(opacity=0);
                    opacity: 0;
                    outline: none;
                    background: white;
                    cursor: inherit;
                    display: block;
                }

        </style>
            <script type="text/javascript">
                $('#store_id,#country_id,#manager_staff_id').select2();
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
                    
                    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                        console.log(numFiles);
                        console.log(label);
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
                    document.getElementById("location").value="{{ $loc }}"

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
                

                $(document).on('change', '.btn-file :file', function() {
                    var input = $(this),
                        numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    input.trigger('fileselect', [numFiles, label]);
                });

                $("#picture").change(function(){
                    readURL(this);
                });

                function readURL(input) {
                    var url = input.value;
                    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                    //if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    if (input.files && input.files[0]&& (ext == "png" || ext == "jpeg" || ext == "jpg")) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            //alert(e.target.result);
                            $('#pic').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }else{
                         $('#pic').attr('src', '/assets/no_preview.png');
                    }
                }

            </script>
        @endsection
