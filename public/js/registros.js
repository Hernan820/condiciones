
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
	//$('#datecontrac').mask('00/00/00');	
	$("#btonnuevo").hide();
	$('#purchaceprice').mask('#,##0.00', {reverse: true});
	$('#purchaceprice').change(function () {
	  var valor = $(this).val();  
	  $(this).val('$' + valor);
	});
	$('#dowpayment').mask('00%');
	$('#realtorphone').mask('(000) 000-0000');
	$('#customerPhone').mask('(000) 000-0000');

	pendientestbl();
	activostbl();
	canceladotbl();
 });


 $('#btnmodalfile').on('click', function() {
	datosfile();
	$('#newFile').modal('show');
  });

function datosfile(){

	$("#formregistro")[0].reset();
	$('#iditemprimero').tab('show');
	$("#nameclient").focus();

	documentos();
	nuevobtn();
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

function documentos(){
	$("#listdocumentos").empty();
	$("#tbldoc").empty();

	axios.post(principalUrl + "condicion/documentos")
	.then((respuesta) => {   

		$("#listdocumentos").append("<label class='col-form-label  pt-sm-0'>Documents</label>"); 
   
		respuesta.data.forEach(function (element) {
		   $("#listdocumentos").append("<div class='mb-3 row'><div class='col-sm-10'> <label class='form-check m-0'><input type='checkbox' class='form-check-input checkdocumento' id='ssmm' name='chekcdocument[]' value="+element.id+"> <span class='form-check-label'>"+element.nombre_doc+"</span> </label> </div>  </div>"); 
	    });

	   respuesta.data.forEach(function (element) {
		$("#tbldoc").append("<tr> <td>"+element.nombre_doc+"</td> <td class='table-action'> <a href='#' class='itemdoc' id='itemedita' ><input type='hidden' class='data' value="+element.id+" ><i class='align-middle fas fa-fw fa-pen'></i></i></a> <a href='#' class='itemdoc' id='itemborra' ><input type='hidden' class='data' value="+element.id+" ><i class='align-middle fas fa-fw fa-trash'></i></a> </td> </tr>"); 
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
		pendientestbl();

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

const validateEmail = (email) => {
    var format =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return format.test(email);
};


function validaform(){
	var valido = true;
	var docs = 0 ;
	var cuest = 0 ;	
    var name = $("#nameclient").val();
	var telef = $("#customerPhone").val();
    var estatus = $("input[name=radio_status]:radio").is(':checked');
    var fechacontrato = $("#datecontrac").val();
    var fecharecibido = $("#datereceipt").val();
    var tipoprestamo = $("#typeloan").val();
    var emailcliente = $("#emailclient").val();
	var checkdoc = $(".checkdocumento:checked");  
	var checkcuestionari = $(".checkcuest:checked");  

	checkdoc.each(function(i) { docs++;});
	checkcuestionari.each(function(i) {cuest++;	});

	if(name == ""){
		Swal.fire("¡Add customer name!");
		$('#iditemprimero').tab('show');
        $("#nameclient").focus();
		return valido = false; }

	if(telef == ""){
		Swal.fire("¡Add customer phone!");
		$('#iditemprimero').tab('show');
		$("#customerPhone").focus();
		return valido = false; }

	if(estatus == false){
		Swal.fire("¡Add customer status!");
		$('#iditemprimero').tab('show');
		return valido = false; }

	if(fechacontrato == ""){
		Swal.fire("¡Add contract date!");
		$('#iditemprimero').tab('show');
		$("#datecontrac").focus();
		return valido = false; }
	
	if(fecharecibido == ""){
		Swal.fire("¡Add the date of receipt of the contract!");
		$('#iditemprimero').tab('show');
		$("#datereceipt").focus();
		return valido = false; }

	if(tipoprestamo == ""){
		Swal.fire("¡Add type of loan!");
		$('#iditemprimero').tab('show');
		$("#typeloan").focus();
		return valido = false; }

	if(emailcliente != ""){
		if (validateEmail(emailcliente) == false) {
			Swal.fire("¡Incorrect email format error!");
			$('#iditemprimero').tab('show');
			return valido = false;
		}
	}else{
		Swal.fire("¡Add customer email!");
		$('#iditemprimero').tab('show');
		$("#emailclient").focus();
		return valido = false;
	}


	if(docs < 5){
        Swal.fire("¡You must assign more than 4 documents!");
		$('#itemsegundo').tab('show');
        return valido = false;}

	if(cuest <= 0){
        Swal.fire("¡Must assign quizzes!");
		$('#itemtercero').tab('show');
        return valido = false; }

    return valido;
}

function pendientestbl(){
	var registertbl	= $("#datatables-reponsive").DataTable();
        registertbl.destroy();

    var registertbl	= $("#datatables-reponsive").DataTable({
		responsive: true,
		ajax: {
            url: principalUrl + "condiciones/registro/1",
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
				return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesitem' id='itemuno' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> See details</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem'  id='itemdos' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Get customerinfo</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemtres' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-window-close' data-feather='x-square'></i> Cancel file</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcuatro' href='#'><input type='hidden' class='data' value="+data+" ><i class='ion ion-md-shuffle me-2' data-feather='shuffle'></i> File with Problems</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcinco' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-paper-plane'  data-feather='send'></i> Send to opening</a></div></div>");
			},
		    },
		]
	});
}

function activostbl(){

	var registertbl	= $("#datatableactivos-reponsive").DataTable();
        registertbl.destroy();

    var registertbl	= $("#datatableactivos-reponsive").DataTable({
		responsive: true,
		ajax: {
            url: principalUrl + "condiciones/registro/3",
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
				return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesitem' id='itemuno' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> See details</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem'  id='itemdos' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Get customerinfo</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemtres' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-window-close' data-feather='x-square'></i> Cancel file</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcuatro' href='#'><input type='hidden' class='data' value="+data+" ><i class='ion ion-md-shuffle me-2' data-feather='shuffle'></i> File with Problems</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcinco' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-paper-plane'  data-feather='send'></i> Send to opening</a></div></div>");
			},
		    },
		]
	});
}

function canceladotbl(){

	var registertbl	= $("#datatablecancel-reponsive").DataTable();
        registertbl.destroy();

    var registertbl	= $("#datatablecancel-reponsive").DataTable({
		responsive: true,
		ajax: {
            url: principalUrl + "condiciones/registro/2",
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
				return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesitem' id='itemuno' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> See details</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem'  id='itemdos' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Get customerinfo</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemtres' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-window-close' data-feather='x-square'></i> Cancel file</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcuatro' href='#'><input type='hidden' class='data' value="+data+" ><i class='ion ion-md-shuffle me-2' data-feather='shuffle'></i> File with Problems</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcinco' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-paper-plane'  data-feather='send'></i> Send to opening</a></div></div>");
			},
		    },
		]
	});
}

$(document).on('click', '.opcionesitem',function() { 

	var idregistro = $(this).find(".data").val();

	if(this.id == 'itemuno'){

	}else if(this.id == 'itemdos'){

	}else if(this.id == 'itemtres'){
	  $('#id_registro').val(idregistro)
	  $('#modacancel').modal('show');
	}else if(this.id == 'itemcuatro'){

	}else if(this.id == 'itemcinco'){

		Swal.fire({
			title: "Cambio estado",
			text: "¿Estas seguro cambiar de estado este registro?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Continuar",
			cancelButtonText: "Cancelar",
		}).then((result) => {
			if (result.isConfirmed) {
		
				axios.post(principalUrl + "condiciones/cambioestado/3/"+idregistro)
					.then((respuesta) => {
						respuesta.data
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "registro actualizado!",
							showConfirmButton: false,
							timer: 1000,
						});
						pendientestbl();
						activostbl();
						canceladotbl();
					})
					.catch((error) => {
						if (error.response) {
							console.log(error.response.data);
						}
					});
			} else {
			}
		});
	}
});

$('#btncancelacion').on('click', function() { 

	if ( $("#cancelacionmotivo").val() == "") {Swal.fire("¡Add a reason for cancellation!"); return;}

	var datos = new FormData();
	    datos.append("motivo_cancel",$('#cancelacionmotivo').val());
		datos.append("id_registro",$('#id_registro').val());

    axios.post(principalUrl+"condicion/cancelacion",datos)
    .then((respuesta) => {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "registration canceled!",
			showConfirmButton: false,
			timer: 1200,
		});
		pendientestbl();
		activostbl();
		canceladotbl();
	  $('#modacancel').modal('hide');
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

});

$(document).on('click', '.itemdoc',function() {
	var iddoc = $(this).find(".data").val();

	if(this.id == "itemedita"){

		axios.post(principalUrl+"doc/edita/"+iddoc)
		.then((respuesta) => {
			$('#newdoc').val(respuesta.data.nombre_doc);
			$('#iddocument').val(respuesta.data.id);
			$("#newdoc").focus();
			document.getElementById("btngregadoc").innerText = "Update";
			$("#btonnuevo").show();
			})
		.catch((error) => {
			if (error.response) {
				console.log(error.response.data);
			}
		});

	}else if(this.id == "itemborra"){


		Swal.fire({
			title: "Remove",
			text: "are you sure to delete document?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Continue ",
			cancelButtonText: "Cancel",
		}).then((result) => {
			if (result.isConfirmed) {
		
                axios.post(principalUrl+"doc/elimina/"+iddoc)
                .then((respuesta) => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "deleted document!",
                        showConfirmButton: false,
                        timer: 1200,
                    });
                    documentos();
                    $('#newdoc').val("");
                    $('#iddocument').val("");
                    $("#newdoc").focus();
                    $("#btonnuevo").hide();
                    })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
			} else {
			}
		});
	}
 });

 $('#btngregadoc').on('click', function() { 
	event.preventDefault();

	if($('#newdoc').val() == ""){Swal.fire("¡Add a document!");$("#newdoc").focus(); return;}
	
	var document = new FormData();
	    document.append("iddoc",$('#iddocument').val());
	    document.append("nombredoc",$('#newdoc').val());

		if($('#iddocument').val() != ""){

	axios.post(principalUrl+"doc/actualiza",document)
	.then((respuesta) => {
		$('#btngregadoc').text("Add");
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "actualized document!",
			showConfirmButton: false,
			timer: 1200,
		});
		documentos();
		$('#newdoc').val("");
		$('#iddocument').val("");
		$("#newdoc").focus();
		$("#btonnuevo").hide();
		})
	.catch((error) => {
		if (error.response) {
			console.log(error.response.data);
		}
	});
   }else{

	axios.post(principalUrl+"doc/agrega",document)
	.then((respuesta) => {

		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "added document!",
			showConfirmButton: false,
			timer: 1200,
		});
		documentos();
		$('#newdoc').val("");
		$('#iddocument').val("");
		$("#newdoc").focus();
		$("#btonnuevo").hide();
		})
	.catch((error) => {
		if (error.response) {
			console.log(error.response.data);
		}
	});
   }
 });

 $('#btnnuevo').on('click', function() { 
	event.preventDefault();nuevobtn();
});

function nuevobtn(){
	$('#btngregadoc').text("Add");
	$('#newdoc').val("");
	$('#iddocument').val("");
	$("#newdoc").focus();
	$("#btonnuevo").hide();
}
 
console.log('aqui llega a registro js  actualizado');













