<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Afectacion extends Model
{
    protected $table = 'afectacion';
    protected $fillable = [
        'id_hogar', 'id_jefe', 'presentado', 'prueba', 'afectado',
        'nivel', 'porcentaje', 'perdida', 'sobrelleva', 'percibe',
        'principal', 'tiempo', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID JEFE
        $jefe = \App\Caracterizacion::buscar($data['identificacion'], $alias);
        // BUSCAR ID JEFE
        $data['id_jefe'] = $jefe->id;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.afectacion')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_jefe' => $data['id_jefe'],
            'presentado' => $data['presentado'],
            'prueba' => $data['prueba'],
            'afectado' => $data['afectado'],
            'nivel' => $data['nivel'],
            'porcentaje' => $data['porcentaje'],
            'perdida' => $data['perdida'],
            'sobrelleva' => $data['sobrelleva'],
            'percibe' => $data['percibe'],
            'principal' => $data['principal'],
            'tiempo' => $data['tiempo'],
            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }
    public static function buscar($alias, $id_hogar)
    {
        $afe1 = DB::connection('mysql')->table($alias . '.afectacion')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'afectacion.id_jefe')
            ->where('afectacion.id_hogar', $id_hogar)
            ->where('afectacion.estado', 'Activo')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->selectRaw("IFNULL(afectacion.id,'0') AS id")
            ->selectRaw("IFNULL(afectacion.id_jefe,'') AS id_jefe")
            ->selectRaw("IFNULL(afectacion.presentado,'') AS presentado")
            ->selectRaw("IFNULL(afectacion.prueba,'') AS prueba")
            ->selectRaw("IFNULL(afectacion.afectado,'') AS afectado")
            ->selectRaw("IFNULL(afectacion.nivel,'') AS nivel")
            ->selectRaw("IFNULL(afectacion.porcentaje,'') AS porcentaje")
            ->selectRaw("IFNULL(afectacion.perdida,'') AS perdida")
            ->selectRaw("IFNULL(afectacion.sobrelleva,'') AS sobrelleva")
            ->selectRaw("IFNULL(afectacion.percibe,'') AS percibe")
            ->selectRaw("IFNULL(afectacion.principal,'') AS principal")
            ->selectRaw("IFNULL(afectacion.tiempo,'') AS tiempo")
            ->selectRaw("IFNULL(afectacion.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(afectacion.id_compania,'1') AS id_compania");

        $afe2 = DB::connection('mysql')->table($alias . '.afectacion')
            ->rightjoin($alias . '.caracterizacion', 'caracterizacion.id', 'afectacion.id_jefe')
            ->where('caracterizacion.id_hogar', $id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->whereRaw('afectacion.id_hogar IS NULL')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->selectRaw("IFNULL(afectacion.id,'0') AS id")
            ->selectRaw("IFNULL(afectacion.id_jefe,'') AS id_jefe")
            ->selectRaw("IFNULL(afectacion.presentado,'') AS presentado")
            ->selectRaw("IFNULL(afectacion.prueba,'') AS prueba")
            ->selectRaw("IFNULL(afectacion.afectado,'') AS afectado")
            ->selectRaw("IFNULL(afectacion.nivel,'') AS nivel")
            ->selectRaw("IFNULL(afectacion.porcentaje,'') AS porcentaje")
            ->selectRaw("IFNULL(afectacion.perdida,'') AS perdida")
            ->selectRaw("IFNULL(afectacion.sobrelleva,'') AS sobrelleva")
            ->selectRaw("IFNULL(afectacion.percibe,'') AS percibe")
            ->selectRaw("IFNULL(afectacion.principal,'') AS principal")
            ->selectRaw("IFNULL(afectacion.tiempo,'') AS tiempo")
            ->selectRaw("IFNULL(afectacion.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(afectacion.id_compania,'1') AS id_compania");

        return $afe1->union($afe2)->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.afectacion')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }
}
