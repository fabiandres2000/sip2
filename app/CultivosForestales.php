<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class CultivosForestales extends Model
{
    protected $table = 'cultivos_forestales';
    protected $fillable = [
        'id_unidad', 'importancia_forestales', 'producto_forestales', 'variedad_forestales', 'edad_plantacion',
        'tipo_edad', 'area_sembrada_forestales', 'unidad_area_forestales', 'rendimiento_arbol', 'costo_total_forestales',
        'costo_establecimiento_forestales', 'costo_sostenimiento_forestales', 'problematica_productos_forestales', 'produccion_destinada_forestales', 'numero_arboles',
        'compradores_forestales', 'metodo_pago_forestales', 'precio_promedio_venta_forestales', 'subproductos_produccion_forestales', 'pertenece_forestales',
        'nombre_programa_forestales', 'entidad_forestales', 'pertenece_organizacion_forestales', 'tipo_pertenece_forestales', 'nombre_organizacion_forestales',
        'beneficios_forestales', 'no_pertenece_forestales', 'trabaja_asociacion_forestales', 'estado', 'id_compania',
        'otros_problematica_productos_forestales', 'unidad_producion_destinada_forestales',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.cultivos_forestales')->updateOrInsert([
            'id' => $data['id'],
        ], [

            'id_unidad' => $data['id_unidad'],

            'importancia_forestales' => $data['importancia_forestales'],
            'producto_forestales' => $data['producto_forestales'],
            'variedad_forestales' => $data['variedad_forestales'],
            'edad_plantacion' => $data['edad_plantacion'],
            'tipo_edad' => $data['tipo_edad'],
            'area_sembrada_forestales' => $data['area_sembrada_forestales'],
            'unidad_area_forestales' => $data['unidad_area_forestales'],
            'rendimiento_arbol' => $data['rendimiento_arbol'],
            'costo_total_forestales' => $data['costo_total_forestales'],
            'costo_establecimiento_forestales' => $data['costo_establecimiento_forestales'],

            'costo_sostenimiento_forestales' => $data['costo_sostenimiento_forestales'],
            'problematica_productos_forestales' => $data['problematica_productos_forestales'],
            'produccion_destinada_forestales' => $data['produccion_destinada_forestales'],
            'unidad_producion_destinada_forestales' => $data['unidad_producion_destinada_forestales'],
            'numero_arboles' => $data['numero_arboles'],
            'compradores_forestales' => $data['compradores_forestales'],
            'metodo_pago_forestales' => $data['metodo_pago_forestales'],
            'precio_promedio_venta_forestales' => $data['precio_promedio_venta_forestales'],
            'subproductos_produccion_forestales' => $data['subproductos_produccion_forestales'],
            'pertenece_forestales' => $data['pertenece_forestales'],
            'nombre_programa_forestales' => "" . $data['nombre_programa_forestales'],

            'entidad_forestales' => "" . $data['entidad_forestales'],
            'pertenece_organizacion_forestales' => $data['pertenece_organizacion_forestales'],
            'tipo_pertenece_forestales' => "" . $data['tipo_pertenece_forestales'],
            'nombre_organizacion_forestales' => "" . $data['nombre_organizacion_forestales'],
            'beneficios_forestales' => $data['beneficios_forestales'],
            'no_pertenece_forestales' => "" . $data['no_pertenece_forestales'],
            'trabaja_asociacion_forestales' => $data['trabaja_asociacion_forestales'],
            'otros_problematica_productos_forestales' => "" . $data['otros_problematica_productos_forestales'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.cultivos_forestales')
            ->where('cultivos_forestales.id_unidad', $id_hogar)
            ->where('cultivos_forestales.estado', 'Activo')
            ->select("cultivos_forestales.*")
            ->selectRaw("CASE "
                . " WHEN cultivos_forestales.variedad_forestales IS NULL THEN '' "
                . " WHEN cultivos_forestales.variedad_forestales='1' THEN 'Chiche' "
                . " WHEN cultivos_forestales.variedad_forestales='2' THEN 'Palo Maria' "
                . " WHEN cultivos_forestales.variedad_forestales='3' THEN 'Guayabo Volador' "
                . " WHEN cultivos_forestales.variedad_forestales='4' THEN 'Roble' "
                . " WHEN cultivos_forestales.variedad_forestales='5' THEN 'Caoba' "
                . " WHEN cultivos_forestales.variedad_forestales='6' THEN 'Pino' "
                . " WHEN cultivos_forestales.variedad_forestales='7' THEN 'Cedro' "
                . " WHEN cultivos_forestales.variedad_forestales='8' THEN 'Árbol de Caucho' "
                . " WHEN cultivos_forestales.variedad_forestales='9' THEN 'Álamo' "
                . " WHEN cultivos_forestales.variedad_forestales='10' THEN 'Primavera' "
                . " WHEN cultivos_forestales.variedad_forestales='11' THEN 'Hormiguillo colorado' "
                . " WHEN cultivos_forestales.variedad_forestales='12' THEN 'Palo mulato' "
                . " WHEN cultivos_forestales.variedad_forestales='13' THEN 'Bambú' "
                . " WHEN cultivos_forestales.variedad_forestales='14' THEN 'Eucalipto' "
                . " WHEN cultivos_forestales.variedad_forestales='15' THEN 'Canela' "
                . " WHEN cultivos_forestales.variedad_forestales='16' THEN 'Neem' "
                . " WHEN cultivos_forestales.variedad_forestales='17' THEN 'Ciprés' "
                . " WHEN cultivos_forestales.variedad_forestales='18' THEN 'Paulownia' "
                . " WHEN cultivos_forestales.variedad_forestales='19' THEN 'Ceiba' "
                . " WHEN cultivos_forestales.variedad_forestales='20' THEN 'Guariuba' "
                . " WHEN cultivos_forestales.variedad_forestales='21' THEN 'Figueira' "
                . " WHEN cultivos_forestales.variedad_forestales='22' THEN 'Pashaco' "
                . " WHEN cultivos_forestales.variedad_forestales='23' THEN 'Chicalá' "
                . " WHEN cultivos_forestales.variedad_forestales='24' THEN 'Nogal' "
                . " WHEN cultivos_forestales.variedad_forestales='25' THEN 'Abarco' "
                . " WHEN cultivos_forestales.variedad_forestales='26' THEN 'Palo rosa' "
                . " WHEN cultivos_forestales.variedad_forestales='27' THEN 'Campanos' "
                . " WHEN cultivos_forestales.variedad_forestales='28' THEN 'Melina' "
                . " WHEN cultivos_forestales.variedad_forestales='29' THEN 'Igua' "
                . " WHEN cultivos_forestales.variedad_forestales='30' THEN 'Caracolí' "
                . " WHEN cultivos_forestales.variedad_forestales='31' THEN 'Chanul' "
                . " WHEN cultivos_forestales.variedad_forestales='32' THEN 'Dinde' "
                . " ELSE cultivos_forestales.variedad_forestales "
                . " END AS texto_variedad_forestales"
                . " ")
            ->selectRaw("CASE "
                . " WHEN cultivos_forestales.unidad_area_forestales IS NULL THEN '' "
                . " WHEN cultivos_forestales.unidad_area_forestales='1' THEN 'Kilómetro cuadrado' "
                . " WHEN cultivos_forestales.unidad_area_forestales='2' THEN 'Metro cuadrado' "
                . " WHEN cultivos_forestales.unidad_area_forestales='3' THEN 'Milla cuadrada' "
                . " WHEN cultivos_forestales.unidad_area_forestales='4' THEN 'Yarda cuadrada' "
                . " WHEN cultivos_forestales.unidad_area_forestales='5' THEN 'Pie cuadrado' "
                . " WHEN cultivos_forestales.unidad_area_forestales='6' THEN 'Pulgada cuadrada' "
                . " WHEN cultivos_forestales.unidad_area_forestales='7' THEN 'Hectárea' "
                . " WHEN cultivos_forestales.unidad_area_forestales='8' THEN 'Acre' "
                . " ELSE cultivos_forestales.unidad_area_forestales "
                . " END AS texto_unidad_area_forestales"
                . " ")
            ->selectRaw("CASE "
                . " WHEN cultivos_forestales.beneficios_forestales IS NULL THEN '' "
                . " WHEN cultivos_forestales.beneficios_forestales='1' THEN 'Económico' "
                . " WHEN cultivos_forestales.beneficios_forestales='2' THEN 'En especies' "
                . " WHEN cultivos_forestales.beneficios_forestales='3' THEN 'Capacitación' "
                . " WHEN cultivos_forestales.beneficios_forestales='4' THEN 'Recreación y deporte' "
                . " WHEN cultivos_forestales.beneficios_forestales='5' THEN 'Reconocimiento de la comunidad' "
                . " WHEN cultivos_forestales.beneficios_forestales='6' THEN 'Participación en la toma de decisiones' "
                . " WHEN cultivos_forestales.beneficios_forestales='NA' THEN 'No Aplica' "
                . " ELSE cultivos_forestales.beneficios_forestales "
                . " END AS texto_beneficios_forestales"
                . " ")
            ->selectRaw("CASE "
                . " WHEN cultivos_forestales.no_pertenece_forestales IS NULL THEN '' "
                . " WHEN cultivos_forestales.no_pertenece_forestales='1' THEN 'Desconocimiento' "
                . " WHEN cultivos_forestales.no_pertenece_forestales='2' THEN 'Falta de interés' "
                . " WHEN cultivos_forestales.no_pertenece_forestales='3' THEN 'Falta de tiempo' "
                . " WHEN cultivos_forestales.no_pertenece_forestales='4' THEN 'Falta de oportunidad' "
                . " WHEN cultivos_forestales.no_pertenece_forestales='NA' THEN 'No Aplica' "
                . " ELSE cultivos_forestales.no_pertenece_forestales "
                . " END AS texto_no_pertenece_forestales"
                . " ")
            ->selectRaw("CASE "
                . " WHEN cultivos_forestales.unidad_producion_destinada_forestales IS NULL THEN '' "
                . " WHEN cultivos_forestales.unidad_producion_destinada_forestales='1' THEN 'kilogramos' "
                . " WHEN cultivos_forestales.unidad_producion_destinada_forestales='2' THEN 'Toneladas' "
                . " WHEN cultivos_forestales.unidad_producion_destinada_forestales='3' THEN 'Unidades' "
                . " END AS texto_unidad_producion_destinada_forestales"
                . " ")
            ->get();
    }
}
