<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IPDPController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CedulaController;

Route::get('/', [IPDPController::class, 'index'])->name('ipdp.home');
// Route::resource('cedula', 'CedulaController');
// Route::get('/registra-cedula', [CedulaController::class, 'index'])->name('ipdp.registra_cedula');
Route::get('/registra-cedula', [IPDPController::class, 'registraCedula'])->name('cedula.show');
Route::post('/cedula', [CedulaController::class, 'store'])->name('cedula.store');
Route::get('/confirmacion', [IPDPController::class, 'confirmacion'])->name('ipdp.confirmacion');

Route::get('/logins', [IPDPController::class, 'login'])->name('ipdp.logins');
Route::get('/recupera-contrasena', [IPDPController::class, 'recuperaContrasena'])->name('ipdp.recupera_contrasena');
Route::get('/consulta-indigena', [IPDPController::class, 'consultaIndigena'])->name('ipdp.consulta_indigena');
Route::get('/buscar-folio', [IPDPController::class, 'buscarFolio'])->name('ipdp.buscar_folio');
Route::get('/seguimiento-folios', [IPDPController::class, 'seguimientoFolios'])->name('ipdp.seguimiento_folios');
Route::get('/admin', [IPDPController::class, 'admin'])->name('ipdp.admin');

Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('ipdp.login');
Route::get('/dummy', [DummyController::class, 'dummyMethod']);