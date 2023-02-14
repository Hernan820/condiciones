
const availableTags = [
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
$(document).ready(function () {
	$("#datatables-clients").DataTable({
		responsive: true,
		order: [
			[1, "asc"]
		]
	});

    var id_registro = $('#idregistro').val();
	$("#filaclient").html('');
    axios.post(principalUrl + "registro/clientes/"+id_registro)
	.then((respuesta) => {   
        console.log(respuesta.data);

        $('#nameclient').html(respuesta.data.clientes[0].nombre_cliente);
		$('#nameuser').html(respuesta.data.registro[0].name);

		tbldetalleclientes(respuesta.data.clientes,respuesta.data.registro[0].nombre_etapa);
		tbldetalleregistro(respuesta.data.registro, respuesta.data.tipoprestamos);
		tbldocs(respuesta.data.docs);
		tblquestionario(respuesta.data.tipopreguntas , respuesta.data.clientes);
		notasregistro(respuesta.data.notas)
	})
	.catch((error) => {
		if (error.response) {
			console.log(error.response.data);
		}
	});
 });


 function tbldetalleclientes(clientesregistro,etaparegistro) {
	$("#filaclient").html('');


		$('#nameclient').html(clientesregistro[0].nombre_cliente);

		clientesregistro.forEach(function (element , i) {
	
			if(element.status == "social"){
				var status = "<div class='col-sm-10'>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+element.id+"' id='radio-status"+element.id+"' type='radio' class='form-check-input cliente' value='social' checked>"+
					"<span class='form-check-label'>Social</span></label>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+element.id+"' id='radio-status"+element.id+"' type='radio' class='form-check-input cliente' value='Tax ID'>"+
					"<span class='form-check-label'>TAX ID</span>"+
				"</label></div>"+
				"</div>";
			}else{		
				var status = "<div class='col-sm-10'>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+element.id+"' id='radio-status"+element.id+"' type='radio' class='form-check-input cliente'value='social' >"+
					"<span class='form-check-label'>Social</span></label>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+element.id+"' id='radio-status"+element.id+"' type='radio' class='form-check-input cliente' value='Tax ID' checked>"+
					"<span class='form-check-label'>TAX ID</span>"+
				"</label></div>"+
				"</div>";			}
	
				if(i > 0){$("#filaclient").append("<tr><td colspan='2'><br></td></tr>")}
				if(i == 0){$("#filaclient").append("<tr><th>Status</th><td><span class='badge bg-success' id='nombreetapa' style='padding-bottom: 5px;'>"+etaparegistro+"</span></td></tr>")}
				if(i == 0){$("#filaclient").append("<tr><th>Borrower</th><td><div class='col-md-12 '><div class='col-sm-12'><input type='text' name='nombre"+element.id+"' id='nombre"+element.id+"' value='"+element.nombre_cliente+"' class='form-control cliente' style='border: 0px;'></div></div></td></tr>")}else{$("#filaclient").append("<tr class='table-primary'><th>Co borrower</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='nombre"+element.id+"' id='nombre"+element.id+"' value='"+element.nombre_cliente+"' class='form-control cliente' style='border: 0px;'></div></div></td></tr>")}
	
		   $("#filaclient").append("<tr>"+
			   "<th>Telephone</th>"+
			  " <td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='telefono"+element.id+"' id='telefono"+element.id+"'  value='"+element.telefono+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		  " </tr><tr>"+
			   "<th>Legal Status</th>"+
			   "<td><div class='col-md-12'>"+status+
					  "</td>"+
		   "</tr><tr>"+
			   "<th>SSN</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='ssn"+element.id+"' id='ssn"+element.id+"' value='"+element.socials_number+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Email</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='correo"+element.id+"' id='correo"+element.id+"' value='"+element.correo+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Current address</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='direccion"+element.id+"' id='direccion"+element.id+"' value='"+element.direccion+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Former address</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='segundadireccion"+element.id+"' id='segundadireccion"+element.id+"' value='"+element.direcionalternativa+"' class='form-control cliente' style='border: 0px;'></div></div></td></tr>"); 
			   $('#telefono'+element.id).mask('(000) 000-0000');

		});
}

function tbldetalleregistro(detalleregistro,tiposprestamos) {
	$("#registrocliente").html('');
	$("#estadocasa").html('');
	$('#notaderegistro').html('');
	//$('#nameuser').html(detalleregistro[0].name);

	detalleregistro.forEach(function (element) { 
		$("#registrocliente").append("<tr><th>Contract date</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='fechafirma"+element.id+"' id='fechafirma"+element.id+"' value='"+element.fecha_firma+"' class='form-control detalleregistro'  autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Contract receipt date</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='fecharecep"+element.id+"' id='fecharecep"+element.id+"' value='"+element.fecha_recepcion+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>State</th><!-- Select --><td><div class='col-md-12'><div class='col-sm-12'>  <select id='estadocasa' name='estadocasa"+element.id+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></select></div></div></td></tr>"+
		"<tr><th>Property adress</th><td> <div class='col-md-12'><div class='col-sm-12'><input type='text' name='direccionregistro"+element.id+"' id='direccionregistro"+element.id+"'  value='"+element.direccion_casa+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Purchace Price</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='preciocasa"+element.id+"' id='preciocasa"+element.id+"' value='"+element.precio_casa+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Down payment</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='dowpayment"+element.id+"' id='dowpayment"+element.id+"' value='"+element.dowpayment+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Type of loan</th><td><div class='col-md-12'><div class='col-sm-12'><select id='prestamonombre' name='prestamonombre"+element.id+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></select></div></div></td></tr>"+
		"<tr><th>Drive</th><td></td></tr>"+
		"<tr><td colspan='2'><input type='text' name='drive"+element.id+"' id='drive"+element.id+"' value='"+element.drive+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'>    </td></tr>"+
		"<tr><th>Realtor name</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='procesadorname"+element.id+"' id='procesadorname"+element.id+"' value='"+element.procesador+"' class='form-control detalleregistro'  autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Telephone</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='telefonoprecesor"+element.id+"' id='telefonoprecesor"+element.id+"' value='"+element.telefono_precesador+"' class='form-control detalleregistro'  autocomplete='off' style='border: 0px;'></div></div></td></tr>");
		$('#telefonoprecesor'+element.id).mask('(000) 000-0000');
		$('#dowpayment'+element.id).mask('00%');
		$('#notaderegistro').append('<textarea rows="6" class="form-control detalleregistro" name="notes'+element.id+'" id="notes'+element.id+'" style="border:0px">'+element.notas+'</textarea>');
	});	

	availableTags.forEach(function (element) { 
		if(detalleregistro[0].estado === element){
			$("#estadocasa").append("<option value='"+element+"' selected>"+element+"</option>"); 
		}else{
			$("#estadocasa").append("<option value='"+element+"'>"+element+"</option>"); 
		}
	});

	tiposprestamos.forEach(function (element) { 
		if(detalleregistro[0].nombre_prestamo === element.nombre_prestamo){
			$("#prestamonombre").append("<option value='"+element.id+"' selected>"+element.nombre_prestamo+"</option>"); 
		}else{
			$("#prestamonombre").append("<option value='"+element.id+"'>"+element.nombre_prestamo+"</option>"); 
		}
	});
}

 function tbldocs(datos){
	var registertbl	= $("#datatables-document").DataTable();
        registertbl.destroy();
    var registertbl	= $("#datatables-document").DataTable({
		responsive: true,
		data: datos,
		columns: [
            { data: "nombre_doc" },
            { data: "chekc_documento",
			render: function (data) {
				if(data == 1){
					return ("<span class='badge bg-success'>Complete</span>");
				}else{
					return ("<span class='badge bg-danger'>Incomplete</span>");
				}
			},
		    },
            { data: "chekc_documento",
			render: function (data, type, row) {
							var iddetaledoc = row["id"];
				if(data == 1){
					return ("<input type='checkbox' name='docsdetalle_"+iddetaledoc+"'  checked class='form-check-input documentoscheck'>");
				}else{
					return ("<input type='checkbox' name='docsdetalle_"+iddetaledoc+"' class='form-check-input documentoscheck'>");
				}
			},
		    },
		],
	});
}

function tblquestionario(tipopreguntas,clientes){
	$("#pestanascuestion").html('');
	var tipocuestionario =[];

	tipopreguntas.forEach(function (element, i) {
		if(i == 0){
			tipocuestionario.push(element.nombre);
		}else if(!tipocuestionario.includes(element.nombre)){
			tipocuestionario.push(element.nombre);
		}
    });


	tipocuestionario.forEach(function (element,i) {
		$("#pestanascuestion").append('<a class="list-group-item list-group-item-action " data-bs-toggle="list"                   href="#'+element+'" role="tab" style="font-size:10px">'+element+'</a>')


		$("#tablasquestion").append('<div class="tab-pane fade " id="'+element+'" role="tabpanel"><div class="card"> <div class="card-body"><h5 class="card-title"> Complete the following form</h5>                                                <table class="table table-bordered small-text1" id="table'+element+'">'+
		'<thead> <tr></tr>'+
		'</thead><tbody id="question">'+
		'</tbody></table>    </div></div></div>')

		tblquiestionarios(tipopreguntas,element,clientes);
    });


}

function tblquiestionarios(tipopreguntas,nombrequestion,clientes){
	$("#table"+nombrequestion+" thead tr").html('');
	$("#table"+nombrequestion+" tbody").html('');

	$("#table"+nombrequestion+" thead tr").append('<th>Questions</th>');

	clientes.forEach(function (element,i) {
			$("#table"+nombrequestion+" thead tr").append('<th>'+element.nombre_cliente+'</th>');
	});

	tipopreguntas.forEach(function (element) {

		if(element.nombre == nombrequestion){
			var tr = $('<tr>');
			$("#table"+nombrequestion+" tbody").append(tr);
			tr.append('<td>'+element.titulo_pregunta+'</td>');
	
			clientes.forEach(function (element,i) {
				tr.append('<td><input type="text" class="form-control small-text1" style="border:0px"></td>');
			});
			tr.append("</tr>");
		}
	}); 
}

function notasregistro(notas){
	$("#id_notasseguimiento").html('');
	notas.forEach(function (element,i) {

		if(i == 0){
			$("#id_notasseguimiento").append('<div class="accordion-item"><h2 class="accordion-header" id="titulonota'+i+'">'+
				'<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#notaregistro'+i+'" aria-expanded="true" aria-controls="notaregistro'+i+'">'+
				'Document reception follow-up '+element.nombre_usuario+' '+element.fecha+' '+element.hora+' </button> </h2>'+
			'<div id="notaregistro'+i+'" class="accordion-collapse collapse show" aria-labelledby="titulonota'+i+'">'+
				'<div class="accordion-body">'+element.nota_registro+'</div></div></div>');
		}else{
			$("#id_notasseguimiento").append('<div class="accordion-item"><h2 class="accordion-header" id="titulonota'+i+'">'+
				'<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#notaregistro'+i+'" aria-expanded="false" aria-controls="notaregistro'+i+'">'+
				  'Document reception follow-up '+element.nombre_usuario+' '+element.fecha+' '+element.hora+'</button></h2>'+
			 ' <div id="notaregistro'+i+'" class="accordion-collapse collapse" aria-labelledby="titulonota'+i+'">'+
				'<div class="accordion-body">'+element.nota_registro+'</div></div></div>');
		}
	});

}


$('#btnseguimiento').on('click', function() { 
	$('#modalnota_seguimiento').modal('show');
});

$('#btnnotaseguimiento').on('click', function() { 
	if($('#notaseguimiento').val() ==""){Swal.fire("¡Add a follow up note!");return;}

	var datosnotas = new FormData();
	datosnotas.append("nota_seguimiento",$('#notaseguimiento').val());
	datosnotas.append("id_registro",$('#idregistro').val());

	axios.post(principalUrl+"registro/notaseguimiento",datosnotas)
    .then((respuesta) => {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Added follow up note!",
			showConfirmButton: false,
			timer: 1200,
		});
		$('#modalnota_seguimiento').modal('hide');
		notasregistro(respuesta.data);
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
});

$(document).on('change', '.cliente',function() { 
	var nameinput = $(this).attr("name");
	var id_cliente =nameinput.slice(-1);

	var datosclient = new FormData();
	datosclient.append("nombre",$('#nombre'+id_cliente).val());
	datosclient.append("telefono",$('#telefono'+id_cliente).val());
	datosclient.append("status",$("input[name=radio-status"+id_cliente+"]:checked").val());
	datosclient.append("ssnumber",$('#ssn'+id_cliente).val());
	datosclient.append("email",$('#correo'+id_cliente).val());
	datosclient.append("direccion",$('#direccion'+id_cliente).val());
	datosclient.append("direccion2",$('#segundadireccion'+id_cliente).val());
	datosclient.append("idcliente",id_cliente);
	datosclient.append("idregistro",$('#idregistro').val());

	axios.post(principalUrl+"cliente/actualiza",datosclient)
    .then((respuesta) => {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Updated client!",
			showConfirmButton: false,
			timer: 1200,
		});
		tbldetalleclientes(respuesta.data,$('#nombreetapa').val());

	})
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
  
 });

$(document).on('change', '.detalleregistro',function() { 
	var nameinput = $(this).attr("name");
	var idregistro =nameinput.slice(-1);
	var datosregistro = new FormData();
	datosregistro.append("fechafirma",$('#fechafirma'+idregistro).val());
	datosregistro.append("fecharecep",$('#fecharecep'+idregistro).val());
	datosregistro.append("estadocasa",$('#estadocasa').val());
	datosregistro.append("direccionregistro",$('#direccionregistro'+idregistro).val());
	datosregistro.append("preciocasa",$('#preciocasa'+idregistro).val());
	datosregistro.append("dowpayment",$('#dowpayment'+idregistro).val());
	datosregistro.append("id_prestamo",$('#prestamonombre').val());
	datosregistro.append("procesadorname",$('#procesadorname'+idregistro).val());
	datosregistro.append("telefonoprecesor",$('#telefonoprecesor'+idregistro).val());
	datosregistro.append("drive",$('#drive'+idregistro).val());
	datosregistro.append("registronota",$('#notes'+idregistro).val());
	datosregistro.append("idregistro",$('#idregistro').val());
	
	axios.post(principalUrl+"registro/actualiza",datosregistro)
    .then((respuesta) => {
		tbldetalleregistro(respuesta.data.detalleresgitro,respuesta.data.prestamos);
		respuesta.data
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Record updated!",
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


$(document).on('change', '.documentoscheck',function() { 
	var nameinput = $(this).attr("name");
	var id_doc =nameinput.split('_')[1];

	var datosdocs = new FormData();
	datosdocs.append("id_doc",id_doc );
	datosdocs.append("idregistro",$('#idregistro').val());
    if( $(this).is(':checked') ) {
        datosdocs.append("documento", 1);
    }else {
        datosdocs.append("documento", 0);
    }

	axios.post(principalUrl+"docs/actualiza",datosdocs)
    .then((respuesta) => {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Updated client!",
			showConfirmButton: false,
			timer: 1200,
		});
		tbldocs(respuesta.data);
	})
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

});
console.log('muestra el archivo detalle js');