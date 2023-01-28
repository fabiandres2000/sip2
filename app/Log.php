<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;
use Session;

class Log extends Model
{
    protected $table = 'log';
    protected $fillable = [
        'id_usuario', 'accion', 'fecha', 'hora', 'id_compania', 'estado', 'ip', 'modulo',
    ];

    public static function guardar($accion, $alias, $modulo = '')
    {
        return DB::connection('mysql')->table($alias . '.log')->insert([
            'id_usuario' => Auth::user()->id,
            'accion' => $accion,
            'id_compania' => 1,
            'estado' => 'Activo',
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'ip' => Session::get('ip', '0.0.0.0'),
            'modulo' => $modulo,
        ]);
    }

    public static function listar($alias)
    {
        $respuesta = User::join($alias . '.log', $alias . '.log.id_usuario', 'users.id')
            ->where($alias . '.log.estado', 'Activo')
            ->orderBy($alias . '.log.id', 'DESC')
            ->select('users.nombre', $alias . '.log.modulo', $alias . '.log.ip', $alias . '.log.accion', $alias . '.log.fecha', $alias . '.log.id', $alias . '.log.hora')
            ->get();
        return $respuesta;
    }

    public static function buscar($alias, $datos)
    {
        $respuesta = User::join($alias . '.log', $alias . '.log.id_usuario', 'users.id')
            ->where($alias . '.log.estado', 'Activo')
            ->select('users.nombre', $alias . '.log.modulo', $alias . '.log.ip', $alias . '.log.accion', $alias . '.log.fecha', $alias . '.log.id', $alias . '.log.hora')
            ->orderBy($alias . '.log.id', 'DESC');
        if ($datos['id_usuario'] != "0") {
            $respuesta->where($alias . '.log.id_usuario', $datos['id_usuario']);
        }
        if ($datos['modulos'] != "0") {
            $respuesta->where($alias . '.log.modulo', 'like', '%' . $datos['modulos'] . '%');
        }
        if ($datos['fecha'] != "0" && $datos['fecha'] != "") {
            $respuesta->where($alias . '.log.fecha', $datos['fecha']);
        }

        return $respuesta->get();
    }
}
