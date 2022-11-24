<?php

namespace App\Http\Controllers;

use App\Models\Cedula;
use App\Models\FormatoInterno;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ReportesController extends Controller
{    
    function generaExcelFormatoInterno( $estados_formato_interno ){
        $estados_formato_interno = explode( '-', $estados_formato_interno );

        $spreadsheet = new Spreadsheet();

        $formato_interno = FormatoInterno::whereIn('status', $estados_formato_interno )
        ->orderBy('status')
        ->orderByDesc('folio')
        ->get();
                    
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Daniel Gutierrez')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');
        
        $row_number = 1;
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$row_number, "ID")
        ->setCellValue('B'.$row_number, "FOLIO")
        ->setCellValue('C'.$row_number, "STATUS")
        ->setCellValue('D'.$row_number, "TIPO CONSULTA")
        ->setCellValue('E'.$row_number, "FECHA SOLICITUD")
        ->setCellValue('F'.$row_number, "NOMBRE COMPLETO")
        ->setCellValue('G'.$row_number, "CORREO")
        ->setCellValue('H'.$row_number, "TELEFONO")
        ->setCellValue('I'.$row_number, "TIENE DATOS PARTICIPANTE")
        ->setCellValue('J'.$row_number, "ES REPRESENTANTE")
        ->setCellValue('K'.$row_number, "TIPO AUTORIDAD")
        ->setCellValue('L'.$row_number, "NOMBRE PUEBLO COMUNIDAD")
        ->setCellValue('M'.$row_number, "TIPO ORGANIZACION")
        ->setCellValue('N'.$row_number, "NOMBRE ORGANIZACION")
        ->setCellValue('O'.$row_number, "NOMBRE")
        ->setCellValue('P'.$row_number, "PRIMER APELLIDO")
        ->setCellValue('Q'.$row_number, "SEGUNDO APELLIDO")
        ->setCellValue('R'.$row_number, "EDAD")
        ->setCellValue('S'.$row_number, "OCUPACION")
        ->setCellValue('T'.$row_number, "GENERO")
        ->setCellValue('U'.$row_number, "CELULAR")
        ->setCellValue('V'.$row_number, "CALLE")
        ->setCellValue('W'.$row_number, "NUM EXTERIOR")
        ->setCellValue('X'.$row_number, "NUM INTERIOR")
        ->setCellValue('Y'.$row_number, "MANZANA")
        ->setCellValue('Z'.$row_number, "CP")
        ->setCellValue('AA'.$row_number, "ALCALDIA")
        ->setCellValue('AB'.$row_number, "COLONIA")
        ->setCellValue('AC'.$row_number, "TIPO PARTICIPACION")
        ->setCellValue('AD'.$row_number, "PARTICIPACION OTRO")
        ->setCellValue('AE'.$row_number, "NOMBRE ACTIVIDAD")
        ->setCellValue('AF'.$row_number, "FECHA ACTIVIDAD")
        ->setCellValue('AG'.$row_number, "LUGAR ACTIVIDAD")
        ->setCellValue('AH'.$row_number, "NUMERO DOCUMENTOS")
        ->setCellValue('AI'.$row_number, "TIPO DOCUMENTOS");
        
        $row_number++;

        foreach ($formato_interno as $formato) {
            
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row_number, $formato->id)
                        ->setCellValue('B'.$row_number, $formato->folio)
                        ->setCellValue('C'.$row_number, self::getEstadoSolicitud($formato->status))
                        ->setCellValue('D'.$row_number, $formato->tipoConsulta)
                        ->setCellValue('E'.$row_number, $formato->fechaSolicitud)
                        ->setCellValue('F'.$row_number, $formato->nombreCompleto)
                        ->setCellValue('G'.$row_number, $formato->correo)
                        ->setCellValue('H'.$row_number, $formato->telefono)
                        ->setCellValue('I'.$row_number, $formato->tieneDatosParticipante)
                        ->setCellValue('J'.$row_number, $formato->esRepresentante)
                        ->setCellValue('K'.$row_number, $formato->tipoAutoridad)
                        ->setCellValue('L'.$row_number, $formato->nombrePuebloComunidad)
                        ->setCellValue('M'.$row_number, $formato->tipoOrganizacion)
                        ->setCellValue('N'.$row_number, $formato->nombreOrganizacion)
                        ->setCellValue('O'.$row_number, $formato->nombre)
                        ->setCellValue('P'.$row_number, $formato->primerApellido)
                        ->setCellValue('Q'.$row_number, $formato->segundoApellido)
                        ->setCellValue('R'.$row_number, $formato->edad)
                        ->setCellValue('S'.$row_number, $formato->ocupacion)
                        ->setCellValue('T'.$row_number, $formato->genero)
                        ->setCellValue('U'.$row_number, $formato->celular)
                        ->setCellValue('V'.$row_number, $formato->calle)
                        ->setCellValue('W'.$row_number, $formato->numExterior)
                        ->setCellValue('X'.$row_number, $formato->numInterior)
                        ->setCellValue('Y'.$row_number, $formato->manzana)
                        ->setCellValue('Z'.$row_number, $formato->cp)
                        ->setCellValue('AA'.$row_number, $formato->alcaldia)
                        ->setCellValue('AB'.$row_number, $formato->colonia)
                        ->setCellValue('AC'.$row_number, $formato->tipoParticipacion)
                        ->setCellValue('AD'.$row_number, $formato->participacionOtro)
                        ->setCellValue('AE'.$row_number, $formato->nombreActividad)
                        ->setCellValue('AF'.$row_number, $formato->fechaActividad)
                        ->setCellValue('AG'.$row_number, $formato->lugarActividad)
                        ->setCellValue('AH'.$row_number, $formato->numeroDocumentos)
                        ->setCellValue('AI'.$row_number, $formato->tipoDocumentos);
        
            $row_number++;
        }

        
        // Rename worksheet
        $filename = "REGISTROS FORMATO INTERNO";
        $spreadsheet->getActiveSheet()->setTitle('Simple');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

    }
    
    function generaExcelCedulas( $estados_cedula ){
        $estados_cedula = explode( '-', $estados_cedula );
        $spreadsheet = new Spreadsheet();

        $cedulas = Cedula::whereIn('status', $estados_cedula )
                    ->orderBy('status')
                    ->orderByDesc('folio')
                    ->get();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Daniel Gutierrez')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');
        
        $row_number = 1;
        $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$row_number, "ORIGEN")
                ->setCellValue('B'.$row_number, "FOLIO")
                ->setCellValue('C'.$row_number, "STATUS")
                ->setCellValue('D'.$row_number, "NOMBRE")
                ->setCellValue('E'.$row_number, "PRIMER APELLIDO")
                ->setCellValue('F'.$row_number, "SEGUNDO APELLIDO")
                ->setCellValue('G'.$row_number, "EDAD")
                ->setCellValue('H'.$row_number, "OCUPACION")
                ->setCellValue('I'.$row_number, "GENERO")
                ->setCellValue('J'.$row_number, "CORREO")
                ->setCellValue('K'.$row_number, "CELULAR")
                ->setCellValue('L'.$row_number, "CALLE")
                ->setCellValue('M'.$row_number, "NUM EXTERIOR")
                ->setCellValue('N'.$row_number, "NUM INTERIOR")
                ->setCellValue('O'.$row_number, "MANZANA")
                ->setCellValue('P'.$row_number, "CP")
                ->setCellValue('Q'.$row_number, "ALCALDIA")
                ->setCellValue('R'.$row_number, "COLONIA")
                ->setCellValue('S'.$row_number, "REPRESENTANTE")
                ->setCellValue('T'.$row_number, "INSTRUMENTO OBSERVAR")
                ->setCellValue('U'.$row_number, "COMENTARIOS")
                ->setCellValue('V'.$row_number, "INCLUYE_DOCUMENTOS")
                ->setCellValue('W'.$row_number, "NUMERO_DOCUMENTOS")
                ->setCellValue('X'.$row_number, "CONOCIMIENTO_DATOS_PERSONALES");
        
        $row_number++;

        foreach ($cedulas as $cedula) {
            
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row_number, $cedula->origen)
                        ->setCellValue('B'.$row_number, $cedula->folio)
                        ->setCellValue('C'.$row_number, self::getEstadoSolicitud($cedula->status))
                        ->setCellValue('D'.$row_number, $cedula->nombre)
                        ->setCellValue('E'.$row_number, $cedula->primer_apellido)
                        ->setCellValue('F'.$row_number, $cedula->segundo_apellido)
                        ->setCellValue('G'.$row_number, $cedula->edad)
                        ->setCellValue('H'.$row_number, $cedula->ocupacion)
                        ->setCellValue('I'.$row_number, $cedula->genero)
                        ->setCellValue('J'.$row_number, $cedula->correo)
                        ->setCellValue('K'.$row_number, $cedula->celular)
                        ->setCellValue('L'.$row_number, $cedula->calle)
                        ->setCellValue('M'.$row_number, $cedula->num_exterior)
                        ->setCellValue('N'.$row_number, $cedula->num_interior)
                        ->setCellValue('O'.$row_number, $cedula->manzana)
                        ->setCellValue('P'.$row_number, $cedula->cp)
                        ->setCellValue('Q'.$row_number, $cedula->alcaldia)
                        ->setCellValue('R'.$row_number, $cedula->colonia)
                        ->setCellValue('S'.$row_number, $cedula->representante)
                        ->setCellValue('T'.$row_number, $cedula->instrumento_observar)
                        ->setCellValue('U'.$row_number, $cedula->comentarios)
                        ->setCellValue('V'.$row_number, $cedula->incluye_documentos)
                        ->setCellValue('W'.$row_number, $cedula->numero_documentos)
                        ->setCellValue('X'.$row_number, $cedula->conocimiento_datos_personales);
        
            $row_number++;
        }

        
        // Rename worksheet
        $filename = "REGISTROS CONSULTA PUBLICA";
        $spreadsheet->getActiveSheet()->setTitle('Simple');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

    }

    function getEstadoSolicitud($estado_numerico){
        if( $estado_numerico == 1 ){
            $estado_solicitud = "En análisis";
        } elseif( $estado_numerico == 2 ){
            $estado_solicitud = "En revisión técnica";
        } elseif( $estado_numerico == 3 ){
            $estado_solicitud = "En revisión jurídica";
        } elseif( $estado_numerico == 4 ){
            $estado_solicitud = "Integrada";
        } elseif( $estado_numerico == 5){
            $estado_solicitud = "Anexo de Participación";
        } elseif( $estado_numerico == 101){
            $estado_solicitud = "Solicitud Rechazada por equipo análisis";                                        
        } elseif( $estado_numerico == 102){
            $estado_solicitud = "Solicitud Rechazada en valoración Técnica";
        } elseif( $estado_numerico == 103){
            $estado_solicitud = "Solicitud Rechazada en valoración Jurídica";
        } elseif( $estado_numerico == 104){
            $estado_solicitud = "Solicitud Rechazada por integrador";
        }

        return $estado_solicitud;
    }
}
