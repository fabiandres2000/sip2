<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Men1a extends Model
{
    protected $table = 'men1a';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'lugar_nacimiento', 'hemoclasificacion', 'compli_parto', 'via_parto',
        'cyc', 'valoracion_23', 'valoracion_68', 'valoracion_911', 'lactancia', 'peso_nacer',
        'peso_actual', 'longitud_nacer', 'longitud_actual', 'peso_long', 'cinta', 'edemas',
        'lenguaje', 'motora', 'conducta', 'visuales', 'auditivos', 'carnet',
        'bcg', 'hepb', 'polio','pentavalente', 'maltrato', 'morbilidad',
        'tsh', 'estado', 'id_compania', 'opci', 'pb', 'desviacion_imc', 'rotaviruz', 'neumococo', 'influenza', 'varicela', 'imc','te'
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.men1a')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_integrante' => $integrante->id,
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $integrante->identificacion,
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'sexo' => $data['sexo'],
            'lugar_nacimiento' => $data['lugar_nacimiento'],
            'hemoclasificacion' => $data['hemoclasificacion'],
            'compli_parto' => $data['compli_parto'],
            'via_parto' => $data['via_parto'],
            'cyc' => $data['cyc'],
            'valoracion_23' => $data['valoracion_23'],
            'valoracion_68' => $data['valoracion_68'],
            'valoracion_911' => $data['valoracion_911'],
            'lactancia' => $data['lactancia'],
            'peso_nacer' => $data['peso_nacer'],
            'peso_actual' => $data['peso_actual'],
            'longitud_nacer' => $data['longitud_nacer'],
            'longitud_actual' => $data['longitud_actual'],
            'peso_long' => $data['peso_long'],
            'cinta' => $data['cinta'],
            'edemas' => $data['edemas'],
            'lenguaje' => $data['lenguaje'],
            'motora' => $data['motora'],
            'conducta' => $data['conducta'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'carnet' => $data['carnet'],
            'bcg' => $data['bcg'],
            'hepb' => $data['hepb'],
            'polio' => $data['polio'],
            'pentavalente' => $data['pentavalente'],
            'maltrato' => $data['maltrato'],
            'morbilidad' => $data['morbilidad'],
            'tsh' => $data['tsh'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'pb' => $data['pb'],
            'desviacion_imc' => $data['desviacion_imc'],
            'rotaviruz' => $data['rotaviruz'],
            'neumococo' => $data['neumococo'],
            'influenza' => $data['influenza'],
            'varicela' => $data['varicela'],
            'imc' => $data['imc'],
            'te' => $data['te'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {

        $men1a = DB::connection('mysql')->table($alias . '.men1a')
            ->join($alias . '.integrantes', 'integrantes.id', 'men1a.id_integrante')
            ->where('men1a.id_hogar', $id_hogar)
            ->where('men1a.estado', 'Activo')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso_actual"
                , "integrantes.talla AS longitud_actual"
                , "men1a.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(men1a.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(men1a.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(men1a.id,0) AS id")
            ->selectRaw("IFNULL(men1a.lugar_nacimiento,'') AS lugar_nacimiento")
            ->selectRaw("IFNULL(men1a.hemoclasificacion,'') AS hemoclasificacion")
            ->selectRaw("IFNULL(men1a.compli_parto,'') AS compli_parto")
            ->selectRaw("IFNULL(men1a.via_parto,'') AS via_parto")
            ->selectRaw("IFNULL(men1a.cyc,'') AS cyc")
            ->selectRaw("IFNULL(men1a.valoracion_23,'') AS valoracion_23")
            ->selectRaw("IFNULL(men1a.valoracion_68,'') AS valoracion_68")
            ->selectRaw("IFNULL(men1a.valoracion_911,'') AS valoracion_911")
            ->selectRaw("IFNULL(men1a.lactancia,'') AS lactancia")
            ->selectRaw("IFNULL(men1a.peso_nacer,'') AS peso_nacer")
            ->selectRaw("IFNULL(men1a.longitud_nacer,'') AS longitud_nacer")
            ->selectRaw("IFNULL(men1a.peso_long,'') AS peso_long")
            ->selectRaw("IFNULL(men1a.cinta,'') AS cinta")
            ->selectRaw("IFNULL(men1a.edemas,'') AS edemas")
            ->selectRaw("IFNULL(men1a.lenguaje,'') AS lenguaje")
            ->selectRaw("IFNULL(men1a.motora,'') AS motora")
            ->selectRaw("IFNULL(men1a.conducta,'') AS conducta")
            ->selectRaw("IFNULL(men1a.visuales,'') AS visuales")
            ->selectRaw("IFNULL(men1a.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(men1a.carnet,'') AS carnet")
            ->selectRaw("IFNULL(men1a.bcg,'') AS bcg")
            ->selectRaw("IFNULL(men1a.hepb,'') AS hepb")
            ->selectRaw("IFNULL(men1a.polio,'') AS polio")
            ->selectRaw("IFNULL(men1a.pentavalente,'') AS pentavalente")
            ->selectRaw("IFNULL(men1a.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(men1a.morbilidad,'') AS morbilidad")
            ->selectRaw("IFNULL(men1a.tsh,'') AS tsh")
            ->selectRaw("IFNULL(men1a.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(men1a.pb,'') AS pb")
            ->selectRaw("IFNULL(men1a.rotaviruz,'') AS rotaviruz")
            ->selectRaw("IFNULL(men1a.neumococo,'') AS neumococo")
            ->selectRaw("IFNULL(men1a.influenza,'') AS influenza")
            ->selectRaw("IFNULL(men1a.varicela,'') AS varicela");

        return $men1a->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.men1a')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarUnico($alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.men1a')
            ->where('id', $id)
            ->where('estado', 'Activo')
            ->first();
    }

    public static function buscarPorIdentificacion($alias, $dentificacion)
    {

        $men1a = DB::connection('mysql')->table($alias . '.men1a')
            ->join($alias . '.integrantes', 'integrantes.id', 'men1a.id_integrante')
            ->where('integrantes.identificacion', $dentificacion)
            ->where('men1a.estado', 'Activo')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso_actual"
                , "integrantes.talla AS longitud_actual"
                , "men1a.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(men1a.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(men1a.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(men1a.id,0) AS id")
            ->selectRaw("IFNULL(men1a.lugar_nacimiento,'') AS lugar_nacimiento")
            ->selectRaw("IFNULL(men1a.hemoclasificacion,'') AS hemoclasificacion")
            ->selectRaw("IFNULL(men1a.compli_parto,'') AS compli_parto")
            ->selectRaw("IFNULL(men1a.via_parto,'') AS via_parto")
            ->selectRaw("IFNULL(men1a.cyc,'') AS cyc")
            ->selectRaw("IFNULL(men1a.valoracion_23,'') AS valoracion_23")
            ->selectRaw("IFNULL(men1a.valoracion_68,'') AS valoracion_68")
            ->selectRaw("IFNULL(men1a.valoracion_911,'') AS valoracion_911")
            ->selectRaw("IFNULL(men1a.lactancia,'') AS lactancia")
            ->selectRaw("IFNULL(men1a.peso_nacer,'') AS peso_nacer")
            ->selectRaw("IFNULL(men1a.longitud_nacer,'') AS longitud_nacer")
            ->selectRaw("IFNULL(men1a.peso_long,'') AS peso_long")
            ->selectRaw("IFNULL(men1a.cinta,'') AS cinta")
            ->selectRaw("IFNULL(men1a.edemas,'') AS edemas")
            ->selectRaw("IFNULL(men1a.lenguaje,'') AS lenguaje")
            ->selectRaw("IFNULL(men1a.motora,'') AS motora")
            ->selectRaw("IFNULL(men1a.conducta,'') AS conducta")
            ->selectRaw("IFNULL(men1a.visuales,'') AS visuales")
            ->selectRaw("IFNULL(men1a.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(men1a.carnet,'') AS carnet")
            ->selectRaw("IFNULL(men1a.bcg,'') AS bcg")
            ->selectRaw("IFNULL(men1a.hepb,'') AS hepb")
            ->selectRaw("IFNULL(men1a.polio,'') AS polio")
            ->selectRaw("IFNULL(men1a.pentavalente,'') AS pentavalente")
            ->selectRaw("IFNULL(men1a.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(men1a.morbilidad,'') AS morbilidad")
            ->selectRaw("IFNULL(men1a.tsh,'') AS tsh")
            ->selectRaw("IFNULL(men1a.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(men1a.pb,'') AS pb")
            ->selectRaw("IFNULL(men1a.rotaviruz,'') AS rotaviruz")
            ->selectRaw("IFNULL(men1a.neumococo,'') AS neumococo")
            ->selectRaw("IFNULL(men1a.influenza,'') AS influenza")
            ->selectRaw("IFNULL(men1a.varicela,'') AS varicela");

        return $men1a->first();
    }    
}
