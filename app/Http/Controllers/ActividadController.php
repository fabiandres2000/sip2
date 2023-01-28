<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class ActividadController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $actividades = \App\Actividad::listar($busqueda, Session::get('alias'));
            if ($actividades) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $actividades->total(),
                        'pagina_actual' => $actividades->currentPage(),
                        'por_pagina' => $actividades->perPage(),
                        'ultima_pagina' => $actividades->lastPage(),
                        'desde' => $actividades->firstItem(),
                        'hasta' => $actividades->lastItem(),
                    ],
                    'actividades' => $actividades,
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
            $actividades = \App\Actividad::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar la actividad economica  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS ACTIVIDADES');
            if ($actividades) {
                $respuesta = [
                    'OPC' => 'SI',
                    'actividades' => $actividades,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Actividad Economica No Guardada...",
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
                $gua = \App\Log::guardar("Eliminar la actividad economica con id = " . $id, Session::get('alias'), 'PARAMETROS ACTIVIDADES');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la actividad economica con id = " . $id, Session::get('alias'), 'PARAMETROS ACTIVIDADES');
            }
            $respuesta = \App\Actividad::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
