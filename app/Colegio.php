<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $table = 'colegios';
    protected $fillable = [
        'id_dpto', 'id_mun', 'id_corre', 'descripcion', 'estado', 'id_compania',
    ];

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.colegios')->join($alias . '.dptos', 'dptos.codigo', 'colegios.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'colegios.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'colegios.id_corre');
                })
                ->where(function ($query) use ($busqueda) {
                    $query->where('colegios.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('corregimientos.descripcion', 'LIKE', '%' . $busqueda . '%');

                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "colegios.descripcion AS COLEGIO",
                    "colegios.estado AS ESTADO",
                    "colegios.id"
                )
                ->orderBy('colegios.id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.colegios')->join($alias . '.dptos', 'dptos.codigo', 'colegios.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'colegios.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'colegios.id_corre');
                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "colegios.descripcion AS COLEGIO",
                    "colegios.estado AS ESTADO",
                    "colegios.id"
                )
                ->orderBy('colegios.id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.colegios')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_dpto' => $data['dpto'],
            'id_mun' => $data['muni'],
            'estado' => 'Activo',
            'id_corre' => $data['corregimiento'],
            'descripcion' => $data['descripcion'],
            'id_compania' => 1,
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.colegios')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarColegios($alias)
    {
        return DB::connection('mysql')->table($alias . '.colegios')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.corregimientos', function ($join) {
                $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
            })
            ->join($alias . '.colegios', function ($join) {
                $join->on('colegios.id_mun', '=', 'muni.codmun');
                $join->on('colegios.id_dpto', '=', 'dptos.codigo');
                $join->on('colegios.id_corre', '=', 'corregimientos.id');
            })
            ->where("colegios.estado", "Activo")
            ->select('colegios.id', 'colegios.descripcion', 'corregimientos.id AS IDCORRE')
            ->orderBy('colegios.id', 'asc')
            ->orderBy('colegios.descripcion', 'asc')
            ->get();
    }

    public static function colegiosMuni($id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.colegios', function ($join) {
                $join->on('colegios.id_mun', '=', 'muni.codmun');
                $join->on('colegios.id_dpto', '=', 'dptos.codigo');
            })
            ->where("colegios.estado", "Activo")
            ->where("colegios.id_mun", $id)
            ->where("colegios.id_corre", 0)
            ->select('colegios.id', 'colegios.descripcion')
            ->orderBy('colegios.id', 'asc')
            ->orderBy('colegios.descripcion', 'asc')
            ->get();
    }

    public static function colegiosCorre($id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.corregimientos', function ($join) {
                $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
            })
            ->join($alias . '.colegios', function ($join) {
                $join->on('colegios.id_mun', '=', 'muni.codmun');
                $join->on('colegios.id_dpto', '=', 'dptos.codigo');
                $join->on('colegios.id_corre', '=', 'corregimientos.id');
            })
            ->where("colegios.estado", "Activo")
            ->where("colegios.id_corre", $id)
            ->select('colegios.id', 'colegios.descripcion', 'corregimientos.id AS IDCORRE')
            ->orderBy('colegios.id', 'asc')
            ->orderBy('colegios.descripcion', 'asc')
            ->get();
    }
}
