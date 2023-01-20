


<div class="header">
    <h1 class="header-title">
        Welcome back, {{ Auth::user()->name }}!
    </h1>
</div>

<div class="header">
    <h1 class="header-title">
      VISTA   TABLA REGISTROS
    </h1>

    <div class="float-right">
    <button class="btn btn-primary float-right" id="idcrearegistro">CREAR REGISTRO</button>

</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Table with Buttons</h5>
                <h6 class="card-subtitle text-muted">This extension provides a framework with common options
                    that can be used with
                    DataTables. See official documentation <a href="https://datatables.net/extensions/buttons/"
                        target="_blank" rel="noopener noreferrer nofollow">here</a>.</h6>
            </div>

            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>


</script>

<script src="{{ asset('js/registros.js') }}"></script>

