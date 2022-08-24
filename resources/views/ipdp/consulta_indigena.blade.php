@extends('layouts.admin')
@section('title', 'Registro de Consulta Indigena')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="folio" content="{{ $numero_folio }}" />
<link type="text/css" rel="stylesheet" href="{{asset('css/uppy.min.css')}}" rel="stylesheet" />
<script src="{{asset('css/uppy.min.js')}}"></script>
<style>
    .label-red {
        color: red;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12 d-none">
        <strong>
            Instrucciones: Todos los campos marcados con <span class="label-red">(*)</span> son obligatorios.
        </strong>
        <br>
    </div>
    <div class="col-12">
        <div class="notification alert alert-danger" role="alert" style="display: none;">
            <ul id="backend-errors"></ul>
        </div>
    </div>
    <div class="col-12">
        <div class="bd-example">
            <nav>
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-tipo-consulta-tab" data-bs-toggle="tab" data-bs-target="#nav-tipo-consulta" type="button" role="tab" aria-controls="nav-tipo-consulta" aria-selected="false" tabindex="-1">TIPO DE
                        CONSULTA</button>
                    <button class="nav-link" id="nav-comunidad-org-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="true">COMUNIDAD ORGANIZACIÓN</button>
                    <button class="nav-link" id="nav-participante-tab" data-bs-toggle="tab" data-bs-target="#nav-opinion" type="button" role="tab" aria-controls="nav-opinion" aria-selected="true">PERSONA PARTICIPANTE</button>
                    <button class="nav-link" id="nav-ticket-finalizo-tab" data-bs-toggle="tab" data-bs-target="#nav-ticket-finalizo" type="button" role="tab" aria-controls="nav-ticket-finalizo" aria-selected="true">FORMA DE
                        PARTICIPACIÓN</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-tipo-consulta" role="tabpanel" aria-labelledby="nav-tipo-consulta-tab" tabindex="0">
                    <form class="row g-3 needs-validation" id="formTipoConsulta" novalidate>
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="radio" name="opcionTipoConsulta" id="opcionTipoConsultaIndigena" value="CONSULTA INDÍGENA">
                                        <label class="form-check-label" for="opcionTipoConsultaIndigena">
                                            CONSULTA INDÍGENA
                                        </label>
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="opcionTipoConsulta" id="opcionTipoConsultaPublica" value="CONSULTA PUBLICA">
                                        <label class="form-check-label" for="opcionTipoConsultaPublica">
                                            CONSULTA PUBLICA
                                        </label>
                                    </td>
                                </tr>
                                
                            </table>

                            <div class="invalid-feedback">Seleccione el tipo de consulta</div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="fechaSolicitud">Fecha</span>
                                <input id="fechaSolicitud" name="fechaSolicitud" type="date" class="form-control" aria-label="fechaSolicitud" aria-describedby="fechaSolicitud">

                                <div class="invalid-feedback">Seleccione la fecha de la consulta</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="radio" name="opcionTipoFormato" id="opcionTipoFormatoIndividual" value="INDIVIDUAL">
                                        <label class="form-check-label" for="opcionTipoFormatoIndividual">INDIVIDUAL</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="radio" name="opcionTipoFormato" id="opcionTipoFormatoEnlace" value="ENLACE">
                                        <label class="form-check-label" for="opcionTipoFormatoEnlace">ENLACE</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input class="form-check-input" type="radio" name="opcionTipoFormato" id="opcionTipoFormatoOtro" value="OTRO">
                                        <label class="form-check-label" for="opcionTipoFormatoOtro">
                                            OTRO
                                        </label>
                                        <input class="form-control" type="text" name="tipoFormatoOtroTxt" id="tipoFormatoOtroTxt" placeholder="Indique el tipo de consulta" disabled>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td class="text-center" style="background-color: #9f2442; color: white;">
                                        <strong>DATOS DEL ENLACE</strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Nombre Completo</span>
                                        <input type="text" class="form-control" id="inputNombreCompleto" name="inputNombreCompleto">

                                        <div class="invalid-feedback">Indique su nombre y appellidos</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Correo
                                            Electrónico</span>
                                        <input type="text" class="form-control" id="inputCorreo" name="inputCorreo" required>
                                        <div class="invalid-feedback">Indique su correo electronico</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Telefono</span>
                                        <input type="number" class="form-control" id="inputTelefono" name="inputTelefono" pattern="[0-9]{10}" placeholder="Numero a 10 digitos">

                                        <div class="invalid-feedback">Indique su numero telefonico (10 digitos)
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    ¿Se tienen datos de quien participa?

                                    <input class="form-check-input" type="radio" name="tieneDatosParticipante" id="datosParticipanteSi" value="si">
                                    <label class="form-check-label" for="datosParticipanteSi">Si</label>

                                    <input class="form-check-input" type="radio" name="tieneDatosParticipante" id="datosParticipanteNo" value="no">
                                    <label class="form-check-label" for="datosParticipanteNo">No</label>

                                    <div class="invalid-feedback">Indique si cuenta con los datos del
                                        participante</div>
                                </div>
                                <div class="col-6">
                                    ¿Es representante?
                                    <input class="form-check-input" type="radio" name="esRepresentante" id="esRepresentanteSi" value="si">
                                    <label class="form-check-label" for="esRepresentanteSi">Si</label>

                                    <input class="form-check-input" type="radio" name="esRepresentante" id="esRepresentanteNo" value="no">
                                    <label class="form-check-label" for="esRepresentanteNo">No</label>

                                    <div class="invalid-feedback">Indique si el participante es representante
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="btnSigTipoConsulta">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="nav-contact" role="tabpanel" aria-labelledby="nav-comunidad-org-tab" tabindex="0">
                    <form class="row g-3 needs-validation" id="frmTipoComunidadOrganizacion" novalidate>
                        <div class="row" id="autoridadRepresentativaOpciones">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <td class="text-center" style="background-color: #9f2442; color: white;">
                                            <strong>EN CASO DE SER AUTORIDAD REPRESENTATIVA, SELECCIONA LA QUE
                                                CORRESPONDA</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6 offset-md-3">
                                <div class="input-group has-validation">
                                    <table class="table" style="border:1px solid black;">
                                        <tr>
                                            <td>
                                                <label class="form-check-label" for="ningunaAutoridad">Ninguna</label>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="tipoAutoridad" id="ningunaAutoridad" value="ninguna" checked>
                                                <div class="invalid-feedback">Por favor indique el tipo de
                                                    autoridad.</div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="form-check-label" for="puebloOriginario">Pueblo
                                                    Originario</label>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="tipoAutoridad" id="puebloOriginario" value="Pueblo Originario">
                                                <div class="invalid-feedback">Por favor indique el tipo de
                                                    autoridad.</div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="form-check-label" for="barrioOriginario">Barrio
                                                    Originario</label>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="tipoAutoridad" id="barrioOriginario" value="Barrio Originario">
                                                <div class="invalid-feedback">
                                                    Por favor indique el tipo de autoridad.
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="form-check-label" for="comunidadIndigenaResidente">
                                                    Comunidad Indígena Residente
                                                </label>
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="tipoAutoridad" id="comunidadIndigenaResidente" value="Comunidad Indígena Residente">
                                                <div class="invalid-feedback">
                                                    Por favor indique el tipo de autoridad.
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="invalid-feedback">Por favor indique el tipo de autoridad.</div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="nombrePuebloComunidad">
                                                Nombre del pueblo / barrio originario / Comunidad Indígena:
                                                
                                            </label>
                                            <input type="text" class="form-control" id="nombrePuebloComunidad" name="nombrePuebloComunidad" placeholder="Indique el nombre de su pueblo, barrio o comunidad" disabled>

                                            <div class="invalid-feedback">Por favor indique Nombre del pueblo /
                                                barrio originario / Comunidad Indígena:.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="tipoOrganizacionOpciones">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <td class="text-center" style="background-color: #9f2442; color: white;">
                                            <strong>EN CASO DE SER ORGANIZACIÓN PUBLICA, PRIVADA O SOCIAL;
                                                SELECCIONA LA QUE CORRESPONDA</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6 offset-md-3">
                                <table class="table" style="border:1px solid black;">
                                    <tr>
                                        <td>
                                            <label class="form-check-label" for="ningunaOrganizacion">Ninguna</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="opcionTipoOrganizacion" id="ningunaOrganizacion" value="ninguna" checked>
                                            <div class="invalid-feedback">Por favor indique el tipo de
                                                autoridad.</div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-check-label" for="organizacionSocial">
                                                ORGANIZACIÓN SOCIAL
                                            </label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="opcionTipoOrganizacion" id="organizacionSocial" value="ORGANIZACIÓN SOCIAL">
                                            <div class="invalid-feedback">Por favor indique tipo de
                                                organizacion.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-check-label" for="academia">ACADEMIA</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="opcionTipoOrganizacion" id="academia" value="ACADEMIA">
                                            <div class="invalid-feedback">Por favor indique tipo de
                                                organizacion.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-check-label" for="camaraColegio">CÁMARA O
                                                COLEGIO</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="opcionTipoOrganizacion" id="camaraColegio" value="CÁMARA O COLEGIO">
                                            <div class="invalid-feedback">Por favor indique tipo de
                                                organizacion.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-check-label" for="alcaldiaAdministracionPublica">ALCALDIA O
                                                ADMINISTRACIÓN PUBLICA</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="opcionTipoOrganizacion" id="alcaldiaAdministracionPublica" value="ALCALDIA O ADMINISTRACIÓN PUBLICA">
                                            <div class="invalid-feedback">Por favor indique tipo de
                                                organizacion.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-check-label" for="ningunaOpcion">NINGUNA</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="opcionTipoOrganizacion" id="ningunaOpcion" value="NINGUNA">
                                            <div class="invalid-feedback">
                                                Por favor indique tipo de organizacion.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-check-label" for="otra">OTRA</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="opcionTipoOrganizacion" id="otra" value="OTRA">
                                            <div class="invalid-feedback">Por favor indique tipo de
                                                organizacion.</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" for="nombreOrganizacion">
                                                Nombre de la organización:
                                                
                                            </span>
                                            <input type="text" class="form-control" id="nombreOrganizacion" name="nombreOrganizacion" disabled>
                                            <div class="invalid-feedback">
                                                Por favor indique nombre de la organizacion
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type="button" id="btnAtrasComunidad">Atras</button>

                                    <button class="btn btn-primary" type="button" id="btnSigComunidad">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="nav-opinion" role="tabpanel" aria-labelledby="nav-participante-tab">
                    <form class="row g-3 needs-validation" id="frmPersonaParticipante" novalidate>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputNombre" class="form-label">Nombre(s)</label>
                                
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="inputNombre" name="inputNombre">
                                    <div class="invalid-feedback">
                                        Por favor especifique un nombre.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputPrimerApellido" class="form-label">Primer Apellido</label>
                                
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="inputPrimerApellido" name="inputPrimerApellido">
                                    <div class="invalid-feedback">
                                        Por favor especifique su primer apellido.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputSegundoApellido" class="form-label">Segundo Apellido</label>
                                
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="inputSegundoApellido" name="inputSegundoApellido">
                                    <div class="invalid-feedback">
                                        Por favor especifique su segundo apellido.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputEdad" class="form-label">Edad</label>
                                <div class="input-group has-validation">
                                    <input type="number" class="form-control" id="inputEdad" name="inputEdad" max="99" min="1">
                                    <div class="invalid-feedback">
                                        Por favor especifique su edad.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputOcupacion" class="form-label">Ocupación</label>
                                
                                <div class="input-group has-validation">
                                    <select class="form-control" id="inputOcupacion" name="inputOcupacion">
                                        <option></option>
                                        <option>Profesionista</option>
                                        <option>Empleado en sector privado</option>
                                        <option>Tecnico</option>
                                        <option>Trabajador de la educación</option>
                                        <option>Artista</option>
                                        <option>Servidor Publico</option>
                                        <option>Trabajador de actividades en campo</option>
                                        <option>Trabajador de actividades administrativas</option>
                                        <option>Comerciante</option>
                                        <option>Trabajador Ambulante</option>
                                        <option>Estudiante</option>
                                        <option>Trabajador de servicios domesticos</option>
                                        <option>Ama de casa</option>
                                        <option>Trabajadores de proteccion y vigilancia/fuerzas armadas</option>
                                        <option>Desempleo</option>
                                        <option>Otros</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor seleccione su ocupación.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="optionGenero" class="form-label">Género</label>
                                <br>
                                <input class="form-check-input" type="radio" name="optionGenero" id="generoMasculino" value="Masculino">
                                <label class="form-check-label" for="generoMasculino">Masculino</label>

                                <input class="form-check-input" type="radio" name="optionGenero" id="generoFemenino" value="Femenino">
                                <label class="form-check-label" for="generoFemenino">Femenino</label>

                                <input class="form-check-input" type="radio" name="optionGenero" id="generoOtro" value="Otro">
                                <label class="form-check-label" for="generoOtro">Otro</label>

                                <div class="invalid-feedback">Seleccione su genero</div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputParticipanteCorreo" class="form-label">Correo electrónico</label>
                                
                                <div class="input-group has-validation">
                                    <input type="email" class="form-control" id="inputParticipanteCorreo" name="inputParticipanteCorreo">
                                    <div class="invalid-feedback">
                                        Por favor indique su correo electrónico.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCelular" class="form-label">Teléfono celular</label>
                                <input type="number" class="form-control" id="inputCelular" name="inputCelular" pattern="[0-9]{10}">
                            </div>
                        </div>

                        <div class="row" style="padding-top: 30px;">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <td class="text-center" style="background-color: #9f2442; color: white;">
                                            <strong>Domicilio</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputCalle" class="form-label">Calle</label>
                                <input type="text" class="form-control" id="inputCalle" name="inputCalle">
                            </div>
                            <div class="col-md-3">
                                <label for="inputNumExterior" class="form-label">Numero Exterior</label>
                                <input type="text" class="form-control" id="inputNumExterior" name="inputNumExterior">
                            </div>
                            <div class="col-md-3">
                                <label for="inputNumInterior" class="form-label">Numero Interior</label>
                                <input type="text" class="form-control" id="inputNumInterior" name="inputNumInterior">
                            </div>
                            <div class="col-md-3">
                                <label for="inputManzana" class="form-label">Manzana / Lote</label>
                                <input type="text" class="form-control" id="inputManzana" name="inputManzana">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputCP" class="form-label">Código Postal</label>
                                
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="inputCP" name="inputCP">
                                    <div class="invalid-feedback">
                                        Por favor especifique su codigo postal.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputAlcaldia" class="form-label">Alcaldía</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="inputAlcaldia" name="inputAlcaldia">
                                    <div class="invalid-feedback">
                                        Por favor especifique su alcaldía.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputColonia" class="form-label">Colonia, Pueblo o Barrio</label>
                                <!-- <input type="text" class="form-control" id="inputColonia" name="inputColonia"> -->
                                <select class="form-control" name="inputColonia" id="inputColonia"></select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10 offset-md-1">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type="button" id="btnAtrasPersonaParticipante">Atras</button>
                                    <button class="btn btn-primary" type="button" id="btnSigPersonaParticipante">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade show" id="nav-ticket-finalizo" role="tabpanel" aria-labelledby="nav-ticket-finalizo">
                    <form class="row g-3 needs-validation" id="formFormaParticipacion" novalidate>
                        <div class="row">
                            <div class="col-10 offset-md-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <td class="text-center" style="background-color: #9f2442; color: white;">
                                                    <strong>FORMA DE PARTICIPACIÓN</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="tipoParticipacion" id="participacionForo" value="FORO">
                                        <label class="form-check-label" for="participacionForo">FORO</label>
                                        <input class="form-check-input" type="radio" name="tipoParticipacion" id="inlineRadio2" value="REUNION">
                                        <label class="form-check-label" for="inlineRadio2">REUNION</label>

                                        <div class="invalid-feedback">Por favor seleccione la forma de participacion.</div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="participacionOtro">OTRO
                                                        (ESPECIFIQUE)</span>
                                                    <input type="text" class="form-control" id="participacionOtro" name="participacionOtro">

                                                    <div class="invalid-feedback">Por favor indique la forma de participacion.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <td class="text-center" style="background-color: #9f2442; color: white;">
                                                    <strong>EN CASO DE SER UNA ACTIVIDAD, LLENAR LO
                                                        SIGUIENTE:</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="nombreActividadLabel">NOMBRE
                                                        DEL
                                                        TALLER, FORO O ACTIVIDAD:</span>
                                                    <input type="text" class="form-control" id="nombreActividad" name="nombreActividad">

                                                    <div class="invalid-feedback">Por favor indique el nombre del taller, foro o actividad.</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="fecha">FECHA:</span>
                                                    <input type="date" class="form-control" id="fechaActividad" name="fechaActividad">

                                                    <div class="invalid-feedback">Por favor indique fecha de la actividad.</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="lugarActividadLabel">LUGAR:</span>
                                                    <input type="text" class="form-control" id="lugarActividad" name="lugarActividad">

                                                    <div class="invalid-feedback">Por favor indique el lugar de la actividad.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <td class="text-center" style="background-color: #9f2442; color: white;">
                                                    <strong>ANEXOS:</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="numeroDocumentosLabel">INDICAR NUMERO,
                                                        TIPO Y FORMATO DE LOS ARCHIVOS:</span>
                                                    <input type="number" class="form-control" id="numeroDocumentos" name="numeroDocumentos">

                                                    <div class="invalid-feedback">Por favor indique numero,
                                                        tipo y formato de los archivos.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-10 offset-md-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>TIPO DE DOCUMENTOS:</strong>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tipoParticipacion" id="opcionParticipacion" value="PARTICIPACION">
                                                    <label class="form-check-label" for="opcionParticipacion">PARTICIPACIÓN</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tipoParticipacion" id="opcionSistematizacion" value="SISTEMATIZACIÓN">
                                                    <label class="form-check-label" for="opcionSistematizacion">SISTEMATIZACIÓN</label>

                                                    <div class="invalid-feedback">Por favor indique el tipo de solicitud.</div>
                                                </div>
                                                <br><br><br>
                                            </div>
                                            <div class="col-md-6">
                                                <strong><label for="opcionIncluyeDocumentos" class="form-label">ANEXAR DOCUMENTOS A TU FORMATO:</label></strong>
                                                <br>
                                                SÍ <input class="form-check-input" type="radio" name="opcionIncluyeDocumentos" id="conDocumentos" value="1">
                                                &nbsp;&nbsp;
                                                NO <input class="form-check-input" type="radio" name="opcionIncluyeDocumentos" id="sinDocumentos" value="0">

                                                <div class="invalid-feedback">Especifique si se anexan documentos</div>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>NÚMERO DE DOCUMENTOS</strong>
                                                <br>
                                                <div class="input-group has-validation">
                                                    <input class="form-control" type="number" id="numeroDocumentos" name="numeroDocumentos" value="0" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div id="notification-center"></div>
                                                <div class="uploaded-files">
                                                    <h5>Archivos cargados con exito a tu formato:</h5>
                                                    <ol></ol>
                                                </div>
                                                <div class="UppyDragDrop"></div>
                                                <div class="for-ProgressBar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <!-- <a href="confirmacion_formato.html" class="btn btn-primary">Finalizar</a> -->
                                            <button class="btn btn-primary" type="button" id="btnAtrasFormaParticipacion">Atras</button>
                                            <button class="btn btn-primary" type="button" id="btnSigFormaParticipacion">Finalizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    const tipoConsultaTabEl = document.querySelector('button#nav-tipo-consulta-tab');
    const tipoConsultaTab = new bootstrap.Tab(tipoConsultaTabEl);

    const comunidadTabEl = document.querySelector('button#nav-comunidad-org-tab');
    const comunidadTab = new bootstrap.Tab(comunidadTabEl);

    const personaParticipanteTabEl = document.querySelector('button#nav-participante-tab');
    const personaParticipanteTab = new bootstrap.Tab(personaParticipanteTabEl);

    const formaParticipacionTabEl = document.querySelector('button#nav-ticket-finalizo-tab');
    const formaParticipacionTab = new bootstrap.Tab(formaParticipacionTabEl);

    // comunidadTab.show();
    // formaParticipacionTab.show();
    // formaParticipacionTab.show();
    // tipoConsultaTab.show();
    // comunidadTab.show();

    // TIPO CONSULTA
    $("#btnSigTipoConsulta").click(function() {
        if (!$("#formTipoConsulta")[0].checkValidity()) {
            $("#formTipoConsulta")[0].classList.add('was-validated')
        } else {
            comunidadTab.show();
        }
    });

    // COMUNIDAD ORGANIZACION
    $("#btnAtrasComunidad").click(function() {
        tipoConsultaTab.show();
    });
    $("#btnSigComunidad").click(function() {
        if (!$("#frmTipoComunidadOrganizacion")[0].checkValidity()) {
            $("#frmTipoComunidadOrganizacion")[0].classList.add('was-validated');
            comunidadTab.show();
        } else if (!$("#formTipoConsulta")[0].checkValidity()) {
            $("#formTipoConsulta")[0].classList.add('was-validated');
            tipoConsultaTab.show();
        } else {
            personaParticipanteTab.show();
        }
    });


    // PERSONA PARTICIPANTE
    $("#btnAtrasPersonaParticipante").click(function() {
        comunidadTab.show();
    });

    $("#btnSigPersonaParticipante").click(function() {
        if (!$("#frmPersonaParticipante")[0].checkValidity()) {
            $("#frmPersonaParticipante")[0].classList.add('was-validated');
            personaParticipanteTab.show();
        } else if (!$("#formTipoConsulta")[0].checkValidity()) {
            $("#formTipoConsulta")[0].classList.add('was-validated');
            tipoConsultaTab.show();
        } else if (!$("#frmTipoComunidadOrganizacion")[0].checkValidity()) {
            $("#frmTipoComunidadOrganizacion")[0].classList.add('was-validated');
            comunidadTab.show();
        } else {
            formaParticipacionTab.show();
        }
    });

    // FORMA PARTICIPACION
    $("#btnAtrasFormaParticipacion").click(function() {
        personaParticipanteTab.show();
    });

    $("#btnSigFormaParticipacion").click(function() {
        if (!$("#formFormaParticipacion")[0].checkValidity()) {
            $("#formFormaParticipacion")[0].classList.add('was-validated');
            formaParticipacionTab.show();
        } else if (!$("#formTipoConsulta")[0].checkValidity()) {
            $("#formTipoConsulta")[0].classList.add('was-validated');
            tipoConsultaTab.show();
        } else if (!$("#frmTipoComunidadOrganizacion")[0].checkValidity()) {
            $("#frmTipoComunidadOrganizacion")[0].classList.add('was-validated');
            comunidadTab.show();
        } else {
            registrarConsulta();
            // formaParticipacionTab.show();
        }
    });

    $("#inputCP").change(function() {
        var base_url = "{{ URL::to('/'); }}" + "/obtener-colonias/";
        var codigo_postal = $("#inputCP").val();
        var codigo_postal_url = base_url + codigo_postal;

        console.warn("codigo_postal_url");
        console.warn(codigo_postal_url);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: codigo_postal_url,
                method: "GET"
            })
            .done(function(data, textStatus, jqXHR) {
                $('#inputColonia')
                    .find('option')
                    .remove()
                    .end();

                if (console && console.log) {
                    console.log("La solicitud se ha completado correctamente.");
                }

                if (typeof data.alcaldia != 'undefined' && data.alcaldia.length > 0) {
                    $('#inputAlcaldia').val(data.alcaldia);
                }

                if (typeof data.colonias != 'undefined' && data.colonias.length > 0) {
                    data.colonias.forEach(colonia => {
                        $('#inputColonia').append($('<option>', {
                            value: colonia.nombre,
                            text: colonia.nombre
                        }));
                    });
                }

                console.log(data.alcaldia);

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                $("#status").text("FAIL REQUEST");
            });
    });

    $('input:radio[name="opcionTipoFormato"]').change(function() {
        if ($(this).is(':checked') && $(this).val() == 'OTRO') {
            $("#tipoFormatoOtroTxt").removeAttr("disabled").attr("required", "required").focus();
        } else {
            $("#tipoFormatoOtroTxt").attr("disabled", "disabled").val("");
        }
    });

    $('input:radio[name="tipoAutoridad"]').change(function() {
        if ($(this).is(':checked') && $(this).val() == 'ninguna') {
            $("#nombrePuebloComunidad").removeAttr("required").attr("disabled", "disabled").val("");
        } else {
            $("#nombrePuebloComunidad").removeAttr("disabled").attr("required", "required").focus();
        }
    });
    
    $('input:radio[name="opcionTipoConsulta"]').change(function() {
        if( $(this).is(':checked') && $(this).val() == 'CONSULTA PUBLICA' ){
            $('div#autoridadRepresentativaOpciones').hide();
            $('div#tipoOrganizacionOpciones').show();
        } else if ($(this).is(':checked') && $(this).val() == 'CONSULTA INDÍGENA') {
            $('div#autoridadRepresentativaOpciones').show();
            $('div#tipoOrganizacionOpciones').hide();
        }
    });

    $('input:radio[name="opcionTipoOrganizacion"]').change(function() {
        if ($(this).is(':checked') && $(this).val() == 'ninguna') {
            console.log($(this).val());
            $("#nombreOrganizacion").removeAttr("required").attr("disabled", "disabled").val("");
        } else {
            $("#nombreOrganizacion").removeAttr("disabled").attr("required", "required").focus();
        }
    });

    function registrarConsulta() {

        var folio = $('meta[name="folio"]').attr("content");

        console.warn( $('[name="opcionTipoFormato"]').val() );
        
        if ($('[name="opcionTipoFormato"]').is(':checked') && $('[name="opcionTipoFormato"]:checked').val() == "OTRO") {
            var opcionTipoFormato = $("#tipoFormatoOtroTxt").val();
        } else {
            var opcionTipoFormato = $('[name="opcionTipoFormato"]:checked').val();
        }
        var fechaSolicitud = $('[name="fechaSolicitud"]').val();
        var inputNombreCompleto = $('[name="inputNombreCompleto"]').val();
        var inputCorreo = $('[name="inputCorreo"]').val();
        var inputTelefono = $('[name="inputTelefono"]').val();
        var tieneDatosParticipante = $('[name="tieneDatosParticipante"]:checked').val();
        var esRepresentante = $('[name="esRepresentante"]:checked').val();
        var tipoAutoridad = $('[name="tipoAutoridad"]:checked').val();
        var nombrePuebloComunidad = $('[name="nombrePuebloComunidad"]').val();
        var opcionTipoOrganizacion = $('[name="opcionTipoOrganizacion"]:checked').val();
        var opcionTipoConsulta = $('[name="opcionTipoConsulta"]:checked').val();
        var nombreOrganizacion = $('[name="nombreOrganizacion"]').val();
        var inputNombre = $('[name="inputNombre"]').val();
        var inputPrimerApellido = $('[name="inputPrimerApellido"]').val();
        var inputSegundoApellido = $('[name="inputSegundoApellido"]').val();
        var inputEdad = $('[name="inputEdad"]').val();
        var inputOcupacion = $('[name="inputOcupacion"]').val();
        var optionGenero = $('[name="optionGenero"]').val();
        var inputParticipanteCorreo = $('[name="inputParticipanteCorreo"]').val();
        var inputCelular = $('[name="inputCelular"]').val();
        var inputCalle = $('[name="inputCalle"]').val();
        var inputNumExterior = $('[name="inputNumExterior"]').val();
        var inputNumInterior = $('[name="inputNumInterior"]').val();
        var inputManzana = $('[name="inputManzana"]').val();
        var inputCP = $('[name="inputCP"]').val();
        var inputAlcaldia = $('[name="inputAlcaldia"]').val();
        var inputColonia = $('[name="inputColonia"]').val();
        var tipoParticipacion = $('[name="tipoParticipacion"]').val();
        var participacionOtro = $('[name="participacionOtro"]').val();
        var nombreActividad = $('[name="nombreActividad"]').val();
        var fechaActividad = $('[name="fechaActividad"]').val();
        var lugarActividad = $('[name="lugarActividad"]').val();
        
        var opcionIncluyeDocumentos = $('[name="opcionIncluyeDocumentos"]').val();
        var numeroDocumentos = $('[name="numeroDocumentos"]').val();

        var requestBody = {
            "folio": folio,
            "tipoConsulta": opcionTipoConsulta,
            "tipoFormato": opcionTipoFormato,
            "fechaSolicitud": fechaSolicitud,
            "nombreCompleto": inputNombreCompleto,
            "correo": inputCorreo,
            "telefono": inputTelefono,
            "tieneDatosParticipante": tieneDatosParticipante,
            "esRepresentante": esRepresentante,
            "tipoAutoridad": tipoAutoridad,
            "nombrePuebloComunidad": nombrePuebloComunidad,
            "tipoOrganizacion": opcionTipoOrganizacion,
            "nombreOrganizacion": nombreOrganizacion,
            "nombre": inputNombre,
            "primerApellido": inputPrimerApellido,
            "segundoApellido": inputSegundoApellido,
            "edad": inputEdad,
            "ocupacion": inputOcupacion,
            "genero": optionGenero,
            "participanteCorreo": inputParticipanteCorreo,
            "celular": inputCelular,
            "calle": inputCalle,
            "numExterior": inputNumExterior,
            "numInterior": inputNumInterior,
            "manzana": inputManzana,
            "cp": inputCP,
            "alcaldia": inputAlcaldia,
            "colonia": inputColonia,
            "tipoParticipacion": tipoParticipacion,
            "participacionOtro": participacionOtro,
            "nombreActividad": nombreActividad,
            "fechaActividad": fechaActividad,
            "lugarActividad": lugarActividad,
            "numeroDocumentos": numeroDocumentos
        };

        console.warn(requestBody);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('consultaIndigena.store') }}",
                method: "POST",
                data: requestBody,
                dataType: 'json'
            })
            .done(function(data, textStatus, jqXHR) {
                if (console && console.log) {
                    console.log("La solicitud se ha completado correctamente.");
                }

                window.location.href = "{{ route('consultaIndigena.confirmacion',['numero_folio' => $numero_folio ]) }}";
                // $("#status").text("READY!");
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                
                console.log( "jqXHR" );
                console.log( jqXHR );
                console.log( "textStatus" );
                console.log( textStatus );
                console.log( "errorThrown" );
                console.log( errorThrown );

                if( errorThrown == "Unprocessable Content" && textStatus == "error"){
                    
                    $('.notification.alert').show();
                    error_keys = Object.keys(jqXHR.responseJSON.errors);
                    errorsObj = jqXHR.responseJSON.errors;
                    
                    $("ul#backend-errors").html("");
                    error_keys.forEach(key_name => { 
                        $("ul#backend-errors").append('<li>' + errorsObj[key_name][0] + '</li>');
                    });

                    $('.notification.alert').focus();
                    modalConsentimientoDatos.hide();
                }

            });

    }
</script>

<script>
    var folio = $('meta[name="folio"]').attr("content");
    var ejemplo = {
        strings: {
            addBulkFilesFailed: {
                0: "No se pudo agregar el archivo %{smart_count} debido a un error interno",
                1: "Error al agregar %{smart_count} archivos debido a errores internos"
            },
            youCanOnlyUploadX: {
                0: "Solo puede cargar %{smart_count} archivo",
                1: "Solo puede cargar %{smart_count} archivos"
            },
            youHaveToAtLeastSelectX: {
                0: "Tienes que seleccionar al menos %{smart_count} archivo",
                1: "Tienes que seleccionar al menos %{smart_count} archivos"
            },
            exceedsSize: "%{file} excede el tamaño máximo permitido de %{size}",
            missingRequiredMetaField: "Faltan metacampos obligatorios",
            missingRequiredMetaFieldOnFile: "Faltan metacampos obligatorios en %{fileName}",
            inferiorSize: "Este archivo es más pequeño que el tamaño permitido de %{size}",
            youCanOnlyUploadFileTypes: "Solo puedes subir: %{types}",
            noMoreFilesAllowed: "No se pueden agregar más archivos",
            noDuplicates: "No se puede agregar el archivo duplicado '%{fileName}', ya existe",
            companionError: "Falló la conexión con Companion",
            authAborted: "Autenticación cancelada",
            companionUnauthorizeHint: "Para desautorizar su cuenta de %{provider}, vaya a %{url}",
            failedToUpload: "Error al cargar %{file}",
            noInternetConnection: "Sin conexión a Internet",
            connectedToInternet: "Conectado a Internet",
            noFilesFound: "No tienes archivos ni carpetas aquí",
            selectX: {
                0: "Seleccione %{smart_count}",
                1: "Seleccione %{smart_count}"
            },
            allFilesFromFolderNamed: "Todos los archivos de la carpeta %{name}",
            openFolderNamed: "Abrir carpeta %{name}",
            cancel: "Cancelar",
            logOut: "Cerrar sesión",
            filter: "Filtrar",
            resetFilter: "Reiniciar filtro",
            loading: "Cargando...",
            authenticateWithTitle: "Autentíquese con %{pluginName} para seleccionar archivos",
            authenticateWith: "Conectarse a %{pluginName}",
            signInWithGoogle: "Inicia sesión con Google",
            searchImages: "Buscar imágenes",
            enterTextToSearch: "Ingrese texto para buscar imágenes",
            search: "Búsqueda",
            emptyFolderAdded: "No se agregaron archivos de una carpeta vacía",
            folderAlreadyAdded: "La carpeta \"%{folder}\" ya fue agregada",
            folderAdded: {
                0: "Archivo %{smart_count} agregado de %{folder}",
                1: "Se agregaron %{smart_count} archivos de %{folder}"
            }
        }
    };
    const onUploadSuccess = (elForUploadedFiles) => (file, response) => {
        
        // console.log("file");
        // console.log(file);
        // console.log(response);

        const url = response.uploadURL
        const fileName = file.name

        const li = document.createElement('li')
        const a = document.createElement('a')
        a.href = url
        a.target = '_blank'
        a.appendChild(document.createTextNode(fileName))
        li.appendChild(a)

        document.querySelector(elForUploadedFiles).appendChild(li);

        numero_documentos = $('div.uploaded-files ol>li').length;
        $('#numeroDocumentos').val(numero_documentos);

        console.log("numero_documentos");
        console.log(numero_documentos);

        // maxNumberOfFiles
        if (numero_documentos == 3) {
            uppy.close();
        }

    }


    var uppy = new Uppy.Core({
        debug: true,
        autoProceed: true,
        restrictions: {
            maxFileSize: 2000000,
            maxTotalFileSize: 4000000,
            minNumberOfFiles: 1,
            maxNumberOfFiles: 3,
            allowedFileTypes: ['image/*', 'video/*', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf']
        },
        locale: ejemplo
    });

    uppy.use(Uppy.DragDrop, {
        target: '.UppyDragDrop'
    });

    uppy.use(Uppy.XHRUpload, {
        limit: 10,
        endpoint: '/consulta-indigena/subir-archivo/' + folio,
        formData: true,
        fieldName: 'file',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // from <meta name="csrf-token" content="{{ csrf_token() }}">
        }
    });

    uppy.use(Uppy.ProgressBar, {
        target: '.for-ProgressBar',
        hideAfterFinish: false
    });

    uppy.on('complete', (event) => {
        if (event.successful[0] !== undefined) {
            console.info('Successful uploads:', event.successful)
            this.payload = event.successful[0].response.body.path;
        }
    });

    uppy.on('upload-success', onUploadSuccess('.uploaded-files ol'));

    uppy.on('upload-error', (file, error, response) => {

        console.log(file);
        console.log(error);
        console.log(response);

        console.log('error with file:', file.id)
        console.log('error message:', error)
    });

    uppy.on('error', (error) => {
        console.error("error+error");
        console.error(error);
        console.error(error.stack);
    });

    uppy.on('info-visible', () => {
        console.log('info-visible');
        const {
            info
        } = uppy.getState();
        // info: {
        //  isHidden: false,
        //  type: 'error',
        //  message: 'Failed to upload',
        //  details: 'Error description'
        // }

        $("#notification-center").html("");

        info.forEach((infoElement) => {
            // console.error('Errors:' + infoElement.message);
            console.log(`${infoElement.message} ${infoElement.details}`);

            if (infoElement.type == 'error') {
                notification_class = 'alert-danger';
            } else {
                notification_class = 'alert-success';
            }

            var element = '<div class="alert ' + notification_class + '" role="alert">';
            element += `${infoElement.message}`;
            element += '</div>';

            $("#notification-center").append(element);
        });

    });

    // uppy.close({ reason = 'user' })
    // ('[name="opcionIncluyeDocumentos"]:checked')
    $('[name="opcionIncluyeDocumentos"]').change(function(){
        if ($(this).is(':checked') && $(this).val() == '0') {
            // uppy.close();
            $('.UppyDragDrop').fadeOut();
            $('.for-ProgressBar').fadeOut();
            $('#numeroDocumentos').fadeOut();
            $('.uploaded-files > h5').fadeOut();
            $('.uploaded-files').fadeOut();
        } else if ($(this).is(':checked') && $(this).val() == '1') {
            $('.UppyDragDrop').fadeIn();
            $('.for-ProgressBar').fadeIn();
            $('#numeroDocumentos').fadeIn();
            $('.uploaded-files > h5').fadeIn();
            $('.uploaded-files').fadeIn();
        }
    });
</script>
@endsection