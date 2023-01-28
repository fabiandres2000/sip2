<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table = 'barrios';
    protected $fillable = [
        'id_dpto', 'id_mun', 'id_corre', 'barrio', 'estado', 'id_compania',
    ];

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.barrios')
                ->join($alias . '.dptos', 'dptos.codigo', 'barrios.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'barrios.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'barrios.id_corre');
                })
                ->where(function ($query) use ($busqueda) {
                    $query->where('barrio', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%');
                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "barrios.barrio AS BARRI",
                    "barrios.id AS barrio",
                    "barrios.estado AS ESTADO",
                    "barrios.id"
                )
                ->orderBy('barrios.id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.barrios')
                ->join($alias . '.dptos', 'dptos.codigo', 'barrios.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'barrios.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'barrios.id_corre');
                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "barrios.barrio AS BARRI",
                    "barrios.id AS barrio",
                    "barrios.estado AS ESTADO",
                    "barrios.id"
                )
                ->orderBy('barrios.id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.barrios')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_dpto' => $data['dpto'],
            'id_mun' => $data['muni'],
            'estado' => 'Activo',
            'id_corre' => $data['corregimiento'],
            'barrio' => $data['barrio'],
            'id_compania' => 1,
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.barrios')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarBarrios($alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.corregimientos', function ($join) {
                $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
            })
            ->join($alias . '.barrios', function ($join) {
                $join->on('barrios.id_mun', '=', 'muni.codmun');
                $join->on('barrios.id_dpto', '=', 'dptos.codigo');
                $join->on('barrios.id_corre', '=', 'corregimientos.id');
            })
            ->where("barrios.estado", "Activo")
            ->select('barrios.id', 'barrios.barrio', 'corregimientos.id AS IDCORRE')
            ->orderBy('barrios.id', 'asc')
            ->orderBy('barrios.barrio', 'asc')
            ->get();
    }

    public static function barriosMuni($id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.barrios', function ($join) {
                $join->on('barrios.id_mun', '=', 'muni.codmun');
                $join->on('barrios.id_dpto', '=', 'dptos.codigo');
            })
            ->where("barrios.estado", "Activo")
            ->where("barrios.id_mun", $id)
            ->where("barrios.id_corre", 0)
            ->select('barrios.id', 'barrios.barrio')
            ->orderBy('barrios.id', 'asc')
            ->orderBy('barrios.barrio', 'asc')
            ->get();
    }

    public static function barriosCorre($id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.corregimientos', function ($join) {
                $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
            })
            ->join($alias . '.barrios', function ($join) {
                $join->on('barrios.id_mun', '=', 'muni.codmun');
                $join->on('barrios.id_dpto', '=', 'dptos.codigo');
                $join->on('barrios.id_corre', '=', 'corregimientos.id');
            })
            ->where("barrios.estado", "Activo")
            ->where("barrios.id_corre", $id)
            ->select('barrios.id', 'barrios.barrio', 'corregimientos.id AS IDCORRE')
            ->orderBy('barrios.id', 'asc')
            ->orderBy('barrios.barrio', 'asc')
            ->get();
    }

    public static function listar2($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.barrios')
                ->join($alias . '.dptos', 'dptos.codigo', 'barrios.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'barrios.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'barrios.id_corre');
                })
                ->where(function ($query) use ($busqueda) {
                    $query->where('barrio', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%');
                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "barrios.barrio AS BARRI",
                    "barrios.id AS barrio",
                    "barrios.estado AS ESTADO",
                    "barrios.id"
                )
                ->orderBy('barrios.id', 'DESC')
                ->get();
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.barrios')
                ->join($alias . '.dptos', 'dptos.codigo', 'barrios.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'barrios.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'barrios.id_corre');
                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "barrios.barrio AS BARRI",
                    "barrios.id AS barrio",
                    "barrios.estado AS ESTADO",
                    "barrios.id"
                )
                ->orderBy('barrios.id', 'DESC')
                ->get();
        }

        return $respuesta;
    }
}
