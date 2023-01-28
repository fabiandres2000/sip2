<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class CorregimientoController extends Controller
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

            $busqueda = request()->get('txtbusqueda');
            $corregimientos = \App\Corregimiento::listar($busqueda, Session::get('alias'));
            if ($corregimientos) {
                $respuesta = [
                    // 'paginacion' => [
                    //     'total' => $corregimientos->total(),
                    //     'pagina_actual' => $corregimientos->currentPage(),
                    //     'por_pagina' => $corregimientos->perPage(),
                    //     'ultima_pagina' => $corregimientos->lastPage(),
                    //     'desde' => $corregimientos->firstItem(),
                    //     'hasta' => $corregimientos->lastItem(),
                    // ],
                    'corregimientos' => $corregimientos,
                    'arrayDpto' => $arrayDpto,
                    'arrayMuni' => $arrayMuni,
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
            $data = request()->get("corregimientos");
            if (request()->get("opcion") == "GUARDAR") {
                foreach ($data as $item) {
                    $dato['dpto'] = $item["dpto"];
                    $dato['muni'] = $item["muni"];
                    $dato['corregimiento'] = $item["corregimiento"];
                    $dato['id'] = $item["id"];
                    $corregimientos = \App\Corregimiento::guardar($dato, Session::get('alias'));
                    $gua = \App\Log::guardar("Guardar corregimiento = " . $item["corregimiento"], Session::get('alias'), 'PARAMETROS CORREGIMIENTOS');
                }
            } else {
                $dato['dpto'] = $data["dpto"];
                $dato['muni'] = $data["muni"];
                $dato['corregimiento'] = $data["corregimiento"];
                $dato['id'] = $data["id"];
                $corregimientos = \App\Corregimiento::guardar($dato, Session::get('alias'));
                $gua = \App\Log::guardar("Editar corregimiento id = " . $data["id"], Session::get('alias'), 'PARAMETROS CORREGIMIENTOS');
            }
            if ($corregimientos) {
                $respuesta = [
                    'OPC' => 'SI',
                    'corregimientos' => $corregimientos,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Corregimiento(s) No Guardado(s)...",
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
                $gua = \App\Log::guardar("Eliminar el corregimiento con id = " . $id, Session::get('alias'), 'PARAMETROS CORREGIMIENTOS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar el corregimiento con id = " . $id, Session::get('alias'), 'PARAMETROS CORREGIMIENTOS');
            }
            $respuesta = \App\Corregimiento::editarestado($estado, $id, Session::get('alias'));
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
        
            $corregimientos = \App\Corregimiento::comboCorregimiento($iddep, $idmun, Session::get('alias'));
           
            $respuesta = [
                'corregimientos' => $corregimientos,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
