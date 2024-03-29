@extends('layouts.admin')
@section('title', 'Registro de Consulta Publica')

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
    <div class="col-12">
        <strong>
            Instrucciones: Todos los campos marcados con (<label class="label-red">*</label>) son obligatorios.
        </strong>
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
                    <button class="nav-link active" id="nav-datos-generales-tab" data-bs-toggle="tab" data-bs-target="#nav-registro-cedula" type="button" role="tab" aria-controls="nav-registro-cedula" aria-selected="false" tabindex="-1">Datos Generales</button>

                    <button class="nav-link" id="nav-instrumento-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="true" tabindex="1">Instrumento</button>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-registro-cedula" role="tabpanel" aria-labelledby="nav-datos-generales-tab" tabindex="0">
                    <form class="row g-3 needs-validation" id="formDatosGenerales" novalidate action="{{ route('cedula.store') }}">
                        <div class="col-md-12">
                            <strong>PERSONA PARTICIPANTE:</strong>
                        </div>
                        <div class="col-md-4">
                            <label for="inputNombre" class="form-label">Nombre(s)</label>
                            
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="inputNombre" name="inputNombre" >
                                <div class="invalid-feedback">
                                    Por favor especifique un nombre.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPrimerApellido" class="form-label">Primer Apellido</label>
                            
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="inputPrimerApellido" name="inputPrimerApellido" >
                                <div class="invalid-feedback">
                                    Por favor especifique su primer apellido.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputSegundoApellido" class="form-label">Segundo Apellido</label>
                            
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="inputSegundoApellido" name="inputSegundoApellido" >
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
                                <input class="form-check-input" type="radio" name="optionGenero" id="generoMasculino" value="Masculino" >
                                <label class="form-check-label" for="generoMasculino">Masculino</label>

                                <input class="form-check-input" type="radio" name="optionGenero" id="generoFemenino" value="Femenino" >
                                <label class="form-check-label" for="generoFemenino">Femenino</label>

                                <input class="form-check-input" type="radio" name="optionGenero" id="generoOtro" value="Otro" >
                                <label class="form-check-label" for="generoOtro">Otro</label>

                                <div class="invalid-feedback">Seleccione su genero</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputCorreo" class="form-label">Correo electrónico</label>
                                    
                                    <div class="input-group has-validation">
                                        <input type="email" class="form-control" id="inputCorreo" name="inputCorreo" >
                                        <div class="invalid-feedback">
                                            Por favor indique su correo electrónico.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCelular" class="form-label">Teléfono celular (10 digitos)</label>
                                    <input type="number" class="form-control" id="inputCelular" name="inputCelular" pattern="[0-9]{10}">
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
                                        <input type="text" class="form-control" id="inputCP" name="inputCP" >
                                        <div class="invalid-feedback">
                                            Por favor especifique su codigo postal.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputAlcaldia" class="form-label">Alcaldía</label>
                                    
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="inputAlcaldia" name="inputAlcaldia" >
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
                                <div class="col-6 offset-md-3">
                                    <div class="input-group has-validation">
                                        <table class="table" style="border: 1px solid black;">
                                            <tr>
                                                <td>
                                                    <label class="form-check-label" for="representanteOrganizacion">
                                                        ORGANIZACIÓN SOCIAL
                                                    </label>
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="radio" name="optionRepresentante" id="representanteOrganizacion" value="ORGANIZACIÓN SOCIAL" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="form-check-label" for="representanteAcademia">ACADEMIA</label>
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="radio" name="optionRepresentante" id="representanteAcademia" value="ACADEMIA" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="form-check-label" for="representanteCamaraColegio">
                                                        CÁMARA O COLEGIO
                                                    </label>
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="radio" name="optionRepresentante" id="representanteCamaraColegio" value="CÁMARA O COLEGIO" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="form-check-label" for="representanteAlcaldia">
                                                        ALCALDÍA O ADMINISTRACIÓN PUBLICA
                                                    </label>
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="radio" name="optionRepresentante" id="representanteAlcaldia" value="ALCALDÍA O ADMINISTRACIÓN PUBLICA" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="form-check-label" for="ningunaOpcion">NINGUNA</label>
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="radio" name="optionRepresentante" id="ningunaOpcion" value="NINGUNA" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="form-check-label" for="representanteOtra">OTRA</label>
                                                </td>
                                                <td>
                                                    <input class="form-check-input" type="radio" name="optionRepresentante" id="representanteOtra" value="OTRA" >
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="invalid-feedback">Por favor seleccione el tipo de representante.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="btnDatosGeneralesSig">Siguiente</button>
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
                            <div class="col-10 offset-md-1">
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
                                                    <th scope="col">APLICACIÓN</th>
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
                                                            2020-2040
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox" name="opcionInstrumentoObservar" id="opcion2020-2040" value="2020-2040">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <label for="opcion2020-2035">
                                                            PROGRAMA GENERAL DE ORDENAMIENTO TERRITORIAL DE LA
                                                            CIUDAD DE
                                                            MÉXICO
                                                        </label>
                                                    </th>
                                                    <td>
                                                        <label for="opcion2020-2035">
                                                            2020-2035
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox" name="opcionInstrumentoObservar" id="opcion2020-2035" value="2020-2035">
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
                                            <strong>OPINIÓN, RECOMENDACIÓN PROPUESTA* Transcribir el texto de la
                                                opinión o propuesta:</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-10 offset-md-1">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="textComentarios" class="form-label">Comentarios</label>
                                                    <textarea class="form-control" id="textComentarios" name="textComentarios" placeholder="Por favor deje algún comentario" ></textarea>
                                                    <div class="invalid-feedback">
                                                        Es requerido que describa la propuesta.
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
                                            <strong>COMPLEMENTE SU PROPUESTA, ADJUNTE DOCUMENTOS (PDF, WORD), IMAGENES (JPG,PNG) Ó VIDEOS (MP4)</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-10 offset-md-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <strong><label for="opcionIncluyeDocumentos" class="form-label">SE ANEXAN DOCUMENTOS CON ESTA CEDULA:</label></strong>
                                        <br>
                                        SÍ <input class="form-check-input" type="radio" name="opcionIncluyeDocumentos" id="conDocumentos" value="1" >
                                        &nbsp;&nbsp;
                                        NO <input class="form-check-input" type="radio" name="opcionIncluyeDocumentos" id="sinDocumentos" value="0" >

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

                            <div class="col-10 offset-md-1">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" class="btn btn-primary" id="btnAtrasDatosGenerales">Atras</button>
                                            <button type="button" class="btn btn-primary" id="btnInstrumento">Finalizar Registro</button>
                                        </div>
                                    </div>
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
                                            DATOS PERSONALES</div>
                                        <div class="col-sm-2">
                                            SI <input class="form-check-input" type="radio" name="conocimientoDatosPersonales" id="conocimientoDatosPersonales" value="si" >
                                            NO <input class="form-check-input" type="radio" name="conocimientoDatosPersonales" id="conocimientoDatosPersonales" value="no" >

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
                                                <br>
                                                El Aviso de Privacidad Integral podrá consultarse a través del
                                                siguiente enlace electrónico
                                                atención.ipdp@cdmx.gob.mx, al correo electrónico:
                                                atención.ipdp@cdmx.gob.mx o acudir directamente a la
                                                Jefatura de Unidad Departamental de Transparencia.
                                                
                                                PARA CONOCER EL AVISO DE PRIVACIDAD INTEGRAL PUEDE ACUDIR DIRECTAMENTE A LA UNIDAD DE TRANSPARENCIA O INGRESAR A LA PÁGINA
                                                <a href="https://ipdp.cdmx.gob.mx">https://ipdp.cdmx.gob.mx</a>
                                                <br>
                                                FECHA DE ÚLTIMA ACTUALIZACIÓN 20 DE JULIO DE 2022
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="finalizarRegistro">Finalizar Registro</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    const instrumentoTabEl = document.querySelector('button#nav-instrumento-tab');
    const datosGeneralesTabEl = document.querySelector('button#nav-datos-generales-tab');
    const modalConsentimientoDatos = new bootstrap.Modal(document.getElementById('modalConsentimientoDatos'));

    const instrumentoTab = new bootstrap.Tab(instrumentoTabEl);
    const datosGeneralesTab = new bootstrap.Tab(datosGeneralesTabEl);

    var folio = $('meta[name="folio"]').attr("content");
    var numero_documentos = 0;
    // instrumentoTab.show();

    $("#btnDatosGeneralesSig").click(function() {
        if (!$("#formDatosGenerales")[0].checkValidity()) {
            $("#formDatosGenerales")[0].classList.add('was-validated')
        } else {
            instrumentoTab.show();
        }
    });

    $("#btnInstrumento").click(function() {
        if (!$("#formInstrumento")[0].checkValidity()) {
            $("#formInstrumento")[0].classList.add('was-validated');
            instrumentoTab.show();
        } else if (!$("#formDatosGenerales")[0].checkValidity()) {
            $("#formDatosGenerales")[0].classList.add('was-validated');
            datosGeneralesTab.show();
        } else if ($('[name="opcionIncluyeDocumentos"]:checked').val() == 1 && numero_documentos == 0) {
            var element = '<div class="alert alert-danger" role="alert">';
            element += 'Es requerido adjuntar por lo menos un archivo.';
            element += '</div>';

            $("#notification-center").html("").append(element).focus();

	} else {
            $("#finalizarRegistro").removeAttr("disabled");		
            modalConsentimientoDatos.show();
        }
    });

    $("#btnAtrasDatosGenerales").click(function() {
        datosGeneralesTab.show();
    });

    $("#finalizarRegistro").click(function(event) {
        if(!event.detail || event.detail == 1){     
	        if (!$("#conocimientoDatosPersonales")[0].checkValidity()) {
	            $("#conocimientoDatosPersonales")[0].classList.add('was-validated');
	        } else {
	            $(this).attr("disabled", "disabled");
    		    registrarCedula();
		}
	}
    });

    $("#inputCP").change(function() {
        var base_url = "{{ URL::to('/'); }}" + "/obtener-colonias/";
        var codigo_postal = $("#inputCP").val();
        var codigo_postal_url = base_url + codigo_postal;

        //console.warn("codigo_postal_url");
        //console.warn(codigo_postal_url);

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

                /* if (console && console.log) {
                    console.log("La solicitud se ha completado correctamente.");
		}*/

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

               // console.log(data.alcaldia);

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                $("#status").text("FAIL REQUEST");
            });
    });

    function registrarCedula(){

        var inputNombre = $('[name="inputNombre"]').val();
        var inputPrimerApellido = $('[name="inputPrimerApellido"]').val();
        var inputSegundoApellido = $('[name="inputSegundoApellido"]').val();
        var inputEdad = $('[name="inputEdad"]').val();
        var inputOcupacion = $('[name="inputOcupacion"]').val();
        var optionGenero = $('[name="optionGenero"]:checked').val();
        var inputCorreo = $('[name="inputCorreo"]').val();
        var inputCelular = $('[name="inputCelular"]').val();
        var inputCalle = $('[name="inputCalle"]').val();
        var inputNumExterior = $('[name="inputNumExterior"]').val();
        var inputNumInterior = $('[name="inputNumInterior"]').val();
        var inputManzana = $('[name="inputManzana"]').val();
        var inputCP = $('[name="inputCP"]').val();
        var inputAlcaldia = $('[name="inputAlcaldia"]').val();
        var inputColonia = $('[name="inputColonia"]').val();
        var optionRepresentante = $('[name="optionRepresentante"]:checked').val();
        var textComentarios = $('[name="textComentarios"]').val();
        var opcionIncluyeDocumentos = $('[name="opcionIncluyeDocumentos"]:checked').val();
        var numeroDocumentos = $('[name="numeroDocumentos"]').val();
        var conocimientoDatosPersonales = $('[name="conocimientoDatosPersonales"]:checked').val();
        
        var valInstrumentoAObservar = [];
        $('[name="opcionInstrumentoObservar"]:checkbox:checked').each(function(i){
            valInstrumentoAObservar[i] = $(this).val();
        });
        var opcionInstrumentoObservar = valInstrumentoAObservar.join(',');
        // valInstrumentoAObservar;

        var requestBody = {
            "folio": folio,
            "nombre": inputNombre,
            "primer_apellido": inputPrimerApellido,
            "segundo_apellido": inputSegundoApellido,
            "edad": inputEdad,
            "ocupacion": inputOcupacion,
            "genero": optionGenero,
            "correo": inputCorreo,
            "celular": inputCelular,
            "calle": inputCalle,
            "num_exterior": inputNumExterior,
            "num_interior": inputNumInterior,
            "manzana": inputManzana,
            "cp": inputCP,
            "alcaldia": inputAlcaldia,
            "colonia": inputColonia,
            "representante": optionRepresentante,
            "instrumento_observar": opcionInstrumentoObservar,
            "comentarios": textComentarios,
            "incluye_documentos": opcionIncluyeDocumentos,
            "numero_documentos": numeroDocumentos,
            "conocimiento_datos_personales": conocimientoDatosPersonales,
        };

        //console.warn(requestBody);
        modalConsentimientoDatos.hide();
        showLoader();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('administracion.guardarConsultaPublica') }}",
                method: "POST",
                data: requestBody,
                dataType: 'json'
            })
            .done(function(data, textStatus, jqXHR) {
                /*if (console && console.log) {
                    console.log("La solicitud se ha completado correctamente.");
		}*/
                hideLoader();
                window.location.href = data.confirmacion_url;

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                /*
                console.log( "jqXHR" );
                console.log( jqXHR );
                console.log( "textStatus" );
                console.log( textStatus );
                console.log( "errorThrown" );
		console.log( errorThrown );
		*/

                if( ( jqXHR.status == 422 )
                    || ( jqXHR.statusText == "Unprocessable Content" && jqXHR.status == 422 )
                    || (errorThrown == "Unprocessable Content" && textStatus == "error") ){
                    
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
        

        const url = '/storage/'+response.body.uploadURL;
        const fileName = file.name;

        const li = document.createElement('li');
        const button = document.createElement('button');
        const a = document.createElement('a');
        
        var element_id_arr = file.id.match(/\w+/g);
        const element_id = element_id_arr.join('');

        a.href = url;
        a.target = '_blank';
        a.appendChild(document.createTextNode(fileName + "  "))

        button.textContent = '(Eliminar Archivo)';
        button.setAttribute("onclick","borrarArchivo('" + response.body.uploadURL + "','"+element_id+"','"+file.id+"')");
        button.setAttribute("type","button");
        button.style = 'background-color: transparent;border: none;color: #b9965c;';
        
        li.id = element_id;
        li.appendChild(a);
        li.appendChild(button);

        document.querySelector(elForUploadedFiles).appendChild(li);

        numero_documentos = $('div.uploaded-files ol>li').length;
        $('#numeroDocumentos').val(numero_documentos);

        console.log("numero_documentos");
        console.log(numero_documentos);

        // maxNumberOfFiles
        // if (numero_documentos == 3) {
        //     uppy.close();
        // }

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
        endpoint: '/consulta-publica/subir-archivo/' + folio,
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

    function borrarArchivo(file_path, element_id, uppy_file_id ){
        var requestBody = {
            "file_path": file_path
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('borrarArchivo') }}",
            method: "POST",
            data: requestBody,
            dataType: 'json'
        })
        .done(function(data, textStatus, jqXHR) {
            uppy.removeFile(uppy_file_id);
            $("li#"+element_id).remove();
            numero_documentos = $('div.uploaded-files ol>li').length;
            $('#numeroDocumentos').val(numero_documentos);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            
            console.log( "jqXHR" );
            console.log( jqXHR );
            console.log( "textStatus" );
            console.log( textStatus );
            console.log( "errorThrown" );
            console.log( errorThrown );

        });

    }

//showLoader();

</script>
@endsection