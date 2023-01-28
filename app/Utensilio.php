<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Utensilio extends Model
{
    protected $table = 'utensilios';
    protected $fillable = [
        'id_unidad', 'utensilio', 'cuantos', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.utensilios')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_unidad' => $data['id_unidad'],
            'utensilio' => $data['utensilio'],
            'cuantos' => $data['cuantos'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_unidad)
    {
        return DB::connection('mysql')->table($alias . '.utensilios')
            ->where('utensilios.id_unidad', $id_unidad)
            ->where('utensilios.estado', 'Activo')
            ->get();
    }
}
