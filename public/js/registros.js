
    $('#idcrearegistro').on('click', function() {
        console.log("si funciona al darle clik aqui este bton");
    });


    			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});

			$('#datetimepicker-minimum').datetimepicker({format: 'L'});
			$('#datetimepicker-minimum2').datetimepicker();

			// Select2
			$(".select2").each(function() {
				$(this)
					.wrap("<div class=\"position-relative\"></div>")
					.select2({
						placeholder: "Select value",
						dropdownParent: $(this).parent()
					});
			})
    