@extends('layouts.app')

@section('content')


<div class="header">
    <h1 class="header-title">
        Welcome, {{ Auth::user()->name }}!
    </h1>
    <p class="header-subtitle">This is your work area..</p>

</div>

<!-- BEGIN primary modal -->

<div class="modal fade" id="modalregistro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">RGISTROS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form id="frmbanco">
                    <div class="mb-3">
                        <label class="form-label">Registros</label>
                        <input type="text" class="form-control" name="nbrbanco" id="nbrbanco" placeholder="Nombre banco"
                            autocomplete="off">
                    </div>

                    <button type="button" id="agregabanco" class="btn btn-primary">agregar</button>
                </form>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:40%;">Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>cuscatlan</td>
                            <td class="table-action">
                                <a href="#"><i class="align-middle fas fa-fw fa-pen"></i></i></a>&nbsp;
                                &nbsp;&nbsp;&nbsp;
                                <a href="#"><i class="align-middle fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Datatables with Buttons
</script>

@endsection