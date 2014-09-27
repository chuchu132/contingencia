
function cargarSubFormularios(input){
	value = input.val();
	if(value < 8){
		$(".type12").show(1000);
		$("#PublicationRooms").prop('required',true);
	}else{
		$(".type12").hide(1000);
		$("#PublicationRooms").prop('required',false);
	}
}

$(document).ready(function() {
	cargarSubFormularios($("#PublicationPropertyTypeId"));
	$("#PublicationPropertyTypeId").change(function() {
		cargarSubFormularios($(this));
	});
});