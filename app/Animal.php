<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animales';
    protected $fillable = [
        'id_hogar', 'animal', 'cuantos', 'vacunados', 'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.animales')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'animal' => $data['animal'],
            'cuantos' => $data['cuantos'],
            'vacunados' => $data['vacunados'],
            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.animales')
            ->where('animales.id_hogar', $id_hogar)
            ->where('animales.estado', 'Activo')
            ->get();
    }

    public static function buscarVacunados($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.animales')
            ->where('animales.id_hogar', $id_hogar)
            ->where('animales.vacunados', "NO")
            ->where('animales.estado', 'Activo')
            ->get();
    }    
}
