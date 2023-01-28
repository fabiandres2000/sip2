<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class VeredaController extends Controller
{

    public function gestion()
    {
        if (Auth::check()) {
            $consdptos = \App\Dpto::buscarDepartamentos(Session::get('alias'));
            foreach ($consdptos as $item) {
                $arrayDpto[] = [
                    'value' => $item->codigo,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $consmuni = \App\Muni::buscarMunicipios(Session::get('alias'));
            foreach ($consmuni as $item) {
                $arrayMuni[$item->codigo][] = [
                    'value' => $item->codmun,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayCorregi = [];
            $conscorregi = \App\Corregimiento::buscarCorregimientos(Session::get('alias'));
            foreach ($conscorregi as $item) {
                $arrayCorregi[$item->codmun][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $busqueda = request()->get('txtbusqueda');
            $veredas = \App\Vereda::listar($busqueda, Session::get('alias'));
            if ($veredas) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $veredas->total(),
                        'pagina_actual' => $veredas->currentPage(),
                        'por_pagina' => $veredas->perPage(),
                        'ultima_pagina' => $veredas->lastPage(),
                        'desde' => $veredas->firstItem(),
                        'hasta' => $veredas->lastItem(),
                    ],
                    'veredas' => $veredas,
                    'arrayDpto' => $arrayDpto,
                    'arrayMuni' => $arrayMuni,
                    'arrayCorregi' => $arrayCorregi,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 200);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }

    }

    public function guardar()
    {
        if (Auth::check()) {
            $data = request()->get("veredas");
            if (request()->get("opcion") == "GUARDAR") {
                foreach ($data as $item) {
                    $dato['dpto'] = $item["dpto"];
                    $dato['muni'] = $item["muni"];
                    $dato['corregimiento'] = $item["corregimiento"];
                    $dato['descripcion'] = $item["descripcion"];
                    $dato['id'] = $item["id"];
                    $veredas = \App\Vereda::guardar($dato, Session::get('alias'));
                    $gua = \App\Log::guardar("Guardar la vereda  = " . $item['descripcion'], Session::get('alias'), 'PARAMETROS VEREDAS');
                }
            } else {
                $dato['dpto'] = $data["dpto"];
                $dato['muni'] = $data["muni"];
                $dato['corregimiento'] = $data["corregimiento"];
                $dato['descripcion'] = $data["descripcion"];
                $dato['id'] = $data["id"];
                $veredas = \App\Vereda::guardar($dato, Session::get('alias'));
                $gua = \App\Log::guardar("Editar la vereda  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS VEREDAS');
            }
            if ($veredas) {
                $respuesta = [
                    'OPC' => 'SI',
                    'veredas' => $veredas,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Barrio(s) No Guardado(s)...",
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
                $gua = \App\Log::guardar("Eliminar la vereda con id = " . $id, Session::get('alias'), 'PARAMETROS VEREDAS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar la vereda con id = " . $id, Session::get('alias'), 'PARAMETROS VEREDAS');
            }
            $respuesta = \App\Vereda::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function combo()
    {
        if (Auth::check()) {
            $mensaje = "";
            $iddep = Auth::user()->permisos->where('actual', 1)->first()->ente->id_dpto;
            $idmun = Auth::user()->permisos->where('actual', 1)->first()->ente->id_mun;  
        
            $veredas = \App\Vereda::comboVereda($iddep, $idmun, Session::get('alias'));
           
            $respuesta = [
                'veredas' => $veredas,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
