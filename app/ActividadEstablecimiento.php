<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ActividadEstablecimiento extends Model
{
    protected $table = 'actividad_establecimientos';
    protected $fillable = [
        'id_establecimiento',
        'id_actividad',
        'estado',
        'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.actividad_establecimientos')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_establecimiento' => $data['id_establecimiento'],
            'id_actividad' => $data['id_actividad'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function buscar($alias, $id_establecimiento)
    {
        return DB::connection('mysql')->table($alias . '.actividad_establecimientos')
            ->leftjoin($alias . '.actividades_economicas', 'actividades_economicas.id', 'actividad_establecimientos.id_actividad')
            ->where('actividad_establecimientos.id_establecimiento', $id_establecimiento)
            ->where('actividad_establecimientos.estado', 'Activo')
            ->select("actividad_establecimientos.*", "actividades_economicas.descripcion AS actividad")
            ->get();
    }
}
