<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class CultivosAgricolas extends Model
{
    protected $table = 'cultivos_agricolas';
    protected $fillable = [
        'id_unidad', 'importancias_agricolas', 'area_produccion', 'unidad_area_produccion', 'producto', 'variedad',
        'semilla', 'pertenece', 'tipo_pertenece', 'nombre_organizacion', 'beneficios',
        'no_pertenece', 'trabaja_asociacion', 'frecuente_cosecha', 'area_cosecha', 'unidad_area_cosecha',
        'costo_produccion', 'costo_establecimiento', 'costo_sostenimiento', 'produccion_destinada', 'tipo_problema',
        'compradores', 'precio_promedio_venta', 'metodo_pago', 'precio_promedio_venta_kg', 'subproductos_produccion',
        'programa_asistencia_tecnica', 'nombre_programa', 'entidad', 'cambios_produccion_anio', 'actividad_cambio',
        'estado', 'id_compania', 'otro_tipo_problema', 'unidad_frecuencia_cosecha', 'unidad_producion_destinada',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.cultivos_agricolas')->updateOrInsert([
            'id' => $data['id'],
        ], [

            'id_unidad' => $data['id_unidad'],

            'importancias_agricolas' => $data['importancias_agricolas'],
            'area_produccion' => $data['area_produccion'],
            'unidad_area_produccion' => $data['unidad_area_produccion'],
            'producto' => $data['producto'],
            'variedad' => $data['variedad'],
            'semilla' => $data['semilla'],
            'pertenece' => $data['pertenece'],
            'tipo_pertenece' => $data['tipo_pertenece'],
            'nombre_organizacion' => $data['nombre_organizacion'],
            'beneficios' => $data['beneficios'],

            'no_pertenece' => $data['no_pertenece'],
            'trabaja_asociacion' => $data['trabaja_asociacion'],
            'frecuente_cosecha' => $data['frecuente_cosecha'],
            'unidad_frecuencia_cosecha' => $data['unidad_frecuencia_cosecha'],

            'area_cosecha' => $data['area_cosecha'],
            'unidad_area_cosecha' => $data['unidad_area_cosecha'],
            'costo_produccion' => $data['costo_produccion'],
            'costo_establecimiento' => $data['costo_establecimiento'],
            'costo_sostenimiento' => $data['costo_sostenimiento'],
            'produccion_destinada' => $data['produccion_destinada'],
            'unidad_producion_destinada' => $data['unidad_producion_destinada'],

            'tipo_problema' => $data['tipo_problema'],

            'compradores' => $data['compradores'],
            'precio_promedio_venta' => $data['precio_promedio_venta'],
            'metodo_pago' => $data['metodo_pago'],
            'precio_promedio_venta_kg' => $data['precio_promedio_venta_kg'],
            'subproductos_produccion' => $data['subproductos_produccion'],
            'programa_asistencia_tecnica' => $data['programa_asistencia_tecnica'],
            'nombre_programa' => "" . $data['nombre_programa'],
            'entidad' => "" . $data['entidad'],
            'cambios_produccion_anio' => $data['cambios_produccion_anio'],
            'actividad_cambio' => "" . $data['actividad_cambio'],

            'otro_tipo_problema' => "" . $data['otro_tipo_problema'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.cultivos_agricolas')
            ->where('cultivos_agricolas.id_unidad', $id_hogar)
            ->where('cultivos_agricolas.estado', 'Activo')
            ->select("cultivos_agricolas.*")
            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.unidad_area_produccion IS NULL THEN '' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='1' THEN 'Kilómetro cuadrado' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='2' THEN 'Metro cuadrado' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='3' THEN 'Milla cuadrada' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='4' THEN 'Yarda cuadrada' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='5' THEN 'Pie cuadrado' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='6' THEN 'Pulgada cuadrada' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='7' THEN 'Hectárea' "
                . " WHEN cultivos_agricolas.unidad_area_produccion='8' THEN 'Acre' "
                . " ELSE cultivos_agricolas.unidad_area_produccion "
                . " END AS texto_unidad_area_produccion"
                . " ")

            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.unidad_frecuencia_cosecha IS NULL THEN '' "
                . " WHEN cultivos_agricolas.unidad_frecuencia_cosecha='1' THEN 'Mensual' "
                . " WHEN cultivos_agricolas.unidad_frecuencia_cosecha='2' THEN 'Bimensual' "
                . " WHEN cultivos_agricolas.unidad_frecuencia_cosecha='3' THEN 'Trimestral' "
                . " WHEN cultivos_agricolas.unidad_frecuencia_cosecha='4' THEN 'Semestral' "
                . " WHEN cultivos_agricolas.unidad_frecuencia_cosecha='5' THEN 'Anual' "
                . " WHEN cultivos_agricolas.unidad_frecuencia_cosecha='6' THEN 'Mas de un año' "
                . " END AS texto_unidad_frecuencia_cosecha"
                . " ")

            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.producto IS NULL THEN '' "
                . " WHEN cultivos_agricolas.producto='1' THEN 'Cereales' "
                . " WHEN cultivos_agricolas.producto='2' THEN 'Leguminosas' "
                . " WHEN cultivos_agricolas.producto='3' THEN 'Oleaginosas' "
                . " WHEN cultivos_agricolas.producto='4' THEN 'Hortalizas' "
                . " WHEN cultivos_agricolas.producto='5' THEN 'Frutales' "
                . " WHEN cultivos_agricolas.producto='6' THEN 'Raíces y tubérculos' "
                . " WHEN cultivos_agricolas.producto='7' THEN 'Ornamentales' "
                . " WHEN cultivos_agricolas.producto='8' THEN 'Cultivos para bebidas medicinales y aromáticas' "
                . " WHEN cultivos_agricolas.producto='9' THEN 'Otros cultivos tradicionles' "
                . " ELSE cultivos_agricolas.producto "
                . " END AS texto_producto"
                . " ")
            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='1' THEN 'Maíz' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='2' THEN 'Trigo' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='3' THEN 'Arroz' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='4' THEN 'Cebada' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='5' THEN 'Centeno' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='6' THEN 'Alpiste' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='7' THEN 'Sorgo' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='8' THEN 'Mijo' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='9' THEN 'Avena' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='10' THEN 'Trigo Espelta' "
                . " WHEN cultivos_agricolas.producto='1' AND variedad='11' THEN 'Trigo kamut' "

                . " WHEN cultivos_agricolas.producto='2' AND variedad='1' THEN 'Frijoles rojo' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='2' THEN 'Frijol negro' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='3' THEN 'Frijol cabecita negra' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='4' THEN 'Frijol' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='5' THEN 'Arvejas' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='6' THEN 'Habas' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='7' THEN 'Lenteja' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='8' THEN 'Garbanzo' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='9' THEN 'Gandul' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='10' THEN 'Alfalfa' "
                . " WHEN cultivos_agricolas.producto='2' AND variedad='11' THEN 'Almorta' "

                . " WHEN cultivos_agricolas.producto='3' AND variedad='1' THEN 'Soya' "
                . " WHEN cultivos_agricolas.producto='3' AND variedad='2' THEN 'Canola' "
                . " WHEN cultivos_agricolas.producto='3' AND variedad='3' THEN 'Girasol' "
                . " WHEN cultivos_agricolas.producto='3' AND variedad='4' THEN 'Olivo' "
                . " WHEN cultivos_agricolas.producto='3' AND variedad='5' THEN 'Maíz' "
                . " WHEN cultivos_agricolas.producto='3' AND variedad='6' THEN 'Ajonjolí' "
                . " WHEN cultivos_agricolas.producto='3' AND variedad='7' THEN 'Palma de aceite' "

                . " WHEN cultivos_agricolas.producto='4' AND variedad='1' THEN 'Acelga' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='2' THEN 'Ajo' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='3' THEN 'Albahaca' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='4' THEN 'Apio' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='5' THEN 'Alcachofa' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='6' THEN 'Berenjena' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='7' THEN 'Brócoli' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='8' THEN 'Calabacín' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='9' THEN 'Calabaza' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='10' THEN 'Cebolla' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='11' THEN 'Col' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='12' THEN 'Coliflor' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='13' THEN 'Espinacas' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='14' THEN 'Pepino' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='15' THEN 'Perejil' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='16' THEN 'Pimiento' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='17' THEN 'Puerro' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='18' THEN 'Rábano' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='19' THEN 'Remolacha' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='20' THEN 'Tomate' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='21' THEN 'Zanahoria' "
                . " WHEN cultivos_agricolas.producto='4' AND variedad='22' THEN 'Auyama' "

                . " WHEN cultivos_agricolas.producto='5' AND variedad='1' THEN 'Plátano' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='2' THEN 'Cana' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='3' THEN 'Coco' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='4' THEN 'Aguacate' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='5' THEN 'Naranja' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='6' THEN 'Mango' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='7' THEN 'Limón' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='8' THEN 'Banano' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='9' THEN 'Mandarina' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='10' THEN 'Sandia' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='11' THEN 'Papaya' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='12' THEN 'Marañón' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='13' THEN 'Guanábana' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='14' THEN 'Guayaba' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='15' THEN 'Piña' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='16' THEN 'Lulo' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='17' THEN 'Maracuyá' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='18' THEN 'Granadilla' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='19' THEN 'Curuba' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='20' THEN 'Níspero' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='21' THEN 'Borojó' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='22' THEN 'Zapote' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='23' THEN 'Carambola' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='24' THEN 'Tomate de árbol' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='25' THEN 'Melón' "
                . " WHEN cultivos_agricolas.producto='5' AND variedad='26' THEN 'Nueces' "

                . " WHEN cultivos_agricolas.producto='6' AND variedad='1' THEN 'Arracacha' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='2' THEN 'Papa amarilla' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='3' THEN 'Batata' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='4' THEN 'Yuca' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='5' THEN 'Papa criolla' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='6' THEN 'Ñame' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='7' THEN 'Papa sabanera' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='8' THEN 'Papa' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='9' THEN 'Jengibre' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='10' THEN 'Malanga' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='11' THEN 'Yacón' "
                . " WHEN cultivos_agricolas.producto='6' AND variedad='12' THEN 'Otro' "

                . " WHEN cultivos_agricolas.producto='7' AND variedad='1' THEN 'Ornamentales de exteriores' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='2' THEN 'Ornamentales de Interiores' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='3' THEN 'Otros floricultivos' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='4' THEN 'Rosas' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='5' THEN 'Girasoles' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='6' THEN 'Crisantemo' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='7' THEN 'Tulipan' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='8' THEN 'Clavel' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='9' THEN 'Gerbera' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='10' THEN 'Gladiolo' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='11' THEN 'Acroclinio' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='12' THEN 'Aster' "
                . " WHEN cultivos_agricolas.producto='7' AND variedad='13' THEN 'Caléndula' "

                . " WHEN cultivos_agricolas.producto='8' AND variedad='1' THEN 'Lavanda' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='2' THEN 'Aloe vera' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='3' THEN 'Romero' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='4' THEN 'Manzanilla' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='5' THEN 'Menta' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='6' THEN 'Calendula' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='7' THEN 'Diente de leon' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='8' THEN 'Albahaca' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='9' THEN 'Algarrobo' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='10' THEN 'Boldo' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='11' THEN 'Acacia' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='12' THEN 'Toronjil' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='13' THEN 'Paja limón' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='14' THEN 'Cidrón' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='15' THEN 'Achiote' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='16' THEN 'Arnica' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='17' THEN 'Canela' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='18' THEN 'Tomillo' "
                . " WHEN cultivos_agricolas.producto='8' AND variedad='19' THEN 'Otro' "

                . " WHEN cultivos_agricolas.producto='9' AND variedad='1' THEN 'Caña de azucar' "
                . " WHEN cultivos_agricolas.producto='9' AND variedad='2' THEN 'Tabaco' "
                . " WHEN cultivos_agricolas.producto='9' AND variedad='3' THEN 'Pasto' "
                . " WHEN cultivos_agricolas.producto='9' AND variedad='4' THEN 'Café' "
                . " WHEN cultivos_agricolas.producto='9' AND variedad='5' THEN 'Cacao' "

                . " ELSE cultivos_agricolas.producto "
                . " END AS texto_variedad"
                . " ")

            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.beneficios IS NULL THEN '' "
                . " WHEN cultivos_agricolas.beneficios='1' THEN 'Económico' "
                . " WHEN cultivos_agricolas.beneficios='2' THEN 'En especies' "
                . " WHEN cultivos_agricolas.beneficios='3' THEN 'Capacitación' "
                . " WHEN cultivos_agricolas.beneficios='4' THEN 'Recreación y deporte' "
                . " WHEN cultivos_agricolas.beneficios='5' THEN 'Reconocimiento de la comunidad' "
                . " WHEN cultivos_agricolas.beneficios='6' THEN 'Participación en la toma de decisiones' "
                . " WHEN cultivos_agricolas.beneficios='NA' THEN 'No Aplica' "
                . " ELSE cultivos_agricolas.beneficios "
                . " END AS texto_beneficios"
                . " ")
            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.no_pertenece IS NULL THEN '' "
                . " WHEN cultivos_agricolas.no_pertenece='1' THEN 'Desconocimiento' "
                . " WHEN cultivos_agricolas.no_pertenece='2' THEN 'Falta de interés' "
                . " WHEN cultivos_agricolas.no_pertenece='3' THEN 'Falta de tiempo' "
                . " WHEN cultivos_agricolas.no_pertenece='4' THEN 'Falta de oportunidad' "
                . " WHEN cultivos_agricolas.no_pertenece='NA' THEN 'No Aplica' "
                . " ELSE cultivos_agricolas.no_pertenece "
                . " END AS texto_no_pertenece"
                . " ")
            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.unidad_area_cosecha IS NULL THEN '' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='1' THEN 'Kilómetro cuadrado' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='2' THEN 'Metro cuadrado' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='3' THEN 'Milla cuadrada' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='4' THEN 'Yarda cuadrada' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='5' THEN 'Pie cuadrado' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='6' THEN 'Pulgada cuadrada' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='7' THEN 'Hectárea' "
                . " WHEN cultivos_agricolas.unidad_area_cosecha='8' THEN 'Acre' "
                . " ELSE cultivos_agricolas.unidad_area_cosecha "
                . " END AS texto_unidad_area_cosecha"
                . " ")

            ->selectRaw("CASE "
                . " WHEN cultivos_agricolas.unidad_producion_destinada IS NULL THEN '' "
                . " WHEN cultivos_agricolas.unidad_producion_destinada='1' THEN 'kilogramos' "
                . " WHEN cultivos_agricolas.unidad_producion_destinada='2' THEN 'Toneladas' "
                . " WHEN cultivos_agricolas.unidad_producion_destinada='3' THEN 'Unidades' "
                . " END AS texto_unidad_producion_destinada"
                . " ")
            ->get();
    }
}
