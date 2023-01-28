<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Vereda extends Model
{
    protected $table = 'veredas';
    protected $fillable = [
        'id_dpto', 'id_mun', 'id_corre', 'descripcion', 'estado', 'id_compania',
    ];

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.veredas')->join($alias . '.dptos', 'dptos.codigo', 'veredas.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'veredas.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'veredas.id_corre');
                })
                ->where(function ($query) use ($busqueda) {
                    $query->where('veredas.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('corregimientos.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%');
                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "veredas.descripcion AS VEREDA",
                    "veredas.id AS IDVEREDA",
                    "veredas.estado AS ESTADO",
                    "veredas.id"
                )
                ->orderBy('veredas.id', 'DESC')
                ->paginate(10);
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.veredas')->join($alias . '.dptos', 'dptos.codigo', 'veredas.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'veredas.id_mun');
                })
                ->leftjoin($alias . '.corregimientos', function ($join) {
                    $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
                    $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                    $join->on('corregimientos.id', '=', 'veredas.id_corre');
                })
                ->select("dptos.descripcion AS DEPARTAMENTO",
                    "dptos.codigo AS dpto",
                    "muni.descripcion AS MUNICIPIO",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGI",
                    "corregimientos.id AS corregimiento",
                    "veredas.descripcion AS VEREDA",
                    "veredas.id AS IDVEREDA",
                    "veredas.estado AS ESTADO",
                    "veredas.id"
                )
                ->orderBy('veredas.id', 'DESC')
                ->paginate(10);
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {
        return DB::connection('mysql')->table($alias . '.veredas')->updateOrInsert([
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
        return DB::connection('mysql')->table($alias . '.veredas')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarVeredas($alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.corregimientos', function ($join) {
                $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
            })
            ->join($alias . '.veredas', function ($join) {
                $join->on('veredas.id_mun', '=', 'muni.codmun');
                $join->on('veredas.id_dpto', '=', 'dptos.codigo');
                $join->on('veredas.id_corre', '=', 'corregimientos.id');
            })
            ->where("veredas.estado", "Activo")
            ->select('veredas.id', 'veredas.descripcion', 'corregimientos.id AS IDCORRE')
            ->orderBy('veredas.id', 'asc')
            ->orderBy('veredas.descripcion', 'asc')
            ->get();
    }

    public static function comboVereda($iddep, $idmun, $alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.veredas', function ($join) {
                $join->on('veredas.id_mun', '=', 'muni.codmun');
                $join->on('veredas.id_dpto', '=', 'dptos.codigo');
            })
            ->where("veredas.estado", "Activo")
            ->where("veredas.id_dpto", $iddep)
            ->where("veredas.id_mun", $idmun)
            ->select('muni.codmun', 'dptos.codigo', 'veredas.id', 'veredas.descripcion')
            ->orderBy('muni.codmun', 'asc')
            ->orderBy('veredas.descripcion', 'asc')
            ->get();
    }
}
