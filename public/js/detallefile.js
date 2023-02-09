$("#datatables-clients").DataTable({
    responsive: true,
    order: [
        [1, "asc"]
    ]
});

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

$(document).ready(function () {

    var id_registro = $('#idregistro').val();
	$("#filaclient").html('');
    axios.post(principalUrl + "registro/clientes/"+id_registro)
	.then((respuesta) => {   
        console.log(respuesta.data);

        $('#nameclient').html(respuesta.data.clientes[0].nombre_cliente);
		$('#nameuser').html(respuesta.data.registro[0].name);

		respuesta.data.clientes.forEach(function (element , i) {

			if(element.status == "social"){
				var status = "<div class='col-sm-10'>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+i+"' type='radio' class='form-check-input'value='social' checked>"+
					"<span class='form-check-label'>Social</span></label>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+i+"' type='radio' class='form-check-input' value='Tax ID'>"+
					"<span class='form-check-label'>TAX ID</span>"+
				"</label></div>"+
			    "</div>";
			}else{		
				var status = "<div class='col-sm-10'>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+i+"' type='radio' class='form-check-input'value='social' >"+
					"<span class='form-check-label'>Social</span></label>"+
				"<label class='form-check'>"+
					"<input name='radio-status"+i+"' type='radio' class='form-check-input' value='Tax ID' checked>"+
					"<span class='form-check-label'>TAX ID</span>"+
				"</label></div>"+
			    "</div>";			}

				if(i > 0){$("#filaclient").append("<tr><td colspan='2'><br></td></tr>")}
				if(i == 0){$("#filaclient").append("<tr><th>Status</th><td><span class='badge bg-success' style='padding-bottom: 5px;'>"+respuesta.data.registro[0].nombre_etapa+"</span></td></tr>")}
				if(i == 0){$("#filaclient").append("<tr><th>Borrower</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.nombre_cliente+"' class='form-control' style='border: 0px;'></div></div></td></tr>")}else{$("#filaclient").append("<tr class='table-primary'><th>Co borrower</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.nombre_cliente+"' class='form-control' style='border: 0px;'></div></div></td></tr>")}

		   $("#filaclient").append("<tr>"+
			   "<th>Telephone</th>"+
			  " <td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.telefono+"' class='form-control' style='border: 0px;'></div></div></td>"+
		  " </tr><tr>"+
			   "<th>Legal Status</th>"+
			   "<td><div class='col-md-12'>"+status+
					  "</td>"+
		   "</tr><tr>"+
			   "<th>SSN</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.socials_number+"' class='form-control' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Email</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.correo+"' class='form-control' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Current address</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.direccion+"' class='form-control' style='border: 0px;'></div></div></td>"+
		   "</tr><tr>"+
			   "<th>Former address</th>"+
			   "<td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.direcionalternativa+"' class='form-control' style='border: 0px;'></div></div></td></tr>"); 
	    });

		respuesta.data.registro.forEach(function (element) { 
			$("#registrocliente").append("<tr><th>Contract date</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.fecha_firma+"' class='form-control' style='border: 0px;'></div></div></td></tr>"+
			"<tr><th>Contract receipt date</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.fecha_recepcion+"' class='form-control' style='border: 0px;'></div></div></td></tr>"+
			"<tr><th>State</th><!-- Select --><td><div class='col-md-12'><div class='col-sm-12'>  <select id='estadocliente' name='estadocliente' class='form-control'></select></div></div></td></tr>"+
			"<tr><th>Property adress</th><td> <div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.direccion_casa+"' class='form-control' style='border: 0px;'></div></div></td></tr>"+
			"<tr><th>Purchace Price</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.precio_casa+"' class='form-control' style='border: 0px;'></div></div></td></tr>"+
			"<tr><th>Down payment</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.dowpayment+"' class='form-control' style='border: 0px;'></div></div></td></tr>"+
			"<tr><th>Type of loan</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.nombre_prestamo +"' class='form-control' style='border: 0px;'></div></div></td></tr>"+
			"<tr><th>Drive</th><td></td></tr>"+
			"<tr><td colspan='2'><a target='_blank' href='"+element.drive+"'>"+element.drive+"</a></td></tr>"+
			"<tr><th>Realtor name</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='' value='"+element.procesador+"' class='form-control' style='border: 0px;'></div></div></td></tr>"+
			"<tr><th>Telephone</th><td><div class='col-md-12'><div class='col-sm-12'><input type='text' name='"+element.telefono_precesador+"' value='' class='form-control' style='border: 0px;'></div></div></td></tr>");
		});

		availableTags.forEach(function (element) { 
			if(respuesta.data.registro[0].estado === element){
				$("#estadocliente").append("<option value="+element+" selected>"+element+"</option>"); 
			}else{
				$("#estadocliente").append("<option value="+element+">"+element+"</option>"); 
			}
		});

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
					return ("<span class='badge bg-danger'>Complete</span>");
				}
			},
		    },
            { data: "chekc_documento",
			render: function (data) {
				if(data == 1){
					return ("<input type='checkbox' checked class='form-check-input'>");
				}else{
					return ("<input type='checkbox'  class='form-check-input'>");
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
				'Seguimiento recepcion documentos '+element.fecha+' '+element.hora+' </button> </h2>'+
			'<div id="notaregistro'+i+'" class="accordion-collapse collapse show" aria-labelledby="titulonota'+i+'">'+
				'<div class="accordion-body">'+element.nota_registro+'</div></div></div>');
		}else{
			$("#id_notasseguimiento").append('<div class="accordion-item"><h2 class="accordion-header" id="titulonota'+i+'">'+
				'<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#notaregistro'+i+'" aria-expanded="false" aria-controls="notaregistro'+i+'">'+
				  'Seguimiento recepcion documentos '+element.fecha+' '+element.hora+'</button></h2>'+
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
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
});

console.log('muestra el archivo detalle js');