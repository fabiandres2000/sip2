<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class SocioeconomicoDashboard extends Model
{
    public static function tasaAnalfabetismo($alias, $tipo, $id)
    {
        $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select("*")
        ->count();

        $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select("*")
        ->count();

        if($tipo == "todos"){
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
        }else{
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
        }

        $masculinosAnalfabetas = array();
        $femeninosAnalfabetas = array();
        foreach ($jefesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        foreach ($integrantesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        $analfabetas12_17 = [0,0];
        $analfabetas18_28 = [0,0];
        $analfabetas29_59 = [0,0];
        $analfabetas60 = [0,0];

        foreach ($masculinosAnalfabetas as &$item) {
            if ($item->edad >=15 && $item->edad <=17) {
                $analfabetas12_17[0] = $analfabetas12_17[0] + 1;
            }

            if ($item->edad >=18 && $item->edad <=28) {
                $analfabetas18_28[0] = $analfabetas18_28[0] + 1;
            }

            if ($item->edad >=29 && $item->edad <=59) {
                $analfabetas29_59[0] = $analfabetas29_59[0] + 1;
            }

            if ($item->edad >=60) {
                $analfabetas60[0] = $analfabetas60[0] + 1;
            }
        }

        foreach ($femeninosAnalfabetas as &$item) {
            if ($item->edad >=15 && $item->edad <=17) {
                $analfabetas12_17[1] = $analfabetas12_17[1] + 1;
            }

            if ($item->edad >=18 && $item->edad <=28) {
                $analfabetas18_28[1] = $analfabetas18_28[1] + 1;
            }

            if ($item->edad >=29 && $item->edad <=59) {
                $analfabetas29_59[1] = $analfabetas29_59[1] + 1;
            }

            if ($item->edad >=60) {
                $analfabetas60[1] = $analfabetas60[1] + 1;
            }
        }

        if(count($jefesAnalfabetas) + count($integrantesAnalfabetas) > 0){
            $porcentajeAnalfabetasM = (count($masculinosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
            $porcentajeAnalfabetasF = (count($femeninosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
        }else{
            $porcentajeAnalfabetasM = 0;
            $porcentajeAnalfabetasF = 0;
        }

        $info = [
            'jefesAnalfabetas' => $jefesAnalfabetas,
            'integrantesAnalfabetas' => $integrantesAnalfabetas,  
            'totalAnalfabetas' => (count($jefesAnalfabetas) + count($integrantesAnalfabetas)), 
            'totalPersonas' => ($jefes+$integrantes),
            'porcentajeAnalfabetas' => ((count($jefesAnalfabetas) + count($integrantesAnalfabetas)) / ($jefes+$integrantes)) * 100,
            'masculinosAnalfabetas' => $masculinosAnalfabetas,
            'femeninosAnalfabetas' => $femeninosAnalfabetas,
            'totalFemeninosAnalfabetas' => count($femeninosAnalfabetas),
            'totalMasculinosAnalfabetas' => count($masculinosAnalfabetas),
            'porcentajeAnalfabetasM' => $porcentajeAnalfabetasM,
            'porcentajeAnalfabetasF' => $porcentajeAnalfabetasF,
            'analfabetas12_17' => $analfabetas12_17,
            'analfabetas18_28' => $analfabetas18_28,
            'analfabetas29_59' => $analfabetas29_59,
            'analfabetas60' => $analfabetas60
        ];

        return $info;
    }

    public static function tasaAnalfabetismoNinios($alias, $tipo, $id)
    {
        $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select("*")
        ->count();

        $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select("*")
        ->count();

        if($tipo == "todos"){
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) <= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) <= 15')
            ->get();
        }else{
            $jefesAnalfabetas =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.nivel_escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','JEFE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) <= 15')
            ->get();

            $integrantesAnalfabetas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.escolaridad', 13)
            ->where('hogar.id_'.$tipo, $id)
            ->select("integrantes.*", "hogar.lat", "hogar.lng")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("CONCAT_WS('','INTE') as tipo")
            ->selectRaw("TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) <= 15')
            ->get();
        }

        $masculinosAnalfabetas = array();
        $femeninosAnalfabetas = array();
        foreach ($jefesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        foreach ($integrantesAnalfabetas as &$item) {
            if($item->sexo == "MASCULINO"){
                array_push($masculinosAnalfabetas, $item);
            }else{
                array_push($femeninosAnalfabetas, $item);
            } 
        }

        $analfabetas1_5 = [0,0];
        $analfabetas6_11 = [0,0];
        $analfabetas12_15 = [0,0];

        foreach ($masculinosAnalfabetas as &$item) {
            if ($item->edad >=1 && $item->edad <=5) {
                $analfabetas1_5[0] = $analfabetas1_5[0] + 1;
            }

            if ($item->edad >=6 && $item->edad <=11) {
                $analfabetas6_11[0] = $analfabetas6_11[0] + 1;
            }

            if ($item->edad >=12 && $item->edad <=15) {
                $analfabetas12_15[0] = $analfabetas12_15[0] + 1;
            }
        }

        foreach ($femeninosAnalfabetas as &$item) {
            if ($item->edad >=1 && $item->edad <=5) {
                $analfabetas1_5[1] = $analfabetas1_5[1] + 1;
            }

            if ($item->edad >=6 && $item->edad <=11) {
                $analfabetas6_11[1] = $analfabetas6_11[1] + 1;
            }

            if ($item->edad >=12 && $item->edad <=15) {
                $analfabetas12_15[1] = $analfabetas12_15[1] + 1;
            }
        }

        if(count($jefesAnalfabetas) + count($integrantesAnalfabetas) > 0){
            $porcentajeAnalfabetasM = (count($masculinosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
            $porcentajeAnalfabetasF = (count($femeninosAnalfabetas) / (count($jefesAnalfabetas) + count($integrantesAnalfabetas))) * 100;
        }else{
            $porcentajeAnalfabetasM = 0;
            $porcentajeAnalfabetasF = 0;
        }

        $info = [
            'jefesAnalfabetas' => $jefesAnalfabetas,
            'integrantesAnalfabetas' => $integrantesAnalfabetas,  
            'totalAnalfabetas' => (count($jefesAnalfabetas) + count($integrantesAnalfabetas)), 
            'totalPersonas' => ($jefes+$integrantes),
            'porcentajeAnalfabetas' => ((count($jefesAnalfabetas) + count($integrantesAnalfabetas)) / ($jefes+$integrantes)) * 100,
            'masculinosAnalfabetas' => $masculinosAnalfabetas,
            'femeninosAnalfabetas' => $femeninosAnalfabetas,
            'totalFemeninosAnalfabetas' => count($femeninosAnalfabetas),
            'totalMasculinosAnalfabetas' => count($masculinosAnalfabetas),
            'porcentajeAnalfabetasM' => $porcentajeAnalfabetasM,
            'porcentajeAnalfabetasF' => $porcentajeAnalfabetasF,
            'analfabetas1_5' => $analfabetas1_5,
            'analfabetas6_11' => $analfabetas6_11,
            'analfabetas12_15' => $analfabetas12_15
        ];

        return $info;
    }

    public static function tasaDesempleo($alias, $tipo, $id){
        if($tipo == "todos"){

            // personas en busca de empleo
            $jefesD =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.ocupacion', 9990)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesD =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.ocupacion', 9990)
            ->select("integrantes.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
            // personas en busca de empleo
            
            $personasBuscaEmpleo  = array();

            foreach ($jefesD as &$item) {
                array_push($personasBuscaEmpleo, $item);
            }

            foreach ($integrantesD as &$item) {
               array_push($personasBuscaEmpleo, $item);
            }

            //  población económicamente activa
            $IFT =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.estado', 'Activo')
            ->where(function ($query) {
                $query->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
                    ->orWhere('integrantes.ocupacion', 9990);
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->count();
            
            $JFT =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.estado', 'Activo')
            ->where(function ($query) {
                $query->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
                    ->orWhere('caracterizacion.ocupacion', 9990);
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->count();

            $FT = $IFT + $JFT;
            $TD = (count($personasBuscaEmpleo) / $FT) * 100;
            //  población económicamente activa

            // por edad y sexo
            $femeninoTD = 0;
            $masculinoTD = 0;
            foreach ($personasBuscaEmpleo as &$item) {
                if($item->sexo == "MASCULINO"){
                    $masculinoTD += 1;
                }else{
                    $femeninoTD += 1;
                }
            }

            $d15_17 = 0;
            $d18_28 = 0;
            $d29_59 = 0;
            $d60 = 0;

            foreach ($personasBuscaEmpleo as &$item) {
                if ($item->edad >=15 && $item->edad <=17) {
                    $d15_17 = $d15_17 + 1;
                }

                if ($item->edad >=18 && $item->edad <=28) {
                    $d18_28 = $d18_28 + 1;
                }

                if ($item->edad >=29 && $item->edad <=59) {
                    $d29_59 = $d29_59 + 1;
                }

                if ($item->edad >=60) {
                    $d60 = $d60 + 1;
                }
            }

            $porEdad = [
                'd15_17' => $d15_17,
                'd18_28' => $d18_28,
                'd29_59' => $d29_59,
                'd60' => $d60,
            ];
            // por edad y sexo

            // por corregimiento
            $porCorregimeintoD =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.ocupacion', 9990)
            ->select("hogar.id_corre")
            ->selectRaw("COUNT(integrantes.id) as numero_personas")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->groupBy("hogar.id_corre")
            ->orderBy("numero_personas","DESC")
            ->get();

            $porCorregimeintoD2 =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.ocupacion', 9990)
            ->select("hogar.id_corre")
            ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->groupBy("hogar.id_corre")
            ->orderBy("numero_personas","DESC")
            ->get();

            $porCorregimeinto = array();
            foreach ($porCorregimeintoD as &$item) {
                $encontrado = false;
                foreach ($porCorregimeintoD2 as &$item2) {
                    if($item->id_corre == $item2->id_corre){
                        $item2->numero_personas += $item->numero_personas;
                        $encontrado = true;
                        $itemEncontrado = $item2;
                    }
                }

                if(!$encontrado){
                    array_push($porCorregimeinto, $item);
                }else{
                    array_push($porCorregimeinto, $itemEncontrado);
                }
            }

            foreach ($porCorregimeinto as &$item) {
                $personasTrabajarCorregimiento = DB::connection('mysql')->table($alias.'.caracterizacion')
                ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
                ->where('hogar.id_corre', $item->id_corre)
                ->where('caracterizacion.estado', 'Activo')
                ->where(function ($query) {
                    $query->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
                        ->orWhere('caracterizacion.ocupacion', 9990);
                })
                ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
                ->count();
    
                $personasTrabajarCorregimiento += DB::connection('mysql')->table($alias.'.integrantes')
                ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
                ->where('hogar.id_corre', $item->id_corre)
                ->where('integrantes.estado', 'Activo')
                ->where(function ($query) {
                    $query->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
                        ->orWhere('integrantes.ocupacion', 9990);
                })
                ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
                ->count();
    
                $item->personas_edad_trabajo = $personasTrabajarCorregimiento;
    
                $item->tasa_odesempleo = ($item->numero_personas / $item->personas_edad_trabajo ) * 100;
            }
            // por corregimiento

            $porcenfemeninoTD = 0;
            $porcenmasculinoTD = 0;
            if(count($personasBuscaEmpleo) > 0){
                $porcenfemeninoTD = ($femeninoTD/count($personasBuscaEmpleo))*100;
                $porcenmasculinoTD = ($masculinoTD/count($personasBuscaEmpleo))*100;
            }

            $info = [
                'TD' => $TD, 
                'D' => count($personasBuscaEmpleo),
                'FT' => $FT,
                'listaD' => $personasBuscaEmpleo,
                'femeninoTD' => $femeninoTD,
                'masculinoTD' => $masculinoTD,
                'porcenfemeninoTD' => $porcenfemeninoTD,
                'porcenmasculinoTD' => $porcenmasculinoTD,
                'porCorregimeinto' => $porCorregimeinto,
                'porEdad' => $porEdad
            ];
    
            return $info;
        }else{
            // personas en busca de empleo
            $jefesD =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.ocupacion', 9990)
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->get();

            $integrantesD =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.ocupacion', 9990)
            ->where('hogar.id_'.$tipo, $id)
            ->select("integrantes.*", "hogar.lat", "hogar.lng", "hogar.id_zona")
            ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as des_corr")->selectRaw("CONCAT_WS('',hogar.direccion) as des_direc")
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->get();
            // personas en busca de empleo
            
            $personasBuscaEmpleo  = array();

            foreach ($jefesD as &$item) {
                array_push($personasBuscaEmpleo, $item);
            }

            foreach ($integrantesD as &$item) {
            array_push($personasBuscaEmpleo, $item);
            }

            //  población económicamente activa
            $IFT =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->where('integrantes.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->where(function ($query) {
                $query->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
                    ->orWhere('integrantes.ocupacion', 9990);
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->count();
            
            $JFT =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where('caracterizacion.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->where(function ($query) {
                $query->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
                    ->orWhere('caracterizacion.ocupacion', 9990);
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->count();

            $FT = $IFT + $JFT;

            if($FT > 0){
                $TD = (count($personasBuscaEmpleo) / $FT) * 100;
            }else{
                $TD = 0;
            }
            
            //  población económicamente activa

            // por edad y sexo
            $femeninoTD = 0;
            $masculinoTD = 0;
            foreach ($personasBuscaEmpleo as &$item) {
                if($item->sexo == "MASCULINO"){
                    $masculinoTD += 1;
                }else{
                    $femeninoTD += 1;
                }
            }

            $d15_17 = 0;
            $d18_28 = 0;
            $d29_59 = 0;
            $d60 = 0;

            foreach ($personasBuscaEmpleo as &$item) {
                if ($item->edad >=15 && $item->edad <=17) {
                    $d15_17 = $d15_17 + 1;
                }

                if ($item->edad >=18 && $item->edad <=28) {
                    $d18_28 = $d18_28 + 1;
                }

                if ($item->edad >=29 && $item->edad <=59) {
                    $d29_59 = $d29_59 + 1;
                }

                if ($item->edad >=60) {
                    $d60 = $d60 + 1;
                }
            }

            $porEdad = [
                'd15_17' => $d15_17,
                'd18_28' => $d18_28,
                'd29_59' => $d29_59,
                'd60' => $d60,
            ];
            // por edad y sexo

            $porcenfemeninoTD = 0;
            $porcenmasculinoTD = 0;
            if(count($personasBuscaEmpleo) > 0){
                $porcenfemeninoTD = ($femeninoTD/count($personasBuscaEmpleo))*100;
                $porcenmasculinoTD = ($masculinoTD/count($personasBuscaEmpleo))*100;
            }

            $info = [
                'TD' => $TD, 
                'D' => count($personasBuscaEmpleo),
                'FT' => $FT,
                'listaD' => $personasBuscaEmpleo,
                'femeninoTD' => $femeninoTD,
                'masculinoTD' => $masculinoTD,
                'porcenfemeninoTD' => $porcenfemeninoTD,
                'porcenmasculinoTD' => $porcenmasculinoTD,
                'porEdad' => $porEdad
            ];

            return $info;
        }
    }

    public static function tasaOcupacion($alias){
        // integrantes ocupados  por corregimiento
        $porCorregimeintoTOI =  DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('integrantes.estado', 'Activo')
        ->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
        ->select("hogar.id_corre")
        ->selectRaw("COUNT(integrantes.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->orderBy("numero_personas","DESC")
        ->get();
        // integrantes ocupados  por corregimiento
        // jefes de hogar ocupados  por corregimiento
        $porCorregimeintoTOJH =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('caracterizacion.estado', 'Activo')
        ->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
        ->select("hogar.id_corre")
        ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->orderBy("numero_personas","DESC")
        ->get();
        // jefes de hogar ocupados  por corregimiento

        // personas en edad de trabajar
        $jefesEdadTrabajar  =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->where('caracterizacion.estado', 'Activo')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $integrantesEdadTrabajar  =  DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->where('integrantes.estado', 'Activo')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas en edad de trabajar

        $personasEdadTrabajar = $jefesEdadTrabajar  +  $integrantesEdadTrabajar;

        
        $porCorregimeinto = array();
        foreach ($porCorregimeintoTOI as &$item) {
            $encontrado = false;
            foreach ($porCorregimeintoTOJH as &$item2) {
                if($item->id_corre == $item2->id_corre){
                    $item2->numero_personas += $item->numero_personas;
                    $encontrado = true;
                    $itemEncontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($porCorregimeinto, $item);
            }else{
                array_push($porCorregimeinto, $itemEncontrado);
            }
        }

        foreach ($porCorregimeinto as &$item) {
            $personasTrabajarCorregimiento = DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where('hogar.id_corre', $item->id_corre)
            ->where('caracterizacion.estado', 'Activo')
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
            ->count();

            $personasTrabajarCorregimiento += DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->where('hogar.id_corre', $item->id_corre)
            ->where('integrantes.estado', 'Activo')
            ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
            ->count();

            $item->personas_edad_trabajo = $personasTrabajarCorregimiento;

            $item->tasa_ocupacion = ($item->numero_personas / $item->personas_edad_trabajo ) * 100;
        }


        //personas ocupadas general
        $personasOcupadas = 0;
        foreach ($porCorregimeinto as &$item) {
            $personasOcupadas += $item->numero_personas;   
        }
        //personas ocupadas general

        // personas con empleo formal
        $personasEmpleoFormal =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.tipo_empleo', '2')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $personasEmpleoFormal +=  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->where('integrantes.tipo_empleo', '2')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas con empleo formal

        // personas con empleo informal
        $personasEmpleoInformal =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.tipo_empleo', '3')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $personasEmpleoInformal +=  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->where('integrantes.tipo_empleo', '3')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas con empleo informal

        // personas con empleo independiente
        $personasEmpleoIndependiente =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.tipo_empleo', '4')
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->count();

        $personasEmpleoIndependiente +=  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->where('integrantes.tipo_empleo', '4')
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->count();
        // personas con empleo independiente

         // personas con empleo independiente
         $personasNA =  DB::connection('mysql')->table($alias.'.caracterizacion')
         ->where('caracterizacion.estado', 'Activo')
         ->where('caracterizacion.tipo_empleo', 'NA')
         ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
         ->count();
 
         $personasNA +=  DB::connection('mysql')->table($alias.'.integrantes')
         ->where('integrantes.estado', 'Activo')
         ->where('integrantes.tipo_empleo', 'NA')
         ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
         ->count();
         // personas con empleo independiente

          // personas con empleo independiente
          $personasSinEmpleo =  DB::connection('mysql')->table($alias.'.caracterizacion')
          ->where('caracterizacion.estado', 'Activo')
          ->where('caracterizacion.tipo_empleo', '1')
          ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
          ->count();
  
          $personasSinEmpleo +=  DB::connection('mysql')->table($alias.'.integrantes')
          ->where('integrantes.estado', 'Activo')
          ->where('integrantes.tipo_empleo', '1')
          ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
          ->count();
          // personas con empleo independiente

        $info = [
            'personasOcupadas' => $personasOcupadas, 
            'porCorregimeinto' => $porCorregimeinto, 
            'personasEdadTrabajar' => $personasEdadTrabajar, 
            'tasaOcupacion' => ($personasOcupadas / $personasEdadTrabajar) * 100,
            'personasEmpleoFormal' => $personasEmpleoFormal,
            'porEmpleoFormal' => ($personasEmpleoFormal / $personasEdadTrabajar) * 100,
            'personasEmpleoInformal' => $personasEmpleoInformal,
            'porEmpleoInformal' => ($personasEmpleoInformal / $personasEdadTrabajar) * 100,
            'personasEmpleoIndependiente' => $personasEmpleoIndependiente,
            'porEmpleoIndependiente' => ($personasEmpleoIndependiente / $personasEdadTrabajar) * 100,
            'personasNA' => $personasNA,
            'personasSinEmpleo' => $personasSinEmpleo,
        ];

        return $info;
    }

    public static function poblacionEconomicamenteActiva($alias){
        $PEAJH = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('caracterizacion.estado', 'Activo')
        ->where(function ($query) {
            $query->whereIn('caracterizacion.tipo_empleo', ['2', '3', '4'])
                ->orWhere('caracterizacion.ocupacion', 9990);
        })
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $PEAI = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('integrantes.estado', 'Activo')
        ->where(function ($query) {
            $query->whereIn('integrantes.tipo_empleo', ['2', '3', '4'])
                ->orWhere('integrantes.ocupacion', 9990);
        })
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(integrantes.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $porCorregimeinto = array();
        foreach ($PEAI as &$item) {
            $encontrado = false;
            foreach ($PEAJH as &$item2) {
                if($item->id_corre == $item2->id_corre){
                    $item2->numero_personas += $item->numero_personas;
                    $encontrado = true;
                    $itemEncontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($porCorregimeinto, $item);
            }else{
                array_push($porCorregimeinto, $itemEncontrado);
            }
        }

        $PAE = 0;
        foreach ($porCorregimeinto as &$item) {
            $PAE += $item->numero_personas;
        }

        $info = [
            'porCorregimeinto' => $porCorregimeinto,
            'PAE' => $PAE,
        ];

        return $info;
    }

    public static function personasEdadTrabajar($alias){

        $poblacion = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select('caracterizacion.*')
        ->count();

        $poblacion += DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select('integrantes.*')
        ->count();


        $PETJH = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('caracterizacion.estado', 'Activo')
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $PETI = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->where('integrantes.estado', 'Activo')
        ->select('hogar.id_corre')
        ->selectRaw("COUNT(integrantes.id) as numero_personas")
        ->selectRaw("CONCAT_WS('',corregimientos.descripcion) as localizacion")
        ->whereRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) >= 15')
        ->groupBy("hogar.id_corre")
        ->get();

        $porCorregimeinto = array();
        foreach ($PETI as &$item) {
            $encontrado = false;
            foreach ($PETJH as &$item2) {
                if($item->id_corre == $item2->id_corre){
                    $item2->numero_personas += $item->numero_personas;
                    $encontrado = true;
                    $itemEncontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($porCorregimeinto, $item);
            }else{
                array_push($porCorregimeinto, $itemEncontrado);
            }
        }

        $PET = 0;
        foreach ($porCorregimeinto as &$item) {
            $PET += $item->numero_personas;
        }

        $info = [
            'porCorregimeinto' => $porCorregimeinto,
            'PET' => $PET,
            'porcenPET' => ($PET / $poblacion) * 100,
            'poblacion' => $poblacion,
        ];

        return $info;
    }

    public static function poblacion($alias, $tipo, $id){
        if($tipo == "todos"){
            $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.*")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->get();
    
            $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.*")
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->get();

            $personas_caracterizadas = count($jefes)+count($integrantes);

            $arrayPersonas = array();

            foreach ($jefes as &$item) {
                array_push($arrayPersonas, $item);
            }

            foreach ($integrantes as &$item) {
               array_push($arrayPersonas, $item);
            }

            //dividir por sexo
            $masculino = 0;
            $femenino = 0;
            $hombres = 0;
            $mujeres = 0;
            $ninios = 0;
            $ninias = 0;

            foreach ($arrayPersonas as &$item) {
                if($item->sexo == "MASCULINO"){
                    $masculino += 1;
                    if($item->edad >= 12){
                        $hombres += 1;
                    }else{
                        $ninios += 1;
                    }
                }else{
                    $femenino += 1;
                    if($item->edad >= 12){
                        $mujeres += 1;
                    }else{
                        $ninias += 1;
                    }
                } 
            }
            //dividir por sexo

            //dividir por edad
            $personas0_1 = [0,0];
            $personas1_5 = [0,0];
            $personas6_11 = [0,0];
            $personas12_17 = [0,0];
            $personas18_28 = [0,0];
            $personas29_59 = [0,0];
            $personas60 = [0,0];

            $men1a =  DB::connection('mysql')->table($alias.'.men1a')
            ->where('men1a.estado', 'Activo')
            ->select('men1a.sexo')
            ->get();

            foreach ($men1a as &$item) {
                if($item->sexo == "MASCULINO"){
                    $personas0_1[0] = $personas0_1[0] + 1;
                }else{
                    $personas0_1[1] = $personas0_1[1] + 1;
                } 
            }

            $de1a5 =  DB::connection('mysql')->table($alias.'.de1a5')
            ->where('de1a5.estado', 'Activo')
            ->select('de1a5.sexo')
            ->get();

            foreach ($de1a5 as &$item) {
                if($item->sexo == "MASCULINO"){
                    $personas1_5[0] = $personas1_5[0] + 1;
                }else{
                    $personas1_5[1] = $personas1_5[1] + 1;
                } 
            }

            $de6a11 =  DB::connection('mysql')->table($alias.'.de6a11')
            ->where('de6a11.estado', 'Activo')
            ->select('de6a11.sexo')
            ->get();

            foreach ($de6a11 as &$item) {
                if($item->sexo == "MASCULINO"){
                    $personas6_11[0] = $personas6_11[0] + 1;
                }else{
                    $personas6_11[1] = $personas6_11[1] + 1;
                } 
            }

            $de12a17 =  DB::connection('mysql')->table($alias.'.de12a17')
            ->where('de12a17.estado', 'Activo')
            ->select('de12a17.sexo')
            ->get();

            foreach ($de12a17 as &$item) {
                if($item->sexo == "MASCULINO"){
                    $personas12_17[0] = $personas12_17[0] + 1;
                }else{
                    $personas12_17[1] = $personas12_17[1] + 1;
                } 
            }

            $de18a28 =  DB::connection('mysql')->table($alias.'.de18a28')
            ->where('de18a28.estado', 'Activo')
            ->select('de18a28.sexo')
            ->get();

            foreach ($de18a28 as &$item) {
                if($item->sexo == "MASCULINO"){
                    $personas18_28[0] = $personas18_28[0] + 1;
                }else{
                    $personas18_28[1] = $personas18_28[1] + 1;
                } 
            }

            $de29a59 =  DB::connection('mysql')->table($alias.'.de29a59')
            ->where('de29a59.estado', 'Activo')
            ->select('de29a59.sexo')
            ->get();

            foreach ($de29a59 as &$item) {
                if($item->sexo == "MASCULINO"){
                    $personas29_59[0] = $personas29_59[0] + 1;
                }else{
                    $personas29_59[1] = $personas29_59[1] + 1;
                }  
            }

            $de60 =  DB::connection('mysql')->table($alias.'.de60')
            ->where('de60.estado', 'Activo')
            ->select('de60.sexo')
            ->get();

            foreach ($de60 as &$item) {
                if($item->sexo == "MASCULINO"){
                    $personas60[0] = $personas60[0] + 1;
                }else{
                    $personas60[1] = $personas60[1] + 1;
                }  
            }
            

            $edades = [
                'personas0_1' => $personas0_1 ,
                'personas1_5' => $personas1_5 ,
                'personas6_11' => $personas6_11 ,
                'personas12_17' => $personas12_17 ,
                'personas18_28' => $personas18_28 ,
                'personas29_59' => $personas29_59 ,
                'personas60' => $personas60
            ];
            //dividir por edad

            //dividir por nivel de escolaridad

            $escol_jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.escolaridad', 'escolaridad.id','caracterizacion.nivel_escolaridad')
            ->where('caracterizacion.estado', 'Activo')
            ->select("escolaridad.descripcion as escolaridad_nombre")
            ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
            ->groupBy("escolaridad_nombre")
            ->get();
    
            $escol_integ =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.escolaridad', 'escolaridad.id','integrantes.escolaridad')
            ->where('integrantes.estado', 'Activo')
            ->select("escolaridad.descripcion as escolaridad_nombre")
            ->selectRaw("COUNT(integrantes.id) as numero_personas")
            ->groupBy("escolaridad_nombre")
            ->get();

            $porEscolaridad = array();
            foreach ($escol_integ as &$item) {
                $encontrado = false;
                foreach ($escol_jefes as &$item2) {
                    if($item->escolaridad_nombre == $item2->escolaridad_nombre){
                        $item2->numero_personas += $item->numero_personas;
                        $encontrado = true;
                        $itemEncontrado = $item2;
                    }
                }

                if(!$encontrado){
                    array_push($porEscolaridad, $item);
                }else{
                    array_push($porEscolaridad, $itemEncontrado);
                }
            }

            foreach ($escol_jefes as &$item) {
                $encontrado = false;
                foreach ($escol_integ as &$item2) {
                    if($item->escolaridad_nombre == $item2->escolaridad_nombre){
                        $encontrado = true;
                    }
                }

                if(!$encontrado){
                    array_push($porEscolaridad, $item);
                }
            }

            //dividir por nivel de escolaridad

            //dividir por poblacion migrante
            $numero_migrantes = 0;
            $numero_no_migrantes = 0;

            foreach ($arrayPersonas as &$item) {
                if($item->migrante == "SI"){
                    $numero_migrantes += 1;
                }else{
                    $numero_no_migrantes +=1;
                }
            }

            $migrantes = [
                'numero_migrantes' => $numero_migrantes,
                'numero_no_migrantes' => $numero_no_migrantes,
            ];

            //dividir por poblacion migrante

            // mujeres enbarazadas por edad
            $me6_11 = 0;
            $me12_17 = 0;
            $me17_28 = 0;
            $me29_59 = 0;
            foreach ($arrayPersonas as &$item) {
                if($item->embarazo == "SI"){
                    if ($item->edad >=6 && $item->edad <=11) {
                        $me6_11 += 1; 
                    }
                    if ($item->edad >=12 && $item->edad <=17) {
                        $me12_17 += 1;
                    }
                    if ($item->edad >=18 && $item->edad <=28) {
                        $me17_28 += 1;
                    }
                    if ($item->edad >=29 && $item->edad <=59) {
                        $me29_59 += 1;
                    }
                }
            }

            $mujeres_embarazadas = [
                'me6_11' => $me6_11,
                'me12_17' => $me12_17,
                'me17_28' => $me17_28,
                'me29_59' => $me29_59,
            ];
            // mujeres enbarazadas por edad
            
            $info = [
                'personas_caracterizadas' => $personas_caracterizadas,
                'masculino' => $masculino,
                'femenino' => $femenino,
                'hombres' => $hombres,
                'mujeres' => $mujeres,
                'ninios' => $ninios,
                'ninias' => $ninias,
                'edades' => $edades,
                'porEscolaridad' => $porEscolaridad,
                'migrantes' => $migrantes,
                'mujeres_embarazadas' => $mujeres_embarazadas
            ];
    
            return $info;
        }else{

            $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where('caracterizacion.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.*")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->get();
    
            $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->where('integrantes.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("integrantes.*")
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->get();

            $personas_caracterizadas = count($jefes)+count($integrantes);

            $arrayPersonas = array();

            foreach ($jefes as &$item) {
                array_push($arrayPersonas, $item);
            }

            foreach ($integrantes as &$item) {
               array_push($arrayPersonas, $item);
            }

            //dividir por sexo
            $masculino = 0;
            $femenino = 0;
            $hombres = 0;
            $mujeres = 0;
            $ninios = 0;
            $ninias = 0;

            foreach ($arrayPersonas as &$item) {
                if($item->sexo == "MASCULINO"){
                    $masculino += 1;
                    if($item->edad >= 12){
                        $hombres += 1;
                    }else{
                        $ninios += 1;
                    }
                }else{
                    $femenino += 1;
                    if($item->edad >= 12){
                        $mujeres += 1;
                    }else{
                        $ninias += 1;
                    }
                } 
            }
            //dividir por sexo

            //dividir por edad
            $personas0_1 = [0,0];
            $personas1_5 = [0,0];
            $personas6_11 = [0,0];
            $personas12_17 = [0,0];
            $personas18_28 = [0,0];
            $personas29_59 = [0,0];
            $personas60 = [0,0];
            foreach ($arrayPersonas as &$item) {
                if ($item->edad ==0) {
                    if($item->sexo == "MASCULINO"){
                        $personas0_1[0] = $personas0_1[0] + 1;
                    }else{
                        $personas0_1[1] = $personas0_1[1] + 1;
                    } 
                }
                if ($item->edad >=1 && $item->edad <=5) {
                    if($item->sexo == "MASCULINO"){
                        $personas1_5[0] = $personas1_5[0] + 1;
                    }else{
                        $personas1_5[1] = $personas1_5[1] + 1;
                    } 
                }
                if ($item->edad >=6 && $item->edad <=11) {
                    if($item->sexo == "MASCULINO"){
                        $personas6_11[0] = $personas6_11[0] + 1;
                    }else{
                        $personas6_11[1] = $personas6_11[1] + 1;
                    } 
                }
                if ($item->edad >=12 && $item->edad <=17) {
                    if($item->sexo == "MASCULINO"){
                        $personas12_17[0] = $personas12_17[0] + 1;
                    }else{
                        $personas12_17[1] = $personas12_17[1] + 1;
                    } 
                }
                if ($item->edad >=18 && $item->edad <=28) {
                    if($item->sexo == "MASCULINO"){
                        $personas18_28[0] = $personas18_28[0] + 1;
                    }else{
                        $personas18_28[1] = $personas18_28[1] + 1;
                    } 
                }
                if ($item->edad >=29 && $item->edad <=59) {
                    if($item->sexo == "MASCULINO"){
                        $personas29_59[0] = $personas29_59[0] + 1;
                    }else{
                        $personas29_59[1] = $personas29_59[1] + 1;
                    } 
                }
                if ($item->edad >=60) {
                    if($item->sexo == "MASCULINO"){
                        $personas60[0] = $personas60[0] + 1;
                    }else{
                        $personas60[1] = $personas60[1] + 1;
                    } 
                }
            }
            $edades = [
                'personas0_1' => $personas0_1 ,
                'personas1_5' => $personas1_5 ,
                'personas6_11' => $personas6_11 ,
                'personas12_17' => $personas12_17 ,
                'personas18_28' => $personas18_28 ,
                'personas29_59' => $personas29_59 ,
                'personas60' => $personas60
            ];
            //dividir por edad

            //dividir por nivel de escolaridad

            $escol_jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias.'.escolaridad', 'escolaridad.id','caracterizacion.nivel_escolaridad')
            ->where('caracterizacion.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("escolaridad.descripcion as escolaridad_nombre")
            ->selectRaw("COUNT(caracterizacion.id) as numero_personas")
            ->groupBy("escolaridad_nombre")
            ->get();
    
            $escol_integ =  DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias.'.hogar', 'hogar.id','integrantes.id_hogar')
            ->join($alias.'.escolaridad', 'escolaridad.id','integrantes.escolaridad')
            ->where('integrantes.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("escolaridad.descripcion as escolaridad_nombre")
            ->selectRaw("COUNT(integrantes.id) as numero_personas")
            ->groupBy("escolaridad_nombre")
            ->get();

            $porEscolaridad = array();
            foreach ($escol_integ as &$item) {
                $encontrado = false;
                foreach ($escol_jefes as &$item2) {
                    if($item->escolaridad_nombre == $item2->escolaridad_nombre){
                        $item2->numero_personas += $item->numero_personas;
                        $encontrado = true;
                        $itemEncontrado = $item2;
                    }
                }

                if(!$encontrado){
                    array_push($porEscolaridad, $item);
                }else{
                    array_push($porEscolaridad, $itemEncontrado);
                }
            }

            foreach ($escol_jefes as &$item) {
                $encontrado = false;
                foreach ($escol_integ as &$item2) {
                    if($item->escolaridad_nombre == $item2->escolaridad_nombre){
                        $encontrado = true;
                    }
                }

                if(!$encontrado){
                    array_push($porEscolaridad, $item);
                }
            }

            //dividir por nivel de escolaridad

            //dividir por poblacion migrante
            $numero_migrantes = 0;
            $numero_no_migrantes = 0;

            foreach ($arrayPersonas as &$item) {
                if($item->migrante == "SI"){
                    $numero_migrantes += 1;
                }else{
                    $numero_no_migrantes +=1;
                }
            }

            $migrantes = [
                'numero_migrantes' => $numero_migrantes,
                'numero_no_migrantes' => $numero_no_migrantes,
            ];

            //dividir por poblacion migrante

            // mujeres enbarazadas por edad
            $me6_11 = 0;
            $me12_17 = 0;
            $me17_28 = 0;
            $me29_59 = 0;
            foreach ($arrayPersonas as &$item) {
                if($item->embarazo == "SI"){
                    if ($item->edad >=6 && $item->edad <=11) {
                        $me6_11 += 1; 
                    }
                    if ($item->edad >=12 && $item->edad <=17) {
                        $me12_17 += 1;
                    }
                    if ($item->edad >=18 && $item->edad <=28) {
                        $me17_28 += 1;
                    }
                    if ($item->edad >=29 && $item->edad <=59) {
                        $me29_59 += 1;
                    }
                }
            }

            $mujeres_embarazadas = [
                'me6_11' => $me6_11,
                'me12_17' => $me12_17,
                'me17_28' => $me17_28,
                'me29_59' => $me29_59,
            ];
            // mujeres enbarazadas por edad
            
            $info = [
                'personas_caracterizadas' => $personas_caracterizadas,
                'masculino' => $masculino,
                'femenino' => $femenino,
                'hombres' => $hombres,
                'mujeres' => $mujeres,
                'ninios' => $ninios,
                'ninias' => $ninias,
                'edades' => $edades,
                'porEscolaridad' => $porEscolaridad,
                'migrantes' => $migrantes,
                'mujeres_embarazadas' => $mujeres_embarazadas
            ];
    
            return $info;
        }
    }

    public static function inb($alias, $tipo, $id){
        if($tipo == "todos"){
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('hogar.estado', 'Activo')
            ->select("hogar.*", "vivienda.*")
            ->selectRaw("CONCAT_WS('',muni.descripcion) as des_muni")
            ->selectRaw("CONCAT_WS('-',corregimientos.descripcion) as des_corre")
            ->selectRaw("CONCAT_WS('-', hogar.direccion) as des_dire")
            ->get();

            // vivienda inadecuda
            foreach ($viviendas as &$item) {
                // urbano
                if($item->id_zona == 1){
                    if($item->tipo_estructura == 5 || $item->tipo_cubierta == 2 || $item->material_predominante == 5){
                        $item->vivienda_inadecuada = "SI";
                    }else{
                        $item->vivienda_inadecuada = "NO";
                    }
                }else{
                    //rural
                    if($item->id_zona == 2 || $item->id_zona == 3){
                        if(($item->tipo_estructura == 5 || $item->tipo_estructura == 4) && $item->material_predominante == 5){
                            $item->vivienda_inadecuada = "SI";
                        }else{
                            $item->vivienda_inadecuada = "NO";
                        }
                    }
                }
            }
            // vivienda inadecuda

            // Viviendas con hacinamiento crítico
            foreach ($viviendas as &$item) {
                $numero_personas =  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->where('integrantes.estado', 'Activo')
                ->count();

                $numero_personas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
                ->where('caracterizacion.id_hogar', $item->id_hogar)
                ->where('caracterizacion.estado', 'Activo')
                ->count();

                $hc = $numero_personas / $item->numero_cuartos;

                if($hc > 3){
                    $item->hacinamiento_critico = "SI";
                }else{
                    $item->hacinamiento_critico = "NO";
                }
            }
            // Viviendas con hacinamiento crítico

            // Viviendas con servicios inadecuados
            foreach ($viviendas as &$item) {
                // urbano
                if($item->id_zona == 1){
                    if($item->servicio_sanitario == 3 || ($item->fuente_agua != 1 && $item->fuente_agua != 7)){
                        $item->servicios_inadecuados = "SI";
                    }else{
                        $item->servicios_inadecuados = "NO";
                    }
                }else{
                    //rural
                    if($item->id_zona == 2 || $item->id_zona == 3){
                        if($item->servicio_sanitario == 3 || $item->fuente_agua == 2 || $item->fuente_agua == 3|| $item->fuente_agua == 4|| $item->fuente_agua == 5){
                            $item->servicios_inadecuados = "SI";
                        }else{
                            $item->servicios_inadecuados = "NO";
                        }
                    }
                }
            }
            // Viviendas con servicios inadecuados

            // Viviendas con alta dependencia económica
            foreach ($viviendas as &$item) {
                $numero_personas =  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->where('integrantes.estado', 'Activo')
                ->count();

                $numero_personas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
                ->where('caracterizacion.id_hogar', $item->id_hogar)
                ->where('caracterizacion.estado', 'Activo')
                ->count();

                $numero_personas_ocupadas=  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->whereIn('integrantes.tipo_empleo', [2,3,4])
                ->where('integrantes.estado', 'Activo')
                ->count();

                $numero_personas_ocupadas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
                ->where('caracterizacion.id_hogar', $item->id_hogar)
                ->whereIn('caracterizacion.tipo_empleo', [2,3,4])
                ->where('caracterizacion.estado', 'Activo')
                ->count();

                $de = $numero_personas / $numero_personas_ocupadas;

                if($de >= 3){
                    $item->dependencia_economica = "SI";
                }else{
                    $item->dependencia_economica = "NO";
                }
            }
            // Viviendas con alta dependencia económica

            //Viviendas con niños en edad escolar que no asisten a la escuela
            foreach ($viviendas as &$item) {
                $ninios =  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->where('integrantes.estado', 'Activo')
                ->select('integrantes.*')
                ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
                ->get();

                $ninios_no_asisten = 0;
                
                foreach ($ninios as &$item2) {
                    if($item2->edad > 6  && $item2->edad < 12){
                        if($item2->escolaridad == 4 || $item2->escolaridad == 13 || $item2->escolaridad == 1 || $item2->escolaridad == 12 ){
                            $ninios_no_asisten += 1;
                        }
                    }
                }

                if($ninios_no_asisten > 0){
                    $item->ninios_descolarizados = "SI";
                }else{
                    $item->ninios_descolarizados = "NO";
                }
            }

            foreach ($viviendas as &$item) {
                if($item->ninios_descolarizados == "SI" || $item->dependencia_economica == "SI" || $item->servicios_inadecuados == "SI" || $item->hacinamiento_critico == "SI" || $item->vivienda_inadecuada == "SI"){
                    $item->inb = "SI";
                }else{
                    $item->inb = "NO";
                }
            }

            // totales
            $viviendas_inb = 0;
            foreach ($viviendas as &$item) {
                if($item->inb == "SI"){
                    $viviendas_inb += 1;
                }
            }

            $viviendas_ninios_descolarizados = 0;
            foreach ($viviendas as &$item) {
                if($item->ninios_descolarizados == "SI"){
                    $viviendas_ninios_descolarizados += 1;
                }
            }

            $viviendas_dependencia_economica = 0;
            foreach ($viviendas as &$item) {
                if($item->dependencia_economica == "SI"){
                    $viviendas_dependencia_economica += 1;
                }
            }

            $viviendas_servicios_inadecuados = 0;
            foreach ($viviendas as &$item) {
                if($item->servicios_inadecuados == "SI"){
                    $viviendas_servicios_inadecuados += 1;
                }
            }

            $viviendas_hacinamiento_critico = 0;
            foreach ($viviendas as &$item) {
                if($item->hacinamiento_critico == "SI"){
                    $viviendas_hacinamiento_critico += 1;
                }
            }

            $viviendas_vivienda_inadecuada = 0;
            foreach ($viviendas as &$item) {
                if($item->vivienda_inadecuada == "SI"){
                    $viviendas_vivienda_inadecuada += 1;
                }
            }
            // totales

            $info = [
                'porcen_inb' => ($viviendas_inb/count($viviendas)) * 100,
                'viviendas' => $viviendas,
                'viviendas_inb' => $viviendas_inb,
                'total_viviendas' => count($viviendas),
                'viviendas_vivienda_inadecuada' => $viviendas_vivienda_inadecuada,
                'viviendas_hacinamiento_critico' => $viviendas_hacinamiento_critico,
                'viviendas_servicios_inadecuados' => $viviendas_servicios_inadecuados,
                'viviendas_dependencia_economica' => $viviendas_dependencia_economica,
                'viviendas_ninios_descolarizados' => $viviendas_ninios_descolarizados,
            ];

            //Viviendas con niños en edad escolar que no asisten a la escuela
            return $info;
        }else{
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("hogar.*", "vivienda.*")
            ->selectRaw("CONCAT_WS('',muni.descripcion) as des_muni")
            ->selectRaw("CONCAT_WS('-',corregimientos.descripcion) as des_corre")
            ->selectRaw("CONCAT_WS('-', hogar.direccion) as des_dire")
            ->get();

            // vivienda inadecuda
            foreach ($viviendas as &$item) {
                // urbano
                if($item->id_zona == 1){
                    if($item->tipo_estructura == 5 || $item->tipo_cubierta == 2 || $item->material_predominante == 5){
                        $item->vivienda_inadecuada = "SI";
                    }else{
                        $item->vivienda_inadecuada = "NO";
                    }
                }else{
                    //rural
                    if($item->id_zona == 2 || $item->id_zona == 3){
                        if(($item->tipo_estructura == 5 || $item->tipo_estructura == 4) && $item->material_predominante == 5){
                            $item->vivienda_inadecuada = "SI";
                        }else{
                            $item->vivienda_inadecuada = "NO";
                        }
                    }
                }
            }
            // vivienda inadecuda

            // Viviendas con hacinamiento crítico
            foreach ($viviendas as &$item) {
                $numero_personas =  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->where('integrantes.estado', 'Activo')
                ->count();

                $numero_personas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
                ->where('caracterizacion.id_hogar', $item->id_hogar)
                ->where('caracterizacion.estado', 'Activo')
                ->count();

                $hc = $numero_personas / $item->numero_cuartos;

                if($hc > 3){
                    $item->hacinamiento_critico = "SI";
                }else{
                    $item->hacinamiento_critico = "NO";
                }
            }
            // Viviendas con hacinamiento crítico

            // Viviendas con servicios inadecuados
            foreach ($viviendas as &$item) {
                // urbano
                if($item->id_zona == 1){
                    if($item->servicio_sanitario == 3 || ($item->fuente_agua != 1 && $item->fuente_agua != 7)){
                        $item->servicios_inadecuados = "SI";
                    }else{
                        $item->servicios_inadecuados = "NO";
                    }
                }else{
                    //rural
                    if($item->id_zona == 2 || $item->id_zona == 3){
                        if($item->servicio_sanitario == 3 || $item->fuente_agua == 2 || $item->fuente_agua == 3|| $item->fuente_agua == 4|| $item->fuente_agua == 5){
                            $item->servicios_inadecuados = "SI";
                        }else{
                            $item->servicios_inadecuados = "NO";
                        }
                    }
                }
            }
            // Viviendas con servicios inadecuados

            // Viviendas con alta dependencia económica
            foreach ($viviendas as &$item) {
                $numero_personas =  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->where('integrantes.estado', 'Activo')
                ->count();

                $numero_personas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
                ->where('caracterizacion.id_hogar', $item->id_hogar)
                ->where('caracterizacion.estado', 'Activo')
                ->count();

                $numero_personas_ocupadas=  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->whereIn('integrantes.tipo_empleo', [2,3,4])
                ->where('integrantes.estado', 'Activo')
                ->count();

                $numero_personas_ocupadas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
                ->where('caracterizacion.id_hogar', $item->id_hogar)
                ->whereIn('caracterizacion.tipo_empleo', [2,3,4])
                ->where('caracterizacion.estado', 'Activo')
                ->count();

                $de = $numero_personas / $numero_personas_ocupadas;

                if($de >= 3){
                    $item->dependencia_economica = "SI";
                }else{
                    $item->dependencia_economica = "NO";
                }
            }
            // Viviendas con alta dependencia económica

            //Viviendas con niños en edad escolar que no asisten a la escuela
            foreach ($viviendas as &$item) {
                $ninios =  DB::connection('mysql')->table($alias.'.integrantes')
                ->where('integrantes.id_hogar', $item->id_hogar)
                ->where('integrantes.estado', 'Activo')
                ->select('integrantes.*')
                ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
                ->get();

                $ninios_no_asisten = 0;
                
                foreach ($ninios as &$item2) {
                    if($item2->edad > 6  && $item2->edad < 12){
                        if($item2->escolaridad == 4 || $item2->escolaridad == 13 || $item2->escolaridad == 1 || $item2->escolaridad == 12 ){
                            $ninios_no_asisten += 1;
                        }
                    }
                }

                if($ninios_no_asisten > 0){
                    $item->ninios_descolarizados = "SI";
                }else{
                    $item->ninios_descolarizados = "NO";
                }
            }

            foreach ($viviendas as &$item) {
                if($item->ninios_descolarizados == "SI" || $item->dependencia_economica == "SI" || $item->servicios_inadecuados == "SI" || $item->hacinamiento_critico == "SI" || $item->vivienda_inadecuada == "SI"){
                    $item->inb = "SI";
                }else{
                    $item->inb = "NO";
                }
            }

            // totales
            $viviendas_inb = 0;
            foreach ($viviendas as &$item) {
                if($item->inb == "SI"){
                    $viviendas_inb += 1;
                }
            }

            $viviendas_ninios_descolarizados = 0;
            foreach ($viviendas as &$item) {
                if($item->ninios_descolarizados == "SI"){
                    $viviendas_ninios_descolarizados += 1;
                }
            }

            $viviendas_dependencia_economica = 0;
            foreach ($viviendas as &$item) {
                if($item->dependencia_economica == "SI"){
                    $viviendas_dependencia_economica += 1;
                }
            }

            $viviendas_servicios_inadecuados = 0;
            foreach ($viviendas as &$item) {
                if($item->servicios_inadecuados == "SI"){
                    $viviendas_servicios_inadecuados += 1;
                }
            }

            $viviendas_hacinamiento_critico = 0;
            foreach ($viviendas as &$item) {
                if($item->hacinamiento_critico == "SI"){
                    $viviendas_hacinamiento_critico += 1;
                }
            }

            $viviendas_vivienda_inadecuada = 0;
            foreach ($viviendas as &$item) {
                if($item->vivienda_inadecuada == "SI"){
                    $viviendas_vivienda_inadecuada += 1;
                }
            }

            if(count($viviendas) > 0){
                $porcen_inb = ($viviendas_inb/count($viviendas)) * 100;
            }else{
                $porcen_inb = 0;
            }
            
            // totales

            $info = [
                'porcen_inb' => $porcen_inb,
                'viviendas' => $viviendas,
                'viviendas_inb' => $viviendas_inb,
                'total_viviendas' => count($viviendas),
                'viviendas_vivienda_inadecuada' => $viviendas_vivienda_inadecuada,
                'viviendas_hacinamiento_critico' => $viviendas_hacinamiento_critico,
                'viviendas_servicios_inadecuados' => $viviendas_servicios_inadecuados,
                'viviendas_dependencia_economica' => $viviendas_dependencia_economica,
                'viviendas_ninios_descolarizados' => $viviendas_ninios_descolarizados,
            ];

            //Viviendas con niños en edad escolar que no asisten a la escuela
            return $info;
        }
    }

    public static function nivel_socioeconomico($alias, $tipo, $id){
        if($tipo == "todos"){
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.riesgo_socioeconomico_vivienda', 'hogar.id','riesgo_socioeconomico_vivienda.id_hogar')
            ->where('hogar.estado', 'Activo')
            ->select("riesgo_socioeconomico_vivienda.total")
            ->get();
        }else{
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.riesgo_socioeconomico_vivienda', 'hogar.id','riesgo_socioeconomico_vivienda.id_hogar')
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("riesgo_socioeconomico_vivienda.total")
            ->get();
        }

        $bajBajo = 0;
        $bajo = 0;
        $medioBajo = 0;
        $medio = 0;
        $medioAlto = 0;
        $alto = 0;
        foreach ($viviendas as &$item) {
            switch (true) {
                case $item->total>=0 && $item->total<=100:
                    $bajBajo += 1;
                    break;
                case $item->total>=100.1 && $item->total<=300:
                    $bajo += 1;
                    break;
                case $item->total>=300.1 && $item->total<=475:
                    $medioBajo += 1;
                    break;
                case $item->total>=475.1 && $item->total<=650:
                    $medio += 1;
                    break;  
                case $item->total>=650.1 && $item->total<=825:
                    $medioAlto += 1;
                    break;
                case $item->total>=825.1 && $item->total<=1000:
                    $alto += 1;
                    break;  
            }
        }

        $info = [
            'bajBajo' => $bajBajo,
            'bajo' => $bajo,
            'medioBajo' => $medioBajo,
            'medio' => $medio,
            'medioAlto' => $medioAlto,
            'alto' => $alto
        ];

        return $info;
    }

    public static function hacinamiento($alias, $tipo, $id){
        if($tipo == "todos"){
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
            ->where('hogar.estado', 'Activo')
            ->select("*")
            ->get();
        }else{
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("*")
            ->get();
        }

        $sinhacinamiento = 0;
        $hacinamientoMedio = 0;
        $hacinamientoCritico = 0;

        foreach ($viviendas as &$item) {
            $numero_personas =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.id_hogar', $item->id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->count();

            $numero_personas +=  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.id_hogar', $item->id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->count();

            $hc = $numero_personas / $item->numero_cuartos;

            if($hc >= 0 && $hc <= 2.4){
                $sinhacinamiento += 1;
            }

            if($hc > 2.4 && $hc <= 4.9){
                $hacinamientoMedio += 1;
            }

            if($hc > 4.9){
                $hacinamientoCritico += 1;
            }
        }

        $info = [
            'sinHacinamiento' => $sinhacinamiento,
            'hacinamientoMedio' => $hacinamientoMedio,
            'hacinamientoCritico' => $hacinamientoCritico,
        ];

        return $info;
    }

    public static function nivel_socioeconomico_hogares($alias, $tipo, $id){
        if($tipo == "todos"){
            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias.'.riesgo_socioeconomico_hogar', 'caracterizacion.id','riesgo_socioeconomico_hogar.id_jefe')
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id","riesgo_socioeconomico_hogar.total")
            ->get();
        }else{
            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias.'.riesgo_socioeconomico_hogar', 'caracterizacion.id','riesgo_socioeconomico_hogar.id_jefe')
            ->where('caracterizacion.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("caracterizacion.id","riesgo_socioeconomico_hogar.total")
            ->get();
        }

        $bajoBajo = 0;
        $bajo = 0;
        $medioBajo = 0;
        $medio = 0;
        $medioAlto = 0;
        $alto = 0;
        foreach ($hogares as &$item) {
            switch (true) {
                case $item->total>=0 && $item->total<=50:
                    $bajoBajo += 1;
                    break;
                case $item->total>=51 && $item->total<=110:
                    $bajo += 1;
                    break;
                case $item->total>=111 && $item->total<=200:
                    $medioBajo += 1;
                    break;
                case $item->total>=201 && $item->total<=300:
                    $medio += 1;
                    break;  
                case $item->total>=301 && $item->total<=400:
                    $medioAlto += 1;
                    break;
                case $item->total>=400 && $item->total<=500:
                    $alto += 1;
                    break;  
            }
        }

        $info = [
            'bajoBajo' => $bajoBajo,
            'bajo' => $bajo,
            'medioBajo' => $medioBajo,
            'medio' => $medio,
            'medioAlto' => $medioAlto,
            'alto' => $alto
        ];

        return $info;
    }

    public static function hacinamiento_hogares($alias, $tipo, $id){
        if($tipo == "todos"){
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
            ->where('hogar.estado', 'Activo')
            ->select("*")
            ->get();
        }else{
            $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
            ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
            ->where('hogar.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select("*")
            ->get();
        }

        $sinhacinamiento = 0;
        $hacinamientoMedio = 0;
        $hacinamientoCritico = 0;

        foreach ($viviendas as &$item) {
            $numero_integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
            ->where('integrantes.id_hogar', $item->id_hogar)
            ->where('integrantes.estado', 'Activo')
            ->count();

            $numero_hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->where('caracterizacion.id_hogar', $item->id_hogar)
            ->where('caracterizacion.estado', 'Activo')
            ->count();

            $hc = ($numero_hogares + $numero_integrantes) / $item->numero_cuartos;

            if($hc >= 0 && $hc <= 2.4){
                $sinhacinamiento += $numero_hogares;
            }

            if($hc > 2.4 && $hc <= 4.9){
                $hacinamientoMedio += $numero_hogares;
            }

            if($hc > 4.9){
                $hacinamientoCritico += $numero_hogares;
            }
        }

        $info = [
            'sinHacinamiento' => $sinhacinamiento,
            'hacinamientoMedio' => $hacinamientoMedio,
            'hacinamientoCritico' => $hacinamientoCritico,
        ];

        return $info;
    }

    public static function estratificacion($alias, $tipo, $id){
        if($tipo == "todos"){
            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias.'.estratificacion', 'caracterizacion.id','estratificacion.id_jefe')
            ->where("caracterizacion.estado", "Activo")
            ->select("hogar.id_zona","estratificacion.ingresos_zona_rural","estratificacion.ingresos_ciudad", "caracterizacion.id")
            ->get();
        }else{
            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias.'.estratificacion', 'caracterizacion.id','estratificacion.id_jefe')
            ->where("caracterizacion.estado", "Activo")
            ->where('hogar.id_'.$tipo, $id)
            ->select("hogar.id_zona","estratificacion.ingresos_zona_rural","estratificacion.ingresos_ciudad", "caracterizacion.id")
            ->get();
        }

        // promedio de ingresos
            
        $tipoIn1 = 0;
        $tipoIn2 = 0;
        $tipoIn3 = 0;
        $tipoIn4 = 0;
        $tipoIn5 = 0;
        $tipoIn6 = 0;
        $tipoIn7 = 0;
        $tipoNA = 0;

        $tipoIn1R = 0;
        $tipoIn2R = 0;
        $tipoIn3R = 0;
        $tipoIn4R = 0;
        $tipoIn5R = 0;
        $tipoIn6R = 0;
        $tipoIn7R = 0;
        $tipoNAR = 0;

        foreach ($hogares as &$item) {
            // promedio de ingresos urbano
            if($item->id_zona == 1){
                switch ($item->ingresos_ciudad) {
                    case '1':
                        $tipoIn1 += 1;
                        break;
                    case '2':
                        $tipoIn2 += 1;
                        break;
                    case '3':
                        $tipoIn3 += 1;
                        break;
                    case '4':
                        $tipoIn4 += 1;
                        break;
                    case '5':
                        $tipoIn5 += 1;
                        break;
                    case '6':
                        $tipoIn6 += 1;
                        break;
                    case '7':
                        $tipoIn7 += 1;
                        break;
                    case '8':
                        $tipoNA += 1;
                        break;
                }
            } else {
                // promedio de ingresos rural
                switch ($item->ingresos_zona_rural) {
                    case '1':
                        $tipoIn1R += 1;
                        break;
                    case '2':
                        $tipoIn2R += 1;
                        break;
                    case '3':
                        $tipoIn3R += 1;
                        break;
                    case '4':
                        $tipoIn4R += 1;
                        break;
                    case '5':
                        $tipoIn5R += 1;
                        break;
                    case '6':
                        $tipoIn6R += 1;
                        break;
                    case '7':
                        $tipoIn7R += 1;
                        break;
                    case '8':
                        $tipoNAR += 1;
                        break;
                }
            }
        }

        $info = [
            'tipoIn1' => $tipoIn1,
            'tipoIn2' => $tipoIn2,
            'tipoIn3' => $tipoIn3,
            'tipoIn4' => $tipoIn4,
            'tipoIn5' => $tipoIn5,
            'tipoIn6' => $tipoIn6,
            'tipoIn7' => $tipoIn7,
            'tipoNA' => $tipoNA,
            'tipoIn1R' => $tipoIn1R,
            'tipoIn2R' => $tipoIn2R,
            'tipoIn3R' => $tipoIn3R,
            'tipoIn4R' => $tipoIn4R,
            'tipoIn5R' => $tipoIn5R,
            'tipoIn6R' => $tipoIn6R,
            'tipoIn7R' => $tipoIn7R,
            'tipoNAR' => $tipoNAR,
        ];

        return $info;
    }

    public static function servicios_hogares($alias, $tipo, $id){
        if($tipo == "todos"){
            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias.'.estratificacion', 'caracterizacion.id','estratificacion.id_jefe')
            ->where("caracterizacion.estado", "Activo")
            ->select("estratificacion.tiene_pc_escritorio","estratificacion.tiene_pc_portatil","estratificacion.cuenta_internet")
            ->get();
        }else{
            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->join($alias.'.estratificacion', 'caracterizacion.id','estratificacion.id_jefe')
            ->where("caracterizacion.estado", "Activo")
            ->where('hogar.id_'.$tipo, $id)
            ->select("estratificacion.tiene_pc_escritorio","estratificacion.tiene_pc_portatil","estratificacion.cuenta_internet")
            ->get();
        }

        $tiene_pc = 0;
        $cuenta_internet = 0;

        foreach ($hogares as &$item) {
            if($item->tiene_pc_escritorio == "SI" || $item->tiene_pc_portatil == "SI"){
                $tiene_pc += 1;
            }
            if($item->cuenta_internet == "SI"){
                $cuenta_internet += 1;
            }
        }

        if(count($hogares) > 0){
            $porncen_pc = ($tiene_pc / count($hogares)) * 100;
            $porncen_internet = ($cuenta_internet / count($hogares)) * 100;
        }else{
            $porncen_pc = 0;
            $porncen_internet = 0;
        }

        $info = [
            'porncen_pc' => $porncen_pc,
            'porncen_internet' => $porncen_internet,
            'tiene_pc' => $tiene_pc,
            'cuenta_internet' => $cuenta_internet,
            'hogares' => count($hogares)
        ];

        return $info;
    }

    public static function jefes_menores_edad($alias, $tipo, $id){
        if($tipo == "todos"){
            $hogares_m =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where("caracterizacion.estado", "Activo")
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) <= 18')
            ->select("*")
            ->count();

            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where("caracterizacion.estado", "Activo")  
            ->select("*")
            ->count();     
        }else{
            $hogares_m =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where("caracterizacion.estado", "Activo")
            ->where('hogar.id_'.$tipo, $id)
            ->whereRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) <= 18')
            ->select("*")
            ->count();

            $hogares =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias.'.hogar', 'hogar.id','caracterizacion.id_hogar')
            ->where("caracterizacion.estado", "Activo")
            ->where('hogar.id_'.$tipo, $id)
            ->select("*")
            ->count();
        }

        if($hogares_m != 0 && $hogares != 0){
            $porcen_menores = ($hogares_m / $hogares ) * 100;
        }else{
            $porcen_menores = 0;
        }

        $info = [
            'porcen_menores' => $porcen_menores,
            'hogares_m' => $hogares_m,
            'hogares' => $hogares,
        ];

        return $info;
    }
            
}
