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
                    <button id="btn-add-task" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-tarea">
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

<div class="modal fade" id="Modal-tarea" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form-tarea">
                 <div class="modal-body m-3">
                    @csrf
                    <input id="id_tarea" type="hidden" name="id_tarea" value="">
                    <div class="mb-3">
                        <label for="inputFirstName">Date</label>
                        <div class="input-group date" id="datetimepicker-minimum-tarea"
                            data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                id="date" name="datetarea" autocomplete="off"
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
                                    <div id="quill-editor" name ="description"></div>
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
                        <button  id="guardar-tarea" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>   
                
            </form>
        </div>
    </div>
</div>


<script>
    $.getScript("{{ asset('js/tareas.js') }}");
  </script>



