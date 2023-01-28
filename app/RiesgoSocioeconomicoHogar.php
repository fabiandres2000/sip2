<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgoSocioeconomicoHogar extends Model
{
    protected $table = 'riesgo_socioeconomico_hogar';
    protected $fillable = [
        'id_hogar', 'id_jefe', 'cuenta_internet', 'tiene_pc_escritorio', 'tiene_pc_portatil',
        'cuantos_celulares', 'tiene_equipo_sonido', 'cuantos_tv_color', 'cuantos_vehiculos', 'nivel_instruccion',
        'afiliacion_salud_privada', 'ingresos_zona_rural', 'ingresos_ciudad', 'estratificacion_vivienda', 'estado', 'id_compania', 'total',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID JEFE
        $jefe = \App\Caracterizacion::buscar($data['id_jefe'], $alias);
        // BUSCAR ID JEFE
        return DB::connection('mysql')->table($alias . '.riesgo_socioeconomico_hogar')->updateOrInsert([
            'id_jefe' => $jefe->id,
        ], [
            'id_hogar' => $data['id_hogar'],
            'cuenta_internet' => $data['cuenta_internet'],
            'tiene_pc_escritorio' => $data['tiene_pc_escritorio'],
            'tiene_pc_portatil' => $data['tiene_pc_portatil'],
            'cuantos_celulares' => $data['cuantos_celulares'],
            'tiene_equipo_sonido' => $data['tiene_equipo_sonido'],
            'cuantos_tv_color' => $data['cuantos_tv_color'],
            'cuantos_vehiculos' => $data['cuantos_vehiculos'],
            'nivel_instruccion' => $data['nivel_instruccion'],
            'afiliacion_salud_privada' => $data['afiliacion_salud_privada'],
            'ingresos_zona_rural' => $data['ingresos_zona_rural'],
            'ingresos_ciudad' => $data['ingresos_ciudad'],
            'estratificacion_vivienda' => $data['estratificacion_vivienda'],
            'total' => $data['total'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.riesgo_socioeconomico_hogar')
            ->where('riesgo_socioeconomico_hogar.id_hogar', $id_hogar)
            ->where('riesgo_socioeconomico_hogar.estado', 'Activo')
            ->select('riesgo_socioeconomico_hogar.*')
            ->get();
    }
}
