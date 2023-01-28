<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = 'ocupaciones';
    protected $fillable = [
        'descripcion',
        'observacion',
        'estado',
        'id_compania',
    ];

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.ocupaciones')->where(function ($query) use ($busqueda) {
                $query->where('descripcion', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('observacion', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('estado', 'LIKE', '%' . $busqueda . '%');
            })
                ->orderBy('id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.ocupaciones')->orderBy('id', 'DESC')
            ->paginate(10);
        }

        return $respuesta;
    }

    public static function listar_table($alias)
    {
        $respuesta = DB::connection('mysql')->table($alias . '.ocupaciones')
        ->select("ocupaciones.*")
        ->orderBy('id', 'DESC')
        ->get();   
        return $respuesta;
    }

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.ocupaciones')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'descripcion' => $data['descripcion'],
            'observacion' => $data['observacion'],
            'estado' => 'Activo',
            'id_compania' => 1,
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.ocupaciones')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscar($alias)
    {
        return DB::connection('mysql')->table($alias . '.ocupaciones')->orderBy('descripcion', 'asc')
            ->where('estado', 'Activo')
            ->limit(8000)
            ->get();
    }
}
