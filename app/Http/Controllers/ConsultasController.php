<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use File;

class ConsultasController extends Controller
{
    public function viviendas()
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

            $arrayEstado = [];
            $consestado = \App\EstadoCivil::buscar(Session::get('alias'));
            foreach ($consestado as $item) {
                $arrayEstado[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayAdmini = [];
            $consadmini = \App\Administradora::buscarAdministradoras(Session::get('alias'));
            foreach ($consadmini as $item) {
                $arrayAdmini[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->adm_nombre),
                ];
            }

            $arrayEscolaridad = [];
            $consescolaridad = \App\Escolaridad::buscar(Session::get('alias'));
            foreach ($consescolaridad as $item) {
                $arrayEscolaridad[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
                "arrayEstados" => $arrayEstado,
                "arrayAdmini" => $arrayAdmini,
                'arrayEscolaridad' => $arrayEscolaridad,
            ];
            return response()->json($respuesta, 200);
        } else {

        }
    }

    public function viviendaslistar()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $viviendas = \App\Vivienda::listar(Session::get('alias'), $datos, "paginacion");

            foreach ($viviendas as $viv) {
                $viv->animales = \App\Animal::buscar(Session::get('alias'), $viv->id_hogar);
                $viv->actividad = \App\ActividadVivienda::buscar(Session::get('alias'), $viv->id_hogar);
                $viv->estratificacion = \App\Estratificacion::buscar(Session::get('alias'), $viv->id_hogar);
                $viv->jefes = \App\Caracterizacion::buscarJefes(Session::get('alias'), $viv->id_hogar);
                $viv->integrantes = \App\Integrante::buscarIntegrantes(Session::get('alias'), $viv->id_hogar);
            }

            $respuesta = [
                'paginacion' => [
                    'total' => $viviendas->total(),
                    'pagina_actual' => $viviendas->currentPage(),
                    'por_pagina' => $viviendas->perPage(),
                    'ultima_pagina' => $viviendas->lastPage(),
                    'desde' => $viviendas->firstItem(),
                    'hasta' => $viviendas->lastItem(),
                ],
                'viviendas' => $viviendas,
                'data' => $datos,
            ];
            return response()->json($respuesta, 200);
        }
    }

    public function viviendaslistarpdf()
    {
        if (Auth::check()) {
            $datos = request()->all();

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $viviendas = \App\Vivienda::listar(Session::get('alias'), $datos, "todos");
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vista-pdf', ['viviendas' => $viviendas, 'ente'=> $ente])
            ->setPaper('A3', 'landscape')
            ->save($ente.'/viviendas_caracterizadas_consulta.pdf');

            $respuesta = [
                'nombre' => $ente.'/viviendas_caracterizadas_consulta.pdf'
            ];

            return response()->json($respuesta, 200);
        }
    }

    public function jefelistar()
    {
        if (Auth::check()) {
            $datos = request()->all();
            $jefes = \App\Caracterizacion::listarj(Session::get('alias'), $datos, "paginacion");

            foreach ($jefes as $viv) {
                $viv->integrantes = \App\Integrante::buscarIntegrantes(Session::get('alias'), $viv->id_hogar);
            }

            foreach ($jefes as $viv) {
                $viv->jefes = \App\Caracterizacion::buscarJefes(Session::get('alias'), $viv->id_hogar);
            }

            $respuesta = [
                'paginacion' => [
                    'total' => $jefes->total(),
                    'pagina_actual' => $jefes->currentPage(),
                    'por_pagina' => $jefes->perPage(),
                    'ultima_pagina' => $jefes->lastPage(),
                    'desde' => $jefes->firstItem(),
                    'hasta' => $jefes->lastItem(),
                ],
                'jefes' => $jefes,
            ];
            return response()->json($respuesta, 200);

        }
    }

    public function jefeslistarpdf()
    {
        if (Auth::check()) {
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $datos = request()->all();
            //dd($datos);die;
            $jefes = \App\Caracterizacion::listarj(Session::get('alias'), $datos, "todos");
            $nombre = 'lista_integrantes_caracterizados_consulta.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('vista-pdfjefe', ['jefes' => $jefes, 'ente'=> $ente])
            ->setPaper('A3', 'landscape')
            ->save($ente.'/'.$nombre);
            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];
            return response()->json($respuesta, 200);
        }
    }
}
