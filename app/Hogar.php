<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Hogar extends Model
{
    protected $table = 'hogar';
    protected $fillable = [
        'id_dpto', 'id_mun', 'id_corre', 'id_vereda', 'id_barrio', 'id_zona',
        'tenencia_vivienda', 'numero_hogares', 'poblacion_especial', 'vias_acceso',
        'servicios_publicos', 'direccion', 'id_compania', 'estado', 
        'fecha','usuario_crear', 'fecha_editar', 'usuario_editar',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.hogar')->insertGetId([
            'id' => $data['id'],
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'id_zona' => $data['id_zona'],
            'tenencia_vivienda' => $data['tenencia_vivienda'],
            'numero_hogares' => $data['numero_hogares'],
            'poblacion_especial' => $data['poblacion_especial'],
            'vias_acceso' => $data['vias_acceso'],
            'servicios_publicos' => $data['servicios_publicos'],
            'direccion' => $data['direccion'],
            'id_compania' => 1,
            'estado' => 'Activo',
            'fecha' => date('Y-m-d'),
            'usuario_crear' => Auth::user()->id,
            'fecha_editar' => '',
            'usuario_editar' => '',
        ]);
    }
    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.hogar')
            ->where('id', $id_hogar)
            ->where('estado', 'Activo')
            ->first();
    }

    public static function total($alias)
    {
        return DB::connection('mysql')->table($alias . '.hogar')
            ->where('estado', 'Activo')
            ->count();
    }

    public static function modificar($data, $alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.hogar')->where('id', $id)->update([
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'id_zona' => $data['id_zona'],
            'tenencia_vivienda' => $data['tenencia_vivienda'],
            'numero_hogares' => $data['numero_hogares'],
            'poblacion_especial' => $data['poblacion_especial'],
            'vias_acceso' => $data['vias_acceso'],
            'servicios_publicos' => $data['servicios_publicos'],
            'direccion' => $data['direccion'],
            'id_compania' => 1,
            'estado' => 'Activo',
            'fecha_editar' => date('Y-m-d'),
            'usuario_editar' => Auth::user()->id,
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.hogar')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }    
}
