



$('#datetimepicker-minimum').datetimepicker({format: 'L'});
$('#datetimepicker-minimum2').datetimepicker();

// Select2
$(".select2").each(function() {
	$(this)
		.wrap("<div class=\"position-relative\"></div>")
		.select2({
			placeholder: "Select value",
			dropdownParent: $(this).parent()
		});
})

/*********************************************************** */

$(document).ready(function () {

		/*	$("#estados").select2({
			    allowClear: true,
        width: '300px',
        height: '34px',
        placeholder: 'select..'
        //data: data
    });*/
	registrotbl();
 });


 $('#btnmodalfile').on('click', function() {
	datosfile();
	$('#newFile').modal('show');
  });

function datosfile(){

	$("#formregistro")[0].reset();
	$('#iditemprimero').tab('show');

	// MUESTRA DOCUMENTOS
	$("#listdocumentos").empty();
	$("#tbldoc").empty();

	
	axios.post(principalUrl + "condicion/documentos")
	.then((respuesta) => {   

		$("#listdocumentos").append("<label class='col-form-label  pt-sm-0'>Documents</label>"); 
   
		respuesta.data.forEach(function (element) {
		   $("#listdocumentos").append("<div class='mb-3 row'><div class='col-sm-10'> <label class='form-check m-0'><input type='checkbox' class='form-check-input checkdocumento' id='ssmm' name='chekcdocument[]' value="+element.id+"> <span class='form-check-label'>"+element.nombre_doc+"</span> </label> </div>  </div>"); 
	    });

	   respuesta.data.forEach(function (element) {
		$("#tbldoc").append("<tr> <td>"+element.nombre_doc+"</td> <td class='table-action'> <a href='#'><i class='align-middle fas fa-fw fa-pen'></i></i></a> <a href='#'><i class='align-middle fas fa-fw fa-trash'></i></a> </td> </tr>"); 
	   });
   
	})
	.catch((error) => {
		if (error.response) {
			console.log(error.response.data);
		}
	});
/***CUESTIONARIOS */

$("#cuestionarios").empty();

axios.post(principalUrl + "condicion/cuestionario")
.then((respuesta) => {
	$("#cuestionarios").append("<label class='col-form-label  pt-sm-0'>Questionnaire catalog</label>"); 

	respuesta.data.forEach(function (element) {
	   $("#cuestionarios").append("<div class='mb-3 row'> <div class='col-sm-10'> <label class='form-check m-0'> <input type='checkbox' class='form-check-input checkcuest' name='checkcuestionario[]' value="+element.id+"> <span class='form-check-label'>"+element.nombre+"</span></label></div></div>"); 
	});

})
.catch((error) => {
	if (error.response) {
		console.log(error.response.data);
	}
});

/****ESTADOS** */

var availableTags = [
	"Alaska",
	"Arizona",
	"Arkansas",
	"California",
	"Carolina del Norte",
	"Carolina del Sur",
	"Colorado",
	"Connecticut",
	"Dakota del Norte",
	"Dakota del Sur",
	"Delaware",
	"Florida",
	"Georgia",
	"Hawái",
	"Idaho",
	"Illinois",
	"Indiana",
	"Iowa",
	"Kansas",
	"Kentucky",
	"Luisiana",
	"Maine",
	"Maryland",
	"Massachusetts",
	"Míchigan",
	"Minnesota",
	"Misisipi",
	"Misuri",
	"Montana",
	"Nebraska",
	"Nevada",
	"New Jersey",
	"New York",
	"New Hampshire",
	"New México",
	"Ohio",
	"Oklahoma",
	"Oregón",
	"Pensilvania",
	"Rhode Island",
	"Tennessee",
	"Texas",
	"Utah",
	"Vermont",
	"Virginia",
	"Virginia Occidental",
	"Washington",
	"Wisconsin",
	"Wyoming",
		];

		$("#estadoscasa").empty();
		$("#estadoscasa").append("<option value='' readonly >countries</option>"); 

		availableTags.forEach(function (element) {
			$("#estadoscasa").append("<option value="+element+">"+element+"</option>"); 
		});

// TIPOS DE PRESTAMO

$("#typeloan").empty();

axios.post(principalUrl + "condicion/prestamos")
.then((respuesta) => {
	respuesta.data
	$("#typeloan").append("<option value='' selected>Choose...</option>"); 

	respuesta.data.forEach(function (element) {
	   $("#typeloan").append("<option value="+element.id+" >"+element.nombre_prestamo+"</option>"); 
	});

})
.catch((error) => {
	if (error.response) {
		console.log(error.response.data);
	}
});

}

$('#guardaregistro').on('click', function() { 

	if (validaform() == false) {return;}

	var datos = new FormData(document.getElementById("formregistro"));
	     datos.append("estadocasa",$('#estadoscasa').val());

    axios.post(principalUrl + "condicion/agregaregistro",datos)
    .then((respuesta) => {
		registrotbl();

		$('#newFile').modal('hide');
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Registro guardado!",
			showConfirmButton: false,
			timer: 1200,
		});

    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

});


function validaform(){
	var valido = true;
	var docs = 0 ;
	var cuest = 0 ;	
    var name = $("#nameclient").val();
	var telef = $("#customerPhone").val();
    var estatus = $("input[name=radio_status]").val();
    var fechacontrato = $("#datecontrac").val();
    var fecharecibido = $("#datereceipt").val();
    var tipoprestamo = $("#typeloan").val();
    var emailcliente = $("#emailclient").val();
	var checkdoc = $(".checkdocumento:checked");  
	var checkcuestionari = $(".checkcuest:checked");  

	checkdoc.each(function(i) { docs++;});

	checkcuestionari.each(function(i) {cuest++;	});

	if(docs < 5){
        Swal.fire("¡debe asignar mas de 4 documentos!");
		$('#itemsegundo').tab('show');
        valido = false;}

	if(cuest <= 0){
        Swal.fire("¡debe asignar cuestionarios!");
		$('#itemtercero').tab('show');
        valido = false; }

	if(name == ""){
		Swal.fire("¡Agrege el nombre del cliente!");
		valido = false; }

	if(telef == ""){
		Swal.fire("¡Agrege el telefono del cliente!");
		valido = false; }

	if(estatus == ""){
		Swal.fire("¡Agrege el estatus del cliente!");
		valido = false; }

	if(fechacontrato == ""){
		Swal.fire("¡Agrege la fecha del contrato!");
		valido = false; }
	
	if(fecharecibido == ""){
		Swal.fire("¡Agrege la fecha de recepcion del contrato!");
		valido = false; }

	if(tipoprestamo == ""){
		Swal.fire("¡Agrege tipo de prestamo!");
		valido = false; }

	if(emailcliente == ""){
		Swal.fire("¡Agrege el email del cliente!");
		valido = false; }

    return valido;
}


function registrotbl(){
	var registertbl	= $("#datatables-reponsive").DataTable();

    registertbl.destroy();

var registertbl	= $("#datatables-reponsive").DataTable({
		responsive: true,
		ajax: {
            url: principalUrl + "condiciones/registro",
            dataSrc: "",
        },
		columns: [
            { data: "fecha_firma" },
            { data: "fecha_recepcion" },
            { data: "nombre_cliente" },
            { data: "estado" },
            { data: "nombre_prestamo" },
            { data: "direccion_casa" },
            { data: "drive",
			render: function (data) {
				if(data != null){
					return ("<a href="+data+"><i class='align-middle me-2 fas fa-fw fa-external-link-alt' data-feather='external-link'></i></a>");
				}else{
					return ("");
				}
			}, },
			{ data: "idregister",
			render: function (data) {
				return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item' href='#'><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> See details</a><div class='dropdown-divider'></div><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#sizedModalSm'><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Get customerinfo</a><div class='dropdown-divider'></div><a class='dropdown-item' href='#'><i class='align-middle me-2 far fa-fw fa-window-close' data-feather='x-square'></i> Cancel file</a><div class='dropdown-divider'></div><a class='dropdown-item' href='#'><i class='ion ion-md-shuffle me-2' data-feather='shuffle'></i> File with Problems</a><div class='dropdown-divider'></div><a class='dropdown-item' href='#'><i class='align-middle me-2 far fa-fw fa-paper-plane' data-feather='send'></i> Send to opening</a></div></div>");
			},
		    },

			
		]
	});

}




console.log('aqui llega a registro js  actualizado');














