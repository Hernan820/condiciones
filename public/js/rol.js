$("#btnnewRole").on("click", function () {
    $(".modal-title").html("Create new Role");
    $("#formRol")[0].reset();
    document.getElementById("btnsave-rol").innerText = "Add Rol";
    $("#id_Rol").val("");
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