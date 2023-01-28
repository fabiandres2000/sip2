<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class DashboardRiesgosSalud extends Model
{
    public static function riesgos_poblacion($alias, $tipo, $id, $rango){
        if($tipo == "todos"){
            if($rango == "riesgos_salud_men1"  || $rango == "riesgos_salud_de1a5" || $rango == "riesgos_salud_de6a11" ){
                $riesgosSalud = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select($rango.'.*','integrantes.*','hogar.*')
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('integrantes.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->get();
            }else{
                $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select($rango.'.*','integrantes.*','hogar.*')
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('integrantes.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where($alias.'.'.$rango.'.opci', 'INTE')
                ->get();
    
                $riesgosSaludJefes = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select($rango.'.*','caracterizacion.*','hogar.*')
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('caracterizacion.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where($alias.'.'.$rango.'.opci', 'JEFE')
                ->get();
    
                $riesgosSalud = array();
                
                foreach ($riesgosSaludIntegrantes as &$item) {
                    array_push($riesgosSalud, $item);
                }

                foreach ($riesgosSaludJefes as &$item) {
                    array_push($riesgosSalud, $item);
                }
            }
        }else{
            if($rango == "riesgos_salud_men1"  || $rango == "riesgos_salud_de1a5" || $rango == "riesgos_salud_de6a11" ){
                $riesgosSalud = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select($rango.'.*','integrantes.*','hogar.*')
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('integrantes.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where('hogar.id_'.$tipo, $id)
                ->where($rango.'.estado', 'Activo')
                ->get();
            }else{
                $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select($rango.'.*','integrantes.*','hogar.*')
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('integrantes.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where('hogar.id_'.$tipo, $id)
                ->where($alias.'.'.$rango.'.opci', 'INTE')
                ->get();
    
                $riesgosSaludJefes = DB::connection('mysql')->table($alias.'.'.$rango)
                ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_inte') 
                ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.'.$rango.'.id_hogar') 
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select($rango.'.*','caracterizacion.*','hogar.*')
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('caracterizacion.estado', 'Activo')
                ->where('hogar.estado', 'Activo')
                ->where('hogar.id_'.$tipo, $id)
                ->where($alias.'.'.$rango.'.opci', 'JEFE')
                ->get();
    
                $riesgosSalud = array();
                
                foreach ($riesgosSaludIntegrantes as &$item) {
                    array_push($riesgosSalud, $item);
                }

                foreach ($riesgosSaludJefes as &$item) {
                    array_push($riesgosSalud, $item);
                }
            }
        }

        $riesgosCantidad = self::cantidad_por_riesgo($riesgosSalud, $rango);

        $info = [
            "poblacion" =>  $riesgosSalud,
            "riesgosCantidad" =>  $riesgosCantidad
        ];

        return $info;
    }

    public static function cantidad_por_riesgo($data, $rango){

        if ($rango == "riesgos_salud_men1" || $rango == "riesgos_salud_de1a5") {

            $enfermedades_infecciosas_I = 0; $enfermedades_infecciosas_II = 0; $enfermedades_infecciosas_III = 0; $enfermedades_infecciosas_IIII = 0;
            $transtornos_asociados_spa_I = 0; $transtornos_asociados_spa_II = 0; $transtornos_asociados_spa_III = 0; $transtornos_asociados_spa_IIII = 0;
            $enfermedad_cardiovascular_I = 0; $enfermedad_cardiovascular_II = 0; $enfermedad_cardiovascular_III = 0; $enfermedad_cardiovascular_IIII = 0;
            $cancer_I = 0;$cancer_II = 0;$cancer_III = 0;$cancer_IIII = 0; 
            $alteraciones_transtornos_visuales_I = 0; $alteraciones_transtornos_visuales_II = 0; $alteraciones_transtornos_visuales_III = 0; $alteraciones_transtornos_visuales_IIII = 0;
            $alteraciones_transtornos_audicion_I = 0; $alteraciones_transtornos_audicion_II = 0; $alteraciones_transtornos_audicion_III = 0; $alteraciones_transtornos_audicion_IIII = 0;
            $salud_bucal_I = 0;  $salud_bucal_II = 0;  $salud_bucal_III = 0;  $salud_bucal_IIII = 0;
            $problemas_salud_mental_I = 0; $problemas_salud_mental_II = 0; $problemas_salud_mental_III = 0; $problemas_salud_mental_IIII = 0;
            $enfermedades_respiratorias_I = 0;  $enfermedades_respiratorias_II = 0;  $enfermedades_respiratorias_III = 0; $enfermedades_respiratorias_IIII = 0;
            $enfermedades_zoonoticas_I = 0; $enfermedades_zoonoticas_II = 0; $enfermedades_zoonoticas_III = 0; $enfermedades_zoonoticas_IIII = 0;
            $transtornos_degenartivos_I = 0; $transtornos_degenartivos_II = 0; $transtornos_degenartivos_III = 0; $transtornos_degenartivos_IIII = 0;
            $consumo_spa_I = 0; $consumo_spa_II = 0; $consumo_spa_III = 0; $consumo_spa_IIII = 0;
            $riesgos_desnutricion_aguda_I = 0; $riesgos_desnutricion_aguda_II = 0; $riesgos_desnutricion_aguda_III = 0; $riesgos_desnutricion_aguda_IIII = 0;
            $riesgos_desnutricion_global_I = 0; $riesgos_desnutricion_global_II = 0; $riesgos_desnutricion_global_III = 0; $riesgos_desnutricion_global_IIII = 0;
            $riesgo_talla_baja_I = 0; $riesgo_talla_baja_II = 0; $riesgo_talla_baja_III = 0; $riesgo_talla_baja_IIII = 0;
            $riesgo_muerte_I = 0; $riesgo_muerte_II = 0;$riesgo_muerte_III = 0;$riesgo_muerte_IIII = 0;
            $riesgo_sobrepeso_I = 0; $riesgo_sobrepeso_II = 0; $riesgo_sobrepeso_III = 0; $riesgo_sobrepeso_IIII = 0;
            $violencias_I = 0;  $violencias_II = 0;  $violencias_III = 0;  $violencias_IIII = 0;

            foreach ($data as $item) {
                if($item->enfermedades_infecciosas_R == 0 || $item->enfermedades_infecciosas_R == 1){
                    $enfermedades_infecciosas_I += 1;
                }else{
                    if($item->enfermedades_infecciosas_R == 2){
                        $enfermedades_infecciosas_II += 1;
                    }else{
                        if($item->enfermedades_infecciosas_R == 3){
                            $enfermedades_infecciosas_III += 1;
                        }else{
                            $enfermedades_infecciosas_IIII += 1;
                        }
                    }
                }
                
                if($item->transtornos_asociados_spa_R == 0 || $item->transtornos_asociados_spa_R == 1){
                    $transtornos_asociados_spa_I += 1;
                }else{
                    if($item->transtornos_asociados_spa_R == 2){
                        $transtornos_asociados_spa_II += 1;
                    }else{
                        if($item->transtornos_asociados_spa_R == 3){
                            $transtornos_asociados_spa_III += 1;
                        }else{
                            $transtornos_asociados_spa_IIII += 1;
                        }
                    }
                }

                if($item->enfermedad_cardiovascular_R == 0 || $item->enfermedad_cardiovascular_R == 1){
                    $enfermedad_cardiovascular_I += 1;
                }else{
                    if($item->enfermedad_cardiovascular_R == 2){
                        $enfermedad_cardiovascular_II += 1;
                    }else{
                        if($item->enfermedad_cardiovascular_R == 3){
                            $enfermedad_cardiovascular_III += 1;
                        }else{
                            $enfermedad_cardiovascular_IIII += 1;
                        }
                    }
                }

                if($item->cancer_R == 0 || $item->cancer_R == 1){
                    $cancer_I += 1;
                }else{
                    if($item->cancer_R == 2){
                        $cancer_II += 1;
                    }else{
                        if($item->cancer_R == 3){
                            $cancer_III += 1;
                        }else{
                            $cancer_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_visuales_R == 0 || $item->alteraciones_transtornos_visuales_R == 1){
                    $alteraciones_transtornos_visuales_I += 1;
                }else{
                    if($item->alteraciones_transtornos_visuales_R == 2){
                        $alteraciones_transtornos_visuales_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_visuales_R == 3){
                            $alteraciones_transtornos_visuales_III += 1;
                        }else{
                            $alteraciones_transtornos_visuales_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_audicion_R == 0 || $item->alteraciones_transtornos_audicion_R == 1){
                    $alteraciones_transtornos_audicion_I += 1;
                }else{
                    if($item->alteraciones_transtornos_audicion_R == 2){
                        $alteraciones_transtornos_audicion_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_audicion_R == 3){
                            $alteraciones_transtornos_audicion_III += 1;
                        }else{
                            $alteraciones_transtornos_audicion_IIII += 1;
                        }
                    }
                }

                if($item->salud_bucal_R == 0 || $item->salud_bucal_R == 1){
                    $salud_bucal_I += 1;
                }else{
                    if($item->salud_bucal_R == 2){
                        $salud_bucal_II += 1;
                    }else{
                        if($item->salud_bucal_R == 3){
                            $salud_bucal_III += 1;
                        }else{
                            $salud_bucal_IIII += 1;
                        }
                    }
                }

                if($item->problemas_salud_mental_R == 0 || $item->problemas_salud_mental_R == 1){
                    $problemas_salud_mental_I += 1;
                }else{
                    if($item->problemas_salud_mental_R == 2){
                        $problemas_salud_mental_II += 1;
                    }else{
                        if($item->problemas_salud_mental_R == 3){
                            $problemas_salud_mental_III += 1;
                        }else{
                            $problemas_salud_mental_IIII += 1;
                        }
                    }
                }

                if($item->violencias_R == 0 || $item->violencias_R == 1){
                    $violencias_I += 1;
                }else{
                    if($item->violencias_R == 2){
                        $violencias_II += 1;
                    }else{
                        if($item->violencias_R == 3){
                            $violencias_III += 1;
                        }else{
                            $violencias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_respiratorias_R == 0 || $item->enfermedades_respiratorias_R == 1){
                    $enfermedades_respiratorias_I += 1;
                }else{
                    if($item->enfermedades_respiratorias_R == 2){
                        $enfermedades_respiratorias_II += 1;
                    }else{
                        if($item->enfermedades_respiratorias_R == 3){
                            $enfermedades_respiratorias_III += 1;
                        }else{
                            $enfermedades_respiratorias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_zoonoticas_R == 0 || $item->enfermedades_zoonoticas_R == 1){
                    $enfermedades_zoonoticas_I += 1;
                }else{
                    if($item->enfermedades_zoonoticas_R == 2){
                        $enfermedades_zoonoticas_II += 1;
                    }else{
                        if($item->enfermedades_zoonoticas_R == 3){
                            $enfermedades_zoonoticas_III += 1;
                        }else{
                            $enfermedades_zoonoticas_IIII += 1;
                        }
                    }
                }

                if($item->transtornos_degenartivos_R == 0 || $item->transtornos_degenartivos_R == 1){
                    $transtornos_degenartivos_I += 1;
                }else{
                    if($item->transtornos_degenartivos_R == 2){
                        $transtornos_degenartivos_II += 1;
                    }else{
                        if($item->transtornos_degenartivos_R == 3){
                            $transtornos_degenartivos_III += 1;
                        }else{
                            $transtornos_degenartivos_IIII += 1;
                        }
                    }
                }

                if($item->consumo_spa_R == 0 || $item->consumo_spa_R == 1){
                    $consumo_spa_I += 1;
                }else{
                    if($item->consumo_spa_R == 2){
                        $consumo_spa_II += 1;
                    }else{
                        if($item->consumo_spa_R == 3){
                            $consumo_spa_III += 1;
                        }else{
                            $consumo_spa_IIII += 1;
                        }
                    }
                }

                if($item->riesgos_desnutricion_aguda_R == 0 || $item->riesgos_desnutricion_aguda_R == 1){
                    $riesgos_desnutricion_aguda_I += 1;
                }else{
                    if($item->riesgos_desnutricion_aguda_R == 2){
                        $riesgos_desnutricion_aguda_II += 1;
                    }else{
                        if($item->riesgos_desnutricion_aguda_R == 3){
                            $riesgos_desnutricion_aguda_III += 1;
                        }else{
                            $riesgos_desnutricion_aguda_IIII += 1;
                        }
                    }
                }

                if($item->riesgos_desnutricion_global_R == 0 || $item->riesgos_desnutricion_global_R == 1){
                    $riesgos_desnutricion_global_I += 1;
                }else{
                    if($item->riesgos_desnutricion_global_R == 2){
                        $riesgos_desnutricion_global_II += 1;
                    }else{
                        if($item->riesgos_desnutricion_global_R == 3){
                            $riesgos_desnutricion_global_III += 1;
                        }else{
                            $riesgos_desnutricion_global_IIII += 1;
                        }
                    }
                }


                if($item->riesgo_talla_baja_R == 0 || $item->riesgo_talla_baja_R == 1){
                    $riesgo_talla_baja_I += 1;
                }else{
                    if($item->riesgo_talla_baja_R == 2){
                        $riesgo_talla_baja_II += 1;
                    }else{
                        if($item->riesgo_talla_baja_R == 3){
                            $riesgo_talla_baja_III += 1;
                        }else{
                            $riesgo_talla_baja_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_muerte_R == 0 || $item->riesgo_muerte_R == 1){
                    $riesgo_muerte_I += 1;
                }else{
                    if($item->riesgo_muerte_R == 2){
                        $riesgo_muerte_II += 1;
                    }else{
                        if($item->riesgo_muerte_R == 3){
                            $riesgo_muerte_III += 1;
                        }else{
                            $riesgo_muerte_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_sobrepeso_R == 0 || $item->riesgo_sobrepeso_R == 1){
                    $riesgo_sobrepeso_I += 1;
                }else{
                    if($item->riesgo_sobrepeso_R == 2){
                        $riesgo_sobrepeso_II += 1;
                    }else{
                        if($item->riesgo_sobrepeso_R == 3){
                            $riesgo_sobrepeso_III += 1;
                        }else{
                            $riesgo_sobrepeso_IIII += 1;
                        }
                    }
                }
            }
            
            $info = [
                "enfermedades_infecciosas" =>  [
                    "Inexistente" => $enfermedades_infecciosas_I,
                    "Bajo" => $enfermedades_infecciosas_II,
                    "Moderado" => $enfermedades_infecciosas_III,
                    "Alto" => $enfermedades_infecciosas_IIII,
                ],
                "transtornos_asociados_spa" =>  [
                    "Inexistente" => $transtornos_asociados_spa_I,
                    "Bajo" => $transtornos_asociados_spa_II,
                    "Moderado" => $transtornos_asociados_spa_III,
                    "Alto" => $transtornos_asociados_spa_IIII,
                ],
                "enfermedad_cardiovascular" =>  [
                    "Inexistente" => $enfermedad_cardiovascular_I,
                    "Bajo" => $enfermedad_cardiovascular_II,
                    "Moderado" => $enfermedad_cardiovascular_III,
                    "Alto" => $enfermedad_cardiovascular_IIII,
                ],
                "cancer" =>  [
                    "Inexistente" => $cancer_I,
                    "Bajo" => $cancer_II,
                    "Moderado" => $cancer_III,
                    "Alto" => $cancer_IIII,
                ],
                "alteraciones_transtornos_visuales" =>  [
                    "Inexistente" => $alteraciones_transtornos_visuales_I,
                    "Bajo" => $alteraciones_transtornos_visuales_II,
                    "Moderado" => $alteraciones_transtornos_visuales_III,
                    "Alto" => $alteraciones_transtornos_visuales_IIII,
                ],
                "alteraciones_transtornos_audicion" =>  [
                    "Inexistente" => $alteraciones_transtornos_audicion_I,
                    "Bajo" => $alteraciones_transtornos_audicion_II,
                    "Moderado" => $alteraciones_transtornos_audicion_III,
                    "Alto" => $alteraciones_transtornos_audicion_IIII,
                ],
                "salud_bucal" =>  [
                    "Inexistente" => $salud_bucal_I,
                    "Bajo" => $salud_bucal_II,
                    "Moderado" => $salud_bucal_III,
                    "Alto" => $salud_bucal_IIII,
                ],
                "problemas_salud_mental" =>  [
                    "Inexistente" => $problemas_salud_mental_I,
                    "Bajo" => $problemas_salud_mental_II,
                    "Moderado" => $problemas_salud_mental_III,
                    "Alto" => $problemas_salud_mental_IIII,
                ],
                "enfermedades_respiratorias" =>  [
                    "Inexistente" => $enfermedades_respiratorias_I,
                    "Bajo" => $enfermedades_respiratorias_II,
                    "Moderado" => $enfermedades_respiratorias_III,
                    "Alto" => $enfermedades_respiratorias_IIII,
                ],
                "enfermedades_zoonoticas" =>  [
                    "Inexistente" => $enfermedades_zoonoticas_I,
                    "Bajo" => $enfermedades_zoonoticas_II,
                    "Moderado" => $enfermedades_zoonoticas_III,
                    "Alto" => $enfermedades_zoonoticas_IIII,
                ],
                "transtornos_degenartivos" =>  [
                    "Inexistente" => $transtornos_degenartivos_I,
                    "Bajo" => $transtornos_degenartivos_II,
                    "Moderado" => $transtornos_degenartivos_III,
                    "Alto" => $transtornos_degenartivos_IIII,
                ],
                "consumo_spa" =>  [
                    "Inexistente" => $consumo_spa_I,
                    "Bajo" => $consumo_spa_II,
                    "Moderado" => $consumo_spa_III,
                    "Alto" => $consumo_spa_IIII,
                ],
                "riesgos_desnutricion_aguda" =>  [
                    "Inexistente" => $riesgos_desnutricion_aguda_I,
                    "Bajo" => $riesgos_desnutricion_aguda_II,
                    "Moderado" => $riesgos_desnutricion_aguda_III,
                    "Alto" => $riesgos_desnutricion_aguda_IIII,
                ],
                "riesgos_desnutricion_global" =>  [
                    "Inexistente" => $riesgos_desnutricion_global_I,
                    "Bajo" => $riesgos_desnutricion_global_II,
                    "Moderado" => $riesgos_desnutricion_global_III,
                    "Alto" => $riesgos_desnutricion_global_IIII,
                ],
                "riesgo_talla_baja" =>  [
                    "Inexistente" => $riesgo_talla_baja_I,
                    "Bajo" => $riesgo_talla_baja_II,
                    "Moderado" => $riesgo_talla_baja_III,
                    "Alto" => $riesgo_talla_baja_IIII,
                ],
                "riesgo_muerte" =>  [
                    "Inexistente" => $riesgo_muerte_I,
                    "Bajo" => $riesgo_muerte_II,
                    "Moderado" => $riesgo_muerte_III,
                    "Alto" => $riesgo_muerte_IIII,
                ],
                "riesgo_sobrepeso" =>  [
                    "Inexistente" => $riesgo_sobrepeso_I,
                    "Bajo" => $riesgo_sobrepeso_II,
                    "Moderado" => $riesgo_sobrepeso_III,
                    "Alto" => $riesgo_sobrepeso_IIII,
                ],
                "violencias" =>  [
                    "Inexistente" => $violencias_I,
                    "Bajo" => $violencias_II,
                    "Moderado" => $violencias_III,
                    "Alto" => $violencias_IIII,
                ]
            ];

            return $info;
        }

        //de 6 a 11 años -------  de 12 a 18 años
        if ($rango == "riesgos_salud_de6a11" || $rango == "riesgos_salud_de12a17" ) {

            $enfermedades_infecciosas_I = 0; $enfermedades_infecciosas_II = 0; $enfermedades_infecciosas_III = 0; $enfermedades_infecciosas_IIII = 0;
            $transtornos_asociados_spa_I = 0; $transtornos_asociados_spa_II = 0; $transtornos_asociados_spa_III = 0; $transtornos_asociados_spa_IIII = 0;
            $enfermedad_cardiovascular_I = 0; $enfermedad_cardiovascular_II = 0; $enfermedad_cardiovascular_III = 0; $enfermedad_cardiovascular_IIII = 0;
            $cancer_I = 0;$cancer_II = 0;$cancer_III = 0;$cancer_IIII = 0; 
            $alteraciones_transtornos_visuales_I = 0; $alteraciones_transtornos_visuales_II = 0; $alteraciones_transtornos_visuales_III = 0; $alteraciones_transtornos_visuales_IIII = 0;
            $alteraciones_transtornos_audicion_I = 0; $alteraciones_transtornos_audicion_II = 0; $alteraciones_transtornos_audicion_III = 0; $alteraciones_transtornos_audicion_IIII = 0;
            $salud_bucal_I = 0;  $salud_bucal_II = 0;  $salud_bucal_III = 0;  $salud_bucal_IIII = 0;
            $problemas_salud_mental_I = 0; $problemas_salud_mental_II = 0; $problemas_salud_mental_III = 0; $problemas_salud_mental_IIII = 0;
            $enfermedades_respiratorias_I = 0;  $enfermedades_respiratorias_II = 0;  $enfermedades_respiratorias_III = 0; $enfermedades_respiratorias_IIII = 0;
            $enfermedades_zoonoticas_I = 0; $enfermedades_zoonoticas_II = 0; $enfermedades_zoonoticas_III = 0; $enfermedades_zoonoticas_IIII = 0;
            $transtornos_degenartivos_I = 0; $transtornos_degenartivos_II = 0; $transtornos_degenartivos_III = 0; $transtornos_degenartivos_IIII = 0;
            $consumo_spa_I = 0; $consumo_spa_II = 0; $consumo_spa_III = 0; $consumo_spa_IIII = 0;
            $riesgo_talla_baja_I = 0; $riesgo_talla_baja_II = 0; $riesgo_talla_baja_III = 0; $riesgo_talla_baja_IIII = 0;
            $violencias_I = 0;  $violencias_II = 0;  $violencias_III = 0;  $violencias_IIII = 0;
            $riesgo_delgadez_I = 0;  $riesgo_delgadez_II = 0; $riesgo_delgadez_III = 0; $riesgo_delgadez_IIII = 0;

            foreach ($data as $item) {

                if($item->riesgo_delgadez_I == 0 || $item->riesgo_delgadez_I == 1){
                    $riesgo_delgadez_I += 1;
                }else{
                    if($item->riesgo_delgadez_I == 2){
                        $riesgo_delgadez_II += 1;
                    }else{
                        if($item->riesgo_delgadez_I == 3){
                            $riesgo_delgadez_III += 1;
                        }else{
                            $riesgo_delgadez_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_infecciosas_R == 0 || $item->enfermedades_infecciosas_R == 1){
                    $enfermedades_infecciosas_I += 1;
                }else{
                    if($item->enfermedades_infecciosas_R == 2){
                        $enfermedades_infecciosas_II += 1;
                    }else{
                        if($item->enfermedades_infecciosas_R == 3){
                            $enfermedades_infecciosas_III += 1;
                        }else{
                            $enfermedades_infecciosas_IIII += 1;
                        }
                    }
                }
                
                if($item->transtornos_asociados_spa_R == 0 || $item->transtornos_asociados_spa_R == 1){
                    $transtornos_asociados_spa_I += 1;
                }else{
                    if($item->transtornos_asociados_spa_R == 2){
                        $transtornos_asociados_spa_II += 1;
                    }else{
                        if($item->transtornos_asociados_spa_R == 3){
                            $transtornos_asociados_spa_III += 1;
                        }else{
                            $transtornos_asociados_spa_IIII += 1;
                        }
                    }
                }

                if($item->enfermedad_cardiovascular_R == 0 || $item->enfermedad_cardiovascular_R == 1){
                    $enfermedad_cardiovascular_I += 1;
                }else{
                    if($item->enfermedad_cardiovascular_R == 2){
                        $enfermedad_cardiovascular_II += 1;
                    }else{
                        if($item->enfermedad_cardiovascular_R == 3){
                            $enfermedad_cardiovascular_III += 1;
                        }else{
                            $enfermedad_cardiovascular_IIII += 1;
                        }
                    }
                }

                if($item->cancer_R == 0 || $item->cancer_R == 1){
                    $cancer_I += 1;
                }else{
                    if($item->cancer_R == 2){
                        $cancer_II += 1;
                    }else{
                        if($item->cancer_R == 3){
                            $cancer_III += 1;
                        }else{
                            $cancer_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_visuales_R == 0 || $item->alteraciones_transtornos_visuales_R == 1){
                    $alteraciones_transtornos_visuales_I += 1;
                }else{
                    if($item->alteraciones_transtornos_visuales_R == 2){
                        $alteraciones_transtornos_visuales_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_visuales_R == 3){
                            $alteraciones_transtornos_visuales_III += 1;
                        }else{
                            $alteraciones_transtornos_visuales_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_audicion_R == 0 || $item->alteraciones_transtornos_audicion_R == 1){
                    $alteraciones_transtornos_audicion_I += 1;
                }else{
                    if($item->alteraciones_transtornos_audicion_R == 2){
                        $alteraciones_transtornos_audicion_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_audicion_R == 3){
                            $alteraciones_transtornos_audicion_III += 1;
                        }else{
                            $alteraciones_transtornos_audicion_IIII += 1;
                        }
                    }
                }

                if($item->salud_bucal_R == 0 || $item->salud_bucal_R == 1){
                    $salud_bucal_I += 1;
                }else{
                    if($item->salud_bucal_R == 2){
                        $salud_bucal_II += 1;
                    }else{
                        if($item->salud_bucal_R == 3){
                            $salud_bucal_III += 1;
                        }else{
                            $salud_bucal_IIII += 1;
                        }
                    }
                }

                if($item->problemas_salud_mental_R == 0 || $item->problemas_salud_mental_R == 1){
                    $problemas_salud_mental_I += 1;
                }else{
                    if($item->problemas_salud_mental_R == 2){
                        $problemas_salud_mental_II += 1;
                    }else{
                        if($item->problemas_salud_mental_R == 3){
                            $problemas_salud_mental_III += 1;
                        }else{
                            $problemas_salud_mental_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_respiratorias_R == 0 || $item->enfermedades_respiratorias_R == 1){
                    $enfermedades_respiratorias_I += 1;
                }else{
                    if($item->enfermedades_respiratorias_R == 2){
                        $enfermedades_respiratorias_II += 1;
                    }else{
                        if($item->enfermedades_respiratorias_R == 3){
                            $enfermedades_respiratorias_III += 1;
                        }else{
                            $enfermedades_respiratorias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_zoonoticas_R == 0 || $item->enfermedades_zoonoticas_R == 1){
                    $enfermedades_zoonoticas_I += 1;
                }else{
                    if($item->enfermedades_zoonoticas_R == 2){
                        $enfermedades_zoonoticas_II += 1;
                    }else{
                        if($item->enfermedades_zoonoticas_R == 3){
                            $enfermedades_zoonoticas_III += 1;
                        }else{
                            $enfermedades_zoonoticas_IIII += 1;
                        }
                    }
                }

                if($item->transtornos_degenartivos_R == 0 || $item->transtornos_degenartivos_R == 1){
                    $transtornos_degenartivos_I += 1;
                }else{
                    if($item->transtornos_degenartivos_R == 2){
                        $transtornos_degenartivos_II += 1;
                    }else{
                        if($item->transtornos_degenartivos_R == 3){
                            $transtornos_degenartivos_III += 1;
                        }else{
                            $transtornos_degenartivos_IIII += 1;
                        }
                    }
                }

                if($item->consumo_spa_R == 0 || $item->consumo_spa_R == 1){
                    $consumo_spa_I += 1;
                }else{
                    if($item->consumo_spa_R == 2){
                        $consumo_spa_II += 1;
                    }else{
                        if($item->consumo_spa_R == 3){
                            $consumo_spa_III += 1;
                        }else{
                            $consumo_spa_IIII += 1;
                        }
                    }
                }

                if($item->riesgo_talla_baja_R == 0 || $item->riesgo_talla_baja_R == 1){
                    $riesgo_talla_baja_I += 1;
                }else{
                    if($item->riesgo_talla_baja_R == 2){
                        $riesgo_talla_baja_II += 1;
                    }else{
                        if($item->riesgo_talla_baja_R == 3){
                            $riesgo_talla_baja_III += 1;
                        }else{
                            $riesgo_talla_baja_IIII += 1;
                        }
                    }
                }

                if($item->violencias_R == 0 || $item->violencias_R == 1){
                    $violencias_I += 1;
                }else{
                    if($item->violencias_R == 2){
                        $violencias_II += 1;
                    }else{
                        if($item->violencias_R == 3){
                            $violencias_III += 1;
                        }else{
                            $violencias_IIII += 1;
                        }
                    }
                }
            }
            $info = [
                "riesgo_delgadez" =>  [
                    "Inexistente" => $riesgo_delgadez_I,
                    "Bajo" => $riesgo_delgadez_II,
                    "Moderado" => $riesgo_delgadez_III,
                    "Alto" => $riesgo_delgadez_IIII,
                ],
                "enfermedades_infecciosas" =>  [
                    "Inexistente" => $enfermedades_infecciosas_I,
                    "Bajo" => $enfermedades_infecciosas_II,
                    "Moderado" => $enfermedades_infecciosas_III,
                    "Alto" => $enfermedades_infecciosas_IIII,
                ],
                "transtornos_asociados_spa" =>  [
                    "Inexistente" => $transtornos_asociados_spa_I,
                    "Bajo" => $transtornos_asociados_spa_II,
                    "Moderado" => $transtornos_asociados_spa_III,
                    "Alto" => $transtornos_asociados_spa_IIII,
                ],
                "enfermedad_cardiovascular" =>  [
                    "Inexistente" => $enfermedad_cardiovascular_I,
                    "Bajo" => $enfermedad_cardiovascular_II,
                    "Moderado" => $enfermedad_cardiovascular_III,
                    "Alto" => $enfermedad_cardiovascular_IIII,
                ],
                "cancer" =>  [
                    "Inexistente" => $cancer_I,
                    "Bajo" => $cancer_II,
                    "Moderado" => $cancer_III,
                    "Alto" => $cancer_IIII,
                ],
                "alteraciones_transtornos_visuales" =>  [
                    "Inexistente" => $alteraciones_transtornos_visuales_I,
                    "Bajo" => $alteraciones_transtornos_visuales_II,
                    "Moderado" => $alteraciones_transtornos_visuales_III,
                    "Alto" => $alteraciones_transtornos_visuales_IIII,
                ],
                "alteraciones_transtornos_audicion" =>  [
                    "Inexistente" => $alteraciones_transtornos_audicion_I,
                    "Bajo" => $alteraciones_transtornos_audicion_II,
                    "Moderado" => $alteraciones_transtornos_audicion_III,
                    "Alto" => $alteraciones_transtornos_audicion_IIII,
                ],
                "salud_bucal" =>  [
                    "Inexistente" => $salud_bucal_I,
                    "Bajo" => $salud_bucal_II,
                    "Moderado" => $salud_bucal_III,
                    "Alto" => $salud_bucal_IIII,
                ],
                "problemas_salud_mental" =>  [
                    "Inexistente" => $problemas_salud_mental_I,
                    "Bajo" => $problemas_salud_mental_II,
                    "Moderado" => $problemas_salud_mental_III,
                    "Alto" => $problemas_salud_mental_IIII,
                ],
                "enfermedades_respiratorias" =>  [
                    "Inexistente" => $enfermedades_respiratorias_I,
                    "Bajo" => $enfermedades_respiratorias_II,
                    "Moderado" => $enfermedades_respiratorias_III,
                    "Alto" => $enfermedades_respiratorias_IIII,
                ],
                "enfermedades_zoonoticas" =>  [
                    "Inexistente" => $enfermedades_zoonoticas_I,
                    "Bajo" => $enfermedades_zoonoticas_II,
                    "Moderado" => $enfermedades_zoonoticas_III,
                    "Alto" => $enfermedades_zoonoticas_IIII,
                ],
                "transtornos_degenartivos" =>  [
                    "Inexistente" => $transtornos_degenartivos_I,
                    "Bajo" => $transtornos_degenartivos_II,
                    "Moderado" => $transtornos_degenartivos_III,
                    "Alto" => $transtornos_degenartivos_IIII,
                ],
                "consumo_spa" =>  [
                    "Inexistente" => $consumo_spa_I,
                    "Bajo" => $consumo_spa_II,
                    "Moderado" => $consumo_spa_III,
                    "Alto" => $consumo_spa_IIII,
                ],
                "riesgo_talla_baja" =>  [
                    "Inexistente" => $riesgo_talla_baja_I,
                    "Bajo" => $riesgo_talla_baja_II,
                    "Moderado" => $riesgo_talla_baja_III,
                    "Alto" => $riesgo_talla_baja_IIII,
                ],           
                "violencias" =>  [
                    "Inexistente" => $violencias_I,
                    "Bajo" => $violencias_II,
                    "Moderado" => $violencias_III,
                    "Alto" => $violencias_IIII,
                ],
            ];

            return $info;
        }

        // de 18 a 28 años  -----  de 29 a 59 años
        if ($rango == "riesgos_salud_de18a28" || $rango == "riesgos_salud_de29a59") {

            $enfermedades_infecciosas_I = 0; $enfermedades_infecciosas_II = 0; $enfermedades_infecciosas_III = 0; $enfermedades_infecciosas_IIII = 0;
            $transtornos_asociados_spa_I = 0; $transtornos_asociados_spa_II = 0; $transtornos_asociados_spa_III = 0; $transtornos_asociados_spa_IIII = 0;
            $enfermedad_cardiovascular_I = 0; $enfermedad_cardiovascular_II = 0; $enfermedad_cardiovascular_III = 0; $enfermedad_cardiovascular_IIII = 0;
            $cancer_I = 0;$cancer_II = 0;$cancer_III = 0;$cancer_IIII = 0; 
            $alteraciones_transtornos_visuales_I = 0; $alteraciones_transtornos_visuales_II = 0; $alteraciones_transtornos_visuales_III = 0; $alteraciones_transtornos_visuales_IIII = 0;
            $alteraciones_transtornos_audicion_I = 0; $alteraciones_transtornos_audicion_II = 0; $alteraciones_transtornos_audicion_III = 0; $alteraciones_transtornos_audicion_IIII = 0;
            $salud_bucal_I = 0;  $salud_bucal_II = 0;  $salud_bucal_III = 0;  $salud_bucal_IIII = 0;
            $problemas_salud_mental_I = 0; $problemas_salud_mental_II = 0; $problemas_salud_mental_III = 0; $problemas_salud_mental_IIII = 0;
            $enfermedades_respiratorias_I = 0;  $enfermedades_respiratorias_II = 0;  $enfermedades_respiratorias_III = 0; $enfermedades_respiratorias_IIII = 0;
            $enfermedades_zoonoticas_I = 0; $enfermedades_zoonoticas_II = 0; $enfermedades_zoonoticas_III = 0; $enfermedades_zoonoticas_IIII = 0;
            $transtornos_degenartivos_I = 0; $transtornos_degenartivos_II = 0; $transtornos_degenartivos_III = 0; $transtornos_degenartivos_IIII = 0;
            $consumo_spa_I = 0; $consumo_spa_II = 0; $consumo_spa_III = 0; $consumo_spa_IIII = 0;
            $violencias_I = 0;  $violencias_II = 0;  $violencias_III = 0;  $violencias_IIII = 0;
            $riesgo_delgadez_I = 0;  $riesgo_delgadez_II = 0; $riesgo_delgadez_III = 0; $riesgo_delgadez_IIII = 0;

            foreach ($data as $item) {

                if($item->riesgo_delgadez_I == 0 || $item->riesgo_delgadez_I == 1){
                    $riesgo_delgadez_I += 1;
                }else{
                    if($item->riesgo_delgadez_I == 2){
                        $riesgo_delgadez_II += 1;
                    }else{
                        if($item->riesgo_delgadez_I == 3){
                            $riesgo_delgadez_III += 1;
                        }else{
                            $riesgo_delgadez_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_infecciosas_R == 0 || $item->enfermedades_infecciosas_R == 1){
                    $enfermedades_infecciosas_I += 1;
                }else{
                    if($item->enfermedades_infecciosas_R == 2){
                        $enfermedades_infecciosas_II += 1;
                    }else{
                        if($item->enfermedades_infecciosas_R == 3){
                            $enfermedades_infecciosas_III += 1;
                        }else{
                            $enfermedades_infecciosas_IIII += 1;
                        }
                    }
                }
                
                if($item->transtornos_asociados_spa_R == 0 || $item->transtornos_asociados_spa_R == 1){
                    $transtornos_asociados_spa_I += 1;
                }else{
                    if($item->transtornos_asociados_spa_R == 2){
                        $transtornos_asociados_spa_II += 1;
                    }else{
                        if($item->transtornos_asociados_spa_R == 3){
                            $transtornos_asociados_spa_III += 1;
                        }else{
                            $transtornos_asociados_spa_IIII += 1;
                        }
                    }
                }

                if($item->enfermedad_cardiovascular_R == 0 || $item->enfermedad_cardiovascular_R == 1){
                    $enfermedad_cardiovascular_I += 1;
                }else{
                    if($item->enfermedad_cardiovascular_R == 2){
                        $enfermedad_cardiovascular_II += 1;
                    }else{
                        if($item->enfermedad_cardiovascular_R == 3){
                            $enfermedad_cardiovascular_III += 1;
                        }else{
                            $enfermedad_cardiovascular_IIII += 1;
                        }
                    }
                }

                if($item->cancer_R == 0 || $item->cancer_R == 1){
                    $cancer_I += 1;
                }else{
                    if($item->cancer_R == 2){
                        $cancer_II += 1;
                    }else{
                        if($item->cancer_R == 3){
                            $cancer_III += 1;
                        }else{
                            $cancer_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_visuales_R == 0 || $item->alteraciones_transtornos_visuales_R == 1){
                    $alteraciones_transtornos_visuales_I += 1;
                }else{
                    if($item->alteraciones_transtornos_visuales_R == 2){
                        $alteraciones_transtornos_visuales_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_visuales_R == 3){
                            $alteraciones_transtornos_visuales_III += 1;
                        }else{
                            $alteraciones_transtornos_visuales_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_audicion_R == 0 || $item->alteraciones_transtornos_audicion_R == 1){
                    $alteraciones_transtornos_audicion_I += 1;
                }else{
                    if($item->alteraciones_transtornos_audicion_R == 2){
                        $alteraciones_transtornos_audicion_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_audicion_R == 3){
                            $alteraciones_transtornos_audicion_III += 1;
                        }else{
                            $alteraciones_transtornos_audicion_IIII += 1;
                        }
                    }
                }

                if($item->salud_bucal_R == 0 || $item->salud_bucal_R == 1){
                    $salud_bucal_I += 1;
                }else{
                    if($item->salud_bucal_R == 2){
                        $salud_bucal_II += 1;
                    }else{
                        if($item->salud_bucal_R == 3){
                            $salud_bucal_III += 1;
                        }else{
                            $salud_bucal_IIII += 1;
                        }
                    }
                }

                if($item->problemas_salud_mental_R == 0 || $item->problemas_salud_mental_R == 1){
                    $problemas_salud_mental_I += 1;
                }else{
                    if($item->problemas_salud_mental_R == 2){
                        $problemas_salud_mental_II += 1;
                    }else{
                        if($item->problemas_salud_mental_R == 3){
                            $problemas_salud_mental_III += 1;
                        }else{
                            $problemas_salud_mental_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_respiratorias_R == 0 || $item->enfermedades_respiratorias_R == 1){
                    $enfermedades_respiratorias_I += 1;
                }else{
                    if($item->enfermedades_respiratorias_R == 2){
                        $enfermedades_respiratorias_II += 1;
                    }else{
                        if($item->enfermedades_respiratorias_R == 3){
                            $enfermedades_respiratorias_III += 1;
                        }else{
                            $enfermedades_respiratorias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_zoonoticas_R == 0 || $item->enfermedades_zoonoticas_R == 1){
                    $enfermedades_zoonoticas_I += 1;
                }else{
                    if($item->enfermedades_zoonoticas_R == 2){
                        $enfermedades_zoonoticas_II += 1;
                    }else{
                        if($item->enfermedades_zoonoticas_R == 3){
                            $enfermedades_zoonoticas_III += 1;
                        }else{
                            $enfermedades_zoonoticas_IIII += 1;
                        }
                    }
                }

                if($item->transtornos_degenartivos_R == 0 || $item->transtornos_degenartivos_R == 1){
                    $transtornos_degenartivos_I += 1;
                }else{
                    if($item->transtornos_degenartivos_R == 2){
                        $transtornos_degenartivos_II += 1;
                    }else{
                        if($item->transtornos_degenartivos_R == 3){
                            $transtornos_degenartivos_III += 1;
                        }else{
                            $transtornos_degenartivos_IIII += 1;
                        }
                    }
                }

                if($item->consumo_spa_R == 0 || $item->consumo_spa_R == 1){
                    $consumo_spa_I += 1;
                }else{
                    if($item->consumo_spa_R == 2){
                        $consumo_spa_II += 1;
                    }else{
                        if($item->consumo_spa_R == 3){
                            $consumo_spa_III += 1;
                        }else{
                            $consumo_spa_IIII += 1;
                        }
                    }
                }

                if($item->violencias_R == 0 || $item->violencias_R == 1){
                    $violencias_I += 1;
                }else{
                    if($item->violencias_R == 2){
                        $violencias_II += 1;
                    }else{
                        if($item->violencias_R == 3){
                            $violencias_III += 1;
                        }else{
                            $violencias_IIII += 1;
                        }
                    }
                }
            }
            $info = [
                "riesgo_delgadez" =>  [
                    "Inexistente" => $riesgo_delgadez_I,
                    "Bajo" => $riesgo_delgadez_II,
                    "Moderado" => $riesgo_delgadez_III,
                    "Alto" => $riesgo_delgadez_IIII,
                ],
                "enfermedades_infecciosas" =>  [
                    "Inexistente" => $enfermedades_infecciosas_I,
                    "Bajo" => $enfermedades_infecciosas_II,
                    "Moderado" => $enfermedades_infecciosas_III,
                    "Alto" => $enfermedades_infecciosas_IIII,
                ],
                "transtornos_asociados_spa" =>  [
                    "Inexistente" => $transtornos_asociados_spa_I,
                    "Bajo" => $transtornos_asociados_spa_II,
                    "Moderado" => $transtornos_asociados_spa_III,
                    "Alto" => $transtornos_asociados_spa_IIII,
                ],
                "enfermedad_cardiovascular" =>  [
                    "Inexistente" => $enfermedad_cardiovascular_I,
                    "Bajo" => $enfermedad_cardiovascular_II,
                    "Moderado" => $enfermedad_cardiovascular_III,
                    "Alto" => $enfermedad_cardiovascular_IIII,
                ],
                "cancer" =>  [
                    "Inexistente" => $cancer_I,
                    "Bajo" => $cancer_II,
                    "Moderado" => $cancer_III,
                    "Alto" => $cancer_IIII,
                ],
                "alteraciones_transtornos_visuales" =>  [
                    "Inexistente" => $alteraciones_transtornos_visuales_I,
                    "Bajo" => $alteraciones_transtornos_visuales_II,
                    "Moderado" => $alteraciones_transtornos_visuales_III,
                    "Alto" => $alteraciones_transtornos_visuales_IIII,
                ],
                "alteraciones_transtornos_audicion" =>  [
                    "Inexistente" => $alteraciones_transtornos_audicion_I,
                    "Bajo" => $alteraciones_transtornos_audicion_II,
                    "Moderado" => $alteraciones_transtornos_audicion_III,
                    "Alto" => $alteraciones_transtornos_audicion_IIII,
                ],
                "salud_bucal" =>  [
                    "Inexistente" => $salud_bucal_I,
                    "Bajo" => $salud_bucal_II,
                    "Moderado" => $salud_bucal_III,
                    "Alto" => $salud_bucal_IIII,
                ],
                "problemas_salud_mental" =>  [
                    "Inexistente" => $problemas_salud_mental_I,
                    "Bajo" => $problemas_salud_mental_II,
                    "Moderado" => $problemas_salud_mental_III,
                    "Alto" => $problemas_salud_mental_IIII,
                ],
                "enfermedades_respiratorias" =>  [
                    "Inexistente" => $enfermedades_respiratorias_I,
                    "Bajo" => $enfermedades_respiratorias_II,
                    "Moderado" => $enfermedades_respiratorias_III,
                    "Alto" => $enfermedades_respiratorias_IIII,
                ],
                "enfermedades_zoonoticas" =>  [
                    "Inexistente" => $enfermedades_zoonoticas_I,
                    "Bajo" => $enfermedades_zoonoticas_II,
                    "Moderado" => $enfermedades_zoonoticas_III,
                    "Alto" => $enfermedades_zoonoticas_IIII,
                ],
                "transtornos_degenartivos" =>  [
                    "Inexistente" => $transtornos_degenartivos_I,
                    "Bajo" => $transtornos_degenartivos_II,
                    "Moderado" => $transtornos_degenartivos_III,
                    "Alto" => $transtornos_degenartivos_IIII,
                ],
                "consumo_spa" =>  [
                    "Inexistente" => $consumo_spa_I,
                    "Bajo" => $consumo_spa_II,
                    "Moderado" => $consumo_spa_III,
                    "Alto" => $consumo_spa_IIII,
                ],        
                "violencias" =>  [
                    "Inexistente" => $violencias_I,
                    "Bajo" => $violencias_II,
                    "Moderado" => $violencias_III,
                    "Alto" => $violencias_IIII,
                ],
            ];

            return $info;
        }

        // de 60 años o mas
        if ($rango == "riesgos_salud_de60") {

            $enfermedades_infecciosas_I = 0; $enfermedades_infecciosas_II = 0; $enfermedades_infecciosas_III = 0; $enfermedades_infecciosas_IIII = 0;
            $transtornos_asociados_spa_I = 0; $transtornos_asociados_spa_II = 0; $transtornos_asociados_spa_III = 0; $transtornos_asociados_spa_IIII = 0;
            $enfermedad_cardiovascular_I = 0; $enfermedad_cardiovascular_II = 0; $enfermedad_cardiovascular_III = 0; $enfermedad_cardiovascular_IIII = 0;
            $cancer_I = 0;$cancer_II = 0;$cancer_III = 0;$cancer_IIII = 0; 
            $alteraciones_transtornos_visuales_I = 0; $alteraciones_transtornos_visuales_II = 0; $alteraciones_transtornos_visuales_III = 0; $alteraciones_transtornos_visuales_IIII = 0;
            $alteraciones_transtornos_audicion_I = 0; $alteraciones_transtornos_audicion_II = 0; $alteraciones_transtornos_audicion_III = 0; $alteraciones_transtornos_audicion_IIII = 0;
            $salud_bucal_I = 0;  $salud_bucal_II = 0;  $salud_bucal_III = 0;  $salud_bucal_IIII = 0;
            $problemas_salud_mental_I = 0; $problemas_salud_mental_II = 0; $problemas_salud_mental_III = 0; $problemas_salud_mental_IIII = 0;
            $enfermedades_respiratorias_I = 0;  $enfermedades_respiratorias_II = 0;  $enfermedades_respiratorias_III = 0; $enfermedades_respiratorias_IIII = 0;
            $enfermedades_zoonoticas_I = 0; $enfermedades_zoonoticas_II = 0; $enfermedades_zoonoticas_III = 0; $enfermedades_zoonoticas_IIII = 0;
            $transtornos_degenartivos_I = 0; $transtornos_degenartivos_II = 0; $transtornos_degenartivos_III = 0; $transtornos_degenartivos_IIII = 0;
            $consumo_spa_I = 0; $consumo_spa_II = 0; $consumo_spa_III = 0; $consumo_spa_IIII = 0;
            $violencias_I = 0;  $violencias_II = 0;  $violencias_III = 0;  $violencias_IIII = 0;

            foreach ($data as $item) {

                if($item->enfermedades_infecciosas_R == 0 || $item->enfermedades_infecciosas_R == 1){
                    $enfermedades_infecciosas_I += 1;
                }else{
                    if($item->enfermedades_infecciosas_R == 2){
                        $enfermedades_infecciosas_II += 1;
                    }else{
                        if($item->enfermedades_infecciosas_R == 3){
                            $enfermedades_infecciosas_III += 1;
                        }else{
                            $enfermedades_infecciosas_IIII += 1;
                        }
                    }
                }
                
                if($item->transtornos_asociados_spa_R == 0 || $item->transtornos_asociados_spa_R == 1){
                    $transtornos_asociados_spa_I += 1;
                }else{
                    if($item->transtornos_asociados_spa_R == 2){
                        $transtornos_asociados_spa_II += 1;
                    }else{
                        if($item->transtornos_asociados_spa_R == 3){
                            $transtornos_asociados_spa_III += 1;
                        }else{
                            $transtornos_asociados_spa_IIII += 1;
                        }
                    }
                }

                if($item->enfermedad_cardiovascular_R == 0 || $item->enfermedad_cardiovascular_R == 1){
                    $enfermedad_cardiovascular_I += 1;
                }else{
                    if($item->enfermedad_cardiovascular_R == 2){
                        $enfermedad_cardiovascular_II += 1;
                    }else{
                        if($item->enfermedad_cardiovascular_R == 3){
                            $enfermedad_cardiovascular_III += 1;
                        }else{
                            $enfermedad_cardiovascular_IIII += 1;
                        }
                    }
                }

                if($item->cancer_R == 0 || $item->cancer_R == 1){
                    $cancer_I += 1;
                }else{
                    if($item->cancer_R == 2){
                        $cancer_II += 1;
                    }else{
                        if($item->cancer_R == 3){
                            $cancer_III += 1;
                        }else{
                            $cancer_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_visuales_R == 0 || $item->alteraciones_transtornos_visuales_R == 1){
                    $alteraciones_transtornos_visuales_I += 1;
                }else{
                    if($item->alteraciones_transtornos_visuales_R == 2){
                        $alteraciones_transtornos_visuales_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_visuales_R == 3){
                            $alteraciones_transtornos_visuales_III += 1;
                        }else{
                            $alteraciones_transtornos_visuales_IIII += 1;
                        }
                    }
                }

                if($item->alteraciones_transtornos_audicion_R == 0 || $item->alteraciones_transtornos_audicion_R == 1){
                    $alteraciones_transtornos_audicion_I += 1;
                }else{
                    if($item->alteraciones_transtornos_audicion_R == 2){
                        $alteraciones_transtornos_audicion_II += 1;
                    }else{
                        if($item->alteraciones_transtornos_audicion_R == 3){
                            $alteraciones_transtornos_audicion_III += 1;
                        }else{
                            $alteraciones_transtornos_audicion_IIII += 1;
                        }
                    }
                }

                if($item->salud_bucal_R == 0 || $item->salud_bucal_R == 1){
                    $salud_bucal_I += 1;
                }else{
                    if($item->salud_bucal_R == 2){
                        $salud_bucal_II += 1;
                    }else{
                        if($item->salud_bucal_R == 3){
                            $salud_bucal_III += 1;
                        }else{
                            $salud_bucal_IIII += 1;
                        }
                    }
                }

                if($item->problemas_salud_mental_R == 0 || $item->problemas_salud_mental_R == 1){
                    $problemas_salud_mental_I += 1;
                }else{
                    if($item->problemas_salud_mental_R == 2){
                        $problemas_salud_mental_II += 1;
                    }else{
                        if($item->problemas_salud_mental_R == 3){
                            $problemas_salud_mental_III += 1;
                        }else{
                            $problemas_salud_mental_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_respiratorias_R == 0 || $item->enfermedades_respiratorias_R == 1){
                    $enfermedades_respiratorias_I += 1;
                }else{
                    if($item->enfermedades_respiratorias_R == 2){
                        $enfermedades_respiratorias_II += 1;
                    }else{
                        if($item->enfermedades_respiratorias_R == 3){
                            $enfermedades_respiratorias_III += 1;
                        }else{
                            $enfermedades_respiratorias_IIII += 1;
                        }
                    }
                }

                if($item->enfermedades_zoonoticas_R == 0 || $item->enfermedades_zoonoticas_R == 1){
                    $enfermedades_zoonoticas_I += 1;
                }else{
                    if($item->enfermedades_zoonoticas_R == 2){
                        $enfermedades_zoonoticas_II += 1;
                    }else{
                        if($item->enfermedades_zoonoticas_R == 3){
                            $enfermedades_zoonoticas_III += 1;
                        }else{
                            $enfermedades_zoonoticas_IIII += 1;
                        }
                    }
                }

                if($item->transtornos_degenartivos_R == 0 || $item->transtornos_degenartivos_R == 1){
                    $transtornos_degenartivos_I += 1;
                }else{
                    if($item->transtornos_degenartivos_R == 2){
                        $transtornos_degenartivos_II += 1;
                    }else{
                        if($item->transtornos_degenartivos_R == 3){
                            $transtornos_degenartivos_III += 1;
                        }else{
                            $transtornos_degenartivos_IIII += 1;
                        }
                    }
                }

                if($item->consumo_spa_R == 0 || $item->consumo_spa_R == 1){
                    $consumo_spa_I += 1;
                }else{
                    if($item->consumo_spa_R == 2){
                        $consumo_spa_II += 1;
                    }else{
                        if($item->consumo_spa_R == 3){
                            $consumo_spa_III += 1;
                        }else{
                            $consumo_spa_IIII += 1;
                        }
                    }
                }

                if($item->violencias_R == 0 || $item->violencias_R == 1){
                    $violencias_I += 1;
                }else{
                    if($item->violencias_R == 2){
                        $violencias_II += 1;
                    }else{
                        if($item->violencias_R == 3){
                            $violencias_III += 1;
                        }else{
                            $violencias_IIII += 1;
                        }
                    }
                }
            }
            $info = [
                "enfermedades_infecciosas" =>  [
                    "Inexistente" => $enfermedades_infecciosas_I,
                    "Bajo" => $enfermedades_infecciosas_II,
                    "Moderado" => $enfermedades_infecciosas_III,
                    "Alto" => $enfermedades_infecciosas_IIII,
                ],
                "transtornos_asociados_spa" =>  [
                    "Inexistente" => $transtornos_asociados_spa_I,
                    "Bajo" => $transtornos_asociados_spa_II,
                    "Moderado" => $transtornos_asociados_spa_III,
                    "Alto" => $transtornos_asociados_spa_IIII,
                ],
                "enfermedad_cardiovascular" =>  [
                    "Inexistente" => $enfermedad_cardiovascular_I,
                    "Bajo" => $enfermedad_cardiovascular_II,
                    "Moderado" => $enfermedad_cardiovascular_III,
                    "Alto" => $enfermedad_cardiovascular_IIII,
                ],
                "cancer" =>  [
                    "Inexistente" => $cancer_I,
                    "Bajo" => $cancer_II,
                    "Moderado" => $cancer_III,
                    "Alto" => $cancer_IIII,
                ],
                "alteraciones_transtornos_visuales" =>  [
                    "Inexistente" => $alteraciones_transtornos_visuales_I,
                    "Bajo" => $alteraciones_transtornos_visuales_II,
                    "Moderado" => $alteraciones_transtornos_visuales_III,
                    "Alto" => $alteraciones_transtornos_visuales_IIII,
                ],
                "alteraciones_transtornos_audicion" =>  [
                    "Inexistente" => $alteraciones_transtornos_audicion_I,
                    "Bajo" => $alteraciones_transtornos_audicion_II,
                    "Moderado" => $alteraciones_transtornos_audicion_III,
                    "Alto" => $alteraciones_transtornos_audicion_IIII,
                ],
                "salud_bucal" =>  [
                    "Inexistente" => $salud_bucal_I,
                    "Bajo" => $salud_bucal_II,
                    "Moderado" => $salud_bucal_III,
                    "Alto" => $salud_bucal_IIII,
                ],
                "problemas_salud_mental" =>  [
                    "Inexistente" => $problemas_salud_mental_I,
                    "Bajo" => $problemas_salud_mental_II,
                    "Moderado" => $problemas_salud_mental_III,
                    "Alto" => $problemas_salud_mental_IIII,
                ],
                "enfermedades_respiratorias" =>  [
                    "Inexistente" => $enfermedades_respiratorias_I,
                    "Bajo" => $enfermedades_respiratorias_II,
                    "Moderado" => $enfermedades_respiratorias_III,
                    "Alto" => $enfermedades_respiratorias_IIII,
                ],
                "enfermedades_zoonoticas" =>  [
                    "Inexistente" => $enfermedades_zoonoticas_I,
                    "Bajo" => $enfermedades_zoonoticas_II,
                    "Moderado" => $enfermedades_zoonoticas_III,
                    "Alto" => $enfermedades_zoonoticas_IIII,
                ],
                "transtornos_degenartivos" =>  [
                    "Inexistente" => $transtornos_degenartivos_I,
                    "Bajo" => $transtornos_degenartivos_II,
                    "Moderado" => $transtornos_degenartivos_III,
                    "Alto" => $transtornos_degenartivos_IIII,
                ],
                "consumo_spa" =>  [
                    "Inexistente" => $consumo_spa_I,
                    "Bajo" => $consumo_spa_II,
                    "Moderado" => $consumo_spa_III,
                    "Alto" => $consumo_spa_IIII,
                ],        
                "violencias" =>  [
                    "Inexistente" => $violencias_I,
                    "Bajo" => $violencias_II,
                    "Moderado" => $violencias_III,
                    "Alto" => $violencias_IIII,
                ],
            ];

            return $info;
        }
    }

    public static function riesgos_hogares($alias, $tipo, $id){
        if($tipo == "todos"){
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->orderBy('des_corr', 'asc')
            ->get();
        }else{
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->orderBy('des_corr', 'asc')
            ->get();
        }

        $hogares_alto_riesgo_salud = 0;

        foreach ($hogares as &$item) {
            $item->riesgos_salud_men1 = self::consultar_riesgos_salud('riesgos_salud_men1', $alias, $item->id);
            $item->riesgos_salud_de1a5 = self::consultar_riesgos_salud('riesgos_salud_de1a5', $alias, $item->id);
            $item->riesgos_salud_de6a11 = self::consultar_riesgos_salud('riesgos_salud_de6a11', $alias, $item->id);
            $item->riesgos_salud_de12a17 = self::consultar_riesgos_salud('riesgos_salud_de12a17', $alias, $item->id);
            $item->riesgos_salud_de18a28 = self::consultar_riesgos_salud('riesgos_salud_de18a28', $alias, $item->id);
            $item->riesgos_salud_de29a59 = self::consultar_riesgos_salud('riesgos_salud_de29a59', $alias, $item->id);
            $item->riesgos_salud_de60 = self::consultar_riesgos_salud('riesgos_salud_de60', $alias, $item->id);

            $item->cantidad_personas =$item->riesgos_salud_men1["cantidad_personas"]+$item->riesgos_salud_de1a5["cantidad_personas"]+$item->riesgos_salud_de6a11["cantidad_personas"]+$item->riesgos_salud_de12a17["cantidad_personas"]+$item->riesgos_salud_de18a28["cantidad_personas"]+$item->riesgos_salud_de29a59["cantidad_personas"]+$item->riesgos_salud_de60["cantidad_personas"];
            $item->cantidad_personas_riesgo_alto = $item->riesgos_salud_men1["personas_riesgo_alto"]+$item->riesgos_salud_de1a5["personas_riesgo_alto"]+$item->riesgos_salud_de6a11["personas_riesgo_alto"]+$item->riesgos_salud_de12a17["personas_riesgo_alto"]+$item->riesgos_salud_de18a28["personas_riesgo_alto"]+$item->riesgos_salud_de29a59["personas_riesgo_alto"]+$item->riesgos_salud_de60["personas_riesgo_alto"];
        
        }

        $hogares_Alto = array();
        foreach ($hogares as &$item) {
            if((($item->cantidad_personas_riesgo_alto / $item->cantidad_personas) * 100) >= 50){
                $hogares_alto_riesgo_salud += 1;
                array_push($hogares_Alto, $item);
            }
        }

        if(count($hogares) == 0){
            $porcen_hogares_alto_riesgo_salud = 0;
        }else{
            $porcen_hogares_alto_riesgo_salud = ($hogares_alto_riesgo_salud / count($hogares) )* 100;
        }

        return $info = [
            'hogares_Alto' => $hogares_Alto,
            'hogares_alto_riesgo_salud' => $hogares_alto_riesgo_salud,
            'hogares' => $hogares,
            'NumeroHogares' => count($hogares),
            'porcen_hogares_alto_riesgo_salud' => $porcen_hogares_alto_riesgo_salud,
        ];
    }

    public static function consultar_riesgos_salud($rango, $alias, $idJefe){
        if($rango == "riesgos_salud_de12a17"  || $rango == "riesgos_salud_de18a28" || $rango == "riesgos_salud_de29a59" || $rango == "riesgos_salud_de60"){     
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'INTE')
            ->get();

            $riesgosSaludJefes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','caracterizacion.*')
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.id', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'JEFE')
            ->get();
           
        }else{
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->get();

            $riesgosSaludJefes = array();
        }

        $riesgosSalud = array();
        
        foreach ($riesgosSaludIntegrantes as &$item) {
            array_push($riesgosSalud, $item);
        }

        foreach ($riesgosSaludJefes as &$item) {
            array_push($riesgosSalud, $item);
        }

        $personas_riesgo_alto = 0;
        $riesgosSaludAlto = array();

        if ($rango == "riesgos_salud_men1" || $rango == "riesgos_salud_de1a5"){
            foreach ($riesgosSalud as &$item) {
                if($item->enfermedades_infecciosas_R >= 4 || $item->transtornos_asociados_spa_R >= 4
                    || $item->enfermedad_cardiovascular_R >= 4 || $item->cancer_R >= 4
                    || $item->alteraciones_transtornos_visuales_R >= 4 || $item->alteraciones_transtornos_audicion_R >= 4
                    || $item->salud_bucal_R >= 4 || $item->problemas_salud_mental_R >= 4
                    || $item->enfermedades_respiratorias_R >= 4 || $item->enfermedades_zoonoticas_R >= 4
                    || $item->transtornos_degenartivos_R >= 4 || $item->consumo_spa_R >= 4
                    || $item->riesgos_desnutricion_aguda_R >= 4 || $item->riesgos_desnutricion_global_R >= 4
                    || $item->riesgo_talla_baja_R >= 4 || $item->riesgo_muerte_R >= 4
                    || $item->riesgo_sobrepeso_R >= 4 || $item->violencias_R >= 4){

                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }

        if ($rango == "riesgos_salud_de6a11" || $rango == "riesgos_salud_de12a17"){
            foreach ($riesgosSalud as &$item) {
                if($item->enfermedades_infecciosas_R >= 4 || $item->transtornos_asociados_spa_R >= 4
                    || $item->enfermedad_cardiovascular_R >= 4 || $item->cancer_R >= 4
                    || $item->alteraciones_transtornos_visuales_R >= 4 || $item->alteraciones_transtornos_audicion_R >= 4
                    || $item->salud_bucal_R >= 4 || $item->problemas_salud_mental_R >= 4
                    || $item->violencias_R >= 4 || $item->enfermedades_respiratorias_R >= 4
                    || $item->enfermedades_zoonoticas_R >= 4 || $item->transtornos_degenartivos_R >= 4
                    || $item->consumo_spa_R >= 4 || $item->riesgo_talla_baja_R >= 4
                    || $item->riesgo_delgadez_R >= 4) {

                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }

        if ($rango == "riesgos_salud_de18a28" || $rango == "riesgos_salud_de29a59"){
            foreach ($riesgosSalud as &$item) {
                if($item->enfermedades_infecciosas_R >= 4 || $item->transtornos_asociados_spa_R >= 4
                || $item->enfermedad_cardiovascular_R >= 4 || $item->cancer_R >= 4
                || $item->alteraciones_transtornos_visuales_R >= 4 || $item->alteraciones_transtornos_audicion_R >= 4
                || $item->salud_bucal_R >= 4 || $item->problemas_salud_mental_R >= 4
                || $item->violencias_R >= 4 || $item->enfermedades_respiratorias_R >= 4
                || $item->enfermedades_zoonoticas_R >= 4 || $item->transtornos_degenartivos_R >= 4
                || $item->consumo_spa_R >= 4 || $item->riesgo_delgadez_R >= 4) {

                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }

        if ($rango == "riesgos_salud_de60"){
            foreach ($riesgosSalud as &$item) {
                if($item->enfermedades_infecciosas_R >= 4 || $item->transtornos_asociados_spa_R >= 4
                || $item->enfermedad_cardiovascular_R >= 4 || $item->cancer_R >= 4
                || $item->alteraciones_transtornos_visuales_R >= 4 || $item->alteraciones_transtornos_audicion_R >= 4
                || $item->salud_bucal_R >= 4 || $item->problemas_salud_mental_R >= 4
                || $item->violencias_R >= 4 || $item->enfermedades_respiratorias_R >= 4
                || $item->enfermedades_zoonoticas_R >= 4 || $item->transtornos_degenartivos_R >= 4
                || $item->consumo_spa_R >= 4 ) {

                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }
                
        return $info = [
            'cantidad_personas' => count($riesgosSalud),
            'personas_riesgo_alto' => $personas_riesgo_alto,
            'riesgosSaludAlto' => $riesgosSaludAlto
        ];
    }

    public static function riesgos_desnutricion($alias, $tipo, $id, $tipo_des){
        if($tipo == "todos"){
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->orderBy('des_corr', 'asc')
            ->get();
        }else{
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->orderBy('des_corr', 'asc')
            ->get();
        }

        if($tipo_des == 1){
            foreach ($hogares as &$item) {
                $item->riesgo_men1 = self::consultar_riesgo_desnutricion('riesgos_salud_men1', $alias, $item->id);
                $item->riesgo_de1a5 = self::consultar_riesgo_desnutricion('riesgos_salud_de1a5', $alias, $item->id);
                $item->riesgo_de6a11 = self::consultar_riesgo_desnutricion('riesgos_salud_de6a11', $alias, $item->id);
            
                $item->cantidad_personas =$item->riesgo_men1["cantidad_personas"]+$item->riesgo_de1a5["cantidad_personas"]+$item->riesgo_de6a11["cantidad_personas"];
                $item->cantidad_personas_riesgo_alto = $item->riesgo_men1["personas_riesgo_alto"]+$item->riesgo_de1a5["personas_riesgo_alto"]+$item->riesgo_de6a11["personas_riesgo_alto"];
            
            }
        }else{
            foreach ($hogares as &$item) {
                $item->riesgo_de12a17 = self::consultar_riesgo_desnutricion('riesgos_salud_de12a17', $alias, $item->id);
                $item->riesgo_de18a28 = self::consultar_riesgo_desnutricion('riesgos_salud_de18a28', $alias, $item->id);
                $item->riesgo_de29a59 = self::consultar_riesgo_desnutricion('riesgos_salud_de29a59', $alias, $item->id);
            
                $item->cantidad_personas =$item->riesgo_de12a17["cantidad_personas"]+$item->riesgo_de18a28["cantidad_personas"]+$item->riesgo_de29a59["cantidad_personas"];
                $item->cantidad_personas_riesgo_alto = $item->riesgo_de12a17["personas_riesgo_alto"]+$item->riesgo_de18a28["personas_riesgo_alto"]+$item->riesgo_de29a59["personas_riesgo_alto"];
            
            }
        }
        

        $hogares_Alto = array();
        $hogares_alto_riesgo_salud = 0;
        foreach ($hogares as &$item) {
            if( $item->cantidad_personas_riesgo_alto > 0){
                $hogares_alto_riesgo_salud += 1;
                array_push($hogares_Alto, $item);
            }
        }

        if(count($hogares) == 0){
            $porcen_hogares_alto_riesgo_salud = 0;
        }else{
            $porcen_hogares_alto_riesgo_salud = ($hogares_alto_riesgo_salud / count($hogares) )* 100;
        }

        return $info = [
            'hogares_Alto_d' => $hogares_Alto,
            'hogares_alto_riesgo_salud_d' => $hogares_alto_riesgo_salud,
            'hogares_d' => $hogares,
            'NumeroHogares_d' => count($hogares),
            'porcen_hogares_alto_riesgo_salud_d' => $porcen_hogares_alto_riesgo_salud,
        ];
    }

    public static function consultar_riesgo_desnutricion($rango, $alias, $idJefe){
        if($rango == "riesgos_salud_de12a17"  || $rango == "riesgos_salud_de18a28" || $rango == "riesgos_salud_de29a59" || $rango == "riesgos_salud_de60"){     
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'INTE')
            ->get();

            $riesgosSaludJefes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','caracterizacion.*')
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.id', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'JEFE')
            ->get();
           
        }else{
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->get();

            $riesgosSaludJefes = array();
        }

        $riesgosSalud = array();
        
        foreach ($riesgosSaludIntegrantes as &$item) {
            array_push($riesgosSalud, $item);
        }

        foreach ($riesgosSaludJefes as &$item) {
            array_push($riesgosSalud, $item);
        }

        $personas_riesgo_alto = 0;
        $riesgosSaludAlto = array();

        if ($rango == "riesgos_salud_men1" || $rango == "riesgos_salud_de1a5"){
            foreach ($riesgosSalud as &$item) {
                if($item->riesgos_desnutricion_aguda_R >= 4 || $item->riesgos_desnutricion_global_R >= 4){
                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }

        if ($rango == "riesgos_salud_de6a11" || $rango == "riesgos_salud_de12a17"){
            foreach ($riesgosSalud as &$item) {
                if($item->riesgo_delgadez_R >= 4) {
                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }

        if ($rango == "riesgos_salud_de18a28" || $rango == "riesgos_salud_de29a59"){
            foreach ($riesgosSalud as &$item) {
                if($item->riesgo_delgadez_R >= 4) {
                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }
                
        return $info = [
            'cantidad_personas' => count($riesgosSalud),
            'personas_riesgo_alto' => $personas_riesgo_alto,
            'riesgosSaludAlto' => $riesgosSaludAlto
        ];
    }

    public static function spa_violencia($alias, $tipo, $id, $tipo_des){
        if($tipo == "todos"){
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->orderBy('des_corr', 'asc')
            ->get();
        }else{
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->orderBy('des_corr', 'asc')
            ->get();
        }

        foreach ($hogares as &$item) {

            $item->riesgos_salud_men1 = self::consultar_spa_violencia('riesgos_salud_men1', $alias, $item->id, $tipo_des);
            $item->riesgos_salud_de1a5 = self::consultar_spa_violencia('riesgos_salud_de1a5', $alias, $item->id, $tipo_des);
            $item->riesgos_salud_de6a11 = self::consultar_spa_violencia('riesgos_salud_de6a11', $alias, $item->id, $tipo_des);
            $item->riesgos_salud_de12a17 = self::consultar_spa_violencia('riesgos_salud_de12a17', $alias, $item->id, $tipo_des);
            $item->riesgos_salud_de18a28 = self::consultar_spa_violencia('riesgos_salud_de18a28', $alias, $item->id, $tipo_des);
            $item->riesgos_salud_de29a59 = self::consultar_spa_violencia('riesgos_salud_de29a59', $alias, $item->id, $tipo_des);
            $item->riesgos_salud_de60 = self::consultar_spa_violencia('riesgos_salud_de60', $alias, $item->id, $tipo_des);
        
            $item->cantidad_personas =$item->riesgos_salud_men1["cantidad_personas"]+$item->riesgos_salud_de1a5["cantidad_personas"]+$item->riesgos_salud_de6a11["cantidad_personas"]+$item->riesgos_salud_de12a17["cantidad_personas"]+$item->riesgos_salud_de18a28["cantidad_personas"]+$item->riesgos_salud_de29a59["cantidad_personas"]+$item->riesgos_salud_de60["cantidad_personas"];
            $item->cantidad_personas_riesgo_alto = $item->riesgos_salud_men1["cantidad_personas_riesgo_alto"]+$item->riesgos_salud_de1a5["cantidad_personas_riesgo_alto"]+$item->riesgos_salud_de6a11["cantidad_personas_riesgo_alto"]+$item->riesgos_salud_de12a17["cantidad_personas_riesgo_alto"]+$item->riesgos_salud_de18a28["cantidad_personas_riesgo_alto"]+$item->riesgos_salud_de29a59["cantidad_personas_riesgo_alto"]+$item->riesgos_salud_de60["cantidad_personas_riesgo_alto"];
            
        }

        $array_hogares_alto = array();
        $cantidad_hogares_alto = 0;
        foreach ($hogares as &$item) {
            if( $item->cantidad_personas_riesgo_alto > 0){
                $cantidad_hogares_alto += 1;
                array_push($array_hogares_alto, $item);
            }
        }

        if(count($hogares) == 0){
            $porcen_hogares_alto_riesgo = 0;
        }else{
            $porcen_hogares_alto_riesgo = ($cantidad_hogares_alto / count($hogares) )* 100;
        }

        return $info = [
            'array_hogares_alto' => $array_hogares_alto,
            'cantidad_hogares_alto' => $cantidad_hogares_alto,
            'numero_hogares' => count($hogares),
            'porcen_hogares_alto_riesgo' => $porcen_hogares_alto_riesgo,
        ];
    }

    public static function consultar_spa_violencia($rango, $alias, $idJefe, $tipo){
        if($rango == "riesgos_salud_de12a17"  || $rango == "riesgos_salud_de18a28" || $rango == "riesgos_salud_de29a59" || $rango == "riesgos_salud_de60"){     
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'INTE')
            ->get();

            $riesgosSaludJefes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','caracterizacion.*')
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.id', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'JEFE')
            ->get();
           
        }else{
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->get();

            $riesgosSaludJefes = array();
        }

        $riesgosSalud = array();
        
        foreach ($riesgosSaludIntegrantes as &$item) {
            array_push($riesgosSalud, $item);
        }

        foreach ($riesgosSaludJefes as &$item) {
            array_push($riesgosSalud, $item);
        }

        $personas_riesgo_alto = 0;
        $riesgosSaludAlto = array();
        // consumo de spa
        if($tipo == 1){
            foreach ($riesgosSalud as &$item) {
                if($item->consumo_spa_R >= 4){
                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }else{
            //violencias
            foreach ($riesgosSalud as &$item) {
                if($item->violencias_R >= 4){
                    $personas_riesgo_alto += 1;
                    array_push($riesgosSaludAlto, $item);
                }
            }
        }

        return $info = [
            'cantidad_personas' => count($riesgosSalud),
            'cantidad_personas_riesgo_alto' => $personas_riesgo_alto,
            'personas_riesgos_alto' => $riesgosSaludAlto
        ];
        
    }

    public static function obesidad_sobrepeso($alias, $tipo, $id, $tipo_des){
        if($tipo == "todos"){
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->orderBy('des_corr', 'asc')
            ->get();
        }else{
            $hogares = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "caracterizacion.id_hogar", "hogar.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('hogar.*', 'caracterizacion.*')
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->orderBy('des_corr', 'asc')
            ->get();
        }

        if($tipo_des == 1){
            foreach ($hogares as &$item) {

                $item->men1a = self::consultar_obesidad_sobrepeso('men1a', $alias, $item->id, $tipo_des);
                $item->de1a5 = self::consultar_obesidad_sobrepeso('de1a5', $alias, $item->id, $tipo_des);
                $item->de6a11 = self::consultar_obesidad_sobrepeso('de6a11', $alias, $item->id, $tipo_des);
               
                $item->cantidad_personas =$item->men1a["cantidad_personas"]+$item->de1a5["cantidad_personas"]+$item->de6a11["cantidad_personas"];
                $item->cantidad_personas_riesgo_alto = $item->men1a["cantidad_personas_riesgo_alto"]+$item->de1a5["cantidad_personas_riesgo_alto"]+$item->de6a11["cantidad_personas_riesgo_alto"];
                
            }
        }else{
            foreach ($hogares as &$item) {
                $item->de12a17 = self::consultar_obesidad_sobrepeso('de12a17', $alias, $item->id, $tipo_des);
                $item->de18a28 = self::consultar_obesidad_sobrepeso('de18a28', $alias, $item->id, $tipo_des);
                $item->de29a59 = self::consultar_obesidad_sobrepeso('de29a59', $alias, $item->id, $tipo_des);
                $item->de60 = self::consultar_obesidad_sobrepeso('de60', $alias, $item->id, $tipo_des);
            
                $item->cantidad_personas =$item->de12a17["cantidad_personas"]+$item->de18a28["cantidad_personas"]+$item->de29a59["cantidad_personas"]+$item->de60["cantidad_personas"];
                $item->cantidad_personas_riesgo_alto = $item->de12a17["cantidad_personas_riesgo_alto"]+$item->de18a28["cantidad_personas_riesgo_alto"]+$item->de29a59["cantidad_personas_riesgo_alto"]+$item->de60["cantidad_personas_riesgo_alto"];
                
            }
        }

       

        $array_hogares_alto = array();
        $cantidad_hogares_alto = 0;
        foreach ($hogares as &$item) {
            if( $item->cantidad_personas_riesgo_alto > 0){
                $cantidad_hogares_alto += 1;
                array_push($array_hogares_alto, $item);
            }
        }

        if(count($hogares) == 0){
            $porcen_hogares_alto_riesgo = 0;
        }else{
            $porcen_hogares_alto_riesgo = ($cantidad_hogares_alto / count($hogares) )* 100;
        }

        return $info = [
            'array_hogares_alto' => $array_hogares_alto,
            'cantidad_hogares_alto' => $cantidad_hogares_alto,
            'numero_hogares' => count($hogares),
            'porcen_hogares_alto_riesgo' => $porcen_hogares_alto_riesgo,
        ];
    }

    public static function consultar_obesidad_sobrepeso($rango, $alias, $idJefe, $tipo){
        if($rango == "de12a17"  || $rango == "de18a28" || $rango == "de29a59" || $rango == "de60"){     
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_integrante') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where($rango.'.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'INTE')
            ->get();

            $riesgosSaludJefes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_integrante') 
            ->select($rango.'.*','caracterizacion.*')
            ->where('caracterizacion.estado', 'Activo')
            ->where($rango.'.estado', 'Activo')
            ->where('caracterizacion.id', $idJefe)
            ->where($alias.'.'.$rango.'.opci', 'JEFE')
            ->get();
           
        }else{
            $riesgosSaludIntegrantes = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_integrante') 
            ->select($rango.'.*','integrantes.*')
            ->where('integrantes.estado', 'Activo')
            ->where($rango.'.estado', 'Activo')
            ->where('integrantes.jefe', $idJefe)
            ->get();

            $riesgosSaludJefes = array();
        }

        $riesgosSalud = array();
        
        foreach ($riesgosSaludIntegrantes as &$item) {
            array_push($riesgosSalud, $item);
        }

        foreach ($riesgosSaludJefes as &$item) {
            array_push($riesgosSalud, $item);
        }

        $personas_riesgo_alto = 0;
        $personas_obesidad = array();
        $personas_sobrepeso = array();
        // sobrepeso y obesidad

        if($rango  == "men1a" || $rango  == "de1a5"){
            foreach ($riesgosSalud as &$item) {
                if($item->desviacion_imc > 3){
                    $personas_riesgo_alto += 1;
                    array_push($personas_obesidad, $item);
                }else{
                    if($item->desviacion_imc == 3){
                        $personas_riesgo_alto += 1;
                        array_push($personas_sobrepeso, $item);
                    }
                }
                
            }
        }

        if($rango  == "de6a11" || $rango  == "de12a17"){
            foreach ($riesgosSalud as &$item) {
                if($item->desviacion_imc > 2){
                    $personas_riesgo_alto += 1;
                    array_push($personas_obesidad, $item);
                }else{
                    if($item->desviacion_imc == 2){
                        $personas_riesgo_alto += 1;
                        array_push($personas_sobrepeso, $item);
                    }
                }
                
            }
        }

        if($rango  == "de18a28" || $rango  == "de29a59" || $rango  == "de60"){
            foreach ($riesgosSalud as &$item) {
                if($item->imc >= 30){
                    $personas_riesgo_alto += 1;
                    array_push($personas_obesidad, $item);
                }else{
                    if($item->imc >= 25 && $item->imc < 30){
                        $personas_riesgo_alto += 1;
                        array_push($personas_sobrepeso, $item);
                    }
                }
                
            }
        }

        return $info = [
            'cantidad_personas' => count($riesgosSalud),
            'cantidad_personas_riesgo_alto' => $personas_riesgo_alto,
            'personas_obesidad' => $personas_obesidad,
            'personas_sobrepeso' => $personas_sobrepeso
        ];
        
    }

    public static function enfermedades_por_edad($alias, $tipo, $id, $rango, $tipo_enfer){
        if($tipo == "todos"){
            if($rango == "de12a17"  || $rango == "de18a28" || $rango == "de29a59" || $rango == "de60"){
                $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo', $rango.'.opci')
                ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('integrantes.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'INTE')
                ->orderBy('des_corr', 'asc')
                ->get();

                $jefes = DB::connection('mysql')->table($alias.'.caracterizacion')
                ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "caracterizacion.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.sexo', $rango.'.opci')
                ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('caracterizacion.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'JEFE')
                ->orderBy('des_corr', 'asc')
                ->get();

            }else{
                $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo')
                ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('integrantes.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->orderBy('des_corr', 'asc')
                ->get();

                $jefes = [];
            }
            
        }else{
            if($rango == "de12a17"  || $rango == "de18a28" || $rango == "de29a59" || $rango == "de60"){
                $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo',$rango.'.opci')
                ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('integrantes.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'INTE')
                ->where('hogar.id_'.$tipo, $id)
                ->orderBy('des_corr', 'asc')
                ->get();

                $jefes = DB::connection('mysql')->table($alias.'.caracterizacion')
                ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "caracterizacion.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.sexo',$rango.'.opci')
                ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('caracterizacion.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'JEFE')
                ->where('hogar.id_'.$tipo, $id)
                ->orderBy('des_corr', 'asc')
                ->get();
            }else{
                $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo')
                ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('integrantes.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where('hogar.id_'.$tipo, $id)
                ->orderBy('des_corr', 'asc')
                ->get();

                $jefes = [];
            }
        }

        if($tipo_enfer == "Cronica"){
            $tabla = "enfermedadescro";
        }else{
            $tabla = "enfermedadesinf";
        }

        $personas_enfermedad = 0;
        $personas_enfermedad_m = 0;
        $personas_enfermedad_f = 0;
        $array_personas_enfermedad = array();
        $personas = array();

        foreach ($integrantes as &$item) {
            $item->enfermedades = DB::connection('mysql')->table($alias.'.enfermedades_integrantes')
            ->join($alias.'.'.$tabla , $alias.'.'.$tabla.'.id', $alias.'.enfermedades_integrantes.id_enfermedad') 
            ->select($alias.'.'.$tabla.'.*')
            ->where($alias.'.enfermedades_integrantes.tipo', $tipo_enfer)
            ->where($alias.'.enfermedades_integrantes.id_inte', $item->id)
            ->get();

            if(count($item->enfermedades) > 0){
                $personas_enfermedad += 1;
                if($item->sexo == "MASCULINO"){
                    $personas_enfermedad_m += 1;
                }else{
                    $personas_enfermedad_f += 1;
                }
                array_push($array_personas_enfermedad, $item); 
            }

            array_push($personas, $item); 
        }

        foreach ($jefes as &$item) {
            $item->enfermedades = DB::connection('mysql')->table($alias.'.enfermedades_jefes')
            ->join($alias.'.'.$tabla , $alias.'.'.$tabla.'.id', $alias.'.enfermedades_jefes.id_enfermedad') 
            ->select($alias.'.'.$tabla.'.*')
            ->where($alias.'.enfermedades_jefes.tipo', $tipo_enfer)
            ->where($alias.'.enfermedades_jefes.id_jefe', $item->id)
            ->get();

            if(count($item->enfermedades) > 0){
                $personas_enfermedad += 1;
                if($item->sexo == "MASCULINO"){
                    $personas_enfermedad_m += 1;
                }else{
                    $personas_enfermedad_f += 1;
                }
                array_push($array_personas_enfermedad, $item); 
            }

            array_push($personas, $item);
        }

        $porcen_personas_enfermedad = 0;

        if(count($personas) > 0){
            $porcen_personas_enfermedad = (count($array_personas_enfermedad) / count($personas)) * 100;
        }

        return $info = [
            'personas' => $personas,
            'numero_personas' => count($personas),
            'personas_enfermedad' => $personas_enfermedad,
            'array_personas_enfermedad' => $array_personas_enfermedad,
            'personas_enfermedad_f' => $personas_enfermedad_f,
            'personas_enfermedad_m' => $personas_enfermedad_m,
            'porcen_personas_enfermedad' => $porcen_personas_enfermedad
        ];
    }

    public static function spa($alias, $tipo, $id, $rango){
        if($tipo == "todos"){
            if($rango == "de12a17"  || $rango == "de18a28" || $rango == "de29a59" ){
                $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo',$rango.'.opci',$rango.'.alcohol',$rango.'.fuma',$rango.'.spa', 'integrantes.embarazo')
                ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('integrantes.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'INTE')
                ->orderBy('des_corr', 'asc')
                ->get();

                $jefes = DB::connection('mysql')->table($alias.'.caracterizacion')
                ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "caracterizacion.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.sexo', $rango.'.opci',$rango.'.alcohol',$rango.'.fuma',$rango.'.spa', 'caracterizacion.embarazo')
                ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('caracterizacion.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'JEFE')
                ->orderBy('des_corr', 'asc')
                ->get();

            }else{
                if($rango == "de60"){
                    $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                    ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                    ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                    ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                    ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                    ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo', 'alcohol','cigarrillo','glicemia', 'integrantes.embarazo')
                    ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                    ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                    ->where('hogar.estado', 'Activo')
                    ->where('integrantes.estado', 'Activo')
                    ->where($rango.'.estado', 'Activo')
                    ->where($rango.'.opci', 'INTE')
                    ->get();

                    $jefes = DB::connection('mysql')->table($alias.'.caracterizacion')
                    ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
                    ->join($alias . ".".$rango, $rango.".id_integrante", "caracterizacion.id")
                    ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                    ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                    ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.sexo', 'alcohol','cigarrillo','glicemia', 'caracterizacion.embarazo')
                    ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
                    ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                    ->where('hogar.estado', 'Activo')
                    ->where('caracterizacion.estado', 'Activo')
                    ->where($rango.'.estado', 'Activo')
                    ->where($rango.'.opci', 'JEFE')
                    ->get();

                }else{
                    $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                    ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                    ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                    ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                    ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                    ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo', 'integrantes.excepciones', 'sustanciaspsico', 'integrantes.embarazo')
                    ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                    ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                    ->where('hogar.estado', 'Activo')
                    ->where('integrantes.estado', 'Activo')
                    ->where($rango.'.estado', 'Activo')
                    ->get();
                    $jefes = [];
                }
                
            }
            
        }else{
            if($rango == "de12a17"  || $rango == "de18a28" || $rango == "de29a59" ){
                $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo',$rango.'.opci',$rango.'.alcohol',$rango.'.fuma',$rango.'.spa', 'integrantes.embarazo')
                ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('integrantes.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'INTE')
                ->where('hogar.id_'.$tipo, $id)
                ->orderBy('des_corr', 'asc')
                ->get();

                $jefes = DB::connection('mysql')->table($alias.'.caracterizacion')
                ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
                ->join($alias . ".".$rango, $rango.".id_integrante", "caracterizacion.id")
                ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.sexo',$rango.'.opci',$rango.'.alcohol',$rango.'.fuma',$rango.'.spa', 'caracterizacion.embarazo')
                ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
                ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                ->where('hogar.estado', 'Activo')
                ->where('caracterizacion.estado', 'Activo')
                ->where($rango.'.estado', 'Activo')
                ->where($rango.'.opci', 'JEFE')
                ->where('hogar.id_'.$tipo, $id)
                ->orderBy('des_corr', 'asc')
                ->get();
            }else{
                if($rango == "de60"){
                    $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                    ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                    ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                    ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                    ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                    ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo', 'alcohol','cigarrillo','glicemia', 'integrantes.embarazo')
                    ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                    ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                    ->where('hogar.estado', 'Activo')
                    ->where('integrantes.estado', 'Activo')
                    ->where($rango.'.opci', 'INTE')
                    ->where('hogar.id_'.$tipo, $id)
                    ->where($rango.'.estado', 'Activo')
                    ->get();

                    $jefes = DB::connection('mysql')->table($alias.'.caracterizacion')
                    ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
                    ->join($alias . ".".$rango, $rango.".id_integrante", "caracterizacion.id")
                    ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                    ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                    ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.sexo', 'alcohol','cigarrillo','glicemia', 'caracterizacion.embarazo')
                    ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
                    ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                    ->where('hogar.estado', 'Activo')
                    ->where('caracterizacion.estado', 'Activo')
                    ->where($rango.'.opci', 'JEFE')
                    ->where('hogar.id_'.$tipo, $id)
                    ->where($rango.'.estado', 'Activo')
                    ->get();

                }else{
                    $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
                    ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
                    ->join($alias . ".".$rango, $rango.".id_integrante", "integrantes.id")
                    ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
                    ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
                    ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.sexo', 'integrantes.excepciones', 'sustanciaspsico', 'integrantes.embarazo')
                    ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
                    ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
                    ->where('hogar.estado', 'Activo')
                    ->where('integrantes.estado', 'Activo')
                    ->where('hogar.id_'.$tipo, $id)
                    ->where($rango.'.estado', 'Activo')
                    ->get();

                    $jefes = [];
                }
            }
        }

        $array_personas_consumen = array();
        $personas_consumen_spa = 0;
        $personas_consumen_alcohol = 0;
        $personas_consumen_tabaco = 0;

        if($rango == "de12a17"  || $rango == "de18a28" || $rango == "de29a59" ){
            foreach ($integrantes as &$item) {
                if(($item->alcohol != "NO" || $item->fuma != "NO" || $item->spa != "NO") && ($item->alcohol != "NA" || $item->fuma != "NA" || $item->spa != "NA")){
                    array_push($array_personas_consumen, $item);
                }

                if($item->alcohol != "NO" && $item->alcohol != "NA"){
                    $personas_consumen_alcohol += 1;
                    $item->consume_a = "Alcohol";
                }

                if($item->fuma != "NO" && $item->fuma != "NA"){
                   $personas_consumen_tabaco += 1;
                   $item->consume_t = "Fuma";
                }

                if($item->spa != "NO" && $item->spa != "NA"){
                    $personas_consumen_spa += 1;
                    $item->consume_spa = "SPA";
                }
            }

            foreach ($jefes as &$item) {
                if(($item->alcohol != "NO" || $item->fuma != "NO" || $item->spa != "NO") && ($item->alcohol != "NA" || $item->fuma != "NA" || $item->spa != "NA")){
                    array_push($array_personas_consumen, $item);
                }

                if($item->alcohol != "NO" && $item->alcohol != "NA"){
                    $personas_consumen_alcohol += 1;
                    $item->consume_a = "Alcohol";
                }

                if($item->fuma != "NO" && $item->fuma != "NA"){
                   $personas_consumen_tabaco += 1;
                   $item->consume_t = "Fuma";
                }

                if($item->spa != "NO" && $item->spa != "NA"){
                    $personas_consumen_spa += 1;
                    $item->consume_spa = "SPA";
                }
            } 
        }else{
            if($rango == "de60" ){
                foreach ($integrantes as &$item) {
                    if(($item->alcohol != "NO" && $item->alcohol != "NA") || ($item->cigarrillo != "NO" && $item->cigarrillo != "NA") || ($item->glicemia != "NO" && $item->glicemia != "NA" && $item->glicemia != null)){
                        array_push($array_personas_consumen, $item);
                    }
    
                    if($item->alcohol != "NO" && $item->alcohol != "NA"){
                        $personas_consumen_alcohol += 1;
                        $item->consume_a = "Alcohol";
                    }
    
                    if($item->cigarrillo != "NO" && $item->cigarrillo != "NA"){
                       $personas_consumen_tabaco += 1;
                       $item->consume_t = "Fuma";
                    }
    
                    if($item->glicemia != "NO" && $item->glicemia != "NA" && $item->glicemia != null){
                        $personas_consumen_spa += 1;
                        $item->consume_spa = "SPA";
                    }
                }
    
                foreach ($jefes as &$item) {
                    if(($item->alcohol != "NO" && $item->alcohol != "NA") || ($item->cigarrillo != "NO" && $item->cigarrillo != "NA") || ($item->glicemia != "NO" && $item->glicemia != "NA" && $item->glicemia != null)){
                        array_push($array_personas_consumen, $item);
                    }
    
                    if($item->alcohol != "NO" && $item->alcohol != "NA"){
                        $personas_consumen_alcohol += 1;
                        $item->consume_a = "Alcohol";
                    }
    
                    if($item->cigarrillo != "NO" && $item->cigarrillo != "NA"){
                       $personas_consumen_tabaco += 1;
                       $item->consume_t = "Fuma";
                    }
    
                    if($item->glicemia != "NO" && $item->glicemia != "NA" && $item->glicemia != null){
                        $personas_consumen_spa += 1;
                        $item->consume_spa = "SPA";
                    }
                }
            }else{
                foreach ($integrantes as &$item) {
                    if(($item->excepciones == '2' || $item->excepciones == '4') || ($item->sustanciaspsico != 'NA' && $item->sustanciaspsico != 'NO')){
                        array_push($array_personas_consumen, $item);
                    }
    
                    if($item->excepciones == '4'){
                        $personas_consumen_alcohol += 1;
                        $item->consume_a = "Alcohol";
                    }
    
                    if($item->excepciones == '2'){
                       $personas_consumen_tabaco += 1;
                       $item->consume_t = "Fuma";
                    }
    
                    if($item->sustanciaspsico != "NA" && $item->sustanciaspsico != "NO"){
                        $personas_consumen_spa += 1;
                        $item->consume_spa = "SPA";
                    }
                }
            }
        }

        return $info = [
            'personas_consumen_spa' => $personas_consumen_spa,
            'personas_consumen_tabaco' => $personas_consumen_tabaco,
            'personas_consumen_alcohol' => $personas_consumen_alcohol,
            'array_personas_consumen' => $array_personas_consumen,
            'integrantes' => $integrantes,
            'jefes' => $jefes,
            'numero_personas' => count($array_personas_consumen)
        ];
    }

    public static function embarazo($alias, $tipo, $id){
        if($tipo == "todos"){
            
            $integrantes_embarazadas = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->join($alias . ".parpost", "parpost.id_integrante", "integrantes.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','parpost.control_prenatal','integrantes.escolaridad')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.embarazo', 'SI')
            ->where('parpost.estado', 'Activo')
            ->where('parpost.opci', 'INTE')
            ->get();

            $jefes_embarazadas = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
            ->join($alias . ".parpost", "parpost.id_integrante", "caracterizacion.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','parpost.control_prenatal','caracterizacion.nivel_escolaridad as escolaridad')
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.embarazo', 'SI')
            ->where('parpost.estado', 'Activo')
            ->where('parpost.opci', 'JEFE')
            ->get();
 
        }else{

            $integrantes_embarazadas = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->join($alias . ".parpost", "parpost.id_integrante", "integrantes.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','parpost.control_prenatal','integrantes.escolaridad')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.embarazo', 'SI')
            ->where('parpost.estado', 'Activo')
            ->where('parpost.opci', 'INTE')
            ->where('hogar.id_'.$tipo, $id)
            ->get();

            $jefes_embarazadas = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
            ->join($alias . ".parpost", "parpost.id_integrante", "caracterizacion.id")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','parpost.control_prenatal','caracterizacion.nivel_escolaridad as escolaridad')
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.embarazo', 'SI')
            ->where('parpost.estado', 'Activo')
            ->where('parpost.opci', 'JEFE')
            ->where('hogar.id_'.$tipo, $id)
            ->get();

        }

        $embarazadas_vih = 0;
        // vih sida
            foreach ($integrantes_embarazadas as &$item) {
                $vih = DB::connection('mysql')->table($alias.'.enfermedades_integrantes')  
                ->select('*')
                ->where('enfermedades_integrantes.id_inte', $item->id)
                ->where('enfermedades_integrantes.tipo', 'Infecciosa')
                ->where('enfermedades_integrantes.id_enfermedad', 2)
                ->where('enfermedades_integrantes.estado', 'Activo')
                ->count();

                if($vih > 0 ){
                    $item->vih = "Positivo";
                    $embarazadas_vih += 1;
                }else{
                    $item->vih = "Negativo";
                }
            }

            foreach ($jefes_embarazadas as &$item) {
                $vih = DB::connection('mysql')->table($alias.'.enfermedades_jefes')  
                ->select('*')
                ->where('enfermedades_jefes.id_jefe', $item->id)
                ->where('enfermedades_jefes.tipo', 'Infecciosa')
                ->where('enfermedades_jefes.id_enfermedad', 2)
                ->where('enfermedades_jefes.estado', 'Activo')
                ->count();

                if($vih > 0 ){
                    $item->vih = "Positivo";
                    $embarazadas_vih += 1;
                }else{
                    $item->vih = "Negativo";
                }
            }
        // vih sida

        $embarazadas = array();

        foreach ($integrantes_embarazadas as &$item) {
            array_push($embarazadas, $item);
        }

        foreach ($jefes_embarazadas as &$item) {
            array_push($embarazadas, $item);
        }

        // atencion prenatal y adolescentes
        $con_atencion = 0;
        $sin_atencion = 0;
        $adolescentes_embarazo = 0;
        $adolescentes_embarazadas_descolarizadas = 0;

        foreach ($embarazadas as &$item) {
            if($item->control_prenatal == "SI"){
                $con_atencion += 1;
            }else{
                $sin_atencion += 1;
            }

            if($item->edad >= 12 && $item->edad<= 17 ){
                $adolescentes_embarazo += 1;
                //adolescentes descolarizdas
                if($item->escolaridad == "1" || $item->escolaridad == "4" || $item->escolaridad == "12" || $item->escolaridad == "13"){
                    $adolescentes_embarazadas_descolarizadas += 1;
                    $item->descolarizada = "SI";
                }else{
                    $item->descolarizada = "NO";
                }
            }else{
                if($item->escolaridad == "1" || $item->escolaridad == "4" || $item->escolaridad == "12" || $item->escolaridad == "13"){
                    $item->descolarizada = "SI";
                }else{
                    $item->descolarizada = "NO";
                }
            }
           
        }
        // atencion prenatal y adolescentes

        $porcen_con_atencion = 0;
        $porcen_sin_atencion = 0;
        $porcen_adolescentes_embarazo = 0;
        $porcen_embarazadas_vih = 0;
        $porcen_adolescentes_embarazadas_descolarizadas = 0;

        if(count($embarazadas) > 0 ){
            $porcen_con_atencion = ($con_atencion / count($embarazadas)) * 100;
            $porcen_sin_atencion =  ($sin_atencion / count($embarazadas)) * 100;
            $porcen_adolescentes_embarazo =  ($adolescentes_embarazo / count($embarazadas)) * 100;
            $porcen_embarazadas_vih =  ($embarazadas_vih / count($embarazadas)) * 100;
        }

        if($adolescentes_embarazo  > 0 ){
            $porcen_adolescentes_embarazadas_descolarizadas =  ($adolescentes_embarazadas_descolarizadas / $adolescentes_embarazo) * 100;
        }
        return $info = [
            'embarazadas' => $embarazadas,
            'con_atencion' => $con_atencion,
            'sin_atencion' => $sin_atencion,
            'numero_embarazadas' => count($embarazadas),
            'porcen_con_atencion' => $porcen_con_atencion,
            'porcen_sin_atencion' => $porcen_sin_atencion,
            'embarazadas_vih' => $embarazadas_vih,
            'adolescentes_embarazo' => $adolescentes_embarazo,
            'porcen_adolescentes_embarazo' => $porcen_adolescentes_embarazo,
            'porcen_embarazadas_vih' => $porcen_embarazadas_vih,
            'adolescentes_embarazadas_descolarizadas' => $adolescentes_embarazadas_descolarizadas,
            'porcen_adolescentes_embarazadas_descolarizadas' => $porcen_adolescentes_embarazadas_descolarizadas,
        ];

    }

    public static function lactantes($alias, $tipo, $id){
        if($tipo == "todos"){
    
            $integrantes_lactantes = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.lactante')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.lactante', 'SI')
            ->where('integrantes.estado', 'Activo')
            ->get();

            $jefes_lactantes = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.lactante')
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('caracterizacion.lactante', 'SI')
            ->where('caracterizacion.estado', 'Activo')
            ->get();
 
        }else{
            $integrantes_lactantes = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion','integrantes.lactante')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.lactante', 'SI')
            ->where('hogar.id_'.$tipo, $id)
            ->where('integrantes.estado', 'Activo')
            ->get();

            $jefes_lactantes = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('caracterizacion.id','caracterizacion.id_hogar','caracterizacion.tipo_id','caracterizacion.identificacion','caracterizacion.lactante')
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pnom, caracterizacion.snom, caracterizacion.pape, caracterizacion.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->where('hogar.estado', 'Activo')
            ->where('caracterizacion.lactante', 'SI')
            ->where('hogar.id_'.$tipo, $id)
            ->where('caracterizacion.estado', 'Activo')
            ->get();

        }

        $lactantes = array();

        foreach ($integrantes_lactantes as &$item) {
            array_push($lactantes, $item);
        }

        foreach ($jefes_lactantes as &$item) {
            array_push($lactantes, $item);
        }
      
        return $info = [
            'lactantes' => $lactantes,
            'numero_lactantes' => count($lactantes),  
        ];

    }

    public static function inmunizacion_men_1($alias, $tipo, $id){
        if($tipo == "todos"){
    
            $menores_1_a = DB::connection('mysql')->table($alias.'.men1a')
            ->join($alias . ".integrantes", "integrantes.id", "men1a.id_integrante")
            ->join($alias . ".riesgos_salud_men1", "integrantes.id", "riesgos_salud_men1.id_inte")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'men1a.bcg', 'men1a.polio', 'men1a.pentavalente','riesgos_salud_men1.riesgos_desnutricion_aguda_R','riesgos_salud_men1.riesgos_desnutricion_global_R', 'men1a.carnet')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(MONTH, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('men1a.estado', 'Activo')
            ->get();

        }else{
            $menores_1_a = DB::connection('mysql')->table($alias.'.men1a')
            ->join($alias . ".integrantes", "integrantes.id", "men1a.id_integrante")
            ->join($alias . ".riesgos_salud_men1", "integrantes.id", "riesgos_salud_men1.id_inte")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'men1a.bcg', 'men1a.polio', 'men1a.pentavalente','riesgos_salud_men1.riesgos_desnutricion_aguda_R','riesgos_salud_men1.riesgos_desnutricion_global_R', 'men1a.carnet')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(MONTH, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('men1a.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->get();
        }

        $sin_bcg_numero = 0;
        $sin_polio_numero = 0;
        $esquema_completo_pentavalente_numero = 0;
        $esquema_icompleto_pentavalente_numero = 0;
        $desnutricion_aguda_carnet_desac_numero = 0;
        $desnutricion_global_carnet_desac_numero = 0;
        $esquema_completo_polio_numero = 0;

        $sin_bcg_porcentaje = 0;
        $sin_polio_porcentaje = 0;
        $esquema_completo_pentavalente_porcentaje = 0;
        $esquema_icompleto_pentavalente_porcentaje = 0;
        $desnutricion_aguda_carnet_desac_porcentaje = 0;
        $desnutricion_global_carnet_desac_porcentaje = 0;
        $esquema_completo_polio_porcentaje = 0;

        $sin_bcg_array = array();
        $sin_polio_array = array();
        $esquema_completo_polio_array = array();
        $desnutricion_carnet_desac_array = array();
        $esquema_icompleto_pentavalente_array = array();
        $esquema_completo_pentavalente_array = array();

        foreach ($menores_1_a as &$item) {
            if($item->bcg == "NO"){
                array_push($sin_bcg_array, $item);
                $sin_bcg_numero += 1;
            }

            if($item->polio == "NO"){
                array_push($sin_polio_array, $item);
                $sin_polio_numero += 1;
            }

            if($item->pentavalente == "D3"){
                $esquema_completo_pentavalente_numero += 1;
                array_push($esquema_completo_pentavalente_array, $item);
            }else{
                $esquema_icompleto_pentavalente_numero += 1;
                array_push($esquema_icompleto_pentavalente_array, $item);
            }

            if($item->polio == "D5"){
                array_push($esquema_completo_polio_array, $item);
                $esquema_completo_polio_numero += 1;
            }

            if($item->carnet == "DESAC" && ($item->riesgos_desnutricion_aguda_R =="4" || $item->riesgos_desnutricion_aguda_R =="5")){
                $desnutricion_aguda_carnet_desac_numero += 1;
                array_push($desnutricion_carnet_desac_array, $item);
            }

            if($item->carnet == "DESAC" && ($item->riesgos_desnutricion_global_R =="4" || $item->riesgos_desnutricion_global_R =="5")){
                $desnutricion_global_carnet_desac_numero += 1;
                array_push($desnutricion_carnet_desac_array, $item);
            }
        }

        if(count($menores_1_a) > 0){
            $numero = count($menores_1_a);

            $sin_bcg_porcentaje = ($sin_bcg_numero / $numero ) * 100;
            $sin_polio_porcentaje = ($sin_polio_numero / $numero ) * 100;
            $esquema_completo_pentavalente_porcentaje = ($esquema_completo_pentavalente_numero / $numero ) * 100;
            $esquema_icompleto_pentavalente_porcentaje = ($esquema_icompleto_pentavalente_numero / $numero ) * 100;
            $desnutricion_aguda_carnet_desac_porcentaje = ($desnutricion_aguda_carnet_desac_numero / $numero ) * 100;
            $desnutricion_global_carnet_desac_porcentaje = ($desnutricion_global_carnet_desac_numero / $numero ) * 100;
            $esquema_completo_polio_porcentaje = ($esquema_completo_polio_numero / $numero ) * 100;
        }

        return $info = [
            "sin_bcg_numero"  => $sin_bcg_numero,
            "sin_polio_numero"  => $sin_polio_numero,
            "sin_bcg_array"  => $sin_bcg_array,
            "sin_polio_array"  => $sin_polio_array,
            "esquema_completo_polio_numero"  => $esquema_completo_polio_numero,
            "esquema_completo_polio_array"  => $esquema_completo_polio_array,
            "esquema_completo_pentavalente_numero"  => $esquema_completo_pentavalente_numero,
            "esquema_icompleto_pentavalente_numero"  => $esquema_icompleto_pentavalente_numero,
            "desnutricion_aguda_carnet_desac_numero"  => $desnutricion_aguda_carnet_desac_numero,
            "desnutricion_global_carnet_desac_numero"  => $desnutricion_global_carnet_desac_numero,
            "desnutricion_carnet_desac_array"  => $desnutricion_carnet_desac_array,
            "sin_bcg_porcentaje"  => $sin_bcg_porcentaje,
            "sin_polio_porcentaje"  => $sin_polio_porcentaje,
            "esquema_completo_pentavalente_porcentaje"  => $esquema_completo_pentavalente_porcentaje,
            "esquema_icompleto_pentavalente_porcentaje"  => $esquema_icompleto_pentavalente_porcentaje,
            "desnutricion_aguda_carnet_desac_porcentaje"  => $desnutricion_aguda_carnet_desac_porcentaje,
            "desnutricion_global_carnet_desac_porcentaje"  => $desnutricion_global_carnet_desac_porcentaje,
            "esquema_completo_polio_porcentaje"  => $esquema_completo_polio_porcentaje,
            "esquema_completo_pentavalente_array"  => $esquema_completo_pentavalente_array,
            "esquema_icompleto_pentavalente_array"  => $esquema_icompleto_pentavalente_array,
            "numero_personas"  => count($menores_1_a)
        ];
    }

    public static function inmunizacion_de1a5($alias, $tipo, $id){
        if($tipo == "todos"){
    
            $de1a5_a = DB::connection('mysql')->table($alias.'.de1a5')
            ->join($alias . ".integrantes", "integrantes.id", "de1a5.id_integrante")
            ->join($alias . ".riesgos_salud_de1a5", "integrantes.id", "riesgos_salud_de1a5.id_inte")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de1a5.carnet', 'de1a5.polio', 'de1a5.pentavalente', 'de1a5.tripleviral', 'de1a5.neumococo', 'riesgos_salud_de1a5.riesgos_desnutricion_aguda_R','riesgos_salud_de1a5.riesgos_desnutricion_global_R')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de1a5.estado', 'Activo')
            ->get();

        }else{
            $de1a5_a = DB::connection('mysql')->table($alias.'.de1a5')
            ->join($alias . ".integrantes", "integrantes.id", "de1a5.id_integrante")
            ->join($alias . ".riesgos_salud_de1a5", "integrantes.id", "riesgos_salud_de1a5.id_inte")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de1a5.carnet', 'de1a5.polio', 'de1a5.pentavalente', 'de1a5.tripleviral', 'de1a5.neumococo', 'riesgos_salud_de1a5.riesgos_desnutricion_aguda_R','riesgos_salud_de1a5.riesgos_desnutricion_global_R')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de1a5.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->get();
        }

        $esquema_incompleto_numero = 0;
        $esquema_completo_polio_numero = 0;
        $esquema_icompleto_polio_numero = 0;
        $esquema_completo_pentavalente_numero = 0;
        $esquema_incompleto_pentavalente_numero = 0;
        $desnutricion_aguda_carnet_desac_numero = 0;
        $desnutricion_global_carnet_desac_numero = 0;
        $esquema_completo_triple_numero = 0;

        $esquema_incompleto_porcentaje = 0;
        $esquema_completo_polio_porcentaje = 0;
        $esquema_icompleto_polio__porcentaje = 0;
        $esquema_completo_pentavalente_porcentaje = 0;
        $esquema_icompleto_pentavalente_porcentaje = 0;
        $esquema_completo_triple_porcentaje = 0;

        $array_1_a = array();


        foreach ($de1a5_a as &$item) {

            if($item->carnet == "DESAC"){
                $esquema_incompleto_numero += 1;
            }

            if($item->polio == "D5"){
                $esquema_completo_polio_numero += 1;
            }else{
                $esquema_icompleto_polio_numero += 1;
            }

            if($item->pentavalente == "D3"){
                $esquema_completo_pentavalente_numero += 1;
            }else{
                $esquema_incompleto_pentavalente_numero += 1;
            }

            if($item->tripleviral == "1R"){
                $esquema_completo_triple_numero += 1;
            }

            if($item->carnet == "DESACTUALIZADO" && ($item->riesgos_desnutricion_aguda_R =="4" || $item->riesgos_desnutricion_aguda_R =="5")){
                $desnutricion_aguda_carnet_desac_numero += 1;
            }

            if($item->carnet == "DESACTUALIZADO" && ($item->riesgos_desnutricion_global_R =="4" || $item->riesgos_desnutricion_global_R =="5")){
                $desnutricion_global_carnet_desac_numero += 1;
            }

            if($item->edad == 1){
                array_push($array_1_a, $item); 
            }
        }

        if(count($de1a5_a) > 0){
            $numero = count($de1a5_a);

            $esquema_incompleto_porcentaje = ($esquema_incompleto_numero / $numero ) * 100;
            $esquema_completo_polio_porcentaje = ($esquema_completo_polio_numero / $numero ) * 100;
            $esquema_icompleto_polio__porcentaje = ($esquema_icompleto_polio_numero / $numero ) * 100;
            $esquema_completo_pentavalente_porcentaje = ($esquema_completo_pentavalente_numero / $numero ) * 100;
            $esquema_icompleto_pentavalente_porcentaje = ($esquema_incompleto_pentavalente_numero / $numero ) * 100;
            $esquema_completo_triple_porcentaje = ($esquema_completo_triple_numero / $numero ) * 100;
        }

        $esquema_incompleto_neumococo_numero = 0;
        $esquema_incompleto_neumococo_porcentaje = 0;

        foreach ($array_1_a as &$item) {
            if($item->neumococo == "R1"){
                $esquema_incompleto_neumococo_numero += 1;
            }
        }

        if(count($array_1_a) > 0){
            $numero = count($array_1_a);
            $esquema_incompleto_neumococo_porcentaje = ($esquema_incompleto_neumococo_numero / $numero ) * 100;
        }

        

        return $info = [
            "esquema_incompleto_numero"  => $esquema_incompleto_numero,
            "esquema_completo_polio_numero"  => $esquema_completo_polio_numero,
            "esquema_icompleto_polio_numero"  => $esquema_icompleto_polio_numero,
            "esquema_completo_pentavalente_numero"  => $esquema_completo_pentavalente_numero,
            "esquema_incompleto_pentavalente_numero"  => $esquema_incompleto_pentavalente_numero,
            "desnutricion_aguda_carnet_desac_numero"  => $desnutricion_aguda_carnet_desac_numero,
            "desnutricion_global_carnet_desac_numero"  => $desnutricion_global_carnet_desac_numero,
            "esquema_completo_triple_numero"  => $esquema_completo_triple_numero,
            "esquema_incompleto_porcentaje"  => $esquema_incompleto_porcentaje,
            "esquema_completo_polio_porcentaje"  => $esquema_completo_polio_porcentaje,
            "esquema_icompleto_polio__porcentaje"  => $esquema_icompleto_polio__porcentaje,
            "esquema_completo_pentavalente_porcentaje"  => $esquema_completo_pentavalente_porcentaje,
            "esquema_icompleto_pentavalente_porcentaje"  => $esquema_icompleto_pentavalente_porcentaje,
            "esquema_completo_triple_porcentaje"  => $esquema_completo_triple_porcentaje,
            "numero_personas"  => count($de1a5_a),
            "personas" => $de1a5_a,
            "personas_1_anio"  => $array_1_a,
            "numero_personas_1_anio"  => count($array_1_a),
            "esquema_incompleto_neumococo_numero"  => $esquema_incompleto_neumococo_numero,
            "esquema_incompleto_neumococo_porcentaje"  => $esquema_incompleto_neumococo_porcentaje,
        ];
    }

    public static function inmunizacion_general_9a18($alias, $tipo, $id){
        if($tipo == "todos"){
    
            $de6a11 = DB::connection('mysql')->table($alias.'.de6a11')
            ->join($alias . ".integrantes", "integrantes.id", "de6a11.id_integrante")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de6a11.papiloma')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de6a11.estado', 'Activo')
            ->where('de6a11.sexo', 'FEMENINO')
            ->where('de6a11.edad', '>=' , 9)
            ->get();

            $de12a17 = DB::connection('mysql')->table($alias.'.de12a17')
            ->join($alias . ".integrantes", "integrantes.id", "de12a17.id_integrante")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de12a17.papiloma')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de12a17.estado', 'Activo')
            ->where('de12a17.sexo', 'FEMENINO')
            ->get();

            $de18a28 = DB::connection('mysql')->table($alias.'.de18a28')
            ->join($alias . ".integrantes", "integrantes.id", "de18a28.id_integrante")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de18a28.papiloma')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de18a28.estado', 'Activo')
            ->where('de18a28.sexo', 'FEMENINO')
            ->where('de18a28.edad', '<=' , 18)
            ->get();

        }else{

            $de6a11 = DB::connection('mysql')->table($alias.'.de6a11')
            ->join($alias . ".integrantes", "integrantes.id", "de6a11.id_integrante")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de6a11.papiloma')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de6a11.estado', 'Activo')
            ->where('de6a11.sexo', 'FEMENINO')
            ->where('de6a11.edad', '>=' , 9)
            ->where('hogar.id_'.$tipo, $id)
            ->get();

            $de12a17 = DB::connection('mysql')->table($alias.'.de12a17')
            ->join($alias . ".integrantes", "integrantes.id", "de12a17.id_integrante")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de12a17.papiloma')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de12a17.estado', 'Activo')
            ->where('de12a17.sexo', 'FEMENINO')
            ->where('hogar.id_'.$tipo, $id)
            ->get();

            $de18a28 = DB::connection('mysql')->table($alias.'.de18a28')
            ->join($alias . ".integrantes", "integrantes.id", "de18a28.id_integrante")
            ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->select('integrantes.id','integrantes.id_hogar','integrantes.tipo_id','integrantes.identificacion', 'de18a28.papiloma')
            ->selectRaw("CONCAT_WS(' ',integrantes.pnom, integrantes.snom, integrantes.pape, integrantes.sape) as nombre")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")->selectRaw("CONCAT_WS('',barrios.barrio) as des_barrio")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, hogar.fecha) as edad")
            ->where('hogar.estado', 'Activo')
            ->where('integrantes.estado', 'Activo')
            ->where('de18a28.estado', 'Activo')
            ->where('de18a28.sexo', 'FEMENINO')
            ->where('de18a28.edad', '<=' , 18)
            ->where('hogar.id_'.$tipo, $id)
            ->get();

        }

        $array_9a18 = array();
        $no_papiloma = array();
        $con_una_dosis_papiloma = array();
        $completo_papiloma = array();

        foreach ($de6a11 as &$item) {
            array_push($array_9a18, $item); 
        }

        foreach ($de12a17 as &$item) {
            array_push($array_9a18, $item); 
        }

        foreach ($de18a28 as &$item) {
            array_push($array_9a18, $item); 
        }

        foreach ($array_9a18 as &$item) {
            if($item->papiloma == "NO"){
                array_push($no_papiloma, $item); 
            }

            if($item->papiloma == "D1"){
                array_push($con_una_dosis_papiloma, $item); 
            }

            if($item->papiloma == "D2"){
                array_push($completo_papiloma, $item); 
            }
        }

        $numero_no_papiloma = count($no_papiloma);
        $numero_con_una_dosis_papiloma = count($con_una_dosis_papiloma);
        $numero_completo_papiloma = count($completo_papiloma);

        if($numero_no_papiloma == 0){
            $porcentaje_no_papiloma = 0;
        }else{
            $porcentaje_no_papiloma = ($numero_no_papiloma / count($array_9a18)) * 100;
        }

        if($numero_con_una_dosis_papiloma == 0){
            $porcentaje_con_una_dosis_papiloma = 0;
        }else{
            $porcentaje_con_una_dosis_papiloma = ($numero_con_una_dosis_papiloma / count($array_9a18)) * 100;
        }

        if($numero_completo_papiloma == 0){
            $porcentaje_completo_papiloma = 0;
        }else{
            $porcentaje_completo_papiloma = ($numero_completo_papiloma / count($array_9a18)) * 100;
        }

        return $info = [
            "numero_9a18"  => count($array_9a18),
            "no_papiloma"  => $no_papiloma,
            "completo_papiloma"  => $completo_papiloma,
            "con_una_dosis_papiloma"  => $con_una_dosis_papiloma,

            "numero_no_papiloma"  => $numero_no_papiloma,
            "numero_con_una_dosis_papiloma"  => $numero_con_una_dosis_papiloma,
            "numero_completo_papiloma"  => $numero_completo_papiloma,

            "porcentaje_no_papiloma"  => $porcentaje_no_papiloma,
            "porcentaje_con_una_dosis_papiloma"  => $porcentaje_con_una_dosis_papiloma,
            "porcentaje_completo_papiloma"  => $porcentaje_completo_papiloma,
        ];
    }

}
