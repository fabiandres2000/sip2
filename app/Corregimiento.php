<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Corregimiento extends Model
{
    protected $table = 'corregimientos';
    protected $fillable = [
        'id_muni',
        'id_dpto',
        'descripcion',
        'estado',
        'id_compania',
    ];
    public static function buscarCorregimientos($alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.corregimientos', function ($join) {
                $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
            })
            ->where("corregimientos.estado", "Activo")
            ->select('muni.codmun', 'dptos.codigo', 'corregimientos.id', 'corregimientos.descripcion')
            ->orderBy('muni.codmun', 'asc')
            ->orderBy('corregimientos.descripcion', 'asc')
            ->get();
    }

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            $respuesta = DB::connection('mysql')->table($alias . '.corregimientos')->join($alias . '.dptos', 'dptos.codigo', 'corregimientos.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'corregimientos.id_muni');
                })
                ->where(function ($query) use ($busqueda) {
                    $query->where('corregimientos.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('muni.descripcion', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('dptos.descripcion', 'LIKE', '%' . $busqueda . '%');
                })
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "dptos.codigo AS dpto",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "corregimientos.estado AS ESTADO",
                    "corregimientos.id",
                    "corregimientos.id_dpto AS dpto1",
                    "corregimientos.id_muni AS muni1"
                )
                ->orderBy('corregimientos.id', 'DESC')
                ->get();
        } else {
            $respuesta = DB::connection('mysql')->table($alias . '.corregimientos')->join($alias . '.dptos', 'dptos.codigo', 'corregimientos.id_dpto')
                ->join($alias . '.muni', function ($join) {
                    $join->on('muni.coddep', '=', 'dptos.codigo');
                    $join->on('muni.codmun', '=', 'corregimientos.id_muni');
                })
                ->select("dptos.descripcion AS DPTO",
                    "muni.descripcion AS MUNI",
                    "dptos.codigo AS dpto",
                    "muni.codmun AS muni",
                    "corregimientos.descripcion AS CORREGIMIENTO",
                    "corregimientos.estado AS ESTADO",
                    "corregimientos.id",
                    "corregimientos.id_dpto AS dpto1",
                    "corregimientos.id_muni AS muni1"
                )
                ->orderBy('corregimientos.id', 'DESC')
                ->get();
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.corregimientos')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_dpto' => $data['dpto'],
            'id_muni' => $data['muni'],
            'estado' => 'Activo',
            'descripcion' => $data['corregimiento'],
            'id_compania' => 1,
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.corregimientos')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function comboCorregimiento($iddep, $idmun, $alias)
    {
        return DB::connection('mysql')->table($alias . '.muni')->join($alias . '.dptos', 'dptos.codigo', 'muni.coddep')
            ->join($alias . '.corregimientos', function ($join) {
                $join->on('corregimientos.id_muni', '=', 'muni.codmun');
                $join->on('corregimientos.id_dpto', '=', 'dptos.codigo');
            })
            ->where("corregimientos.estado", "Activo")
            ->where("corregimientos.id_dpto", $iddep)
            ->where("corregimientos.id_muni", $idmun)
            ->select('muni.codmun', 'dptos.codigo', 'corregimientos.id', 'corregimientos.descripcion')
            ->orderBy('muni.codmun', 'asc')
            ->orderBy('corregimientos.descripcion', 'asc')
            ->get();
    }
}
