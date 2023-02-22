<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    User manager!
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
                        <i class="align-middle me-2 fas fa-fw fa-user-check"></i> Users</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">
                    <i class="align-middle me-2 fas fa-fw fa-users"></i>Roles</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                       User Management
                    </h4>
                    <br>
                    <button accesskey="a" class="btn btn-primary" data-bs-toggle="modal" id="btnnewuser"><i
                            class="fas fa-folder-plus"></i> Add new User</button><br><br>
                    <div class="card-body">
                        <table id="datatables-reponsiveUser" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>PHONE 2</th>
                                    <th>ROLES</th>
                                    <th>OPCION</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
              <!--tabla roles-->
              <div class="tab-pane active" id="tab-2" role="tabpanel">
                <h4 class="tab-title">
                  Role Management
                </h4>
                <br>
                <button accesskey="a" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalRol" id="btnnewRole"><i
                        class="fas fa-fw fa-users"></i> Add new Role</button><br><br>
                <div class="card-body">
                    <table id="datatables-reponsiveUser" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAME</th>
                                <th>PERMISSIONS</th>
                                <th>OPCION</th>
                                
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
      


<!-- Modal New User-->
<div class="modal fade" id="Modaluser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New User </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form  class=""id="formuser">
                    <input id="iduser" type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input id="nameuser" type="text" class="form-control"name="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input id="emailuser"  id="" type="email" class="form-control"name="email" placeholder="Email">
                    </div>
                    <div class="mb-3 col-md-6">
                            <label class="form-label">Local Phone</label>
                            <input id="phoneuser" type="text" class="form-control  " name="phone"placeholder="(000) 000-0000">
                    </div>
                    <div class="mb-3 col-md-6">
                            <label class="form-label">foreign phone</label>
                            <input id="phoneuser2" type="text" class="form-control  " name="phone2"placeholder="(503) 0000-0000">
                    </div>
                   <div class="mb-3 col-md-12">
                        <label for="typeRole">Roles</label>
                        <select id="typeRole" name="typeRole" class="form-control">
                        </select>
                    </div>
                    <div id="chec">
                        <label class="form-check">
                            <input id="cambiocontra"class="form-check-input" name ="cambiocontra" type="checkbox" value="">
                            <span class="form-check-label">
                               change password 
                            </span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input id="passworduser" type="password" class="form-control"name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmation Password</label>
                        <input id="passwordconfir" type="password" class="form-control"name="password confirmation" placeholder="Confirmation Password">
                    </div>
           
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnsave">Save changes</button>

            </div>
        </div>
    </div>
</div>

<!--modal nem role-->

<div class="modal fade" id="ModalRol" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Rol </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form  class=""id="formRol">
                    <input id="iduser" type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input id="name_rol"  id="" type="text" class="form-control"name="name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="permisos">Permissions</label>
                        <select id="permisos" name="permisos" class="form-control">
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnsave-rol">Save changes</button>

            </div>
        </div>
    </div>
</div>

<script>
    $.getScript("{{ asset('js/user.js') }}");
    </script>

