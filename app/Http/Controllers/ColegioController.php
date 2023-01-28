<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class ColegioController extends Controller
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

            $conscorregi = \App\Corregimiento::buscarCorregimientos(Session::get('alias'));
            $arrayCorregi = [];
            foreach ($conscorregi as $item) {
                $arrayCorregi[$item->codmun][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $busqueda = request()->get('txtbusqueda');
            $colegios = \App\Colegio::listar($busqueda, Session::get('alias'));
            if ($colegios) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $colegios->total(),
                        'pagina_actual' => $colegios->currentPage(),
                        'por_pagina' => $colegios->perPage(),
                        'ultima_pagina' => $colegios->lastPage(),
                        'desde' => $colegios->firstItem(),
                        'hasta' => $colegios->lastItem(),
                    ],
                    'colegios' => $colegios,
                    'arrayDpto' => $arrayDpto,
                    'arrayMuni' => $arrayMuni,
                    'arrayCorregi' => $arrayCorregi,
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
            $data = request()->get("colegios");
            if (request()->get("opcion") == "GUARDAR") {
                foreach ($data as $item) {
                    $dato['dpto'] = $item["dpto"];
                    $dato['muni'] = $item["muni"];
                    $dato['corregimiento'] = $item["corregimiento"];
                    $dato['descripcion'] = $item["descripcion"];
                    $dato['id'] = $item["id"];
                    $colegios = \App\Colegio::guardar($dato, Session::get('alias'));
                    $gua = \App\Log::guardar("Guardar el colegio  = " . $item['descripcion'], Session::get('alias'), 'PARAMETROS COLEGIOS');
                }
            } else {
                $dato['dpto'] = $data["dpto"];
                $dato['muni'] = $data["muni"];
                $dato['corregimiento'] = $data["corregimiento"];
                $dato['descripcion'] = $data["descripcion"];
                $dato['id'] = $data["id"];
                $colegios = \App\Colegio::guardar($dato, Session::get('alias'));
                $gua = \App\Log::guardar("Guardar el colegio  = " . $data['descripcion'], Session::get('alias'), 'PARAMETROS COLEGIOS');
            }
            if ($colegios) {
                $respuesta = [
                    'OPC' => 'SI',
                    'colegios' => $colegios,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Colegio(s) No Guardado(s)...",
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
                $gua = \App\Log::guardar("Eliminar el colegio con id = " . $id, Session::get('alias'), 'PARAMETROS COLEGIOS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar el colegio con id = " . $id, Session::get('alias'), 'PARAMETROS COLEGIOS');
            }
            $respuesta = \App\Colegio::editarestado($estado, $id, Session::get('alias'));
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function combo()
    {
        if (Auth::check()) {
            $mensaje = "";
            $id = request()->get('id');
            $opcion = request()->get('opcion');
            if ($opcion == "MUN") {
                $conscolegios = \App\Colegio::colegiosMuni($id, Session::get('alias'));
            } else {
                $conscolegios = \App\Colegio::colegiosCorre($id, Session::get('alias'));
            }
            $arrayColegios = [];
            $arrayColegios[] = [
                'value' => 0,
                'texto' => "Ninguno",
            ];
            foreach ($conscolegios as $item) {
                $arrayColegios[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }
            $respuesta = [
                'arrayColegios' => $arrayColegios,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
