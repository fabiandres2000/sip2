<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class MotivosController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $motivos = \App\Motivos::listar($busqueda, Session::get('alias'));
            if ($motivos) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $motivos->total(),
                        'pagina_actual' => $motivos->currentPage(),
                        'por_pagina' => $motivos->perPage(),
                        'ultima_pagina' => $motivos->lastPage(),
                        'desde' => $motivos->firstItem(),
                        'hasta' => $motivos->lastItem(),
                    ],
                    'motivos' => $motivos,
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
            $motivos = \App\Motivos::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar el motivo para no planificar  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS MOTIVOS');
            if ($motivos) {
                $respuesta = [
                    'OPC' => 'SI',
                    'motivos' => $motivos,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Motivos Para No Planificar No Guardados...",
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
                $gua = \App\Log::guardar("Eliminar el motivo para no planificar con id = " . $id, Session::get('alias'), 'PARAMETROS MOTIVOS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar el motivo para no planificar con id = " . $id, Session::get('alias'), 'PARAMETROS MOTIVOS');
            }
            $respuesta = \App\Motivos::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
