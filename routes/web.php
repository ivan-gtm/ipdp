<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IPDPController;
use App\Http\Controllers\ConsultaPublicaController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\ConsultaIndigenaController;
use App\Http\Controllers\CustomAuthController;

Route::get('/', [IPDPController::class, 'index'])->name('ipdp.home');
Route::get('/obtener-colonias/{codigo_postal}', [ConsultaPublicaController::class, 'obtenerColonias'])->name('cedula.obtenerColonias');
Route::post('/{tipo_consulta}/subir-archivo/{folio}', [ConsultaPublicaController::class, 'subirArchivo']);
Route::post('/buscar-cedula', [ConsultaPublicaController::class, 'buscarCedula'])->name('cedula.buscarCedula');
Route::get('/buscar-folio', [IPDPController::class, 'buscarFolio'])->name('ipdp.buscar_folio');
Route::get('/recupera-contrasena', [IPDPController::class, 'recuperaContrasena'])->name('ipdp.recupera_contrasena');
// Route::get('/seguimiento/{folio}', [ConsultaPublicaController::class, 'seguimientoFolios'])->name('ipdp.seguimiento_folios');

/*
|--------------------------------------------------------------------------
| Consulta Publica
|--------------------------------------------------------------------------
*/
    Route::get('/consulta-publica/registrar', [ConsultaPublicaController::class, 'registrar'])->name('cedula.registrar');
    Route::post('/consulta-publica', [ConsultaPublicaController::class, 'store'])->name('cedula.store');
    Route::get('/consulta-publica/confirmacion/{numero_folio}', [ConsultaPublicaController::class, 'confirmacion'])->name('cedula.confirmacion');
    Route::get('/cedula/pdf/{numero_folio}', [ConsultaPublicaController::class, 'generarFormatoPDF'])->name('cedula.pdf');
    
// ADMIN
    Route::get('/administracion', [AdministracionController::class, 'home'])->name('administracion.home')->middleware('auth');
    
    // FORMATO INTERNO
    Route::get('/administracion/consulta-indigena', [ConsultaIndigenaController::class, 'registrar'])->name('consultaIndigena.registrar')->middleware('auth');
    Route::post('/administracion/consulta-indigena', [ConsultaIndigenaController::class, 'store'])->name('consultaIndigena.store')->middleware('auth');
    Route::get('/administracion/consulta-indigena/confirmacion/{numero_folio}', [ConsultaIndigenaController::class, 'confirmacion'])->name('consultaIndigena.confirmacion')->middleware('auth');
    Route::get('/administracion/consulta-indigena/pdf/{numero_folio}', [ConsultaIndigenaController::class, 'generarFormatoPDF'])->name('consulta_indigena.pdf')->middleware('auth');
    Route::get('/administracion/consulta-indigena/detalle-consulta/{folio}', [AdministracionController::class, 'detalleFormatoInterno'])->name('administracion.detalleFormatoInterno')->middleware('auth');
    
    // CONSULTA PUBLICA
    Route::get('/administracion/consulta-publica', [AdministracionController::class, 'registrarConsultaPublica'])->name('administracion.registrarConsultaPublica')->middleware('auth');
    Route::post('/administracion/consulta-publica', [AdministracionController::class, 'guardarConsultaPublica'])->name('administracion.guardarConsultaPublica')->middleware('auth');

    // EVALUACION RECEPCION
    Route::get('/administracion/recepcion', [AdministracionController::class, 'evaluacionRecepcion'])->name('administracion.evaluacionRecepcion')->middleware('auth');

    // EVALUACION ANALISIS 
    Route::get('/administracion/subtemas/{tema_id?}', [AdministracionController::class, 'obtenerSubtemasAnalisis'])->name('administracion.obtenerSubtemasAnalisis')->middleware('auth');
    Route::get('/administracion/analisis', [AdministracionController::class, 'evaluacionAnalisis'])->name('administracion.evaluacionAnalisis')->middleware('auth');
    Route::post('/administracion/analisis/guardar-evaluacion', [AdministracionController::class, 'guardarEvaluacionAnalisis'])->name('administracion.guardarEvaluacionAnalisis')->middleware('auth');
    Route::post('/administracion/analisis/rechazo', [AdministracionController::class, 'guardarRechazoAnalisisSolicitud'])->name('administracion.guardarRechazoAnalisisSolicitud')->middleware('auth');
    Route::get('/administracion/analisis/detalle-consulta/{folio}', [AdministracionController::class, 'detalleConsultaPublica'])->name('administracion.detalleConsulta')->middleware('auth');

    // EVALUACION TECNICA
    Route::get('/administracion/evaluacion-tecnica', [AdministracionController::class, 'evaluacionTecnica'])->name('administracion.evaluacionTecnica')->middleware('auth');
    Route::post('/administracion/evaluacion-tecnica/guardar', [AdministracionController::class, 'guardarEvaluacionTecnica'])->name('administracion.guardarEvaluacionTecnica')->middleware('auth');
    Route::post('/administracion/evaluacion-tecnica/rechazo', [AdministracionController::class, 'guardarRechazoEvaluacionTecnica'])->name('administracion.guardarRechazoEvaluacionTecnica')->middleware('auth');
    Route::get('/administracion/evaluacion-tecnica/consultar/{consulta_id?}', [AdministracionController::class, 'obtenerEvaluacionJuridica'])->name('administracion.obtenerEvaluacionJuridica')->middleware('auth');
    
    // EVALUACION JURIDICA
    Route::get('/administracion/evaluacion-juridica', [AdministracionController::class, 'evaluacionJuridica'])->name('administracion.evaluacionJuridica')->middleware('auth');
    Route::post('/administracion/evaluacion-juridica/rechazo', [AdministracionController::class, 'guardarRechazoEvaluacionJuridica'])->name('administracion.guardarRechazoEvaluacionJuridica')->middleware('auth');
    Route::post('/administracion/evaluacion-juridica/guardar', [AdministracionController::class, 'guardarEvaluacionJuridica'])->name('administracion.guardarEvaluacionJuridica')->middleware('auth');
    
    // EVALUACION INTEGRACION
    Route::get('/administracion/evaluacion-integracion', [AdministracionController::class, 'evaluacionIntegracion'])->name('administracion.evaluacionIntegracion')->middleware('auth');
    Route::post('/administracion/evaluacion-integracion/guardar', [AdministracionController::class, 'guardarEvaluacionIntegracion'])->name('administracion.guardarEvaluacionIntegracion')->middleware('auth');
    // Route::post('/administracion/evaluacion-juridica/rechazo', [AdministracionController::class, 'guardarRechazoEvaluacionJuridica'])->name('administracion.guardarRechazoEvaluacionJuridica')->middleware('auth');

// USUARIOS SISTEMA
    Route::get('/administracion/usuarios', [AdministracionController::class, 'usuariosSistema'])->name('usuariosSistema')->middleware('auth');
    Route::get('/administracion/usuarios/registrar', [CustomAuthController::class, 'registration'])->name('administracion.registrarUsuario')->middleware('auth');
    Route::get('/administracion/usuarios/editar/{usuario_id}', [CustomAuthController::class, 'editarUsuario'])->name('administracion.editarUsuario')->middleware('auth');
    Route::post('/administracion/usuarios/editar', [CustomAuthController::class, 'actualizarUsuario'])->name('editar_usuario')->middleware('auth');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom')->middleware('auth');
    Route::get('/administracion/usuarios/borrar/{usuario_id}', [CustomAuthController::class, 'borrarUsuario'])->name('administracion.borrarUsuario')->middleware('auth');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
    Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
    Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');
    Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 



// Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 