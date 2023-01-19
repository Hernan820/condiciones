var principalUrl = "http://localhost/condiciones/public/";


$(document).ready(function () { 

    var datos = new FormData();
    datos.append("vista","1");

    axios.post(principalUrl + "condicion/compania",datos)
    .then((respuesta) => {
        
        $("#nombrempresa").html(respuesta.data.nombre);       
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

});
