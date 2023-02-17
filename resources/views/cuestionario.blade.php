<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<!--vista index de ccuestionarios-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    Questionnaires
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
                        <i class="align-middle me-2 fas fa-fw fa-user-check"></i> Quiestionnares</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">
                    <i class="align-middle me-2 fas fa-fw fa-question-circle"></i>Questions</a>
                </li>
               
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                        Table Questionnaires
                    </h4>
                    <br>
                    <button id="btn-add-cuestionario" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-cuestionario">
                      ADD NEW QUIZ
                    </button>
                    <div class="card-body">
                        <table id="tabla-cuestionario" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>DATE</th>
                                    <th>DETAIL</th>
                                    <th>NAME</th>
                                    <th>FLAG</th>
                                    <th>ACTIONS</th>
                                   </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--tabla preguntas-->
                <div class="tab-pane" id="tab-2" role="tabpanel">
                 <h4 class="tab-title">Questions</h4>
                 <br>
                 <button id="btn-add-pregunta" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-pregunta">
                    ADD NEW QUESTION
                 </button>
                <div class="card-body">
                        <table id="datatableactivos-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>TITLE</th>
                                    <th>STATUS</th>
                                    <th>ID QUESTIONNARES</th>
                                    <th>ID CATEGORY</th>
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

<!--modal para cuestionarios-->
<div class="modal fade" id="Modal-cuestionario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new Quiz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form-cuestionario" >
                 <div class="modal-body m-3">
                    @csrf
                    <input id="id-cuestionario" type="hidden" name="id-cuestionario" value="">
                    <div class="mb-3">
                        <label class="form-label">date</label>
                        <input id="date" type="text" class="form-control"name="date" placeholder="date">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">detail</label>
                        <input id="detail" type="text" class="form-control"name="detail" placeholder="detail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">name</label>
                        <input id="name" type="text" class="form-control"name="name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">flag</label>
                        <input id="flag" type="text" class="form-control"name="flag" placeholder="flag">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  id="guardar-cuestionario" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>   
                
            </form>
        </div>
    </div>
</div>
<!--modal para preguntas-->
<div class="modal fade" id="Modal-pregunta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form-pregunta">
                 <div class="modal-body m-3">
                    @csrf
                    <input id="id-pregunta" type="hidden" name="id-pregunta" value="">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input id="title" type="text" class="form-control"name="title" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">status</label>
                        <input id="status" type="text" class="form-control"name="status" placeholder="status">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Id Questionnares</label>
                        <input id="iden-cuestionario" type="text" class="form-control"name="iden-cuestionario" placeholder="Id Questionnares">
                    </div>
                    <div class="mb-3">
                        <label class="form-label w-100">Id Category</label>
                        <input id="category"  name="category" type="text" class="form-control" placeholder="Id Category">
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
    $.getScript("{{ asset('js/cuestionario.js') }}");
</script>