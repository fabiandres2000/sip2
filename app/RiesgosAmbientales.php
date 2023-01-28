<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgosAmbientales extends Model
{
    protected $table = 'riesgos_ambientales';
    protected $fillable = [
        'id_hogar', 'riesgos_derrumbes', 'riesgos_inundacion', 'riesgos_insalubridad', 'riesgos_atmosferico',
        'riesgos_recurso_suelo', 'riesgos_quema', 'riesgos_auditivo', 'riesgos_recurso_hidrico', 'riesgos_acceso_agua',
        'estado', 'id_compania', 'control_riesgos_derrumbes', 'control_riesgos_inundacion', 'control_riesgos_insalubridad',
        'control_riesgos_atmosferico', 'control_riesgos_recurso_suelo', 'control_riesgos_quema', 'control_riesgos_auditivo',
        'control_riesgos_recurso_hidrico', 'control_riesgos_acceso_agua',
    ];

    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->updateOrInsert([
            'id_hogar' => $data['id_hogar'],
        ], [
            'riesgos_derrumbes' => $data['riesgos_derrumbes'],
            'riesgos_inundacion' => $data['riesgos_inundacion'],
            'riesgos_insalubridad' => $data['riesgos_insalubridad'],
            'riesgos_atmosferico' => $data['riesgos_atmosferico'],
            'riesgos_recurso_suelo' => $data['riesgos_recurso_suelo'],
            'riesgos_quema' => $data['riesgos_quema'],
            'riesgos_auditivo' => $data['riesgos_auditivo'],
            'riesgos_recurso_hidrico' => $data['riesgos_recurso_hidrico'],

            'riesgos_acceso_agua' => $data['riesgos_acceso_agua'],
            'id_compania' => 1,
            'estado' => $data['estado'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.riesgos_ambientales')
            ->where('riesgos_ambientales.id_hogar', $id_hogar)
            ->where('riesgos_ambientales.estado', 'Activo')
            ->first();
    }

    public static function modificar($alias, $id_hogar, $opcion, $data)
    {
        // Riesgos de  Derrumbes
        if ($opcion == "control_riesgos_derrumbes") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_derrumbes' => $data,
            ]);
        }
        // Riesgos de  Derrumbes

        // Riesgos de inundación
        if ($opcion == "control_riesgos_inundacion") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_inundacion' => $data,
            ]);
        }
        // Riesgos de inundación        
        
        // Riesgos de insalubridad
        if ($opcion == "control_riesgos_insalubridad") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_insalubridad' => $data,
            ]);
        }
        // Riesgos de insalubridad
        
        // Riesgo atmosferico
        if ($opcion == "control_riesgos_atmosferico") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_atmosferico' => $data,
            ]);
        }
        // Riesgo atmosferico

        // Riesgos Recurso suelo
        if ($opcion == "control_riesgos_recurso_suelo") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_recurso_suelo' => $data,
            ]);
        }
        // Riesgos Recurso suelo       

        // Riesgo por quemas o incendio
        if ($opcion == "control_riesgos_quema") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_quema' => $data,
            ]);
        }
        // Riesgo por quemas o incendio

        // Riesgo Auditivo
        if ($opcion == "control_riesgos_auditivo") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_auditivo' => $data,
            ]);
        }
        // Riesgo Auditivo
        
        // Riesgo recurso Hidrico
        if ($opcion == "control_riesgos_recurso_hidrico") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_recurso_hidrico' => $data,
            ]);
        }
        // Riesgo recurso Hidrico

        // Acceso a Agua Segura        
        if ($opcion == "control_riesgos_acceso_agua") {
            return DB::connection('mysql')->table($alias . '.riesgos_ambientales')->where('id_hogar', $id_hogar)->update([
                'control_riesgos_acceso_agua' => $data,
            ]);
        }
        // Acceso a Agua Segura
    }
}
