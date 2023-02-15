

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
      dataType:"html",
  }).done(function(data) {
    $(".sidebar-item").removeClass("active");
    $("#itemregistro").addClass("active");

      $('.contenido').html(data);   

    });

});

$('#vistamanagement').on('click', function() {
    event.preventDefault();
 
    $.ajax({
       type:'GET',
       url: principalUrl+'user',
       dataType:"html",
   }).done(function(data) {
     $(".sidebar-item").removeClass("active");
     $("#itemManagement").addClass("active");
 
       $('.contenido').html(data);   
 
     });
 
 });

 $('#vistaCompania').on('click', function() {
  event.preventDefault();

  $.ajax({
     type:'GET',
     url: principalUrl+'compania',
     dataType:"html",
 }).done(function(data) {
   $(".sidebar-item").removeClass("active");
   $("#itemCompania").addClass("active");

     $('.contenido').html(data);   

   });

});

const availableTags = [
	"Alaska",
	"Arizona",
	"Arkansas",
	"California",
	"Carolina del Norte",
	"Carolina del Sur",
	"Colorado",
	"Connecticut",
	"Dakota del Norte",
	"Dakota del Sur",
	"Delaware",
	"Florida",
	"Georgia",
	"Hawái",
	"Idaho",
	"Illinois",
	"Indiana",
	"Iowa",
	"Kansas",
	"Kentucky",
	"Luisiana",
	"Maine",
	"Maryland",
	"Massachusetts",
	"Míchigan",
	"Minnesota",
	"Misisipi",
	"Misuri",
	"Montana",
	"Nebraska",
	"Nevada",
	"New Jersey",
	"New York",
	"New Hampshire",
	"New México",
	"Ohio",
	"Oklahoma",
	"Oregón",
	"Pensilvania",
	"Rhode Island",
	"Tennessee",
	"Texas",
	"Utah",
	"Vermont",
	"Virginia",
	"Virginia Occidental",
	"Washington",
	"Wisconsin",
	"Wyoming",
		];