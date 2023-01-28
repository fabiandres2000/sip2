<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class GrupoController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $grupos_ayudas = \App\Grupo::listar($busqueda, Session::get('alias'));
            if ($grupos_ayudas) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $grupos_ayudas->total(),
                        'pagina_actual' => $grupos_ayudas->currentPage(),
                        'por_pagina' => $grupos_ayudas->perPage(),
                        'ultima_pagina' => $grupos_ayudas->lastPage(),
                        'desde' => $grupos_ayudas->firstItem(),
                        'hasta' => $grupos_ayudas->lastItem(),
                    ],
                    'grupos_ayudas' => $grupos_ayudas,
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
            $grupos_ayudas = \App\Grupo::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar el grupo de ayuda  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS GRUPOS');
            if ($grupos_ayudas) {
                $respuesta = [
                    'OPC' => 'SI',
                    'grupos_ayudas' => $grupos_ayudas,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Grupos de Ayudas No Guardados...",
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
                $gua = \App\Log::guardar("Eliminar el grupo de ayuda con id = " . $id, Session::get('alias'), 'PARAMETROS GRUPOS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar el grupo de ayuda con id = " . $id, Session::get('alias'), 'PARAMETROS GRUPOS');
            }
            $respuesta = \App\Grupo::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
