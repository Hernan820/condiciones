

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


$('#vistabancos').on('click', function() {
   event.preventDefault();
   $.ajax({
      type:'GET',
      url: principalUrl+'condicion/vistaprueba',
      success: function(respuesta){

		$(".sidebar-item").removeClass("active");
        $("#opcioncondiciones").addClass("active");

          $('.contenido').html(respuesta);
      },
      error: function (){
          console.log('Error');
      }
  })
});

$('#vistaregistro').on('click', function() {
   event.preventDefault();

   $.ajax({
      type:'GET',
      url: principalUrl+'condicion/vistaregistros',
      success: function(respuesta){

		$(".sidebar-item").removeClass("active");
        $("#itemregistro").addClass("active");

          $('.contenido').html(respuesta);
      },
      error: function (){
          console.log('Error');
      }
  })

});