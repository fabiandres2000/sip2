<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class MetodosController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $metodos = \App\Metodos::listar($busqueda, Session::get('alias'));
            if ($metodos) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $metodos->total(),
                        'pagina_actual' => $metodos->currentPage(),
                        'por_pagina' => $metodos->perPage(),
                        'ultima_pagina' => $metodos->lastPage(),
                        'desde' => $metodos->firstItem(),
                        'hasta' => $metodos->lastItem(),
                    ],
                    'metodos' => $metodos,
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
            $metodos = \App\Metodos::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar el metodo de planificación  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS METODOS');
            if ($metodos) {
                $respuesta = [
                    'OPC' => 'SI',
                    'metodos' => $metodos,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Metodos de planificación No Guardados...",
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
                $gua = \App\Log::guardar("Eliminar el metodo de planificación con id = " . $id, Session::get('alias'), 'PARAMETROS METODOS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar el metodo de planificación con id = " . $id, Session::get('alias'), 'PARAMETROS METODOS');
            }
            $respuesta = \App\Metodos::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
