<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class EnfermedadesInfController extends Controller
{
    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $enfermedadesinf = \App\EnfermedadesInf::listar($busqueda, Session::get('alias'));
            if ($enfermedadesinf) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $enfermedadesinf->total(),
                        'pagina_actual' => $enfermedadesinf->currentPage(),
                        'por_pagina' => $enfermedadesinf->perPage(),
                        'ultima_pagina' => $enfermedadesinf->lastPage(),
                        'desde' => $enfermedadesinf->firstItem(),
                        'hasta' => $enfermedadesinf->lastItem(),
                    ],
                    'enfermedadesinf' => $enfermedadesinf,
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
            $enfermedadesinf = \App\EnfermedadesInf::guardar($data, Session::get('alias'));
            $gua = \App\Log::guardar("Guardar la enfermedad infecciosa  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS ENFERMEDADES_INFECCIOSAS');
            if ($enfermedadesinf) {
                $respuesta = [
                    'OPC' => 'SI',
                    'enfermedadesinf' => $enfermedadesinf,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Enfermedades Infecciosas No Guardadas...",
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
                $gua = \App\Log::guardar("Eliminar la enfermedad infecciosa con id = " . $id, Session::get('alias'), 'PARAMETROS ENFERMEDADES_INFECCIOSAS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la enfermedad infecciosa con id = " . $id, Session::get('alias'), 'PARAMETROS ENFERMEDADES_INFECCIOSAS');
            }
            $respuesta = \App\EnfermedadesInf::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function combo()
    {
        if (Auth::check()) {
               
            $enfermedades = \App\EnfermedadesInf::buscar(Session::get('alias'));

            $respuesta = [
                'enfermedades' => $enfermedades,
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
