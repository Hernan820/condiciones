

$('#mantBancos').on('click', function() {
   $('#modalbancos').modal('show');
});


$('#agregabanco').on('click', function() {


   var datos = new FormData(document.getElementById("frmbanco"));

   axios.post(principalUrl + "condicion/bancosagrega",datos)
   .then((respuesta) => {
      respuesta.data

   })
   .catch((error) => {
       if (error.response) {
           console.log(error.response.data);
       }
   });

   
});
