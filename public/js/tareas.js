$(document).ready(function () {
    //funciones...
    Usuarioasignado();
    $('#datetimepicker-minimum-tarea').datetimepicker({format: 'L'});

    if (!window.Quill) {
        return $("#quill-editor,#quill-toolbar,#quill-bubble-editor,#quill-bubble-toolbar").remove();
    }
    var editor = new Quill("#quill-editor", {
        modules: {
            toolbar: "#quill-toolbar"
        },
        placeholder: "Type something",
        theme: "snow"
   });

});

//funcion para llamar nombres de los usuarios
 function Usuarioasignado(){
    $("#usuario").empty();
    axios.get(principalUrl + "condiciones/Users")
    .then((respuesta) => {
        respuesta.data
        $("#usuario").append("<option value='' selected>Choose...</option>"); 
    
        respuesta.data.forEach(function (element) {
           $("#usuario").append("<option value="+element.id+" >"+element.name+"</option>"); 
        });
    
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

}

// boton guardar tarea
$("#guardar-tarea").on("click", function () {

    var tareas = new FormData(document.getElementById("form-tarea"));
    tareas.append("descripcion", $("#quill-editor").html());
    console.log($('#quill-editor').html());
    
    if ($("#id_tarea").val() != "") {
        axios
        .post(principalUrl + "", tareas)
        .then((respuesta) => {
            console.log(respuesta.data)
           Swal.fire({
                position: "top-end",
                icon: "success",
                title: "actualized Task!",
                showConfirmButton: false,
                timer: 1200,
            });
            $("#date").val("");
            $("#name_tarea").val("");
            $("#quill-editor").val("");
            $("#usuario").val("");
            $("#Modal-tarea").modal("hide");
        })
        .catch((error) => {
            if (error.response) {
                console.log(error.response.data);
            }
        });
        
    } else {
        axios.post(principalUrl + "task/add",tareas)
        .then((respuesta) => {
            $('#Modal-tarea').modal('hide');
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "record saved!",
                showConfirmButton: false,
                timer: 1200,
            });
            $("#date").val("");
            $("#name_tarea").val("");
            $("#quill-editor").val("");
            $("#usuario").val("");
            $("#Modal-tarea").modal("hide");
        })
        .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });
    }
});