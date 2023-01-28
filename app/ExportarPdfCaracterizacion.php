<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ExportarPdfCaracterizacion extends Model
{
    public static function calcularRiesgosAmbientales($riesgos_ambientales){
        if ($riesgos_ambientales) {
            $riesgos_ambientales->va_riesgos_derrumbes = self::valorizacion($riesgos_ambientales->riesgos_derrumbes, 1);
            $riesgos_ambientales->color_riesgos_derrumbes = self::color($riesgos_ambientales->va_riesgos_derrumbes);
            if ($riesgos_ambientales->control_riesgos_derrumbes != "0") {
                $riesgos_ambientales->val_residual_riesgos_derrumbes = self::valRieRes($riesgos_ambientales->control_riesgos_derrumbes);
                $riesgos_ambientales->color_residual_riesgos_derrumbes = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_derrumbes);
            } else {
                $riesgos_ambientales->val_residual_riesgos_derrumbes = "";
                $riesgos_ambientales->color_residual_riesgos_derrumbes = "";
            }

            $riesgos_ambientales->va_riesgos_inundacion = self::valorizacion($riesgos_ambientales->riesgos_inundacion, 1);
            $riesgos_ambientales->color_riesgos_inundacion = self::color($riesgos_ambientales->va_riesgos_inundacion);
            if ($riesgos_ambientales->control_riesgos_inundacion != "0") {
                $riesgos_ambientales->val_residual_riesgos_inundacion = self::valRieRes($riesgos_ambientales->control_riesgos_inundacion);
                $riesgos_ambientales->color_residual_riesgos_inundacion = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_inundacion);
            } else {
                $riesgos_ambientales->val_residual_riesgos_inundacion = "";
                $riesgos_ambientales->color_residual_riesgos_inundacion = "";
            }

            $riesgos_ambientales->va_riesgos_insalubridad = self::valorizacion($riesgos_ambientales->riesgos_insalubridad, 2);
            $riesgos_ambientales->color_riesgos_insalubridad = self::color($riesgos_ambientales->va_riesgos_insalubridad);
            if ($riesgos_ambientales->control_riesgos_insalubridad != "0") {
                $riesgos_ambientales->val_residual_riesgos_insalubridad = self::valRieRes($riesgos_ambientales->control_riesgos_insalubridad);
                $riesgos_ambientales->color_residual_riesgos_insalubridad = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_insalubridad);
            } else {
                $riesgos_ambientales->val_residual_riesgos_insalubridad = "";
                $riesgos_ambientales->color_residual_riesgos_insalubridad = "";
            }

            $riesgos_ambientales->va_riesgos_atmosferico = self::valorizacion($riesgos_ambientales->riesgos_atmosferico, 1);
            $riesgos_ambientales->color_riesgos_atmosferico = self::color($riesgos_ambientales->va_riesgos_atmosferico);
            if ($riesgos_ambientales->control_riesgos_atmosferico != "0") {
                $riesgos_ambientales->val_residual_riesgos_atmosferico = self::valRieRes($riesgos_ambientales->control_riesgos_atmosferico);
                $riesgos_ambientales->color_residual_riesgos_atmosferico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_atmosferico);
            } else {
                $riesgos_ambientales->val_residual_riesgos_atmosferico = "";
                $riesgos_ambientales->color_residual_riesgos_atmosferico = "";
            }

            $riesgos_ambientales->va_riesgos_recurso_suelo = self::valorizacion($riesgos_ambientales->riesgos_recurso_suelo, 1);
            $riesgos_ambientales->color_riesgos_recurso_suelo = self::color($riesgos_ambientales->va_riesgos_recurso_suelo);
            if ($riesgos_ambientales->control_riesgos_recurso_suelo != "0") {
                $riesgos_ambientales->val_residual_riesgos_recurso_suelo = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_suelo);
                $riesgos_ambientales->color_residual_riesgos_recurso_suelo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_suelo);
            } else {
                $riesgos_ambientales->val_residual_riesgos_recurso_suelo = "";
                $riesgos_ambientales->color_residual_riesgos_recurso_suelo = "";
            }

            $riesgos_ambientales->va_riesgos_quema = self::valorizacion($riesgos_ambientales->riesgos_quema, 1);
            $riesgos_ambientales->color_riesgos_quema = self::color($riesgos_ambientales->va_riesgos_quema);
            if ($riesgos_ambientales->control_riesgos_quema != "0") {
                $riesgos_ambientales->val_residual_riesgos_quema = self::valRieRes($riesgos_ambientales->control_riesgos_quema);
                $riesgos_ambientales->color_residual_riesgos_quema = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_quema);
            } else {
                $riesgos_ambientales->val_residual_riesgos_quema = "";
                $riesgos_ambientales->color_residual_riesgos_quema = "";
            }

            $riesgos_ambientales->va_riesgos_auditivo = self::valorizacion($riesgos_ambientales->riesgos_auditivo, 3);
            $riesgos_ambientales->color_riesgos_auditivo = self::color($riesgos_ambientales->va_riesgos_auditivo);
            if ($riesgos_ambientales->control_riesgos_auditivo != "0") {
                $riesgos_ambientales->val_residual_riesgos_auditivo = self::valRieRes($riesgos_ambientales->control_riesgos_auditivo);
                $riesgos_ambientales->color_residual_riesgos_auditivo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_auditivo);
            } else {
                $riesgos_ambientales->val_residual_riesgos_auditivo = "";
                $riesgos_ambientales->color_residual_riesgos_auditivo = "";
            }

            $riesgos_ambientales->va_riesgos_recurso_hidrico = self::valorizacion($riesgos_ambientales->riesgos_recurso_hidrico, 1);
            $riesgos_ambientales->color_riesgos_recurso_hidrico = self::color($riesgos_ambientales->va_riesgos_recurso_hidrico);
            if ($riesgos_ambientales->control_riesgos_recurso_hidrico != "0") {
                $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_hidrico);
                $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_hidrico);
            } else {
                $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = "";
                $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = "";
            }

            $riesgos_ambientales->va_riesgos_acceso_agua = self::valorizacion($riesgos_ambientales->riesgos_acceso_agua, 1);
            $riesgos_ambientales->color_riesgos_acceso_agua = self::color($riesgos_ambientales->va_riesgos_acceso_agua);
            if ($riesgos_ambientales->control_riesgos_acceso_agua != "0") {
                $riesgos_ambientales->val_residual_riesgos_acceso_agua = self::valRieRes($riesgos_ambientales->control_riesgos_acceso_agua);
                $riesgos_ambientales->color_residual_riesgos_acceso_agua = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_acceso_agua);
            } else {
                $riesgos_ambientales->val_residual_riesgos_acceso_agua = "";
                $riesgos_ambientales->color_residual_riesgos_acceso_agua = "";
            }
        }
        return $riesgos_ambientales;
    }

    public static function valRieRes($valor)
    {
        $eficacia = "";
        if ($valor == 1) {
            $eficacia = "Bajo";
        } else {
            if ($valor == 2) {
                $eficacia = "Moderado";
            } else {
                $eficacia = "Alto";
            }
        }
        return $eficacia;
    }

    public static function colorRieRes($valor)
    {
        $color = "";
        if ($valor == "Bajo") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Moderado") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public static function valorizacion($valor, $opc)
    {
        $valorizacion = "";
        if ($opc == 1) {
            if ($valor < 3) {
                $valorizacion = "Bajo";
            } else if ($valor >= 3 && $valor < 7) {
                $valorizacion = "Medio";
            } else {
                $valorizacion = "Alto";
            }
        } else {
            if ($opc == 2) {
                if ($valor < 5) {
                    $valorizacion = "Bajo";
                } else if ($valor >= 5 && $valor < 15) {
                    $valorizacion = "Medio";
                } else {
                    $valorizacion = "Alto";
                }
            } else {
                if ($valor < 1.6) {
                    $valorizacion = "Bajo";
                } else if ($valor >= 1.6 && $valor < 3.2) {
                    $valorizacion = "Medio";
                } else {
                    $valorizacion = "Alto";
                }
            }
        }
        return $valorizacion;
    }

    public static function color($valor)
    {
        $color = "";
        if ($valor == "Bajo") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Medio") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public static function consultarRiesgosSalud($alias, $IDHOGAR){
        //menor a 1 año
        $riesgos_salud_men1a = \App\RiesgosSaludMen1::buscar($alias, $IDHOGAR);
        if ($riesgos_salud_men1a) {
            foreach ($riesgos_salud_men1a as $item) {
                $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);

                $item->v_riesgos_desnutricion_aguda_I = $item->riesgos_desnutricion_aguda_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_I);
                $item->v_riesgos_desnutricion_global_I = $item->riesgos_desnutricion_global_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_I);
                $item->v_desnutricion_global_I = $item->desnutricion_global_I == 0 ? "" : self::valRieResSa($item->desnutricion_global_I);
                $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                $item->v_talla_baja_retraso_I = $item->talla_baja_retraso_I == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_I);
                $item->v_desnutricion_aguda_moderada_I = $item->desnutricion_aguda_moderada_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_I);
                $item->v_desnutricion_aguda_severa_I = $item->desnutricion_aguda_severa_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_I);
                $item->v_riesgo_muerte_I = $item->riesgo_muerte_I == 0 ? "" : self::valRieResSa($item->riesgo_muerte_I);
                $item->v_riesgo_sobrepeso_I = $item->riesgo_sobrepeso_I == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_I);
                $item->v_sobrepeso_I = $item->sobrepeso_I == 0 ? "" : self::valRieResSa($item->sobrepeso_I);
                $item->v_obesidad_I = $item->obesidad_I == 0 ? "" : self::valRieResSa($item->obesidad_I);

                $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);

                $item->c_riesgos_desnutricion_aguda_I = $item->v_riesgos_desnutricion_aguda_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_I);
                $item->c_riesgos_desnutricion_global_I = $item->v_riesgos_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_I);
                $item->c_desnutricion_global_I = $item->v_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_I);
                $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                $item->c_talla_baja_retraso_I = $item->v_talla_baja_retraso_I == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_I);
                $item->c_desnutricion_aguda_moderada_I = $item->v_desnutricion_aguda_moderada_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_I);
                $item->c_desnutricion_aguda_severa_I = $item->v_desnutricion_aguda_severa_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_I);
                $item->c_riesgo_muerte_I = $item->v_riesgo_muerte_I == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_I);
                $item->c_riesgo_sobrepeso_I = $item->v_riesgo_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_I);
                $item->c_sobrepeso_I = $item->v_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_sobrepeso_I);
                $item->c_obesidad_I = $item->v_obesidad_I == "" ? "" : self::colorRieResSa($item->v_obesidad_I);

                $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                $item->v_riesgos_desnutricion_aguda_R = $item->riesgos_desnutricion_aguda_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_R);
                $item->v_riesgos_desnutricion_global_R = $item->riesgos_desnutricion_global_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_R);
                $item->v_desnutricion_global_R = $item->desnutricion_global_R == 0 ? "" : self::valRieResSa($item->desnutricion_global_R);
                $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                $item->v_talla_baja_retraso_R = $item->talla_baja_retraso_R == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_R);
                $item->v_desnutricion_aguda_moderada_R = $item->desnutricion_aguda_moderada_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_R);
                $item->v_desnutricion_aguda_severa_R = $item->desnutricion_aguda_severa_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_R);
                $item->v_riesgo_muerte_R = $item->riesgo_muerte_R == 0 ? "" : self::valRieResSa($item->riesgo_muerte_R);
                $item->v_riesgo_sobrepeso_R = $item->riesgo_sobrepeso_R == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_R);
                $item->v_sobrepeso_R = $item->sobrepeso_R == 0 ? "" : self::valRieResSa($item->sobrepeso_R);
                $item->v_obesidad_R = $item->obesidad_R == 0 ? "" : self::valRieResSa($item->obesidad_R);

                $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                $item->c_riesgos_desnutricion_aguda_R = $item->v_riesgos_desnutricion_aguda_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_R);
                $item->c_riesgos_desnutricion_global_R = $item->v_riesgos_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_R);
                $item->c_desnutricion_global_R = $item->v_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_R);
                $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                $item->c_talla_baja_retraso_R = $item->v_talla_baja_retraso_R == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_R);
                $item->c_desnutricion_aguda_moderada_R = $item->v_desnutricion_aguda_moderada_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_R);
                $item->c_desnutricion_aguda_severa_R = $item->v_desnutricion_aguda_severa_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_R);
                $item->c_riesgo_muerte_R = $item->v_riesgo_muerte_R == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_R);
                $item->c_riesgo_sobrepeso_R = $item->v_riesgo_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_R);
                $item->c_sobrepeso_R = $item->v_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_sobrepeso_R);
                $item->c_obesidad_R = $item->v_obesidad_R == "" ? "" : self::colorRieResSa($item->v_obesidad_R);
            }
        }

        // de 1 a 5 años
        $riesgos_salud_de1a5 = \App\RiesgosSaludDe1a5::buscar($alias, $IDHOGAR);
        if ($riesgos_salud_de1a5) {
            foreach ($riesgos_salud_de1a5 as $item) {
                $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);

                $item->v_riesgos_desnutricion_aguda_I = $item->riesgos_desnutricion_aguda_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_I);
                $item->v_riesgos_desnutricion_global_I = $item->riesgos_desnutricion_global_I == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_I);
                $item->v_desnutricion_global_I = $item->desnutricion_global_I == 0 ? "" : self::valRieResSa($item->desnutricion_global_I);
                $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                $item->v_talla_baja_retraso_I = $item->talla_baja_retraso_I == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_I);
                $item->v_desnutricion_aguda_moderada_I = $item->desnutricion_aguda_moderada_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_I);
                $item->v_desnutricion_aguda_severa_I = $item->desnutricion_aguda_severa_I == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_I);
                $item->v_riesgo_muerte_I = $item->riesgo_muerte_I == 0 ? "" : self::valRieResSa($item->riesgo_muerte_I);
                $item->v_riesgo_sobrepeso_I = $item->riesgo_sobrepeso_I == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_I);
                $item->v_sobrepeso_I = $item->sobrepeso_I == 0 ? "" : self::valRieResSa($item->sobrepeso_I);
                $item->v_obesidad_I = $item->obesidad_I == 0 ? "" : self::valRieResSa($item->obesidad_I);

                $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);

                $item->c_riesgos_desnutricion_aguda_I = $item->v_riesgos_desnutricion_aguda_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_I);
                $item->c_riesgos_desnutricion_global_I = $item->v_riesgos_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_I);
                $item->c_desnutricion_global_I = $item->v_desnutricion_global_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_I);
                $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                $item->c_talla_baja_retraso_I = $item->v_talla_baja_retraso_I == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_I);
                $item->c_desnutricion_aguda_moderada_I = $item->v_desnutricion_aguda_moderada_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_I);
                $item->c_desnutricion_aguda_severa_I = $item->v_desnutricion_aguda_severa_I == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_I);
                $item->c_riesgo_muerte_I = $item->v_riesgo_muerte_I == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_I);
                $item->c_riesgo_sobrepeso_I = $item->v_riesgo_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_I);
                $item->c_sobrepeso_I = $item->v_sobrepeso_I == "" ? "" : self::colorRieResSa($item->v_sobrepeso_I);
                $item->c_obesidad_I = $item->v_obesidad_I == "" ? "" : self::colorRieResSa($item->v_obesidad_I);

                $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                $item->v_riesgos_desnutricion_aguda_R = $item->riesgos_desnutricion_aguda_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_aguda_R);
                $item->v_riesgos_desnutricion_global_R = $item->riesgos_desnutricion_global_R == 0 ? "" : self::valRieResSa($item->riesgos_desnutricion_global_R);
                $item->v_desnutricion_global_R = $item->desnutricion_global_R == 0 ? "" : self::valRieResSa($item->desnutricion_global_R);
                $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                $item->v_talla_baja_retraso_R = $item->talla_baja_retraso_R == 0 ? "" : self::valRieResSa($item->talla_baja_retraso_R);
                $item->v_desnutricion_aguda_moderada_R = $item->desnutricion_aguda_moderada_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_moderada_R);
                $item->v_desnutricion_aguda_severa_R = $item->desnutricion_aguda_severa_R == 0 ? "" : self::valRieResSa($item->desnutricion_aguda_severa_R);
                $item->v_riesgo_muerte_R = $item->riesgo_muerte_R == 0 ? "" : self::valRieResSa($item->riesgo_muerte_R);
                $item->v_riesgo_sobrepeso_R = $item->riesgo_sobrepeso_R == 0 ? "" : self::valRieResSa($item->riesgo_sobrepeso_R);
                $item->v_sobrepeso_R = $item->sobrepeso_R == 0 ? "" : self::valRieResSa($item->sobrepeso_R);
                $item->v_obesidad_R = $item->obesidad_R == 0 ? "" : self::valRieResSa($item->obesidad_R);

                $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                $item->c_riesgos_desnutricion_aguda_R = $item->v_riesgos_desnutricion_aguda_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_aguda_R);
                $item->c_riesgos_desnutricion_global_R = $item->v_riesgos_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_riesgos_desnutricion_global_R);
                $item->c_desnutricion_global_R = $item->v_desnutricion_global_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_global_R);
                $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                $item->c_talla_baja_retraso_R = $item->v_talla_baja_retraso_R == "" ? "" : self::colorRieResSa($item->v_talla_baja_retraso_R);
                $item->c_desnutricion_aguda_moderada_R = $item->v_desnutricion_aguda_moderada_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_moderada_R);
                $item->c_desnutricion_aguda_severa_R = $item->v_desnutricion_aguda_severa_R == "" ? "" : self::colorRieResSa($item->v_desnutricion_aguda_severa_R);
                $item->c_riesgo_muerte_R = $item->v_riesgo_muerte_R == "" ? "" : self::colorRieResSa($item->v_riesgo_muerte_R);
                $item->c_riesgo_sobrepeso_R = $item->v_riesgo_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_riesgo_sobrepeso_R);
                $item->c_sobrepeso_R = $item->v_sobrepeso_R == "" ? "" : self::colorRieResSa($item->v_sobrepeso_R);
                $item->c_obesidad_R = $item->v_obesidad_R == "" ? "" : self::colorRieResSa($item->v_obesidad_R);
            }
        }

        //de 6 a 11 años
        $riesgos_salud_de6a11 = \App\RiesgosSaludDe6a11::buscar($alias, $IDHOGAR);
        if ($riesgos_salud_de6a11) {
            foreach ($riesgos_salud_de6a11 as $item) {
                $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
            }
        }

        // de 12 a 18 años
        $riesgos_salud_de12a17 = \App\RiesgosSaludDe12a17::buscar($alias, $IDHOGAR);
        if ($riesgos_salud_de12a17) {
            foreach ($riesgos_salud_de12a17 as $item) {
                $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                $item->v_riesgo_talla_baja_I = $item->riesgo_talla_baja_I == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_I);
                $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                $item->c_riesgo_talla_baja_I = $item->v_riesgo_talla_baja_I == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_I);
                $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                $item->v_riesgo_talla_baja_R = $item->riesgo_talla_baja_R == 0 ? "" : self::valRieResSa($item->riesgo_talla_baja_R);
                $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                $item->c_riesgo_talla_baja_R = $item->v_riesgo_talla_baja_R == "" ? "" : self::colorRieResSa($item->v_riesgo_talla_baja_R);
                $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
            }
        }

        // de 18 a 28 años
        $riesgos_salud_de18a28 = \App\RiesgosSaludDe18a28::buscar($alias, $IDHOGAR);
        if ($riesgos_salud_de18a28) {
            foreach ($riesgos_salud_de18a28 as $item) {
                $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSaludMejorado($item->enfermedades_infecciosas_I, 1);
                $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSaludMejorado($item->transtornos_asociados_spa_I, 2);
                $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSaludMejorado($item->enfermedad_cardiovascular_I, 1);
                $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSaludMejorado($item->cancer_I, 1);
                $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSaludMejorado($item->alteraciones_transtornos_visuales_I, 1);
                $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSaludMejorado($item->alteraciones_transtornos_audicion_I, 1);
                $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSaludMejorado($item->salud_bucal_I, 1);
                $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSaludMejorado($item->problemas_salud_mental_I, 1);
                $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSaludMejorado($item->violencias_I, 1);
                $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSaludMejorado($item->enfermedades_respiratorias_I, 1);
                $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSaludMejorado($item->enfermedades_zoonoticas_I, 1);
                $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSaludMejorado($item->transtornos_degenartivos_I, 1);
                $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSaludMejorado($item->consumo_spa_I, 1);
                $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSaludMejorado($item->riesgo_delgadez_I, 1);

                $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSaludMejorado($item->v_enfermedades_infecciosas_I);
                $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSaludMejorado($item->v_transtornos_asociados_spa_I);
                $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSaludMejorado($item->v_enfermedad_cardiovascular_I);
                $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSaludMejorado($item->v_cancer_I);
                $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSaludMejorado($item->v_alteraciones_transtornos_visuales_I);
                $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSaludMejorado($item->v_alteraciones_transtornos_audicion_I);
                $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSaludMejorado($item->v_salud_bucal_I);
                $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSaludMejorado($item->v_problemas_salud_mental_I);
                $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSaludMejorado($item->v_violencias_I);
                $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSaludMejorado($item->v_enfermedades_respiratorias_I);
                $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSaludMejorado($item->v_enfermedades_zoonoticas_I);
                $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSaludMejorado($item->v_transtornos_degenartivos_I);
                $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSaludMejorado($item->v_consumo_spa_I);
                $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSaludMejorado($item->v_riesgo_delgadez_I);

                $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);                            
            }
        }

        // de 29 a 59 años
        $riesgos_salud_de29a59 = \App\RiesgosSaludDe29a59::buscar($alias, $IDHOGAR);
        if ($riesgos_salud_de29a59) {
            foreach ($riesgos_salud_de29a59 as $item) {
                $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);
                $item->v_riesgo_delgadez_I = $item->riesgo_delgadez_I == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_I);

                $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);
                $item->c_riesgo_delgadez_I = $item->v_riesgo_delgadez_I == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_I);

                $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);
                $item->v_riesgo_delgadez_R = $item->riesgo_delgadez_R == 0 ? "" : self::valRieResSa($item->riesgo_delgadez_R);

                $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
                $item->c_riesgo_delgadez_R = $item->v_riesgo_delgadez_R == "" ? "" : self::colorRieResSa($item->v_riesgo_delgadez_R);
            }
        }

        // de 60 años o mas
        $riesgos_salud_de60 = \App\RiesgosSaludDe60::buscar($alias, $IDHOGAR);
        if ($riesgos_salud_de60) {
            foreach ($riesgos_salud_de60 as $item) {
                $item->v_enfermedades_infecciosas_I = $item->enfermedades_infecciosas_I == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_I);
                $item->v_transtornos_asociados_spa_I = $item->transtornos_asociados_spa_I == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_I);
                $item->v_enfermedad_cardiovascular_I = $item->enfermedad_cardiovascular_I == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_I);
                $item->v_cancer_I = $item->cancer_I == 0 ? "" : self::valRieResSa($item->cancer_I);
                $item->v_alteraciones_transtornos_visuales_I = $item->alteraciones_transtornos_visuales_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_I);
                $item->v_alteraciones_transtornos_audicion_I = $item->alteraciones_transtornos_audicion_I == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_I);
                $item->v_salud_bucal_I = $item->salud_bucal_I == 0 ? "" : self::valRieResSa($item->salud_bucal_I);
                $item->v_problemas_salud_mental_I = $item->problemas_salud_mental_I == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_I);
                $item->v_violencias_I = $item->violencias_I == 0 ? "" : self::valRieResSa($item->violencias_I);
                $item->v_enfermedades_respiratorias_I = $item->enfermedades_respiratorias_I == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_I);
                $item->v_enfermedades_zoonoticas_I = $item->enfermedades_zoonoticas_I == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_I);
                $item->v_transtornos_degenartivos_I = $item->transtornos_degenartivos_I == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_I);
                $item->v_consumo_spa_I = $item->consumo_spa_I == 0 ? "" : self::valRieResSa($item->consumo_spa_I);

                $item->c_enfermedades_infecciosas_I = $item->v_enfermedades_infecciosas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_I);
                $item->c_transtornos_asociados_spa_I = $item->v_transtornos_asociados_spa_I == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_I);
                $item->c_enfermedad_cardiovascular_I = $item->v_enfermedad_cardiovascular_I == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_I);
                $item->c_cancer_I = $item->v_cancer_I == "" ? "" : self::colorRieResSa($item->v_cancer_I);
                $item->c_alteraciones_transtornos_visuales_I = $item->v_alteraciones_transtornos_visuales_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_I);
                $item->c_alteraciones_transtornos_audicion_I = $item->v_alteraciones_transtornos_audicion_I == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_I);
                $item->c_salud_bucal_I = $item->v_salud_bucal_I == "" ? "" : self::colorRieResSa($item->v_salud_bucal_I);
                $item->c_problemas_salud_mental_I = $item->v_problemas_salud_mental_I == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_I);
                $item->c_violencias_I = $item->v_violencias_I == "" ? "" : self::colorRieResSa($item->v_violencias_I);
                $item->c_enfermedades_respiratorias_I = $item->v_enfermedades_respiratorias_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_I);
                $item->c_enfermedades_zoonoticas_I = $item->v_enfermedades_zoonoticas_I == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_I);
                $item->c_transtornos_degenartivos_I = $item->v_transtornos_degenartivos_I == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_I);
                $item->c_consumo_spa_I = $item->v_consumo_spa_I == "" ? "" : self::colorRieResSa($item->v_consumo_spa_I);

                $item->v_enfermedades_infecciosas_R = $item->enfermedades_infecciosas_R == 0 ? "" : self::valRieResSa($item->enfermedades_infecciosas_R);
                $item->v_transtornos_asociados_spa_R = $item->transtornos_asociados_spa_R == 0 ? "" : self::valRieResSa($item->transtornos_asociados_spa_R);
                $item->v_enfermedad_cardiovascular_R = $item->enfermedad_cardiovascular_R == 0 ? "" : self::valRieResSa($item->enfermedad_cardiovascular_R);
                $item->v_cancer_R = $item->cancer_R == 0 ? "" : self::valRieResSa($item->cancer_R);
                $item->v_alteraciones_transtornos_visuales_R = $item->alteraciones_transtornos_visuales_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_visuales_R);
                $item->v_alteraciones_transtornos_audicion_R = $item->alteraciones_transtornos_audicion_R == 0 ? "" : self::valRieResSa($item->alteraciones_transtornos_audicion_R);
                $item->v_salud_bucal_R = $item->salud_bucal_R == 0 ? "" : self::valRieResSa($item->salud_bucal_R);
                $item->v_problemas_salud_mental_R = $item->problemas_salud_mental_R == 0 ? "" : self::valRieResSa($item->problemas_salud_mental_R);
                $item->v_violencias_R = $item->violencias_R == 0 ? "" : self::valRieResSa($item->violencias_R);
                $item->v_enfermedades_respiratorias_R = $item->enfermedades_respiratorias_R == 0 ? "" : self::valRieResSa($item->enfermedades_respiratorias_R);
                $item->v_enfermedades_zoonoticas_R = $item->enfermedades_zoonoticas_R == 0 ? "" : self::valRieResSa($item->enfermedades_zoonoticas_R);
                $item->v_transtornos_degenartivos_R = $item->transtornos_degenartivos_R == 0 ? "" : self::valRieResSa($item->transtornos_degenartivos_R);
                $item->v_consumo_spa_R = $item->consumo_spa_R == 0 ? "" : self::valRieResSa($item->consumo_spa_R);

                $item->c_enfermedades_infecciosas_R = $item->v_enfermedades_infecciosas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_infecciosas_R);
                $item->c_transtornos_asociados_spa_R = $item->v_transtornos_asociados_spa_R == "" ? "" : self::colorRieResSa($item->v_transtornos_asociados_spa_R);
                $item->c_enfermedad_cardiovascular_R = $item->v_enfermedad_cardiovascular_R == "" ? "" : self::colorRieResSa($item->v_enfermedad_cardiovascular_R);
                $item->c_cancer_R = $item->v_cancer_R == "" ? "" : self::colorRieResSa($item->v_cancer_R);
                $item->c_alteraciones_transtornos_visuales_R = $item->v_alteraciones_transtornos_visuales_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_visuales_R);
                $item->c_alteraciones_transtornos_audicion_R = $item->v_alteraciones_transtornos_audicion_R == "" ? "" : self::colorRieResSa($item->v_alteraciones_transtornos_audicion_R);
                $item->c_salud_bucal_R = $item->v_salud_bucal_R == "" ? "" : self::colorRieResSa($item->v_salud_bucal_R);
                $item->c_problemas_salud_mental_R = $item->v_problemas_salud_mental_R == "" ? "" : self::colorRieResSa($item->v_problemas_salud_mental_R);
                $item->c_violencias_R = $item->v_violencias_R == "" ? "" : self::colorRieResSa($item->v_violencias_R);
                $item->c_enfermedades_respiratorias_R = $item->v_enfermedades_respiratorias_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_respiratorias_R);
                $item->c_enfermedades_zoonoticas_R = $item->v_enfermedades_zoonoticas_R == "" ? "" : self::colorRieResSa($item->v_enfermedades_zoonoticas_R);
                $item->c_transtornos_degenartivos_R = $item->v_transtornos_degenartivos_R == "" ? "" : self::colorRieResSa($item->v_transtornos_degenartivos_R);
                $item->c_consumo_spa_R = $item->v_consumo_spa_R == "" ? "" : self::colorRieResSa($item->v_consumo_spa_R);
            }
        }

        $respuesta = [
            'riesgos_salud_men1a' => $riesgos_salud_men1a,
            'riesgos_salud_de1a5' => $riesgos_salud_de1a5,
            'riesgos_salud_de6a11' => $riesgos_salud_de6a11,
            'riesgos_salud_de12a17' => $riesgos_salud_de12a17,
            'riesgos_salud_de18a28' => $riesgos_salud_de18a28,
            'riesgos_salud_de29a59' => $riesgos_salud_de29a59,
            'riesgos_salud_de60' => $riesgos_salud_de60
        ];
        return $respuesta;
    }

    public static function valRieResSa($valor)
    {
        $eficacia = "";
        if ($valor == 1 || $valor == 0) {
            $eficacia = "Inexistente";
        } else {
            if ($valor == 2) {
                $eficacia = "Bajo";
            } else {
                if ($valor == 3) {
                    $eficacia = "Moderado";
                } else {
                    $eficacia = "Alto";
                }
            }
        }
        return $eficacia;
    }

    public static function colorRieResSa($valor)
    {
        $color = "";
        if ($valor == "Bajo" || $valor == "Inexistente") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Moderado") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public static function valRieResSaludMejorado($valor, $opc)
    {
        $eficacia = "";
        if($opc == 1) {            
            if ($valor < 9) {
                $eficacia = "Bajo";
            } else {
                if ($valor >= 9 && $valor < 16) {
                    $eficacia = "Medio";
                } else {
                    $eficacia = "Alto";
                }
            }
        }else {
            if ($valor < 5) {
                $eficacia = "Bajo";
            } else {
                if ($valor >= 5 && $valor < 9) {
                    $eficacia = "Medio";
                } else {
                    $eficacia = "Alto";
                }
            }
        }
        
        return $eficacia;
    }
    
    public static function colorRieResSaludMejorado($valor)
    {
        $color = "";
        if ($valor == "Bajo" || $valor == "Inexistente") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Medio") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }
}
