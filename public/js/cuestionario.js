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

    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

});
    
