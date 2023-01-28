<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgosSaludMen1 extends Model
{
    protected $table = 'riesgos_salud_men1';
    protected $fillable = [
        'id_hogar', 'enfermedades_infecciosas_I', 'transtornos_asociados_spa_I', 'enfermedad_cardiovascular_I', 'cancer_I',
        'alteraciones_transtornos_visuales_I', 'alteraciones_transtornos_audicion_I', 'salud_bucal_I', 'problemas_salud_mental_I', 'violencias_I',
        'enfermedades_respiratorias_I', 'enfermedades_zoonoticas_I', 'transtornos_degenartivos_I', 'consumo_spa_I', 'riesgos_desnutricion_aguda_I',
        'riesgos_desnutricion_global_I', 'desnutricion_global_I', 'riesgo_talla_baja_I', 'talla_baja_retraso_I', 'desnutricion_aguda_moderada_I',
        'desnutricion_aguda_severa_I', 'riesgo_muerte_I', 'riesgo_sobrepeso_I', 'sobrepeso_I', 'obesidad_I',

        'enfermedades_infecciosas_R', 'transtornos_asociados_spa_R', 'enfermedad_cardiovascular_R', 'cancer_R',
        'alteraciones_transtornos_visuales_R', 'alteraciones_transtornos_audicion_R', 'salud_bucal_R', 'problemas_salud_mental_R', 'violencias_R',
        'enfermedades_respiratorias_R', 'enfermedades_zoonoticas_R', 'transtornos_degenartivos_R', 'consumo_spa_R', 'riesgos_desnutricion_aguda_R',
        'riesgos_desnutricion_global_R', 'desnutricion_global_R', 'riesgo_talla_baja_R', 'talla_baja_retraso_R', 'desnutricion_aguda_moderada_R',
        'desnutricion_aguda_severa_R', 'riesgo_muerte_R', 'riesgo_sobrepeso_R', 'sobrepeso_R', 'obesidad_R',

        'estado', 'id_compania', 'id_inte',
    ];
    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')->updateOrInsert([
            'id_inte' => $data['id_inte'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'enfermedades_infecciosas_I' => $data['enfermedades_infecciosas_I'],
            'transtornos_asociados_spa_I' => $data['transtornos_asociados_spa_I'],
            'enfermedad_cardiovascular_I' => $data['enfermedad_cardiovascular_I'],
            'cancer_I' => $data['cancer_I'],
            'alteraciones_transtornos_visuales_I' => $data['alteraciones_transtornos_visuales_I'],
            'alteraciones_transtornos_audicion_I' => $data['alteraciones_transtornos_audicion_I'],
            'salud_bucal_I' => $data['salud_bucal_I'],
            'problemas_salud_mental_I' => $data['problemas_salud_mental_I'],

            'violencias_I' => $data['violencias_I'],
            'enfermedades_respiratorias_I' => $data['enfermedades_respiratorias_I'],
            'enfermedades_zoonoticas_I' => $data['enfermedades_zoonoticas_I'],
            'transtornos_degenartivos_I' => $data['transtornos_degenartivos_I'],
            'consumo_spa_I' => $data['consumo_spa_I'],
            'riesgos_desnutricion_aguda_I' => $data['riesgos_desnutricion_aguda_I'],
            'riesgos_desnutricion_global_I' => $data['riesgos_desnutricion_global_I'],
            'desnutricion_global_I' => $data['desnutricion_global_I'],

            'riesgo_talla_baja_I' => $data['riesgo_talla_baja_I'],
            'talla_baja_retraso_I' => $data['talla_baja_retraso_I'],
            'desnutricion_aguda_moderada_I' => $data['desnutricion_aguda_moderada_I'],
            'desnutricion_aguda_severa_I' => $data['desnutricion_aguda_severa_I'],
            'riesgo_muerte_I' => $data['riesgo_muerte_I'],
            'riesgo_sobrepeso_I' => $data['riesgo_sobrepeso_I'],
            'sobrepeso_I' => $data['sobrepeso_I'],
            'obesidad_I' => $data['obesidad_I'],

            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
            ->join($alias . '.integrantes', 'integrantes.id', 'riesgos_salud_men1.id_inte')
            ->join($alias . '.men1a', 'integrantes.id', 'men1a.id_integrante')
            ->where('integrantes.id_hogar', $id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->where('men1a.estado', 'Activo')
            ->select('riesgos_salud_men1.*'
                , "integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape")
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->get();
    }

    public static function modificar($alias, $id_hogar, $opcion, $data, $id_inte)
    {
        // Enfermedades Infeccisosas
        if ($opcion == "EnIn") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedades_infecciosas_R' => $data,
                ]);
        }
        // Enfermedades Infeccisosas

        // Trastornos Asociados al uso de SPA
        if ($opcion == "TrAsSPA") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'transtornos_asociados_spa_R' => $data,
                ]);
        }
        // Trastornos Asociados al uso de SPA
        
        // Enfermedad Cardiovascular Aterogénica
        if ($opcion == "EnCaAt") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedad_cardiovascular_R' => $data,
                ]);
        }
        // Enfermedad Cardiovascular Aterogénica
        
        // Cancer
        if ($opcion == "Ca") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'cancer_R' => $data,
                ]);
        }
        // Cancer
        
        // Alteraciones y Transtornos Visuales
        if ($opcion == "AlTrVi") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'alteraciones_transtornos_visuales_R' => $data,
                ]);
        }
        // Alteraciones y Transtornos Visuales
        
        // Alteraciones y Transtornos de la Audición y Comunicación
        if ($opcion == "AlTrAuCo") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'alteraciones_transtornos_audicion_R' => $data,
                ]);
        }
        // Alteraciones y Transtornos de la Audición y Comunicación
        
        // Salud Bucal
        if ($opcion == "SaBu") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'salud_bucal_R' => $data,
                ]);
        }
        // Salud Bucal
        
        // Problemas en salud mental
        if ($opcion == "PrSaMe") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'problemas_salud_mental_R' => $data,
                ]);
        }
        // Problemas en salud mental
        
        // Violencias
        if ($opcion == "Vi") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'violencias_R' => $data,
                ]);
        }
        // Violencias
        
        // Enfermedades Respiratorias crónicas
        if ($opcion == "EnReCr") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedades_respiratorias_R' => $data,
                ]);
        }
        // Enfermedades Respiratorias crónicas
        
        // Enfermedades Zoonoticas
        if ($opcion == "EnZo") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedades_zoonoticas_R' => $data,
                ]);
        }
        // Enfermedades Zoonoticas
        
        // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
        if ($opcion == "TrDeNeEnAu") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'transtornos_degenartivos_R' => $data,
                ]);
        }
        // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
        
        // Consumo de SPA
        if ($opcion == "CoSp") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'consumo_spa_R' => $data,
                ]);
        }
        // Consumo de SPA
        
        // Riesgo Desnutrición Aguda
        if ($opcion == "RiDeAg") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'riesgos_desnutricion_aguda_R' => $data,
                ]);
        }
        // Riesgo Desnutrición Aguda
        
        // Riesgo Desnutrición Global
        if ($opcion == "RiDeGl") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'riesgos_desnutricion_global_R' => $data,
                ]);
        }
        // Riesgo Desnutrición Global
        
        // Riesgo de Talla Baja
        if ($opcion == "RiTaBa") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'riesgo_talla_baja_R' => $data,
                ]);
        }
        // Riesgo de Talla Baja
        
        // Riesgo Sobrepeso
        if ($opcion == "RiSo") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_men1')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'riesgo_sobrepeso_R' => $data,
                ]);
        }
        // Riesgo Sobrepeso        
        
    }
}
