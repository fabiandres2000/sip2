<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ValoresRiesgosSaludDE12A17 extends Model
{
    protected $table = 'valores_riesgos_salud_de12a17';
    protected $fillable = [
        'id_hogar',

        'alimentacion_saludable_EnIn',
        'asistencia_crecimiento_EnIn',
        'fumigacion_EnIn',
        'sistema_recoleccion_EnIn',
        'desparacitacion_EnIn',
        'inmunizacion_EnIn',
        'educacion_EnIn',
        'mantenimiento_EnIn',
        'citas_EnIn',

        'educacion_TrAsSPA',
        'acompaniamiento_TrAsSPA',

        'asistencia_crecimiento_EnCaAt',
        'educacion_EnCaAt',
        'actividad_EnCaAt',

        'asistencia_crecimiento_Ca',
        'educacion_Ca',
        'valoracion_Ca',

        'asistencia_crecimiento_AlTrVi',
        'valoracion_AlTrVi',

        'asistencia_crecimiento_AlTrAuCo',
        'valoracion_AlTrAuCo',

        'control_odontologia_SaBu',
        'aplicacion_fluor_SaBu',
        'educacion_SaBu',
        'habitos_higiene_SaBu',

        'concientizacion_PrSaMe',
        'acompaniamiento_PrSaMe',
        'crecimiento_PrSaMe',
        'grupos_PrSaMe',

        'acompaniamiento_Vi',
        'grupos_Vi',
        'concientizacion_Vi',
        'crecimiento_Vi',
        'icbf_Vi',

        'crecimiento_EnReCr',
        'educacion_EnReCr',
        'valoracion_EnReCr',

        'crecimiento_EnZo',
        'potabilizacion_EnZo',
        'mantenimiento_EnZo',
        'fumigacion_EnZo',
        'vacunacion_EnZo',
        'inmunizacion_EnZo',
        'valorizacion_EnZo',
        'desparatizacion_EnZo',

        'crecimiento_TrDeNeEnAu',
        'acceso_TrDeNeEnAu',
        'valoracion_TrDeNeEnAu',

        'atencion_CoSp',
        'relaciones_CoSp',
        'grupos_CoSp',
        'educacion_CoSp',
        'valoracion_CoSp',

        'asistencia_RiTaBa',
        'programas_RiTaBa',
        'suplementacion_RiTaBa',

        'asistencia_RiDel',
        'programas_RiDel',
        'suplementacion_RiDel',

        'id_inte',
        'estado',
        'id_compania',
        'opci'
    ];

    public static function guardarInicial($id_hogar, $alias, $id_inte, $opci)
    {
        $hay = DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')
        ->where('valores_riesgos_salud_de12a17.id_inte', $id_inte)
        ->where('valores_riesgos_salud_de12a17.opci', $opci)
        ->where('valores_riesgos_salud_de12a17.estado', 'Activo')
        ->count();

        if($hay == 0){
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->Insert([
                'id_hogar' => $id_hogar,

                'alimentacion_saludable_EnIn' => '',
                'asistencia_crecimiento_EnIn' => '',
                'fumigacion_EnIn' => '',
                'sistema_recoleccion_EnIn' => '',
                'desparacitacion_EnIn' => '',
                'inmunizacion_EnIn' => '',
                'educacion_EnIn' => '',
                'mantenimiento_EnIn' => '',
                'citas_EnIn' => '',

                'educacion_TrAsSPA' => '',
                'acompaniamiento_TrAsSPA' => '',

                'asistencia_crecimiento_EnCaAt' => '',
                'educacion_EnCaAt' => '',
                'actividad_EnCaAt' => '',

                'asistencia_crecimiento_Ca' => '',
                'educacion_Ca' => '',
                'valoracion_Ca' => '',

                'asistencia_crecimiento_AlTrVi' => '',
                'valoracion_AlTrVi' => '',

                'asistencia_crecimiento_AlTrAuCo' => '',
                'valoracion_AlTrAuCo' => '',

                'control_odontologia_SaBu' => '',
                'aplicacion_fluor_SaBu' => '',
                'educacion_SaBu' => '',
                'habitos_higiene_SaBu' => '',

                'concientizacion_PrSaMe' => '',
                'acompaniamiento_PrSaMe' => '',
                'crecimiento_PrSaMe' => '',
                'grupos_PrSaMe' => '',

                'acompaniamiento_Vi' => '',
                'grupos_Vi' => '',
                'concientizacion_Vi' => '',
                'crecimiento_Vi' => '',
                'icbf_Vi' => '',

                'crecimiento_EnReCr' => '',
                'educacion_EnReCr' => '',
                'valoracion_EnReCr' => '',

                'crecimiento_EnZo' => '',
                'potabilizacion_EnZo' => '',
                'mantenimiento_EnZo' => '',
                'fumigacion_EnZo' => '',
                'vacunacion_EnZo' => '',
                'inmunizacion_EnZo' => '',
                'valorizacion_EnZo' => '',
                'desparatizacion_EnZo' => '',

                'crecimiento_TrDeNeEnAu' => '',
                'acceso_TrDeNeEnAu' => '',
                'valoracion_TrDeNeEnAu' => '',

                'atencion_CoSp' => '',
                'relaciones_CoSp' => '',
                'grupos_CoSp' => '',
                'educacion_CoSp' => '',
                'valoracion_CoSp' => '',

                'asistencia_RiTaBa' => '',
                'programas_RiTaBa' => '',
                'suplementacion_RiTaBa' => '',

                'asistencia_RiDel' => '',
                'programas_RiDel'=> '',
                'suplementacion_RiDel' => '',


                'id_compania' => 1,
                'estado' => 'Activo',
                'id_inte'  => $id_inte,
                'opci'  => $opci,
            ]);
        }else{
            return null;
        }
    }

    public static function modificar($alias, $id_hogar, $opcion, $data, $id_inte, $opci_crs)
    {
        if ($opcion == "EnIn") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'alimentacion_saludable_EnIn' => $data["alimentacion_saludable_EnIn"],
                'asistencia_crecimiento_EnIn' => $data["asistencia_crecimiento_EnIn"],
                'fumigacion_EnIn' => $data["fumigacion_EnIn"],
                'sistema_recoleccion_EnIn' => $data["sistema_recoleccion_EnIn"],
                'desparacitacion_EnIn' => $data["desparacitacion_EnIn"],
                'inmunizacion_EnIn' => $data["inmunizacion_EnIn"],
                'educacion_EnIn' => $data["educacion_EnIn"],
                'mantenimiento_EnIn' => $data["mantenimiento_EnIn"],
                'citas_EnIn' => $data["citas_EnIn"],
            ]);
        }

        if ($opcion == "TrAsSPA") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'educacion_TrAsSPA' => $data["educacion_TrAsSPA"],
                'acompaniamiento_TrAsSPA' => $data["acompaniamiento_TrAsSPA"],
            ]);
        }

        if ($opcion == "EnCaAt") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'asistencia_crecimiento_EnCaAt' => $data["asistencia_crecimiento_EnCaAt"],
                'educacion_EnCaAt' => $data["educacion_EnCaAt"],
                'actividad_EnCaAt' => $data["actividad_EnCaAt"],
            ]);
        }

        if ($opcion == "Ca") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'asistencia_crecimiento_Ca' => $data["asistencia_crecimiento_Ca"],
                'educacion_Ca' => $data["educacion_Ca"],
                'valoracion_Ca' => $data["valoracion_Ca"],
            ]);
        }

        if ($opcion == "AlTrVi") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'asistencia_crecimiento_AlTrVi' => $data["asistencia_crecimiento_AlTrVi"],
                'valoracion_AlTrVi' => $data["valoracion_AlTrVi"],
            ]);
        }

        if ($opcion == "AlTrAuCo") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'asistencia_crecimiento_AlTrAuCo' => $data["asistencia_crecimiento_AlTrAuCo"],
                'valoracion_AlTrAuCo' => $data["valoracion_AlTrAuCo"],
            ]);
        }

        if ($opcion == "SaBu") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'control_odontologia_SaBu' => $data["control_odontologia_SaBu"],
                'aplicacion_fluor_SaBu' => $data["aplicacion_fluor_SaBu"],
                'educacion_SaBu' => $data["educacion_SaBu"],
                'habitos_higiene_SaBu' => $data["habitos_higiene_SaBu"],
            ]);
        }

        if ($opcion == "PrSaMe") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'concientizacion_PrSaMe' => $data["concientizacion_PrSaMe"],
                'acompaniamiento_PrSaMe' => $data["acompaniamiento_PrSaMe"],
                'crecimiento_PrSaMe' => $data["crecimiento_PrSaMe"],
                'grupos_PrSaMe' => $data["grupos_PrSaMe"],
            ]);
        }

        if ($opcion == "Vi") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'acompaniamiento_Vi' => $data["acompaniamiento_Vi"],
                'grupos_Vi' => $data["grupos_Vi"],
                'concientizacion_Vi' => $data["concientizacion_Vi"],
                'crecimiento_Vi' => $data["crecimiento_Vi"],
                'icbf_Vi' => $data["icbf_Vi"],
            ]);
        }

        if ($opcion == "EnReCr") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'crecimiento_EnReCr' => $data["crecimiento_EnReCr"],
                'educacion_EnReCr' => $data["educacion_EnReCr"],
                'valoracion_EnReCr' => $data["valoracion_EnReCr"],
            ]);
        }

        if ($opcion == "EnZo") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'crecimiento_EnZo' => $data["crecimiento_EnZo"],
                'potabilizacion_EnZo' => $data["potabilizacion_EnZo"],
                'mantenimiento_EnZo' => $data["mantenimiento_EnZo"],
                'fumigacion_EnZo' => $data["fumigacion_EnZo"],
                'vacunacion_EnZo' => $data["vacunacion_EnZo"],
                'inmunizacion_EnZo' => $data["inmunizacion_EnZo"],
                'valorizacion_EnZo' => $data["valorizacion_EnZo"],
                'desparatizacion_EnZo' => $data["desparatizacion_EnZo"],
            ]);
        }

        if ($opcion == "TrDeNeEnAu") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'crecimiento_TrDeNeEnAu' => $data["crecimiento_TrDeNeEnAu"],
                'acceso_TrDeNeEnAu' => $data["acceso_TrDeNeEnAu"],
                'valoracion_TrDeNeEnAu' => $data["valoracion_TrDeNeEnAu"],
            ]);
        }

        if ($opcion == "CoSp") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'atencion_CoSp' => $data["atencion_CoSp"],
                'relaciones_CoSp' => $data["relaciones_CoSp"],
                'grupos_CoSp' => $data["grupos_CoSp"],
                'educacion_CoSp' => $data["educacion_CoSp"],
                'valoracion_CoSp' => $data["valoracion_CoSp"],
            ]);
        }

        if ($opcion == "RiDel") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'asistencia_RiDel' => $data["asistencia_RiDel"],
                'programas_RiDel' => $data["programas_RiDel"],
                'suplementacion_RiDel' => $data["suplementacion_RiDel"],
            ]);
        }

        if ($opcion == "RiTaBa") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')->where('id_inte', $id_inte)->where('opci', $opci_crs)->update([
                'asistencia_RiTaBa' => $data["asistencia_RiTaBa"],
                'programas_RiTaBa' => $data["programas_RiTaBa"],
                'suplementacion_RiTaBa' => $data["suplementacion_RiTaBa"],
            ]);
        }
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.valores_riesgos_salud_de12a17')
        ->where('valores_riesgos_salud_de12a17.id_hogar', $id_hogar)
        ->where('valores_riesgos_salud_de12a17.estado', 'Activo')
        ->get();
    }

    public static function buscarXID($alias, $IDHOGAR)
    {
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

        return $riesgos_salud_de12a17;
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
}
