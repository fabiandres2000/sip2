<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use File;

class EstablecimientosController extends Controller
{
    public function nuevo()
    {
        if (Auth::check()) {
            $consdptos = \App\Dpto::buscarDepartamentos(Session::get('alias'));
            foreach ($consdptos as $item) {
                $arrayDpto[] = [
                    'value' => $item->codigo,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayMuni = [];
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

            $arrayVeredas = [];
            $consveredas = \App\Vereda::buscarVeredas(Session::get('alias'));
            foreach ($consveredas as $item) {
                $arrayVeredas[$item->IDCORRE][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function gestion()
    {
        if (Auth::check()) {

            $busqueda = request()->get('txtbusqueda');
            $establecimientos = \App\Establecimientos::listar($busqueda, Session::get('alias'));
            if ($establecimientos) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $establecimientos->total(),
                        'pagina_actual' => $establecimientos->currentPage(),
                        'por_pagina' => $establecimientos->perPage(),
                        'ultima_pagina' => $establecimientos->lastPage(),
                        'desde' => $establecimientos->firstItem(),
                        'hasta' => $establecimientos->lastItem(),
                    ],
                    'establecimientos' => $establecimientos,
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
            $opcion = request()->get("opcion");
            $data = request()->get("datos");
            $actividad_establecimientos = request()->get("actividad_establecimientos");
            if ($opcion == "guardar") {
                $establecimientos = \App\Establecimientos::guardar($data, Session::get('alias'));
                if ($establecimientos) {
                    for ($i = 0; $i < count($actividad_establecimientos); $i++) {
                        $actividad_establecimientos[$i]['id_establecimiento'] = $establecimientos;
                        $res = \App\ActividadEstablecimiento::guardar($actividad_establecimientos[$i], Session::get('alias'));
                    }
                    $gua = \App\Log::guardar("Guardar el establecimiento  con razón social= " . $data["razon"], Session::get('alias'), 'ESTABLECIMIENTOS');
                }

            } else {
                $id = request()->get("id");
                $establecimientos = \App\Establecimientos::modificar($data, Session::get('alias'), $id);
                for ($i = 0; $i < count($actividad_establecimientos); $i++) {
                    $actividad_establecimientos[$i]['id_establecimiento'] = $id;
                    $res = \App\ActividadEstablecimiento::guardar($actividad_establecimientos[$i], Session::get('alias'));
                }
                $gua = \App\Log::guardar("Editar el establecimiento  con razón social= " . $data["razon"], Session::get('alias'), 'ESTABLECIMIENTOS');
                $establecimientos = true;
            }
            if ($establecimientos) {
                $respuesta = [
                    'OPC' => 'SI',
                    'establecimientos' => $establecimientos,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Establecimiento No Guardado...",
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
            $id = request()->get("id");
            $ParPost = \App\Establecimientos::editarestado("Inactivo", $id, Session::get('alias'));
            $gua = \App\Log::guardar("Eliminar el establecimiento  con id = " . $id, Session::get('alias'), 'ESTABLECIMIENTOS');
            $OPC = "SI";
            $respuesta = [
                'OPC' => $OPC,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function editar()
    {
        if (Auth::check()) {
            $consdptos = \App\Dpto::buscarDepartamentos(Session::get('alias'));
            foreach ($consdptos as $item) {
                $arrayDpto[] = [
                    'value' => $item->codigo,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayMuni = [];
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

            $arrayVeredas = [];
            $consveredas = \App\Vereda::buscarVeredas(Session::get('alias'));
            foreach ($consveredas as $item) {
                $arrayVeredas[$item->IDCORRE][] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $id = request()->get("id");
            $establecimientos = \App\Establecimientos::buscar(Session::get('alias'), $id);
            $actividad_establecimientos = \App\ActividadEstablecimiento::buscar(Session::get('alias'), $id);
            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
                'establecimientos' => $establecimientos,
                'actividad_establecimientos' => $actividad_establecimientos,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarEstablecimientosPDF(){
        $establecimientos = \App\Establecimientos::listar2(Session::get('alias')); 
        $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
        File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
        $path = public_path().'/'.$ente.'/establecimientos';
        File::makeDirectory($path, $mode = 0777, true, true);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('establecimientosPDF', [
            'establecimientos' => $establecimientos,
            'ente' => $ente,
        ])->setPaper('a4', 'landscape')->save($ente.'/establecimientos/general.pdf');

        $respuesta = [
            'nombre' => $ente.'/establecimientos/general.pdf',
        ];
        return response()->json($respuesta, 200);
    }

    public function exportarEstablecimientoPDF(){
        $id = request()->get("id");
        $establecimiento = \App\Establecimientos::buscar2(Session::get('alias'), $id); 
        $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
        File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
        $path = public_path().'/'.$ente.'/establecimientos';
        File::makeDirectory($path, $mode = 0777, true, true);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('establecimientoPDF', [
            'establecimiento' => $establecimiento,
            'ente' => $ente,
        ])->setPaper('a4', 'portrait')->save($ente.'/establecimientos/reporte_'.$id.'.pdf');

        $respuesta = [
            'nombre' => $ente.'/establecimientos/reporte_'.$id.'.pdf',
            'establecimiento' => $establecimiento
        ];
        return response()->json($respuesta, 200);
    }
}
