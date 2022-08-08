@extends('layouts.admin')
@section('title', 'Registrar usuario en plataforma')
@section('modulo_titulo', 'Registrar usuario en plataforma')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Registrar nuevo usuario</h3>
                    <div class="card-body">
                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nombre" id="name" class="form-control" name="name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="e-mail" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Contraseña" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <!-- <input type="password" placeholder="Contraseña" id="password" class="form-control" name="password" required> -->
                                <select class="form-control" name="rol" id="rol">
                                    <option></option>
                                    <option value="recepcion">Equipo de Recepción</option>
                                    <option value="analisis">Equipo de Análisis</option>
                                    <option value="tecnica">Equipo Evaluación Tecnica</option>
                                    <option value="juridica">Equipo Evaluación Juridica</option>
                                    <option value="integracion_pgd">Integración (PGD)</option>
                                    <option value="integracion_pgot">Integración (PGOT)</option>
                                    <option value="administracion">Administración</option>
                                </select>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <!-- <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div> -->
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Registrar Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection