<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class MedioTransporte extends Model
{
    protected $table = 'medios_transporte';
    protected $fillable = [
        'id_unidad', 'medio', 'cuantos', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.medios_transporte')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_unidad' => $data['id_unidad'],
            'medio' => $data['medio'],
            'cuantos' => $data['cuantos'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_unidad)
    {
        return DB::connection('mysql')->table($alias . '.medios_transporte')
            ->where('medios_transporte.id_unidad', $id_unidad)
            ->where('medios_transporte.estado', 'Activo')
            ->get();
    }
}
