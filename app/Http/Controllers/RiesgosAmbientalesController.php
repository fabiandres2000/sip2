<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;


class RiesgosAmbientalesController extends Controller
{
    public function Estadisticas()
    {
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');
            if($tipo == "Todos"){
                $estadisticas = \App\RiesgosAmbientalesEstadistica::listar(Session::get('alias'));
            }else{
                $estadisticas = \App\RiesgosAmbientalesEstadistica::filtrar(Session::get('alias'), $tipo, $id);
            }
            $respuesta = [
                'estadisticas' => $estadisticas,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function EstadisticasPorVivienda()
    {
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');
            if($tipo == "Todos"){
                $estadisticas = \App\RiesgosAmbientalesEstadistica::listarPorVivienda(Session::get('alias'));
            }else{
                $estadisticas = \App\RiesgosAmbientalesEstadistica::filtrarPorVivienda(Session::get('alias'), $tipo, $id);
            }
            $respuesta = [
                'estadisticas' => $estadisticas,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function valoresRiesgosAmbientales() {
        $IDHOGAR = request()->get('id_hogar');
        $ValoresRiesgosAmbientales = \App\ValoresRiesgosAmbientales::buscar(Session::get('alias'), $IDHOGAR);
        $riesgos_ambientales = \App\RiesgosAmbientales::buscar(Session::get('alias'), $IDHOGAR);
        if ($riesgos_ambientales) {
            $riesgos_ambientales->va_riesgos_derrumbes = self::valorizacion($riesgos_ambientales->riesgos_derrumbes, 1);
            $riesgos_ambientales->color_riesgos_derrumbes = self::color($riesgos_ambientales->va_riesgos_derrumbes);
            if ($riesgos_ambientales->control_riesgos_derrumbes != "0") {
                $riesgos_ambientales->val_residual_riesgos_derrumbes = self::valRieRes($riesgos_ambientales->control_riesgos_derrumbes);
                $riesgos_ambientales->color_residual_riesgos_derrumbes = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_derrumbes);
            } else {
                $riesgos_ambientales->val_residual_riesgos_derrumbes = "";
                $riesgos_ambientales->color_residual_riesgos_derrumbes = "";
            }

            $riesgos_ambientales->va_riesgos_inundacion = self::valorizacion($riesgos_ambientales->riesgos_inundacion, 1);
            $riesgos_ambientales->color_riesgos_inundacion = self::color($riesgos_ambientales->va_riesgos_inundacion);
            if ($riesgos_ambientales->control_riesgos_inundacion != "0") {
                $riesgos_ambientales->val_residual_riesgos_inundacion = self::valRieRes($riesgos_ambientales->control_riesgos_inundacion);
                $riesgos_ambientales->color_residual_riesgos_inundacion = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_inundacion);
            } else {
                $riesgos_ambientales->val_residual_riesgos_inundacion = "";
                $riesgos_ambientales->color_residual_riesgos_inundacion = "";
            }

            $riesgos_ambientales->va_riesgos_insalubridad = self::valorizacion($riesgos_ambientales->riesgos_insalubridad, 2);
            $riesgos_ambientales->color_riesgos_insalubridad = self::color($riesgos_ambientales->va_riesgos_insalubridad);
            if ($riesgos_ambientales->control_riesgos_insalubridad != "0") {
                $riesgos_ambientales->val_residual_riesgos_insalubridad = self::valRieRes($riesgos_ambientales->control_riesgos_insalubridad);
                $riesgos_ambientales->color_residual_riesgos_insalubridad = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_insalubridad);
            } else {
                $riesgos_ambientales->val_residual_riesgos_insalubridad = "";
                $riesgos_ambientales->color_residual_riesgos_insalubridad = "";
            }

            $riesgos_ambientales->va_riesgos_atmosferico = self::valorizacion($riesgos_ambientales->riesgos_atmosferico, 1);
            $riesgos_ambientales->color_riesgos_atmosferico = self::color($riesgos_ambientales->va_riesgos_atmosferico);
            if ($riesgos_ambientales->control_riesgos_atmosferico != "0") {
                $riesgos_ambientales->val_residual_riesgos_atmosferico = self::valRieRes($riesgos_ambientales->control_riesgos_atmosferico);
                $riesgos_ambientales->color_residual_riesgos_atmosferico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_atmosferico);
            } else {
                $riesgos_ambientales->val_residual_riesgos_atmosferico = "";
                $riesgos_ambientales->color_residual_riesgos_atmosferico = "";
            }

            $riesgos_ambientales->va_riesgos_recurso_suelo = self::valorizacion($riesgos_ambientales->riesgos_recurso_suelo, 1);
            $riesgos_ambientales->color_riesgos_recurso_suelo = self::color($riesgos_ambientales->va_riesgos_recurso_suelo);
            if ($riesgos_ambientales->control_riesgos_recurso_suelo != "0") {
                $riesgos_ambientales->val_residual_riesgos_recurso_suelo = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_suelo);
                $riesgos_ambientales->color_residual_riesgos_recurso_suelo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_suelo);
            } else {
                $riesgos_ambientales->val_residual_riesgos_recurso_suelo = "";
                $riesgos_ambientales->color_residual_riesgos_recurso_suelo = "";
            }

            $riesgos_ambientales->va_riesgos_quema = self::valorizacion($riesgos_ambientales->riesgos_quema, 1);
            $riesgos_ambientales->color_riesgos_quema = self::color($riesgos_ambientales->va_riesgos_quema);
            if ($riesgos_ambientales->control_riesgos_quema != "0") {
                $riesgos_ambientales->val_residual_riesgos_quema = self::valRieRes($riesgos_ambientales->control_riesgos_quema);
                $riesgos_ambientales->color_residual_riesgos_quema = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_quema);
            } else {
                $riesgos_ambientales->val_residual_riesgos_quema = "";
                $riesgos_ambientales->color_residual_riesgos_quema = "";
            }

            $riesgos_ambientales->va_riesgos_auditivo = self::valorizacion($riesgos_ambientales->riesgos_auditivo, 1);
            $riesgos_ambientales->color_riesgos_auditivo = self::color($riesgos_ambientales->va_riesgos_auditivo);
            if ($riesgos_ambientales->control_riesgos_auditivo != "0") {
                $riesgos_ambientales->val_residual_riesgos_auditivo = self::valRieRes($riesgos_ambientales->control_riesgos_auditivo);
                $riesgos_ambientales->color_residual_riesgos_auditivo = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_auditivo);
            } else {
                $riesgos_ambientales->val_residual_riesgos_auditivo = "";
                $riesgos_ambientales->color_residual_riesgos_auditivo = "";
            }

            $riesgos_ambientales->va_riesgos_recurso_hidrico = self::valorizacion($riesgos_ambientales->riesgos_recurso_hidrico, 1);
            $riesgos_ambientales->color_riesgos_recurso_hidrico = self::color($riesgos_ambientales->va_riesgos_recurso_hidrico);
            if ($riesgos_ambientales->control_riesgos_recurso_hidrico != "0") {
                $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = self::valRieRes($riesgos_ambientales->control_riesgos_recurso_hidrico);
                $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_recurso_hidrico);
            } else {
                $riesgos_ambientales->val_residual_riesgos_recurso_hidrico = "";
                $riesgos_ambientales->color_residual_riesgos_recurso_hidrico = "";
            }

            $riesgos_ambientales->va_riesgos_acceso_agua = self::valorizacion($riesgos_ambientales->riesgos_acceso_agua, 1);
            $riesgos_ambientales->color_riesgos_acceso_agua = self::color($riesgos_ambientales->va_riesgos_acceso_agua);
            if ($riesgos_ambientales->control_riesgos_acceso_agua != "0") {
                $riesgos_ambientales->val_residual_riesgos_acceso_agua = self::valRieRes($riesgos_ambientales->control_riesgos_acceso_agua);
                $riesgos_ambientales->color_residual_riesgos_acceso_agua = self::colorRieRes($riesgos_ambientales->val_residual_riesgos_acceso_agua);
            } else {
                $riesgos_ambientales->val_residual_riesgos_acceso_agua = "";
                $riesgos_ambientales->color_residual_riesgos_acceso_agua = "";
            }
        }
        //CALCULAR RIESGOS//

        $respuesta = [
            'riesgos_ambientales' => $riesgos_ambientales,
            'ValoresRiesgosAmbientales' => $ValoresRiesgosAmbientales,
        ];

        return response()->json($respuesta, 200);
    }

    public function valorizacion($valor, $opc)
    {
        $valorizacion = "";
        if ($opc == 1) {
            if ($valor < 3) {
                $valorizacion = "Bajo";
            } else if ($valor >= 3 && $valor < 7) {
                $valorizacion = "Medio";
            } else {
                $valorizacion = "Alto";
            }
        } else {
            if ($opc == 2) {
                if ($valor < 5) {
                    $valorizacion = "Bajo";
                } else if ($valor >= 5 && $valor < 15) {
                    $valorizacion = "Medio";
                } else {
                    $valorizacion = "Alto";
                }
            } else {
                if ($valor < 1.6) {
                    $valorizacion = "Bajo";
                } else if ($valor >= 1.6 && $valor < 3.2) {
                    $valorizacion = "Medio";
                } else {
                    $valorizacion = "Alto";
                }
            }
        }
        return $valorizacion;
    }

    public function color($valor)
    {
        $color = "";
        if ($valor == "Bajo") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Medio") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public function valRieRes($valor)
    {
        $eficacia = "";
        if ($valor == 1) {
            $eficacia = "Bajo";
        } else {
            if ($valor == 2) {
                $eficacia = "Moderado";
            } else {
                $eficacia = "Alto";
            }
        }
        return $eficacia;
    }

    public function colorRieRes($valor)
    {
        $color = "";
        if ($valor == "Bajo") {
            $color = "kt-badge--success";
        } else {
            if ($valor == "Moderado") {
                $color = "kt-badge--warning";
            } else {
                $color = "kt-badge--danger";
            }
        }
        return $color;
    }

    public function PorcentajesGeneral()
    {
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');
            if($tipo == "todos"){
                $porcentajes = \App\RiesgosAmbientalesEstadistica::PorcentajesGeneral(Session::get('alias'));
            }else{
                $porcentajes = \App\RiesgosAmbientalesEstadistica::filtrarPorcentajesGeneral(Session::get('alias'), $tipo, $id);
            }
            $respuesta = [
                'porcentajes' => $porcentajes,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

}
