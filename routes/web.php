<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IPDPController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\AuthController;

Route::get('/', [IPDPController::class, 'index'])->name('ipdp.home');
Route::get('/login', [IPDPController::class, 'login'])->name('ipdp.login');
Route::get('/recupera-contrasena', [IPDPController::class, 'recuperaContrasena'])->name('ipdp.recupera_contrasena');
Route::get('/consulta-indigena', [IPDPController::class, 'consultaIndigena'])->name('ipdp.consulta_indigena');
Route::get('/registra-cedula', [IPDPController::class, 'registraCedula'])->name('ipdp.registra_cedula');
Route::get('/buscar-folio', [IPDPController::class, 'buscarFolio'])->name('ipdp.buscar_folio');
Route::get('/seguimiento-folios', [IPDPController::class, 'seguimientoFolios'])->name('ipdp.seguimiento_folios');
Route::get('/admin', [IPDPController::class, 'admin'])->name('ipdp.admin');
Route::get('/confirmacion', [IPDPController::class, 'confirmacion'])->name('ipdp.confirmacion');

Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('ipdp.login');
Route::get('/dummy', [DummyController::class, 'dummyMethod']);