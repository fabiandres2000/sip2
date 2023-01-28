<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class EnfermedadesIntegrantes extends Model
{
    protected $table = 'enfermedades_integrantes';
    protected $fillable = [
        'id_inte',
        'id_hogar',
        'id_enfermedad',
        'tipo',
        'tiempo',
        'tratamiento',
        'estado',
        'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.enfermedades_integrantes')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_inte' => $data['id_inte'],
            'id_hogar' => $data['id_hogar'],
            'id_enfermedad' => $data['id_enfermedad'],
            'tipo' => $data['tipo'],
            'tiempo' => $data['tiempo'],
            'tratamiento' => $data['tratamiento'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function buscar($alias, $id_inte)
    {
        $enfC = DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
            ->join($alias . '.enfermedadescro', 'enfermedadescro.id', 'enfermedades_integrantes.id_enfermedad')
            ->where('enfermedades_integrantes.id_inte', $id_inte)
            ->where('enfermedades_integrantes.tipo', 'Cronica')
            ->where('enfermedades_integrantes.estado', 'Activo')
            ->select("enfermedades_integrantes.*", "enfermedadescro.descripcion AS textoEnfermedad");

        $enfI = DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
            ->join($alias . '.enfermedadesinf', 'enfermedadesinf.id', 'enfermedades_integrantes.id_enfermedad')
            ->where('enfermedades_integrantes.id_inte', $id_inte)
            ->where('enfermedades_integrantes.tipo', 'Infecciosa')
            ->where('enfermedades_integrantes.estado', 'Activo')
            ->select("enfermedades_integrantes.*", "enfermedadesinf.descripcion AS textoEnfermedad");
        return $enfC->unionAll($enfI)->get();

    }

    public static function buscarEnfer($alias, $id, $opcion)
    {

        if ($opcion == "VIH") {
            return DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->where('enfermedades_integrantes.id_inte', $id)
                ->where('enfermedades_integrantes.id_enfermedad', 2)
                ->where('enfermedades_integrantes.tipo', 'Infecciosa')
                ->where('enfermedades_integrantes.estado', 'Activo')
                ->count();
        }
        if ($opcion == "HIPERTENSION") {
            return DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->where('enfermedades_integrantes.id_inte', $id)
                ->where('enfermedades_integrantes.id_enfermedad', 1)
                ->where('enfermedades_integrantes.tipo', 'Cronica')
                ->where('enfermedades_integrantes.estado', 'Activo')
                ->count();
        }
        if ($opcion == "DIABETES") {
            return DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->where('enfermedades_integrantes.id_inte', $id)
                ->where('enfermedades_integrantes.id_enfermedad', 1)
                ->where('enfermedades_integrantes.tipo', 'Cronica')
                ->where('enfermedades_integrantes.estado', 'Activo')
                ->count();
        }
        if ($opcion == "CONDUCTA") {
            return DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->where('enfermedades_integrantes.id_inte', $id)
                ->where('enfermedades_integrantes.id_enfermedad', 15)
                ->orWhere('enfermedades_integrantes.id_enfermedad', 8)
                ->where('enfermedades_integrantes.tipo', 'Cronica')
                ->where('enfermedades_integrantes.estado', 'Activo')
                ->count();
        }
        if ($opcion == "OIDOS") {
            return DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->where('enfermedades_integrantes.id_inte', $id)
                ->where('enfermedades_integrantes.id_enfermedad', 25)
                ->where('enfermedades_integrantes.tipo', 'Cronica')
                ->where('enfermedades_integrantes.estado', 'Activo')
                ->count();
        }        
    }

    public static function buscarInfecciosas($alias, $id_inte)
    {

        return DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
            ->join($alias . '.enfermedadesinf', 'enfermedadesinf.id', 'enfermedades_integrantes.id_enfermedad')
            ->where('enfermedades_integrantes.id_inte', $id_inte)
            ->where('enfermedades_integrantes.tipo', 'Infecciosa')
            ->where('enfermedades_integrantes.estado', 'Activo')
            ->select("enfermedades_integrantes.*", "enfermedadesinf.descripcion AS textoEnfermedad")
            ->get();

    }
}
