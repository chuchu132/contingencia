
function cargarSubFormularios(input){
	value = input.val();
	if(value < 8){
		$(".type12").show(1000);
		$("#PublicationRooms").prop('required',true);
	}else{
		$(".type12").hide(1000);
		$("#PublicationRooms").prop('required',false);
		$(".type12 :input").each(function(){
			$(this).val('');
			if($(this).attr('type') == 'checkbox'){
				$(this).prop( "checked", false );
			}
		});
	}
}

function cargarTiempo(input){
	value = input.val();
	if(value == 4){
		$("#tiempo").show(1000);
		$("#PublicationAvailability").prop('required',true);
	}else{
		$("#tiempo").hide(1000);
		$("#PublicationAvailability").val('');
		$("#PublicationAvailability").prop('required',false);
	}
}

$(document).ready(function() {
    var selectedOption = null;
    var marker;
	
	$('#PublicationAvailability').dateRangePicker({format: 'DD-MM-YYYY',separator: ' hasta ', language: 'es'});
	
	cargarSubFormularios($("#PublicationPropertyTypeId"));
	cargarTiempo($("#PublicationAvailability"));
	$("#PublicationPropertyTypeId").change(function() {
		cargarSubFormularios($(this));
	});
	
	$("#PublicationOperationTypeId").change(function() {
		cargarTiempo($(this));
	});
       
	new usig.AutoCompleter('PublicationAddress', {
        debug: true,
        skin: 'usig',
        onReady: function() {
            $('#PublicationAddress').val('').removeAttr('disabled').focus();
        },
        useInventario: false,
        afterSelection: function(option) {
            if (option instanceof usig.Direccion || option instanceof usig.inventario.Objeto) {
                dir= option.getCalle().nombre;
                if(option.getAltura() == 0){
                    dir= dir + " & "+ option.getCalleCruce().nombre;
                }else{
                    dir= dir + " " + option.getAltura();
                }
                dir= dir+ ", Ciudad Autónoma de Buenos Aires"
                geocoder.geocode( { 'address': dir}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        if(marker) {
                            marker.setMap(null)
                        }
                        marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                        $('#PublicationLat').val(marker.getPosition().lat());
                        $('#PublicationLng').val(marker.getPosition().lng());
                    }
                });
            }
        }
    });
});