<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Eninf extends Model
{
    protected $table = 'eninf';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'enfermedad', 'tiempo', 'tratamiento', 'complicaciones', 'estado', 'id_compania', 'opci',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        if ($data['opci'] == "JEFE") {
            // BUSCAR ID JEFE
            $integrante = \App\Caracterizacion::buscar($data['identificacion'], $alias);
            // BUSCAR ID JEFE
        } else {
            // BUSCAR ID INTEGRANTE
            $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
            // BUSCAR ID INTEGRANTE
        }
        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.eninf')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_integrante' => $integrante->id,
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $integrante->identificacion,
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'sexo' => $data['sexo'],
            'enfermedad' => $data['enfermedad'],
            'tiempo' => $data['tiempo'],
            'tratamiento' => $data['tratamiento'],
            'complicaciones' => $data['complicaciones'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.eninf')
            ->where('eninf.id_hogar', $id_hogar)
            ->where('eninf.estado', 'Activo')
            ->select("eninf.*")
            ->selectRaw("CASE "
                . " WHEN eninf.snom IS NULL THEN '' "
                . " WHEN eninf.snom = '' THEN '' "
                . " ELSE eninf.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN eninf.sape IS NULL THEN '' "
                . " WHEN eninf.sape = '' THEN '' "
                . " ELSE eninf.sape "
                . " END sape"
                . " ")
            ->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.eninf')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }
}
