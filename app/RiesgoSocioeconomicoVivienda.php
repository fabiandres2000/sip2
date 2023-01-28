<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgoSocioeconomicoVivienda extends Model
{
    protected $table = 'riesgo_socioeconomico_vivienda';
    protected $fillable = [
        'id_hogar', 'via_de_acceso', 'fachada_de_la_casa', 'tipo_vivienda', 'material_predominante_paredes',
        'tipo_cubierta', 'material_predominante_piso', 'cuantos_baños', 'excretas', 'estado_conservacion_baños',
        'acabados_externos', 'estado_conservacion_estructuras', 'mobiliario_cocina', 'energia_electrica', 'gas_natural',
        'acueducto', 'alcantarillado', 'aseo', 'telefono_fijo', 'internet_subsidiado',
        'internet_privado', 'tenencia_vivienda', 'andenes', 'estado', 'id_compania', 'total',
    ];

    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.riesgo_socioeconomico_vivienda')->updateOrInsert([
            'id_hogar' => $data['id_hogar'],
        ], [
            'via_de_acceso' => $data['via_de_acceso'],
            'fachada_de_la_casa' => $data['fachada_de_la_casa'],
            'tipo_vivienda' => $data['tipo_vivienda'],
            'material_predominante_paredes' => $data['material_predominante_paredes'],
            'tipo_cubierta' => $data['tipo_cubierta'],
            'material_predominante_piso' => $data['material_predominante_piso'],
            'cuantos_baños' => $data['cuantos_baños'],
            'excretas' => $data['excretas'],
            'estado_conservacion_baños' => $data['estado_conservacion_baños'],
            'acabados_externos' => $data['acabados_externos'],
            'estado_conservacion_estructuras' => $data['estado_conservacion_estructuras'],
            'mobiliario_cocina' => $data['mobiliario_cocina'],
            'energia_electrica' => $data['energia_electrica'],
            'gas_natural' => $data['gas_natural'],
            'acueducto' => $data['acueducto'],
            'alcantarillado' => $data['alcantarillado'],
            'aseo' => $data['aseo'],
            'telefono_fijo' => $data['telefono_fijo'],
            'internet_subsidiado' => $data['internet_subsidiado'],
            'internet_privado' => $data['internet_privado'],
            'tenencia_vivienda' => $data['tenencia_vivienda'],
            'andenes' => $data['andenes'],
            'total' => $data['total'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.riesgo_socioeconomico_vivienda')
            ->where('riesgo_socioeconomico_vivienda.id_hogar', $id_hogar)
            ->where('riesgo_socioeconomico_vivienda.estado', 'Activo')
            ->select('riesgo_socioeconomico_vivienda.*')
            ->get();
    }
}
