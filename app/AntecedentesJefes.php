<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class AntecedentesJefes extends Model
{
    protected $table = 'antecedentes_jefes';
    protected $fillable = [
        'id_jefe',
        'id_hogar',
        'id_antecedente',
        'estado',
        'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.antecedentes_jefes')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_jefe' => $data['id_jefe'],
            'id_hogar' => $data['id_hogar'],
            'id_antecedente' => $data['id_antecedente'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function buscar($alias, $id_jefe)
    {
        $ant = DB::connection('mysql')->table($alias . '.antecedentes_jefes')
            ->join($alias . '.antecedentes', 'antecedentes.id', 'antecedentes_jefes.id_antecedente')
            ->where('antecedentes_jefes.id_jefe', $id_jefe)
            ->where('antecedentes_jefes.estado', 'Activo')
            ->select("antecedentes_jefes.*", "antecedentes.descripcion AS textoAntecedente");

        return $ant->get();

    }
}
