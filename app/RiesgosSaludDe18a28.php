<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgosSaludDe18a28 extends Model
{
    protected $table = 'riesgos_salud_de18a28';
    protected $fillable = [
        'id_hogar', 'enfermedades_infecciosas_I', 'transtornos_asociados_spa_I', 'enfermedad_cardiovascular_I', 'cancer_I',
        'alteraciones_transtornos_visuales_I', 'alteraciones_transtornos_audicion_I', 'salud_bucal_I', 'problemas_salud_mental_I', 'violencias_I',
        'enfermedades_respiratorias_I', 'enfermedades_zoonoticas_I', 'transtornos_degenartivos_I', 'consumo_spa_I',
        'riesgo_delgadez_I',

        'enfermedades_infecciosas_R', 'transtornos_asociados_spa_R', 'enfermedad_cardiovascular_R', 'cancer_R',
        'alteraciones_transtornos_visuales_R', 'alteraciones_transtornos_audicion_R', 'salud_bucal_R', 'problemas_salud_mental_R', 'violencias_R',
        'enfermedades_respiratorias_R', 'enfermedades_zoonoticas_R', 'transtornos_degenartivos_R', 'consumo_spa_R',
        'riesgo_delgadez_R',

        'estado', 'id_compania', 'id_inte',

        'proba_enfermedades_infecciosas_I', 'proba_transtornos_asociados_spa_I', 'proba_enfermedad_cardiovascular_I', 'proba_cancer_I',
        'proba_alteraciones_transtornos_visuales_I', 'proba_alteraciones_transtornos_audicion_I', 'proba_salud_bucal_I', 'proba_problemas_salud_mental_I',
        'proba_violencias_I', 'proba_enfermedades_respiratorias_I', 'proba_enfermedades_zoonoticas_I', 'proba_transtornos_degenartivos_I',
        'proba_consumo_spa_I', 'proba_riesgo_delgadez_I', 'opci'
    ];
    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')->updateOrInsert([
            'id_inte' => $data['id_inte'],
            'opci' => $data['opci'],
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
            'riesgo_delgadez_I' => $data['riesgo_delgadez_I'],

            'id_compania' => 1,
            'estado' => $data['estado'],


            'proba_enfermedades_infecciosas_I' => $data['proba_enfermedades_infecciosas_I'],
            'proba_transtornos_asociados_spa_I' => $data['proba_transtornos_asociados_spa_I'],
            'proba_enfermedad_cardiovascular_I' => $data['proba_enfermedad_cardiovascular_I'],
            'proba_cancer_I' => $data['proba_cancer_I'],
            'proba_alteraciones_transtornos_visuales_I' => $data['proba_alteraciones_transtornos_visuales_I'],
            'proba_alteraciones_transtornos_audicion_I' => $data['proba_alteraciones_transtornos_audicion_I'],
            'proba_salud_bucal_I' => $data['proba_salud_bucal_I'],
            'proba_problemas_salud_mental_I' => $data['proba_problemas_salud_mental_I'],

            'proba_violencias_I' => $data['proba_violencias_I'],
            'proba_enfermedades_respiratorias_I' => $data['proba_enfermedades_respiratorias_I'],
            'proba_enfermedades_zoonoticas_I' => $data['proba_enfermedades_zoonoticas_I'],
            'proba_transtornos_degenartivos_I' => $data['proba_transtornos_degenartivos_I'],
            'proba_consumo_spa_I' => $data['proba_consumo_spa_I'],
            'proba_riesgo_delgadez_I' => $data['proba_riesgo_delgadez_I'],            
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        $busc1 = DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
            ->join($alias . '.integrantes', 'integrantes.id', 'riesgos_salud_de18a28.id_inte')
            ->join($alias . '.de18a28', 'integrantes.id', 'de18a28.id_integrante')
            ->where('integrantes.id_hogar', $id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->where('de18a28.estado', 'Activo')
            ->select('riesgos_salud_de18a28.*'
                , "integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape")
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape");

        $busc2 = DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'riesgos_salud_de18a28.id_inte')
            ->join($alias . '.de18a28', 'caracterizacion.id', 'de18a28.id_integrante')
            ->where('caracterizacion.id_hogar', $id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->where('de18a28.estado', 'Activo')
            ->select('riesgos_salud_de18a28.*'
                , "caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape")
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape");

        return $busc2->unionAll($busc1)->get();
    }

    public static function modificar($alias, $id_hogar, $opcion, $data, $id_inte)
    {
        // Enfermedades Infeccisosas
        if ($opcion == "EnIn") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedades_infecciosas_R' => $data,
                ]);
        }
        // Enfermedades Infeccisosas

        // Trastornos Asociados al uso de SPA
        if ($opcion == "TrAsSPA") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'transtornos_asociados_spa_R' => $data,
                ]);
        }
        // Trastornos Asociados al uso de SPA
        
        // Enfermedad Cardiovascular Aterogénica
        if ($opcion == "EnCaAt") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedad_cardiovascular_R' => $data,
                ]);
        }
        // Enfermedad Cardiovascular Aterogénica
        
        // Cancer
        if ($opcion == "Ca") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'cancer_R' => $data,
                ]);
        }
        // Cancer
        
        // Alteraciones y Transtornos Visuales
        if ($opcion == "AlTrVi") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'alteraciones_transtornos_visuales_R' => $data,
                ]);
        }
        // Alteraciones y Transtornos Visuales
        
        // Alteraciones y Transtornos de la Audición y Comunicación
        if ($opcion == "AlTrAuCo") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'alteraciones_transtornos_audicion_R' => $data,
                ]);
        }
        // Alteraciones y Transtornos de la Audición y Comunicación
        
        // Salud Bucal
        if ($opcion == "SaBu") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'salud_bucal_R' => $data,
                ]);
        }
        // Salud Bucal
        
        // Problemas en salud mental
        if ($opcion == "PrSaMe") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'problemas_salud_mental_R' => $data,
                ]);
        }
        // Problemas en salud mental
        
        // Violencias
        if ($opcion == "Vi") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'violencias_R' => $data,
                ]);
        }
        // Violencias
        
        // Enfermedades Respiratorias crónicas
        if ($opcion == "EnReCr") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedades_respiratorias_R' => $data,
                ]);
        }
        // Enfermedades Respiratorias crónicas
        
        // Enfermedades Zoonoticas
        if ($opcion == "EnZo") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'enfermedades_zoonoticas_R' => $data,
                ]);
        }
        // Enfermedades Zoonoticas
        
        // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
        if ($opcion == "TrDeNeEnAu") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'transtornos_degenartivos_R' => $data,
                ]);
        }
        // Trastornos Degenerativos, Neuropatías y Enfermedades Autoinmunes
        
        // Consumo de SPA
        if ($opcion == "CoSp") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'consumo_spa_R' => $data,
                ]);
        }
        // Consumo de SPA    
        
        // Riesgo Delgadez
        if ($opcion == "RiDel") {
            return DB::connection('mysql')->table($alias . '.riesgos_salud_de18a28')
                ->where('id_hogar', $id_hogar)->where('id_inte', $id_inte)
                ->update([
                    'riesgo_delgadez_R' => $data,
                ]);
        }
        // Riesgo Delgadez                   
        
    }    
}
