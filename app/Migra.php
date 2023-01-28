<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Migra extends Model
{
    protected $table = 'migra';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'pais', 'registrado', 'cuantollego', 'estado', 'id_compania',
        'futuro', 'recibido', 'necesidad', 'dependen', 'ingreso', 'opci',
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

        return DB::connection('mysql')->table($alias . '.migra')->updateOrInsert([
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
            'edad' => $data['edad'],
            'pais' => $data['pais'],
            'registrado' => $data['registrado'],
            'cuantollego' => $data['cuantollego'],
            'futuro' => $data['futuro'],
            'recibido' => $data['recibido'],
            'necesidad' => $data['necesidad'],
            'dependen' => $data['dependen'],
            'ingreso' => $data['ingreso'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        $migra1 = DB::connection('mysql')->table($alias . '.migra')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'migra.id_integrante')
            ->where('migra.id_hogar', $id_hogar)
            ->where('migra.estado', 'Activo')
            ->where('migra.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
            )
            ->selectRaw("IFNULL(migra.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("IFNULL(migra.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(migra.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(migra.id,0) AS id")
            ->selectRaw("IFNULL(migra.pais,'') AS pais")
            ->selectRaw("IFNULL(migra.registrado,'') AS registrado")
            ->selectRaw("IFNULL(migra.cuantollego,'') AS cuantollego")
            ->selectRaw("IFNULL(migra.futuro,'') AS futuro")
            ->selectRaw("IFNULL(migra.recibido,'') AS recibido")
            ->selectRaw("IFNULL(migra.necesidad,'') AS necesidad")
            ->selectRaw("IFNULL(migra.dependen,'') AS dependen")
            ->selectRaw("IFNULL(migra.ingreso,'') AS ingreso")
            ->selectRaw("IFNULL(migra.opci,'JEFE') AS opci");

        $migra2 = DB::connection('mysql')->table($alias . '.migra')
            ->join($alias . '.integrantes', 'integrantes.id', 'migra.id_integrante')
            ->where('migra.id_hogar', $id_hogar)
            ->where('migra.estado', 'Activo')
            ->where('migra.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
            )
            ->selectRaw("IFNULL(migra.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("IFNULL(migra.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(migra.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(migra.id,0) AS id")
            ->selectRaw("IFNULL(migra.pais,'') AS pais")
            ->selectRaw("IFNULL(migra.registrado,'') AS registrado")
            ->selectRaw("IFNULL(migra.cuantollego,'') AS cuantollego")
            ->selectRaw("IFNULL(migra.futuro,'') AS futuro")
            ->selectRaw("IFNULL(migra.recibido,'') AS recibido")
            ->selectRaw("IFNULL(migra.necesidad,'') AS necesidad")
            ->selectRaw("IFNULL(migra.dependen,'') AS dependen")
            ->selectRaw("IFNULL(migra.ingreso,'') AS ingreso")
            ->selectRaw("IFNULL(migra.opci,'INTE') AS opci");

        return $migra1->unionAll($migra2)->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.migra')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }
}
