<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Estratificacion extends Model
{
    protected $table = 'estratificacion';
    protected $fillable = [
        'id_hogar', 'id_jefe', 'cuenta_internet', 'tiene_pc_escritorio',
        'tiene_pc_portatil', 'cuantos_celulares', 'tiene_equipo_sonido',
        'cuantos_tv_color', 'cuantos_vehiculos', 'nivel_instruccion',
        'afiliacion_salud_privada', 'ingresos_zona_rural', 'ingresos_ciudad',
        'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        $jefe = \App\Caracterizacion::buscar($data['id_jefe'], $alias);
        return DB::connection('mysql')->table($alias . '.estratificacion')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_jefe' => $jefe->id,
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
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.estratificacion')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'estratificacion.id_jefe')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'estratificacion.nivel_instruccion')
            ->where('estratificacion.id_hogar', $id_hogar)
            ->where('estratificacion.estado', 'Activo')
            ->select("estratificacion.*", "caracterizacion.identificacion AS id_jefe", "escolaridad.descripcion AS texto_nivel_instruccion", )
            ->selectRaw("CASE "
                . " WHEN estratificacion.cuantos_celulares IS NULL THEN '' "
                . " WHEN estratificacion.cuantos_celulares='1' THEN 'Ninguno' "
                . " WHEN estratificacion.cuantos_celulares='2' THEN '1 Celular' "
                . " WHEN estratificacion.cuantos_celulares='3' THEN '2 Celulares' "
                . " WHEN estratificacion.cuantos_celulares='4' THEN 'Tiene 3 Celulares' "
                . " WHEN estratificacion.cuantos_celulares='5' THEN 'Tiene 4 o mas Celulares' "
                . " ELSE estratificacion.cuantos_celulares "
                . " END AS texto_cuantos_celulares"
                . " ")
            ->selectRaw("CASE "
                . " WHEN estratificacion.cuantos_tv_color IS NULL THEN '' "
                . " WHEN estratificacion.cuantos_tv_color='1' THEN 'No Tiene' "
                . " WHEN estratificacion.cuantos_tv_color='2' THEN '1 Tv' "
                . " WHEN estratificacion.cuantos_tv_color='3' THEN '2 Tv' "
                . " WHEN estratificacion.cuantos_tv_color='4' THEN '3 o mas tv' "
                . " ELSE estratificacion.cuantos_tv_color "
                . " END AS texto_cuantos_tv_color"
                . " ")

            ->selectRaw("CASE "
                . " WHEN estratificacion.cuantos_vehiculos IS NULL THEN '' "
                . " WHEN estratificacion.cuantos_vehiculos='1' THEN 'No tene Vehiculos' "
                . " WHEN estratificacion.cuantos_vehiculos='2' THEN '1 Vehiculo' "
                . " WHEN estratificacion.cuantos_vehiculos='3' THEN '2 Vehiculos' "
                . " WHEN estratificacion.cuantos_vehiculos='4' THEN '3 o mas Vehiculos' "
                . " ELSE estratificacion.cuantos_vehiculos "
                . " END AS texto_cuantos_vehiculos"
                . " ")
            ->selectRaw("CASE "
                . " WHEN estratificacion.ingresos_zona_rural IS NULL THEN '' "
                . " WHEN estratificacion.ingresos_zona_rural='1' THEN 'Entre $0  y $500.000 pesos' "
                . " WHEN estratificacion.ingresos_zona_rural='2' THEN 'Entre $500.001 Y $1.100.000 pesos' "
                . " WHEN estratificacion.ingresos_zona_rural='3' THEN 'Entre $1.100.001 a $2.069.000' "
                . " WHEN estratificacion.ingresos_zona_rural='4' THEN 'Entre $2.070.000 y $3.269.000' "
                . " WHEN estratificacion.ingresos_zona_rural='5' THEN 'Entre $3.270.000 y $4.780.000' "
                . " WHEN estratificacion.ingresos_zona_rural='6' THEN 'Entre $4,780.001 y $5.150.000' "
                . " WHEN estratificacion.ingresos_zona_rural='7' THEN 'Más de $5.150.000' "
                . " WHEN estratificacion.ingresos_zona_rural='8' THEN 'No aplica' "
                . " ELSE estratificacion.ingresos_zona_rural "
                . " END AS texto_ingresos_zona_rural"
                . " ")
            ->selectRaw("CASE "
                . " WHEN estratificacion.ingresos_ciudad IS NULL THEN '' "
                . " WHEN estratificacion.ingresos_ciudad='1' THEN 'Entre $ 0 y $ 980.000' "
                . " WHEN estratificacion.ingresos_ciudad='2' THEN 'Entre $981.000  y $ 1.890.000' "
                . " WHEN estratificacion.ingresos_ciudad='3' THEN 'Entre $1.890,001  y $3.305.000' "
                . " WHEN estratificacion.ingresos_ciudad='4' THEN 'Entre $ 3.305.001  y  $ 5.050.000' "
                . " WHEN estratificacion.ingresos_ciudad='5' THEN 'Entre $ 5.050.001 y  $ 7.650.000' "
                . " WHEN estratificacion.ingresos_ciudad='6' THEN 'Entre $ 7.650.001 y $ 10.170.000' "
                . " WHEN estratificacion.ingresos_ciudad='7' THEN 'Mas de $ 10.170.001' "
                . " WHEN estratificacion.ingresos_ciudad='8' THEN 'No aplica' "
                . " ELSE estratificacion.ingresos_ciudad "
                . " END AS texto_ingresos_ciudad"
                . " ")
            ->get();
    }
}
