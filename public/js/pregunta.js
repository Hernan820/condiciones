$("#btn-add-pregunta").on("click", function () {
    $(".modal-title").html("Create new Question");
    $("#form-pregunta")[0].reset();
    document.getElementById("guardar-pregunta").innerText = "Add Question";
    $("#id_pregunta").val("");
    namecuestionario();
    categoriaName();
});

//document
$(document).ready(function () {
    namecuestionario();
    categoriaName();
    tblPregunta();
  });

$("#guardar-pregunta").on("click", function () {
    
    var pregunta = new FormData(document.getElementById("form-pregunta"));

    pregunta.append("idPregunta",$("#id_pregunta").val());
    pregunta.append("title",$("#title").val());
    pregunta.append("iden_cuestionario",$("#iden_cuestionario").val());
    pregunta.append("category",$("#category").val());

    if ($("#id_pregunta").val() != "") {
        axios
        .post(principalUrl + "pregunta/actualiza", pregunta)
        .then((respuesta) => {
            console.log(respuesta.data)
           Swal.fire({
                position: "top-end",
                icon: "success",
                title: "actualized Question!",
                showConfirmButton: false,
                timer: 1200,
            });
            tblPregunta();
            $("#id_pregunta").val("");
            $("#title").val("");
            $("#iden_cuestionario").val("");
            $("#category").val("");
            $("#Modal-pregunta").modal("hide");
        })
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
            }
        });
        
    } else {
        axios.post(principalUrl + "pregunta/add",pregunta)
        .then((respuesta) => {
            $('#Modal-pregunta').modal('hide');
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "record saved!",
                showConfirmButton: false,
                timer: 1200,
            });
            tblPregunta();
            $("#id_pregunta").val("");
            $("#title").val("");
            $("#iden_cuestionario").val("");
            $("#category").val("");
            $("#Modal-pregunta").modal("hide");
        })
        .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
    }
});
//funcion para mostrar tabla cuestionario
function tblPregunta() {
    var PreguntaTabla = $("#tabla-pregunta").DataTable();
    PreguntaTabla.destroy();

    var PreguntaTabla  = $("#tabla-pregunta").DataTable({
        responsive: true,
        ajax: {
            url: principalUrl + "pregunta/show",
            dataSrc: "",
        },
        columns: [
            { data: "titulo_pregunta" },
            { data: "nombre" },
            { data: "nombre_categoria"},
            { data: "id",
                render: function (data) {
                    return (
                        "<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesPreguntas' id='editPregunta' href='#'><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> Edit</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesPreguntas'  id='deletePregunta' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Delete</a><div class='dropdown-divider'></div>"
                    );
                },
            },
        ],
    });
}

//Editar Y ELIMINAR
$(document).on("click", ".opcionesPreguntas", function () {
    var id_pregunta = $(this).find(".data").val();

    if (this.id == "editPregunta") {
        axios
            .post(principalUrl + "pregunta/edita/" + id_pregunta)
            .then((respuesta) => {
                $(".modal-title").html("Edit Question");
                $("#title").focus();
                $("#id_pregunta").val(respuesta.data[0].id_pregunta);
                $("#title").val(respuesta.data[0].titulo_pregunta);
                $("#iden_cuestionario").val(respuesta.data[0].idcuestionario);
                $("#category").val(respuesta.data[0].idcategoria);
                document.getElementById("guardar-pregunta").innerText = "Update";
                $("#Modal-pregunta").modal("show");

            console.log(respuesta.data);
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    } else if (this.id == "deletePregunta") {
        Swal.fire({
            title: "Delete  Question",
            text: "Are you sure to delete the question?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuer",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .post(principalUrl + "pregunta/delete/" + id_pregunta)
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
//name cuestionario funcion.
function namecuestionario(){
    $("#iden_cuestionario").empty();
    axios.get(principalUrl + "pregunta/idcuestionario")
    .then((respuesta) => {
        respuesta.data
        $("#iden_cuestionario").append("<option value='' selected>Choose...</option>"); 
    
        respuesta.data.forEach(function (element) {
           $("#iden_cuestionario").append("<option value="+element.id+" >"+element.nombre+"</option>"); 
        });
    
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

}
//name categoria
function categoriaName(){
    $("#category").empty();
    axios.get(principalUrl + "pregunta/category")
    .then((respuesta) => {
        respuesta.data
        $("#category").append("<option value='' selected>Choose...</option>"); 
    
        respuesta.data.forEach(function (element) {
           $("#category").append("<option value="+element.id+" >"+element.nombre_categoria+"</option>"); 
        });
    
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

}
console.log('aqui llega a pregunta js ');