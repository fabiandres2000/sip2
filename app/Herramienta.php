<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    protected $table = 'herramientas';
    protected $fillable = [
        'id_unidad', 'herramienta', 'cuantos', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.herramientas')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_unidad' => $data['id_unidad'],
            'herramienta' => $data['herramienta'],
            'cuantos' => $data['cuantos'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_unidad)
    {
        return DB::connection('mysql')->table($alias . '.herramientas')
            ->where('herramientas.id_unidad', $id_unidad)
            ->where('herramientas.estado', 'Activo')
            ->get();
    }
}
