<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class ReligionController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $religion = \App\Religion::listar($busqueda, Session::get('alias'));
            if ($religion) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $religion->total(),
                        'pagina_actual' => $religion->currentPage(),
                        'por_pagina' => $religion->perPage(),
                        'ultima_pagina' => $religion->lastPage(),
                        'desde' => $religion->firstItem(),
                        'hasta' => $religion->lastItem(),
                    ],
                    'religion' => $religion,
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
            $religion = \App\Religion::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar la religión  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS RELIGION');
            if ($religion) {
                $respuesta = [
                    'OPC' => 'SI',
                    'religion' => $religion,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Religión No Guardada...",
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
                $gua = \App\Log::guardar("Eliminar la religión con id = " . $id, Session::get('alias'), 'PARAMETROS RELIGION');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la religión con id = " . $id, Session::get('alias'), 'PARAMETROS RELIGION');
            }
            $respuesta = \App\Religion::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
