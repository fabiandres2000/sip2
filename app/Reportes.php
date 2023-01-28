<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    public static function gestantes($rango, $tipo, $alias)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'caracterizacion.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'caracterizacion.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'caracterizacion.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'caracterizacion.nivel_escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'caracterizacion.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'caracterizacion.clasificacion')

            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.sexo', 'FEMENINO')
            ->where('caracterizacion.embarazo', 'SI')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "caracterizacion.embarazo_multiple"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120");
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'integrantes.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'integrantes.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'integrantes.escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'integrantes.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'integrantes.clasificacion')

            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.sexo', 'FEMENINO')
            ->where('integrantes.embarazo', 'SI')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "integrantes.embarazo_multiple"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120");
        }

        $consulta->union($consultai);

        if ($tipo == "Todos") {
            return $consulta->get();
        } else {
            return $consulta->paginate(10);
        }
    }

    public static function poblacionTotalMujeres($alias)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')

            ->where('caracterizacion.estado', 'Activo')
            ->where('caracterizacion.sexo', 'FEMENINO')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.sexo AS genero",
                "ocupaciones.descripcion as ocupacion"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->where('integrantes.estado', 'Activo')
            ->where('integrantes.sexo', 'FEMENINO')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.sexo AS genero",
                "ocupaciones.descripcion as ocupacion"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad");

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function nutricional($rango, $tipo, $alias)
    {

        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'caracterizacion.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'caracterizacion.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'caracterizacion.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'caracterizacion.nivel_escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'caracterizacion.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'caracterizacion.clasificacion')

            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "caracterizacion.sexo",
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("CONCAT_WS('','jefe') as tipo")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120");
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.colegios', 'colegios.id', 'integrantes.colegio')
            ->leftjoin($alias . '.parentescos', 'parentescos.id', 'integrantes.parentesco')
            ->leftjoin($alias . '.estadocivil', 'estadocivil.id', 'integrantes.estado_civil')
            ->leftjoin($alias . '.escolaridad', 'escolaridad.id', 'integrantes.escolaridad')
            ->leftjoin($alias . '.etnias', 'etnias.id', 'integrantes.etnia')
            ->leftjoin($alias . '.clasificacion_etnia', 'clasificacion_etnia.id', 'integrantes.clasificacion')

            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "ocupaciones.descripcion AS textoOcupacion",
                "colegios.descripcion as textoColegio",
                "parentescos.descripcion AS textoParentesco",
                "estadocivil.descripcion AS textoEstado",
                "escolaridad.descripcion AS textoNivel",
                "integrantes.sexo",
            )         
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS textoEps"
                . " ")
            ->selectRaw("CONCAT_WS('','inte') as tipo")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion");

        if ($rango == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0");
        } else if ($rango == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5");
        } else if ($rango == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11");
        } else if ($rango == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17");
        } else if ($rango == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28");
        } else if ($rango == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59");
        } else if ($rango == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120");
        }

        $consulta->union($consultai);
        // dd($consulta->get());die;
        if ($tipo == "Todos") {
            $c =  $consulta->get();
        } else {
            $c =  $consulta->paginate(10);
        }

        //enfermedades infecciosas
        foreach ($c as &$item) {
            if($item->tipo == "inte"){
                $item->enfer_infec =  DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->join($alias . '.enfermedadesinf', 'enfermedadesinf.id', 'enfermedades_integrantes.id_enfermedad')
                ->where('enfermedades_integrantes.id_inte', $item->id)
                ->where('enfermedades_integrantes.tipo', 'Infecciosa')
                ->select(
                    "enfermedades_integrantes.tiempo AS tiempo",
                    "enfermedades_integrantes.tratamiento AS atendido",
                    "enfermedadesinf.descripcion AS enfermedad",
                )->get();
            }else{
                $item->enfer_infec =  DB::connection('mysql')->table($alias . '.enfermedades_jefes')
                ->join($alias . '.enfermedadesinf', 'enfermedadesinf.id', 'enfermedades_jefes.id_enfermedad')
                ->where('enfermedades_jefes.id_jefe', $item->id)
                ->where('enfermedades_jefes.tipo', 'Infecciosa')
                ->select(
                    "enfermedades_jefes.tiempo AS tiempo",
                    "enfermedades_jefes.tratamiento AS atendido",
                    "enfermedadesinf.descripcion AS enfermedad",
                )->get();
            }
        }

        //enfermedades cronicas
        foreach ($c as &$item) {
            if($item->tipo == "inte"){
                $item->enfer_cro =  DB::connection('mysql')->table($alias . '.enfermedades_integrantes')
                ->join($alias . '.enfermedadescro', 'enfermedadescro.id', 'enfermedades_integrantes.id_enfermedad')
                ->where('enfermedades_integrantes.id_inte', $item->id)
                ->where('enfermedades_integrantes.tipo', 'Cronica')
                ->select(
                    "enfermedades_integrantes.tiempo AS tiempo",
                    "enfermedades_integrantes.tratamiento AS atendido",
                    "enfermedadescro.descripcion AS enfermedad",
                )->get();
            }else{
                $item->enfer_cro =  DB::connection('mysql')->table($alias . '.enfermedades_jefes')
                ->join($alias . '.enfermedadescro', 'enfermedadescro.id', 'enfermedades_jefes.id_enfermedad')
                ->where('enfermedades_jefes.id_jefe', $item->id)
                ->where('enfermedades_jefes.tipo', 'Cronica')
                ->select(
                    "enfermedades_jefes.tiempo AS tiempo",
                    "enfermedades_jefes.tratamiento AS atendido",
                    "enfermedadescro.descripcion AS enfermedad",
                )->get();
            }
        }
        
        return $c;
    }

    public static function listarcronicas($alias, $data)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftJoin($alias . ".enfermedades_jefes", "enfermedades_jefes.id_jefe", "caracterizacion.id")
            ->leftJoin($alias . ".enfermedadescro", "enfermedades_jefes.id_enfermedad", "enfermedadescro.id")
            ->where("enfermedades_jefes.tipo", "Cronica")
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.sexo AS genero",
                "enfermedades_jefes.tiempo AS tiempo",
                "enfermedades_jefes.tratamiento AS atendido",
                "enfermedadescro.descripcion AS enfermedad",
                "ocupaciones.descripcion as ocupacion",
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,
        caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
        corregimientos.descripcion,hogar.direccion) as localizacion")
        ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha)) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 60 AND 120");
        }

        if ($data["datos"]["enfermedad"] != "Todas") {
            $consulta->where("enfermedades_jefes.id_enfermedad", $data["datos"]["enfermedad"]);
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftJoin($alias . ".enfermedades_integrantes", "enfermedades_integrantes.id_inte", "integrantes.id")
            ->leftJoin($alias . ".enfermedadescro", "enfermedades_integrantes.id_enfermedad", "enfermedadescro.id")
            ->where("enfermedades_integrantes.tipo", "Cronica")
            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.sexo AS genero",
                "enfermedades_integrantes.tiempo AS tiempo",
                "enfermedades_integrantes.tratamiento AS atendido",
                "enfermedadescro.descripcion AS enfermedad",
                "ocupaciones.descripcion as ocupacion",
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,
            integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
            corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha)) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha)) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha)) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 60 AND 120");
        }

        if ($data["datos"]["enfermedad"] != "Todas") {
            $consultai->where("enfermedades_integrantes.id_enfermedad", $data["datos"]["enfermedad"]);
        }

        $consulta->union($consultai);
        
        return $consulta->get();
        
    }

    public static function listarmigrantes($alias, $data, $tipo)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftjoin($alias . '.migra', 'migra.id_integrante', 'caracterizacion.id')
            ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
            ->where("caracterizacion.migrante", "SI")
            ->where("migra.opci", "JEFE")
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.sexo AS genero",
                "ocupaciones.descripcion as ocupacion",
                "paises.nombre as pais"
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,
        caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
        corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120");
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftjoin($alias . '.migra', 'migra.id_integrante', 'integrantes.id')
            ->leftjoin($alias . '.paises', 'migra.pais', 'paises.id')
            ->where("integrantes.migrante", "SI")
            ->where("migra.opci", "INTE")
            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.sexo AS genero",
                "ocupaciones.descripcion as ocupacion",
                "paises.nombre as pais"
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,
            integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
            corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120");
        }

        $consulta->union($consultai);

        if ($tipo == "Todos") {
            return $consulta->get();
        } else {
            return $consulta->paginate(10);
        }
    }

    public static function enfermedadcronica($alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.enfermedadescro')
            ->orderBy('descripcion', 'asc')
            ->where('estado', 'Activo')
            ->where("id", $id)
            ->first();
    }

    public static function discapacitados($tipo, $id, $alias){
        
        if($tipo == "todos"){
            $jefe_discapacidad=  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->select('caracterizacion.*')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->where('caracterizacion.discapacidad','<>','NINGUNA')
            ->get();

            $integrantes_discapacidad = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->select('integrantes.*')
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->where('integrantes.discapacidad','<>','NINGUNA')
            ->get();
        }else{

            $jefe_discapacidad=  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->where('caracterizacion.discapacidad','<>','NINGUNA')
            ->select('caracterizacion.*')
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion") 
            ->get();

            $integrantes_discapacidad = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->where('integrantes.discapacidad','<>','NINGUNA')
            ->select('integrantes.*')
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->get();
        }

        $discapacitados = array();

        foreach ($jefe_discapacidad as $item) {     
            array_push($discapacitados, $item);     
        }

        foreach ($integrantes_discapacidad as $item) {     
            array_push($discapacitados, $item);     
        }

        return $discapacitados;
    }

    public static function adulto_mayor($tipo, $id, $alias){
        
        if($tipo == "todos"){
            $jefes=  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->select('caracterizacion.*')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->get();

            $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->select('integrantes.*')
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->get();
        }else{

            $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('caracterizacion.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select('caracterizacion.*')
            ->selectRaw('TIMESTAMPDIFF(YEAR, caracterizacion.fecha_nacimiento, CURDATE()) as edad')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion") 
            ->get();

            $integrantes = DB::connection('mysql')->table($alias.'.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where('integrantes.estado', 'Activo')
            ->where('hogar.id_'.$tipo, $id)
            ->select('integrantes.*')
            ->selectRaw('TIMESTAMPDIFF(YEAR, integrantes.fecha_nac, CURDATE()) as edad')
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->get();
        }

        $adulto_mayor = array();

        foreach ($jefes as $item) {     
            if($item->edad >= 60 ){
                array_push($adulto_mayor, $item);   
            }  
        }

        foreach ($integrantes as $item) {     
            if($item->edad >= 60 ){
                array_push($adulto_mayor, $item);   
            } 
        }

        return $adulto_mayor;
    }

    public static function listarinfecciosas($alias, $data)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
            ->leftJoin($alias . ".enfermedades_jefes", "enfermedades_jefes.id_jefe", "caracterizacion.id")
            ->leftJoin($alias . ".enfermedadesinf", "enfermedades_jefes.id_enfermedad", "enfermedadesinf.id")
            ->where("enfermedades_jefes.tipo", "Infecciosa")
            ->where('caracterizacion.estado', 'Activo')
            ->select("caracterizacion.id",
                "caracterizacion.identificacion",
                "caracterizacion.sexo AS genero",
                "enfermedades_jefes.tiempo AS tiempo",
                "enfermedades_jefes.tratamiento AS atendido",
                "enfermedadesinf.descripcion AS enfermedad",
                "ocupaciones.descripcion as ocupacion",
            )
            ->selectRaw("CASE "
                . " WHEN caracterizacion.afiliacion_entidad IS NULL THEN '' "
                . " WHEN caracterizacion.afiliacion_entidad='OTRA' THEN 'OTRA' "
                . " WHEN caracterizacion.afiliacion_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,
        caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
        corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 60 AND 120");
        }

        if ($data["datos"]["enfermedad"] != "Todas") {
            $consulta->where("enfermedades_jefes.id_enfermedad", $data["datos"]["enfermedad"]);
        }

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".vivienda", "hogar.id", "vivienda.id_hogar")
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
            ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
            ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
            ->leftJoin($alias . ".enfermedades_integrantes", "enfermedades_integrantes.id_inte", "integrantes.id")
            ->leftJoin($alias . ".enfermedadesinf", "enfermedades_integrantes.id_enfermedad", "enfermedadesinf.id")
            ->where("enfermedades_integrantes.tipo", "Infecciosa")
            ->where('integrantes.estado', 'Activo')
            ->select("integrantes.id",
                "integrantes.identificacion",
                "integrantes.sexo AS genero",
                "enfermedades_integrantes.tiempo AS tiempo",
                "enfermedades_integrantes.tratamiento AS atendido",
                "enfermedadesinf.descripcion AS enfermedad",
                "ocupaciones.descripcion as ocupacion",
            )
            ->selectRaw("CASE "
                . " WHEN integrantes.afi_entidad IS NULL THEN '' "
                . " WHEN integrantes.afi_entidad='OTRA' THEN 'OTRA' "
                . " WHEN integrantes.afi_entidad='NINGUNA' THEN 'NINGUNA' "
                . " ELSE administradoras.adm_nombre "
                . " END AS eps"
                . " ")
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,
            integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
            corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 60 AND 120");
        }

        if ($data["datos"]["enfermedad"] != "Todas") {
            $consultai->where("enfermedades_integrantes.id_enfermedad", $data["datos"]["enfermedad"]);
        }

        $consulta->union($consultai);

        return $consulta->get();
        
    }

    public static function descolarizados($alias, $data)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
        ->join($alias . ".escolaridad", "caracterizacion.nivel_escolaridad", "escolaridad.id")
        ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->where('caracterizacion.estado', 'Activo')
        ->whereIn('caracterizacion.nivel_escolaridad', [1,4,12,13])
        ->select("caracterizacion.id","caracterizacion.identificacion","caracterizacion.sexo AS genero","ocupaciones.descripcion as ocupacion","escolaridad.descripcion as nivel_escolaridad")        
        ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
        ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
        ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consulta->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) BETWEEN 60 AND 120");
        }


        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
        ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
        ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
        ->join($alias . ".escolaridad", "integrantes.escolaridad", "escolaridad.id")
        ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->where('integrantes.estado', 'Activo')
        ->whereIn('integrantes.escolaridad', [1,4,12,13])
        ->select("integrantes.id","integrantes.identificacion","integrantes.sexo AS genero","ocupaciones.descripcion as ocupacion","escolaridad.descripcion as nivel_escolaridad")        
        ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
        ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
        ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) AS edad");

        if ($data["datos"]["rangoEdad"] == "0-") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 0 AND 0");
        } else if ($data["datos"]["rangoEdad"] == "r1-5") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 1 AND 5");
        } else if ($data["datos"]["rangoEdad"] == "r6-11") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 6 AND 11");
        } else if ($data["datos"]["rangoEdad"] == "r12-17") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 12 AND 17");
        } else if ($data["datos"]["rangoEdad"] == "r18-28") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 18 AND 28");
        } else if ($data["datos"]["rangoEdad"] == "r29-59") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 29 AND 59");
        } else if ($data["datos"]["rangoEdad"] == "r60+") {
            $consultai->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) BETWEEN 60 AND 120");
        }

        $consulta->union($consultai);

        return $consulta->get();
        
    }

    public static function nivel_socioeconomico($alias){

        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
        ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
        ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
        ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'caracterizacion.afiliacion_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'caracterizacion.ocupacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select("caracterizacion.id as id_jefe","caracterizacion.identificacion","caracterizacion.sexo AS genero","ocupaciones.descripcion as ocupacion","caracterizacion.id_hogar")        
        ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
        ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
        ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) AS edad");

        
        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
        ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
        ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
        ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'hogar.id_mun');
        })
        ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
        ->leftJoin($alias . ".veredas", "veredas.id", "hogar.id_vereda")
        ->leftjoin($alias . '.administradoras', 'administradoras.id', 'integrantes.afi_entidad')
        ->leftjoin($alias . '.ocupaciones', 'ocupaciones.id', 'integrantes.ocupacion')
        ->where('integrantes.estado', 'Activo')
        ->select("integrantes.jefe as id_jefe","integrantes.identificacion","integrantes.sexo AS genero","ocupaciones.descripcion as ocupacion","integrantes.id_hogar")        
        ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
        ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
        ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) AS edad");

        $consulta->union($consultai);
        $integrantes = $consulta->get();

        $array_bajos = array();
        
        foreach ($integrantes as $item) {
            $item->riesgo_vivienda =  DB::connection('mysql')->table($alias.'.riesgo_socioeconomico_vivienda')
            ->where('riesgo_socioeconomico_vivienda.id_hogar', $item->id_hogar)
            ->select("riesgo_socioeconomico_vivienda.total")
            ->first();

            switch (true) {
                case $item->riesgo_vivienda->total >= 0 && $item->riesgo_vivienda->total <= 100:
                    $item->riesgo_vivienda->valor = "Bajo - Bajo";
                    break;
                case $item->riesgo_vivienda->total >= 100.1 && $item->riesgo_vivienda->total <= 300:
                    $item->riesgo_vivienda->valor = "Bajo";
                    break;
                case $item->riesgo_vivienda->total >= 300.1 && $item->riesgo_vivienda->total <= 475:
                    $item->riesgo_vivienda->valor = "Medio - Bajo";
                    break;
                case $item->riesgo_vivienda->total >= 475.1 && $item->riesgo_vivienda->total <= 650:
                    $item->riesgo_vivienda->valor = "Medio";
                    break;  
                case $item->riesgo_vivienda->total >= 650.1 && $item->riesgo_vivienda->total <= 825:
                    $item->riesgo_vivienda->valor = "Medio - Alto";
                    break;
                case $item->riesgo_vivienda->total >= 825.1 && $item->riesgo_vivienda->total <= 1000:
                    $item->riesgo_vivienda->valor = "Alto";
                    break;  
            }

    
            $item->riesgo_hogar = DB::connection('mysql')->table($alias.'.riesgo_socioeconomico_hogar')
            ->where('riesgo_socioeconomico_hogar.id_jefe', $item->id_jefe)
            ->select("riesgo_socioeconomico_hogar.total")
            ->first();

            switch (true) {
                case $item->riesgo_hogar->total >=0 && $item->riesgo_hogar->total <=50:
                    $item->riesgo_hogar->valor = "Bajo - Bajo";
                    break;
                case $item->riesgo_hogar->total >=51 && $item->riesgo_hogar->total <=110:
                    $item->riesgo_hogar->valor = "Bajo";
                    break;
                case $item->riesgo_hogar->total >=111 && $item->riesgo_hogar->total <=200:
                    $item->riesgo_hogar->valor = "Medio - Bajo";
                    break;
                case $item->riesgo_hogar->total >=201 && $item->riesgo_hogar->total <=300:
                    $item->riesgo_hogar->valor = "Medio";
                    break;  
                case $item->riesgo_hogar->total >=301 && $item->riesgo_hogar->total <=400:
                    $item->riesgo_hogar->valor = "Medio - Alto";
                    break;
                case $item->riesgo_hogar->total >=400 && $item->riesgo_hogar->total <=500:
                    $item->riesgo_hogar->valor = "Alto";
                    break;  
            }

            if($item->riesgo_hogar->valor == "Bajo" || $item->riesgo_hogar->valor == "Bajo - Bajo" || $item->riesgo_vivienda->valor == "Bajo" || $item->riesgo_vivienda->valor == "Bajo - Bajo"){
                array_push($array_bajos, $item);
            }
        }
        
       return $array_bajos;
    }

    public static function riesgo_salud($alias, $data)
    {

        if($data["datos"]["riesgosSalud"] == "alteraciones_transtornos_audicion"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "alteraciones_transtornos_audicion_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "alteraciones_transtornos_audicion_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "alteraciones_transtornos_audicion_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "alteraciones_transtornos_audicion_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "alteraciones_transtornos_audicion_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "alteraciones_transtornos_audicion_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "alteraciones_transtornos_audicion_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }
        }

        if($data["datos"]["riesgosSalud"] == "alteraciones_transtornos_visuales"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "alteraciones_transtornos_visuales_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "alteraciones_transtornos_visuales_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "alteraciones_transtornos_visuales_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "alteraciones_transtornos_visuales_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "alteraciones_transtornos_visuales_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "alteraciones_transtornos_visuales_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "alteraciones_transtornos_visuales_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }
        }

        if($data["datos"]["riesgosSalud"] == "cancer"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "cancer_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "cancer_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "cancer_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "cancer_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "cancer_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "cancer_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "cancer_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "consumo_spa"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "consumo_spa_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "consumo_spa_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "consumo_spa_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "consumo_spa_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "consumo_spa_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "consumo_spa_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "consumo_spa_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "enfermedad_cardiovascular"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "enfermedad_cardiovascular_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "enfermedad_cardiovascular_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "enfermedad_cardiovascular_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "enfermedad_cardiovascular_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "enfermedad_cardiovascular_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "enfermedad_cardiovascular_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "enfermedad_cardiovascular_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "enfermedades_infecciosas"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "enfermedades_infecciosas_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "enfermedades_infecciosas_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "enfermedades_infecciosas_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "enfermedades_infecciosas_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "enfermedades_infecciosas_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "enfermedades_infecciosas_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "enfermedades_infecciosas_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "enfermedades_respiratorias"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "enfermedades_respiratorias_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "enfermedades_respiratorias_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "enfermedades_respiratorias_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "enfermedades_respiratorias_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "enfermedades_respiratorias_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "enfermedades_respiratorias_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "enfermedades_respiratorias_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "enfermedades_zoonoticas"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "enfermedades_zoonoticas_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "enfermedades_zoonoticas_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "enfermedades_zoonoticas_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "enfermedades_zoonoticas_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "enfermedades_zoonoticas_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "enfermedades_zoonoticas_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "enfermedades_zoonoticas_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "problemas_salud_mental"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "problemas_salud_mental_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "problemas_salud_mental_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "problemas_salud_mental_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "problemas_salud_mental_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "problemas_salud_mental_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "problemas_salud_mental_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "problemas_salud_mental_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "riesgo_delgadez"){
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "riesgo_delgadez_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "riesgo_delgadez_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "riesgo_delgadez_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "riesgo_delgadez_R");

            $array_completo = array();

           
            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }
        }

        if($data["datos"]["riesgosSalud"] == "riesgo_muerte"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "riesgo_muerte_I");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "riesgo_muerte_I");
           

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }
   
        }

        if($data["datos"]["riesgosSalud"] == "riesgo_sobrepeso"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "riesgo_sobrepeso_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "riesgo_sobrepeso_R");
           
            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }
   
        }

        if($data["datos"]["riesgosSalud"] == "riesgo_talla_baja"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "riesgo_talla_baja_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "riesgo_talla_baja_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "riesgo_talla_baja_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "riesgo_talla_baja_R");
            
            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

        }

        if($data["datos"]["riesgosSalud"] == "riesgos_desnutricion_aguda"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "riesgos_desnutricion_aguda_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "riesgos_desnutricion_aguda_R");
           

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }
   
        }

        if($data["datos"]["riesgosSalud"] == "riesgos_desnutricion_global"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "riesgos_desnutricion_global_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "riesgos_desnutricion_global_R");
           

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }
   
        }

        if($data["datos"]["riesgosSalud"] == "salud_bucal"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "salud_bucal_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "salud_bucal_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "salud_bucal_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "salud_bucal_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "salud_bucal_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "salud_bucal_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "salud_bucal_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "transtornos_asociados_spa"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "transtornos_asociados_spa_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "transtornos_asociados_spa_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "transtornos_asociados_spa_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "transtornos_asociados_spa_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "transtornos_asociados_spa_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "transtornos_asociados_spa_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "transtornos_asociados_spa_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "transtornos_degenartivos"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "transtornos_degenartivos_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "transtornos_degenartivos_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "transtornos_degenartivos_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "transtornos_degenartivos_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "transtornos_degenartivos_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "transtornos_degenartivos_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "transtornos_degenartivos_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        if($data["datos"]["riesgosSalud"] == "violencias"){
            $menores_1_a = self:: riesgo_salud_por_edad($alias, "riesgos_salud_men1", "violencias_R");
            $de1_a_5 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de1a5", "violencias_R");
            $de_6_a_11 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de6a11", "violencias_R");
            $de_12_a_17 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de12a17", "violencias_R");
            $de_18_a_28 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de18a28", "violencias_R");
            $de_29_a_59 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de29a59", "violencias_R");
            $de_60 = self:: riesgo_salud_por_edad($alias, "riesgos_salud_de60", "violencias_R");

            $array_completo = array();

            foreach ($menores_1_a as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de1_a_5 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_6_a_11 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_12_a_17 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_18_a_28 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_29_a_59 as $item) {
                array_push($array_completo, $item);
            }

            foreach ($de_60 as $item) {
                array_push($array_completo, $item);
            }     
        }

        foreach ($array_completo as $key) {
            if ($key->puntaje_riesgo == 1 || $key->puntaje_riesgo == 0) {
                $key->eficacia = "Inexistente";
            } else {
                if ($key->puntaje_riesgo == 2) {
                    $key->eficacia = "Bajo";
                } else {
                    if ($key->puntaje_riesgo == 3) {
                        $key->eficacia = "Moderado";
                    } else {
                        $key->eficacia = "Alto";
                    }
                }
            }
        }  

        
        if($data["datos"]["nivel"] != "Todos"){
            $array_filtrado = array();
            foreach ($array_completo as $key) {
                if ($key->eficacia == $data["datos"]["nivel"]) {
                    array_push($array_filtrado, $key);
                }
            }
            return $array_filtrado;
        }else{
            return $array_completo;
        }
    }

    public static function riesgo_salud_por_edad($alias, $rango, $riesgo){
        if($rango == "riesgos_salud_men1"  || $rango == "riesgos_salud_de1a5" || $rango == "riesgos_salud_de6a11" ){
            $consultai = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where($rango.'.estado', 'Activo')
            ->select("integrantes.id","integrantes.identificacion","integrantes.sexo AS genero", $rango.'.'.$riesgo.' as puntaje_riesgo')        
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) AS edad");

            return $consultai->get();
        }else{

            $consultai = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.integrantes',$alias.'.integrantes.id',$alias.'.'.$rango.'.id_inte') 
            ->join($alias . '.hogar', 'hogar.id', 'integrantes.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where($rango.'.estado', 'Activo')
            ->where($rango.'.opci', 'INTE')
            ->select("integrantes.id","integrantes.identificacion","integrantes.sexo AS genero", $rango.'.'.$riesgo.' as puntaje_riesgo')        
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, hogar.fecha) AS edad");

            $consulta = DB::connection('mysql')->table($alias.'.'.$rango)
            ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id',$alias.'.'.$rango.'.id_inte') 
            ->join($alias . '.hogar', 'hogar.id', 'caracterizacion.id_hogar')
            ->join($alias . ".dptos", "dptos.codigo", "hogar.id_dpto")
            ->leftJoin($alias . ".barrios", "barrios.id", "hogar.id_barrio")
            ->join($alias . '.muni', function ($join) {
                $join->on('muni.coddep', '=', 'dptos.codigo');
                $join->on('muni.codmun', '=', 'hogar.id_mun');
            })
            ->leftJoin($alias . ".corregimientos", "corregimientos.id", "hogar.id_corre")
            ->where($rango.'.estado', 'Activo')
            ->where($rango.'.opci', 'JEFE')
            ->select("caracterizacion.id","caracterizacion.identificacion","caracterizacion.sexo AS genero", $rango.'.'.$riesgo.' as puntaje_riesgo')        
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) AS edad");

            $consulta->union($consultai);

            return $consulta->get();
        }    
    }
}
