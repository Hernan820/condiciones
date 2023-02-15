<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    Business maintenance!
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
                        <i class="align-middle me-2 fas fa-fw fa-user-check"></i> Companies</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                        company table
                    </h4>
                    <br>
                    <button id="btn-addcompany" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-compania">
                        Add New Company
                    </button>
                    <div class="card-body">
                        <table id="tabla-compania" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>PHONE</th>
                                    <th>LOGO</th>
                                    <th>WEB SITE</th>
                                    <th>ACTIONS</th>
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

<!--Modal companies-->


<div class="modal fade" id="Modal-compania" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formCompany" >
                 <div class="modal-body m-3">
                    @csrf
                    <input id="idCompania" type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label class="form-label">Name of Company</label>
                        <input id="nombre" type="text" class="form-control"name="nombre" placeholder="Name of Company">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input id="telefono" type="text" class="form-control"name="telefono" placeholder="(000) 000-0000">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input id="webSite" type="text" class="form-control"name="webSite" placeholder="WebSite">
                    </div>
                    <div class="mb-3">
                        <label class="form-label w-100">Add Logo</label>
                        <input id="logo"  name="logo" type="file" class="hidden">
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  id="guardar-compania" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>   
                
            </form>
        </div>
    </div>
</div>
<!-- END companies modal -->
<script>
    $.getScript("{{ asset('js/compania.js') }}");
</script>