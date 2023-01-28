<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Caracterizacion extends Model
{
    protected $table = 'caracterizacion';
    protected $fillable = [
        'telefono', 'puntaje_sisben', 'tipo_id', 'identificacion', 'sexo',
        'parentesco', 'pnom', 'snom', 'pape', 'sape', 'salario', 'id_hogar',
        'id_compania', 'estado', 'estado_civil', 'fecha_nacimiento', 'afiliacion_entidad',
        'tipo_afiliacion', 'embarazo', 'embarazo_multiple', 'discapacidad', 'nivel_escolaridad',
        'ocupacion', 'colegio', 'grado', 'etnia', 'clasificacion', 'entiende', 'pyp', 'migrante', 'otra_eps',
        'orientacion', 'identidad_genero', 'perdida_peso', 'programa_icbf', 'identi_auxi', 'peso', 'talla',
        'tipo_empleo', 'percargo', 'actividad_fisica', 'vacuna','lactante'
    ];

    public static function listar($busqueda, $alias)
    {   
        if (!empty($busqueda)) {
            if (Auth::user()->rol == "Administrador" || Auth::user()->rol == "SuperAdministrador") {
                $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
                ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'hogar.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
                ->where(function ($query) use ($busqueda) {
                    $query->where('caracterizacion.identificacion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('corregimientos.descripcion', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.pnom', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.snom', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.pape', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.sape', 'LIKE', '%' . $busqueda . '%')
                        ->orWhereRaw("CONCAT_WS(' ',caracterizacion.pnom,caracterizacion.snom,caracterizacion.pape,caracterizacion.sape) LIKE '%" . $busqueda . "%'")
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%');
                })
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "caracterizacion.estado AS ESTADO",
                    "caracterizacion.identificacion AS IDENTIFICACION",
                    "caracterizacion.id",
                    "caracterizacion.sexo",
                    "hogar.id AS IDHOGAR",
                    "caracterizacion.telefono"
                )
                ->where("hogar.estado", "Activo")
                ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
                ->orderBy('caracterizacion.id', 'DESC')
                ->paginate(10);
            } else {
                $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
                ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'hogar.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
                ->where(function ($query) use ($busqueda) {
                    $query->where('caracterizacion.identificacion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('corregimientos.descripcion', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.pnom', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.snom', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.pape', 'LIKE', '%' . $busqueda . '%')
                    // ->orWhere('caracterizacion.sape', 'LIKE', '%' . $busqueda . '%')
                        ->orWhereRaw("CONCAT_WS(' ',caracterizacion.pnom,caracterizacion.snom,caracterizacion.pape,caracterizacion.sape) LIKE '%" . $busqueda . "%'")
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%');
                })
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "caracterizacion.estado AS ESTADO",
                    "caracterizacion.identificacion AS IDENTIFICACION",
                    "caracterizacion.id",
                    "caracterizacion.sexo",
                    "hogar.id AS IDHOGAR",
                    "caracterizacion.telefono"
                )
                ->where("hogar.estado", "Activo")
                ->where("hogar.usuario_crear", Auth::user()->id)
                ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
                ->orderBy('caracterizacion.id', 'DESC')
                ->paginate(10);
            }
        } else {
            if (Auth::user()->rol == "Administrador" || Auth::user()->rol == "SuperAdministrador") {
                $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
                ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'hogar.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
                ->where("hogar.estado", "Activo")
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "caracterizacion.estado AS ESTADO",
                    "caracterizacion.identificacion AS IDENTIFICACION",
                    "caracterizacion.id",
                    "caracterizacion.sexo",
                    "hogar.id AS IDHOGAR",
                    "caracterizacion.telefono"
                )
                ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
                ->orderBy('caracterizacion.id', 'DESC')
                ->paginate(10);
            } else {
                $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
                ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'hogar.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
                ->where("hogar.estado", "Activo")
                ->where("hogar.usuario_crear", Auth::user()->id)
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "caracterizacion.estado AS ESTADO",
                    "caracterizacion.identificacion AS IDENTIFICACION",
                    "caracterizacion.id",
                    "caracterizacion.sexo",
                    "hogar.id AS IDHOGAR",
                    "caracterizacion.telefono"
                )
                ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
                ->orderBy('caracterizacion.id', 'DESC')
                ->paginate(10);
            }
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {

        $identi = $data['identificacion'];
        if ($data['tipo_id'] == "MSI" || $data['tipo_id'] == "ASI") {
            $count = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->count();
            if ($count <= 0) {
                $identi = str_pad(1, 7, "0", STR_PAD_LEFT);
            } else {
                $resp = DB::connection('mysql')->table($alias . '.caracterizacion')
                    ->orderBy('id', 'desc')->first();
                $identi = str_pad(1 + $resp->identificacion, 7, "0", STR_PAD_LEFT);
            }
        }

        return DB::connection('mysql')->table($alias . '.caracterizacion')->insertGetId([
            'id' => $data['id'],
            'id_hogar' => $data['id_hogar'],
            'telefono' => $data['telefono'],
            'puntaje_sisben' => $data['puntaje_sisben'],
            'afiliacion_entidad' => $data['afiliacion_entidad'],
            'otra_eps' => $data['otra_eps'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $identi,
            'sexo' => $data['sexo'],
            'parentesco' => $data['parentesco'],
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'salario' => $data['salario'],
            'estado_civil' => $data['estado_civil'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'tipo_afiliacion' => $data['tipo_afiliacion'],
            'embarazo' => $data['embarazo'],
            'embarazo_multiple' => $data['embarazo_multiple'],
            'discapacidad' => $data['discapacidad'],
            'nivel_escolaridad' => $data['nivel_escolaridad'],
            'ocupacion' => $data['ocupacion'],
            'colegio' => $data['colegio'],
            'grado' => $data['grado'],
            'etnia' => $data['etnia'],
            'clasificacion' => $data['clasificacion'],
            'entiende' => $data['entiende'],
            'pyp' => $data['pyp'],
            'migrante' => $data['migrante'],
            'orientacion' => $data['orientacion'],
            'identidad_genero' => $data['identidad_genero'],
            'perdida_peso' => $data['perdida_peso'],
            'programa_icbf' => $data['programa_icbf'],
            'identi_auxi' => $data['identificacion'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'tipo_empleo' => $data['tipo_empleo'],
            'percargo' => $data['percargo'],
            'actividad_fisica' => $data['actividad_fisica'],
            'vacuna' => $data['vacuna'],      
            'lactante' => $data['lactante'],      
        ]);
    }
    public static function modificar($data, $alias, $id)
    {

        $identi = $data['identificacion'];
        if ($data['tipo_id'] == "MSI" || $data['tipo_id'] == "ASI") {
            $count = DB::connection('mysql')->table($alias . '.caracterizacion')
                ->count();
            if ($count <= 0) {
                $identi = str_pad(1, 7, "0", STR_PAD_LEFT);
            } else {
                $resp = DB::connection('mysql')->table($alias . '.caracterizacion')
                    ->orderBy('id', 'desc')->first();
                $identi = str_pad(1 + $resp->identificacion, 7, "0", STR_PAD_LEFT);
            }
        }

        return DB::connection('mysql')->table($alias . '.caracterizacion')->where('id', $id)->update([
            'id_hogar' => $data['id_hogar'],
            'telefono' => $data['telefono'],
            'puntaje_sisben' => $data['puntaje_sisben'],
            'afiliacion_entidad' => $data['afiliacion_entidad'],
            'otra_eps' => $data['otra_eps'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $identi,
            'sexo' => $data['sexo'],
            'parentesco' => $data['parentesco'],
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'salario' => $data['salario'],
            'estado_civil' => $data['estado_civil'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'tipo_afiliacion' => $data['tipo_afiliacion'],
            'embarazo' => $data['embarazo'],
            'embarazo_multiple' => $data['embarazo_multiple'],
            'discapacidad' => $data['discapacidad'],
            'nivel_escolaridad' => $data['nivel_escolaridad'],
            'ocupacion' => $data['ocupacion'],
            'colegio' => $data['colegio'],
            'grado' => $data['grado'],
            'etnia' => $data['etnia'],
            'clasificacion' => $data['clasificacion'],
            'entiende' => $data['entiende'],
            'pyp' => $data['pyp'],
            'migrante' => $data['migrante'],
            'orientacion' => $data['orientacion'],
            'identidad_genero' => $data['identidad_genero'],
            'perdida_peso' => $data['perdida_peso'],
            'programa_icbf' => $data['programa_icbf'],
            'identi_auxi' => $data['identificacion'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'tipo_empleo' => $data['tipo_empleo'],
            'percargo' => $data['percargo'],
            'actividad_fisica' => $data['actividad_fisica'],
            'vacuna' => $data['vacuna'],
            'lactante' => $data['lactante'],
        ]);
    }
    public static function verificar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('identificacion', $identificacion)
            ->where('estado', 'Activo')
            ->count();
    }

    public static function exportar($alias)
    {
        $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
            ->select("dptos.descripcion AS DPTO",
                "muni.descripcion AS MUNI",
                "corregimientos.descripcion AS CORREGIMIENTO",
                "caracterizacion.estado AS ESTADO",
                "caracterizacion.identificacion AS IDENTIFICACION",
                "caracterizacion.id",
                "hogar.direccion"
            )
            ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
            ->where('caracterizacion.estado', 'Activo')
            ->orderBy('caracterizacion.id', 'DESC')
            ->get();
        return $respuesta;
    }

    public static function exportar2($id, $alias)
    {
        $hogar = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.id', $id)
        ->first();

        $respuesta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias . '.dptos', 'dptos.codigo', 'hogar.id_dpto')
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'hogar.id_corre')
        ->select("dptos.descripcion AS DPTO",
            "muni.descripcion AS MUNI",
            "corregimientos.descripcion AS CORREGIMIENTO",
            "caracterizacion.estado AS ESTADO",
            "caracterizacion.identificacion AS IDENTIFICACION",
            "hogar.direccion AS DIRECCION",
            "caracterizacion.id",
            "caracterizacion.id_hogar"
        )
        ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS USUARIO')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.id_hogar',  $hogar->id_hogar)
        ->orderBy('caracterizacion.id', 'DESC')
        ->get();
        return $respuesta;
    }

    public static function buscar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('identi_auxi', $identificacion)
            ->orderBy('id', 'desc')
            ->first();
    }

    public static function buscarPorId($id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->findOrFail($id);
    }

    public static function buscarJefes($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'caracterizacion.colegio')

            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'caracterizacion.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'caracterizacion.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'caracterizacion.nivel_escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'caracterizacion.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'caracterizacion.clasificacion')

            ->where('id_hogar', $id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.*",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "etnias.descripcion AS textoEtnia",
                "clasificacion_etnia.clasificacion AS textoClasificacion",
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("CASE "
                . " WHEN caracterizacion.snom IS NULL THEN '' "
                . " WHEN caracterizacion.snom = '' THEN '' "
                . " ELSE caracterizacion.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN caracterizacion.sape IS NULL THEN '' "
                . " WHEN caracterizacion.sape = '' THEN '' "
                . " ELSE caracterizacion.sape "
                . " END sape"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->get();
    }
    public static function total($alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('estado', 'Activo')
            ->count();
    }

    public static function totalJefes($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('caracterizacion.id_hogar', $id_hogar)
            ->where('estado', 'Activo')
            ->count();
    }

    public static function totalJefesTrabajando($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('estado', 'Activo')
            ->where('tipo_empleo', '!=', "1")
            ->where('tipo_empleo', '!=', "4")
            ->where('id_hogar', $id_hogar)
            ->get();
    }

    public static function NivelEducativoJefes($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('id_hogar', $id_hogar)
            ->where('estado', 'Activo')
            ->where(function ($query) {
                $query->where('nivel_escolaridad', "1")
                    ->orWhere('nivel_escolaridad', "3")
                    ->orWhere('nivel_escolaridad', "4")
                    ->orWhere('nivel_escolaridad', "12")
                    ->orWhere('nivel_escolaridad', "13")
                    ->orWhere('nivel_escolaridad', "14");
            })
            ->count();
    }

    public static function totalHogares($alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where('estado', 'Activo')
            ->groupBy('id_hogar')
            ->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.caracterizacion')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function listarj($alias, $data, $tipo)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'caracterizacion.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'caracterizacion.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'caracterizacion.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'caracterizacion.nivel_escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'caracterizacion.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'caracterizacion.clasificacion')

            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.tipo_id",
                "caracterizacion.pape",
                "caracterizacion.sape",
                "caracterizacion.pnom",
                "caracterizacion.snom",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "etnias.descripcion AS textoEtnia",
                "clasificacion_etnia.clasificacion AS textoClasificacion",
                "dptos.descripcion AS DPTO",
                "muni.descripcion AS MUNI",
                "corregimientos.descripcion AS CORREGIMIENTO",
                "hogar.direccion AS DIRECCION",
                "veredas.descripcion as vereda",
                "barrios.barrio",
                "hogar.id_zona",
                "vivienda.id_hogar"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->selectRaw("'Jefe hogar' as tipo, caracterizacion.salario");

        if ($data["datos"]["id_dpto"] != null) {
            $consulta->where("hogar.id_dpto", $data["datos"]["id_dpto"]);
        }

        if ($data["datos"]["id_mun"] != null) {
            $consulta->where("hogar.id_mun", $data["datos"]["id_mun"]);
        }

        if ($data["datos"]["id_corre"] != null) {
            $consulta->where("hogar.id_corre", $data["datos"]["id_corre"]);
        }

        if ($data["datos"]["id_vereda"] != null) {
            $consulta->where("hogar.id_vereda", $data["datos"]["id_vereda"]);
        }

        if ($data["datos"]["id_zona"] != null) {
            $consulta->where("hogar.id_zona", $data["datos"]["id_zona"]);
        }

        if ($data["datos"]["id_barrio"] != null) {
            $consulta->where("hogar.id_barrio", $data["datos"]["id_barrio"]);
        }

        if ($data["datos"]["documento"]) {
            $consulta->where("caracterizacion.identificacion", $data["datos"]["documento"]);
        }

        if ($data["datos"]["sexo"]) {
            $consulta->where("caracterizacion.sexo", $data["datos"]["sexo"]);
        }

        if ($data["datos"]["estado_civil"]) {
            $consulta->where("caracterizacion.estado_civil", $data["datos"]["estado_civil"]);
        }

        if ($data["datos"]["afiliacion_entidad"]) {
            $consulta->where("caracterizacion.afiliacion_entidad", $data["datos"]["afiliacion_entidad"]);
        }

        if ($data["datos"]["tipo_afiliacion"]) {
            $consulta->where("caracterizacion.tipo_afiliacion", $data["datos"]["tipo_afiliacion"]);
        }

        if ($data["datos"]["nivel_escolaridad"]) {
            $consulta->where("caracterizacion.nivel_escolaridad", $data["datos"]["nivel_escolaridad"]);
        }

        if ($data["datos"]["ocupacion"]) {
            $consulta->where("caracterizacion.ocupacion", $data["datos"]["ocupacion"]);
        }

        if ($data["datos"]["tipo_afiliacion"]) {
            $consulta->where("caracterizacion.tipo_afiliacion", $data["datos"]["tipo_afiliacion"]);
        }

        if ($data["datos"]["tipo_afiliacion"]) {
            $consulta->where("caracterizacion.tipo_afiliacion", $data["datos"]["tipo_afiliacion"]);
        }

        if ($data["datos"]["salariominimo"] && $data["datos"]["salariomaximo"]) {
            $consulta->whereRaw("replace(caracterizacion.salario,'.','')) between '" . $data["datos"]["salariominimo"] . "' AND '" . $data["datos"]["salariomaximo"] . "'");
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'integrantes.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'integrantes.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'integrantes.escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'integrantes.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'integrantes.id', 'integrantes.clasificacion')

            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.pape",
                "integrantes.tipo_id",
                "integrantes.sape",
                "integrantes.pnom",
                "integrantes.snom",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "etnias.descripcion AS textoEtnia",
                "clasificacion_etnia.clasificacion AS textoClasificacion",
                "dptos.descripcion AS DPTO",
                "muni.descripcion AS MUNI",
                "corregimientos.descripcion AS CORREGIMIENTO",
                "hogar.direccion AS DIRECCION",
                "veredas.descripcion as vereda",
                "barrios.barrio",
                "hogar.id_zona",
                "vivienda.id_hogar"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->selectRaw("'Integrante' as tipo, 'No aplica' as salario");

        if ($data["datos"]["id_dpto"] != null) {
            $consultai->where("hogar.id_dpto", $data["datos"]["id_dpto"]);
        }

        if ($data["datos"]["id_mun"] != null) {
            $consultai->where("hogar.id_mun", $data["datos"]["id_mun"]);
        }

        if ($data["datos"]["id_corre"] != null) {
            $consultai->where("hogar.id_corre", $data["datos"]["id_corre"]);
        }

        if ($data["datos"]["id_vereda"] != null) {
            $consultai->where("hogar.id_vereda", $data["datos"]["id_vereda"]);
        }

        if ($data["datos"]["id_zona"] != null) {
            $consultai->where("hogar.id_zona", $data["datos"]["id_zona"]);
        }

        if ($data["datos"]["id_barrio"] != null) {
            $consultai->where("hogar.id_barrio", $data["datos"]["id_barrio"]);
        }

        if ($data["datos"]["documento"]) {
            $consultai->where("integrantes.identificacion", $data["datos"]["documento"]);
        }

        if ($data["datos"]["sexo"]) {
            $consultai->where("integrantes.sexo", $data["datos"]["sexo"]);
        }

        if ($data["datos"]["estado_civil"]) {
            $consultai->where("integrantes.estado_civil", $data["datos"]["estado_civil"]);
        }

        if ($data["datos"]["afiliacion_entidad"]) {
            $consultai->where("integrantes.afi_entidad", $data["datos"]["afiliacion_entidad"]);
        }

        if ($data["datos"]["tipo_afiliacion"]) {
            $consultai->where("integrantes.tipo_afiliacion", $data["datos"]["tipo_afiliacion"]);
        }

        if ($data["datos"]["nivel_escolaridad"]) {
            $consultai->where("integrantes.escolaridad", $data["datos"]["nivel_escolaridad"]);
        }

        if ($data["datos"]["ocupacion"]) {
            $consultai->where("integrantes.ocupacion", $data["datos"]["ocupacion"]);
        }

        /*if($data["datos"]["tipo_afiliacion"]){
        $consultai->where("integrantes.tipo_afiliacion",$data["datos"]["tipo_afiliacion"]);
        }

        if($data["datos"]["tipo_afiliacion"]){
        $consultai->where("integrantes.tipo_afiliacion",$data["datos"]["tipo_afiliacion"]);
        }*/

        /*if($data["datos"]["salariominimo"] && $data["datos"]["salariomaximo"]){
        $consultai->whereRaw("replace(integrantes.salario,'.','')) between '".$data["datos"]["salariominimo"]."' AND '".$data["datos"]["salariomaximo"]."'");
        }*/

        $consulta->union($consultai);

        if ($tipo == "todos") {
            return $consulta->get();
        } else {
            return $consulta->paginate(10);
        }
    }

}
