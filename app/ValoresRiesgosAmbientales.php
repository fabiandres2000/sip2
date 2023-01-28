<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ValoresRiesgosAmbientales extends Model
{
    protected $table = 'valores_riesgos_ambientales';
    protected $fillable = [
        'id_hogar',
        'control_entes_RD',
        'obras_ingenieria_RD',
        'proteccion_RD',
        'zona_vivienda_RD',
        'cual_RD',
        'tipo_RD',

        'control_entes_RI',
        'gaviones_RI',
        'dragado_RI',
        'barreras_RI',
        'zona_vivienda_RI',
        'cual_RI',
        'tipo_RI',

        'sistema_recoleccion_RIN',
        'control_entes_RIN',
        'control_plagas_RIN',
        'limpieza_RIN',
        'tipo_tratamiento_RIN',
        'clasificacion_residuos_RIN',
        'cual_RIN',
        'tipo_RIN',

        'control_entes_RA',
        'humectacion_RA',
        'sistema_RA',
        'concientizacion_RA',
        'cual_RA',
        'tipo_RA',

        'control_entes_RRS',
        'concientizacion_RRS',
        'mantenimiento_RRS',
        'mantenimiento_solicitado_RRS',
        'fertilizantes_RRS',
        'clasificacion_RRS',
        'cual_RRS',
        'tipo_RRS',

        'control_entes_RQ',
        'concientizacion_RQ',
        'bomberos_RQ',
        'servicio_programado_RQ',
        'servicio_solicitud_RQ',
        'aprovechamiento_RQ',
        'cual_RQ',
        'tipo_RQ',

        'control_entes_RAU',
        'regulacion_RAU',
        'mediciones_RAU',
        'zona_RAU',
        'decibeles_RAU',
        'cual_RAU',
        'tipo_RAU',

        'control_entes_RRH',
        'concientizacion_RRH',
        'manejo_aguas_RRH',
        'programa_RRH',
        'control_industrias_RRH',
        'mantenimiento_RRH',
        'mantenimiento_captacion_RRH',
        'cual_RRH',
        'tipo_RRH',

        'control_entes_RAA',
        'tratamiento_RAA',
        'concientizacion_RAA',
        'sistema_RAA',
        'programa_RAA',
        'cual_RRA',
        'tipo_RRA',

        'estado',
        'id_compania',
    ];

    public static function guardarInicial($id_hogar, $alias)
    {

        return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->updateOrInsert([
            'id_hogar' => $id_hogar,
        ], [

            'control_entes_RD' => '',
            'obras_ingenieria_RD' => '',
            'proteccion_RD' => '',
            'zona_vivienda_RD' => '',
            'cual_RD' => '',
            'tipo_RD' => '',

            'control_entes_RI' => '',
            'gaviones_RI' => '',
            'dragado_RI' => '',
            'barreras_RI' => '',
            'zona_vivienda_RI' => '',
            'cual_RI' => '',
            'tipo_RI' => '',

            'sistema_recoleccion_RIN' => '',
            'control_entes_RIN' => '',
            'control_plagas_RIN' => '',
            'limpieza_RIN' => '',
            'tipo_tratamiento_RIN' => '',
            'clasificacion_residuos_RIN' => '',
            'cual_RIN' => '',
            'tipo_RIN' => '',

            'control_entes_RA' => '',
            'humectacion_RA' => '',
            'sistema_RA' => '',
            'concientizacion_RA' => '',
            'cual_RA' => '',
            'tipo_RA' => '',

            'control_entes_RRS' => '',
            'concientizacion_RRS' => '',
            'mantenimiento_RRS' => '',
            'mantenimiento_solicitado_RRS' => '',
            'fertilizantes_RRS' => '',
            'clasificacion_RRS' => '',
            'cual_RRS' => '',
            'tipo_RRS' => '',

            'control_entes_RQ' => '',
            'concientizacion_RQ' => '',
            'bomberos_RQ' => '',
            'servicio_programado_RQ' => '',
            'servicio_solicitud_RQ' => '',
            'aprovechamiento_RQ' => '',
            'cual_RQ' => '',
            'tipo_RQ' => '',

            'control_entes_RAU' => '',
            'regulacion_RAU' => '',
            'mediciones_RAU' => '',
            'zona_RAU' => '',
            'decibeles_RAU' => '',
            'cual_RAU' => '',
            'tipo_RAU' => '',

            'control_entes_RRH' => '',
            'concientizacion_RRH' => '',
            'manejo_aguas_RRH' => '',
            'programa_RRH' => '',
            'control_industrias_RRH' => '',
            'mantenimiento_RRH' => '',
            'mantenimiento_captacion_RRH' => '',
            'cual_RRH' => '',
            'tipo_RRH' => '',

            'control_entes_RAA' => '',
            'tratamiento_RAA' => '',
            'concientizacion_RAA' => '',
            'sistema_RAA' => '',
            'programa_RAA' => '',
            'cual_RRA' => '',
            'tipo_RRA' => '',

            'id_compania' => 1,
            'estado' => 'Activo',
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')
            ->where('valores_riesgos_ambientales.id_hogar', $id_hogar)
            ->where('valores_riesgos_ambientales.estado', 'Activo')
            ->first();
    }

    public static function modificar($alias, $id_hogar, $opcion, $data)
    {
        if ($opcion == "RD") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RD' => $data["control_entes_RD"],
                'obras_ingenieria_RD' => $data["obras_ingenieria_RD"],
                'proteccion_RD' => $data["proteccion_RD"],
                'zona_vivienda_RD' => $data["zona_vivienda_RD"],
                'cual_RD' => $data["cual_RD"],
                'tipo_RD' => $data["tipo_RD"],
            ]);
        }

        if ($opcion == "RI") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RI' => $data["control_entes_RI"],
                'gaviones_RI' => $data["gaviones_RI"],
                'dragado_RI' => $data["dragado_RI"],
                'barreras_RI' => $data["barreras_RI"],
                'zona_vivienda_RI' => $data["zona_vivienda_RI"],
                'cual_RI' => $data["cual_RI"],
                'tipo_RI' => $data["tipo_RI"],
            ]);
        }

        if ($opcion == "RIN") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'sistema_recoleccion_RIN' => $data["sistema_recoleccion_RIN"],
                'control_entes_RIN' => $data["control_entes_RIN"],
                'control_plagas_RIN' => $data["control_plagas_RIN"],
                'limpieza_RIN' => $data["limpieza_RIN"],
                'tipo_tratamiento_RIN' => $data["tipo_tratamiento_RIN"],
                'clasificacion_residuos_RIN' => $data["clasificacion_residuos_RIN"],
                'cual_RIN' => $data["cual_RIN"],
                'tipo_RIN' => $data["tipo_RIN"],
            ]);
        }

        if ($opcion == "RA") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RA' => $data["control_entes_RA"],
                'humectacion_RA' => $data["humectacion_RA"],
                'sistema_RA' => $data["sistema_RA"],
                'concientizacion_RA' => $data["concientizacion_RA"],
                'cual_RA' => $data["cual_RA"],
                'tipo_RA' => $data["tipo_RA"],
            ]);
        }

        if ($opcion == "RRS") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RRS' => $data["control_entes_RRS"],
                'concientizacion_RRS' => $data["concientizacion_RRS"],
                'mantenimiento_RRS' => $data["mantenimiento_RRS"],
                'mantenimiento_solicitado_RRS' => $data["mantenimiento_solicitado_RRS"],
                'fertilizantes_RRS' => $data["fertilizantes_RRS"],
                'clasificacion_RRS' => $data["clasificacion_RRS"],
                'cual_RRS' => $data["cual_RRS"],
                'tipo_RRS' => $data["tipo_RRS"],
            ]);
        }

        if ($opcion == "RQ") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RQ' => $data["control_entes_RQ"],
                'concientizacion_RQ' => $data["concientizacion_RQ"],
                'bomberos_RQ' => $data["bomberos_RQ"],
                'servicio_programado_RQ' => $data["servicio_programado_RQ"],
                'servicio_solicitud_RQ' => $data["servicio_solicitud_RQ"],
                'aprovechamiento_RQ' => $data["aprovechamiento_RQ"],
                'cual_RQ' => $data["cual_RQ"],
                'tipo_RQ' => $data["tipo_RQ"],
            ]);
        }

        if ($opcion == "RAU") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RAU' => $data["control_entes_RAU"],
                'regulacion_RAU' => $data["regulacion_RAU"],
                'mediciones_RAU' => $data["mediciones_RAU"],
                'zona_RAU' => $data["zona_RAU"],
                'decibeles_RAU' => $data["decibeles_RAU"],
                'cual_RAU' => $data["cual_RAU"],
                'tipo_RAU' => $data["tipo_RAU"],
            ]);
        }

        if ($opcion == "RRH") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RRH' => $data["control_entes_RRH"],
                'concientizacion_RRH' => $data["concientizacion_RRH"],
                'manejo_aguas_RRH' => $data["manejo_aguas_RRH"],
                'programa_RRH' => $data["programa_RRH"],
                'control_industrias_RRH' => $data["control_industrias_RRH"],
                'mantenimiento_RRH' => $data["mantenimiento_RRH"],
                'mantenimiento_captacion_RRH' => $data["mantenimiento_captacion_RRH"],
                'cual_RRH' => $data["cual_RRH"],
                'tipo_RRH' => $data["tipo_RRH"],
            ]);
        }

        if ($opcion == "RAA") {
            return DB::connection('mysql')->table($alias . '.valores_riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_entes_RAA' => $data["control_entes_RAA"],
                'tratamiento_RAA' => $data["tratamiento_RAA"],
                'concientizacion_RAA' => $data["concientizacion_RAA"],
                'sistema_RAA' => $data["sistema_RAA"],
                'programa_RAA' => $data["programa_RAA"],
                'cual_RRA' => $data["cual_RRA"],
                'tipo_RRA' => $data["tipo_RRA"],
            ]);
        }
    }
}
