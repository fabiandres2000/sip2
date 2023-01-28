<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class IndicadoresController extends Controller
{
    public function calcular()
    {
        if (Auth::check()) {
            $data = request()->all();
            $nro_mujeres_embarazadas = \App\Indicadores::mujeres_embarazadas(Session::get('alias'));
            $nro_adolescentes_embarazadas = \App\Indicadores::adolescentes_embarazadas(Session::get('alias'));
            $nro_adolescentes_desescolarizadas = \App\Indicadores::adolescentes_desescolarizadas(Session::get('alias'));
            $nro_adolescentes_lactantes = \App\Indicadores::adolescentes_lactantes(Session::get('alias'));
            $embarazos_vih = \App\Indicadores::embarazos_vih(Session::get('alias'));
            $adolescentes_violencia = \App\Indicadores::adolescentes_violencia(Session::get('alias'));
            $ninos_violencia = \App\Indicadores::ninos_violencia(Session::get('alias'));
            $poblacion_sin_eps = \App\Indicadores::poblacion_sin_eps(Session::get('alias'));

            ////// % DE ATENCION PRENATAL

            $nro_atencion_prenatal = \App\Indicadores::atencion_prenatal(Session::get('alias'));
            $nro_gestantes = \App\Indicadores::total_gestantes(Session::get('alias'));
            $sin_atencion_prenatal = \App\Indicadores::sin_atencion_prenatal(Session::get('alias'));

            $porcentaje_atencion_prenatal = ($nro_atencion_prenatal / $nro_gestantes) * 100;
            $porcentaje_sin_atencion_prenatal = ($sin_atencion_prenatal * 100) / $nro_gestantes;
            $razon_gestantes_sin_atencion_prental = $sin_atencion_prenatal / $nro_atencion_prenatal;

            $respuesta = [
                'cantidades' => [
                    'nro_mujeres_embarazadas' => $nro_mujeres_embarazadas,
                    'nro_adolescentes_embarazadas' => $nro_adolescentes_embarazadas,
                    'nro_adolescentes_desescolarizadas' => $nro_adolescentes_desescolarizadas,
                    'nro_adolescentes_lactantes' => $nro_adolescentes_lactantes,
                    'embarazos_vih' => $embarazos_vih,
                    'adolescentes_violencia' => $adolescentes_violencia,
                    'ninos_violencia' => $ninos_violencia,
                    'poblacion_sin_eps' => $poblacion_sin_eps,
                    'porcentaje_atencion_prenatal' => $porcentaje_atencion_prenatal,
                    'porcentaje_sin_atencion_prenatal' => $porcentaje_sin_atencion_prenatal,
                    'razon_gestantes_sin_atencion_prental' => $razon_gestantes_sin_atencion_prental,
                ],
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function gestantes()
    {
        if (Auth::check()) {
            $data = request()->all();
            $nro_mujeres_embarazadas = \App\Indicadores::mujeres_embarazadas(Session::get('alias'));
            $total_mujeres = \App\Reportes::poblacionTotalMujeres(Session::get('alias'));
            $nro_adolescentes_embarazadas = \App\Indicadores::adolescentes_embarazadas(Session::get('alias'));
            $nro_adolescentes_desescolarizadas = \App\Indicadores::adolescentes_desescolarizadas(Session::get('alias'));
            $nro_adolescentes_lactantes = \App\Indicadores::adolescentes_lactantes(Session::get('alias'));
            $embarazos_vih = \App\Indicadores::embarazos_vih(Session::get('alias'));

            $nro_embarazos_rural_10 = \App\Indicadores::embarazos_edad(Session::get('alias'), 10, "rural");

            $nro_embarazos_rural_11 = \App\Indicadores::embarazos_edad(Session::get('alias'), 11, "rural");
            $nro_embarazos_rural_12 = \App\Indicadores::embarazos_edad(Session::get('alias'), 12, "rural");
            $nro_embarazos_rural_13 = \App\Indicadores::embarazos_edad(Session::get('alias'), 13, "rural");
            $nro_embarazos_rural_14 = \App\Indicadores::embarazos_edad(Session::get('alias'), 14, "rural");
            $nro_embarazos_rural_15 = \App\Indicadores::embarazos_edad(Session::get('alias'), 15, "rural");
            $nro_embarazos_rural_16 = \App\Indicadores::embarazos_edad(Session::get('alias'), 16, "rural");
            $nro_embarazos_rural_17 = \App\Indicadores::embarazos_edad(Session::get('alias'), 17, "rural");

            $nro_embarazos_urbano_10 = \App\Indicadores::embarazos_edad(Session::get('alias'), 10, "urbano");
            $nro_embarazos_urbano_11 = \App\Indicadores::embarazos_edad(Session::get('alias'), 11, "urbano");
            $nro_embarazos_urbano_12 = \App\Indicadores::embarazos_edad(Session::get('alias'), 12, "urbano");
            $nro_embarazos_urbano_13 = \App\Indicadores::embarazos_edad(Session::get('alias'), 13, "urbano");
            $nro_embarazos_urbano_14 = \App\Indicadores::embarazos_edad(Session::get('alias'), 14, "urbano");
            $nro_embarazos_urbano_15 = \App\Indicadores::embarazos_edad(Session::get('alias'), 15, "urbano");
            $nro_embarazos_urbano_16 = \App\Indicadores::embarazos_edad(Session::get('alias'), 16, "urbano");
            $nro_embarazos_urbano_17 = \App\Indicadores::embarazos_edad(Session::get('alias'), 17, "urbano");

            ////////////EMBARAZOS MULTIPLES
            $nro_multiples_rural_510 = \App\Indicadores::multiple_rural_510(Session::get('alias'));
            $nro_multiples_rural_1117 = \App\Indicadores::multiple_rural_1117(Session::get('alias'));
            $nro_multiples_rural_1828 = \App\Indicadores::multiple_rural_1828(Session::get('alias'));
            $nro_multiples_rural_2959 = \App\Indicadores::multiple_rural_2959(Session::get('alias'));

            $nro_multiples_urbano_510 = \App\Indicadores::multiple_urbano_510(Session::get('alias'));
            $nro_multiples_urbano_1117 = \App\Indicadores::multiple_urbano_1117(Session::get('alias'));
            $nro_multiples_urbano_1828 = \App\Indicadores::multiple_urbano_1828(Session::get('alias'));
            $nro_multiples_urbano_2959 = \App\Indicadores::multiple_urbano_2959(Session::get('alias'));

            ////// % DE ATENCION PRENATAL

            $nro_atencion_prenatal = \App\Indicadores::atencion_prenatal(Session::get('alias'));
            $nro_atencion_prenatal_jefes = \App\Indicadores::atencion_prenatal_jefe(Session::get('alias'));
            $nro_atencion_prenatal = $nro_atencion_prenatal + $nro_atencion_prenatal_jefes;
            $nro_gestantes = \App\Indicadores::total_gestantes(Session::get('alias'));
            $nro_gestantes_jefe = \App\Indicadores::total_gestantes_jefes(Session::get('alias'));
            $sin_atencion_prenatal = \App\Indicadores::sin_atencion_prenatal(Session::get('alias'));
            $nro_gestantes = $nro_gestantes + $nro_gestantes_jefe;

            $porcentaje_atencion_prenatal = ($nro_atencion_prenatal / $nro_gestantes) * 100;
            $grupo_510 = \App\Indicadores::grupo_510(Session::get('alias'));
            $grupo_1117 = \App\Indicadores::grupo_1117(Session::get('alias'));
            $grupo_1828 = \App\Indicadores::grupo_1828(Session::get('alias'));
            $grupo_2959 = \App\Indicadores::grupo_2959(Session::get('alias'));

            $gestantes_grupo_510 = \App\Indicadores::gestantes_grupo_510(Session::get('alias'));
            $gestantes_grupo_1117 = \App\Indicadores::gestantes_grupo_1117(Session::get('alias'));
            $gestantes_grupo_1828 = \App\Indicadores::gestantes_grupo_1828(Session::get('alias'));
            $gestantes_grupo_2959 = \App\Indicadores::gestantes_grupo_2959(Session::get('alias'));

            $razon_gestantes_sin_atencion_prental = $sin_atencion_prenatal / $nro_atencion_prenatal;

/////////////GESTANTES CON ENFERMEDADES//////////////////////
            $enfermedades_510 = \App\Indicadores::gestantesenfermedades(Session::get('alias'), 6, 11);
            $enfermedades_1117 = \App\Indicadores::gestantesenfermedades(Session::get('alias'), 12, 17);
            $enfermedades_1828 = \App\Indicadores::gestantesenfermedades(Session::get('alias'), 18, 28);
            $enfermedades_2959 = \App\Indicadores::gestantesenfermedades(Session::get('alias'), 29, 59);

///////GESTANTES AFILIADOS

            $gestantes_afiliados = \App\Indicadores::gestantes_afiliacion(Session::get('alias'), "TODOS");
            $gestantes_sin_afiliacion = \App\Indicadores::gestantes_afiliacion(Session::get('alias'), "NINGUNA");
//$gestantes_afiliados_grupos = \App\Indicadores::gestantes_afiliacion_grupos(Session::get('alias'),"TODOS");
            //$gestantes_sin_afiliacion_grupos = \App\Indicadores::gestantes_afiliacion_grupos(Session::get('alias'),"NINGUNA");
            $por_afiliacion = (100 * $gestantes_afiliados) / ($gestantes_afiliados + $gestantes_sin_afiliacion);
            $por_sin_afiliacion = (100 * $gestantes_sin_afiliacion) / ($gestantes_afiliados + $gestantes_sin_afiliacion);

            $no_aplica = \App\Indicadores::afiliacion_tipo_sin(Session::get('alias'), "NA");
            $PPNA = \App\Indicadores::afiliacion_tipo_sin(Session::get('alias'), "PPNA");
            $ND = \App\Indicadores::afiliacion_tipo_sin(Session::get('alias'), "ND");

            $subsidiado = \App\Indicadores::afiliacion_tipo_con(Session::get('alias'), "SUBSIDIADO");
            $contributivo = \App\Indicadores::afiliacion_tipo_con(Session::get('alias'), "CONTRIBUTIVO");
            $especial = \App\Indicadores::afiliacion_tipo_con(Session::get('alias'), "ESPECIAL");
            $beneficiario = \App\Indicadores::afiliacion_tipo_con(Session::get('alias'), "BENEFICIARIO");

            $atendidas = \App\Indicadores::enfermedadedesatendidas(Session::get('alias'), "SI", "TODAS");
            $noatendidas = \App\Indicadores::enfermedadedesatendidas(Session::get('alias'), "NO", "TODAS");

            $atendidas_cronicas = \App\Indicadores::enfermedadedesatendidas(Session::get('alias'), "SI", "Cronica");
            $atendidas_infecciosas = \App\Indicadores::enfermedadedesatendidas(Session::get('alias'), "SI", "Infecciosa");
            $noatendidas_cronicas = \App\Indicadores::enfermedadedesatendidas(Session::get('alias'), "NO", "TODAS");
            $noatendidas_infecciosas = \App\Indicadores::enfermedadedesatendidas(Session::get('alias'), "NO", "TODAS");

            $enfermedades_atendidas = array();
            $enfermedades_noatendidas = array();
            $enfermedades_gestantes = array();

            $porcentajes_cronicas = 0;
            $porcentajes_infecciosas = 0;
            if (($atendidas_cronicas + $atendidas_infecciosas) > 0) {
                $porcentajes_cronicas = (100 * $atendidas_cronicas) / ($atendidas_cronicas + $atendidas_infecciosas);
                $porcentajes_infecciosas = (100 * $atendidas_infecciosas) / ($atendidas_cronicas + $atendidas_infecciosas);
            }

            array_push(
                $enfermedades_atendidas,
                array(
                    "type" => "Crónicas",
                    "percent" => $porcentajes_cronicas,
                ),
                array(
                    "type" => "Infecciosas",
                    "percent" => $porcentajes_infecciosas,
                )
            );

            $porcentajes_cronicas = 0;
            $porcentajes_infecciosas = 0;
            if (($noatendidas_cronicas + $noatendidas_infecciosas) > 0) {
                $porcentajes_cronicas = (100 * $noatendidas_cronicas) / ($noatendidas_cronicas + $noatendidas_infecciosas);
                $porcentajes_infecciosas = (100 * $noatendidas_infecciosas) / ($noatendidas_cronicas + $noatendidas_infecciosas);
            }

            array_push(
                $enfermedades_noatendidas,
                array(
                    "type" => "Crónicas",
                    "percent" => $porcentajes_cronicas,
                ),
                array(
                    "type" => "Infecciosas",
                    "percent" => $porcentajes_infecciosas,
                )
            );

            $porcentajes_atendidos = 0;
            $porcentajes_noatendidos = 0;
            if (($atendidas + $noatendidas) > 0) {
                $porcentajes_atendidos = (100 * $atendidas) / ($atendidas + $noatendidas);
                $porcentajes_noatendidos = (100 * $noatendidas) / ($atendidas + $noatendidas);
            }

            array_push(
                $enfermedades_gestantes,
                array(
                    'type' => "Atendidos",
                    "percent" => $porcentajes_atendidos,
                    "subs" => $enfermedades_atendidas,
                ),
                array(
                    "type" => "No atendidos",
                    "percent" => $porcentajes_noatendidos,
                    "subs" => $enfermedades_noatendidas,
                )
            );

//////////FIN ENFERMEDADES///////////

            $name1 = array();

            array_push($name1, array(
                "name" => "No aplica",
                "value" => $no_aplica,
            ),
                array(
                    "name" => "Pobre no asegurada",
                    "value" => $PPNA,
                ),
                array(
                    "name" => "No declara",
                    "value" => $ND,
                ),
            );

            $name2 = array();
            array_push($name2, array(
                "name" => "Subsidiado",
                "value" => $subsidiado,
            ),
                array(
                    "name" => "Contributivo",
                    "value" => $contributivo,
                ),
                array(
                    "name" => "Especial",
                    "value" => $especial,
                ),
                array(
                    "name" => "Beneficiario",
                    "value" => $beneficiario,
                ),
            );

            $afiliacion = array();

            array_push(
                $afiliacion,
                array(
                    'country' => "Afiliados",
                    "litres" => $gestantes_afiliados,
                    "subData" => $name2,
                ),
                array(
                    "country" => "No afiliados",
                    "litres" => $gestantes_sin_afiliacion,
                    "subData" => $name1,
                )
            );

            $porcentaje_subsidiados = 0;
            $porcentaje_contributivo = 0;
            $porcentaje_beneficiario = 0;
            $porcentaje_especial = 0;

            if ($subsidiado + $beneficiario + $especial + $contributivo > 0) {
                $porcentaje_subsidiados = ($subsidiado * 100) / ($subsidiado + $beneficiario + $especial + $contributivo);
                $porcentaje_contributivo = ($contributivo * 100) / ($subsidiado + $beneficiario + $especial + $contributivo);
                $porcentaje_beneficiario = ($beneficiario * 100) / ($subsidiado + $beneficiario + $especial + $contributivo);
                $porcentaje_especial = ($especial * 100) / ($subsidiado + $beneficiario + $especial + $contributivo);
            }

            $respuesta = [
                'cantidades' => [
                    'nro_mujeres_embarazadas' => $nro_mujeres_embarazadas,
                    'porcentaje_embarazadas' => round(($nro_mujeres_embarazadas * 100) / $total_mujeres, 2),
                    'nro_adolescentes_embarazadas' => $nro_adolescentes_embarazadas,
                    'nro_adolescentes_desescolarizadas' => $nro_adolescentes_desescolarizadas,
                    'nro_adolescentes_lactantes' => $nro_adolescentes_lactantes,
                    'embarazos_vih' => $embarazos_vih,
                    'porcentaje_atencion_prenatal' => $porcentaje_atencion_prenatal,
                    'razon_gestantes_sin_atencion_prental' => $razon_gestantes_sin_atencion_prental,
                    'nro_gestantes' => $nro_gestantes,
                    'grupo_510' => $grupo_510,
                    'grupo_1117' => $grupo_1117,
                    'grupo_1828' => $grupo_1828,
                    'grupo_2959' => $grupo_2959,
                    'gestantes_grupo_510' => $gestantes_grupo_510,
                    'gestantes_grupo_1117' => $gestantes_grupo_1117,
                    'gestantes_grupo_1828' => $gestantes_grupo_1828,
                    'gestantes_grupo_2959' => $gestantes_grupo_2959,

                ],
                'zona' => [
                    'rural_10' => $nro_embarazos_rural_10 * -1,
                    'rural_11' => $nro_embarazos_rural_11 * -1,
                    'rural_12' => $nro_embarazos_rural_12 * -1,
                    'rural_13' => $nro_embarazos_rural_13 * -1,
                    'rural_14' => $nro_embarazos_rural_14 * -1,
                    'rural_15' => $nro_embarazos_rural_15 * -1,
                    'rural_16' => $nro_embarazos_rural_16 * -1,
                    'rural_17' => $nro_embarazos_rural_17 * -1,
                    'urbana_10' => $nro_embarazos_urbano_10,
                    'urbana_11' => $nro_embarazos_urbano_11,
                    'urbana_12' => $nro_embarazos_urbano_12,
                    'urbana_13' => $nro_embarazos_urbano_13,
                    'urbana_14' => $nro_embarazos_urbano_14,
                    'urbana_15' => $nro_embarazos_urbano_15,
                    'urbana_16' => $nro_embarazos_urbano_16,
                    'urbana_17' => $nro_embarazos_urbano_17,
                ],
                'multiples' => [
                    'rural_510' => $nro_multiples_rural_510 * -1,
                    'rural_1117' => $nro_multiples_rural_1117 * -1,
                    'rural_1828' => $nro_multiples_rural_1828 * -1,
                    'rural_2959' => $nro_multiples_rural_2959 * -1,
                    'urbana_510' => $nro_multiples_urbano_510,
                    'urbana_1117' => $nro_multiples_urbano_1117,
                    'urbana_1828' => $nro_multiples_urbano_1828,
                    'urbana_2959' => $nro_multiples_urbano_2959,
                ],
                "afiliacion" => $afiliacion,
                "datosAfiliacion" => [
                    'porcentaje_afiliados' => $por_afiliacion,
                    "porcentaje_no_afiliados" => $por_sin_afiliacion,
                    "porcentaje_subsidiados" => $porcentaje_subsidiados,
                    "porcentaje_contributivo" => $porcentaje_contributivo,
                    "porcentaje_beneficiario" => $porcentaje_beneficiario,
                    "porcentaje_especial" => $porcentaje_especial,
                ],
                "enfermedades" => [
                    'grupo_510' => $enfermedades_510,
                    'grupo_1117' => $enfermedades_1117,
                    'grupo_1828' => $enfermedades_1828,
                    'grupo_2959' => $enfermedades_2959,
                ],
                "enfermedades_grupo" => $enfermedades_gestantes,
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function spa()
    {
        if (Auth::check()) {
            $data = request()->all();
            $total_consumidores = 0;
            $adolescentes_consumidores = 0;
            $ninos_consumidores = 0;
            $gestantes_consumidores = \App\Indicadores::gestantes_consumidores(Session::get('alias'));
            //$embarazos_vih = \App\Indicadores::embarazos_vih(Session::get('alias'));
            $grupo_611_hombre = \App\Indicadores::total_consumidores_integrantes_masculinos_6_11(Session::get('alias'));
            $grupo_611_mujeres = \App\Indicadores::total_consumidores_integrantes_femeninos_6_11(Session::get('alias'));

            $grupo_1217_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_12_17_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_masculinos_12_17_jefe(Session::get('alias'));
            $grupo_1217_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_12_17_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_femeninos_12_17_jefe(Session::get('alias'));

            $grupo_1828_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_18_28_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_masculinos_18_28_jefe(Session::get('alias'));
            $grupo_1828_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_18_28_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_femeninos_18_28_jefe(Session::get('alias'));

            $grupo_2959_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_29_59_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_masculinos_29_59_jefe(Session::get('alias'));
            $grupo_2959_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_29_59_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_femeninos_29_59_jefe(Session::get('alias'));

            $grupo_60_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_60_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_masculinos_60_jefe(Session::get('alias'));
            $grupo_60_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_60_integrantes(Session::get('alias'))+\App\Indicadores::total_consumidores_integrantes_femeninos_60_jefe(Session::get('alias'));
            ////// % DE ATENCION PRENATAL
            $total_consumidores = $grupo_611_hombre + $grupo_611_mujeres + $grupo_1217_hombres + $grupo_1217_femeninos + $grupo_1828_hombres + $grupo_1828_femeninos + $grupo_2959_femeninos + $grupo_2959_hombres + $grupo_60_femeninos + $grupo_60_hombres;
            $adolescentes_consumidores = $grupo_1217_hombres + $grupo_1217_femeninos;
            $ninos_consumidores = $grupo_611_hombre + $grupo_611_mujeres;

            $total_poblacion = 0;
            $total_integrantes = \App\Indicadores::total_integrantes(Session::get('alias'));
            $total_jefes = \App\Indicadores::total_jefes(Session::get('alias'));
            $total_poblacion = $total_integrantes + $total_jefes;

            //dd(\App\Indicadores::total_gestantes_spa_jefe(Session::get('alias')));die;

            $gestantes_consumidores = \App\Indicadores::total_gestantes_spa_integrantes(Session::get('alias'))+\App\Indicadores::total_gestantes_spa_jefe(Session::get('alias'));

            $respuesta = [
                'cantidades' => [
                    'total_consumidores' => $total_consumidores * 1,
                    'porcentaje_consumidores' => round(($total_consumidores * 100) / $total_poblacion, 2),
                    'adolescentes_consumidores' => $adolescentes_consumidores,
                    'ninos_consumidores' => $ninos_consumidores,
                    'gestantes_consumidores' => $gestantes_consumidores,
                    'grupo_611_hombres' => round(($grupo_611_hombre * 100) / $total_poblacion, 2) * -1,
                    'grupo_611_mujeres' => round(($grupo_611_mujeres * 100) / $total_poblacion, 2),
                    'grupo_1217_hombres' => round(($grupo_1217_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_1217_mujeres' => round(($grupo_1217_femeninos * 100) / $total_poblacion, 2),
                    'grupo_1828_hombres' => round(($grupo_1828_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_1828_mujeres' => round(($grupo_1828_femeninos * 100) / $total_poblacion, 2),
                    'grupo_2959_hombres' => round(($grupo_2959_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_2959_mujeres' => round(($grupo_2959_femeninos * 100) / $total_poblacion, 2),
                    'grupo_60m_hombres' => round(($grupo_60_hombres * 100) / $total_poblacion, 2) * -1,
                    'grupo_60m_mujeres' => round(($grupo_60_femeninos * 100) / $total_poblacion, 2) * -1,

                ],
                'poblacion' => [
                    'grupo_611_hombrest' => $grupo_611_hombre,
                    'grupo_611_mujerest' => $grupo_611_mujeres,
                    'grupo_1217_hombrest' => $grupo_1217_hombres,
                    'grupo_1217_mujerest' => $grupo_1217_femeninos,
                    'grupo_1828_hombrest' => $grupo_1828_hombres,
                    'grupo_1828_mujerest' => $grupo_1828_femeninos,
                    'grupo_2959_hombrest' => $grupo_2959_hombres,
                    'grupo_2959_mujerest' => $grupo_2959_femeninos,
                    'grupo_60m_hombrest' => $grupo_60_hombres,
                    'grupo_60m_mujerest' => $grupo_60_femeninos,
                ],
            ];

            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function filtrospa()
    {
        $data = request()->all();
        $tipo = request()->get("_tipo");
        $tipo_temp = request()->get("_tipo");
        if ($tipo == "fuma") {
            $tipo_temp = "cigarrillo";
        }

        $grupo_611_hombre = \App\Indicadores::total_consumidores_integrantes_masculinos_6_11_t(Session::get('alias'), $tipo_temp);
        $grupo_611_mujeres = \App\Indicadores::total_consumidores_integrantes_femeninos_6_11_t(Session::get('alias'), $tipo_temp);

        $grupo_1217_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_12_17(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_masculinos_12_17(Session::get('alias'), $tipo);
        $grupo_1217_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_12_17(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_femeninos_12_17(Session::get('alias'), $tipo);

        $grupo_1828_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_18_28(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_masculinos_18_28(Session::get('alias'), $tipo);
        $grupo_1828_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_18_28(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_femeninos_18_28(Session::get('alias'), $tipo);

        $grupo_2959_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_29_59(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_masculinos_29_59(Session::get('alias'), $tipo);
        $grupo_2959_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_29_59(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_femeninos_29_59(Session::get('alias'), $tipo);

        if ($tipo == "fuma") {
            $tipo = "cigarrillo";
        } else if ($tipo == "spa") {
            $tipo = "glicemia";
        }

        $grupo_60_hombres = \App\Indicadores::total_consumidores_integrantes_masculinos_60(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_masculinos_60(Session::get('alias'), $tipo);
        $grupo_60_femeninos = \App\Indicadores::total_consumidores_integrantes_femeninos_60(Session::get('alias'), $tipo)+\App\Indicadores::total_consumidores_jefe_femeninos_60(Session::get('alias'), $tipo);

        $respuesta = [
            'poblacion' => [
                'grupo_611_hombrest' => $grupo_611_hombre,
                'grupo_611_mujerest' => $grupo_611_mujeres,
                'grupo_1217_hombrest' => $grupo_1217_hombres,
                'grupo_1217_mujerest' => $grupo_1217_femeninos,
                'grupo_1828_hombrest' => $grupo_1828_hombres,
                'grupo_1828_mujerest' => $grupo_1828_femeninos,
                'grupo_2959_hombrest' => $grupo_2959_hombres,
                'grupo_2959_mujerest' => $grupo_2959_femeninos,
                'grupo_60m_hombrest' => $grupo_60_hombres,
                'grupo_60m_mujerest' => $grupo_60_femeninos,
            ],
        ];

        return response()->json($respuesta, 200);
    }
}
