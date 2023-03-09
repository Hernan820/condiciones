<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    Files
                </h5>
                <i class="align-middle me-2" data-feather="upload-cloud"></i>

            </div>
            <div class="card-body">
                <div class="my-5"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-12">
        <div class="tab">
            
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                      Files to opening
                    </h4>
                    <br><br><br>
                    <div class="card-body">
                        <table id="tblfilesopnening" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>CONTRACT DATE</th>
                                    <th>RECEPTION DATE</th>
                                    <th>CUSTOMER</th>
                                    <th>STATE</th>
                                    <th>TYPE OF LOAN</th>
                                    <th>PROPERTY ADDRESS</th>
                                    <th>DRIVE</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>

<!-- report client modal -->

<div class="modal fade" id="modalAsignacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Loan assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-12 col-lg-7 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title">Loan details</h5>
                            <h6 class="card-subtitle text-muted">Details of the loan to be assigned to users
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <div class="mb-3">
                                        <label class="form-label">Contract receipt date</label>
                                        <input class="form-control" type="text" name="fechacontrato" id="fechacontrato" disabled
                                            value="" />
                                    </div>
                                </div>

                                <div class="col-12 col-xl-8">
                                    <div class="mb-3">
                                        <label class="form-label">Client Owner</label>
                                        <input class="form-control" type="text" name="clienteregistro" id="clienteregistro"disabled />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 error-placeholder">
                    <label class="form-label">Users to assign</label>
                    <div class="d-flex">
                        <select class="form-control" id="selectusuarios" name="validation-select2-multi" multiple style="width: 100%">

                        </select>
                    </div>
                </div>
				<input type="hidden" name="registroid" id="registroid" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAsigancion">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END primary modal -->

<script>
    $.getScript("{{ asset('js/senttoopening.js') }}");
</script>

