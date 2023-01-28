<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use DataTables;

class OcupacionController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $ocupaciones = \App\Ocupacion::listar($busqueda, Session::get('alias'));
            if ($ocupaciones) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $ocupaciones->total(),
                        'pagina_actual' => $ocupaciones->currentPage(),
                        'por_pagina' => $ocupaciones->perPage(),
                        'ultima_pagina' => $ocupaciones->lastPage(),
                        'desde' => $ocupaciones->firstItem(),
                        'hasta' => $ocupaciones->lastItem(),
                    ],
                    'ocupaciones' => $ocupaciones,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function listar_table()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $ocupaciones = \App\Ocupacion::listar_table(Session::get('alias'));
            if ($ocupaciones) {
                $respuesta = [
                    'ocupaciones' => $ocupaciones,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }

    }

    public function guardar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $ocupaciones = \App\Ocupacion::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar la ocupación  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS OCUPACIONES');
            if ($ocupaciones) {
                $respuesta = [
                    'OPC' => 'SI',
                    'ocupaciones' => $ocupaciones,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Ocupación No Guardada...",
                ];
                return response()->json($respuesta, 200);

            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminar()
    {
        if (Auth::check()) {
            $mensaje = "";
            $id = request()->get('id');
            $estado = request()->get('estado');
            if ($estado == "Activo") {
                $estado = "Inactivo";
                $gua = \App\Log::guardar("Eliminar la ocupación con id = " . $id, Session::get('alias'), 'PARAMETROS OCUPACIONES');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la ocupación con id = " . $id, Session::get('alias'), 'PARAMETROS OCUPACIONES');
            }
            $respuesta = \App\Ocupacion::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
