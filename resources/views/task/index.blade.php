<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    Task
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
                        <i class="align-middle me-2 fas fa-fw fa-user-check"></i> pending tasks</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">
                    <i class="align-middle me-2 fas fa-fw fa-question-circle"></i>completed tasks</a>
                </li>
               
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                        pending task
                    </h4>
                    <br>
                    <button id="btn-add-task" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-task">
                     Add new task
                    </button>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-actions float-end">
                                            <a href="#" class="me-1">
                                                <i class="align-middle" data-feather="refresh-cw"></i>
                                            </a>
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
                                        <h5 class="card-title">Upcoming</h5>
                                        <h6 class="card-subtitle text-muted">Nam pretium turpis et arcu. Duis arcu.</h6>
                                    </div>
                                    <div class="card-body p-3">
    
                                        <div id="tasks-upcoming">
                                            <div class="card mb-3 bg-light cursor-grab">
                                                <div class="card-body p-3">
                                                    <div class="float-end me-n2">
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input" aria-label="completed" checked>
                                                        </label>
                                                    </div>
                                                    <p>Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada.</p>
                                                    <div class="float-end mt-n1">
                                                        <img src="img/avatars/avatar.jpg" width="32" height="32" class="rounded-circle" alt="Avatar">
                                                    </div>
                                                    <a class="btn btn-primary btn-sm" href="#">View</a>
                                                </div>
                                            </div>
                                           
                                        </div>
    
                                       
    
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-actions float-end">
                                            <a href="#" class="me-1">
                                                <i class="align-middle" data-feather="refresh-cw"></i>
                                            </a>
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
                                        <h5 class="card-title">Upcoming</h5>
                                        <h6 class="card-subtitle text-muted">Nam pretium turpis et arcu. Duis arcu.</h6>
                                    </div>
                                    <div class="card-body p-3">
    
                                        <div id="tasks-upcoming">
                                            <div class="card mb-3 bg-light cursor-grab">
                                                <div class="card-body p-3">
                                                    <div class="float-end me-n2">
                                                        <label class="form-check">
                                                            <input type="checkbox" class="form-check-input" aria-label="completed" checked>
                                                        </label>
                                                    </div>
                                                    <p>Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada.</p>
                                                    <div class="float-end mt-n1">
                                                        <img src="img/avatars/avatar.jpg" width="32" height="32" class="rounded-circle" alt="Avatar">
                                                    </div>
                                                    <a class="btn btn-primary btn-sm" href="#">View</a>
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
    </div>
</div>

<!--modal para tarea-->

<div class="modal fade" id="Modal-task" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form-pregunta">
                 <div class="modal-body m-3">
                    @csrf
                    <input id="id_tarea" type="hidden" name="id_tarea" value="">
                    <div class="mb-3">
                        <label for="inputFirstName">Date</label>
                        <div class="input-group date" id="datetimepicker-minimum-tarea"
                            data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                id="date" name="date" autocomplete="off"
                                data-target="#datetimepicker-minimum-tarea" />
                            <div class="input-group-text"
                                data-target="#datetimepicker-minimum-tarea"
                                data-toggle="datetimepicker"><i
                                    class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name task</label>
                        <input id="name_tarea" type="text" class="form-control"name="name_tarea" placeholder="title">
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Description</h5>
                            </div>
                            <div class="card-body">
                                <div class="clearfix">
                                    <div id="quill-toolbar">
                                        <span class="ql-formats">
                                            <select class="ql-font"></select>
                                            <select class="ql-size"></select>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-strike"></button>
                                        </span>
                                        <span class="ql-formats">
                                            <select class="ql-color"></select>
                                            <select class="ql-background"></select>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-script" value="sub"></button>
                                            <button class="ql-script" value="super"></button>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-header" value="1"></button>
                                            <button class="ql-header" value="2"></button>
                                            <button class="ql-blockquote"></button>
                                            <button class="ql-code-block"></button>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                            <button class="ql-indent" value="-1"></button>
                                            <button class="ql-indent" value="+1"></button>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-direction" value="rtl"></button>
                                            <select class="ql-align"></select>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-link"></button>
                                            <button class="ql-image"></button>
                                            <button class="ql-video"></button>
                                        </span>
                                        <span class="ql-formats">
                                            <button class="ql-clean"></button>
                                        </span>
                                    </div>
                                    <div id="quill-editor"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="permisos">assigned user for this task</label>
                        <select id="usuario" name="usuario" class="form-control">
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  id="guardar-pregunta" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>   
                
            </form>
        </div>
    </div>
</div>


<script>
    $.getScript("{{ asset('js/tareas.js') }}");

</script>
<svg width="0" height="0" style="position:absolute">
    <defs>
        <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
            <path
                d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
            </path>
        </symbol>
    </defs>
</svg>
<script src="js/app.js"></script>

