<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="header-title mb-0">
                    Files
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
            
            <div class="tab-content">
                <div class="tab-pane active" id="tab-1" role="tabpanel">
                    <h4 class="tab-title">
                      Files to opening
                    </h4>
                    <br><br><br>
                    <div class="card-body">
                        <table id="tblfilesopnening" class="table table-striped" style="width:100%">
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

                            </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
      
<script>
    $.getScript("{{ asset('js/senttoopening.js') }}");
</script>

