
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
	
	$('#PublicationAvailability').dateRangePicker({format: 'DD-MM-YYYY',separator: ' hasta ', language: 'es'});
	
	cargarSubFormularios($("#PublicationPropertyTypeId"));
	cargarTiempo($("#PublicationAvailability"));
	$("#PublicationPropertyTypeId").change(function() {
		cargarSubFormularios($(this));
	});
	
	$("#PublicationOperationTypeId").change(function() {
		cargarTiempo($(this));
	});
});