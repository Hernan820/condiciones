//registrar compania
$('#guardar-compania').on('click', function() { 

	var compania = new FormData(document.getElementById("formCompany"));

	     compania.append("nombre",$('#nombre').val());
         compania.append("telefono",$('#telefono').val());
         compania.append("logo",$('#logo').val());
         compania.append("webSite",$('#webSite').val());

    axios.post(principalUrl + "compania/add",compania)
    .then((respuesta) => {
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "company record!",
			showConfirmButton: false,
			timer: 1200,
		});
        $('#Modal-compania').modal('hide');
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

});
console.log('aqui llega a compania js');