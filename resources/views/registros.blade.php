<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    Welcome to file processing!
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">
                        <i class="align-middle me-2 fas fa-fw fa-user-check"></i> Active files</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">
                        <i class="align-middle me-2 fas fa-fw fa-cloud-upload-alt" data-feather="upload-cloud"></i>Files
                        send to opening</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">
                        <i class="align-middle me-2 fas fa-fw fa-user-times" data-feather="user-x"></i> Files
                        cancelled</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                        Under contract
                    </h4>
                    <br>
                    <button accesskey="a" class="btn btn-primary" data-bs-toggle="modal" id="btnmodalfile"><i
                            class="fas fa-folder-plus"></i> Add new file</button><br><br>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
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
                <div class="tab-pane" id="tab-2" role="tabpanel">
                    <h4 class="tab-title">Another one</h4>
                    <div class="card-body">
                        <table id="datatableactivos-reponsive" class="table table-striped" style="width:100%">
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
                <div class="tab-pane" id="tab-3" role="tabpanel">
                    <h4 class="tab-title">One more</h4>
                    <div class="card-body">
                        <table id="datatablecancel-reponsive" class="table table-striped" style="width:100%">
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


<!-- Modal New File-->
<div class="modal fade" id="newFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">General info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="col-md-4 col-xl-3">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">File information</h5>
                            </div>

                            <div class="list-group list-group-flush" id="tabitems" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="iditemcliente"
                                    data-bs-toggle="list" href="#borrower" role="tab">
                                    <i class="align-middle me-2 far fa-fw fa-user" data-feather="edit"></i>
                                    Borrower
                                </a>

                                <a class="list-group-item list-group-item-action " id="iditemprimero"
                                    data-bs-toggle="list" href="#account" role="tab">
                                    <i class="align-middle me-2 far fa-fw fa-edit" data-feather="edit"></i>
                                    Contract info
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password"
                                    id="itemsegundo" role="tab">
                                    <i class="align-middle me-2 fas fa-fw fa-list" data-feather="list"></i>
                                    Document list
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" id="itemtercero"
                                    href="#Questionnaires" role="tab">
                                    <i class="align-middle me-2 far fa-fw fa-file" data-feather="layout"></i>
                                    Questionnaires
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-xl-9">
                        <form id="formregistro">
                            <div class="tab-content">

                                <div class="tab-pane fade  show active" id="borrower" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="nameclient">Customer name</label>
                                                        <input type="text" class="form-control inputclient"
                                                            id="nameclient" name="nameclient" placeholder="First name"
                                                            autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputLastName">Customer telephone</label>
                                                        <input type="text" class="form-control inputclient"
                                                            id="customerPhone" name="customerPhone"
                                                            placeholder="(631) 609-9108" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label text-sm-end pt-sm-0">Legal
                                                            Status</label>
                                                        <div class="col-sm-10">
                                                            <label class="form-check">
                                                                <input name="radio_status" type="radio"
                                                                    class="form-check-input" value="social">
                                                                <span class="form-check-label">Social</span>
                                                            </label>
                                                            <label class="form-check">
                                                                <input name="radio_status" type="radio"
                                                                    class="form-check-input" value="Tax ID">
                                                                <span class="form-check-label">TAX ID</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label text-sm-end pt-sm-0">Client Type</label>
                                                        <div class="col-sm-10">
                                                            <label class="form-check">
                                                                <input name="radio_typeclient" type="radio"
                                                                    class="form-check-input" value="1">
                                                                <span class="form-check-label">Headline</span>
                                                            </label>
                                                            <label class="form-check">
                                                                <input name="radio_typeclient" type="radio"
                                                                    class="form-check-input" value="0">
                                                                <span class="form-check-label">Co-borrower</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="ssn" style="margin-top: 7px;">SSN</label>
                                                        <input type="email" class="form-control inputclient" id="ssn"
                                                            name="ssn" placeholder="000-00-0000" autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputEmail4" style="margin-top: 7px;">Email</label>
                                                        <input type="email" class="form-control inputclient"
                                                            autocomplete="off" placeholder="Email" id="emailclient"
                                                            name="emailclient">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputAddress">Customer current address</label>
                                                        <input type="text" class="form-control inputclient"
                                                            id="inputAddress" autocomplete="off" name="inputAddress"
                                                            placeholder="1234 Main St">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputAddress2">Address 2</label>
                                                        <input type="text" class="form-control inputclient"
                                                            id="inputAddress2" name="inputAddress2" autocomplete="off"
                                                            placeholder="Apartment, studio, or floor">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-primary"
                                                        id="btncliente">Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="col-12 col-xl-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="card-title">Customer Table</h5>
                                                            <h6 class="card-subtitle text-muted">
                                                            </h6>
                                                        </div>
                                                        <table class="table table-striped table-sm" id="tblcliente">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:40%;">Name</th>
                                                                    <th style="width:25%">Phone Number</th>
                                                                    <th class="d-none d-md-table-cell"
                                                                        style="width:25%">Legal Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="filasclientes">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="account" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Titulo</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                        <label for="inputFirstName">Contract date</label>
                                                        <div class="input-group date" id="datetimepicker-minimum"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                id="datecontrac" name="datecontrac" autocomplete="off"
                                                                data-target="#datetimepicker-minimum" />
                                                            <div class="input-group-text"
                                                                data-target="#datetimepicker-minimum"
                                                                data-toggle="datetimepicker"><i
                                                                    class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="date_reception">
                                                            Contract receipt date
                                                        </label>
                                                        <div class="input-group date" id="datetimepicker-minimum2"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                id="datereceipt" name="datereceipt" autocomplete="off"
                                                                data-target="#datetimepicker-minimum2" />
                                                            <div class="input-group-text"
                                                                data-target="#datetimepicker-minimum2"
                                                                data-toggle="datetimepicker"><i
                                                                    class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top:7px">
                                                        <div class="mb-3 col-md-4">
                                                            <label for="purchaceprice">Purchace Price</label>
                                                            <input type="text" name="purchaceprice" placeholder="$"
                                                                autocomplete="off" id="purchaceprice"
                                                                class="form-control" maxlength="15">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label for="dowpayment">Down payment</label>
                                                            <input type="text" placeholder="%" id="dowpayment"
                                                                autocomplete="off" name="dowpayment"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label for="inputState">State</label>
                                                            <select class="form-control" name="validation-select2"
                                                                value="" id="estadoscasa" name="estadoscasa"
                                                                style="width: 100%">
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label for="typeloan">Type of loan</label>
                                                            <select id="typeloan" name="typeloan" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="mb-3 col-md-12" style="margin-top:7px">
                                                        <label for="drive">Drive</label>
                                                        <div class="input-group col-md-12">
                                                            <span class="input-group-text">Drive</span>
                                                            <input type="text" id="drive" name="drive"
                                                                autocomplete="off" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <div class="mb-3 col-md-12">
                                                            <label for="realtorname">Realtor name</label>
                                                            <input type="text" name="realtorname" placeholder=""
                                                                autocomplete="off" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <div class="mb-3 col-md-12">
                                                            <label for="realtorphone">Realtor telephone</label>
                                                            <input type="text" name="realtorphone" id="realtorphone"
                                                                autocomplete="off" placeholder="(000) 000-0000"
                                                                class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 col-md-12">
                                                        <div class="mb-3 col-md-12">
                                                        <label for="inputAddress">Property address</label>
                                                        <input type="text" class="form-control "
                                                            id="inputAdressPropiedad" autocomplete="off" name="inputAdressPropiedad"
                                                            placeholder="1234 Main St">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="notes">Notes</label>
                                                    <textarea class="form-control" id="montes" name="notes"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="password" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Documents required for this loan</h5>
                                            <h6 class="card-subtitle text-muted">Select the documents to be requested
                                                from
                                                the client</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" id="listdocumentos">

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="card-title">Documents catalog</h5>
                                                            <h6 class="card-subtitle text-muted">Manage the documents
                                                                required for each loan
                                                            </h6>
                                                            <br><br>
                                                            <div class="row" style="margin-top:7px">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="newdoc">New Doc</label>
                                                                    <input type="text" name="newdoc" id="newdoc"
                                                                        autocomplete="off" placeholder=""
                                                                        class="form-control">
                                                                </div><input type='hidden' id='iddocument' value="">
                                                                <div class="mb-3 col-md-3"><br>
                                                                    <button class="btn btn-primary" id="btngregadoc">
                                                                        <i class="align-middle me-2"
                                                                            data-feather="edit-3"></i>Add</button>
                                                                </div>
                                                                <div class="mb-3 col-md-3" id="btonnuevo"><br>
                                                                    <button class="btn btn-primary" id="btnnuevo">
                                                                        <i class="align-middle me-2"
                                                                            data-feather="edit-3"></i>new</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table class="table table-sm ">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbldoc">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- preguntas-->
                                <div class="tab-pane fade " id="Questionnaires" role="Questionnaires">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Questionnaires for this loan</h5>
                                            <h6 class="card-subtitle text-muted">Select the questionnaires that will be
                                                applied to this loan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" id="cuestionarios">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="guardaregistro">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End of New Filw Modal-->


<!-- MODAL GET INFO CLIENTE -->
<div class="modal fade" id="modacancel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancel </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <div class="mb-3">
                    <label class="form-label">reason for cancellation</label>
                    <textarea class="form-control" id="cancelacionmotivo" name="cancelacionmotivo"
                        placeholder="Write a reason" rows="3"></textarea>
                </div>
                <input type="hidden" name="id_registro" id="id_registro" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btncancelacion">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- -->

<!-- report client modal -->

<div class="modal fade" id="modalreportclient" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Information</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body m-3">

                <div class="mb-3">
                    <label class="form-label">Customer Info</label>
                    <textarea class="form-control" id="reportregistro" name="reportregistro"
                        placeholder="Write a reason" rows="10"></textarea>
                </div><br>
                <button type="button" class="btn btn-success" id="copiarinfo" 
                   data-clipboard-target="#reportregistro">Copiar Nota</button>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<!-- END primary modal -->
<script>
$.getScript("{{ asset('js/registros.js') }}");
</script>