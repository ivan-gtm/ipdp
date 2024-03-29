<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App;

use App\Mail;
use App\Mail\ConsultaPublicaRegistrada;
use App\Mail\PropuestaIntegradaAlAnexo;

use App\Models\Cedula;
use App\Models\ConsultaIndigena;
use App\Models\User;
use App\Models\EvaluacionTecnica;
use App\Models\Instrumento;
use App\Models\EvaluacionAnalisisSubtemas;
use App\Models\EvualuacionTecnicaDetalle;
use App\Models\EvaluacionAnalisis;
use App\Models\FormatoInterno;
use App\Models\EvaluacionTecnicaRechazo;
use App\Models\EvaluacionJuridica;
use App\Models\EvaluacionAnalisisTemas;
use App\Models\EvaluacionIntegracion;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;

class AdministracionController extends Controller
{
    function getFolio()
    {
        $numero_folio = 0;
        $folio_cedula = DB::select("select random_num from (
                                        select floor(rand() * (1000000-100000)+100000) as random_num 
                                        union
                                        select floor(rand() * (1000000-100000)+100000) as random_num
                                    ) as numbers
                                    where numbers.random_num not in (select folio from cedulas)
                                    limit 1;");
        foreach ($folio_cedula as $folio) {
            $numero_folio = $folio->random_num;
        }
        return $numero_folio;
    }

    function getCountFolio($numero_folio)
    {
        return DB::table('cedulas')->where('folio', $numero_folio)->count();
    }


    function home()
    {

        $info_cedula = DB::select(" select count(*) as cuenta, origen
                                    from cedulas
                                    group by origen
				    order by origen asc");

        $cuenta_cedula = DB::select("select count(*)  as cuenta, status from cedulas
                                    where status in (1,2,3,4,5,101,102)
                                    group by status ");

        $info_formato = DB::select("select count(*) as cuenta, status from consulta_indigena
                                    where status in (1,2,3,4,5,101,102)
                                    group by status");

        return view('ipdp.admin_home', [
            'info_cedula' => $info_cedula,
            'cuenta_cedula' => $cuenta_cedula,
            'info_formato' => $info_formato
        ]);
    }

    function evaluacionTecnica()
    {

        if (Auth::check() && (Auth::user()->rol != 'tecnica' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $estados_validos = [2, 102];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $currentPage = $cedulas->currentPage();
        $first_page = ($currentPage - 5 > 0) ? $currentPage - 5 : 1;
        if (($currentPage + 5) >= $page_number && $currentPage < $page_number) {
            $last_page = $page_number;
        } elseif ($currentPage + 5 < $page_number) {
            $last_page = $currentPage + 5;
        } else {
            $last_page = $page_number;
        }

        $parametros = self::obtenerParametrosValoracionTecnica();
        $instrumentos = self::obtenerCatalogoInstrumentos();

        return view('ipdp.admin_evaluacion_tecnica', [
            'page_number' => $page_number,
            'first_page' => $first_page,
            'last_page' => $last_page,
            'cedulas' => $cedulas,
            'parametros' => $parametros,
            'instrumentos' => $instrumentos
        ]);
    }

    function evaluacionTecnicaBuscar(Request $request)
    {

        if (Auth::check() && (Auth::user()->rol != 'tecnica' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $estados_validos = [2, 102];

        $query_filter = ' folio LIKE \'%' . $request->numero_folio . '%\'';

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->whereRaw($query_filter)
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            ->whereRaw($query_filter)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $parametros = self::obtenerParametrosValoracionTecnica();
        $instrumentos = self::obtenerCatalogoInstrumentos();

        return view('ipdp.admin_evaluacion_tecnica', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros,
            'instrumentos' => $instrumentos,
            'numero_folio' => $request->numero_folio
        ]);
    }

    function evaluacionJuridica()
    {

        if (Auth::check() && (Auth::user()->rol != 'juridica' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $estados_validos = [3, 102, 103];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $currentPage = $cedulas->currentPage();
        $first_page = ($currentPage - 5 > 0) ? $currentPage - 5 : 1;
        if (($currentPage + 5) >= $page_number && $currentPage < $page_number) {
            $last_page = $page_number;
        } elseif ($currentPage + 5 < $page_number) {
            $last_page = $currentPage + 5;
        } else {
            $last_page = $page_number;
        }

        $parametros = self::obtenerParametrosValoracionTecnica();

        return view('ipdp.admin_evaluacion_juridica', [
            'page_number' => $page_number,
            'first_page' => $first_page,
            'last_page' => $last_page,
            'cedulas' => $cedulas,
            'parametros' => $parametros
        ]);
    }

    function evaluacionJuridicaBuscar(Request $request)
    {

        if (Auth::check() && (Auth::user()->rol != 'juridica' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $estados_validos = [3, 102, 103];

        $query_filter = ' folio LIKE \'%' . $request->numero_folio . '%\'';

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->whereRaw($query_filter)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            ->whereRaw($query_filter)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $parametros = self::obtenerParametrosValoracionTecnica();

        return view('ipdp.admin_evaluacion_juridica', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros,
            'numero_folio' => $request->numero_folio
        ]);
    }

    public function guardarConsultaPublica(Request $request)
    {

        App::setLocale('es');

        $folio_num = $request->folio;

        $validatedData = $request->validate([
            'folio' => 'nullable|digits:6',
            'nombre' => 'nullable',
            'primer_apellido' => 'nullable',
            'segundo_apellido' => 'nullable',
            'edad' => 'nullable|min:1|max:99',
            'ocupacion' => 'nullable',
            'genero' => ['nullable', Rule::in(['Masculino', 'Femenino', 'Otro'])],
            'correo' => 'nullable|email',
            'celular' => 'nullable|digits:10',
            'calle' => 'nullable',
            'num_exterior' => 'nullable',
            'num_interior' => 'nullable',
            'manzana' => 'nullable',
            'cp' => 'nullable|digits:5',
            'alcaldia' => 'nullable',
            'colonia' => 'nullable',
            'representante' => 'nullable',
            'instrumento_observar' => ['nullable', Rule::in(['2020-2040', '2020-2035', '2020-2040,2020-2035'])],
            'comentarios' => 'nullable',
            'incluye_documentos' => 'nullable',
            'numero_documentos' => 'nullable|numeric|min:0|max:3',
            'conocimiento_datos_personales' => ['nullable', Rule::in(['si', 'no'])],
        ]);

        $validatedData['origen'] = 'interna';

        if ((self::getCountFolio($folio_num)) > 0) {
            $folio_num = self::getFolio();
            $validatedData['folio'] = $folio_num;
        }

        $show = Cedula::create($validatedData);

        $details = [
            'title' => '¡Gracias por tu participación!',
            'folio' => $folio_num,
            'consulta_folio_url' => route('ipdp.buscar', ['folio' => $folio_num]),
            'confirmacion_url' => route('administracion.confirmacionConsultaPublica', ['numero_folio' => $folio_num])
        ];

        if (isset($request->correo) && $request->correo != null) {
            try {
                \Mail::to($request->correo)
                    ->send(new ConsultaPublicaRegistrada($details));
            } catch (\Exception $e) {
                Log::error($e);
            }
        }

        return response()->json($details);
    }

    function registrarConsultaPublica()
    {
        if (Auth::check() && (Auth::user()->rol != 'recepcion' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $numero_folio = mt_rand(100000, 999999);

        return view('ipdp.admin_consulta_publica', [
            'numero_folio' => $numero_folio
        ]);
    }

    function evaluacionIntegracion()
    {
        // echo Auth::user()->rol;
        // exit;
        if (Auth::check() && (Auth::user()->rol != 'integracion_pgot' && Auth::user()->rol != 'integracion_pgd' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'No tiene permisos para visualizar este modulo!');
        }

        $rol_usuario = Auth::user()->rol;
        $tipos_de_instrumentos_visibles = ['PGD+PGOT'];
        // $where_raw = "( OR evaluador_pgd_fk IS NULL)";
        $where_raw = "(";

        if ($rol_usuario == 'administracion') {
            array_push($tipos_de_instrumentos_visibles, 'PGD');
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
            $where_raw .= "evaluador_pgot_fk IS NULL || evaluador_pgd_fk IS NULL";
        } elseif ($rol_usuario == 'integracion_pgd') {
            array_push($tipos_de_instrumentos_visibles, 'PGD');
            $where_raw .= "evaluador_pgd_fk IS NULL";
        } elseif ($rol_usuario == 'integracion_pgot') {
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
            $where_raw .= "evaluador_pgot_fk IS NULL";
        }
        $where_raw .= ")";

        $perPage = 10;


        $formato_interno = FormatoInterno::leftJoin('evualuacion_integracion', 'consulta_indigena.id', '=', 'evualuacion_integracion.consulta_fk')
            ->join('evualuacion_tecnica', function ($join) {
                $join->on('consulta_indigena.id', '=', 'evualuacion_tecnica.consulta_fk');
                $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'formato_interno'"));
            })
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('consulta_indigena.id', 'consulta_indigena.folio', 'consulta_indigena.created_at', 'consulta_indigena.status', 'consulta_indigena.nombre', 'consulta_indigena.primerApellido as primer_apellido', 'consulta_indigena.segundoApellido as segundo_apellido', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk', 'evualuacion_tecnica.tipo_documento as tipo')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->whereIn('consulta_indigena.status', [4, 104])
            ->whereIn('c_instrumento.descripcion', $tipos_de_instrumentos_visibles)
            ->whereRaw($where_raw);

        $cedulas = Cedula::leftJoin('evualuacion_integracion', 'cedulas.id', '=', 'evualuacion_integracion.consulta_fk')
            ->join('evualuacion_tecnica', function ($join) {
                $join->on('cedulas.id', '=', 'evualuacion_tecnica.consulta_fk');
                $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'cedula'"));
            })
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido', 'cedulas.segundo_apellido', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk', 'evualuacion_tecnica.tipo_documento as tipo')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->whereIn('cedulas.status', [4, 104])
            ->whereIn('c_instrumento.descripcion', $tipos_de_instrumentos_visibles)
            ->whereRaw($where_raw)
            ->union($formato_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $currentPage = $cedulas->currentPage();
        $first_page = ($currentPage - 5 > 0) ? $currentPage - 5 : 1;
        if (($currentPage + 5) >= $page_number && $currentPage < $page_number) {
            $last_page = $page_number;
        } elseif ($currentPage + 5 < $page_number) {
            $last_page = $currentPage + 5;
        } else {
            $last_page = $page_number;
        }

        return view('ipdp.admin_evaluacion_integracion', [
            'rol_usuario' => $rol_usuario,
            'page_number' => $page_number,
            'first_page' => $first_page,
            'last_page' => $last_page,
            'cedulas' => $cedulas
        ]);
    }

    function evaluacionIntegracionBuscar(Request $request)
    {
        // echo Auth::user()->rol;
        // exit;
        if (Auth::check() && (Auth::user()->rol != 'integracion_pgot' && Auth::user()->rol != 'integracion_pgd' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'No tiene permisos para visualizar este modulo!');
        }

        $rol_usuario = Auth::user()->rol;
        $tipos_de_instrumentos_visibles = ['PGD+PGOT'];
        // $where_raw = "( OR evaluador_pgd_fk IS NULL)";
        $where_raw = "(";

        $query_filter = ' folio LIKE \'%' . $request->numero_folio . '%\'';

        if ($rol_usuario == 'administracion') {
            array_push($tipos_de_instrumentos_visibles, 'PGD');
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
            $where_raw .= "evaluador_pgot_fk IS NULL || evaluador_pgd_fk IS NULL";
        } elseif ($rol_usuario == 'integracion_pgd') {
            array_push($tipos_de_instrumentos_visibles, 'PGD');
            $where_raw .= "evaluador_pgd_fk IS NULL";
        } elseif ($rol_usuario == 'integracion_pgot') {
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
            $where_raw .= "evaluador_pgot_fk IS NULL";
        }
        $where_raw .= ")";

        $perPage = 10;


        $formato_interno = FormatoInterno::leftJoin('evualuacion_integracion', 'consulta_indigena.id', '=', 'evualuacion_integracion.consulta_fk')
            ->join('evualuacion_tecnica', function ($join) {
                $join->on('consulta_indigena.id', '=', 'evualuacion_tecnica.consulta_fk');
                $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'formato_interno'"));
            })
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('consulta_indigena.id', 'consulta_indigena.folio', 'consulta_indigena.created_at', 'consulta_indigena.status', 'consulta_indigena.nombre', 'consulta_indigena.primerApellido as primer_apellido', 'consulta_indigena.segundoApellido as segundo_apellido', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk', 'evualuacion_tecnica.tipo_documento as tipo')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->whereIn('consulta_indigena.status', [4, 104])
            ->whereIn('c_instrumento.descripcion', $tipos_de_instrumentos_visibles)
            ->whereRaw($where_raw)
            ->whereRaw($query_filter);

        $cedulas = Cedula::leftJoin('evualuacion_integracion', 'cedulas.id', '=', 'evualuacion_integracion.consulta_fk')
            ->join('evualuacion_tecnica', function ($join) {
                $join->on('cedulas.id', '=', 'evualuacion_tecnica.consulta_fk');
                $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'cedula'"));
            })
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido', 'cedulas.segundo_apellido', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk', 'evualuacion_tecnica.tipo_documento as tipo')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->whereIn('cedulas.status', [4, 104])
            ->whereIn('c_instrumento.descripcion', $tipos_de_instrumentos_visibles)
            ->whereRaw($where_raw)
            ->whereRaw($query_filter)
            ->union($formato_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $currentPage = $cedulas->currentPage();
        $first_page = ($currentPage - 5 > 0) ? $currentPage - 5 : 1;
        if (($currentPage + 5) >= $page_number && $currentPage < $page_number) {
            $last_page = $page_number;
        } elseif ($currentPage + 5 < $page_number) {
            $last_page = $currentPage + 5;
        } else {
            $last_page = $page_number;
        }

        return view('ipdp.admin_evaluacion_integracion', [
            'rol_usuario' => $rol_usuario,
            'page_number' => $page_number,
            'first_page' => $first_page,
            'last_page' => $last_page,
            'cedulas' => $cedulas,
            'numero_folio' => $request->numero_folio
        ]);
    }

    function anexosParticipacion()
    {

        if (!Auth::check()) {
            return redirect()->route('administracion.home')->with('status', 'No tiene permisos para visualizar este modulo!');
        }

        $rol_usuario = Auth::user()->rol;
        $perPage = 10;

        $formato_interno = FormatoInterno::leftJoin('evualuacion_integracion', 'consulta_indigena.id', '=', 'evualuacion_integracion.consulta_fk')
            ->leftjoin('evualuacion_tecnica', function ($join) {
                $join->on('consulta_indigena.id', '=', 'evualuacion_tecnica.consulta_fk');
                $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'formato_interno'"));
            })
            ->leftjoin('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('consulta_indigena.id', 'consulta_indigena.folio', 'consulta_indigena.created_at', 'consulta_indigena.status', 'consulta_indigena.nombre', 'consulta_indigena.primerApellido as primer_apellido', 'consulta_indigena.segundoApellido as segundo_apellido', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk', 'evualuacion_tecnica.tipo_documento as tipo')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->whereIn('consulta_indigena.status', [5, 100, 101, 102, 103, 104]);

        $cedulas = Cedula::leftJoin('evualuacion_integracion', 'cedulas.id', '=', 'evualuacion_integracion.consulta_fk')
            ->leftjoin('evualuacion_tecnica', function ($join) {
                $join->on('cedulas.id', '=', 'evualuacion_tecnica.consulta_fk');
                $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'cedula'"));
            })
            ->leftjoin('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido', 'cedulas.segundo_apellido', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk', 'evualuacion_tecnica.tipo_documento as tipo')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->whereIn('cedulas.status', [5, 100, 101, 102, 103, 104])
            ->union($formato_interno)
            ->orderBy('status')
            ->orderByDesc('folio')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $currentPage = $cedulas->currentPage();
        $first_page = ($currentPage - 5 > 0) ? $currentPage - 5 : 1;
        if (($currentPage + 5) >= $page_number && $currentPage < $page_number) {
            $last_page = $page_number;
        } elseif ($currentPage + 5 < $page_number) {
            $last_page = $currentPage + 5;
        } else {
            $last_page = $page_number;
        }

        return view('ipdp.admin_anexo_participacion', [
            'rol_usuario' => $rol_usuario,
            'page_number' => $page_number,
            'first_page' => $first_page,
            'last_page' => $last_page,
            'cedulas' => $cedulas
        ]);
    }

    function guardarEvaluacionIntegracion(Request $request)
    {

        if (!Auth::check()) {
            // && ( ( Auth::user()->rol != 'integracion_pgot' || Auth::user()->rol != 'integracion_pgd' ) && Auth::user()->rol != 'administracion')
            return redirect()->route('administracion.home')->with('status', 'No tiene permisos para visualizar este modulo!');
        }

        $evaluador_pgd_fk = null;
        $evaluador_pgot_fk = null;

        if ($request->tipo_documento == 'cedula') {
            $info_cedula = Cedula::leftJoin('evualuacion_integracion', function ($join) {
                $join->on('cedulas.id', '=', 'evualuacion_integracion.consulta_fk');
                $join->on('evualuacion_integracion.tipo_documento', '=', DB::raw("'cedula'"));
            })
                ->join('evualuacion_tecnica', function ($join) {
                    $join->on('cedulas.id', '=', 'evualuacion_tecnica.consulta_fk');
                    $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'cedula'"));
                })
                ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
                ->select('cedulas.id', 'cedulas.folio', 'cedulas.status', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk')
                ->selectRaw('CONCAT(cedulas.nombre,\' \',cedulas.primer_apellido) as nombre')
                ->selectRaw('cedulas.correo')
                ->where('cedulas.id', $request->consulta_fk)
                ->first();

            $cedula = Cedula::find($request->consulta_fk);
        } elseif ($request->tipo_documento == 'formato_interno') {

            $info_cedula = FormatoInterno::leftJoin('evualuacion_integracion', function ($join) {
                $join->on('consulta_indigena.id', '=', 'evualuacion_integracion.consulta_fk');
                $join->on('evualuacion_integracion.tipo_documento', '=', DB::raw("'formato_interno'"));
            })
                ->join('evualuacion_tecnica', function ($join) {
                    $join->on('consulta_indigena.id', '=', 'evualuacion_tecnica.consulta_fk');
                    $join->on('evualuacion_tecnica.tipo_documento', '=', DB::raw("'formato_interno'"));
                })
                ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
                ->select('consulta_indigena.id', 'consulta_indigena.folio', 'consulta_indigena.status', 'c_instrumento.descripcion as instrumento', 'evualuacion_integracion.evaluador_pgot_fk', 'evualuacion_integracion.evaluador_pgd_fk')
                ->selectRaw('consulta_indigena.nombreCompleto as nombre')
                ->selectRaw('consulta_indigena.correo')
                ->where('consulta_indigena.id', $request->consulta_fk)
                ->orderByDesc('id')
                ->first();

            $cedula = FormatoInterno::find($request->consulta_fk);
        }


        // Si la cedula es solo PGD, cambiamos el estado para que no sea visible por el resto
        if (Auth::user()->rol == 'integracion_pgd' && $info_cedula->instrumento ==  'PGD') {

            $evaluador_pgd_fk = Auth::user()->id;
            $cedula->status = 5;
            self::emailPropuestaIntegradaAlAnexo($cedula->folio, $cedula->correo, $cedula->nombre);

            // Si la cedula es solo PGOT, cambiamos el estado para que no sea visible por el resto
        } elseif (Auth::user()->rol == 'integracion_pgot' && $info_cedula->instrumento ==  'PGOT') {
            $evaluador_pgot_fk = Auth::user()->id;
            $cedula->status = 5;
            self::emailPropuestaIntegradaAlAnexo($cedula->folio, $cedula->correo, $cedula->nombre);
        } elseif ($info_cedula->instrumento ==  'PGD+PGOT' && Auth::user()->rol == 'integracion_pgd' && intval($info_cedula->evaluador_pgd_fk) == 0) {
            $evaluador_pgd_fk = Auth::user()->id;
        } elseif ($info_cedula->instrumento ==  'PGD+PGOT' && Auth::user()->rol == 'integracion_pgot' && intval($info_cedula->evaluador_pgot_fk) == 0) {
            $evaluador_pgot_fk = Auth::user()->id;

            // Si la cedula fue autorizada por un ADMIN
        } elseif (Auth::user()->rol == 'administracion') {

            $evaluador_pgot_fk = Auth::user()->id;
            $evaluador_pgd_fk = Auth::user()->id;
            $cedula->status = 5;
        }



        $count = EvaluacionIntegracion::where('consulta_fk', $request->consulta_fk)->count();
        if ($count == 0) {
            if (Auth::check() && Auth::user()->rol == 'integracion_pgd') {

                $integracion = EvaluacionIntegracion::create([
                    'consulta_fk' => $request->consulta_fk,
                    'tipo_documento' => $request->tipo_documento,
                    'evaluador_pgd_fk' => $evaluador_pgd_fk,
                    'pgd_eje_estrategia' => $request->eje_estrategia,
                    'pgd_accion_objetivo' => $request->accion_objetivo,
                    'pgd_observaciones' => $request->observaciones
                ]);
            } elseif (Auth::check() && Auth::user()->rol == 'integracion_pgot') {
                $integracion = EvaluacionIntegracion::create([
                    'consulta_fk' => $request->consulta_fk,
                    'tipo_documento' => $request->tipo_documento,
                    'evaluador_pgot_fk' => $evaluador_pgot_fk,
                    'pgot_eje_estrategia' => $request->eje_estrategia,
                    'pgot_accion_objetivo' => $request->accion_objetivo,
                    'pgot_observaciones' => $request->observaciones
                ]);
            }
        } else {
            if (Auth::check() && Auth::user()->rol == 'integracion_pgd') {

                EvaluacionIntegracion::where('consulta_fk', $request->consulta_fk)
                    ->update([
                        'tipo_documento' => $request->tipo_documento,
                        'evaluador_pgd_fk' => $evaluador_pgd_fk,
                        'pgd_eje_estrategia' => $request->eje_estrategia,
                        'pgd_accion_objetivo' => $request->accion_objetivo,
                        'pgd_observaciones' => $request->observaciones
                    ]);
            } elseif (Auth::check() && Auth::user()->rol == 'integracion_pgot') {
                EvaluacionIntegracion::where('consulta_fk', $request->consulta_fk)
                    ->update([
                        'tipo_documento' => $request->tipo_documento,
                        'evaluador_pgot_fk' => $evaluador_pgot_fk,
                        'pgot_eje_estrategia' => $request->eje_estrategia,
                        'pgot_accion_objetivo' => $request->accion_objetivo,
                        'pgot_observaciones' => $request->observaciones
                    ]);
            }
        }

        $evaluacion_integracion = EvaluacionIntegracion::where('consulta_fk', $request->consulta_fk)->first();
        if ($info_cedula->instrumento == 'PGD+PGOT' && intval($evaluacion_integracion->evaluador_pgd_fk) > 0 && intval($evaluacion_integracion->evaluador_pgot_fk) > 0) {
            $cedula->status = 5;

            self::emailPropuestaIntegradaAlAnexo($cedula->folio, $cedula->correo, $cedula->nombre);
        }

        $cedula->save();

        return response()->json(["exito"]);
    }

    function emailPropuestaIntegradaAlAnexo($folio, $correo, $nombre)
    {
        $details = [
            'nombre' => $nombre,
            'folio' => $folio
        ];

        try {
            \Mail::to($correo)
                ->send(new PropuestaIntegradaAlAnexo($details));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    function obtenerEvaluacionJuridica(Request $request)
    {

        $query = '
        SELECT
            ec.id categoria_id,
            ec.descripcion categoria_descripcion,
            ae.id parametro_id,
            ae.descripcion parametro_descripcion 
        FROM
            evualuacion_tecnica et
            LEFT JOIN evualuacion_tecnica_detalle ed ON et.id = ed.evualuacion_tecnica_fk
            LEFT JOIN c_categoria_evaluacion_tecnica ec ON ed.categoria_fk = ec.id
            LEFT JOIN c_apartados_evaluacion_tecnica ae ON ed.apartado_fk = ae.id
        WHERE 
            et.tipo_documento = \'' . $request->tipo_documento . '\'
            AND et.consulta_fk =' . $request->consulta_id;

        $parametros = [];
        $tmp = [];
        $evaluacion_parametros = [];
        $tmp['categoria']['id'] = "";
        $tmp['categoria']['descripcion'] = "";

        $evaluacion_parametros_query_bd = DB::select(DB::raw($query));

        foreach ($evaluacion_parametros_query_bd as $parametro) {

            if ($tmp['categoria']['id'] != $parametro->categoria_id) {
                $evaluacion_parametros[] = $tmp;
                $tmp = [];
                $tmp['categoria']['id'] = ucwords($parametro->categoria_id);
                $tmp['categoria']['descripcion'] = ucwords($parametro->categoria_descripcion);
            }
            $tmpx['id'] = ucwords($parametro->parametro_id);
            $tmpx['descripcion'] = ucwords($parametro->parametro_descripcion);
            $tmp['parametros'][] = $tmpx;
        }

        $evaluacion_parametros[] = $tmp;
        unset($evaluacion_parametros[0]);

        if ($request->tipo_documento == 'cedula') {
            $documento = Cedula::where('id', $request->consulta_id)->first();
        } elseif ($request->tipo_documento == 'formato_interno') {
            $documento = ConsultaIndigena::where('id', $request->consulta_id)->first();
        }

        // print_r( $documento->status );
        // exit;
        $observacion = "";
        if ($documento->status == 4 || $documento->status == 3) {
            $evaluacion_tecnica = EvaluacionTecnica::where('consulta_fk', $request->consulta_id)
                ->where('tipo_documento', $request->tipo_documento)
                ->first();
            $observacion = $evaluacion_tecnica->observacion;
        } elseif ($documento->status == 102) {
            $consulta_indigena = EvaluacionTecnicaRechazo::where('consulta_fk', $request->consulta_id)
                ->where('tipo_documento', $request->tipo_documento)
                ->first();
            $observacion = $consulta_indigena->motivo_rechazo;
        }

        $response = [
            'parametros' => $evaluacion_parametros,
            'comentario' => $observacion
        ];

        return response()->json($response);
    }

    function evaluacionAnalisis()
    {

        if (Auth::check() && (Auth::user()->rol != 'analisis' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $estados_validos = [1, 101];

        // $filter_folio = 193495;
        // $filter_tipo_documento = 'formato';

        // $query_filter = '1 = 1 ';
        // $query_filter .= ' AND folio = '.$filter_folio;
        // $query_filter .= ' AND status = 101';
        // $query_filter .= ' AND tipo_documento LIKE \'%'.$filter_tipo_documento.'%\'';

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            // ->whereRaw($query_filter)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            // ->whereRaw($query_filter)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $currentPage = $cedulas->currentPage();
        $first_page = ($currentPage - 5 > 0) ? $currentPage - 5 : 1;
        if (($currentPage + 5) >= $page_number && $currentPage < $page_number) {
            $last_page = $page_number;
        } elseif ($currentPage + 5 < $page_number) {
            $last_page = $currentPage + 5;
        } else {
            $last_page = $page_number;
        }

        $temas = EvaluacionAnalisisTemas::get()->toArray();
        $parametros = self::obtenerParametrosValoracionTecnica();

        return view('ipdp.admin_analisis', [
            'page_number' => $page_number,
            'first_page' => $first_page,
            'last_page' => $last_page,
            'cedulas' => $cedulas,
            'parametros' => $parametros,
            'temas' => $temas
        ]);
    }

    function evaluacionAnalisisBuscar(Request $request)
    {

        if (Auth::check() && (Auth::user()->rol != 'analisis' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $estados_validos = [1, 101];

        $query_filter = ' folio LIKE \'%' . $request->numero_folio . '%\'';

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->whereRaw($query_filter)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            ->whereRaw($query_filter)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $temas = EvaluacionAnalisisTemas::get()->toArray();
        $parametros = self::obtenerParametrosValoracionTecnica();

        return view('ipdp.admin_analisis', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros,
            'temas' => $temas,
            'numero_folio' => $request->numero_folio
        ]);
    }

    function evaluacionRecepcion()
    {

        if (Auth::check() && (Auth::user()->rol != 'recepcion' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario sin permisos para reproducir este modulo!');
        }

        $perPage = 10;
        $estados_validos = [1, 101];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $currentPage = $cedulas->currentPage();
        $first_page = ($currentPage - 5 > 0) ? $currentPage - 5 : 1;
        if (($currentPage + 5) >= $page_number && $currentPage < $page_number) {
            $last_page = $page_number;
        } elseif ($currentPage + 5 < $page_number) {
            $last_page = $currentPage + 5;
        } else {
            $last_page = $page_number;
        }

        return view('ipdp.admin_recepcion', [
            'page_number' => $page_number,
            'first_page' => $first_page,
            'last_page' => $last_page,
            'cedulas' => $cedulas
            // 'parametros' => $parametros
        ]);
    }

    function evaluacionRecepcionBuscar(Request $request)
    {

        if (Auth::check() && (Auth::user()->rol != 'recepcion' && Auth::user()->rol != 'administracion')) {
            return redirect()->route('administracion.home')->with('status', 'Usuario sin permisos para reproducir este modulo!');
        }

        $perPage = 10;
        $estados_validos = [1, 101];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id', 'folio', 'created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("tipoConsulta as tipo_consulta")
            ->selectRaw("'formato_interno' as tipo_documento")
            ->where('folio', 'like', '%' . $request->numero_folio . '%')
            ->orderByDesc('id');

        $cedulas = Cedula::whereIn('status', $estados_validos)
            ->select('cedulas.id', 'cedulas.folio', 'cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido')
            ->selectRaw("null as tipo_consulta")
            ->selectRaw("'cedula' as tipo_documento")
            ->where('folio', 'like', '%' . $request->numero_folio . '%')
            ->union($formatos_interno)
            ->orderByDesc('id')
            ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        return view('ipdp.admin_recepcion', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'numero_folio' => $request->numero_folio
        ]);
    }

    function detalleConsultaPublica($folio)
    {

        $cedula = DB::table('cedulas')->where('folio', '=', $folio)->first();
        $archivos_cedula = DB::table('cedula_archivo')
            ->where('tipo_consulta', '=', 'consulta-publica')
            ->where('folio', '=', $folio)
            ->get();

        if (isset($cedula->instrumento_observar)) {
            $instrumento_observar = self::obtenerInstrumentosAObservar($cedula->instrumento_observar);
        } else {
            $instrumento_observar = null;
        }

        return view('ipdp.admin_detalle_consulta_publica', [
            'cedula' => $cedula,
            'instrumento_observar' => $instrumento_observar,
            'archivos_cedula' => $archivos_cedula
        ]);
    }

    function detalleFormatoInterno($folio)
    {

        $cedula = DB::table('consulta_indigena')->where('folio', '=', $folio)->first();
        $archivos_cedula = DB::table('cedula_archivo')
            ->where('tipo_consulta', '=', 'consulta-indigena')
            ->where('folio', '=', $folio)
            ->get();

        return view('ipdp.admin_detalle_formato_interno', [
            'cedula' => $cedula,
            // 'instrumento_observar' => $instrumento_observar,
            'archivos_cedula' => $archivos_cedula
        ]);
    }

    function obtenerInstrumentosAObservar($instrumentos)
    {
        $arreglo_instrumentos = explode(',', $instrumentos);
        foreach ($arreglo_instrumentos as $anio_instrumento) {
            $instrumento_x = null;
            if ($anio_instrumento == '2020-2040') {
                $instrumento_x['periodo'] = $anio_instrumento;
                $instrumento_x['descripcion'] = "PLAN GENERAL DE DESARROLLO DE LA CIUDAD DE MÉXICO";
            } elseif ($anio_instrumento == '2020-2035') {
                $instrumento_x['periodo'] = $anio_instrumento;
                $instrumento_x['descripcion'] = "PROGRAMA GENERAL DE ORDENAMIENTO TERRITORIAL DE LA CIUDAD DE MÉXICO";
            }
            $respuesta[] = $instrumento_x;
        }

        return $respuesta;
    }

    function guardarEvaluacionAnalisis(Request $request)
    {

        if (isset($request->tipo_documento) && $request->tipo_documento == 'cedula') {
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 2;
            $consulta->save();
        } elseif (isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno') {
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 2;
            $consulta->save();
        }

        $evaluacion_analisis = EvaluacionAnalisis::create([
            'consulta_fk' => $request->consulta_id,
            'tipo_documento' => $request->tipo_documento,
            'observaciones' => $request->observaciones
        ]);

        $temas = explode(',', $request->tema_evaluacion);

        foreach ($temas as $tema_id) {
            if (intval($tema_id) > 0) {
                DB::table('evaluacion_analisis_temas')->insert([
                    'fk_evaluacion_analisis' => $evaluacion_analisis->id,
                    'fk_tema' => $tema_id
                ]);
            }
        }

        $subtemas = explode(',', $request->subtema_evaluacion);


        foreach ($subtemas as $subtema_id) {
            if (intval($subtema_id) > 0) {
                DB::table('evaluacion_analisis_subtemas')->insert([
                    'fk_evaluacion_analisis' => $evaluacion_analisis->id,
                    'fk_subtema' => $subtema_id
                ]);
            }
        }

        return response()->json(["exito"]);
    }

    function obtenerSubtemasAnalisis(Request $request)
    {
        if (!isset($request->temas_ids)) {
            abort(404);
        }

        $subtemas = EvaluacionAnalisisSubtemas::whereIn('fk_tema', explode(',', $request->temas_ids))->get();
        return $subtemas->toJson(JSON_PRETTY_PRINT);
    }

    function guardarEvaluacionTecnica(Request $request)
    {

        $evaluacion_tecnica = EvaluacionTecnica::create([
            'consulta_fk' => $request->folio_id,
            'tipo_documento' => $request->tipo_documento,
            'instrumento_fk' => $request->instrumento,
            'observacion' => $request->observaciones
        ]);

        $evaluacion_parametros = $request->parametros;
        foreach ($evaluacion_parametros as $parametro) {
            list($categoria_id, $apartado_id) = explode("-", $parametro);

            EvualuacionTecnicaDetalle::create([
                'evualuacion_tecnica_fk' => $evaluacion_tecnica->id,
                'categoria_fk' => $categoria_id,
                'apartado_fk' => $apartado_id,
            ]);
        }

        if (isset($request->tipo_documento) && $request->tipo_documento == 'cedula') {
            $consulta = Cedula::find($request->folio_id);
            $consulta->status = 3;
            $consulta->save();
        } elseif (isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno') {
            $consulta = FormatoInterno::find($request->folio_id);
            $consulta->status = 3;
            $consulta->save();
        }

        return response()->json(["exito"]);
    }

    function obtenerResultadosAnalisis(Request $request)
    {

        if (!isset($request->id_consulta) || !isset($request->tipo_documento)) {
            abort(404);
        }

        $response = [];
        $response['observaciones'] = "";
        $evaluacion_analisis = EvaluacionAnalisis::select('id', 'observaciones', 'motivo_rechazo')->where('consulta_fk', $request->id_consulta)->where('tipo_documento', $request->tipo_documento)->first();

        if (isset($evaluacion_analisis->observaciones)) {
            $response['observaciones'] = $evaluacion_analisis->observaciones;
        } elseif (isset($evaluacion_analisis->motivo_rechazo)) {
            $response['observaciones'] = $evaluacion_analisis->motivo_rechazo;
        } else {
            $response['observaciones'] = '';
        }

        $temas = DB::select("SELECT
                    temas.descripcion 
                FROM 
                    evaluacion_analisis ea,
                    evaluacion_analisis_temas et,
                    c_evaluacion_analisis_temas temas
                WHERE 
                    ea.consulta_fk = " . $request->id_consulta . "
                    AND ea.tipo_documento = '" . $request->tipo_documento . "'
                    AND et.fk_evaluacion_analisis = ea.id
                    AND et.fk_tema = temas.id ");

        $subtemas = DB::select("SELECT
                                    subtemas.descripcion 
                                FROM evaluacion_analisis ea,
                                    evaluacion_analisis_subtemas es,
                                    c_evaluacion_analisis_subtemas subtemas
                                WHERE 
                                    ea.consulta_fk = " . $request->id_consulta . "
                                    AND ea.tipo_documento = '" . $request->tipo_documento . "'
                                    AND es.fk_evaluacion_analisis = ea.id
                                    AND es.fk_subtema = subtemas.id");


        $response['temas'] = $temas;
        $response['subtemas'] = $subtemas;

        return json_encode($response);
    }

    function guardarRechazoAnalisisSolicitud(Request $request)
    {

        if (isset($request->tipo_documento) && $request->tipo_documento == 'cedula') {
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 101;
            $consulta->save();
        } elseif (isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno') {
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 101;
            $consulta->save();
        }

        $rechazo_analisis = EvaluacionAnalisis::create([
            'consulta_fk' => $request->consulta_id,
            'tipo_documento' => $request->tipo_documento,
            'motivo_rechazo' => $request->motivo_rechazo
        ]);

        $temas = explode(',', $request->tema_evaluacion);
        foreach ($temas as $tema_id) {
            DB::table('evaluacion_analisis_temas')->insert([
                'fk_evaluacion_analisis' => $rechazo_analisis->id,
                'fk_tema' => $tema_id
            ]);
        }

        $subtemas = explode(',', $request->subtema_evaluacion);
        foreach ($subtemas as $subtema_id) {
            DB::table('evaluacion_analisis_subtemas')->insert([
                'fk_evaluacion_analisis' => $rechazo_analisis->id,
                'fk_subtema' => $subtema_id
            ]);
        }

        return response()->json("exito");
    }

    function guardarRechazoEvaluacionTecnica(Request $request)
    {

        $rechazo_analisis = EvaluacionTecnicaRechazo::create([
            'consulta_fk' => $request->consulta_id,
            'tipo_documento' => $request->tipo_documento,
            'motivo_rechazo' => $request->motivo_rechazo
        ]);

        if (isset($request->tipo_documento) && $request->tipo_documento == 'cedula') {
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 102; // Rechazo evaluacion tecnica
            $consulta->save();
        } elseif (isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno') {
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 102; // Rechazo evaluacion tecnica
            $consulta->save();
        }

        return response()->json("exito");
    }

    function guardarRechazoEvaluacionJuridica(Request $request)
    {

        $rechazo_analisis = EvaluacionJuridica::create([
            'consulta_fk' => $request->consulta_id,
            'motivo_rechazo' => $request->motivo_rechazo
        ]);

        if (isset($request->tipo_documento) && $request->tipo_documento == 'cedula') {
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 103; // Rechazo evaluacion Juridica
            $consulta->save();
        } elseif (isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno') {
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 103; // Rechazo evaluacion Juridica
            $consulta->save();
        }

        return response()->json("exito");
    }

    function guardarRechazoEvaluacionIntegracion(Request $request)
    {


        if (Auth::check() && Auth::user()->rol == 'integracion_pgd') {

            $rechazo_integracion = EvaluacionIntegracion::create([
                'consulta_fk' => $request->consulta_id,
                'evaluador_pgd_fk' => Auth::user()->id,
                'tipo_documento' => $request->tipo_documento,
                'pgd_motivo_rechazo' => $request->motivo_rechazo
            ]);
        } elseif (Auth::check() && Auth::user()->rol == 'integracion_pgot') {
            $rechazo_integracion = EvaluacionIntegracion::create([
                'consulta_fk' => $request->consulta_id,
                'evaluador_pgot_fk' => Auth::user()->id,
                'tipo_documento' => $request->tipo_documento,
                'pgot_motivo_rechazo' => $request->motivo_rechazo
            ]);
        }

        if (isset($request->tipo_documento) && $request->tipo_documento == 'cedula') {
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 104; // Rechazo evaluacion Juridica
            $consulta->save();
        } elseif (isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno') {
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 104; // Rechazo evaluacion Juridica
            $consulta->save();
        }

        return response()->json("exito");
    }

    function guardarEvaluacionJuridica(Request $request)
    {

        if ($request->tipo_documento == 'formato_interno') {
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 4;
            $consulta->save();
        } elseif ($request->tipo_documento == 'cedula') {
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 4;
            $consulta->save();
        }

        EvaluacionJuridica::create([
            'consulta_fk' => $request->consulta_id,
            'tipo_documento' => $request->tipo_documento,
            'observaciones' => $request->observaciones
        ]);

        return response()->json(["exito"]);
    }

    function obtenerParametrosValoracionTecnica()
    {
        $query = '
        SELECT
            cet.id categoria_id,
            cet.descripcion categoria_descripcion,
            cat.id parametro_id,
            cat.descripcion parametro_descripcion 
        FROM
            c_apartados_evaluacion_tecnica cat
            LEFT JOIN c_categoria_evaluacion_tecnica cet ON cat.categoria_evaluacion_tecnica_fk = cet.id';

        $parametros = [];

        $tmp = [];
        $resultado = [];
        $tmp['categoria']['id'] = "";
        $tmp['categoria']['descripcion'] = "";

        $resultado_query_bd = DB::select(DB::raw($query));

        foreach ($resultado_query_bd as $parametro) {

            if ($tmp['categoria']['id'] != $parametro->categoria_id) {
                $resultado[] = $tmp;
                $tmp = [];
                $tmp['categoria']['id'] = ucwords($parametro->categoria_id);
                $tmp['categoria']['descripcion'] = ucwords($parametro->categoria_descripcion);
            }
            $tmpx['id'] = ucwords($parametro->parametro_id);
            $tmpx['descripcion'] = ucwords($parametro->parametro_descripcion);
            $tmp['parametros'][] = $tmpx;
        }
        $resultado[] = $tmp;
        unset($resultado[0]);

        // echo "<pre>";
        // print_r( $resultado );
        // exit;

        // return response()->json($resultado);
        return $resultado;
    }

    function usuariosSistema()
    {
        if (Auth::check() && Auth::user()->rol != 'administracion') {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $usuarios = User::orderByDesc('id')->paginate($perPage);
        $total = $usuarios->total();
        $page_number = round($total / $perPage);

        return view('ipdp.admin_usuarios', [
            'page_number' => $page_number,
            'usuarios' => $usuarios,
        ]);
    }

    function usuarios()
    {
        if (Auth::check() && Auth::user()->rol != 'administracion') {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $usuarios = User::paginate($perPage);
        $total = $usuarios->total();
        $page_number = round($total / $perPage);

        // $columnas = ceil(sizeof($parametros) / 2);
        // echo "<pre>";
        // print_r( $parametros );
        // exit;

        return view('ipdp.admin_usuarios', [
            'page_number' => $page_number,
            'usuarios' => $usuarios,
        ]);
    }

    function obtenerCatalogoInstrumentos()
    {
        return Instrumento::get()->toArray();
    }

    function confirmacionConsultaPublica($numero_folio)
    {
        // Valida que folio se componga de 6 digitos
        if (preg_match("/^[\w\d]{6}$/", $numero_folio) == false) {
            abort(404);
        }

        $numero_folios_existentes = DB::table('cedulas')->where('folio', $numero_folio)->count();

        if ($numero_folios_existentes == 0) {
            abort(404);
        }

        return view('ipdp.admin_consulta_publica_confirmacion', [
            'numero_folio' => $numero_folio
        ]);
    }
}
