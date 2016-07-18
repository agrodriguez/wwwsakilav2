var map;
function initEditMap() {

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
        document.getElementById("location").value =point.lat().toFixed(5)+', '+point.lng().toFixed(5) ;
    });

}

var map;
function initShowMap() {

    var latlng = new google.maps.LatLng({{ $customer->address->location }});

    map = new google.maps.Map(document.getElementById('map_div'), {
        center: latlng,
        zoom: 5
    });

    var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        draggable: false,
    });

}

//init city id combo box
$('#store_id,#country_id').select2();
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

$(document).ready(function(){
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        console.log(numFiles);
        console.log(label);
    });
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
