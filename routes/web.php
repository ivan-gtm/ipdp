<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IPDPController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\AuthController;

Route::get('/ipdp', [IPDPController::class, 'index'])->name('ipdp.home');
Route::get('/ipdp/login', [IPDPController::class, 'login'])->name('ipdp.login');
Route::get('/ipdp/recupera-contrasena', [IPDPController::class, 'recuperaContrasena'])->name('ipdp.recupera_contrasena');
Route::get('/ipdp/consulta-indigena', [IPDPController::class, 'consultaIndigena'])->name('ipdp.consulta_indigena');
Route::get('/ipdp/registra-cedula', [IPDPController::class, 'registraCedula'])->name('ipdp.registra_cedula');

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('ipdp.login');
Route::get('/dummy', [DummyController::class, 'dummyMethod']);