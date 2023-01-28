<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Factores extends Model
{
    protected $table = 'factores';
    protected $fillable = [
        'id_jefe', 'id_hogar', 'dialogos', 'sancion', 'castigo_verbal', 'castigo_fisico', 'alcohol',
        'tabaco', 'sustancias_psico', 'apuestas', 'violencia_fisica', 'violencia_psico', 'violencia_economica',
        'abuso_sexual', 'actividad_fisica', 'consumo_frutas', 'religiosos', 'sociales', 'culturales', 'recreativos',
        'estado', 'id_compania',
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID JEFE
        $jefe = \App\Caracterizacion::buscar($data['identificacion'], $alias);
        // BUSCAR ID JEFE
        $data['id_jefe'] = $jefe->id;
        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.factores')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_hogar' => $data['id_hogar'],
            'id_jefe' => $data['id_jefe'],
            'dialogos' => $data['dialogos'],
            'sancion' => $data['sancion'],
            'castigo_verbal' => $data['castigo_verbal'],
            'castigo_fisico' => $data['castigo_fisico'],
            'alcohol' => $data['alcohol'],
            'tabaco' => $data['tabaco'],
            'sustancias_psico' => $data['sustancias_psico'],
            'apuestas' => $data['apuestas'],
            'violencia_fisica' => $data['violencia_fisica'],
            'violencia_psico' => $data['violencia_psico'],
            'violencia_economica' => $data['violencia_economica'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'abuso_sexual' => $data['abuso_sexual'],
            'actividad_fisica' => $data['actividad_fisica'],
            'consumo_frutas' => $data['consumo_frutas'],
            'religiosos' => $data['religiosos'],
            'sociales' => $data['sociales'],
            'culturales' => $data['culturales'],
            'recreativos' => $data['recreativos'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        $fac1 = DB::connection('mysql')->table($alias . '.factores')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'factores.id_jefe')
            ->where('factores.id_hogar', $id_hogar)
            ->where('factores.estado', 'Activo')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
            )
            ->selectRaw("IFNULL(factores.id,'0') AS id")
            ->selectRaw("IFNULL(factores.dialogos,'') AS dialogos")
            ->selectRaw("IFNULL(factores.id_hogar,'') AS id_hogar")
            ->selectRaw("IFNULL(factores.sancion,'') AS sancion")
            ->selectRaw("IFNULL(factores.castigo_verbal,'') AS castigo_verbal")
            ->selectRaw("IFNULL(factores.castigo_fisico,'') AS castigo_fisico")
            ->selectRaw("IFNULL(factores.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(factores.tabaco,'') AS tabaco")
            ->selectRaw("IFNULL(factores.sustancias_psico,'') AS sustancias_psico")
            ->selectRaw("IFNULL(factores.apuestas,'') AS apuestas")
            ->selectRaw("IFNULL(factores.violencia_fisica,'') AS violencia_fisica")
            ->selectRaw("IFNULL(factores.violencia_psico,'') AS violencia_psico")
            ->selectRaw("IFNULL(factores.violencia_economica,'') AS violencia_economica")
            ->selectRaw("IFNULL(factores.abuso_sexual,'') AS abuso_sexual")
            ->selectRaw("IFNULL(factores.actividad_fisica,'') AS actividad_fisica")
            ->selectRaw("IFNULL(factores.consumo_frutas,'') AS consumo_frutas")
            ->selectRaw("IFNULL(factores.religiosos,'') AS religiosos")
            ->selectRaw("IFNULL(factores.sociales,'') AS sociales")
            ->selectRaw("IFNULL(factores.culturales,'') AS culturales")
            ->selectRaw("IFNULL(factores.recreativos,'') AS recreativos")
            ->selectRaw("IFNULL(factores.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(factores.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        $fac2 = DB::connection('mysql')->table($alias . '.factores')
            ->rightjoin($alias . '.caracterizacion', 'caracterizacion.id', 'factores.id_jefe')
            ->where('caracterizacion.id_hogar', $id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->whereRaw('factores.id_hogar IS NULL')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
            )
            ->selectRaw("IFNULL(factores.id,'0') AS id")
            ->selectRaw("IFNULL(factores.dialogos,'') AS dialogos")
            ->selectRaw("IFNULL(factores.id_hogar,'') AS id_hogar")
            ->selectRaw("IFNULL(factores.sancion,'') AS sancion")
            ->selectRaw("IFNULL(factores.castigo_verbal,'') AS castigo_verbal")
            ->selectRaw("IFNULL(factores.castigo_fisico,'') AS castigo_fisico")
            ->selectRaw("IFNULL(factores.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(factores.tabaco,'') AS tabaco")
            ->selectRaw("IFNULL(factores.sustancias_psico,'') AS sustancias_psico")
            ->selectRaw("IFNULL(factores.apuestas,'') AS apuestas")
            ->selectRaw("IFNULL(factores.violencia_fisica,'') AS violencia_fisica")
            ->selectRaw("IFNULL(factores.violencia_psico,'') AS violencia_psico")
            ->selectRaw("IFNULL(factores.violencia_economica,'') AS violencia_economica")
            ->selectRaw("IFNULL(factores.abuso_sexual,'') AS abuso_sexual")
            ->selectRaw("IFNULL(factores.actividad_fisica,'') AS actividad_fisica")
            ->selectRaw("IFNULL(factores.consumo_frutas,'') AS consumo_frutas")
            ->selectRaw("IFNULL(factores.religiosos,'') AS religiosos")
            ->selectRaw("IFNULL(factores.sociales,'') AS sociales")
            ->selectRaw("IFNULL(factores.culturales,'') AS culturales")
            ->selectRaw("IFNULL(factores.recreativos,'') AS recreativos")
            ->selectRaw("IFNULL(factores.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(factores.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        return $fac1->union($fac2)->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.factores')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarFact($alias, $id_hogar)
    {
        return DB::connection('mysql')->table($alias . '.factores')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'factores.id_jefe')
            ->where('factores.id_hogar', $id_hogar)
            ->where('factores.estado', 'Activo')
            ->first();
    }

    public static function buscarFactFami($alias, $id_hogar,$id_jefe)
    {
        return DB::connection('mysql')->table($alias . '.factores')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'factores.id_jefe')
            ->where('factores.id_hogar', $id_hogar)
            ->where('factores.id_jefe', $id_jefe)
            ->where('factores.estado', 'Activo')
            ->first();
    }    
}
