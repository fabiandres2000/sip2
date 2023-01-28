<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Encro extends Model
{
    protected $table = 'encro';
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

        return DB::connection('mysql')->table($alias . '.encro')->updateOrInsert([
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
        return DB::connection('mysql')->table($alias . '.encro')
            ->where('encro.id_hogar', $id_hogar)
            ->where('encro.estado', 'Activo')
            ->select("encro.*")
            ->selectRaw("CASE "
                . " WHEN encro.snom IS NULL THEN '' "
                . " WHEN encro.snom = '' THEN '' "
                . " ELSE encro.snom "
                . " END snom"
                . " ")
            ->selectRaw("CASE "
                . " WHEN encro.sape IS NULL THEN '' "
                . " WHEN encro.sape = '' THEN '' "
                . " ELSE encro.sape "
                . " END sape"
                . " ")            
            ->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.encro')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }    
}
