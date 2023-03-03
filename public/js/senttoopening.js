
$(document).ready(function () {
    filesopening();
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
                    "</div></div>");
        },
        },
    ],
    createdRow: (row, data, dataIndex, cells) => {
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
    }
});


console.log('js la vista de file opening');

