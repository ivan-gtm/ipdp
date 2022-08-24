@extends('layouts.frontend')
@section('title', 'Registro de Cédulas o Formatos de Participación Ciudadana')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="https://www.ipdp.cdmx.gob.mx/">
                            <img class="d-block w-100" src="{{ asset('imgs/slider_1.jpeg') }}" alt="First slide" />
                            <!-- <div class="carousel-caption d-none d-md-block">
                                <h5>Noticia de Ejemplo 1</h5>
                                <p>Contenido de ejempo para Slide 1.</p>
                            </div> -->
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="https://www.ipdp.cdmx.gob.mx/">
                            <img class="d-block w-100" src="{{ asset('imgs/slider_2.jpeg') }}" alt="Second slide" />
                            <!-- <div class="carousel-caption d-none d-md-block">
                                <h5>Noticia de Ejemplo 2</h5>
                                <p>Contenido de ejempo para Slide 2.</p>
                            </div> -->
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="https://www.ipdp.cdmx.gob.mx/">
                            <img class="d-block w-100" src="{{ asset('imgs/slider_3.jpeg') }}" alt="Third slide" />
                            <!-- <div class="carousel-caption d-none d-md-block">
                                <h5>Noticia de Ejemplo 3</h5>
                                <p>Contenido de ejempo para Slide 3.</p>
                            </div> -->
                        </a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="row" style="background-color: rgb(236, 236, 236);padding: 109px 0px;border-radius: 10px;margin: 10px;margin-bottom: 70px;">
            <div class="col-12 text-center" style="padding-bottom: 30px;">
                <h3 class="text-center">REGISTRO DE CEDULA</h3>
                Presenta tus Recomendaciones, Opiniones o Propuestas y participa en la consulta ciudadana que la CDMX te ofrece.
                <br>
                Da click en "REGISTRAR CEDULA" para presentar tu propuesta.
            </div>
            <div class="col-8 offset-md-2">
                <div class="d-grid col-12">
                    <a class="btn btn-primary" href="{{ route('cedula.registrar') }}">REGISTRAR CEDULA</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <form method="POST" action="{{route('cedula.buscarCedula')}}">
            <div class="row" style="background-color: rgb(236, 236, 236); padding: 32px 0px; border-radius: 10px; margin: 10px;margin-bottom: 70px;">
                <div class="col-8 offset-md-2 text-center" style="padding-bottom: 17px;">
                    <h3>SEGUIMIENTO DE FOLIOS</h3>
                    Si ya tienes un folio capturado. Consulta en esta sección, el progreso de tu cedula.
                    @csrf
                    <input name="numero_folio" class="form-control" type="number" placeholder="Ingresa el numero de folio" style="margin-bottom: 10px; padding: 15px;">
                </div>
                <div class="col-8 offset-md-2 text-center">
                    ó
                </div>

                <div class="col-8 offset-md-2">
                    <label class="form-label" for="password-input">En caso de no recordar el folio, capture el correo electrónico registrado</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="email" class="form-control pe-5" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" style="margin-bottom: 10px; padding: 15px;">
                    </div>
                </div>
                <div class="col-8 offset-md-2">
                    <div class="d-grid col-12">
                        <button type="submit" class="btn btn-primary" type="button">CONSULTAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    const carousel = new bootstrap.Carousel('#carouselExampleCaptions',{
        interval: 5000,
        ride:true
    });
</script>
@endsection