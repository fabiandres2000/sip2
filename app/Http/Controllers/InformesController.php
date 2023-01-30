<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use File;

class InformesController extends Controller
{
    public function migrantes()
    {
        if (Auth::check()) {
            $datos = request()->all();
            
            $ocupaciones = \App\Informes::ocupacionesMigrantes(Session::get('alias'));
            $total_migrantes = \App\Informes::poblacionMigrante(Session::get('alias'));
            $total_poblacion = \App\Informes::poblacionTotal(Session::get('alias'));
            $total_regulado = \App\Informes::reguladoMigrante(Session::get('alias'));
            $total_no_regulado = \App\Informes::noReguladoMigrante(Session::get('alias'));

            $migrantes0 = \App\Informes::migrantes0(Session::get('alias'));
            $migrantes115 = \App\Informes::migrantes115(Session::get('alias'));
            $migrantes611 = \App\Informes::migrantes611(Session::get('alias'));
            $migrantes1217 = \App\Informes::migrantes1217(Session::get('alias'));
            $migrantes1828 = \App\Informes::migrantes1828(Session::get('alias'));
            $migrantes2959 = \App\Informes::migrantes2959(Session::get('alias'));
            $migrantes60 = \App\Informes::migrantes60(Session::get('alias'));

            $paises = \App\Informes::principalespaises(Session::get('alias'));

            /////////////MIGRANTES POR SEXO Y GRUPO DE EDAD//////////////////////
            $migrantesM0 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",0,0);
            $migrantesM15 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",1,5);
            $migrantesM611 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",6,11);
            $migrantesM1217 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",12,17);
            $migrantesM1828 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",18,28);
            $migrantesM2959 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",29,59);
            $migrantesM60 = \App\Informes::migrantessexo(Session::get('alias'),"MASCULINO",60,120);

            $migrantesF0 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",0,0);
            $migrantesF15 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",1,5);
            $migrantesF611 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",6,11);
            $migrantesF1217 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",12,17);
            $migrantesF1828 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",18,28);
            $migrantesF2959 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",29,59);
            $migrantesF60 = \App\Informes::migrantessexo(Session::get('alias'),"FEMENINO",60,120);


            //////////////////////ENFERMEDADES MIGRANTES//////////////////////////

            $enfermedades = \App\Informes::enfermedadesMigrantes(Session::get('alias'));

            ///////MIGRENTEAS AFILIADOS

            $migrantes_afiliados = \App\Informes::migrantesafiliacion(Session::get('alias'),"TODOS");
            $migrantes_sin_afiliacion = \App\Informes::migrantesafiliacion(Session::get('alias'),"NINGUNA");

            //dd($enfermedades);die;

           // dd($paises);die;

            $respuesta = [
                "total_migrantes" => $total_migrantes,
                "total_poblacion" => $total_poblacion,
                "total_regulado" => $total_regulado,
                "total_no_regulado" => $total_no_regulado,
                "edades" => [
                    "migrantes0" => $migrantes0,
                    "migrantes115" => $migrantes115,
                    "migrantes611" => $migrantes611,
                    "migrantes1217" => $migrantes1217,
                    "migrantes1828" => $migrantes1828,
                    "migrantes2959" => $migrantes2959,
                    "migrantes60" => $migrantes60,
                ],
                "ocupaciones" => $ocupaciones,
                "paises" => $paises,
                "enfermedades" => $enfermedades,
                "sexo"  => [
                    "m_0" => $migrantesM0*-1,
                    "m_15" => $migrantesM15*-1,
                    "m_611" => $migrantesM611*-1,
                    "m_1217" => $migrantesM1217*-1,
                    "m_1828" => $migrantesM1828*-1,
                    "m_2959" => $migrantesM2959*-1,
                    "m_60" => $migrantesM60*-1,
                    "f_0" => $migrantesF0,
                    "f_15" => $migrantesF15,
                    "f_611" => $migrantesF611,
                    "f_1217" => $migrantesF1217,
                    "f_1828" => $migrantesF1828,
                    "f_2959" => $migrantesF2959,
                    "f_60" => $migrantesF60,
                ],
                "afiliaciones" => [
                    "afiliados" => $migrantes_afiliados,
                    "no_afiliados" => $migrantes_sin_afiliacion
                ]
                
            ];
            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function poblacion_no_asegurada(){
        if (Auth::check()) {
            $no_asegurado_menor_5 = \App\Informes::no_asegurado_menor_5(Session::get('alias'));
            $no_asegurado_mayor_60 = \App\Informes::no_asegurado_mayor_60(Session::get('alias'));

            $respuesta = [
                "no_asegurado_menor_5" => $no_asegurado_menor_5,
                "no_asegurado_mayor_60" => $no_asegurado_mayor_60,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function determinante_salud(){
        if (Auth::check()) {
            $poblacion_pobreza = \App\Informes::pobreza(Session::get('alias'));
            $escolaridad = \App\Informes::por_nivel_escolaridad(Session::get('alias'));
            $desempleo = \App\Informes::desempleo(Session::get('alias'));
            $alcantarillado_agua = \App\RiesgosAmbientalesEstadistica::PorcentajesGeneral(Session::get('alias'));

            $respuesta = [
                "pobreza" => $poblacion_pobreza,
                "escolaridad" => $escolaridad,
                "desempleo" => $desempleo,
                "alcantarillado_agua" => $alcantarillado_agua,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function condiciones_salud(){
        if (Auth::check()) {
            $enfermedades_cronicas = \App\Informes::enfermedades_cronicas(Session::get('alias'));
            $enfermedades_infecciosas = \App\Informes::enfermedades_infecciosas(Session::get('alias'));
            $personas_discapacidad = \App\Informes::personas_discapacidad(Session::get('alias'));
            $adolescentes_embarazo = \App\Informes::adolescentes_embarazo(Session::get('alias'));
            $inmunizacion = \App\Informes::inmunizacion(Session::get('alias'));

            $nutricion_0_5 =  \App\Informes::nutricion_0_5(Session::get('alias'));
            $nutricion_5_17 =  \App\Informes::nutricion_5_17(Session::get('alias'));
            $nutricion_18_60 =  \App\Informes::nutricion_18_60(Session::get('alias'));
           
            $respuesta = [
                "enfermedades_cronicas" => $enfermedades_cronicas,
                "enfermedades_infecciosas" => $enfermedades_infecciosas,
                "personas_discapacidad" => $personas_discapacidad,
                "adolescentes_embarazo" => $adolescentes_embarazo,
                "inmunizacion" => $inmunizacion,
                "nutricion" => [
                    "nutricion_0_5" => $nutricion_0_5,
                    "nutricion_5_17" => $nutricion_5_17,
                    "nutricion_18_60" => $nutricion_18_60,
                ]
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarGeneralSalud() {
        if (Auth::check()) {

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'General-Salud-Poblacional.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('informes/generalSalud', [
                'ente' => $ente, 
                'poblacion_array' => request()->get('poblacion_array'),
                'poblacion_no_asegurada' => request()->get('poblacion_no_asegurada'),
                'chart_torta_edades' => request()->get('chart_torta_edades'),
                'chart_no_asegurado_1' => request()->get('chart_no_asegurado_1'),
                'chart_no_asegurado_2' => request()->get('chart_no_asegurado_2'),
                'determinante_salud_array' => request()->get('determinante_salud_array'),
                'chart_poblacion_pobreza' => request()->get('chart_poblacion_pobreza'),
                'chart_escolaridad' => request()->get('chart_escolaridad'),
                'chart_desempleo' => request()->get('chart_desempleo'),
                'chart_acueducto' => request()->get('chart_acueducto'),
                'chart_alcantarillado' => request()->get('chart_alcantarillado'),
                'condiciones_salud_array' => request()->get('condiciones_salud_array'),
                'chart_cronica' => request()->get('chart_cronica'),
                'chart_infecciosa' => request()->get('chart_infecciosa'),
                'chart_discapacidad' => request()->get('chart_discapacidad'),
                'chart_embarazo' => request()->get('chart_embarazo'),
                'chart_inmunizacion' => request()->get('chart_inmunizacion'),
                'chart_peso_para_talla' => request()->get('chart_peso_para_talla'),
                'chart_talla_para_edad' => request()->get('chart_talla_para_edad'),
                'chart_imc' => request()->get('chart_imc'),
                'chart_imc_5_17' => request()->get('chart_imc_5_17'),
                'chart_imc_5_17_e' => request()->get('chart_imc_5_17_e'),
                'chart_imc_18_60' => request()->get('chart_imc_18_60'),
                'chart_imc_18_60_e' => request()->get('chart_imc_18_60_e'),
            ])->setPaper('a4', 'portrait')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function riesgos_salud(){
        if (Auth::check()) {

            $alteraciones_transtornos_audicion = \App\Informes::riesgos_salud(Session::get('alias'), "alteraciones_transtornos_audicion");
            $alteraciones_transtornos_visuales = \App\Informes::riesgos_salud(Session::get('alias'), "alteraciones_transtornos_visuales");
            $cancer = \App\Informes::riesgos_salud(Session::get('alias'), "cancer");
            $consumo_spa = \App\Informes::riesgos_salud(Session::get('alias'), "consumo_spa");
            $enfermedad_cardiovascular = \App\Informes::riesgos_salud(Session::get('alias'), "enfermedad_cardiovascular");
            $enfermedades_infecciosas =  \App\Informes::riesgos_salud(Session::get('alias'), "enfermedades_infecciosas");
            $enfermedades_respiratorias =  \App\Informes::riesgos_salud(Session::get('alias'), "enfermedades_respiratorias");
            $enfermedades_zoonoticas =  \App\Informes::riesgos_salud(Session::get('alias'), "enfermedades_zoonoticas");
            $problemas_salud_mental = \App\Informes::riesgos_salud(Session::get('alias'), "problemas_salud_mental");
            $riesgo_delgadez = \App\Informes::riesgos_salud(Session::get('alias'), "riesgo_delgadez");
            $riesgo_muerte = \App\Informes::riesgos_salud(Session::get('alias'), "riesgo_muerte");
            $riesgo_sobrepeso = \App\Informes::riesgos_salud(Session::get('alias'), "riesgo_sobrepeso");
            $riesgo_talla_baja = \App\Informes::riesgos_salud(Session::get('alias'), "riesgo_talla_baja");
            $riesgos_desnutricion_aguda =  \App\Informes::riesgos_salud(Session::get('alias'), "riesgos_desnutricion_aguda");
            $riesgos_desnutricion_global =  \App\Informes::riesgos_salud(Session::get('alias'), "riesgos_desnutricion_global");
            $salud_bucal =  \App\Informes::riesgos_salud(Session::get('alias'), "salud_bucal");
            $transtornos_asociados_spa = \App\Informes::riesgos_salud(Session::get('alias'), "transtornos_asociados_spa");
            $transtornos_degenartivos =  \App\Informes::riesgos_salud(Session::get('alias'), "transtornos_degenartivos");
            $violencias =  \App\Informes::riesgos_salud(Session::get('alias'), "violencias");
          
            $respuesta = [
                "alteraciones_transtornos_audicion" => $alteraciones_transtornos_audicion,
                "alteraciones_transtornos_visuales" => $alteraciones_transtornos_visuales,
                "cancer" => $cancer,
                "consumo_spa" => $consumo_spa,
                "enfermedad_cardiovascular" => $enfermedad_cardiovascular,
                "enfermedades_infecciosas" => $enfermedades_infecciosas,
                "enfermedades_respiratorias" => $enfermedades_respiratorias,
                "enfermedades_zoonoticas" => $enfermedades_zoonoticas,
                "problemas_salud_mental" => $problemas_salud_mental,
                "riesgo_delgadez" => $riesgo_delgadez,
                "riesgo_muerte" => $riesgo_muerte,
                "riesgo_sobrepeso" => $riesgo_sobrepeso,
                "riesgo_talla_baja" => $riesgo_talla_baja,
                "riesgos_desnutricion_aguda" => $riesgos_desnutricion_aguda,
                "riesgos_desnutricion_global" => $riesgos_desnutricion_global,
                "salud_bucal" => $salud_bucal,
                "transtornos_asociados_spa" => $transtornos_asociados_spa,
                "transtornos_degenartivos" => $transtornos_degenartivos,
                "violencias" => $violencias
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

}
