

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

var xhr;
$('#vistaregistro').on('click', function() {
   event.preventDefault();
   if (xhr) {
    xhr.abort(); 
  }
  
  xhr = $.ajax({
    type:'GET',
    url: principalUrl+'condicion/vistaregistros',
    dataType:"html",
    cache: false,
}).done(function(data) {
  $(".sidebar-item").removeClass("active");
  $("#itemregistro").addClass("active");
  $('.contenido').empty();   

    $('.contenido').html(data);

  });
});

var hxr;
$('#vistamanagement').on('click', function() {
    event.preventDefault();
      
   if (hxr) {
    hxr.abort(); 
  }
  
  hxr = $.ajax({
    type:'GET',
    url: principalUrl+'user',
    dataType:"html",
}).done(function(data) {
  $(".sidebar-item").removeClass("active");
  $("#itemManagement").addClass("active");

    $('.contenido').html(data);

  });
 });

 var rxh;
 $('#vistaCompania').on('click', function() {
  event.preventDefault();

   if (rxh) {
    rxh.abort(); 
  }

  rxh = $.ajax({
    type:'GET',
    url: principalUrl+'compania',
    dataType:"html",
}).done(function(data) {
  $(".sidebar-item").removeClass("active");
  $("#itemCompania").addClass("active");

    $('.contenido').html(data);

  });

});

//vista de Sent yo opening
var xxr;
$('#vistaopening').on('click', function() {
 event.preventDefault();

  if (xxr) {
   xxr.abort(); 
 }

 xxr = $.ajax({
   type:'GET',
   url: principalUrl+'vista/opening',
   dataType:"html",
}).done(function(data) {
 $(".sidebar-item").removeClass("active");
 $("#itemOpenign").addClass("active");

   $('.contenido').html(data);

 });

});

//vista questionario
$('#vistaCuestionario').on('click', function() {
  event.preventDefault();

  $.ajax({
     type:'GET',
     url: principalUrl+'cuestionario',
     dataType:"html",
 }).done(function(data) {
   $(".sidebar-item").removeClass("active");
   $("#itemCuestionario").addClass("active");

     $('.contenido').html(data);   

   });

});

$('#vistaTask').on('click', function() {
  event.preventDefault();

  $.ajax({
     type:'GET',
     url: principalUrl+'task/index',
     dataType:"html",
 }).done(function(data) {
   $(".sidebar-item").removeClass("active");
   $("#itemTask").addClass("active");

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