@extends('layouts.app')

@section('content')



<div class="header">
    <h1 class="header-title">
        Welcome back, {{ Auth::user()->name }}!
    </h1>
</div>

<div class="header">
    <h1 class="header-title">
        RECORDS TABLES
    </h1>

    <div class="float-right">
<button class="btn btn-primary float-right" id="crearregistro">CREAR</button>

</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Table with Buttons</h5>
                <h6 class="card-subtitle text-muted">This extension provides a framework with common options
                    that can be used with
                    DataTables. See official documentation <a href="https://datatables.net/extensions/buttons/"
                        target="_blank" rel="noopener noreferrer nofollow">here</a>.</h6>
            </div>

            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <!-- BEGIN primary modal -->

    <div class="modal fade" id="modalregistro" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">RGISTROS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form id="frmbanco">
                        <div class="mb-3">
                            <label class="form-label">Registros</label>
                            <input type="text" class="form-control" name="nbrbanco" id="nbrbanco"  placeholder="Nombre banco" autocomplete="off">
                        </div>

                        <button type="button" id="agregabanco" class="btn btn-primary">agregar</button>
                    </form>
					<br>
					<table class="table">
									<thead>
										<tr>
											<th style="width:40%;">Name</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>cuscatlan</td>
											<td class="table-action">
												<a href="#"><i class="align-middle fas fa-fw fa-pen"></i></i></a>&nbsp; &nbsp;&nbsp;&nbsp;
												<a href="#"><i class="align-middle fas fa-fw fa-trash"></i></a>
											</td>
										</tr>
										
									</tbody>
								</table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Datatables with Buttons
    var datatablesButtons = $("#datatables-buttons").DataTable({
        responsive: true,
        lengthChange: !1,
        buttons: ["copy", "print"]
    });
    datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
});
</script>

@endsection