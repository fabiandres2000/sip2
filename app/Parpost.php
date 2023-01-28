<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Parpost extends Model
{
    protected $table = 'parpost';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'aceptacion', 'control_prenatal', 'atencion_parto', 'carnet',
        'fecha_ultima', 'fecha_probable', 'peso', 'talla', 'imc', 'semanas_ges',
        'num_controles', 'vih', 'toxoplasma', 'vdrl', 'odontologia', 'vacunaciontdit',
        'fecha_ultimo_parto', 'suplementacion', 'enfermedades_cronicas', 'sedentarismo', 'fuma',
        'consumo', 'bebidas', 'tipo_parto', 'atencion_institucional', 'cc18', 'morgestacion',
        'morparto', 'morposparto', 'estado', 'id_compania', 'opci',
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

        return DB::connection('mysql')->table($alias . '.parpost')->updateOrInsert([
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
            'aceptacion' => $data['aceptacion'],
            'control_prenatal' => $data['control_prenatal'],
            'atencion_parto' => $data['atencion_parto'],
            'carnet' => $data['carnet'],
            'fecha_ultima' => $data['fecha_ultima'],
            'fecha_probable' => $data['fecha_probable'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'semanas_ges' => $data['semanas_ges'],
            'num_controles' => $data['num_controles'],
            'vih' => $data['vih'],
            'toxoplasma' => $data['toxoplasma'],
            'vdrl' => $data['vdrl'],
            'odontologia' => $data['odontologia'],
            'vacunaciontdit' => $data['vacunaciontdit'],
            'fecha_ultimo_parto' => $data['fecha_ultimo_parto'],
            'suplementacion' => $data['suplementacion'],
            'enfermedades_cronicas' => $data['enfermedades_cronicas'],
            'sedentarismo' => $data['sedentarismo'],
            'fuma' => $data['fuma'],
            'consumo' => $data['consumo'],
            'bebidas' => $data['bebidas'],
            'tipo_parto' => $data['tipo_parto'],
            'atencion_institucional' => $data['atencion_institucional'],
            'cc18' => $data['cc18'],
            'morgestacion' => $data['morgestacion'],
            'morparto' => $data['morparto'],
            'morposparto' => $data['morposparto'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        $parpost1 = DB::connection('mysql')->table($alias . '.parpost')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'parpost.id_integrante')
            ->where('parpost.id_hogar', $id_hogar)
            ->where('parpost.estado', 'Activo')
            ->where('parpost.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(parpost.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(parpost.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(parpost.id,0) AS id")
            ->selectRaw("IFNULL(parpost.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(parpost.imc,(caracterizacion.peso/(caracterizacion.talla*caracterizacion.talla))) AS imc")
            ->selectRaw("IFNULL(parpost.aceptacion,'') AS aceptacion")
            ->selectRaw("IFNULL(parpost.control_prenatal,'') AS control_prenatal")
            ->selectRaw("IFNULL(parpost.atencion_parto,'') AS atencion_parto")
            ->selectRaw("IFNULL(parpost.carnet,'') AS carnet")
            ->selectRaw("IFNULL(parpost.fecha_ultima,'') AS fecha_ultima")
            ->selectRaw("IFNULL(parpost.fecha_probable,'') AS fecha_probable")
            ->selectRaw("IFNULL(parpost.semanas_ges,'') AS semanas_ges")
            ->selectRaw("IFNULL(parpost.num_controles,'') AS num_controles")
            ->selectRaw("IFNULL(parpost.vih,'') AS vih")
            ->selectRaw("IFNULL(parpost.toxoplasma,'') AS toxoplasma")
            ->selectRaw("IFNULL(parpost.vdrl,'') AS vdrl")
            ->selectRaw("IFNULL(parpost.odontologia,'') AS odontologia")
            ->selectRaw("IFNULL(parpost.vacunaciontdit,'') AS vacunaciontdit")
            ->selectRaw("IFNULL(parpost.fecha_ultimo_parto,'') AS fecha_ultimo_parto")
            ->selectRaw("IFNULL(parpost.suplementacion,'') AS suplementacion")
            ->selectRaw("IFNULL(parpost.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(parpost.sedentarismo,'') AS sedentarismo")
            ->selectRaw("IFNULL(parpost.fuma,'') AS fuma")
            ->selectRaw("IFNULL(parpost.consumo,'') AS consumo")
            ->selectRaw("IFNULL(parpost.bebidas,'') AS bebidas")
            ->selectRaw("IFNULL(parpost.tipo_parto,'') AS tipo_parto")
            ->selectRaw("IFNULL(parpost.atencion_institucional,'') AS atencion_institucional")
            ->selectRaw("IFNULL(parpost.cc18,'') AS cc18")
            ->selectRaw("IFNULL(parpost.morgestacion,'') AS morgestacion")
            ->selectRaw("IFNULL(parpost.morparto,'') AS morparto")
            ->selectRaw("IFNULL(parpost.morposparto,'') AS morposparto")
            ->selectRaw("IFNULL(parpost.opci,'JEFE') AS opci");

        $parpost2 = DB::connection('mysql')->table($alias . '.parpost')
            ->join($alias . '.integrantes', 'integrantes.id', 'parpost.id_integrante')
            ->where('parpost.id_hogar', $id_hogar)
            ->where('parpost.estado', 'Activo')
            ->where('parpost.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(parpost.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(parpost.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(parpost.id,0) AS id")
            ->selectRaw("IFNULL(parpost.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(parpost.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(parpost.aceptacion,'') AS aceptacion")
            ->selectRaw("IFNULL(parpost.control_prenatal,'') AS control_prenatal")
            ->selectRaw("IFNULL(parpost.atencion_parto,'') AS atencion_parto")
            ->selectRaw("IFNULL(parpost.carnet,'') AS carnet")
            ->selectRaw("IFNULL(parpost.fecha_ultima,'') AS fecha_ultima")
            ->selectRaw("IFNULL(parpost.fecha_probable,'') AS fecha_probable")
            ->selectRaw("IFNULL(parpost.semanas_ges,'') AS semanas_ges")
            ->selectRaw("IFNULL(parpost.num_controles,'') AS num_controles")
            ->selectRaw("IFNULL(parpost.vih,'') AS vih")
            ->selectRaw("IFNULL(parpost.toxoplasma,'') AS toxoplasma")
            ->selectRaw("IFNULL(parpost.vdrl,'') AS vdrl")
            ->selectRaw("IFNULL(parpost.odontologia,'') AS odontologia")
            ->selectRaw("IFNULL(parpost.vacunaciontdit,'') AS vacunaciontdit")
            ->selectRaw("IFNULL(parpost.fecha_ultimo_parto,'') AS fecha_ultimo_parto")
            ->selectRaw("IFNULL(parpost.suplementacion,'') AS suplementacion")
            ->selectRaw("IFNULL(parpost.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(parpost.sedentarismo,'') AS sedentarismo")
            ->selectRaw("IFNULL(parpost.fuma,'') AS fuma")
            ->selectRaw("IFNULL(parpost.consumo,'') AS consumo")
            ->selectRaw("IFNULL(parpost.bebidas,'') AS bebidas")
            ->selectRaw("IFNULL(parpost.tipo_parto,'') AS tipo_parto")
            ->selectRaw("IFNULL(parpost.atencion_institucional,'') AS atencion_institucional")
            ->selectRaw("IFNULL(parpost.cc18,'') AS cc18")
            ->selectRaw("IFNULL(parpost.morgestacion,'') AS morgestacion")
            ->selectRaw("IFNULL(parpost.morparto,'') AS morparto")
            ->selectRaw("IFNULL(parpost.morposparto,'') AS morposparto")
            ->selectRaw("IFNULL(parpost.opci,'INTE') AS opci");

        return $parpost1->unionAll($parpost2)->get();
    }

    public static function editarestado($estado, $identificacion, $tabla, $alias)
    {

        // BUSCAR ID
        if ($tabla == "JEFE") {
            // BUSCAR ID JEFE
            $respuesta = \App\Caracterizacion::buscar($identificacion, $alias);
            // BUSCAR ID JEFE
        } else {
            // BUSCAR ID INTEGRANTE
            $respuesta = \App\Integrante::buscar($identificacion, $alias);
            // BUSCAR ID INTEGRANTE
        }
        // BUSCAR ID
        // dd($respuesta->id);die;
        return DB::connection('mysql')->table($alias . '.parpost')->where('id_integrante', $respuesta->id)->update([
            'estado' => $estado,
        ]);
    }

    public static function editarestado2($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de10a59')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarSemanas($id, $alias){
        $semana =  DB::connection('mysql')->table($alias . '.parpost')
        ->where('id_integrante', $id)
        ->first();

        $semana = explode(" ",$semana->semanas_ges)[0];

        return $semana;
    }
}
