var clipboard = new Clipboard('#copiarinfo');

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
	$('#tblcliente tr').slice(1).remove();
	$('#newFile').modal('show');
  });

function datosfile(){

	$("#formregistro")[0].reset();
	$('#iditemcliente').tab('show');
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
			$("#estadoscasa").append("<option value='"+element+"'>"+element+"</option>"); 
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
	$("input[name='chekcdocument[]']").each(function(indice, inputDatos){
		if ($(inputDatos).is(":checked") === false){
			var valor =$(this).val();
			$(this).val($(this).val()+'_false');
			$(this).prop('checked',true);
		}
	})
	
	var datos = new FormData(document.getElementById("formregistro"));
	     datos.append("estadocasa",$('#estadoscasa').val());

    axios.post(principalUrl + "condicion/agregaregistro",datos)
    .then((respuesta) => {
		pendientestbl();

		$('#newFile').modal('hide');
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "record saved!",
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

var validateEmail = (email) => {
    var format =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return format.test(email);
};


function validaform(){
	var valido = true;
	var docs = 0 ;
	var cuest = 0 ;	
    var fechacontrato = $("#datecontrac").val();
    var fecharecibido = $("#datereceipt").val();
    var tipoprestamo = $("#typeloan").val();
	var checkdoc = $(".checkdocumento:checked");  
	var checkcuestionari = $(".checkcuest:checked");  

	checkdoc.each(function(i) { docs++;});
	checkcuestionari.each(function(i) {cuest++;	});

	const values = $('input[name="typeclient[]"]')
	.map(function () { return this.value;}).get();

	if (!values.includes('1')) {
		Swal.fire("¡Add a headline customer!");
		$("#iditemcliente").tab('show');
		return valido = false;  
	  }

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
            url: principalUrl + "registro/etapa/1",
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
				if(data != ''){
					return ("<a href="+data+"><i class='align-middle me-2 fas fa-fw fa-external-link-alt' data-feather='external-link'></i></a>");
				}else{
					return ("");
				}
			}, },
			{ data: "idregister",
			render: function (data) {
				return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesitem' id='itemuno' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> See details</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem'  id='itemdos' data-bs-toggle='modal' data-bs-target='' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Get customerinfo</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemtres' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-window-close' data-feather='x-square'></i> Cancel file</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcuatro' href='#'><input type='hidden' class='data' value="+data+" ><i class='ion ion-md-shuffle me-2' data-feather='shuffle'></i> File with Problems</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcinco' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-paper-plane'  data-feather='send'></i> Send to opening</a></div></div>");
			},
		    },
		],
        createdRow: (row, data, dataIndex, cells) => {
            if (data.id_estado == 2){
                $(row).addClass(' table-danger'); }
        }
	});
}

function activostbl(){

	var registertbl	= $("#datatableactivos-reponsive").DataTable();
        registertbl.destroy();

    var registertbl	= $("#datatableactivos-reponsive").DataTable({
		responsive: true,
		ajax: {
            url: principalUrl + "registro/etapa/2",
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
				if(data != ''){
					return ("<a href="+data+"><i class='align-middle me-2 fas fa-fw fa-external-link-alt' data-feather='external-link'></i></a>");
				}else{
					return ("");
				}
			}, },
			{ data: "idregister",
			render: function (data) {
				return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesitem' id='itemuno' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> See details</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem'  id='itemdos' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Get customerinfo</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemtres' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-window-close' data-feather='x-square'></i> Cancel file</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcuatro' href='#'><input type='hidden' class='data' value="+data+" ><i class='ion ion-md-shuffle me-2' data-feather='shuffle'></i> File with Problems</a><div class='dropdown-divider'></div></div>");
			},
		    },
		],
		createdRow: (row, data, dataIndex, cells) => {
            if (data.id_estado == 2){
                $(row).addClass(' table-danger'); }
        }
	});
}

function canceladotbl(){

	var registertbl	= $("#datatablecancel-reponsive").DataTable();
        registertbl.destroy();

    var registertbl	= $("#datatablecancel-reponsive").DataTable({
		responsive: true,
		ajax: {
            url: principalUrl + "registros/cancelado/3",
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
				if(data != ''){
					return ("<a href="+data+"><i class='align-middle me-2 fas fa-fw fa-external-link-alt' data-feather='external-link'></i></a>");
				}else{
					return ("");
				}
			}, },
			{ data: "idregister",
			render: function (data) {
				return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesitem' id='itemuno' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> See details</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem'  id='itemdos' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Get customerinfo</a><div class='dropdown-divider'></div><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcuatro' href='#'><input type='hidden' class='data' value="+data+" ><i class='ion ion-md-shuffle me-2' data-feather='shuffle'></i> File with Problems</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesitem' id='itemcinco' href='#'><input type='hidden' class='data' value="+data+" ><i class='align-middle me-2 far fa-fw fa-paper-plane'  data-feather='send'></i> Send to opening</a></div></div>");
			},
		    },
		]
	});
}

$(document).on('click', '.opcionesitem',function() { 

	var idregistro = $(this).find(".data").val();

	if(this.id == 'itemuno'){
		$.ajax({
			type:'GET',
			url: principalUrl+'registro/vistadetallefile/'+idregistro,
			dataType:"html",
		}).done(function(data) {

			$('.contenido').html(data);   
	  
		  });
	}else if(this.id == 'itemdos'){

		axios.post(principalUrl + "registro/reporte/"+idregistro)
		.then((respuesta) => {
			 $('#reportregistro').text(' Name: '+respuesta.data.registros[0].nombre_cliente+"\n Phone: "+
			 respuesta.data.registros[0].telefono+"\n Email: "+
			 respuesta.data.registros[0].correo+"\n ADDRES: "+
			 respuesta.data.registros[0].direccion+"\n PURCHASE PRICE: "+
			 respuesta.data.registros[0].precio_casa+"\n DOWN PAYMENT: "+
			 respuesta.data.registros[0].dowpayment+"\n LOAN TYPE: "+
			 respuesta.data.registros[0].status+"\n FECHA DE INGRESO: "+
			 respuesta.data.registros[0].fecha_firma+"\n \n "
			 );

			 respuesta.data.doc.forEach(function (element) {
			  $('#reportregistro').html($('#reportregistro').html()+'✅'+element.nombre_doc+' \n ');
			   })
			 $('#modalreportclient').modal('show');
		})
		.catch((error) => {
			if (error.response) {
				console.log(error.response.data);
			}
		});

	}else if(this.id == 'itemtres'){
	  $('#id_registro').val(idregistro)
	  $('#cancelacionmotivo').val('');
	  $('#modacancel').modal('show');

	}else if(this.id == 'itemcuatro'){
		//cambiar a estado dañado
		Swal.fire({
			title: "Change state",
			text: "Change to damaged registry?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Continuer",
			cancelButtonText: "Cancel",
		}).then((result) => {
			if (result.isConfirmed) {
		
				axios.post(principalUrl + "registro/estado/2/"+idregistro)
					.then((respuesta) => {
						respuesta.data
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "record updated!",
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

	}else if(this.id == 'itemcinco'){
		//opcion sen ti opening. cambia estapa to opnenig 
		Swal.fire({
			title: "Change state",
			text: "Are you sure to change the registration stage?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Continuer",
			cancelButtonText: "Cancel",
		}).then((result) => {
			if (result.isConfirmed) {
		
				axios.post(principalUrl + "registro/cambioetapa/2/"+idregistro)
					.then((respuesta) => {
						respuesta.data
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "record updated!",
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

    axios.post(principalUrl+"registro/cancelacion",datos)
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
 

$('#btncliente').on('click', function() {
	if (validaclient() == false) {return;}

	num = $('#tblcliente tbody tr.fila-fija').length;

	if(num == 0){
        var tr = $('<tr >');
		$("#filasclientes").append(tr);
		tr.append("<td >"+$('#nameclient').val()+" <input type='hidden' class='clientenombre' name='nombres[]' value="+$('#nameclient').val()+"> <input type='hidden' class='clientessn' name='securityn[]' value="+$('#ssn').val()+"></td>");
		tr.append("<td >"+$('#customerPhone').val()+" <input type='hidden' class='clientetelefono' name='tel[]' value="+"'"+$('#customerPhone').val()+"'"+"> <input type='hidden' class='clientemail' name='email[]' value="+$('#emailclient').val()+"> <input type='hidden' class='tipocliente' name='typeclient[]' value="+$('input:radio[name=radio_typeclient]:checked').val()+"> </td>");
		tr.append("<td class='d-none d-md-table-cell' >"+$('input:radio[name=radio_status]:checked').val()+"<input type='hidden' class='clientestatus' name='status[]' value="+"'"+$('input:radio[name=radio_status]:checked').val()+"'"+"> <input type='hidden' class='clientedirecc' name='direccion[]' value="+$('#inputAddress').val()+"> <input type='hidden' class='clientedirecc2' name='direccion2[]' value="+$('#inputAddress2').val()+"></td>");
		tr.append('<td class="table-action" >&nbsp;<a href="#" class="eliminaclient"><i class="align-middle fas fa-fw fa-trash"></i></a></td>');
	}else{

   $('#tblcliente tbody tr:eq(0)').clone().appendTo('#tblcliente');
   $(`#tblcliente tbody tr.fila-fija:eq(${num})`).find('td:eq(0)').html($('#nameclient').val()+" <input type='hidden' class='clientenombre' name='nombres[]' value="+$('#nameclient').val()+"> <input type='hidden' class='clientessn' name='securityn[]' value="+$('#ssn').val()+">");
   $(`#tblcliente tbody tr.fila-fija:eq(${num})`).find('td:eq(1)').html($('#customerPhone').val()+" <input type='hidden' class='clientetelefono' name='tel[]' value="+$('#customerPhone').val()+"> <input type='hidden' class='clientemail' name='email[]' value="+$('#emailclient').val()+"> <input type='hidden' class='tipocliente' name='typeclient[]' value="+$('input:radio[name=radio_typeclient]:checked').val()+">");
   $(`#tblcliente tbody tr.fila-fija:eq(${num})`).find('td:eq(2)').html($('input:radio[name=radio_status]:checked').val()+"<input type='hidden' class='clientestatus' name='status[]' value="+"'"+$('input:radio[name=radio_status]:checked').val()+"'"+"> <input type='hidden' class='clientedirecc' name='direccion[]' value="+$('#inputAddress').val()+">	<input type='hidden' class='clientedirecc2' name='direccion2[]' value="+$('#inputAddress2').val()+">");

	}

   $('.inputclient').val('');
   $("input[name=radio_status]").prop('checked', false);
   $("input[name=radio_typeclient]").prop('checked', false);
   $("#nameclient").focus();

});


function validaclient(){
	var valido = true;
    var name = $("#nameclient").val();
	var telef = $("#customerPhone").val();
    var estatus = $("input[name=radio_status]:radio").is(':checked');
	var cliente_tipo = $("input[name=radio_typeclient]:radio").is(':checked');
    var emailcliente = $("#emailclient").val();

	const values = $('input[name="typeclient[]"]')
        .map(function () { return this.value;}).get();
    
		var radiotipocliente = $("input[name=radio_typeclient]:checked").val();

		if(radiotipocliente == "1"){
			if (values.includes(radiotipocliente)) {
				Swal.fire("¡There is already a headline!");
				return valido = false;  
			  }
		}

	if(name == ""){
		Swal.fire("¡Add customer name!");
        $("#nameclient").focus();
		return valido = false; }

	if(telef != ""){

		if(telef.length <14){
			Swal.fire("¡The phone number is incomplete!");
			$("#customerPhone").focus();
			return valido = false;
		}

	}else if(telef == ""){
		Swal.fire("¡Add customer phone!");
		$("#customerPhone").focus();
		return valido = false; }

	if(estatus == false){
		Swal.fire("¡Add customer status!");
		return valido = false; }
		
	if(cliente_tipo == false){
		Swal.fire("¡Add customer type!");
		return valido = false; }

	if(emailcliente != ""){
		if (validateEmail(emailcliente) == false) {
			Swal.fire("¡Incorrect email format error!");
			//$('#iditemprimero').tab('show');
			return valido = false;
		}
	}
return valido ;
}

$(document).on('click', '.eliminaclient',function() {
	Swal.fire({
		title: "Remove",
		text: "you want to delete this client?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Continue ",
		cancelButtonText: "Cancel",
	}).then((result) => {
		if (result.isConfirmed) {
			$(this).closest('tr').remove();
			$("#nameclient").focus();
		} else {
		}
	});

});

console.log('aqui llega a registro js  actualizado');













