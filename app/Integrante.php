<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table = 'integrantes';
    protected $fillable = [
        'id_hogar', 'tipo_id', 'identificacion', 'sexo', 'parentesco', 'pnom',
        'snon', 'pape', 'sape', 'estado_civil', 'fecha_nac', 'afi_entidad',
        'tipo_afiliacion', 'embarazo', 'embarazo_multiple', 'discapacidad', 'escolaridad', 'ocupacion',
        'colegio', 'grado', 'etnia', 'entiende', 'pyp', 'migrante',
        'id_compania', 'estado', 'clasificacion', 'puntaje_sisben', 'otra_eps',
        'jefe', 'orientacion', 'identidad_genero', 'telefono', 'perdida_peso', 'programa_icbf', 'identi_auxi', 'excepciones',
        'peso', 'talla','tipo_empleo','actividad_fisica','vacuna','lactante'
    ];
    public static function guardar($data, $alias)
    {

        $identi = $data['identificacion'];
        if ($data['tipo_id'] == "MSI" || $data['tipo_id'] == "ASI") {
            $count = DB::connection('mysql')->table($alias . '.integrantes')
                ->count();
            if ($count <= 0) {
                $identi = str_pad(1, 7, "0", STR_PAD_LEFT);
            } else {
                $resp = DB::connection('mysql')->table($alias . '.integrantes')
                    ->orderBy('id', 'desc')->first();
                $identi = str_pad(1 + $resp->identificacion, 7, "0", STR_PAD_LEFT);
            }
        }

        $jefe = \App\Caracterizacion::buscar($data['jefe'], $alias);
        return DB::connection('mysql')->table($alias . '.integrantes')->insertGetId([
            'id' => $data['id'],
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $identi,
            'sexo' => $data['sexo'],
            'parentesco' => $data['parentesco'],
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'estado_civil' => $data['estado_civil'],
            'fecha_nac' => $data['fecha_nac'],
            'afi_entidad' => $data['afi_entidad'],
            'otra_eps' => $data['otra_eps'],
            'tipo_afiliacion' => $data['tipo_afiliacion'],
            'embarazo' => $data['embarazo'],
            'embarazo_multiple' => $data['embarazo_multiple'],
            'discapacidad' => $data['discapacidad'],
            'escolaridad' => $data['escolaridad'],
            'ocupacion' => $data['ocupacion'],
            'colegio' => $data['colegio'],
            'grado' => $data['grado'],
            'etnia' => $data['etnia'],
            'entiende' => $data['entiende'],
            'pyp' => $data['pyp'],
            'migrante' => $data['migrante'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'clasificacion' => $data['clasificacion'],
            'puntaje_sisben' => $data['puntaje_sisben'],
            'jefe' => $jefe->id,
            'orientacion' => $data['orientacion'],
            'identidad_genero' => $data['identidad_genero'],
            'telefono' => $data['telefono'],
            'perdida_peso' => $data['perdida_peso'],
            'programa_icbf' => $data['programa_icbf'],
            'identi_auxi' => $data['identificacion'],
            'excepciones' => $data['excepciones'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'tipo_empleo' => $data['tipo_empleo'],
            'actividad_fisica' => $data['actividad_fisica'],
            'vacuna' => $data['vacuna'],
            'lactante' => $data['lactante'],
        ]);
    }

    public static function modificar($data, $alias, $id)
    {

        $identi = $data['identificacion'];
        if ($data['tipo_id'] == "MSI" || $data['tipo_id'] == "ASI") {
            $count = DB::connection('mysql')->table($alias . '.integrantes')
                ->count();
            if ($count <= 0) {
                $identi = str_pad(1, 7, "0", STR_PAD_LEFT);
            } else {
                $resp = DB::connection('mysql')->table($alias . '.integrantes')
                    ->orderBy('id', 'desc')->first();
                $identi = str_pad(1 + $resp->identificacion, 7, "0", STR_PAD_LEFT);
            }
        }

        $jefe = \App\Caracterizacion::buscar($data['jefe'], $alias);
        return DB::connection('mysql')->table($alias . '.integrantes')->where('id', $id)->update([
            'id' => $data['id'],
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $identi,
            'sexo' => $data['sexo'],
            'parentesco' => $data['parentesco'],
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'estado_civil' => $data['estado_civil'],
            'fecha_nac' => $data['fecha_nac'],
            'afi_entidad' => $data['afi_entidad'],
            'otra_eps' => $data['otra_eps'],
            'tipo_afiliacion' => $data['tipo_afiliacion'],
            'embarazo' => $data['embarazo'],
            'embarazo_multiple' => $data['embarazo_multiple'],
            'discapacidad' => $data['discapacidad'],
            'escolaridad' => $data['escolaridad'],
            'ocupacion' => $data['ocupacion'],
            'colegio' => $data['colegio'],
            'grado' => $data['grado'],
            'etnia' => $data['etnia'],
            'entiende' => $data['entiende'],
            'pyp' => $data['pyp'],
            'migrante' => $data['migrante'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'clasificacion' => $data['clasificacion'],
            'puntaje_sisben' => $data['puntaje_sisben'],
            'jefe' => $jefe->id,
            'orientacion' => $data['orientacion'],
            'identidad_genero' => $data['identidad_genero'],
            'telefono' => $data['telefono'],
            'perdida_peso' => $data['perdida_peso'],
            'programa_icbf' => $data['programa_icbf'],
            'identi_auxi' => $data['identificacion'],
            'excepciones' => $data['excepciones'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'tipo_empleo' => $data['tipo_empleo'],
            'actividad_fisica' => $data['actividad_fisica'],
            'vacuna' => $data['vacuna'],
            'lactante' => $data['lactante'],
        ]);
    }

    public static function verificar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('identificacion', $identificacion)
            ->where('estado', 'Activo')
            ->count();
    }

    public static function exportar($id, $alias)
    {
        $respuesta = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'integrantes.jefe')
            ->where('integrantes.id_hogar', $id)
            ->select("integrantes.sexo",
                "integrantes.identificacion",
                "integrantes.tipo_id",
                "parentescos.descripcion as PARENT",
                "integrantes.id"

            )
            ->selectRaw('CONCAT_WS(" ",caracterizacion.pnom," ",caracterizacion.snom," ",caracterizacion.pape," ",caracterizacion.sape) AS JEFE')
            ->selectRaw('CONCAT_WS(" ",integrantes.pnom," ",integrantes.snom," ",integrantes.pape," ",integrantes.sape) AS INTEGRANTE')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->orderBy("JEFE")
            ->get();
        return $respuesta;
    }

    public static function buscar($identificacion, $alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('identi_auxi', $identificacion)
            ->orderBy('id', 'desc')
            ->first();
    }

    public static function buscarIntegrantes($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'integrantes.jefe')
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'integrantes.colegio')

            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'integrantes.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'integrantes.escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'integrantes.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'integrantes.clasificacion')

            ->where('integrantes.id_hogar', $id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.*",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "caracterizacion.identificacion AS jefe",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoEscolaridad",
                "etnias.descripcion AS textoEtnia",
                "clasificacion_etnia.clasificacion AS textoClasificacion"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("CASE "
                . " WHEN integrantes.snom IS NULL THEN '' "
                . " WHEN integrantes.snom = '' THEN '' "
                . " ELSE integrantes.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN integrantes.sape IS NULL THEN '' "
                . " WHEN integrantes.sape = '' THEN '' "
                . " ELSE integrantes.sape "
                . " END sape"
                . " ")
            ->selectRaw("CASE "
                . " WHEN integrantes.excepciones IS NULL THEN '' "
                . " WHEN integrantes.excepciones = '' THEN '' "
                . " WHEN integrantes.excepciones = '1' THEN 'Vida sexual prematura' "
                . " WHEN integrantes.excepciones = '2' THEN 'Consumo de tabaco' "
                . " WHEN integrantes.excepciones = '3' THEN 'Consumo de SPA' "
                . " WHEN integrantes.excepciones = '4' THEN 'Consumo de alcohol' "
                . " WHEN integrantes.excepciones = 'NA' THEN 'NO APLICA' "
                . " ELSE integrantes.excepciones "
                . " END textoExcepciones"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->orderBy("integrantes.id", "ASC")
            ->get();
    }

    public static function total($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->where('estado', 'Activo')
            ->count();
    }

    public static function totalIntegrantes($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('integrantes.id_hogar', $id_hogar)
            ->where('estado', 'Activo')
            ->count();
    }    
    public static function totalIntegrantesDescolarizados($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('integrantes.id_hogar', $id_hogar)
            ->where('estado', 'Activo')
            ->select('integrantes.*')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->whereRaw('(escolaridad = 1 OR escolaridad = 4 OR escolaridad = 12 OR escolaridad = 13)')
            ->get();
    }
    public static function adolEmba($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->where('estado', 'Activo')
            ->where('embarazo', 'SI')
            ->havingRaw("edad>= 12 AND edad<=17")
            ->get();
    }

    public static function adulCron($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.de60', 'de60.id_integrante', 'integrantes.id')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->where('integrantes.estado', 'Activo')
            ->where('enfermedades_cronicas', 'SI')
            ->havingRaw("edad>= 60")
            ->get();
    }

    public static function adulInfec($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.de60', 'de60.id_integrante', 'integrantes.id')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->where('integrantes.estado', 'Activo')
            ->where('enfermedades_infecciosas', 'SI')
            ->havingRaw("edad>= 60")
            ->get();
    }

    public static function gestantes($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->where('integrantes.estado', 'Activo')
            ->where('embarazo', 'SI')
            ->get();
    }

    public static function inmigrantes($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->where('integrantes.estado', 'Activo')
            ->where('migrante', 'SI')
            ->get();
    }

    public static function desempleado($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->where('integrantes.estado', 'Activo')
            ->where('ocupaciones.id', '9992')
            ->get();
    }

    public static function indigenas($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->where('integrantes.estado', 'Activo')
            ->where('etnia', '4')
            ->get();
    }

    public static function analfabetas($alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.escolaridad', 'escolaridad.id', 'integrantes.escolaridad')
            ->where('integrantes.estado', 'Activo')
            ->where('escolaridad.id', '13')
            ->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.integrantes')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }
}
