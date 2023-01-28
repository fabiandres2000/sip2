<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    protected $table = 'instalaciones';
    protected $fillable = [
        'id_unidad', 'instalacion', 'cuantos', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.instalaciones')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_unidad' => $data['id_unidad'],
            'instalacion' => $data['instalacion'],
            'cuantos' => $data['cuantos'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_unidad)
    {
        return DB::connection('mysql')->table($alias . '.instalaciones')
            ->where('instalaciones.id_unidad', $id_unidad)
            ->where('instalaciones.estado', 'Activo')
            ->get();
    }
}
