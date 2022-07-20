<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DummyController;

use App\Http\Controllers\IPDPController;
use App\Http\Controllers\CedulaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdministracionController;

Route::get('/', [IPDPController::class, 'index'])->name('ipdp.home');

// Registro de cedula
Route::get('/obtener-colonias/{codigo_postal}', [CedulaController::class, 'obtenerColonias'])->name('cedula.obtenerColonias');
Route::get('/registra-cedula', [CedulaController::class, 'registraCedula'])->name('cedula.registrar');
Route::post('/cedula', [CedulaController::class, 'store'])->name('cedula.store');
Route::get('/confirmacion/{numero_folio}', [CedulaController::class, 'confirmacion'])->name('ipdp.confirmacion');
Route::post('/subir-archivo/{folio}', [CedulaController::class, 'subirArchivo']);

Route::post('/buscar-cedula', [CedulaController::class, 'buscarCedula'])->name('cedula.buscarCedula');
Route::get('/cedula/pdf/{numero_folio}', [CedulaController::class, 'generarFormatoPDF'])->name('cedula.pdf');

// Route::get('/seguimiento/{folio}', [CedulaController::class, 'seguimientoFolios'])->name('ipdp.seguimiento_folios');
Route::get('/buscar-folio', [IPDPController::class, 'buscarFolio'])->name('ipdp.buscar_folio');

Route::get('/logins', [IPDPController::class, 'login'])->name('ipdp.logins');
Route::get('/recupera-contrasena', [IPDPController::class, 'recuperaContrasena'])->name('ipdp.recupera_contrasena');
Route::get('/consulta-indigena', [IPDPController::class, 'consultaIndigena'])->name('ipdp.consulta_indigena');

Route::get('/administracion', [AdministracionController::class, 'home'])->name('administracion.home');

Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('ipdp.login');
Route::get('/dummy', [DummyController::class, 'dummyMethod']);