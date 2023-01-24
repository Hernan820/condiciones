


	// Datatables Responsive
$("#datatables-reponsive").DataTable({
	responsive: true
});

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

 });


 $('#btnmodalfile').on('click', function() {

	datosfile();
	$('#newFile').modal('show');

  });



function datosfile(){

	$("#formregistro")[0].reset();

	// MUESTRA DOCUMENTOS
	$("#listdocumentos").empty();
	$("#tbldoc").empty();

	
	axios.post(principalUrl + "condicion/documentos")
	.then((respuesta) => {   

		$("#listdocumentos").append("<label class='col-form-label  pt-sm-0'>Documents</label>"); 
   
		respuesta.data.forEach(function (element) {
		   $("#listdocumentos").append("<div class='mb-3 row'><div class='col-sm-10'> <label class='form-check m-0'><input type='checkbox' class='form-check-input' id='ssmm' name='chekcdocument[]' value="+element.id+"> <span class='form-check-label'>"+element.nombre_doc+"</span> </label> </div>  </div>"); 
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
	   $("#cuestionarios").append("<div class='mb-3 row'> <div class='col-sm-10'> <label class='form-check m-0'> <input type='checkbox' class='form-check-input' name='checkcuestionario[]' value="+element.id+"> <span class='form-check-label'>"+element.nombre+"</span></label></div></div>"); 
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

	var datos = new FormData(document.getElementById("formregistro"));
	     datos.append("estadocasa",$('#estadoscasa').val());

    axios.post(principalUrl + "condicion/agregaregistro",datos)
    .then((respuesta) => {
		respuesta.data
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


console.log('aqui llega a registro js  actualizado');














