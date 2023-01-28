<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ClasificacionEtnia extends Model
{
    protected $table = 'clasificacion_etnia';
    protected $fillable = [
        'id_etnia', 'clasificacion', 'estado', 'id_compania',
    ];
    public static function guardar($data,$alias)
    {
        return DB::connection('mysql')->table($alias . '.clasificacion_etnia')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_etnia' => $data['id_etnia'],
            'clasificacion' => $data['clasificacion'],
            'estado' => $data['estado'],
            'id_compania' => 1,
        ]);
    }

    public static function listar($id_etnia,$alias)
    {
        $respuesta = DB::connection('mysql')->table($alias . '.clasificacion_etnia')->join($alias . ".etnias", "etnias.id", "clasificacion_etnia.id_etnia")
            ->where("etnias.id", $id_etnia)
            ->select("clasificacion_etnia.id", "clasificacion_etnia.clasificacion", "clasificacion_etnia.estado")
            ->orderBy('etnias.id', 'DESC')
            ->get();
        return $respuesta;
    }

    public static function buscarClasificacion($alias)
    {
        return DB::connection('mysql')->table($alias . '.clasificacion_etnia')->join($alias . ".etnias", "etnias.id", "clasificacion_etnia.id_etnia")
            ->select('clasificacion_etnia.id', 'clasificacion_etnia.clasificacion', 'clasificacion_etnia.id_etnia')
            ->orderBy('clasificacion_etnia.clasificacion', 'asc')
            ->where('clasificacion_etnia.estado','Activo')
            ->get();
    }

}
