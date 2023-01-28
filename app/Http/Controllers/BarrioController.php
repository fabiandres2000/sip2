<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use File;

class BarrioController extends Controller
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
            $barrios = \App\Barrio::listar($busqueda, Session::get('alias'));
            if ($barrios) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $barrios->total(),
                        'pagina_actual' => $barrios->currentPage(),
                        'por_pagina' => $barrios->perPage(),
                        'ultima_pagina' => $barrios->lastPage(),
                        'desde' => $barrios->firstItem(),
                        'hasta' => $barrios->lastItem(),
                    ],
                    'barrios' => $barrios,
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
            $data = request()->get("barrios");
            if (request()->get("opcion") == "GUARDAR") {
                foreach ($data as $item) {
                    $dato['dpto'] = $item["dpto"];
                    $dato['muni'] = $item["muni"];
                    $dato['corregimiento'] = $item["corregimiento"];
                    $dato['barrio'] = $item["barrio"];
                    $dato['id'] = $item["id"];
                    $barrios = \App\Barrio::guardar($dato, Session::get('alias'));
                    $gua = \App\Log::guardar("Guardar barrio = " . $item["barrio"], Session::get('alias'), 'PARAMETROS BARRIOS');
                }
            } else {
                $dato['dpto'] = $data["dpto"];
                $dato['muni'] = $data["muni"];
                $dato['corregimiento'] = $data["corregimiento"];
                $dato['barrio'] = $data["barrio"];
                $dato['id'] = $data["id"];
                $barrios = \App\Barrio::guardar($dato, Session::get('alias'));
                $gua = \App\Log::guardar("Editar barrio id = " . $data["id"], Session::get('alias'), 'PARAMETROS BARRIOS');
            }
            if ($barrios) {
                $respuesta = [
                    'OPC' => 'SI',
                    'barrios' => $barrios,
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
                $gua = \App\Log::guardar("Eliminar el barrio con id = " . $id, Session::get('alias'), 'PARAMETROS BARRIOS');
            } else {
                $estado = "Activo";
                $gua = \App\Log::guardar("Activar el barrio con id = " . $id, Session::get('alias'), 'PARAMETROS BARRIOS');
            }
            $respuesta = \App\Barrio::editarestado($estado, $id, Session::get('alias'));
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

            //para llenar combo de riesgos ambientales
            if($id == null){
                $id = Auth::user()->permisos->where('actual', 1)->first()->ente->id_mun;
            }
            ///////////////////////////////////////////
            $opcion = request()->get('opcion');
            $consbarrios = "";
            if ($opcion == "MUN") {
                $consbarrios = \App\Barrio::barriosMuni($id, Session::get('alias'));
            }
            if ($opcion == "CORRE") {
                $consbarrios = \App\Barrio::barriosCorre($id, Session::get('alias'));
            }
            $arrayBarrios = [];
            if ($consbarrios != "") {
                foreach ($consbarrios as $item) {
                    $arrayBarrios[] = [
                        'value' => $item->id,
                        'texto' => strtoupper($item->barrio),
                    ];
                }
            }
            $respuesta = [
                'arrayBarrios' => $arrayBarrios,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportar()
    {
        if (Auth::check()) {

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
            $datos = request()->all();
            $busqueda = request()->get('txtbusqueda');
            $barrios = \App\Barrio::listar2($busqueda, Session::get('alias'));
            $nombre = 'barrios.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Barrios/pdf', [
                'barrios' => $barrios,
                'ente'=> $ente
            ])->setPaper('letter', 'portrait')
            ->save($ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
                'barrios' => $barrios
            ];
            return response()->json($respuesta, 200);
        }
    }
}
