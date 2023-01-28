<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class MorbilidadNacerController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $morbilidad = \App\MorbilidadNacer::listar($busqueda, Session::get('alias'));
            if ($morbilidad) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $morbilidad->total(),
                        'pagina_actual' => $morbilidad->currentPage(),
                        'por_pagina' => $morbilidad->perPage(),
                        'ultima_pagina' => $morbilidad->lastPage(),
                        'desde' => $morbilidad->firstItem(),
                        'hasta' => $morbilidad->lastItem(),
                    ],
                    'morbilidad' => $morbilidad,
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
            $morbilidad = \App\MorbilidadNacer::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar la morbilidad al nacer  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS MORBILIDAD_NACER');
            if ($morbilidad) {
                $respuesta = [
                    'OPC' => 'SI',
                    'morbilidad' => $morbilidad,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Morbilidad al Nacer No Guardada...",
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
                $gua = \App\Log::guardar("Eliminar la morbilidad al nacer con id = " . $id, Session::get('alias'), 'PARAMETROS MORBILIDAD_NACER');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la morbilidad al nacer con id = " . $id, Session::get('alias'), 'PARAMETROS MORBILIDAD_NACER');
            }
            $respuesta = \App\MorbilidadNacer::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
