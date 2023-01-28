<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ActividadVivienda extends Model
{
    protected $table = 'actividad_viviendas';
    protected $fillable = [
        'id_hogar',
        'id_actividad',
        'estado',
        'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.actividad_viviendas')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_actividad' => $data['id_actividad'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.actividad_viviendas')
            ->leftjoin($alias . '.actividades_economicas', 'actividades_economicas.id', 'actividad_viviendas.id_actividad')
            ->where('actividad_viviendas.id_hogar', $id_hogar)
            ->where('actividad_viviendas.estado', 'Activo')
            ->select("actividad_viviendas.*", "actividades_economicas.descripcion AS actividad")
            ->get();
    }
}
