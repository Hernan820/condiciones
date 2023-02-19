$("#btn-add-pregunta").on("click", function () {
    $(".modal-title").html("Create new Question");
    $("#form-pregunta")[0].reset();
    document.getElementById("guardar-pregunta").innerText = "Add Question";
    $("#id-pregunta").val("");
});

$("#guardar-pregunta").on("click", function () {
    
    var pregunta = new FormData(document.getElementById("form-pregunta"));
    
        pregunta.append("id_pregunta",$("#id_pregunta").val());
        pregunta.append("title",$("#title").val());
        pregunta.append("iden_cuestionario",$("#iden_cuestionario").val());
        pregunta.append("category",$("#category").val());
    
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
            $("#status").val("");
            $("#iden_cuestionario").val("");
            $("#category").val("");
            $("#Modal-pregunta").modal("hide");
        })
        .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
});

//document
$(document).ready(function () {
   namecuestionario();
   categoriaName();
   tblPregunta();
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
//name cuestionario funcion.
function namecuestionario(){
    $("#iden_cuestionario").empty();
    axios.post(principalUrl + "pregunta/idcuestionario")
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
    axios.post(principalUrl + "pregunta/category")
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
