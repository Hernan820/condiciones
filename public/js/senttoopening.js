
$(document).ready(function () {

    $("#selectusuarios").select2({
        dropdownParent: $('#modalAsignacion'),
        placeholder: "Select the users",
    });

   filesopening();
});

// Cuando la vista se cierra o se oculta, vacía el Select2
$('#modalAsignacion').on('hidden.bs.modal', function () {
    $("#selectusuarios").select2({
        dropdownParent: $('#modalAsignacion'),
        placeholder: "Select the users",
        tags: false,
    }).val([]).trigger('change');
    $("#selectusuarios").val([]);
    $("#selectusuarios").empty();
  });

function filesopening(){

    var registertbl	= $("#tblfilesopnening").DataTable();
    registertbl.destroy();

var registertbl	= $("#tblfilesopnening").DataTable({
    responsive: true,
    ajax: {             
        url: principalUrl + "registro/opnening",
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
            return ("<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button>"+
                     "<div class='dropdown-menu' style=''><a class='dropdown-item itemopening' id='primeritem' href='#'><input type='hidden' class='optionopening' value="+data+">"+
                    " <i class='align-middle me-2 fas fa-fw fa-list-alt' data-feather='more-vertical'></i> See details</a>"+
                    "<div class='dropdown-divider'></div><a class='dropdown-item itemopening' id='itemdos' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='optionopening' value="+data+">"+
                    "<i class='align-middle me-2 fas fa-fw fa-undo-alt' data-feather='edit'></i> Return to progress stage</a>"+
                    "<div class='dropdown-divider'></div><a class='dropdown-item itemopening' id='itemtres' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='optionopening' value="+data+">"+
                    "<i class='align-middle me-2 fas fa-fw fa-check' data-feather='edit'></i> Open loan</a>"+
                    "<div class='dropdown-divider'></div><a class='dropdown-item itemopening' id='itemcuatro' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='optionopening' value="+data+">"+
                    "<i class='align-middle me-2 fas fa-fw fa-users' data-feather='edit'></i> Assignments</a>"+
                    "</div></div>");
        },
        },
    ],
    createdRow: (row, data, dataIndex, cells) => {
        $(row).addClass(' text-center'); 
        if(data.fecha_abierto != null){
            $(row).addClass(' table-success');

        }else{
        if (data.id_estado == 2){
            $(row).addClass(' table-danger');
         }
        }
    }
});
 
}

var xgt;
$(document).on('click', '.itemopening',function() { 

	var idregistro = $(this).find(".optionopening").val();
    var item = this.id;

    if(item == 'primeritem'){

        if (xgt) {
			xgt.abort(); 
		  }
		  xgt = $.ajax({
			type:'GET',
			url: principalUrl+'registro/vistadetallefile/'+idregistro+'/1',
			dataType:"html",
		}).done(function(data) {
			$('.contenido').empty();   
			$('.contenido').html(data);   
		  });

    }else if(item == 'itemdos'){
        
        Swal.fire({
			title: "Return record",
			text: "Do you want to return this record back to review ?",
			icon: "info",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Continue",
			cancelButtonText: "Cancel",
		}).then((result) => {
			if (result.isConfirmed) {
                axios.post(principalUrl + "registro/cambioetapa/1/"+idregistro)
                .then((respuesta) => {
                    if(respuesta.data == 1){
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Record returned successfully !",
                            showConfirmButton: false,
                        });
                     filesopening();
                    }
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
			} else {
			}
		});

    }else if(item == 'itemtres'){
        Swal.fire({
			title: "Open record",
			text: "You want to open this record?",
			icon: "info",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Continue",
			cancelButtonText: "Cancel",
		}).then((result) => {
			if (result.isConfirmed) {
		
                axios.post(principalUrl + "registro/fecha/"+idregistro)
                .then((respuesta) => {
                    if(respuesta.data == 1){
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Open loan!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                     filesopening();
                    }
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
			} else {
			}
		});
    }else if(item == 'itemcuatro'){

      $("#selectusuarios").select2("data", null);
      $("#selectusuarios").empty();
      $("#formasignacion")[0].reset();
      $("#usuariosderesgitro").val('');
      $("#registroid").val('');

      var arryaRutas = ['condiciones/Users','registro/reporte/'+idregistro,'registro/usuariosasignados/'+idregistro];
      Promise.all(arryaRutas.map( item => { return axios.get(principalUrl +item) }))
        .then(nuevo_arreglo => {  

            console.log(nuevo_arreglo[0].data);
            console.log(nuevo_arreglo[1].data);
            var arrayusuaios = [];
            nuevo_arreglo[2].data.forEach(function (element,i) {
                if(!arrayusuaios.includes(element.id_usuario)){
                    arrayusuaios.push(element.id_usuario);
                    if(i == 0){
                        $('#usuariosderesgitro').val(element.id_usuario);
                    }else{
                        var valor = $('#usuariosderesgitro').val();
                        $('#usuariosderesgitro').val(valor+','+element.id_usuario);
                    }
                }
             });
            // $.fn.select2.defaults.reset();

             var usuarios = $.map(nuevo_arreglo[0].data, function(item) {
                return {id: item.id, text: item.name};
             })
             $("#selectusuarios").select2({
                dropdownParent: $('#modalAsignacion'),
                placeholder: "Select the users",
                data: usuarios
             });
             $("#fechacontrato").val(nuevo_arreglo[1].data.registros[0].fecha_firma);
             $("#clienteregistro").val(nuevo_arreglo[1].data.registros[0].nombre_cliente);
             $("#registroid").val(nuevo_arreglo[1].data.registros[0].idregister);
             $('#modalAsignacion').modal('show');
        })
        .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
        });
    }
});

$('#btnAsigancion').on('click', function() { 

	if ( $("#selectusuarios").val() == "") {Swal.fire("¡Select a user to assign the loan!"); return;}

    var valor1 =$("#selectusuarios").val();
    var valor2 =$("#usuariosderesgitro").val().split(',');
    var nombres = ''
    valor2.forEach(function (element,i) {
        if(valor1.includes(element)){
            var opcionTexto = $('#selectusuarios option[value="'+element+'"]').text();
            if(i == 0){nombres= opcionTexto;
            }else{nombres= nombres+','+opcionTexto;}
        }
    });

	if ( nombres != "") {Swal.fire("¡Users "+nombres+" are already assigning to this record!"); return;}

	var datos = new FormData();
	    datos.append("usuariosselect",$('#selectusuarios').val());
		datos.append("idregistro",$('#registroid').val());

    axios.post(principalUrl+"registro/asiganacion",datos)
    .then((respuesta) => {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Open loan!",
            showConfirmButton: false,
            timer: 1000,
        });
	  $('#modalAsignacion').modal('hide');
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
});


console.log('js la vista de file opening');

