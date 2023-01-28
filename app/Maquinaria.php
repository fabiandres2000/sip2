<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $table = 'maquinaria';
    protected $fillable = [
        'id_unidad', 'maquina', 'cuantos', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.maquinaria')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_unidad' => $data['id_unidad'],
            'maquina' => $data['maquina'],
            'cuantos' => $data['cuantos'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_unidad)
    {
        return DB::connection('mysql')->table($alias . '.maquinaria')
            ->where('maquinaria.id_unidad', $id_unidad)
            ->where('maquinaria.estado', 'Activo')
            ->get();
    }
}
