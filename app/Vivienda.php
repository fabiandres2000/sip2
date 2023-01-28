<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    protected $table = 'vivienda';
    protected $fillable = [
        'id_hogar', 'tipo_vivienda', 'tipo_estructura', 'otro_tipo_estructura', 'numero_cuartos', 'personas_por_cuartos',
        'material_predominante', 'tipo_cubierta', 'otro_tipo_cubierta', 'cual_actividad_economica', 'evento_afecta_vivienda',
        'familias_accion', 'promedio_ingresos', 'otro_depositan_excretas', 'fuente_agua', 'cual_fuente', 'donde_almacena_agua',
        'otro_almacena_agua', 'ubicacion_tanque', 'tipo_tratamiento_agua', 'destino_final_basura', 'otro_destino_final_basura', 'porquerizas',
        'plagas', 'industrias', 'malos_olores', 'rellenos', 'contaminacion_a', 'contaminacion_v',
        'rio', 'otro_cerca', 'cual_cerca', 'estado', 'servicio_sanitario', 'donde_sanitario',
        'excretas', 'cocina', 'dormitorio_a', 'sala', 'dormitorio_n', 'sanitario',
        'lavadero', 'iluminacion_adecuada', 'techo_adecuado', 'ventilacion_adecuada', 'pisos_adecuado', 'paredes_adecuadas', 'gasolina',
        'plaguicidas', 'detergentes', 'plaguicidas_insectos', 'envases_vacios', 'otro_envases_vacios', 'elementos_protecion',
        'otro_elementos_protecion', 'metodos_coccion', 'otro_metodos_coccion', 'lugares_preparan_alimentos', 'lugares_almacenan_alimentos', 'otro_lugares_almacenan_alimentos',
        'lava_frutas', 'energia_electrica', 'gas_natural', 'acueducto', 'alcantarillado', 'telefono_fijo',
        'aseo', 'internet_subsidiado', 'internet_privado', 'aereopuertos', 'avenidas_transitadas', 'lotes_abandonados',
        'tipo_explotacion', 'otro_tipo_explotacion', 'flora_afectados', 'fauna_afectados', 'suelo_afectados', 'aire_afectados',
        'agua_afectados', 'residuos_solidos_genera', 'aguas_servidas_genera', 'desechos_cocina_genera', 'heces_animales_genera', 'quimicos_genera',
        'otros_genera', 'cual_genera', 'tipo_combustible', 'mantenimiento_red', 'zona_alto_riesgo', 'almacenamiento_residuos',
        'fuente_contaminacion', 'aguas_negras', 'zonas_verdes', 'desplazamientos', 'rotacion_cultivo', 'emplea_fertilizantes',
        'suministro_energia_ilegal', 'quema_cultivo', 'mantenimiento_preventivo', 'veces_inundaciones', 'promedio_gastos', 'id_compania',
        'fachada', 'cuantos_baños', 'estado_conservacion_baños', 'acabados_externos', 'estado_conservacion_estructuras',
        'mobiliario_cocina', 'andenes', 'residuos_aprovechables', 'residuos_organicos', 'residuos_no_aprovechables',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.vivienda')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'tipo_vivienda' => $data['tipo_vivienda'],
            'tipo_estructura' => $data['tipo_estructura'],
            'otro_tipo_estructura' => $data['otro_tipo_estructura'],
            'numero_cuartos' => $data['numero_cuartos'],
            'personas_por_cuartos' => $data['personas_por_cuartos'],
            'material_predominante' => $data['material_predominante'],
            'tipo_cubierta' => $data['tipo_cubierta'],
            'otro_tipo_cubierta' => $data['otro_tipo_cubierta'],
            'cual_actividad_economica' => $data['cual_actividad_economica'],
            'evento_afecta_vivienda' => $data['evento_afecta_vivienda'],
            'familias_accion' => $data['familias_accion'],
            'promedio_ingresos' => $data['promedio_ingresos'],
            'promedio_gastos' => $data['promedio_gastos'],
            'fuente_agua' => $data['fuente_agua'],
            'energia_electrica' => $data['energia_electrica'],
            'gas_natural' => $data['gas_natural'],
            'acueducto' => $data['acueducto'],
            'alcantarillado' => $data['alcantarillado'],
            'telefono_fijo' => $data['telefono_fijo'],
            'aseo' => $data['aseo'],
            'internet_subsidiado' => $data['internet_subsidiado'],
            'internet_privado' => $data['internet_privado'],
            'cual_fuente' => $data['cual_fuente'],
            'donde_almacena_agua' => $data['donde_almacena_agua'],
            'otro_almacena_agua' => $data['otro_almacena_agua'],
            'ubicacion_tanque' => $data['ubicacion_tanque'],
            'tipo_tratamiento_agua' => $data['tipo_tratamiento_agua'],
            'destino_final_basura' => $data['destino_final_basura'],
            'otro_destino_final_basura' => $data['otro_destino_final_basura'],
            'porquerizas' => $data['porquerizas'],
            'plagas' => $data['plagas'],
            'industrias' => $data['industrias'],
            'malos_olores' => $data['malos_olores'],
            'rellenos' => $data['rellenos'],
            'contaminacion_a' => $data['contaminacion_a'],
            'contaminacion_v' => $data['contaminacion_v'],
            'rio' => $data['rio'],
            'otro_cerca' => $data['otro_cerca'],
            'cual_cerca' => $data['cual_cerca'],
            'aereopuertos' => $data['aereopuertos'],
            'avenidas_transitadas' => $data['avenidas_transitadas'],
            'lotes_abandonados' => $data['lotes_abandonados'],
            'servicio_sanitario' => $data['servicio_sanitario'],
            'donde_sanitario' => $data['donde_sanitario'],
            'excretas' => $data['excretas'],
            'otro_depositan_excretas' => $data['otro_depositan_excretas'],
            'cocina' => $data['cocina'],
            'dormitorio_a' => $data['dormitorio_a'],
            'sala' => $data['sala'],
            'dormitorio_n' => $data['dormitorio_n'],
            'sanitario' => $data['sanitario'],
            'lavadero' => $data['lavadero'],
            'iluminacion_adecuada' => $data['iluminacion_adecuada'],
            'techo_adecuado' => $data['techo_adecuado'],
            'ventilacion_adecuada' => $data['ventilacion_adecuada'],
            'pisos_adecuado' => $data['pisos_adecuado'],
            'paredes_adecuadas' => $data['paredes_adecuadas'],
            'gasolina' => $data['gasolina'],
            'plaguicidas' => $data['plaguicidas'],
            'detergentes' => $data['detergentes'],
            'plaguicidas_insectos' => $data['plaguicidas_insectos'],
            'envases_vacios' => $data['envases_vacios'],
            'otro_envases_vacios' => $data['otro_envases_vacios'],
            'elementos_protecion' => $data['elementos_protecion'],
            'otro_elementos_protecion' => $data['otro_elementos_protecion'],
            'metodos_coccion' => $data['metodos_coccion'],
            'otro_metodos_coccion' => $data['otro_metodos_coccion'],
            'lugares_preparan_alimentos' => $data['lugares_preparan_alimentos'],
            'lugares_almacenan_alimentos' => $data['lugares_almacenan_alimentos'],
            'otro_lugares_almacenan_alimentos' => $data['otro_lugares_almacenan_alimentos'],
            'lava_frutas' => $data['lava_frutas'],
            'tipo_explotacion' => $data['tipo_explotacion'],
            'otro_tipo_explotacion' => $data['otro_tipo_explotacion'],
            'flora_afectados' => $data['flora_afectados'],
            'fauna_afectados' => $data['fauna_afectados'],
            'suelo_afectados' => $data['suelo_afectados'],
            'aire_afectados' => $data['aire_afectados'],
            'agua_afectados' => $data['agua_afectados'],
            'residuos_solidos_genera' => $data['residuos_solidos_genera'],
            'aguas_servidas_genera' => $data['aguas_servidas_genera'],
            'desechos_cocina_genera' => $data['desechos_cocina_genera'],
            'heces_animales_genera' => $data['heces_animales_genera'],
            'quimicos_genera' => $data['quimicos_genera'],
            'otros_genera' => $data['otros_genera'],
            'cual_genera' => $data['cual_genera'],
            'tipo_combustible' => $data['tipo_combustible'],
            'mantenimiento_red' => $data['mantenimiento_red'],
            'zona_alto_riesgo' => $data['zona_alto_riesgo'],
            'almacenamiento_residuos' => $data['almacenamiento_residuos'],
            'fuente_contaminacion' => $data['fuente_contaminacion'],
            'aguas_negras' => $data['aguas_negras'],
            'zonas_verdes' => $data['zonas_verdes'],
            'desplazamientos' => $data['desplazamientos'],
            'rotacion_cultivo' => $data['rotacion_cultivo'],
            'emplea_fertilizantes' => $data['emplea_fertilizantes'],
            'suministro_energia_ilegal' => $data['suministro_energia_ilegal'],
            'quema_cultivo' => $data['quema_cultivo'],
            'mantenimiento_preventivo' => $data['mantenimiento_preventivo'],
            'veces_inundaciones' => $data['veces_inundaciones'],
            'id_compania' => 1,
            'estado' => 'Activo',

            'fachada' => $data['fachada'],
            'cuantos_baños' => $data['cuantos_baños'],
            'estado_conservacion_baños' => $data['estado_conservacion_baños'],
            'acabados_externos' => $data['acabados_externos'],
            'estado_conservacion_estructuras' => $data['estado_conservacion_estructuras'],
            'mobiliario_cocina' => $data['mobiliario_cocina'],
            'andenes' => $data['andenes'],
            'residuos_aprovechables' => $data['residuos_aprovechables'],
            'residuos_organicos' => $data['residuos_organicos'],
            'residuos_no_aprovechables' => $data['residuos_no_aprovechables'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.vivienda')
            ->join($alias . '.hogar', 'hogar.id', 'vivienda.id_hogar')
            ->where('vivienda.id_hogar', $id_hogar)
            ->where('vivienda.estado', 'Activo')
            ->select("vivienda.*")
            ->first();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.vivienda')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function listar($alias, $data, $tipo)
    {
        $consulta = DB::table($alias . ".vivienda")
            ->join($alias . ".hogar", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->join($alias . ".caracterizacion", "caracterizacion.id_hogar", "hogar.id");

        if ($data["datos"]["id_dpto"] != null) {
            $consulta->where("hogar.id_dpto", $data["datos"]["id_dpto"]);
        }

        if ($data["datos"]["id_mun"] != null) {
            $consulta->where("hogar.id_mun", $data["datos"]["id_mun"]);
        }

        if ($data["datos"]["id_corre"] != null) {
            $consulta->where("hogar.id_corre", $data["datos"]["id_corre"]);
        }

        if ($data["datos"]["id_vereda"] != null) {
            $consulta->where("hogar.id_vereda", $data["datos"]["id_vereda"]);
        }

        if ($data["datos"]["id_zona"] != null) {
            $consulta->where("hogar.id_zona", $data["datos"]["id_zona"]);
        }

        if ($data["datos"]["id_barrio"] != null) {
            $consulta->where("hogar.id_barrio", $data["datos"]["id_barrio"]);
        }

        if ($data["datos"]["tenencia_vivienda"] != null) {
            $consulta->where("vivienda.tenencia_vivienda", $data["datos"]["tenencia_vivienda"]);
        }

        if ($data["datos"]["tipo_vivienda"] != null) {
            $consulta->where("vivienda.tipo_vivienda", $data["datos"]["tipo_vivienda"]);
        }

        if ($data["datos"]["poblacion_especial"] != null) {
            $consulta->where("hogar.poblacion_especial", $data["datos"]["poblacion_especial"]);
        }

        if ($data["datos"]["promedio_ingresos"] != null) {
            $consulta->where("vivienda.promedio_ingresos", $data["datos"]["promedio_ingresos"]);
        }

        if ($data["datos"]["energia_electrica"] != null) {
            $consulta->where("vivienda.energia_electrica", $data["datos"]["energia_electrica"]);
        }

        if ($data["datos"]["gas_natural"] != null) {
            $consulta->where("vivienda.gas_natural", $data["datos"]["gas_natural"]);
        }

        if ($data["datos"]["acueducto"] != null) {
            $consulta->where("vivienda.acueducto", $data["datos"]["acueducto"]);
        }

        if ($data["datos"]["alcantarillado"] != null) {
            $consulta->where("vivienda.alcantarillado", $data["datos"]["alcantarillado"]);
        }

        if ($data["datos"]["aseo"] != null) {
            $consulta->where("vivienda.aseo", $data["datos"]["aseo"]);
        }

        if ($data["datos"]["servicio_sanitario"] != null) {
            $consulta->where("vivienda.servicio_sanitario", $data["datos"]["servicio_sanitario"]);
        }

        if ($data["datos"]["acueducto"] != null) {
            $consulta->where("vivienda.acueducto", $data["datos"]["acueducto"]);
        }

        if ($data["datos"]["aguas_negras"] != null) {
            $consulta->where("vivienda.aguas_negras", $data["datos"]["aguas_negras"]);
        }

        if ($data["datos"]["aguas_negras"] != null) {
            $consulta->where("vivienda.aguas_negras", $data["datos"]["aguas_negras"]);
        }

        $consulta->select("hogar.id", "dptos.descripcion as dpto", "muni.descripcion as muni", "corregimientos.descripcion as corre", "veredas.descripcion as vereda", "pnom", "snom", "pape", "sape", "hogar.*", "vivienda.*", "barrios.barrio");

        if ($tipo == "todos") {
            return $consulta->groupBy("vivienda.id_hogar")->get();
        } else {
            return $consulta->groupBy("vivienda.id_hogar")->paginate(10);
        }
    }

    public static function riesgosViviendaExportar($id_hogar, $alias){
        return DB::connection('mysql')->table($alias . '.riesgos_ambientales')
        ->where('riesgos_ambientales.id_hogar', $id_hogar)
        ->where('riesgos_ambientales.estado', 'Activo')
        ->first();
    }
}
