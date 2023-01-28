<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use File;

class UnidadesProductivasController extends Controller
{

    public function gestion()
    {
        if (Auth::check()) {

            $busqueda = request()->get('txtbusqueda');
            $unidades = \App\UnidadesProductivas::listar($busqueda, Session::get('alias'));
            if ($unidades) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $unidades->total(),
                        'pagina_actual' => $unidades->currentPage(),
                        'por_pagina' => $unidades->perPage(),
                        'ultima_pagina' => $unidades->lastPage(),
                        'desde' => $unidades->firstItem(),
                        'hasta' => $unidades->lastItem(),
                    ],
                    'unidades' => $unidades,
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

            $arrayEscolaridad = [];
            $consescolaridad = \App\Escolaridad::buscar(Session::get('alias'));
            foreach ($consescolaridad as $item) {
                $arrayEscolaridad[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }
            $codigo = \App\Codigo::guardar(Session::get('alias'), Session::get('sigla'));
            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
                'arrayEscolaridad' => $arrayEscolaridad,
                'codigo' => $codigo,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function guardar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $opcion = request()->get("opcion");
            $data = request()->get("datos");

            $herramientas = request()->get("herramientas");
            $utensilios = request()->get("utensilios");
            $maquinas = request()->get("maquinas");
            $instalaciones = request()->get("instalaciones");
            $medios = request()->get("medios");

            $cultivos_agricolas = request()->get("cultivos_agricolas");
            $explotaciones_pecuarias = request()->get("explotaciones_pecuarias");
            $cultivos_forestales = request()->get("cultivos_forestales");
            // dd($explotaciones_pecuarias);die;
            if ($opcion == "guardar") {
                // dd($data);die;
                $unidades = \App\UnidadesProductivas::guardar($data, Session::get('alias'));
                if ($unidades) {
                    for ($i = 0; $i < count($herramientas); $i++) {
                        $herramientas[$i]['id_unidad'] = $unidades;
                        $res = \App\Herramienta::guardar($herramientas[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($utensilios); $i++) {
                        $utensilios[$i]['id_unidad'] = $unidades;
                        $res = \App\Utensilio::guardar($utensilios[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($maquinas); $i++) {
                        $maquinas[$i]['id_unidad'] = $unidades;
                        $res = \App\Maquinaria::guardar($maquinas[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($instalaciones); $i++) {
                        $instalaciones[$i]['id_unidad'] = $unidades;
                        $res = \App\Instalacion::guardar($instalaciones[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($medios); $i++) {
                        $medios[$i]['id_unidad'] = $unidades;
                        $res = \App\MedioTransporte::guardar($medios[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($cultivos_agricolas); $i++) {
                        $cultivos_agricolas[$i]['id_unidad'] = $unidades;
                        $res = \App\CultivosAgricolas::guardar($cultivos_agricolas[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($explotaciones_pecuarias); $i++) {
                        $explotaciones_pecuarias[$i]['id_unidad'] = $unidades;
                        $res = \App\ExplotacionesPecuarias::guardar($explotaciones_pecuarias[$i], Session::get('alias'));
                    }
                    for ($i = 0; $i < count($cultivos_forestales); $i++) {
                        $cultivos_forestales[$i]['id_unidad'] = $unidades;
                        $res = \App\CultivosForestales::guardar($cultivos_forestales[$i], Session::get('alias'));
                    }
                    $codigo = \App\Codigo::editar2(Session::get('alias'), request()->get("CODIGOGENE"), $unidades, Session::get('sigla'));
                    $respuesta = [
                        'OPC' => 'SI',
                        'IDHOGAR' => $unidades,
                    ];
                    $gua = \App\Log::guardar("Guardar la unidad productiva del productor = " . $data["nom_productor"], Session::get('alias'), 'UNIDADES');
                    return response()->json($respuesta, 200);
                } else {
                    $respuesta = [
                        'OPC' => 'NO',
                        'MENSAJE' => "Unidades Productivas No Guardadas...",
                    ];
                    return response()->json($respuesta, 500);
                }
            } else {
                $id = request()->get("id");
                $unidades = \App\UnidadesProductivas::modificar($data, Session::get('alias'), $id);
                for ($i = 0; $i < count($herramientas); $i++) {
                    $herramientas[$i]['id_unidad'] = $id;
                    $res = \App\Herramienta::guardar($herramientas[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($utensilios); $i++) {
                    $utensilios[$i]['id_unidad'] = $id;
                    $res = \App\Utensilio::guardar($utensilios[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($maquinas); $i++) {
                    $maquinas[$i]['id_unidad'] = $id;
                    $res = \App\Maquinaria::guardar($maquinas[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($instalaciones); $i++) {
                    $instalaciones[$i]['id_unidad'] = $id;
                    $res = \App\Instalacion::guardar($instalaciones[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($medios); $i++) {
                    $medios[$i]['id_unidad'] = $id;
                    $res = \App\MedioTransporte::guardar($medios[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($cultivos_agricolas); $i++) {
                    $cultivos_agricolas[$i]['id_unidad'] = $id;
                    $res = \App\CultivosAgricolas::guardar($cultivos_agricolas[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($explotaciones_pecuarias); $i++) {
                    $explotaciones_pecuarias[$i]['id_unidad'] = $id;
                    $res = \App\ExplotacionesPecuarias::guardar($explotaciones_pecuarias[$i], Session::get('alias'));
                }
                for ($i = 0; $i < count($cultivos_forestales); $i++) {
                    $cultivos_forestales[$i]['id_unidad'] = $id;
                    $res = \App\CultivosForestales::guardar($cultivos_forestales[$i], Session::get('alias'));
                }
                $respuesta = [
                    'OPC' => 'SI',
                    'unidades' => $unidades,
                ];
                $gua = \App\Log::guardar("Editar la unidad productiva del productor = " . $data["nom_productor"], Session::get('alias'), 'UNIDADES');
                return response()->json($respuesta, 200);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
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

            $arrayEscolaridad = [];
            $consescolaridad = \App\Escolaridad::buscar(Session::get('alias'));
            foreach ($consescolaridad as $item) {
                $arrayEscolaridad[] = [
                    'value' => $item->id,
                    'texto' => strtoupper($item->descripcion),
                ];
            }
            $id = request()->get("id");
            $id_hogar = request()->get("id_hogar");
            $unidades = \App\UnidadesProductivas::buscar(Session::get('alias'), $id);
            $codigo = \App\Codigo::buscar2(Session::get('alias'), Session::get('sigla'), $id);
            // $codigo = 1;
            $herramientas = \App\Herramienta::buscar(Session::get('alias'), $id);
            $utensilios = \App\Utensilio::buscar(Session::get('alias'), $id);
            $maquinas = \App\Maquinaria::buscar(Session::get('alias'), $id);
            $instalaciones = \App\Instalacion::buscar(Session::get('alias'), $id);
            $medios = \App\MedioTransporte::buscar(Session::get('alias'), $id);

            $cultivos_agricolas = \App\CultivosAgricolas::buscar(Session::get('alias'), $id);
            $explotaciones_pecuarias = \App\ExplotacionesPecuarias::buscar(Session::get('alias'), $id);
            $cultivos_forestales = \App\CultivosForestales::buscar(Session::get('alias'), $id);

            $respuesta = [
                'arrayDpto' => $arrayDpto,
                'arrayMuni' => $arrayMuni,
                'arrayCorregi' => $arrayCorregi,
                'arrayVeredas' => $arrayVeredas,
                'arrayEscolaridad' => $arrayEscolaridad,
                'codigo' => $codigo,
                'unidades' => $unidades,
                'herramientas' => $herramientas,
                'utensilios' => $utensilios,
                'maquinas' => $maquinas,
                'instalaciones' => $instalaciones,
                'cultivos_agricolas' => $cultivos_agricolas,
                'explotaciones_pecuarias' => $explotaciones_pecuarias,
                'cultivos_forestales' => $cultivos_forestales,
                'medios' => $medios,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminar()
    {
        if (Auth::check()) {
            $id = request()->get("id");
            $ParPost = \App\UnidadesProductivas::editarestado("Inactivo", $id, Session::get('alias'));
            $gua = \App\Log::guardar("Eliminar la unidad productiva con id = " . $id, Session::get('alias'), 'UNIDADES');
            $OPC = "SI";
            $respuesta = [
                'OPC' => $OPC,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/login")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarUnidades(){
        $unidades_productivas = \App\UnidadesProductivas::exportarUnidades(Session::get('alias')); 
        $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
        File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
        $path = public_path().'/'.$ente.'/unidades_productivasPDF';
        File::makeDirectory($path, $mode = 0777, true, true);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('unidades_productivasPDF', [
            'unidades_productivas' => $unidades_productivas,
            'ente' => Auth::user()->permisos->where('actual', 1)->first()->ente->nombre,
        ])->setPaper('a4', 'landscape')->save($ente.'/unidades_productivasPDF/general.pdf');

        $respuesta = [
            'nombre' => $ente.'/unidades_productivasPDF/general.pdf',
        ];
        return response()->json($respuesta, 200);
    }

    public function exportarUnidad(){
        $id = request()->get("id");
        $unidad_productiva = \App\UnidadesProductivas::exportarUnidad(Session::get('alias'), $id); 
        $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
        File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
        $path = public_path().'/'.$ente.'/unidades_productivasPDF';
        File::makeDirectory($path, $mode = 0777, true, true);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('unidad_productivaPDF', [
            'unidad_productiva' => $unidad_productiva,
            'ente' => Auth::user()->permisos->where('actual', 1)->first()->ente->nombre,
        ])->setPaper('a4', 'landscape')->save($ente.'/unidades_productivasPDF/reporte_unidad_'.$id.'.pdf');

        $respuesta = [
            'nombre' => $ente.'/unidades_productivasPDF/reporte_unidad_'.$id.'.pdf',
            'unidad' => $unidad_productiva
        ];
        return response()->json($respuesta, 200);
    }
}
