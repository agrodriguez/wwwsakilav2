$(document).ready(function(){
    //flash message
    $('#ModalFlash').modal({ backdrop: 'static', keyboard: false })
    $('#ModalFlash').on('shown.bs.modal', function (e) {
        setTimeout(function(){
            $('#ModalFlash').modal('hide')
        }, 1000);
    })
    
    //confirm delete
    $('#delete_button').on('click', function(e){
        var $form=$('#delete_form');
        var $delete=false;
        e.preventDefault();
        $('#ModalConfirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#btnDelete', function (e) {
            $('#ModalConfirm').modal('hide');
            $delete=true;
        });
        $('#ModalConfirm').on('hidden.bs.modal', function(){
            if($delete) {
                $form.trigger('submit');
            }
        })
    });
});


var map;

function initEditMap(map_element, lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    document.getElementById("location").value= lat + ', ' + lng;

    map = new google.maps.Map(document.getElementById(map_element), {
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
        document.getElementById("location").value = point.lat().toFixed(5) + ', ' + point.lng().toFixed(5) ;
    });

}

function initShowMap(map_element, lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);

    map = new google.maps.Map(document.getElementById(map_element), {
        center: latlng,
        zoom: 5
    });

    var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        draggable: false,
    });

}

//load selects

function loadRentalSelect(){
    $("#film_id").select2();
    $("#customer_id").select2();
    $("#inventory_id").select2({
        minimumInputLength: 0,
        ajax: {
            url: "/api/inventories",
            dataType: 'json',
            data: function (term) {
                return {
                    id:$("#film_id").val(),
                    store:$("#store_id").val(),
                };
            },
            processResults: function (data) {
                return { results: data };
            }
        }               
    });
    $("#film_id").on("change", function(e){ 
        $("#inventory_id").val(null).trigger("change");
    });
}

function loadAddressSelect(){
    $('#country_id').select2();
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
    $('#store_id').select2();

    $("#country_id").on("change", function(e){ 
        $("#city_id").val(null).trigger("change");
    });
    
    $('#manager_staff_id').select2();
}

function loadFilmSelect(){
    $('#category_list,#actor_list,#special_features').select2();
}

//init file upload button
$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
    console.log(numFiles);
    console.log(label);
});

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
