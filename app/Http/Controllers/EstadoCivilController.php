<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class EstadoCivilController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $estadocivil = \App\EstadoCivil::listar($busqueda, Session::get('alias'));
            if ($estadocivil) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $estadocivil->total(),
                        'pagina_actual' => $estadocivil->currentPage(),
                        'por_pagina' => $estadocivil->perPage(),
                        'ultima_pagina' => $estadocivil->lastPage(),
                        'desde' => $estadocivil->firstItem(),
                        'hasta' => $estadocivil->lastItem(),
                    ],
                    'estadocivil' => $estadocivil,
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
            $estadocivil = \App\EstadoCivil::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar el estado civil  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS ESTADO_CIVIL');
            if ($estadocivil) {
                $respuesta = [
                    'OPC' => 'SI',
                    'estadocivil' => $estadocivil,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Estado civil No Guardado...",
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
                $gua = \App\Log::guardar("Eliminar el estado civil con id = " . $id, Session::get('alias'), 'PARAMETROS ESTADO_CIVIL');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar el estado civil con id = " . $id, Session::get('alias'), 'PARAMETROS ESTADO_CIVIL');
            }
            $respuesta = \App\EstadoCivil::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
