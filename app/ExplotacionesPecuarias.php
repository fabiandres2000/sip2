<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ExplotacionesPecuarias extends Model
{
    protected $table = 'explotaciones_pecuarias';
    protected $fillable = [
        'id_unidad', 'importancia_comercial', 'raza', 'costo_total', 'costo_establecer', 'costo_pecuaria',
        'problematica_productos', 'otra_problematica', 'produccion', 'numero_animales', 'area_destinada_produccion',
        'unidad_area_destinada', 'compradores_pecuaria', 'precio_promedio_venta_pecuaria', 'metodo_pago_pecuaria', 'subproductos_produccion_pecuaria',
        'pertenece_pecuaria', 'nombre_programa_pecuaria', 'entidad_pecuaria', 'pertenece_organizacion_pecuaria', 'tipo_organizacion_pecuaria',
        'nombre_organizacion_pecuaria', 'beneficios_pecuaria', 'no_pertenece_pecuaria', 'trabaja_asociacion_pecuaria', 'producto_comercial',
        'produccion_destinada_pecuaria', 'estado', 'id_compania','unidad_producion_destinada_pecuaria'
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.explotaciones_pecuarias')->updateOrInsert([
            'id' => $data['id'],
        ], [

            'id_unidad' => $data['id_unidad'],

            'importancia_comercial' => $data['importancia_comercial'],
            'raza' => $data['raza'],
            'costo_total' => $data['costo_total'],
            'costo_establecer' => $data['costo_establecer'],
            'costo_pecuaria' => $data['costo_pecuaria'],
            'problematica_productos' => $data['problematica_productos'],
            'otra_problematica' => "" . $data['otra_problematica'],
            'produccion' => $data['produccion'],
            'numero_animales' => $data['numero_animales'],
            'area_destinada_produccion' => $data['area_destinada_produccion'],

            'unidad_area_destinada' => $data['unidad_area_destinada'],
            'compradores_pecuaria' => $data['compradores_pecuaria'],
            'precio_promedio_venta_pecuaria' => $data['precio_promedio_venta_pecuaria'],
            'metodo_pago_pecuaria' => $data['metodo_pago_pecuaria'],
            'subproductos_produccion_pecuaria' => $data['subproductos_produccion_pecuaria'],
            'pertenece_pecuaria' => $data['pertenece_pecuaria'],
            'nombre_programa_pecuaria' => "" . $data['nombre_programa_pecuaria'],
            'entidad_pecuaria' => "" . $data['entidad_pecuaria'],
            'pertenece_organizacion_pecuaria' => $data['pertenece_organizacion_pecuaria'],
            'tipo_organizacion_pecuaria' => "" . $data['tipo_organizacion_pecuaria'],

            'nombre_organizacion_pecuaria' => "" . $data['nombre_organizacion_pecuaria'],
            'beneficios_pecuaria' => $data['beneficios_pecuaria'],
            'no_pertenece_pecuaria' => "" . $data['no_pertenece_pecuaria'],
            'trabaja_asociacion_pecuaria' => $data['trabaja_asociacion_pecuaria'],
            'producto_comercial' => $data['producto_comercial'],
            'produccion_destinada_pecuaria' => $data['produccion_destinada_pecuaria'],
            'unidad_producion_destinada_pecuaria' => $data['unidad_producion_destinada_pecuaria'],            
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.explotaciones_pecuarias')
            ->where('explotaciones_pecuarias.id_unidad', $id_hogar)
            ->where('explotaciones_pecuarias.estado', 'Activo')
            ->select("explotaciones_pecuarias.*")
            ->selectRaw("CASE "
                . " WHEN explotaciones_pecuarias.raza IS NULL THEN '' "
                . " WHEN explotaciones_pecuarias.raza='1' THEN 'Ganado vacuno o bovino' "
                . " WHEN explotaciones_pecuarias.raza='2' THEN 'Ganado ovino' "
                . " WHEN explotaciones_pecuarias.raza='3' THEN 'Ganado porcino' "
                . " WHEN explotaciones_pecuarias.raza='4' THEN 'Ganado caprino' "
                . " WHEN explotaciones_pecuarias.raza='5' THEN 'Ganado equino' "
                . " WHEN explotaciones_pecuarias.raza='6' THEN 'Avicultura' "
                . " WHEN explotaciones_pecuarias.raza='7' THEN 'Apicultura' "
                . " WHEN explotaciones_pecuarias.raza='8' THEN 'Acuicultura' "
                . " WHEN explotaciones_pecuarias.raza='9' THEN 'Helicicultura' "
                . " WHEN explotaciones_pecuarias.raza='10' THEN 'Cunicultura' "
                . " WHEN explotaciones_pecuarias.raza='11' THEN 'Sericicultura' "
                . " WHEN explotaciones_pecuarias.raza='12' THEN 'Otros' "
                . " ELSE explotaciones_pecuarias.raza "
                . " END AS texto_raza"
                . " ")
            ->selectRaw("CASE "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada IS NULL THEN '' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='1' THEN 'Kilómetro cuadrado' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='2' THEN 'Metro cuadrado' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='3' THEN 'Milla cuadrada' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='4' THEN 'Yarda cuadrada' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='5' THEN 'Pie cuadrado' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='6' THEN 'Pulgada cuadrada' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='7' THEN 'Hectárea' "
                . " WHEN explotaciones_pecuarias.unidad_area_destinada='8' THEN 'Acre' "
                . " ELSE explotaciones_pecuarias.unidad_area_destinada "
                . " END AS texto_unidad_area_destinada"
                . " ")
            ->selectRaw("CASE "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria IS NULL THEN '' "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria='1' THEN 'Económico' "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria='2' THEN 'En especies' "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria='3' THEN 'Capacitación' "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria='4' THEN 'Recreación y deporte' "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria='5' THEN 'Reconocimiento de la comunidad' "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria='6' THEN 'Participación en la toma de decisiones' "
                . " WHEN explotaciones_pecuarias.beneficios_pecuaria='NA' THEN 'No Aplica' "
                . " ELSE explotaciones_pecuarias.beneficios_pecuaria "
                . " END AS texto_beneficios_pecuaria"
                . " ")
            ->selectRaw("CASE "
                . " WHEN explotaciones_pecuarias.no_pertenece_pecuaria IS NULL THEN '' "
                . " WHEN explotaciones_pecuarias.no_pertenece_pecuaria='1' THEN 'Desconocimiento' "
                . " WHEN explotaciones_pecuarias.no_pertenece_pecuaria='2' THEN 'Falta de interés' "
                . " WHEN explotaciones_pecuarias.no_pertenece_pecuaria='3' THEN 'Falta de tiempo' "
                . " WHEN explotaciones_pecuarias.no_pertenece_pecuaria='4' THEN 'Falta de oportunidad' "
                . " WHEN explotaciones_pecuarias.no_pertenece_pecuaria='NA' THEN 'No Aplica' "
                . " ELSE explotaciones_pecuarias.no_pertenece_pecuaria "
                . " END AS texto_no_pertenece_pecuaria"
                . " ")
                ->selectRaw("CASE "
                . " WHEN explotaciones_pecuarias.unidad_producion_destinada_pecuaria IS NULL THEN '' "
                . " WHEN explotaciones_pecuarias.unidad_producion_destinada_pecuaria='1' THEN 'kilogramos' "
                . " WHEN explotaciones_pecuarias.unidad_producion_destinada_pecuaria='2' THEN 'Toneladas' "
                . " WHEN explotaciones_pecuarias.unidad_producion_destinada_pecuaria='3' THEN 'Unidades' "
                . " END AS texto_unidad_producion_destinada_pecuaria"
                . " ")              
            ->get();
    }
}
