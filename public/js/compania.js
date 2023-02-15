$("#btn-addcompany").on("click", function () {
    $(".modal-title").html("Create new company");
    $("#formCompany")[0].reset();
    $("#idCompania").val("");
    document.getElementById("guardar-compania").innerText = "Add company";
});

$(document).ready(function () {
    tblCompania();
    
    });

//registrar compania
$('#guardar-compania').on('click', function() { 
   

	var compania = new FormData(document.getElementById("formCompany"));

         compania.append("id", $("#idCompania").val());
	     compania.append("nombre",$('#nombre').val());
         compania.append("telefono",$('#telefono').val());
         compania.append("webSite",$('#webSite').val());
         compania.append("logo",$('#logo').val());

         if ($("#idCompania").val() != "") {
            axios
                .post(principalUrl + "compania/actualiza", compania)
                .then((respuesta) => {
                    console.log(respuesta.data)
                   Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "actualized Company!",
                        showConfirmButton: false,
                        timer: 1200,
                    });
                    tblCompania();
                    $("#idCompania").val("");
                    $("#nombre").val("");
                    $("#telefono").val("");
                    $("#webSite").val("");
                    $("#logo").val("");
                    $("#Modal-compania").modal("hide");
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
        } else {
            axios
                .post(principalUrl + "compania/add", compania)
                .then((respuesta) => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "added Company!",
                        showConfirmButton: false,
                        timer: 1200,
                    });
    
                    tblCompania();
                    $("#idCompania").val("");
                    $("#nombre").val("");
                    $("#telefono").val("");
                    $("#logo").val("");
                    $("#webSite").val("");
                    $("#Modal-compania").modal("hide");
                })
                .catch((error) => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
            }
    });

//LISTAR REGISTRO EN LA TABLA
function tblCompania() {
    var CompaniaTabla = $("#tabla-compania").DataTable();
    CompaniaTabla.destroy();

    var CompaniaTabla  = $("#tabla-compania").DataTable({
        responsive: true,
        ajax: {
            url: principalUrl + "compania/show",
            dataSrc: "",
        },
        columns: [
            { data: "nombre" },
            { data: "telefono" },
            { data: "logo"},
            { data: "webSite"},
            {
                data: "id",
                render: function (data) {
                    return (
                        "<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesCompania' id='editCompania' href='#'><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> Edit</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesCompania'  id='deleteCompania' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Delete</a><div class='dropdown-divider'></div>"
                    );
                },
            },
        ],
    });
}
//editar compania
$(document).on("click", ".opcionesCompania", function () {
    var idCompania = $(this).find(".data").val();

    if (this.id == "editCompania") {
        axios
            .post(principalUrl + "compania/edita/" + idCompania)
            .then((respuesta) => {
                $("#Modal-compania").modal("show");
                $("#nombre").focus();
                document.getElementById("guardar-compania").innerText = "Update";
                $(".modal-title").html("edit Company");
                $("#idCompania").val(respuesta.data[0].id);
                $("#nombre").val(respuesta.data[0].nombre);
                $("#telefono").val(respuesta.data[0].telefono);
                 $("#webSite").val(respuesta.data[0].webSite);
                 $("#logo").val(respuesta.data[0].logo);
                
            console.log(respuesta.data);
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    } else if (this.id == "deleteCompania") {
        Swal.fire({
            title: "Delete Company",
            text: "Are you sure to delete the Company?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuer",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .post(principalUrl + "compania/delete/" + idCompania)
                    .then((respuesta) => {
                        respuesta.data;
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "record updated!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                        tblCompania();

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
console.log('aqui llega a compania js');