
    alert('archivo registro js');

    $('#idcrearegistro').on('click', function() {
        console.log("si funciona al darle clik aqui este bton");
        alert('boton desde registro');
    });


    
var datatablesButtons = $("#datatables-buttons").DataTable({
    responsive: true,
    lengthChange: !1,
    buttons: ["copy", "print"]
});
datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    