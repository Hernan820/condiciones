<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('user', [App\Http\Controllers\HomeController::class,'vistamanagement']);

    Route::post('condicion/bancosagrega', [App\Http\Controllers\BancoController::class, 'create']);

    Route::get('condicion/vistaprueba', [App\Http\Controllers\HomeController::class, 'vistacondiciones']);

    Route::get('condicion/vistaregistros', [App\Http\Controllers\HomeController::class, 'vistaregistro']);

    Route::get('registro/vistadetallefile/{id}/{vista}', [App\Http\Controllers\HomeController::class, 'vistafile']);

    Route::post('condicion/compania', [App\Http\Controllers\CompaniaController::class, 'index']);

    Route::post('condicion/agregaregistro', [App\Http\Controllers\RegistroController::class, 'create']);

    

    Route::post('condicion/documentos', [App\Http\Controllers\DocumentoController::class, 'show']);

    Route::post('condicion/cuestionario', [App\Http\Controllers\CuestionarioController::class, 'show']);

    Route::post('condicion/prestamos', [App\Http\Controllers\PrestamoController::class, 'show']);

    Route::get('registro/etapa/{id}', [App\Http\Controllers\RegistroController::class, 'show']);

    Route::get('registros/cancelado/{estado}', [App\Http\Controllers\RegistroController::class, 'cancel']);

    #rutas usuarios
    Route::post('condicion/agregaruser', [App\Http\Controllers\UserController::class, 'create']);

    Route::get('condiciones/Users', [App\Http\Controllers\UserController::class, 'show']);

    Route::post('user/roles', [App\Http\Controllers\UserController::class, 'roles']);

    Route::post('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']); 

    Route::post('user/edita/{id}', [App\Http\Controllers\UserController::class, 'edit']); 
    
    Route::post('user/actualiza', [App\Http\Controllers\UserController::class, 'update']); 

    #cambio de estados
    Route::post('registro/cancelacion', [App\Http\Controllers\RegistroController::class, 'cancelado']);

    Route::post('registro/estado/{estado}/{id}', [App\Http\Controllers\RegistroController::class, 'danado']);

    #cambia estapa de registro
    Route::post('registro/cambioetapa/{estado}/{id}', [App\Http\Controllers\RegistroController::class, 'etapa']);
    
    #documentos

    Route::post('doc/edita/{id}', [App\Http\Controllers\DocumentoController::class, 'edit']);

    Route::post('doc/actualiza', [App\Http\Controllers\DocumentoController::class, 'update']);

    Route::post('doc/agrega', [App\Http\Controllers\DocumentoController::class, 'store']);

    Route::post('doc/elimina/{id}', [App\Http\Controllers\DocumentoController::class, 'destroy']);

    #registros
    Route::get('registro/reporte/{id}', [App\Http\Controllers\RegistroController::class, 'reporte']);

    #RUTAS DE LA VISTA DE EMPRESAS.
  
    Route::get('compania', [App\Http\Controllers\CompaniaController::class, 'vista_compania']);
    Route::post('compania/add', [App\Http\Controllers\CompaniaController::class, 'create']);
    Route::get('compania/show', [App\Http\Controllers\CompaniaController::class, 'show'])->name('compania.show');
    Route::post('compania/edita/{id}', [App\Http\Controllers\CompaniaController::class, 'edit']);
    Route::post('compania/delete/{id}', [App\Http\Controllers\CompaniaController::class, 'destroy']);
    Route::post('compania/actualiza', [App\Http\Controllers\CompaniaController::class, 'update']); 
  


    # VISTA DE DETALLE
    Route::post('registro/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'show']);

    Route::post('registro/notaseguimiento', [App\Http\Controllers\NotaRegistroController::class, 'create']);

    Route::post('cliente/actualiza', [App\Http\Controllers\ClienteController::class, 'update']);

    Route::post('registro/actualiza', [App\Http\Controllers\RegistroController::class, 'update']);

    Route::post('docs/actualiza', [App\Http\Controllers\DetalleDocumentoController::class, 'update']);

    Route::post('pregunta/actualizarespuesta', [App\Http\Controllers\RespuestaClienteController::class, 'update']);

     
    Route::post('registro/actualizafechas', [App\Http\Controllers\RegistroController::class, 'updatefechas']);

    #vista de quiestionarios.
    Route::get('cuestionario', [App\Http\Controllers\CuestionarioController::class, 'index'])->name('cuestionario.index');
    Route::post('cuestionario/add', [App\Http\Controllers\CuestionarioController::class, 'create'])->name('cuestionario.create');
    Route::get('cuestionario/show', [App\Http\Controllers\CuestionarioController::class, 'show'])->name('cuestionario.show');
    Route::post('cuestionario/edita/{id}', [App\Http\Controllers\CuestionarioController::class, 'edit'])->name('cuestionario.edit');
    Route::post('cuestionario/actualiza', [App\Http\Controllers\CuestionarioController::class, 'update'])->name('cuestionario.update');
    Route::post('cuestionario/delete/{id}', [App\Http\Controllers\CuestionarioController::class, 'destroy'])->name('cuestionario.destroy');

    #vista pregunta 
    Route::get('pregunta/idcuestionario', [App\Http\Controllers\PreguntaController::class, 'namecuestionario'])->name('pregunta.namecuestionario');
    Route::get('pregunta/category', [App\Http\Controllers\PreguntaController::class, 'categoriaName'])->name('pregunta.categoriaName');
    Route::post('pregunta/add', [App\Http\Controllers\PreguntaController::class, 'create'])->name('pregunta.create');
    Route::get('pregunta/show', [App\Http\Controllers\PreguntaController::class, 'show'])->name('pregunta.show');
    Route::post('pregunta/edita/{id}', [App\Http\Controllers\PreguntaController::class, 'edit'])->name('pregunta.edit');
    Route::post('pregunta/actualiza', [App\Http\Controllers\PreguntaController::class, 'update'])->name('pregunta.update');
    Route::post('pregunta/delete/{id}', [App\Http\Controllers\PreguntaController::class, 'destroy'])->name('pregunta.destroy');

    # vista roles
    Route::get('permisos/name', [App\Http\Controllers\RolController::class, 'namepermisos'])->name('permisos.namepermisos');
    Route::get('roles/show', [App\Http\Controllers\RolController::class, 'show'])->name('roles.show');
    Route::post('rol/add', [App\Http\Controllers\RolController::class, 'create'])->name('rol.create');
    Route::post('rol/edita/{id}', [App\Http\Controllers\RolController::class, 'edit'])->name('rol.edit');
    Route::post('rol/actualiza', [App\Http\Controllers\RolController::class, 'update'])->name('rol.update');
    Route::post('rol/delete/{id}', [App\Http\Controllers\RolController::class, 'destroy'])->name('rol.destroy');

    #vista tareas
    Route::get('task/index',[App\Http\Controllers\TareasController::class,'index'])->name('task.index');
    Route::post('task/add',[App\Http\Controllers\TareasController::class,'create'])->name('task.create');

  #VISTA DE TO OPENING
    Route::get('vista/opening', [App\Http\Controllers\RegistroController::class, 'index']);

    Route::get('registro/opnening', [App\Http\Controllers\RegistroController::class, 'opening']);

    Route::post('registro/fecha/{id}', [App\Http\Controllers\RegistroController::class, 'fechaopening']);

    Route::get('registro/usuariosasignados/{id}', [App\Http\Controllers\AsignacionesRegistroController::class, 'usuariosasigancion']);

    Route::post('registro/asiganacion', [App\Http\Controllers\AsignacionesRegistroController::class, 'asignar']);

});