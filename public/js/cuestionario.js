$("#btn-add-cuestionario").on("click", function () {
    $(".modal-title").html("Create new Questionary");
    $("#form-cuestionario")[0].reset();
    document.getElementById("guardar-cuestionario").innerText = "Add Questionary";
    $("#id-cuestionario").val("");
});

$(document).ready(function () {
       $('#datetimepicker-minimum-CUESTIONARIO').datetimepicker({format: 'L'});
        tblCuestionario();
       
   
    });

//FUNCION PARA VALIDACION
    function validacuestionario() {
    
    var valido = true;
    var fecha= $("#date").val();
    var detalle = $("#detalle").val();
    var nombre = $("#name").val();
    var flag= $("#flag").val();
  
   
    if (fecha == "") {
        Swal.fire("¡Add date!");
        $("#date").focus();
        return (valido = false);
    }

    if (detalle == "") {
        Swal.fire("¡Add Detail!");
        $("#detalle").focus();
        return (valido = false);
    }

    if (nombre == "") {
        Swal.fire("¡Add name of questionary!");
        $("#name").focus();
        return (valido = false);
    }

    if (flag !=1 && flag != 0) {
        Swal.fire("¡Add flag!");
        $("#flag").focus();
        return (valido = false);
    }

    return valido;
}
// REGISTRAR NUEVO CUESTIONARIO
$("#guardar-cuestionario").on("click", function () {
    
    if (validacuestionario() == false) {
        return;
    }

    var cuestionario = new FormData(document.getElementById("form-cuestionario"));
    
    cuestionario.append("id",$("#id-cuestionario").val());
    cuestionario.append("date",$("#date").val());
    cuestionario.append("detalle",$("#detalle").val());
    cuestionario.append("name",$("#name").val());
    cuestionario.append("flag",$("#flag").val());
    

    if ($("#id-cuestionario").val() != "") {
        axios
        .post(principalUrl + "cuestionario/actualiza", cuestionario)
        .then((respuesta) => {
            console.log(respuesta.data)
           Swal.fire({
                position: "top-end",
                icon: "success",
                title: "actualized Questionary!",
                showConfirmButton: false,
                timer: 1200,
            });
            tblCuestionario();
            $("#id-cuestionario").val("");
            $("#date").val("");
            $("#detalle").val("");
            $("#name").val("");
            $("#flag").val("");
            $("#Modal-cuestionario").modal("hide");
        })
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
            }
        });
    } else {
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
            $("#id-cuestionario").val("");
            $("#date").val("");
            $("#detalle").val("");
            $("#name").val("");
            $("#flag").val("");
            $("#Modal-cuestionario").modal("hide");
        })
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
            }
        });
    }
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
            { data: "flag",
            render: function (data) {
				if(data == 1){
					return (" <td>Cliente</td>");
				}else if(data==0){
					return (" <td>Usuario</td>");
				}
			}, },

            { data: "id",
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
//Editar Y ELIMINAR
$(document).on("click", ".opcionesCuestionario", function () {
    var id_cuestionario = $(this).find(".data").val();

    if (this.id == "editCuestionario") {
        axios
            .post(principalUrl + "cuestionario/edita/" + id_cuestionario)
            .then((respuesta) => {
                $("#Modal-cuestionario").modal("show");
                $(".modal-title").html("Edit Questionary");
                $("#date").focus();
                $("#id-cuestionario").val(respuesta.data[0].id);
                $("#date").val(respuesta.data[0].fecha);
                $("#detalle").val(respuesta.data[0].detalle);
                $("#name").val(respuesta.data[0].nombre);
                $("#flag").val(respuesta.data[0].flag);
                
                document.getElementById("guardar-cuestionario").innerText = "Update";
              

            console.log(respuesta.data);
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    } else if (this.id == "deleteCuestionario") {
        Swal.fire({
            title: "Delete  Questionary",
            text: "Are you sure to delete the questionary?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuer",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .post(principalUrl + "cuestionario/delete/" + id_cuestionario)
                    .then((respuesta) => {
                        respuesta.data;
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "record saved!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                        tblCuestionario();
                    })
                    .catch((error) => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    });
            } 
        });
    }
});
