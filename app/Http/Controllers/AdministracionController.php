<?php

namespace App\Http\Controllers;

use Auth;
use Session;

class AdministracionController extends Controller
{
    public function estadisticas()
    {
        if (Auth::check()) {

            $opcion = request()->get('opcion');
            switch ($opcion) {
                case "PobEnt":
                    $respuesta = \App\User::consultarEnte(Session::get('idusuario'));
                    $totalJefes = \App\Caracterizacion::total(Session::get('alias'));
                    $totalIntegrantes = \App\Integrante::total(Session::get('alias'));
                    $totalEntrevistada = (int) $totalJefes + (int) $totalIntegrantes;
                    // $totalCiclos = \App\Integrante::totalPor(Session::get('alias'));
                    $viviendas = \App\Hogar::total(Session::get('alias'));
                    // dd($hogares);die;
                    $respuesta = [
                        'totalEntrevistada' => $totalEntrevistada,
                        'totalJefes' => $totalJefes,
                        'totalIntegrantes' => $totalIntegrantes,
                        'poblacion' => $respuesta->poblacion,
                        'viviendas' => $respuesta->viviendas,
                        'viviendasVisitados' => $viviendas,
                    ];
                    return response()->json($respuesta, 200);
                    break;
                case "Todos":
                    $respuesta = \App\User::consultarEnte(Session::get('idusuario'));
                    $totalJefes = \App\Caracterizacion::total(Session::get('alias'));
                    $totalIntegrantes = \App\Integrante::total(Session::get('alias'));
                    $totalEntrevistada = (int) $totalJefes + (int) $totalIntegrantes;
                    $viviendas = \App\Hogar::total(Session::get('alias'));
                    // dd($totalVisitada);die;
                    $respuesta = [
                        'totalEntrevistada' => $totalEntrevistada,
                        'totalJefes' => $totalJefes,
                        'totalIntegrantes' => $totalIntegrantes,
                        'poblacion' => $respuesta->poblacion,
                        'viviendas' => $respuesta->viviendas,
                        'viviendasVisitados' => $viviendas,
                    ];
                    return response()->json($respuesta, 200);
                    break;
                case "VivVis":
                    $respuesta = \App\User::consultarEnte(Session::get('idusuario'));
                    $viviendas = \App\Hogar::total(Session::get('alias'));
                    $totalhogares = \App\Caracterizacion::totalHogares(Session::get('alias'));
                    $respuesta = [
                        'viviendas' => $respuesta->viviendas,
                        'viviendasVisitados' => $viviendas,
                        'totalhogares' => $totalhogares,
                    ];
                    return response()->json($respuesta, 200);
                    break;
                case "HogVis":
                    $respuesta = \App\User::consultarEnte(Session::get('idusuario'));
                    $viviendas = \App\Hogar::total(Session::get('alias'));
                    $totalhogares = \App\Caracterizacion::totalHogares(Session::get('alias'));
                    // dd($totalhogares->count());die;
                    $respuesta = [
                        'viviendas' => $respuesta->viviendas,
                        'viviendasVisitados' => $viviendas,
                        'totalhogares' => $totalhogares->count(),
                    ];
                    return response()->json($respuesta, 200);
                    break;
                case "Salud":
                    $respuesta = \App\User::consultarEnte(Session::get('idusuario'));
                    $adolescentes = \App\Integrante::adolEmba(Session::get('alias'));
                    $adulCron = \App\Integrante::adulCron(Session::get('alias'));
                    $adulInfec = \App\Integrante::adulInfec(Session::get('alias'));
                    $gestantes = \App\Integrante::gestantes(Session::get('alias'));
                    // dd($adulCron);die;
                    $respuesta = [
                        'poblacion' => $respuesta->poblacion,
                        'adolescentes' => $adolescentes->count(),
                        'adulCron' => $adulCron->count(),
                        'adulInfec' => $adulInfec->count(),
                        'gestantes' => $gestantes->count(),

                    ];
                    return response()->json($respuesta, 200);
                    break;
                case "Socio":
                    $respuesta = \App\User::consultarEnte(Session::get('idusuario'));
                    $inmigrantes = \App\Integrante::inmigrantes(Session::get('alias'));
                    $desempleados = \App\Integrante::desempleado(Session::get('alias'));
                    $indigenas = \App\Integrante::indigenas(Session::get('alias'));
                    $analfabetas = \App\Integrante::analfabetas(Session::get('alias'));

                    // dd($adulCron);die;
                    $respuesta = [
                        'poblacion' => $respuesta->poblacion,
                        'inmigrantes' => $inmigrantes->count(),
                        'desempleados' => $desempleados->count(),
                        'indigenas' => $indigenas->count(),
                        'analfabetas' => $analfabetas->count(),
                    ];
                    return response()->json($respuesta, 200);
                    break;
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
}
