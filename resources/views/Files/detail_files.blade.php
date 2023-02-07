<div class="header">
    <h1 class="header-title">
        FILE: Juan Perez
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard-default.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Files</a></li>
            <li class="breadcrumb-item"><b>Status: in process</b></li>
            <li class="breadcrumb-item"><b>File Porcessor: Ericka Peraza</b></li>
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
                            <i class="ion ion-md-more me-2" data-feather="more-vertical"></i>
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
                        <img src="" width="64" height="64" class="rounded-circle mt-2" alt="File">
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
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge bg-success" style="padding-bottom: 5px;">In progress...</span></td>
                        </tr>
                        <tr>
                            <th>Borrower</th>
                            <td>Juan Perez</td>
                        </tr>
                        <tr>
                            <th>Telephone</th>
                            <td>(631) 609-9108</td>
                        </tr>
                        <tr>
                            <th>Legal Status</th>
                            <td>
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <label class="form-check">
                                            <input name="radio-status" type="radio" class="form-check-input" checked>
                                            <span class="form-check-label">Social</span>
                                        </label>
                                        <label class="form-check">
                                            <input name="radio-status" type="radio" class="form-check-input">
                                            <span class="form-check-label">TAX ID</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>SSN</th>
                            <td>923-321-100</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>juan@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Current address</th>
                            <td>35 West Main St Smithtown NY 11787</td>
                        </tr>
                        <tr>
                            <th>Former address</th>
                            <td></td>
                        </tr>
                        <!-- Todos los cllientes que no sean el principal, van a aparecer como coborrowers-->
                        <tr>
                            <td colspan="2"><br></td>
                        </tr>
                        <tr class="table-primary">
                            <th>Co borrower</th>
                            <td>Elana Perez</td>
                        </tr>
                        <tr>
                            <th>Telephone</th>
                            <td>(631) 609-9100</td>
                        </tr>
                        <tr>
                            <th>Legal Status</th>
                            <td>
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <label class="form-check">
                                            <input name="radio-status" type="radio" class="form-check-input" checked>
                                            <span class="form-check-label">Social</span>
                                        </label>
                                        <label class="form-check">
                                            <input name="radio-status" type="radio" class="form-check-input">
                                            <span class="form-check-label">TAX ID</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>SSN</th>
                            <td>923-321-000</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>elena@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Current address</th>
                            <td>35 West Main St Smithtown NY 11787</td>
                        </tr>
                        <tr>
                            <th>Former address</th>
                            <td></td>
                        </tr>
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
                                class="align-middle me-2 fas fa-fw fa-list-ul" data-feather=""></i> Check list</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab"><i
                                class="align-middle me-2 fas fa-fw fa-server" data-feather=""></i> Questionnaires</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab"><i
                                class="align-middle me-2 far fa-fw fa-comment-alt" data-feather=""></i> Follow ups</a>
                    </li>
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
                                <table id="datatables-clients" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Document</th>
                                            <th>Status</th>
                                            <th>Check</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>SSN</td>
                                            <td><span class="badge bg-success">Complete</span></td>
                                            <td><input type="checkbox" checked class="form-check-input"></td>
                                            <td>
                                                <input type="text" name="Comments" class="form-control"
                                                    style="border: 0px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>TAXES 2020</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td>
                                                <input type="text" name="Comments" class="form-control"
                                                    style="border: 0px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>TAXES 2022</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td>
                                                <input type="text" name="Comments" class="form-control"
                                                    style="border: 0px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>PAY STUBS</td>
                                            <td><span class="badge bg-success">Complete</span></td>
                                            <td><input type="checkbox" checked class="form-check-input"></td>
                                            <td>
                                                <input type="text" name="Comments" class="form-control"
                                                    style="border: 0px;">
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3 col-xl-3">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0" style="font-size: 10px;">Profile Settings</h5>
                                    </div>

                                    <div class="list-group list-group-flush" role="tablist">
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
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="password" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    Complete the following form
                                                </h5>

                                                <table class="table table-bordered small-text1">
                                                    <thead>
                                                        <tr>
                                                            <th class="small-text1">Questions</th>
                                                            <th class="small-text1">Juan Perez</th>
                                                            <th style="small-text1">Karla Alarcon</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="small-text1">
                                                                ¿Donde trabaja?
                                                            </td>
                                                            <td><input type="text" class="form-control small-text1"
                                                                    style="border:0px"></td>
                                                            <td class="d-none d-md-table-cell">
                                                                <input type="text" class="form-control small-text1"
                                                                    style="border:0px">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="small-text1">¿Cuantos dependientes tiene a su
                                                                carga?</td>
                                                            <td class="small-text1"><input type="text"
                                                                    class="form-control small-text1" style="border:0px">
                                                            </td>
                                                            <td class="d-none d-md-table-cell small-text1"><input
                                                                    type="text" class="form-control small-text1"
                                                                    style="border:0px"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
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
                            <i class="ion ion-md-more me-2" data-feather=""></i>
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
                    <tbody>
                        <tr>
                            <th>Contract date</th>
                            <td>01/20/2023</td>
                        </tr>
                        <tr>
                            <th>Contract receipt date</th>
                            <td>01/25/2023</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <!-- Select -->
                            <td>New York</td>
                        </tr>
                        <tr>
                            <th>Property adress</th>
                            <td>5 Dana Place, Hyde Park NY 12538</td>
                        </tr>
                        <tr>
                            <th>Purchace Price</th>
                            <td>$325,000.00</td>
                        </tr>
                        <tr>
                            <th>Down payment</th>
                            <td>3.5%</td>
                        </tr>
                        <tr>
                            <th>Type of loan</th>
                            <td>FHA Program</td>
                        </tr>
                        <tr>
                            <th>Drive</th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a target="_blank"
                                    href="https://drive.google.com/drive/folders/1r_jh-sttQNu6sQM_dyNNm104ZFVt_Jf0?usp=share_link">https://drive.google.com/drive/folders/1r_jh-sttQNu6sQM_dyNNm104ZFVt_Jf0?usp=share_link</a>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                Realtor name
                            </th>
                            <td>
                                Andrea Cacio
                            </td>
                        </tr>
                        <tr>
                            <th>Telephone</th>
                            <td>(631) 325-2525</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>


<script>
$.getScript("{{ asset('js/detallefile.js') }}");
</script>