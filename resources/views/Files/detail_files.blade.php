<input type='hidden' id='idregistro' value="{{$id}}">
<input type='hidden' id='vista' value="{{$vista}}">

<div class="header">
    <h1 class="header-title">
        FILE: <span id="nameclient"></span> 
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Files</li>
            <li class="breadcrumb-item"><b>Status: in process</b></li>
            <li class="breadcrumb-item"><b>File Porcessor: <span id="nameuser"></span> </b></li>
        </ol>
    </nav>
</div>
<div class="row">

    <div class="col-xxl-3">
        <div class="card">
            <div class="card-header">
                <div class="card-actions float-end">

                    <div class="d-inline-block dropdown show">
                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                            <i class="align-middle me-2 fas fa-fw fa-ellipsis-v" data-feather="more-vertical"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">CUSTOMER INFORMATION</h5>
            </div>
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-sm-3 col-xl-12 col-xxl-4 text-center">
                        <img src="{{ asset('img/avatars/file.jpeg') }}" width="64" height="64" class="rounded-circle mt-2"
                            alt="File">
                    </div>
                    <div class="col-sm-9 col-xl-12 col-xxl-8">
                        <strong>Notes</strong>
                        <p>
                            <div id='notaderegistro'>
                            </div>
                        </p>
                    </div>
                </div>

                <table class="table table-sm my-2">
                    <tbody id="filaclient">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xxl-6">
        <div class="card">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab"><i
                                class="align-middle me-2 fas fa-fw fa-list-ul" data-feather="list"></i> Check list</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab"><i
                                class="align-middle me-2 fas fa-fw fa-server" data-feather="server"></i> Questionnaires</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab"><i
                                class="align-middle me-2 far fa-fw fa-comment-alt" data-feather="message-square"></i> Follow ups</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-1" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                </div>
                                <h5 class="card-title mb-0" style="text-transform: uppercase;">Documents check list</h5>
                            </div>
                            <div class="card-body">
                                <table id="datatables-document" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Document</th>
                                            <th>Status</th>
                                            <th>Check</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3 col-xl-3">

                                <div class="card" >
                                    <div class="card-header">
                                        <h5 class="card-title mb-0" style="font-size: 10px;">Profile Settings</h5>
                                    </div>

                                    <div class="list-group list-group-flush" role="tablist" id="pestanascuestion">

                                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list"
                                            href="#password" role="tab" style="font-size:10px">
                                            1003 FORM
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <style type="text/css">
                            .small-text1 {
                                font-size: 10px;
                            }
                            </style>

                            <div class="col-md-9 col-xl-9 mb-0 p-0">
                                <div class="tab-content mb-0 p-0" id="tablasquestion">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3" role="tabpanel">
                        <button class="btn mb-1 btn-primary" id="btnseguimiento" data-bs-toggle="modal" ><i
                         class="far fa-plus"></i> Add follow up</button>

                        <div class="row">
                            <div class="col-md-12" style="margin-top: 40px;">
                                <div class="accordion" id="id_notasseguimiento">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xxl-3">
        <div class="card">
            <div class="card-header">
                <div class="card-actions float-end">

                    <div class="d-inline-block dropdown show">
                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                            <i class="align-middle me-2 fas fa-fw fa-ellipsis-v" data-feather="more-vertical"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">CONTRACT INFORMATION</h5>
            </div>
            <div class="card-body">

                <table class="table table-sm my-2">
                    <tbody id="registrocliente">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- MODAL AGREGA NOTA DE SEGUIMIENTO -->
<div class="modal fade" id="modalnota_seguimiento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Note </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <div class="mb-3">
                    <label class="form-label">follow up note</label>
                    <textarea class="form-control" id="notaseguimiento" name="notaseguimiento"
                        placeholder="Write a note" rows="3"></textarea>
                </div>
                <input type="hidden" name="id_registro" id="id_registro" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnnotaseguimiento">Save note</button>
            </div>
        </div>
    </div>
</div>
<!-- -->

<script>
$.getScript("{{ asset('js/detallefile.js') }}");
</script>