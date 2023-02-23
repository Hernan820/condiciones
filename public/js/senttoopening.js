
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
                    " <i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> OPEN LOAN</a> </div></div>");
        },
        },
    ],
    createdRow: (row, data, dataIndex, cells) => {
        if (data.id_estado == 2){
            $(row).addClass(' table-danger'); }
    }
});
 
}


$(document).on('click', '.itemopening',function() { 

	var idregistro = $(this).find(".optionopening").val();

    var item = this.id;

    if(item == 'primeritem'){
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
            }
        })
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
            }
        });
    }
});


console.log('js la vista de file opening');

