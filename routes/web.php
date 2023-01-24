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

    Route::post('condicion/bancosagrega', [App\Http\Controllers\BancoController::class, 'create']);

    Route::get('condicion/vistaprueba', [App\Http\Controllers\HomeController::class, 'vistacondiciones']);

    Route::get('condicion/vistaregistros', [App\Http\Controllers\HomeController::class, 'vistaregistro']);

    Route::post('condicion/compania', [App\Http\Controllers\CompaniaController::class, 'index']);

    Route::post('condicion/agregaregistro', [App\Http\Controllers\RegistroController::class, 'create']);

    Route::post('condicion/documentos', [App\Http\Controllers\DocumentoController::class, 'show']);

    Route::post('condicion/cuestionario', [App\Http\Controllers\CuestionarioController::class, 'show']);

    Route::post('condicion/prestamos', [App\Http\Controllers\PrestamoController::class, 'show']);


 });