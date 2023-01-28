<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class EscolaridadController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $escolaridad = \App\Escolaridad::listar($busqueda, Session::get('alias'));
            if ($escolaridad) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $escolaridad->total(),
                        'pagina_actual' => $escolaridad->currentPage(),
                        'por_pagina' => $escolaridad->perPage(),
                        'ultima_pagina' => $escolaridad->lastPage(),
                        'desde' => $escolaridad->firstItem(),
                        'hasta' => $escolaridad->lastItem(),
                    ],
                    'escolaridad' => $escolaridad,
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
            $escolaridad = \App\Escolaridad::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar la escolaridad  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS ESCOLARIDAD');
            if ($escolaridad) {
                $respuesta = [
                    'OPC' => 'SI',
                    'escolaridad' => $escolaridad,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Escolaridad No Guardada...",
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
                $gua = \App\Log::guardar("Eliminar la escolaridad con id = " . $id, Session::get('alias'), 'PARAMETROS ESCOLARIDAD');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la escolaridad con id = " . $id, Session::get('alias'), 'PARAMETROS ESCOLARIDAD');
            }
            $respuesta = \App\Escolaridad::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
