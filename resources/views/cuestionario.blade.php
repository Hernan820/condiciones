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
                        <table id="tabla-pregunta" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>TITLE</th>
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
                    <input id="id-cuestionario" type="hidden" name="id">
                    <div class="mb-3">
                        <label for="inputFirstName">Date</label>
                        <div class="input-group date" id="datetimepicker-minimum-CUESTIONARIO"
                            data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                id="date" name="date" autocomplete="off"
                                data-target="#datetimepicker-minimum-CUESTIONARIO" />
                            <div class="input-group-text"
                                data-target="#datetimepicker-minimum-CUESTIONARIO"
                                data-toggle="datetimepicker"><i
                                    class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">detail</label>
                        <input id="detalle" type="text" class="form-control"name="detalle" placeholder="detail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">name</label>
                        <input id="name" type="text" class="form-control"name="name" placeholder="name">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="flag">Flag</label>
                        <select id="flag" name="flag" class="form-control">
                            <option selected>Chosee...</option>
                            <option value="1">Cliente</option>
                            <option value="0">Usuario</option>
                        </select>
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
                    <input id="id_pregunta" type="hidden" name="idPregunta" value="">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input id="title" type="text" class="form-control"name="title" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <label for="id_cuestionario">Name of questionary</label>
                        <select id="iden_cuestionario" name="iden_cuestionario" class="form-control">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label w-100">Category</label>
                        <select id="category" name="category" class="form-control">
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
    $.getScript("{{ asset('js/cuestionario.js') }}");
    $.getScript("{{ asset('js/pregunta.js') }}");
</script>