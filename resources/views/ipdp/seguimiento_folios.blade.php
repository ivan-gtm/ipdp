@extends('layouts.frontend')
@section('title', 'Seguimiento de folios de consultas ciudadanas')

@section('head')

<script src="https://kit.fontawesome.com/543cc88f75.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<section class="seguimiento-folios">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Seguimiento por folio</h1>
        </div>
        <div class="col-12 text-center">
            Para dudas o aclaraciones contactanos con tu numero de folio a <a href="mailto:contacto_ipdp@cdmx.gob.mx">contacto_ipdp@cdmx.gob.mx</a>
        </div>
    
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="ticketsList">
                        <div class="card-header border-0" style="display:none">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">&nbsp;</h5>
                                <div class="flex-shrink-0 d-none">
                                    <input type="text" class="btn btn-danger add-btn" placeholder="Buscar por nombre, razon, numero">
                                    <button class="btn btn-soft-danger" onclick="deleteMultiple()">
                                        <i class="fa-solid fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
    
                        <!--end card-body-->
                        <div class="card-body">
                            <div class="table-responsive table-card mb-4">
                                <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                                    <thead>
                                        <tr style="background-color: #f3f3f3;">
                                            <th>No.</th>
                                            <th>Folio<br>Solicitud</th>
                                            <th>Fecha</th>
                                            <th class="text-center">Situación</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="ticket-list-data">
                                        <tr>
                                            <th scope="row">
                                                1
                                            </th>
                                            <td class="id">
                                                <a href="javascript:void(0);" class="fw-medium link-primary ticket-id">{{ $cedula->folio }}</a>
                                            </td>
                                            <td class="tasks_name">
                                                <!-- 21/07/2022 -->
                                                {{ $cedula->created_at }}
                                            </td>
    
                                            <td class="text-center">
                                                <span class="badge badge-soft-warning text-uppercase">
                                                    Analizada
                                                    {{ $cedula->created_at }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <button class="edit-item-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                                <a href="{{ route('cedula.pdf',[
                                                                'numero_folio' => $cedula->folio
                                                            ]) }}" class="edit-item-btn" download>
                                                    <i class="fa-solid fa-file-pdf"></i>
                                                    <!-- Descargar como PDF -->
                                                </a>
                                            </td>
                                        </tr>
                                        <tr style="display: none;">
                                            <th scope="row">
                                                1
                                            </th>
                                            <td class="id"><a href="javascript:void(0);" onclick="ViewTickets(this)" data-id="13" class="fw-medium link-primary ticket-id">#123123</a></td>
                                            <td class="tasks_name">21/07/2022</td>
                                            <td class="client_name">
                                                <span class="badge bg-success text-uppercase">FORMATO</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-soft-warning text-uppercase">En proceso de valoración</span>
                                            </td>
                                            <td class="text-center">
                                                <button class="edit-item-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-file-pdf"></i>
                                                    <!-- Descargar como PDF -->
                                                </button>
                                            </td>
                                        </tr>
                                        <tr style="display: none;">
                                            <th scope="row">
                                                1
                                            </th>
                                            <td class="id"><a href="javascript:void(0);" onclick="ViewTickets(this)" data-id="13" class="fw-medium link-primary ticket-id">#123123</a></td>
                                            <td class="tasks_name">21/07/2022</td>
                                            <td class="client_name">
                                                <span class="badge bg-success text-uppercase">CEDULA</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-soft-danger text-uppercase">Incorporada a Anexo <br>de Mecanismo de Participación. <br><br>Fin del proceso</span>
                                            </td>
                                            <td class="text-center">
                                                <button class="edit-item-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-file-pdf"></i>
                                                    <!-- Descargar como PDF -->
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
    
                                <br>
                                @if( sizeof($archivos) > 0 )
                                <h2 class="text-center">ARCHIVOS</h2>
                                <div class="col-12 text-center">
                                    <ul>
                                        @foreach ($archivos as $archivo)
                                        <li><a target="_blank" href="{{ asset('storage/'.$archivo->file_path) }}">FILE</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
    
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Tickets We did
                                            not find any Tickets for you search.</p>
                                    </div>
                                </div>
                            </div>
    
    
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">DETALLE CEDULA FOLIO:#{{ $cedula->folio }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12">
                                                <div class="bd-example">
                                                    <nav>
                                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                                            <button class="nav-link active" id="nav-datos-generales-tab" data-bs-toggle="tab" data-bs-target="#nav-registro-cedula" type="button" role="tab" aria-controls="nav-registro-cedula" aria-selected="false" tabindex="-1">Datos Generales</button>
    
                                                            <button class="nav-link" id="nav-instrumento-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="true" tabindex="1">Instrumento</button>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade active show" id="nav-registro-cedula" role="tabpanel" aria-labelledby="nav-datos-generales-tab" tabindex="0">
                                                            <form class="row g-3 needs-validation" id="formDatosGenerales" novalidate>
                                                                <div class="col-md-12">
                                                                    <strong>PERSONA PARTICIPANTE:</strong>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <label for="inputNombre" class="form-label">Nombre(s)</label>
                                                                    <label class="label-red">*</label>
                                                                    <div class="input-group has-validation">
                                                                        <input type="text" class="form-control" id="inputNombre" name="inputNombre" value="{{ $cedula->nombre }}" disabled>
                                                                        <div class="invalid-feedback">
                                                                            Por favor especifique un nombre.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <label for="inputPrimerApellido" class="form-label">Primer Apellido</label>
                                                                    <label class="label-red">*</label>
                                                                    <div class="input-group has-validation">
                                                                        <input type="text" class="form-control" id="inputPrimerApellido" name="inputPrimerApellido" value="{{ $cedula->primer_apellido }}" disabled>
                                                                        <div class="invalid-feedback">
                                                                            Por favor especifique su primer apellido.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <label for="inputSegundoApellido" class="form-label">Segundo Apellido</label>
                                                                    <label class="label-red">*</label>
                                                                    <div class="input-group has-validation">
                                                                        <input type="text" class="form-control" id="inputSegundoApellido" name="inputSegundoApellido" value="{{ $cedula->segundo_apellido }}" disabled>
                                                                        <div class="invalid-feedback">
                                                                            Por favor especifique su segundo apellido.
                                                                        </div>
                                                                    </div>
                                                                </div>
    
                                                                <!-- --- -->
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label for="inputEdad" class="form-label">Edad</label>
                                                                        <div class="input-group has-validation">
                                                                            <input type="number" class="form-control" id="inputEdad" value="{{ $cedula->edad }}" disabled>
                                                                            <div class="invalid-feedback">
                                                                                Por favor especifique su edad.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="inputOcupacion" class="form-label">Ocupación</label>
                                                                        <label class="label-red">*</label>
                                                                        <div class="input-group has-validation">
                                                                            <input type="number" class="form-control" id="inputEdad" name="inputEdad" max="99" min="1" value="{{ $cedula->ocupacion }}" disabled>
                                                                            <div class="invalid-feedback">
                                                                                Por favor seleccione su ocupación.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="optionGenero" class="form-label">Género</label>
                                                                        <br>
                                                                        <input class="form-check-input" type="radio" name="optionGenero" id="generoHombre" value="Hombre" disabled checked>
                                                                        <label class="form-check-label" for="generoHombre">{{ $cedula->genero }}</label>
                                                                    </div>
    
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="inputCorreo" class="form-label">Correo electrónico</label>
                                                                            <label class="label-red">*</label>
                                                                            <div class="input-group has-validation">
                                                                                <input type="email" class="form-control" id="inputCorreo" name="inputCorreo" value="{{ $cedula->correo }}" disabled>
                                                                                <div class="invalid-feedback">
                                                                                    Por favor indique su correo electrónico.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="inputCelular" class="form-label">Teléfono celular</label>
                                                                            <input type="number" class="form-control" id="inputCelular" name="inputCelular" value="{{ $cedula->celular }}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-top: 30px;">
                                                                        <div class="col-md-12 text-center">
                                                                            <h4>Domicilio</h4>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label for="inputCalle" class="form-label">Calle</label>
                                                                            <input type="text" class="form-control" id="inputCalle" name="inputCalle" value="{{ $cedula->calle }}" disabled>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="inputNumExterior" class="form-label">Numero Exterior</label>
                                                                            <input type="text" class="form-control" id="inputNumExterior" name="inputNumExterior" value="{{ $cedula->num_exterior }}" disabled>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="inputNumInterior" class="form-label">Numero Interior</label>
                                                                            <input type="text" class="form-control" id="inputNumInterior" name="inputNumInterior" value="{{ $cedula->num_interior }}" disabled>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="inputManzana" class="form-label">Manzana / Lote</label>
                                                                            <input type="text" class="form-control" id="inputManzana" name="inputManzana" value="{{ $cedula->manzana }}" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label for="inputCP" class="form-label">Código Postal</label>
                                                                            <label class="label-red">*</label>
                                                                            <div class="input-group has-validation">
                                                                                <input type="text" class="form-control" id="inputCP" name="inputCP" value="{{ $cedula->cp }}" disabled>
                                                                                <div class="invalid-feedback">
                                                                                    Por favor especifique su codigo postal.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="inputAlcaldia" class="form-label">Alcaldía</label>
                                                                            <div class="input-group has-validation">
                                                                                <input type="text" class="form-control" id="inputAlcaldia" name="inputAlcaldia" value="{{ $cedula->alcaldia }}" disabled>
                                                                                <div class="invalid-feedback">
                                                                                    Por favor especifique su alcaldía.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label for="inputColonia" class="form-label">Colonia, Pueblo o Barrio</label>
                                                                            <input type="text" class="form-control" id="inputColonia" name="inputColonia" value="{{ $cedula->colonia }}" disabled>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="row g-3">
    
                                                                        <div class="col-md-12">
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td class="text-center" style="background-color: #9f2442; color: white;">
                                                                                        <strong>SI USTED ES REPRESENTANTE DE UNA ORGANIZACIÓN PUBLICA,
                                                                                            PRIVADA O SOCIAL, SELECCIONE LA OPCION QUE
                                                                                            CORRESPONDA</strong>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="input-group has-validation">
                                                                                <table class="table" style="border: 1px solid black;">
                                                                                    <tr>
                                                                                        <td>
                                                                                            {{ $cedula->representante }}
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
    
                                                                                <div class="invalid-feedback">Por favor seleccione el tipo de representante.</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane" id="nav-contact" role="tabpanel" aria-labelledby="nav-instrumento-tab" tabindex="0">
                                                            <form class="row g-3 needs-validation" id="formInstrumento" novalidate>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td class="text-center" style="background-color: #9f2442; color: white;">
                                                                                    <strong>INSTRUMENTO DE PLANEACIÓN A OBSERVAR</strong>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row g-3">
                                                                            <div class="col-md-12">
                                                                                <!-- <div class="invalid-feedback" style="display: block;">
                                                                                            Es requerido que describa la propuesta.
                                                                                        </div> -->
                                                                                <table class="table table-striped-columns table-hover">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th scope="col">
                                                                                                &nbsp;
                                                                                            </th>
                                                                                            <th scope="col">VIGENCIA</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th scope="row">
                                                                                                <label for="opcion2020-2040">
                                                                                                    PLAN GENERAL DE DESARROLLO DE LA CIUDAD DE MÉXICO
                                                                                                </label>
                                                                                            </th>
                                                                                            <td>
                                                                                                <label for="opcion2020-2040">
                                                                                                    {{ $cedula->instrumento_observar }}
                                                                                                </label>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td class="text-center" style="background-color: #9f2442; color: white;">
                                                                                    <strong>OPINIÓN, RECOMENDACIÓN PROPUESTA</strong>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row g-3">
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="mb-3">
                                                                                            <!-- <label for="textComentarios" class="form-label">Comentarios</label> -->
                                                                                            <textarea class="form-control" id="textComentarios" name="textComentarios" rows="20" placeholder="Por favor deje algún comentario" disabled>{{ $cedula->comentarios }}</textarea>
                                                                                            <div class="invalid-feedback">
                                                                                                Es requerido que describa la propuesta.
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <hr>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="opcionIncluyeDocumentos" class="form-label">SE ANEXAN DOCUMENTOS CON ESTA CEDULA:</label>
                                                                                        @if( $cedula->incluye_documentos == 1)
                                                                                        SI
                                                                                        @else
                                                                                        NO
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="row">
                                                                                            <div class="col-8">
                                                                                                NÚMERO DE DOCUMENTOS
                                                                                            </div>
                                                                                            <div class="col-4">
                                                                                                {{ $cedula->numero_documentos }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <td class="text-center" style="background-color: #9f2442; color: white;">
                                                                                    <strong>TIPO DE DOCUMENTOS</strong>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-floating">
                                                                            <textarea class="form-control" placeholder="Tipo de documentos" id="floatingTextarea"></textarea>
                                                                            <label for="floatingTextarea">Tipo de documentos</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
    
    
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalConsentimientoDatos" tabindex="-1" aria-labelledby="modalConsentimientoDatosLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <form class="row g-3 needs-validation" id="conocimientoDatosPersonales" novalidate>
                                                                        <div class="modal-header">
                                                                            <div class="row">
                                                                                <div class="col-sm-10">OTORGA SU CONSENTIMIENTO PARA EL TRATAMIENTO DE LOS
                                                                                    DATOS PERSONALES<label class="label-red">*</label></div>
                                                                                <div class="col-sm-2">
                                                                                    SI <input class="form-check-input" type="radio" name="conocimientoDatosPersonales" id="conocimientoDatosPersonales" value="si" required>
                                                                                    NO <input class="form-check-input" type="radio" name="conocimientoDatosPersonales" id="conocimientoDatosPersonales" value="no" required>
    
                                                                                    <div class="invalid-feedback">De favor, indique si otorga su consentimiento.</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p class="text-center"><strong>AVISO DE PRIVACIDAD SIMPLIFICADO</strong>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <p class="text-justify">
                                                                                        El Instituto de Planeación Democrática y Prospectiva de la Ciudad de
                                                                                        México a través de Jefatura de Unidad
                                                                                        Departamental de Transparencia, es la responsable del tratamiento de
                                                                                        los datos personales que nos
                                                                                        proporcione, los cuales serán protegidos en términos de la Ley
                                                                                        General de Protección de Datos Personales en
                                                                                        Posesión de Sujetos Obligados, la Ley de Protección de Datos
                                                                                        Personales en Posesión de Sujetos Obligados de
                                                                                        la Ciudad de México y demás normatividad que resulte aplicable.
                                                                                        Los datos personales que recabemos serán utilizados con la finalidad
                                                                                        de registrar y gestionar las
                                                                                        recomendaciones, opiniones o propuestas según corresponda en la
                                                                                        formulación del contenidos de los
                                                                                        instrumentos de planeación relacionados con la Consulta Indígena a
                                                                                        Pueblos y Barrios Originarios y
                                                                                        Comunidades Indígenas Residentes de la Ciudad de México, así como la
                                                                                        Consulta Pública. Los datos personales
                                                                                        no serán transferidos a terceros.
                                                                                        Usted podrá manifestar la negativa al tratamiento de sus datos
                                                                                        personales directamente ante la Jefatura de
                                                                                        Unidad Departamental de Transparencia, ubicada en San Lorenzo No.
                                                                                        712, col. Del Valle Sur, Alcaldía Benito
                                                                                        Juárez, C.P. 03100, Ciudad de México con número telefónico
                                                                                        55-51-30-21-00.
                                                                                        El Aviso de Privacidad Integral podrá consultarse a través del
                                                                                        siguiente enlace electrónico
                                                                                        atención.ipdp@cdmx.gob.mx, al correo electrónico:
                                                                                        atención.ipdp@cdmx.gob.mx o acudir directamente a la
                                                                                        Jefatura de Unidad Departamental de Transparencia.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                            <button type="button" class="btn btn-primary" id="finalizarRegistro">wFinalizar Registro</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
        </div>
    </div>
</section>
@endsection