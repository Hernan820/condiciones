<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    Welcome to file processing! 
                </h5>
            </div>
            <div class="card-body">
                <div class="my-5"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab"><i
                            class="align-middle me-2 fas fa-fw fa-user-check"></i> Active files</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">
                        <i class="align-middle me-2" data-feather="upload-cloud"></i> Files send to opening</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">
                        <i class="align-middle me-2" data-feather="user-x"></i> Files cancelled</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                        Under contract
                    </h4>
                    <br>
                    <button accesskey="a" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newFile"><i
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
                                <tr>
                                    <td>01/15/2023</td>
                                    <td>01/17/2023</td>
                                    <td>JUAN MARIA TACURI</td>
                                    <td>NEW YORK</td>
                                    <td>CONVENTIONAL</td>
                                    <td>35 West Main St Smithtown NY 11787</td>
                                    <td style="text-align: center;">
                                    <a href=""><i class="align-middle me-2 fas fa-fw fa-external-link-alt" data-feather="external-link"></i></a>                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn mb-1 btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="#"><i class="align-middle me-2"
                                                        data-feather="more-vertical"></i> See details</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#sizedModalSm">
                                                    <i class="align-middle me-2" data-feather="edit"></i> Get customer
                                                    info

                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="align-middle me-2"
                                                        data-feather="x-square"></i> Cancel file</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="align-middle me-2"
                                                        data-feather="shuffle"></i> File with Problems</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="align-middle me-2"
                                                        data-feather="send"></i> Send to opening</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01/15/2023</td>
                                    <td>01/17/2023</td>
                                    <td>JUAN MARIA TACURI</td>
                                    <td>NEW YORK</td>
                                    <td>CONVENTIONAL</td>
                                    <td>35 West Main St Smithtown NY 11787</td>
                                    <td style="text-align: center;">
                                    <a href=""><i class="align-middle me-2 fas fa-fw fa-external-link-alt" data-feather="external-link"></i></a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn mb-1 btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01/15/2023</td>
                                    <td>01/17/2023</td>
                                    <td>JUAN MARIA TACURI</td>
                                    <td>NEW YORK</td>
                                    <td>CONVENTIONAL</td>
                                    <td>35 West Main St Smithtown NY 11787</td>
                                    <td style="text-align: center;">
                                    <a href=""><i class="align-middle me-2 fas fa-fw fa-external-link-alt" data-feather="external-link"></i></a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn mb-1 btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Options
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab-2" role="tabpanel">
                    <h4 class="tab-title">Another one</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus
                        eget condimentum
                        rhoncus. Aenean massa. Cum sociis natoque penatibus et magnis neque dis parturient montes,
                        nascetur ridiculus mus.
                    </p>
                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                        enim. Donec pede
                        justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a,
                        venenatis vitae,
                        justo.</p>
                </div>
                <div class="tab-pane" id="tab-3" role="tabpanel">
                    <h4 class="tab-title">One more</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus
                        eget condimentum
                        rhoncus. Aenean massa. Cum sociis natoque penatibus et magnis neque dis parturient montes,
                        nascetur ridiculus mus.
                    </p>
                    <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                        enim. Donec pede
                        justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a,
                        venenatis vitae,
                        justo.</p>
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

                            <div class="list-group list-group-flush" role="tablist">
                                <a class="list-group-item list-group-item-action active" data-bs-toggle="list"
                                    href="#account" role="tab">
                                    <i class="align-middle me-2" data-feather="edit"></i>
                                    Contract info
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password"
                                    role="tab">
                                    <i class="align-middle me-2" data-feather="list"></i>
                                    Document list
                                </a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list"
                                    href="#Questionnaires" role="tab">
                                    <i class="align-middle me-2" data-feather="layout"></i>
                                    Questionnaires
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-xl-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account" role="tabpanel">


                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0"></h5>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputFirstName">Customer name</label>
                                                        <input type="text" class="form-control" id="inputFirstName"
                                                            placeholder="First name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputLastName">Customer telephone</label>
                                                        <input type="text" class="form-control" id="customerPhone"
                                                            placeholder="(631) 609-9108">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputFirstName">Contract date</label>
                                                        <div class="input-group date" id="datetimepicker-minimum"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
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
                                                                data-target="#datetimepicker-minimum2" />
                                                            <div class="input-group-text"
                                                                data-target="#datetimepicker-minimum2"
                                                                data-toggle="datetimepicker"><i
                                                                    class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <label class="col-form-label text-sm-end pt-sm-0">Legal
                                                            Status</label>
                                                        <div class="col-sm-10">
                                                            <label class="form-check">
                                                                <input name="radio-status" type="radio"
                                                                    class="form-check-input">
                                                                <span class="form-check-label">Social</span>
                                                            </label>
                                                            <label class="form-check">
                                                                <input name="radio-status" type="radio"
                                                                    class="form-check-input">
                                                                <span class="form-check-label">TAX ID</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="padding-left: 25px;">
                                                        <label for="property_address">
                                                            Property adress
                                                        </label>
                                                        <input type="text" class="form-control" id="property_address"
                                                            autocomplete="off">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ssn" style="margin-top: 7px;">SSN</label>
                                                        <input type="email" class="form-control" id="ssn"
                                                            placeholder="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputEmail4" style="margin-top: 7px;">Email</label>
                                                        <input type="email" class="form-control" id="inputEmail4"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputAddress">Customer current address</label>
                                                        <input type="text" class="form-control" id="inputAddress"
                                                            placeholder="1234 Main St">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputAddress2">Address 2</label>
                                                        <input type="text" class="form-control" id="inputAddress2"
                                                            placeholder="Apartment, studio, or floor">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="coborrowers">Co borrowers</label>
                                                        <textarea class="form-control" name="coborrowers"
                                                            rows="2"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row" style="margin-top:7px">
                                                        <div class="mb-3 col-md-4">
                                                            <label for="purchaceprice">Purchace Price</label>
                                                            <input type="text" name="purchaceprice" placeholder="$"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label for="purchaceprice">Down payment</label>
                                                            <input type="text" name="purchaceprice" placeholder="%"
                                                                class="form-control">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label for="inputState">State</label>
                                                            <select id="inputState" class="form-control">
                                                                <option selected>Choose...</option>
                                                                <option>New York</option>
                                                                <option>New Jersey</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label for="typeloan">Type of loan</label>
                                                            <select id="typeloan" class="form-control">
                                                                <option selected>Choose...</option>
                                                                <option>Conventional</option>
                                                                <option>FHA</option>
                                                                <option>Hard Money</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12" style="margin-top:7px">
                                                            <label for="drive">Drive</label>
                                                            <div class="input-group col-md-12">
                                                                <span class="input-group-text">Drive</span>
                                                                <input type="text" id="drive" name="drive"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="realtorname">Realtor name</label>
                                                                <input type="text" name="realtorname" placeholder=""
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="realtorphone">Realtor telephone</label>
                                                                <input type="text" name="realtorphone" placeholder=""
                                                                    class="form-control">
                                                            </div>
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
                                            <button type="submit" style="display: none;" class="btn btn-primary">Save
                                                changes</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Documents required for this loan</h5>
                                        <h6 class="card-subtitle text-muted">Select the documents to be requested from
                                            the client</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="col-form-label  pt-sm-0">Documents</label>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <label class="form-check m-0">
                                                                <input type="checkbox" class="form-check-input">
                                                                <span class="form-check-label">SSN</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <label class="form-check m-0">
                                                                <input type="checkbox" class="form-check-input">
                                                                <span class="form-check-label">Taxes 2020</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <label class="form-check m-0">
                                                                <input type="checkbox" class="form-check-input">
                                                                <span class="form-check-label">Taxes 2021</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <label class="form-check m-0">
                                                                <input type="checkbox" class="form-check-input">
                                                                <span class="form-check-label">Bank Statements</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <label class="form-check m-0">
                                                                <input type="checkbox" class="form-check-input">
                                                                <span class="form-check-label">ID</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <label class="form-check m-0">
                                                                <input type="checkbox" class="form-check-input">
                                                                <span class="form-check-label">Pay Stubs</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-10">
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="card-title">Documents catalog</h5>
                                                            <h6 class="card-subtitle text-muted">Manage the documents
                                                                required for each loan
                                                            </h6>
                                                            <br><br>
                                                            <button class="btn btn-primary">
                                                                <i class="align-middle me-2" data-feather="edit-3"></i>
                                                                Add new</button>
                                                        </div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>SSN</td>
                                                                    <td class="table-action">
                                                                        <a href="#"><i
                                                                                class="align-middle fas fa-fw fa-pen"></i></i></a>
                                                                        <a href="#"><i
                                                                                class="align-middle fas fa-fw fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TAXES 2020</td>
                                                                    <td class="table-action">
                                                                        <a href="#"><i
                                                                                class="align-middle fas fa-fw fa-pen"></i></i></a>
                                                                        <a href="#"><i
                                                                                class="align-middle fas fa-fw fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TAXES 2021</td>
                                                                    <td class="table-action">
                                                                        <a href="#"><i
                                                                                class="align-middle fas fa-fw fa-pen"></i></i></a>
                                                                        <a href="#"><i
                                                                                class="align-middle fas fa-fw fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                                            <div class="col-md-6">
                                                <label class="col-form-label  pt-sm-0">Questionnaire catalog</label>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-10">
                                                        <label class="form-check m-0">
                                                            <input type="checkbox" class="form-check-input">
                                                            <span class="form-check-label">1003</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-10">
                                                        <label class="form-check m-0">
                                                            <input type="checkbox" class="form-check-input">
                                                            <span class="form-check-label">TRID</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End of New Filw Modal-->


<!-- MODAL GET INFO CLIENTE -->
<div class="modal fade" id="sizedModalSm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Small modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
                    notifications, or completely custom content.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- -->

<script src="{{ asset('js/app.js') }}"></script>

