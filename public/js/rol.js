$("#btnnewRole").on("click", function () {
    $("#filasRolPermisos").html("");
    $(".modal-title").html("Create new Role");
    $("#formRol")[0].reset();
    document.getElementById("btnsave-rol").innerText = "Add Rol";
    $("#idRol").val("");
});

$(document).ready(function () {
tblRoles();
namepermisos();
});
//agregar permisos
$("#btn-addpermi").on("click", function () {
    var tr = $('<tr >');

    $("#filasRolPermisos").append(tr);
    
    tr.append("<td >"+$('#permisos').val()+" <input type='hidden' class='Permiso_nombre' name='permiso[]'  value="+$('#permisos').val()+"> </td>");
    tr.append('<td class="table-action" >&nbsp;<a href="#" class="eliminaPermiso"><i class="align-middle fas fa-fw fa-trash"></i></a></td>');

});

$(document).on('click', '.eliminaPermiso',function() {
	Swal.fire({
		title: "Remove",
		text: "you want to delete this permission?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Continue ",
		cancelButtonText: "Cancel",
	}).then((result) => {
		if (result.isConfirmed) {
			$(this).closest('tr').remove();
			
		} else {
		}
	});

});
// REGISTRAR NUEVO ROL
$("#btnsave-rol").on("click", function () {
    

    var rol = new FormData(document.getElementById("formRol"));

    $("input[name='permiso[]']").each(function(indice, inputDatos){
        console.log($(this).val());
	})
    console.log("inputid "+$("#idRol").val());
    if ($("#idRol").val() != "") {
        axios
        .post(principalUrl + "rol/actualiza", rol)
        .then((respuesta) => {
            console.log(respuesta.data)
           Swal.fire({
                position: "top-end",
                icon: "success",
                title: "actualized Rol!",
                showConfirmButton: false,
                timer: 1200,
            });
            tblRoles();
            namepermisos();
            $("#idRol").val("");
            $("#name_Rol").val("");
            $("#permisos").val("");
            $("#ModalRol").modal("hide");
        })
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
            }
        });
    } else {
        axios.post(principalUrl + "rol/add",rol)
        .then((respuesta) => {
            $('#ModalRol').modal('hide');
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "record saved!",
                showConfirmButton: false,
                timer: 1200,
            });
            tblRoles();
            namepermisos();
            $("#idRol").val("");
            $("#name_Rol").val("");
            $("#permisos").val("");
            $("#ModalRol").modal("hide");
        })
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
            }
        });
    }
});

//funcion para mostrar tabla cuestionario
function tblRoles() {
    var RolesTabla = $("#tabla-roles").DataTable();
    RolesTabla.destroy();

    var RolesTabla  = $("#tabla-roles").DataTable({
        responsive: true,
        ajax: {
            url: principalUrl + "roles/show",
            dataSrc: "",
        },
        columns: [
            {data:"id"},
            { data:"namerol" },
            {data: "name"},
            { data: "id",
                render: function (data) {
                    return (
                        "<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesRoles' id='editRol' href='#'><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> Edit</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesRoles'  id='deleteRol' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Delete</a><div class='dropdown-divider'></div>"
                    );
                },
            },
        ],
    });
}

//Editar Y ELIMINAR
$(document).on("click", ".opcionesRoles", function () {
    var id_Rol = $(this).find(".data").val();

    if (this.id == "editRol") {
        $("#filasRolPermisos").empty();
        axios
            .post(principalUrl + "rol/edita/" + id_Rol)
            .then((respuesta) => {
                $(".modal-title").html("Edit Rol");
                $("#name").focus();
                $("#idRol").val(respuesta.data[0].id);
                $("#name_rol").val(respuesta.data[0].namerol);
                $("#permisos").val("");
                respuesta.data.forEach(function (element) {
                    $("#filasRolPermisos").append("<tr> <td>"+element.name+"</td> <td class='table-action' >&nbsp;<a href='#' class='eliminaPermiso'><i class='align-middle fas fa-fw fa-trash'></i></a></td> </tr>"); 
                   });
                document.getElementById("btnsave-rol").innerText = "Update";
                $("#ModalRol").modal("show");

            console.log(respuesta.data);
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    } else if (this.id == "deleteRol") {
        Swal.fire({
            title: "Delete Rol",
            text: "Are you sure to delete the Rol?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuer",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .post(principalUrl + "rol/delete/" + id_Rol)
                    .then((respuesta) => {
                        respuesta.data;
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "record saved!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                        tblPregunta();
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

//name permission  funcion.
function namepermisos(){
    $("#permisos").empty();
    axios.get(principalUrl + "permisos/name")
    .then((respuesta) => {
        respuesta.data
        $("#permisos").append("<option value='' selected>Choose...</option>"); 
    
        respuesta.data.forEach(function (element) {
           $("#permisos").append("<option value="+element.name+" >"+element.name+"</option>"); 
        });
    
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

}