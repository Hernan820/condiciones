

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
	    muestra_preguntasrespuesta(respuesta.data.preguntasrespuesta);
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
					"<input name='radio-status_"+element.id+"' id='radio-status_"+element.id+"' type='radio' class='form-check-input cliente' value='social' checked>"+
					"<span class='form-check-label'>Social</span></label>"+
				"<label class='form-check'>"+
					"<input name='radio-status_"+element.id+"' id='radio-status_"+element.id+"' type='radio' class='form-check-input cliente' value='Tax ID'>"+
					"<span class='form-check-label'>TAX ID</span>"+
				"</label></div>"+
				"</div>";
			}else{		
				var status = "<div class='col-sm-10'>"+
				"<label class='form-check'>"+
					"<input name='radio-status_"+element.id+"' id='radio-status_"+element.id+"' type='radio' class='form-check-input cliente'value='social' >"+
					"<span class='form-check-label'>Social</span></label>"+
				"<label class='form-check'>"+
					"<input name='radio-status_"+element.id+"' id='radio-status_"+element.id+"' type='radio' class='form-check-input cliente' value='Tax ID' checked>"+
					"<span class='form-check-label'>TAX ID</span>"+
				"</label></div>"+
				"</div>";			}
	
				if(i > 0){$("#filaclient").append("<tr><td colspan='2'><br></td></tr>")}
				if(i == 0){$("#filaclient").append("<tr><th>Status</th><td><span class='badge bg-success' id='nombreetapa' style='padding-bottom: 5px;'>"+etaparegistro+"</span></td></tr>")}
				if(i == 0){$("#filaclient").append("<tr><th>Borrower</th><td><div class='col-md-12 '><div class='col-sm-12'><input type='text' name='nombre_"+element.id+"' id='nombre_"+element.id+"' value='"+element.nombre_cliente+"' class='form-control cliente' style='border: 0px;'></div></div></td></tr>")}else{$("#filaclient").append("<tr class='table-primary'><th>Co borrower</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='nombre_"+element.id+"' id='nombre_"+element.id+"' value='"+element.nombre_cliente+"' class='form-control cliente' style='border: 0px;'></div></div></td></tr>")}
	
		   $("#filaclient").append("<tr>"+
			   "<th>Telephone</th>"+
			  " <td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='telefono_"+element.id+"' id='telefono_"+element.id+"'  value='"+element.telefono+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		  " </tr><tr>"+
			   "<th>Legal Status</th>"+
			   "<td><div class='col-md-12'>"+status+
					  "</td>"+
		   "</tr><tr>"+
			   "<th>SSN</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='ssn_"+element.id+"' id='ssn_"+element.id+"' value='"+element.socials_number+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Email</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='correo_"+element.id+"' id='correo_"+element.id+"' value='"+element.correo+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Current address</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='direccion_"+element.id+"' id='direccion_"+element.id+"' value='"+element.direccion+"' class='form-control cliente' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Former address</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='segundadireccion_"+element.id+"' id='segundadireccion_"+element.id+"' value='"+element.direcionalternativa+"' class='form-control cliente' style='border: 0px;'></div></div></td></tr>"); 
			   $('#telefono_'+element.id).mask('(000) 000-0000');

		});
}

function tbldetalleregistro(detalleregistro,tiposprestamos) {
	$("#registrocliente").html('');
	$("#estadocasa").html('');
	$('#notaderegistro').html('');
	//$('#nameuser').html(detalleregistro[0].name);

	detalleregistro.forEach(function (element) { 

		$("#registrocliente").append("<tr><th>Contract date</th><td> <div class='form-group col-md-12'> <input type='date' class='form-control detalleregistro'  onchange='registrodetalle(this)' id='fechacontrato'  name='fechacontrato_"+element.id+"' value='"+element.fecha_firma+"' > </div></td></tr>"+
		"<tr><th>Contract receipt date</th><td>    <div class='form-group col-md-12'> <input type='date' class='form-control detalleregistro' onchange='registrodetalle(this)' id='fecharecep'  name='fecharecep_"+element.id+"'  value='"+element.fecha_recepcion+"'>	  </div> </td></tr>"+
		"<tr><th>State</th><!-- Select --><td><div class='col-md-12'><div class='col-sm-12'>  <select  onchange='registrodetalle(this)' id='estadocasa' name='estadocasa_"+element.id+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></select></div></div></td></tr>"+
		"<tr><th>Property adress</th><td> <div class='col-md-12'><div class='col-sm-12'><input onchange='registrodetalle(this)' type='text' name='direccionregistro_"+element.id+"' id='direccionregistro_"+element.id+"'  value='"+element.direccion_casa+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Purchace Price</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text'  onchange='registrodetalle(this)' name='preciocasa_"+element.id+"' id='preciocasa_"+element.id+"' value='"+element.precio_casa+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Down payment</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text'  onchange='registrodetalle(this)' name='dowpayment_"+element.id+"' id='dowpayment_"+element.id+"' value='"+element.dowpayment+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Type of loan</th><td><div class='col-md-12'><div class='col-sm-12'><select id='prestamonombre' name='prestamonombre_"+element.id+"'  onchange='registrodetalle(this)' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'></select></div></div></td></tr>"+
		"<tr><th>Drive</th><td></td></tr>"+
		"<tr><td colspan='2'><input type='text' onchange='registrodetalle(this)' name='drive_"+element.id+"' id='drive_"+element.id+"' value='"+element.drive+"' class='form-control detalleregistro' autocomplete='off' style='border: 0px;'>    </td></tr>"+
		"<tr><th>Realtor name</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text'  onchange='registrodetalle(this)' name='procesadorname_"+element.id+"' id='procesadorname_"+element.id+"' value='"+element.procesador+"' class='form-control detalleregistro'  autocomplete='off' style='border: 0px;'></div></div></td></tr>"+
		"<tr><th>Telephone</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text'  onchange='registrodetalle(this)' name='telefonoprecesor_"+element.id+"' id='telefonoprecesor_"+element.id+"' value='"+element.telefono_precesador+"' class='form-control detalleregistro'  autocomplete='off' style='border: 0px;'></div></div></td></tr>");
		$('#telefonoprecesor_'+element.id).mask('(000) 000-0000');
		$('#dowpayment_'+element.id).mask('00%');
		$('#notaderegistro').append('<textarea rows="6" class="form-control detalleregistro" name="notes_'+element.id+'" id="notes_'+element.id+'" style="border:0px">'+element.notas+'</textarea>');
		$('#datetimepicker-registro').datetimepicker({format: 'L'});
	    $('#datetimepicker-registrorecibido').datetimepicker();
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


function muestra_preguntasrespuesta(datosdepregunta){

	var clientes =[];
	var tiposcuestionario =[];

	datosdepregunta.forEach(function (element, i) {
		if(i == 0){
			clientes.push(element.nombre_cliente);
		}else if(!clientes.includes(element.nombre_cliente)){
			clientes.push(element.nombre_cliente);
		}
    });

	datosdepregunta.forEach(function (element, i) {
		if(i == 0){
			tiposcuestionario.push(element.nombre);
		}else if(!tiposcuestionario.includes(element.nombre)){
			tiposcuestionario.push(element.nombre);
		}
    });

	$("#pestanascuestion").html('');
	$("#tablasquestion").html('');
	tiposcuestionario.forEach(function (nombrecuestion,i) {
		$("#pestanascuestion").append('<a class="list-group-item list-group-item-action" id="item'+nombrecuestion+'" data-bs-toggle="list" href="#'+nombrecuestion+'" role="tab" style="font-size:10px">'+nombrecuestion+'</a>')

		$("#tablasquestion").append('<div class="tab-pane fade " id="'+nombrecuestion+'" role="tabpanel"><div class="card"> <div class="card-body"><h5 class="card-title"> Complete the following form</h5> <table class="table table-bordered small-text1" id="table'+nombrecuestion+'">'+
		'<thead> <tr></tr>'+
		'</thead><tbody id="question">'+
		'</tbody></table>    </div></div></div>')
		if(i == 0){	$('#item'+nombrecuestion).tab('show');	};

		muestrapreguntasclientes(datosdepregunta,nombrecuestion,clientes);
    });
}


function muestrapreguntasclientes(datosdepregunta,nombrecuestion,clientes) {
	
	$("#table"+nombrecuestion+" thead tr").html('');
	$("#table"+nombrecuestion+" tbody").html('');
	$("#table"+nombrecuestion+" thead tr").append('<th>Questions</th>');

	clientes.forEach(function (cliente,i) {
			$("#table"+nombrecuestion+" thead tr").append('<th>'+cliente+'</th>');
	});
	
	var arraypreguntas= [];
	datosdepregunta.forEach(function (element) {
		if(element.nombre == nombrecuestion){

		if(!arraypreguntas.includes(element.titulo_pregunta)){
			arraypreguntas.push(element.titulo_pregunta);

			var tr = $('<tr>');
			$("#table"+element.nombre+" tbody").append(tr);
			tr.append('<td>'+element.titulo_pregunta+'</td>');
	
			clientes.forEach(function (clientenombre,i) {
				if(clientenombre == element.nombre_cliente ){
					tr.append('<td><input type="text" name="respuestapregunta_'+element.id+'" id="respuestapregunta_'+element.id+'" class="form-control respuestacliente small-text1" placeholder="Answer" value="'+element.respuesta+'" style="border:0px"></td>');
				}
			});
			tr.append("</tr>");
		}else{
			var tabla = document.getElementById("table"+element.nombre);
			var posicion = arraypreguntas.indexOf(element.titulo_pregunta);
			var numeroFila = posicion + 1;

			var ultimaFila = tabla.rows[numeroFila];
			var nuevoTD = document.createElement("td");
			nuevoTD.innerHTML = '<td><input type="text" name="respuestapregunta_'+element.id+'" id="respuestapregunta_'+element.id+'" class="form-control respuestacliente small-text1" placeholder="Answer"  value="'+element.respuesta+'" style="border:0px"></td>';
		
			ultimaFila.appendChild(nuevoTD);
		}
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
	var id_cliente =nameinput.split('_')[1];

	var datosclient = new FormData();
	datosclient.append("nombre",$('#nombre_'+id_cliente).val());
	datosclient.append("telefono",$('#telefono_'+id_cliente).val());
	datosclient.append("status",$("input[name=radio-status_"+id_cliente+"]:checked").val());
	datosclient.append("ssnumber",$('#ssn_'+id_cliente).val());
	datosclient.append("email",$('#correo_'+id_cliente).val());
	datosclient.append("direccion",$('#direccion_'+id_cliente).val());
	datosclient.append("direccion2",$('#segundadireccion_'+id_cliente).val());
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

function registrodetalle(btn){
	var nameinput = $(btn).attr("name");
	var idregistro =nameinput.split('_')[1];

	var datosregistro = new FormData();
	datosregistro.append("fechafirma",$('#fechacontrato').val());
	datosregistro.append("fecharecep",$('#fecharecep').val());
	datosregistro.append("estadocasa",$('#estadocasa').val());
	datosregistro.append("direccionregistro",$('#direccionregistro_'+idregistro).val());
	datosregistro.append("preciocasa",$('#preciocasa_'+idregistro).val());
	datosregistro.append("dowpayment",$('#dowpayment_'+idregistro).val());
	datosregistro.append("id_prestamo",$('#prestamonombre').val());
	datosregistro.append("procesadorname",$('#procesadorname_'+idregistro).val());
	datosregistro.append("telefonoprecesor",$('#telefonoprecesor_'+idregistro).val());
	datosregistro.append("drive",$('#drive_'+idregistro).val());
	datosregistro.append("registronota",$('#notes_'+idregistro).val());
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
}

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

$(document).on('change', '.respuestacliente',function() { 
	
	var nameinput = $(this).attr("name");
	var id_respuesta =nameinput.split('_')[1];

	var datosrespuesta = new FormData();
	datosrespuesta.append("id_respuesta",id_respuesta );
	datosrespuesta.append("respuestapregunta",$('#respuestapregunta_'+id_respuesta).val());
	datosrespuesta.append("idregistro",$('#idregistro').val());

	axios.post(principalUrl+"pregunta/actualiza",datosrespuesta)
    .then((respuesta) => {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Updated answer!",
			showConfirmButton: false,
			timer: 1200,
		});
		muestra_preguntasrespuesta(respuesta.data);
	})
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
});

console.log('muestra el archivo detalle js');