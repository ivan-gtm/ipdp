<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DummyController;

use App\Http\Controllers\IPDPController;
use App\Http\Controllers\ConsultaPublicaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\ConsultaIndigenaController;

Route::get('/', [IPDPController::class, 'index'])->name('ipdp.home');

Route::get('/obtener-colonias/{codigo_postal}', [ConsultaPublicaController::class, 'obtenerColonias'])->name('cedula.obtenerColonias');

// Consulta Publica
Route::get('/consulta-publica/registrar', [ConsultaPublicaController::class, 'registrar'])->name('cedula.registrar');
Route::post('/consulta-publica', [ConsultaPublicaController::class, 'store'])->name('cedula.store');
Route::get('/consulta-publica/confirmacion/{numero_folio}', [ConsultaPublicaController::class, 'confirmacion'])->name('cedula.confirmacion');
Route::get('/cedula/pdf/{numero_folio}', [ConsultaPublicaController::class, 'generarFormatoPDF'])->name('cedula.pdf');

// Consulta Indigena
Route::get('/consulta-indigena', [ConsultaIndigenaController::class, 'registrar'])->name('consultaIndigena.registrar');
Route::post('/consulta-indigena', [ConsultaIndigenaController::class, 'store'])->name('consultaIndigena.store');
Route::get('/consulta-indigena/confirmacion/{numero_folio}', [ConsultaIndigenaController::class, 'confirmacion'])->name('consultaIndigena.confirmacion');
Route::get('/consulta-indigena/pdf/{numero_folio}', [ConsultaIndigenaController::class, 'generarFormatoPDF'])->name('consulta_indigena.pdf');

Route::post('/{tipo_consulta}/subir-archivo/{folio}', [ConsultaPublicaController::class, 'subirArchivo']);

Route::post('/buscar-cedula', [ConsultaPublicaController::class, 'buscarCedula'])->name('cedula.buscarCedula');

// Route::get('/seguimiento/{folio}', [ConsultaPublicaController::class, 'seguimientoFolios'])->name('ipdp.seguimiento_folios');
Route::get('/buscar-folio', [IPDPController::class, 'buscarFolio'])->name('ipdp.buscar_folio');

Route::get('/logins', [IPDPController::class, 'login'])->name('ipdp.logins');
Route::get('/recupera-contrasena', [IPDPController::class, 'recuperaContrasena'])->name('ipdp.recupera_contrasena');

// ADMIN
    // EVALUACION ANALISIS 
    Route::get('/administracion/analisis', [AdministracionController::class, 'evaluacionAnalisis'])->name('administracion.evaluacionAnalisis');
    Route::get('/administracion/analisis/detalle-consulta/{folio}', [AdministracionController::class, 'detalleConsulta'])->name('administracion.detalleConsulta');

    // EVALUACION TECNICA
    Route::get('/administracion/evaluacion-tecnica', [AdministracionController::class, 'evaluacionTecnica'])->name('administracion.evaluacionTecnica');
    Route::post('/administracion/evaluacion-tecnica/guardar', [AdministracionController::class, 'guardarEvaluacionAnalisisTecnico'])->name('administracion.guardarEvaluacionAnalisisTecnico');
    Route::get('/administracion/evaluacion-tecnica/consultar/{consulta_id}', [AdministracionController::class, 'obtenerEvaluacionJuridica'])->name('administracion.obtenerEvaluacionJuridica');
    
    // EVALUACION TECNICA
    Route::get('/administracion/evaluacion-juridica', [AdministracionController::class, 'evaluacionJuridica'])->name('administracion.evaluacionJuridica');
    // Route::post('/administracion/evaluacion-juridica/guardar', [AdministracionController::class, 'guardarEvaluacionAnalisisTecnico'])->name('administracion.guardarEvaluacionAnalisisTecnico');

Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('ipdp.login');
Route::get('/dummy', [DummyController::class, 'dummyMethod']);