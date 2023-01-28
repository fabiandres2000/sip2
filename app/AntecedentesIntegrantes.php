<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class AntecedentesIntegrantes extends Model
{
    protected $table = 'antecedentes_integrantes';
    protected $fillable = [
        'id_inte',
        'id_hogar',
        'id_antecedente',
        'estado',
        'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.antecedentes_integrantes')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_inte' => $data['id_inte'],
            'id_hogar' => $data['id_hogar'],
            'id_antecedente' => $data['id_antecedente'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function buscar($alias, $id_inte)
    {
        $ant = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
            ->join($alias . '.antecedentes', 'antecedentes.id', 'antecedentes_integrantes.id_antecedente')
            ->where('antecedentes_integrantes.id_inte', $id_inte)
            ->where('antecedentes_integrantes.estado', 'Activo')
            ->select("antecedentes_integrantes.*", "antecedentes.descripcion AS textoAntecedente");

        return $ant->get();
    }

    public static function buscarAnte($alias, $id_hogar, $opcion)
    {
        if ($opcion == "CANCER") {
            $enf1 = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
                ->where('antecedentes_integrantes.id_hogar', $id_hogar)
                ->where('antecedentes_integrantes.id_antecedente', 9)
                ->where('antecedentes_integrantes.estado', 'Activo');
            $enf2 = DB::connection('mysql')->table($alias . '.antecedentes_jefes')
                ->where('antecedentes_jefes.id_hogar', $id_hogar)
                ->where('antecedentes_jefes.id_antecedente', 9)
                ->where('antecedentes_jefes.estado', 'Activo');
            return $enf2->unionAll($enf1)->count();
        }

        if ($opcion == "ALTERACIONES") {
            $enf1 = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
                ->where('antecedentes_integrantes.id_hogar', $id_hogar)
                ->where('antecedentes_integrantes.id_antecedente', 19)
                ->where('antecedentes_integrantes.estado', 'Activo');
            $enf2 = DB::connection('mysql')->table($alias . '.antecedentes_jefes')
                ->where('antecedentes_jefes.id_hogar', $id_hogar)
                ->where('antecedentes_jefes.id_antecedente', 19)
                ->where('antecedentes_jefes.estado', 'Activo');
            return $enf2->unionAll($enf1)->count();
        }

        if ($opcion == "ALTERACIONESAUD") {
            $enf1 = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
                ->where('antecedentes_integrantes.id_hogar', $id_hogar)
                ->where('antecedentes_integrantes.id_antecedente', 16)
                ->where('antecedentes_integrantes.estado', 'Activo');
            $enf2 = DB::connection('mysql')->table($alias . '.antecedentes_jefes')
                ->where('antecedentes_jefes.id_hogar', $id_hogar)
                ->where('antecedentes_jefes.id_antecedente', 16)
                ->where('antecedentes_jefes.estado', 'Activo');
            return $enf2->unionAll($enf1)->count();
        }

        if ($opcion == "SALUDMENTAL") {
            $enf1 = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
                ->where('antecedentes_integrantes.id_hogar', $id_hogar)
                ->where('antecedentes_integrantes.id_antecedente', 14)
                ->where('antecedentes_integrantes.estado', 'Activo');
            $enf2 = DB::connection('mysql')->table($alias . '.antecedentes_jefes')
                ->where('antecedentes_jefes.id_hogar', $id_hogar)
                ->where('antecedentes_jefes.id_antecedente', 14)
                ->where('antecedentes_jefes.estado', 'Activo');
            return $enf2->unionAll($enf1)->count();
        }
        if ($opcion == "TRANSTORNOS") {
            $enf1 = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
                ->where('antecedentes_integrantes.id_hogar', $id_hogar)
                ->where('antecedentes_integrantes.id_antecedente', 3)
                ->where('antecedentes_integrantes.id_antecedente', 18)
                ->where('antecedentes_integrantes.estado', 'Activo');
            $enf2 = DB::connection('mysql')->table($alias . '.antecedentes_jefes')
                ->where('antecedentes_jefes.id_hogar', $id_hogar)
                ->where('antecedentes_jefes.id_antecedente', 3)
                ->where('antecedentes_jefes.id_antecedente', 18)
                ->where('antecedentes_jefes.estado', 'Activo');
            return $enf2->unionAll($enf1)->count();
        }        
        
    }

    public static function buscarAntePorId($alias, $id_hogar, $opcion, $id)
    {
        if ($opcion == "ENFERRESPI") {
            $enf1 = DB::connection('mysql')->table($alias . '.antecedentes_integrantes')
                ->where('antecedentes_integrantes.id_hogar', $id_hogar)
                ->where('antecedentes_integrantes.id_inte', '!=', $id)
                ->where('antecedentes_integrantes.id_antecedente', 17)
                ->where('antecedentes_integrantes.estado', 'Activo');
            $enf2 = DB::connection('mysql')->table($alias . '.antecedentes_jefes')
                ->where('antecedentes_jefes.id_hogar', $id_hogar)
                ->where('antecedentes_jefes.id_jefe', '!=', $id)
                ->where('antecedentes_jefes.id_antecedente', 17)
                ->where('antecedentes_jefes.estado', 'Activo');
            return $enf2->unionAll($enf1)->count();
        }
    }
}
