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

    Route::get('registro/vistadetallefile', [App\Http\Controllers\HomeController::class, 'vistafile']);

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
    Route::post('registro/reporte/{id}', [App\Http\Controllers\RegistroController::class, 'reporte']);
 });