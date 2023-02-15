$(document).ready(function () {
    tblCompania();
    
    });

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
        tblCompania();
        $('#Modal-compania').modal('hide');
       
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

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
            { data: "logo",
                render:function(data){
                    return(
                     " <img src='"+principalUrl+""+data+"' width='100' >"
                     );
                }
            },
            { data:"webSite"},
            {
                data: "id",
                render: function (data) {
                    return (
                        "<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesUser' id='editUser' href='#'><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> Edit</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesUser'  id='deleteUser' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Delete</a><div class='dropdown-divider'></div>"
                    );
                },
            },
        ],
    });
}

console.log('aqui llega a compania js');