$(document).ready(function () {
       $('#datetimepicker-minimum-CUESTIONARIO').datetimepicker({format: 'L'});
        tblCuestionario();
        $("#telefono").mask("(000) 000-0000");
   
    });
// REGISTRAR NUEVO CUESTIONARIO
$("#guardar-cuestionario").on("click", function () {
   var cuestionario = new FormData();
  
    cuestionario .append("date", $("#date").val());
    cuestionario .append("detail", $("#detail").val());
    cuestionario .append("name", $("#name").val());
    cuestionario .append("flag", $("#flag").val());

    axios.post(principalUrl + "cuestionario/add",cuestionario)
    .then((respuesta) => {
		$('#Modal-cuestionario').modal('hide');
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "record saved!",
			showConfirmButton: false,
			timer: 1200,
		});
        tblCuestionario();
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

});

//funcion para mostrar tabla cuestionario
function tblCuestionario() {
    var CuestionarioTabla = $("#tabla-cuestionario").DataTable();
    CuestionarioTabla.destroy();

    var CuestionarioTabla  = $("#tabla-cuestionario").DataTable({
        responsive: true,
        ajax: {
            url: principalUrl + "cuestionario/show",
            dataSrc: "",
        },
        columns: [
            { data: "fecha" },
            { data: "detalle" },
            { data: "nombre",},
            { data: "flag"},
            {
                data: "id",
                render: function (data) {
                    return (
                        "<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesCuestionario' id='editCuestionario' href='#'><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> Edit</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesCuestionario'  id='deleteCuestionario' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Delete</a><div class='dropdown-divider'></div>"
                    );
                },
            },
        ],
    });
}
