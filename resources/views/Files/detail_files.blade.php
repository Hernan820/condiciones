<input type='hidden' id='idregistro' value="{{$id}}">

<div class="header">
    <h1 class="header-title">
        FILE: <span id="nameclient"></span> 
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard-default.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Files</a></li>
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
                            <i class="align-middle" data-feather="more-vertical"></i>
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
                            <textarea rows="6" class="form-control" name="notes"
                                style="border:0px">This client is waiting for the w2 - 2022</textarea>
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
                                class="align-middle me-2" data-feather="list"></i> Check list</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab"><i
                                class="align-middle me-2" data-feather="server"></i> Questionnaires</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab"><i
                                class="align-middle me-2" data-feather="message-square"></i> Follow ups</a></li>
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

                            <div class="col-md-9 col-xl-9">
                                <div class="tab-content" id="tablasquestion">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3" role="tabpanel">
                        <button class="btn mb-1 btn-primary" data-bs-toggle="modal" data-bs-target="#sizedModalLg"><i
                                class="far fa-plus"></i> Add follow up</button>

                        <div class="row">
                            <div class="col-md-12" style="margin-top: 40px;">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">
                                                Seguimiento recepcion documentos 02/01/2023 12:55 PM
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                <strong>This is the first item's accordion body.</strong> It is shown by
                                                default, until the collapse plugin adds the appropriate classes that we
                                                use to style each element. These classes control the overall appearance,
                                                as well as the showing and hiding via CSS transitions. You can modify
                                                any of this with custom CSS or overriding our default variables. It's
                                                also worth noting that just about any HTML can go within the
                                                <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                Seguimiento recepcion documentos 01/28/2023 10:32 AM
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <strong>This is the third item's accordion body.</strong> It is hidden
                                                by default, until the collapse plugin adds the appropriate classes that
                                                we use to style each element. These classes control the overall
                                                appearance, as well as the showing and hiding via CSS transitions. You
                                                can modify any of this with custom CSS or overriding our default
                                                variables. It's also worth noting that just about any HTML can go within
                                                the <code>.accordion-body</code>, though the transition does limit
                                                overflow.
                                            </div>
                                        </div>
                                    </div>
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
                            <i class="align-middle" data-feather="more-vertical"></i>
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

<script>
$.getScript("{{ asset('js/detallefile.js') }}");
</script>