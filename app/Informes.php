<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Informes extends Model
{

    public static function poblacionTotal($alias)
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
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,
        caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
        corregimientos.descripcion,hogar.direccion) as localizacion")
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
            ->selectRaw("CONCAT_WS(' ',integrantes.pape,integrantes.sape,
            integrantes.pnom,integrantes.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,
            corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edad");

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function poblacionMigrante($alias)
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function reguladoMigrante($alias)
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
            ->where("migra.registrado", "SI")
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
            ->where("migra.registrado", "SI")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function noReguladoMigrante($alias)
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
            ->where("migra.registrado", "NO")
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
            ->where("migra.registrado", "NO")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes0($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 0")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 0 AND 0")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes115($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 1 AND 5")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 1 AND 5")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes611($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 11")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 6 AND 11")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes1217($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 12 AND 17")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 12 AND 17")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes1828($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 28")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 18 AND 28")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes2959($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 29 AND 59")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 29 AND 59")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function migrantes60($alias)
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 60 AND 120")
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
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN 60 AND 120")
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

        $consulta->union($consultai);

        return $consulta->count();

    }

    public static function ocupacionesMigrantes($alias)
    {
        $query = "SELECT id,descripcion,SUM(cont) as cont FROM (SELECT o.id,o.descripcion,COUNT(*) as cont FROM " . $alias . ".integrantes i INNER JOIN " . $alias . ".ocupaciones o ON i.ocupacion = o.id WHERE migrante = 'SI' AND i.estado='Activo' AND o.id <> 9993 GROUP BY i.ocupacion
        UNION
        SELECT o.id,o.descripcion,COUNT(*) as cont FROM " . $alias . ".caracterizacion c INNER JOIN " . $alias . ".ocupaciones o ON o.id = c.ocupacion where migrante = 'SI' AND c.estado='Activo' AND o.id <> 9993 GROUP BY c.ocupacion
        ) as cons GROUP BY cons.id ORDER BY COUNT(*) desc";

        DB::select("CREATE OR REPLACE VIEW " . $alias . ".ocupacionesmigrantes AS (" . $query . ")");

        $consulta = DB::table($alias . ".ocupacionesmigrantes")
            ->orderBy("cont", "desc")
            ->limit(5)
            ->get();

        return $consulta;
    }

    public static function principalespaises($alias)
    {

        $consulta = DB::select("select nombre,sum(total) as total from ((select paises.nombre,count(*) as total from " . $alias . ".caracterizacion
        inner join " . $alias . ".migra on migra.id_integrante = caracterizacion.id
        inner join " . $alias . ".paises on migra.pais = paises.id
        where caracterizacion.migrante = 'SI' and migra.opci = 'JEFE'
        group by paises.id)
        union
        (select paises.nombre, count(*) as total from " . $alias . ".integrantes
        inner join " . $alias . ".migra on migra.id_integrante = integrantes.id
        inner join " . $alias . ".paises on migra.pais = paises.id
        where integrantes.migrante = 'SI' and migra.opci = 'INTE'
        group by paises.id)) as cons group by nombre order by total desc");
        return $consulta;

    }

    public static function migrantessexo($alias, $sexo, $edad1, $edad2)
    {
        $consulta = DB::connection('mysql')->table($alias . '.caracterizacion')
            ->where("caracterizacion.migrante", "SI")
            ->where('caracterizacion.estado', 'Activo')
            ->where("sexo", $sexo)
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN " . $edad1 . " AND " . $edad2)
            ->select("caracterizacion.id")
            ->count();

        $consultai = DB::connection('mysql')->table($alias . '.integrantes')
            ->where("integrantes.migrante", "SI")
            ->where('integrantes.estado', 'Activo')
            ->where("sexo", $sexo)
            ->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) BETWEEN " . $edad1 . " AND " . $edad2)
            ->select("integrantes.id")
            ->count();

        return $consulta + $consultai;
    }

    public static function enfermedadesMigrantes($alias)
    {
        $consulta = DB::select("SELECT *,SUM(cont) as total FROM (
            SELECT e.id,e.tipo,IF(ec.descripcion IS NULL,ei.descripcion,ec.descripcion) as enfe,COUNT(*) as cont FROM " . $alias . ".integrantes i
            INNER JOIN " . $alias . ".enfermedades_integrantes e ON i.id = e.id_inte
            LEFT JOIN " . $alias . ".enfermedadescro ec ON ec.id = e.id_enfermedad AND e.tipo = 'Cronica'
            LEFT JOIN " . $alias . ".enfermedadesinf ei ON ei.id = e.id_enfermedad AND e.tipo = 'Infecciosa'
            WHERE migrante = 'SI' AND i.estado='Activo'
            GROUP BY e.id
            UNION
            SELECT e.id,e.tipo,IF(ec.descripcion IS NULL,ei.descripcion,ec.descripcion) as enfe,COUNT(*) as cont FROM " . $alias . ".caracterizacion c
            INNER JOIN " . $alias . ".enfermedades_jefes e ON e.id_jefe = c.id
            LEFT JOIN " . $alias . ".enfermedadescro ec ON ec.id = e.id_enfermedad AND e.tipo = 'Cronica'
            LEFT JOIN " . $alias . ".enfermedadesinf ei ON ei.id = e.id_enfermedad AND e.tipo = 'Infecciosa'
            where migrante = 'SI' AND c.estado='Activo'
            GROUP BY e.id
            ) as cons GROUP BY cons.enfe ORDER BY SUM(cont) desc LIMIT 5");

        return $consulta;
    }

    //////////////////////EMBARAZOS AFILIADOS//////////////////////////////
    public static function migrantesafiliacion($alias, $tipo)
    {
        if($tipo == "NINGUNA"){
            $nro_gestantes = DB::table($alias.".integrantes")
            ->select("integrantes.estado")
            ->where("integrantes.estado","Activo")
            ->where("integrantes.afi_entidad",$tipo)
            ->where("integrantes.migrante","SI")
            ->count();
    
            $nro_gestantes1 = DB::table($alias.".caracterizacion")
            ->select("caracterizacion.estado")
            ->where("caracterizacion.afiliacion_entidad",$tipo)
            ->where("caracterizacion.estado","Activo")
            ->where("caracterizacion.migrante","SI")
            ->count();
        }else{
            $nro_gestantes = DB::table($alias.".parpost")
            ->join($alias.".integrantes","integrantes.id","parpost.id_integrante")
            ->select("integrantes.estado")
            ->where("integrantes.estado","Activo")
            ->where("integrantes.afi_entidad","<>","NINGUNA")
            ->where("integrantes.migrante","SI")
            ->count();
    
            $nro_gestantes1 = DB::table($alias.".caracterizacion")
            ->select("caracterizacion.estado")
            ->where("caracterizacion.estado","Activo")
            ->where("caracterizacion.migrante","SI")
            ->where("caracterizacion.afiliacion_entidad","<>","NINGUNA")
            ->count();
        }
        
        $nro_gestantes = $nro_gestantes+$nro_gestantes1;
        
        return $nro_gestantes;
    }

    // informes de salud 
    public static function no_asegurado_menor_5($alias){
        $de0a1_rural = DB::table($alias.".men1a")
        ->join($alias.".integrantes", "integrantes.id", "men1a.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->whereIn("hogar.id_zona",  [2,3])
        ->get();

        $de0a1_urbano = DB::table($alias.".men1a")
        ->join($alias.".integrantes", "integrantes.id", "men1a.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->where("hogar.id_zona", 1)
        ->get();

        $de1a5_rural = DB::table($alias.".de1a5")
        ->join($alias.".integrantes", "integrantes.id", "de1a5.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->whereIn("hogar.id_zona",  [2,3])
        ->get();

        $de1a5_urbano = DB::table($alias.".de1a5")
        ->join($alias.".integrantes", "integrantes.id", "de1a5.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->where("hogar.id_zona", 1)
        ->get();

        $cantidad_personas = count($de0a1_rural) + count($de0a1_urbano) + count($de1a5_rural) + count($de1a5_urbano);

        $no_asegurado_urbano = array();
        $no_asegurado_rural = array();

        foreach ($de0a1_urbano as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }
        
        foreach ($de1a5_urbano as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }

        foreach ($de0a1_rural as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_rural, $key);
            }
        }
        
        foreach ($de1a5_rural as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_rural, $key);
            }
        }

        return  $respuesta = [
            "rural" => count($no_asegurado_rural),
            "urbano" => count($no_asegurado_urbano),
            "cantidad_personas" => $cantidad_personas
        ];

    }

    public static function no_asegurado_mayor_60($alias){
        $de60_rural = DB::table($alias.".de60")
        ->join($alias.".integrantes", "integrantes.id", "de60.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->whereIn("hogar.id_zona",  [2,3])
        ->get();

        $de60_urbano = DB::table($alias.".de60")
        ->join($alias.".integrantes", "integrantes.id", "de60.id_integrante")
        ->join($alias.".hogar", "hogar.id", "integrantes.id_hogar")
        ->select("integrantes.*")
        ->where("integrantes.estado","Activo")
        ->where("hogar.estado","Activo")
        ->where("hogar.id_zona", 1)
        ->get();

        $cantidad_personas = count($de60_rural) + count($de60_urbano);

        $no_asegurado_urbano = array();
        $no_asegurado_rural = array();

        foreach ($de60_rural as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }
        
        foreach ($de60_urbano as $key) {
            if($key->tipo_afiliacion == "PPNA"){
                array_push($no_asegurado_urbano, $key);
            }
        }

        return  $respuesta = [
            "rural" => count($no_asegurado_rural),
            "urbano" => count($no_asegurado_urbano),
            "cantidad_personas" => $cantidad_personas
        ];

    }

    public static function pobreza($alias){
        
        $viviendas =  DB::connection('mysql')->table($alias.'.hogar')
        ->join($alias.'.vivienda', 'hogar.id','vivienda.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->select("hogar.*", "vivienda.*")
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
        //Viviendas con niños en edad escolar que no asisten a la escuela

        foreach ($viviendas as &$item) {
            if($item->ninios_descolarizados == "SI" || $item->dependencia_economica == "SI" || $item->servicios_inadecuados == "SI" || $item->hacinamiento_critico == "SI" || $item->vivienda_inadecuada == "SI"){
                $item->inb = "SI";
            }else{
                $item->inb = "NO";
            }
        }
        

        $viviendas_inb = array();
        $viviendas_inb_urbano = array();
        $viviendas_inb_rural = array();

        foreach ($viviendas as &$item) {
            if($item->inb == "SI"){
              array_push($viviendas_inb, $item->id_hogar);
              if($item->id_zona == 1){
                array_push($viviendas_inb_urbano, $item->id_hogar);
              }else{
                array_push($viviendas_inb_rural, $item->id_hogar);
              }
            }
        }

        // total
        $integrantes_pobres =  DB::connection('mysql')->table($alias.'.integrantes')
        ->whereIn('integrantes.id_hogar', $viviendas_inb)
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes_pobres =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->whereIn('caracterizacion.id_hogar', $viviendas_inb)
        ->where('caracterizacion.estado', 'Activo')
        ->count();
        // total

        // rural 
        $integrantes_pobres_rural =  DB::connection('mysql')->table($alias.'.integrantes')
        ->whereIn('integrantes.id_hogar', $viviendas_inb_rural)
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes_pobres_rural =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->whereIn('caracterizacion.id_hogar', $viviendas_inb_rural)
        ->where('caracterizacion.estado', 'Activo')
        ->count();
        // rural 

        // urbano 
        $integrantes_pobres_urbano =  DB::connection('mysql')->table($alias.'.integrantes')
        ->whereIn('integrantes.id_hogar', $viviendas_inb_urbano)
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes_pobres_urbano =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->whereIn('caracterizacion.id_hogar', $viviendas_inb_urbano)
        ->where('caracterizacion.estado', 'Activo')
        ->count();
        // urbano 

        $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->count();

        $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->count();

        $poblacion_pobreza = $integrantes_pobres + $jefes_pobres;
        $poblacion_pobreza_rural = $integrantes_pobres_rural + $jefes_pobres_rural;
        $poblacion_pobreza_urbano = $integrantes_pobres_urbano + $jefes_pobres_urbano;
        $poblacion = $jefes + $integrantes;

        return  $respuesta = [
            "poblacion" => $poblacion,
            "poblacion_pobreza" => $poblacion_pobreza,
            "porcentaje_poblacion_pobreza" => ($poblacion_pobreza / $poblacion) * 100,
            "poblacion_pobreza_rural" => $poblacion_pobreza_rural,
            "porcentaje_poblacion_pobreza_rural" => ($poblacion_pobreza_rural / $poblacion_pobreza) * 100,
            "poblacion_pobreza_urbano" => $poblacion_pobreza_urbano,
            "porcentaje_poblacion_pobreza_urbano" => ($poblacion_pobreza_urbano / $poblacion_pobreza) * 100,
        ];

    }

    public static function por_nivel_escolaridad($alias){

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

        return  $porEscolaridad;

    }
    
    public static function desempleo($alias){   
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

        // por sexo
        $femeninoTD = 0;
        $masculinoTD = 0;
        foreach ($personasBuscaEmpleo as &$item) {
            if($item->sexo == "MASCULINO"){
                $masculinoTD += 1;
            }else{
                $femeninoTD += 1;
            }
        }
            
        $porcenfemeninoTD = 0;
        $porcenmasculinoTD = 0;
        if(count($personasBuscaEmpleo) > 0){
            $porcenfemeninoTD = ($femeninoTD/count($personasBuscaEmpleo))*100;
            $porcenmasculinoTD = ($masculinoTD/count($personasBuscaEmpleo))*100;
        }

        // por sexo

        $info = [
            'FT' => $FT,
            'TD' => $TD,
            'D' => $femeninoTD+$masculinoTD,
            'femeninoTD' => $femeninoTD,
            'masculinoTD' => $masculinoTD,
            'porcenfemeninoTD' => $porcenfemeninoTD,
            'porcenmasculinoTD' => $porcenmasculinoTD,
        ];

        return $info;
    }

    public static function enfermedades_cronicas($alias){
        $jefe =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->count();

        $integ = DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->count();

        $numero_personas = $jefe + $integ;

        $jefes_en_cro =  DB::connection('mysql')->table($alias.'.enfermedades_jefes')
        ->join($alias.'.caracterizacion', 'caracterizacion.id','enfermedades_jefes.id_jefe')
        ->where('caracterizacion.estado', 'Activo')
        ->where('enfermedades_jefes.tipo', 'Cronica')
        ->select("enfermedades_jefes.id_jefe")
        ->groupBy("enfermedades_jefes.id_jefe")
        ->get();

        $integ_en_cro = DB::connection('mysql')->table($alias.'.enfermedades_integrantes')
        ->join($alias.'.integrantes', 'integrantes.id','enfermedades_integrantes.id_inte')
        ->where('integrantes.estado', 'Activo')
        ->where('enfermedades_integrantes.tipo', 'Cronica')
        ->select("enfermedades_integrantes.id_inte")
        ->groupBy("enfermedades_integrantes.id_inte")
        ->get();

    
        $enfermedades_array = array();
        $enfermedades_array_2 = array();
        foreach ($jefes_en_cro as $key) {

            $enfermedades = DB::connection('mysql')->table($alias.'.enfermedades_jefes')
            ->join($alias.'.enfermedadescro', 'enfermedades_jefes.id_enfermedad','enfermedadescro.id')
            ->where('enfermedades_jefes.id_jefe', $key->id_jefe)
            ->where('enfermedades_jefes.tipo', 'Cronica')
            ->select("enfermedadescro.descripcion")
            ->get(); 
            
            foreach ($enfermedades as $key2) {
                array_push($enfermedades_array, $key2);
            }
        }

        foreach ($integ_en_cro as $key) {
            $enfermedades = DB::connection('mysql')->table($alias.'.enfermedades_integrantes')
            ->join($alias.'.enfermedadescro', 'enfermedades_integrantes.id_enfermedad','enfermedadescro.id')
            ->where('enfermedades_integrantes.id_inte', $key->id_inte)
            ->where('enfermedades_integrantes.tipo', 'Cronica')
            ->select("enfermedadescro.descripcion")
            ->get(); 

            foreach ($enfermedades as $key2) {
                array_push($enfermedades_array, $key2);
            }
        }

        foreach ($enfermedades_array as $item) {
            $encontrado = false;
            foreach ($enfermedades_array_2 as $item2) {
                if($item->descripcion == $item2->enfermedad){
                    $encontrado = true;
                    $item_encontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($enfermedades_array_2, (object)[
                    "enfermedad" => $item->descripcion,
                    "cantidad"  => 1,
                ]);
            }else{
                $item_encontrado->cantidad += 1;
            }
        }
        
      
        $respuesta = [
            "por_enfermedad" => $enfermedades_array_2,
            "numero_personas" => $numero_personas,
            "personas_con_enfermedades" => count($jefes_en_cro) + count($integ_en_cro),
            "porcentaje_personas_con_enfermedades" => ((count($jefes_en_cro) + count($integ_en_cro)) / $numero_personas) * 100,
        ];

        return $respuesta;
    }

    public static function enfermedades_infecciosas($alias){
        $jefe =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->count();

        $integ = DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->count();

        $numero_personas = $jefe + $integ;

        $jefes_en_cro =  DB::connection('mysql')->table($alias.'.enfermedades_jefes')
        ->join($alias.'.caracterizacion', 'caracterizacion.id','enfermedades_jefes.id_jefe')
        ->where('caracterizacion.estado', 'Activo')
        ->where('enfermedades_jefes.tipo', 'Infecciosa')
        ->select("enfermedades_jefes.id_jefe")
        ->groupBy("enfermedades_jefes.id_jefe")
        ->get();

        $integ_en_cro = DB::connection('mysql')->table($alias.'.enfermedades_integrantes')
        ->join($alias.'.integrantes', 'integrantes.id','enfermedades_integrantes.id_inte')
        ->where('integrantes.estado', 'Activo')
        ->where('enfermedades_integrantes.tipo', 'Infecciosa')
        ->select("enfermedades_integrantes.id_inte")
        ->groupBy("enfermedades_integrantes.id_inte")
        ->get();

    
        $enfermedades_array = array();
        $enfermedades_array_2 = array();
        foreach ($jefes_en_cro as $key) {

            $enfermedades = DB::connection('mysql')->table($alias.'.enfermedades_jefes')
            ->join($alias.'.enfermedadesinf', 'enfermedades_jefes.id_enfermedad','enfermedadesinf.id')
            ->where('enfermedades_jefes.id_jefe', $key->id_jefe)
            ->where('enfermedades_jefes.tipo', 'Infecciosa')
            ->select("enfermedadesinf.descripcion")
            ->get(); 
            
            foreach ($enfermedades as $key2) {
                array_push($enfermedades_array, $key2);
            }
        }

        foreach ($integ_en_cro as $key) {
            $enfermedades = DB::connection('mysql')->table($alias.'.enfermedades_integrantes')
            ->join($alias.'.enfermedadesinf', 'enfermedades_integrantes.id_enfermedad','enfermedadesinf.id')
            ->where('enfermedades_integrantes.id_inte', $key->id_inte)
            ->where('enfermedades_integrantes.tipo', 'Infecciosa')
            ->select("enfermedadesinf.descripcion")
            ->get(); 

            foreach ($enfermedades as $key2) {
                array_push($enfermedades_array, $key2);
            }
        }

        foreach ($enfermedades_array as $item) {
            $encontrado = false;
            foreach ($enfermedades_array_2 as $item2) {
                if($item->descripcion == $item2->enfermedad){
                    $encontrado = true;
                    $item_encontrado = $item2;
                }
            }

            if(!$encontrado){
                array_push($enfermedades_array_2, (object)[
                    "enfermedad" => $item->descripcion,
                    "cantidad"  => 1,
                ]);
            }else{
                $item_encontrado->cantidad += 1;
            }
        }
        
      
        $respuesta = [
            "por_enfermedad" => $enfermedades_array_2,
            "numero_personas" => $numero_personas,
            "personas_con_enfermedades" => count($jefes_en_cro) + count($integ_en_cro),
            "porcentaje_personas_con_enfermedades" => ((count($jefes_en_cro) + count($integ_en_cro)) / $numero_personas) * 100,
        ];

        return $respuesta;
    }

    public static function personas_discapacidad($alias){
        $jefe =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->count();

        $integ = DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->count();

        $numero_personas = $jefe + $integ;

        $jefe_discapacidad=  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select('caracterizacion.discapacidad')
        ->where('caracterizacion.discapacidad','<>','NINGUNA')
        ->get();

        $integrantes_discapacidad = DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select('integrantes.discapacidad')
        ->where('integrantes.discapacidad','<>','NINGUNA')
        ->get();

    
       
        $por_discapacidad = array();

        foreach ($jefe_discapacidad as $item) {
            $encontrado = false;
            foreach ($por_discapacidad as $item2) {
                if($item->discapacidad == $item2->discapacidad){
                    $encontrado = true;
                }
            }

            if(!$encontrado){
                array_push($por_discapacidad, (object)[
                    "discapacidad" => $item->discapacidad,
                    "cantidad"  => 1,
                ]);
            }else{
                $item2->cantidad += 1;
            }
        }
       
        foreach ($integrantes_discapacidad as $item) {
            $encontrado = false;
            foreach ($por_discapacidad as $item2) {
                if($item->discapacidad == $item2->discapacidad){
                    $encontrado = true;
                }
            }

            if(!$encontrado){
                array_push($por_discapacidad, (object)[
                    "discapacidad" => $item->discapacidad,
                    "cantidad"  => 1,
                ]);
            }else{
                $item2->cantidad += 1;
            }
        }
       
        
      
        $respuesta = [
            "por_discapacidad" => $por_discapacidad,
            "numero_personas" => $numero_personas,
            "personas_con_discapacidad" => count($jefe_discapacidad) + count($integrantes_discapacidad),
            "porcentaje_personas_con_discapacidad" => ((count($jefe_discapacidad) + count($integrantes_discapacidad)) / $numero_personas) * 100,
        ];

        return $respuesta;
    }

    public static function adolescentes_embarazo($alias){
    
        $integrantes_embarazadas = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".hogar", "hogar.id", "integrantes.id_hogar")
        ->select('integrantes.id','hogar.id_zona')
        ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nac, CURDATE()) as edad")
        ->where('hogar.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->where('integrantes.embarazo', 'SI')
        ->get();

        $jefes_embarazadas = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias . ".hogar", "hogar.id", "caracterizacion.id_hogar")
        ->select('caracterizacion.id','hogar.id_zona')
        ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) as edad")
        ->where('hogar.estado', 'Activo')
        ->where('caracterizacion.estado', 'Activo')
        ->where('caracterizacion.embarazo', 'SI')
        ->get();

        $embarazadas = array();

        foreach ($integrantes_embarazadas as &$item) {
            array_push($embarazadas, $item);
        }

        foreach ($jefes_embarazadas as &$item) {
            array_push($embarazadas, $item);
        }

        $adolescentes_embarazo = 0;
        $adolescentes_embarazo_urbano = 0;
        $adolescentes_embarazo_rural = 0;

        foreach ($embarazadas as &$item) {
            if($item->edad >= 12 && $item->edad<= 17 ){
                $adolescentes_embarazo += 1;
                if($item->id_zona == 1){
                    $adolescentes_embarazo_urbano += 1;
                }else{
                    $adolescentes_embarazo_rural += 1;
                }
            }
        }

        if($adolescentes_embarazo != 0){
            $porcentaje_adolescentes_embarazadas = ($adolescentes_embarazo / count($embarazadas)) * 100;
        }else{
            $porcentaje_adolescentes_embarazadas = 0;
        }

        $respuesta = [
            "adolescentes_embarazo" => $adolescentes_embarazo,
            "embarazadas" => count($embarazadas),
            "adolescentes_embarazo_urbano" => $adolescentes_embarazo_urbano,
            "adolescentes_embarazo_rural" => $adolescentes_embarazo_rural,
            "porcentaje_adolescentes_embarazadas" =>$porcentaje_adolescentes_embarazadas,
        ];

        return $respuesta;
    }

    public static function inmunizacion($alias){

        $numero_integrantes = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".men1a", "men1a.id_integrante", "integrantes.id")
        ->select('integrantes.id')
        ->where('men1a.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->count();

        $numero_integrantes += DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de1a5", "de1a5.id_integrante", "integrantes.id")
        ->select('integrantes.id')
        ->where('de1a5.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->count();

        $integrantes_mn1 = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".men1a", "men1a.id_integrante", "integrantes.id")
        ->select('integrantes.id')
        ->where('men1a.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->where(function ($query) {
            $query->where('men1a.carnet', '=', 'NO')
            ->orWhere('men1a.carnet', '=', 'DESAC');
        })
        ->count();

        $integrantes_de1a5 = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de1a5", "de1a5.id_integrante", "integrantes.id")
        ->select('integrantes.id')
        ->where('de1a5.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->where(function ($query) {
            $query->where('de1a5.carnet', '=', 'NO')
            ->orWhere('de1a5.carnet', '=', 'DESACTUALIZADO');
        })
        ->count();

        $carnet_desac = $integrantes_mn1 + $integrantes_de1a5;

        if($carnet_desac != 0){
            $porcentaje_carnet_desac = ($carnet_desac / $numero_integrantes) * 100;
        }else{
            $porcentaje_carnet_desac = 0;
        }

        $respuesta = [
            "numero_integrantes" => $numero_integrantes,
            "carnet_desac" => $carnet_desac,
            "porcentaje_carnet_desac" => $porcentaje_carnet_desac,
            "integrantes_de1a5" => $integrantes_de1a5,
            "integrantes_mn1" =>$integrantes_mn1,
        ];

        return $respuesta;
       
    }

    public static function nutricion_0_5($alias){

        $de_0_a_1 = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".men1a", "men1a.id_integrante", "integrantes.id")
        ->join($alias . ".hogar", "hogar.id", "men1a.id_hogar")
        ->select('men1a.*')
        ->selectRaw("TIMESTAMPDIFF(DAY, fecha_nac, hogar.fecha) as edad")
        ->where('men1a.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->get();

        $de_1_a_4 = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de1a5", "de1a5.id_integrante", "integrantes.id")
        ->select('de1a5.*')
        ->where('de1a5.edad', '<', 5)
        ->where('de1a5.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->get();


        // peso para la talla
        $desnutricion_aguda_severa = 0;
        $desnutricion_aguda_moderada = 0;
        $riesgo_desnutricion_aguda = 0;
        $peso_adecuado = 0;

        foreach ($de_0_a_1 as $item) {
            if($item->peso_long < -3){
                $desnutricion_aguda_severa += 1;
            }else{
                if($item->peso_long >= -3 && $item->peso_long < 2){
                    $desnutricion_aguda_moderada += 1;
                }else{
                    if($item->peso_long >= -2 && $item->peso_long < -1){
                        $riesgo_desnutricion_aguda += 1;
                    }else{
                        $peso_adecuado += 1;
                    }
                } 
            }
        }

        foreach ($de_1_a_4 as $item) {
            if($item->pt < -3){
                $desnutricion_aguda_severa += 1;
            }else{
                if($item->pt >= -3 && $item->pt < 2){
                    $desnutricion_aguda_moderada += 1;
                }else{
                    if($item->pt >= -2 && $item->pt < -1){
                        $riesgo_desnutricion_aguda += 1;
                    }else{
                        $peso_adecuado += 1;
                    }
                } 
            }
        }

        $peso_talla = [
            "desnutricion_aguda_severa" => $desnutricion_aguda_severa,
            "desnutricion_aguda_moderada" => $desnutricion_aguda_moderada,
            "riesgo_desnutricion_aguda" => $riesgo_desnutricion_aguda,
            "peso_adecuado" => $peso_adecuado,
        ];
        // peso para la talla

        //talla para la edad
        $retraso_talla = 0;
        $riesgo_talla_baja = 0;
        $talla_adecuada = 0;

        foreach ($de_0_a_1 as $item) {
            if($item->te < -2){
                $retraso_talla += 1;
            }else{
                if($item->te >= -2 && $item->te < -1){
                    $riesgo_talla_baja += 1;
                }else{
                    $talla_adecuada += 1; 
                } 
            }
        }

        foreach ($de_1_a_4 as $item) {
            if($item->te < -2){
                $retraso_talla += 1;
            }else{
                if($item->te >= -2 && $item->te < -1){
                    $riesgo_talla_baja += 1;
                }else{
                    $talla_adecuada += 1; 
                } 
            }
        }

        $talla_edad = [
            "retraso_talla" => $retraso_talla,
            "riesgo_talla_baja" => $riesgo_talla_baja,
            "talla_adecuada" => $talla_adecuada,
        ];

        //talla para la edad
        
        //IMC para la Edad
        $obesidad = 0;
        $sobrepeso = 0;
        $riesgo_sobrepeso = 0;
        $peso_normal = 0;

        foreach ($de_0_a_1 as $item) {
            $imc_temp = $item->imc/$item->edad;
            if($imc_temp >=0 && $imc_temp <= 1){
                $peso_normal += 1;
            }else{
                if($imc_temp > 1 && $imc_temp <= 2){
                    $riesgo_sobrepeso += 1;
                }else{
                    if($imc_temp > 2 && $imc_temp <= 3){
                        $sobrepeso += 1;
                    }else{
                        if($imc_temp > 3){
                            $obesidad += 1;
                        }
                    } 
                }
            }
        }


        foreach ($de_1_a_4 as $item) {
            $imc_temp = $item->imc/$item->edad;
            if($imc_temp >=0 && $imc_temp <= 1){
                $peso_normal += 1;
            }else{
                if($imc_temp > 1 && $imc_temp <= 2){
                    $riesgo_sobrepeso += 1;
                }else{
                    if($imc_temp > 2 && $imc_temp <= 3){
                        $sobrepeso += 1;
                    }else{
                        if($imc_temp > 3){
                            $obesidad += 1;
                        }
                    } 
                }
            }
        }

        $imc = [
            "peso_normal" => $peso_normal,
            "riesgo_sobrepeso" => $riesgo_sobrepeso,
            "sobrepeso" => $sobrepeso,
            "obesidad" => $obesidad,
        ];
        //IMC para la Edad

        $respuesta = [
            "peso_talla" => $peso_talla,
            "talla_edad" => $talla_edad,
            "imc" => $imc,
            "cantidad_ninios" => count($de_0_a_1) + count($de_1_a_4)
        ];

        return $respuesta;
    }

    public static function nutricion_5_17($alias){

        $de_4_a_5 = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de1a5", "de1a5.id_integrante", "integrantes.id")
        ->select('de1a5.*')
        ->where('de1a5.edad', '>=', 5)
        ->where('de1a5.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->get();

        $de_6_a_11 = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de6a11", "de6a11.id_integrante", "integrantes.id")
        ->select('de6a11.*')
        ->where('de6a11.estado', 'Activo')
        ->where('integrantes.estado', 'Activo')
        ->get();

        $de_12_a_17_i = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de12a17", "de12a17.id_integrante", "integrantes.id")
        ->join($alias . ".hogar", "hogar.id", "de12a17.id_hogar")
        ->select('de12a17.*','integrantes.embarazo')
        ->where('de12a17.estado', 'Activo')
        ->where('de12a17.opci', 'INTE')
        ->where('integrantes.estado', 'Activo')
        ->get();

        $de_12_a_17_j = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias . ".de12a17", "de12a17.id_integrante", "caracterizacion.id")
        ->join($alias . ".hogar", "hogar.id", "de12a17.id_hogar")
        ->select('de12a17.*','caracterizacion.embarazo')
        ->where('de12a17.estado', 'Activo')
        ->where('de12a17.opci', 'JEFE')
        ->where('caracterizacion.estado', 'Activo')
        ->get();

        $de_12_a_17 = array();
        foreach ($de_12_a_17_i as $key) {
            array_push($de_12_a_17, $key);
        }

        foreach ($de_12_a_17_j as $key) {
            array_push($de_12_a_17, $key);
        }


        //IMC para la Edad
        $obesidad = 0;
        $sobrepeso = 0;
        $imc_adecuado = 0;
        $riesgo_delgadez = 0;
        $delgadez = 0;

        foreach ($de_4_a_5 as $item) {
            $imc_temp = $item->imc/$item->edad;
            if($imc_temp > 2){
                $obesidad += 1;
            }else{
                if($imc_temp > 1 && $imc_temp <= 2){
                    $sobrepeso += 1;
                }else{
                    if($imc_temp >= -1 && $imc_temp <= 1){
                        $imc_adecuado += 1;
                    }else{
                        if($imc_temp >= -2 && $imc_temp < -1){
                            $riesgo_delgadez += 1;
                        }else{
                            $delgadez += 1;
                        }
                    } 
                }
            }
        }

        foreach ($de_6_a_11 as $item) {
            $imc_temp = $item->imc/$item->edad;
            if($imc_temp > 2){
                $obesidad += 1;
            }else{
                if($imc_temp > 1 && $imc_temp <= 2){
                    $sobrepeso += 1;
                }else{
                    if($imc_temp >= -1 && $imc_temp <= 1){
                        $imc_adecuado += 1;
                    }else{
                        if($imc_temp >= -2 && $imc_temp < -1){
                            $riesgo_delgadez += 1;
                        }else{
                            $delgadez += 1;
                        }
                    } 
                }
            }
        }

        $obesidad_gestacional = 0;
        $sobrepeso_gestacional = 0;
        $adecuado_gestacional = 0;
        $bajo_peso_gestacional = 0;

        foreach ($de_12_a_17 as $item) {
            if($item->embarazo == "SI"){

               $semana = intval(\App\Parpost::buscarSemanas($item->id_integrante, $alias));
               $imc_semana = \App\ImcEmbarazadas::buscar($alias, $semana);
               
               if($imc_semana == null){
                    dd($item->id_integrante);
               }
               
               if($item->imc > $imc_semana->obesidad){
                    $obesidad_gestacional += 1;
               }else{
                    if($item->imc >= $imc_semana->sobrepeso_min && $item->imc <= $imc_semana->sobrepeso_max){
                        $sobrepeso_gestacional += 1;
                    }else{
                        if($item->imc >= $imc_semana->adecuado_min && $item->imc <= $imc_semana->adecuado_max){
                            $adecuado_gestacional += 1;
                        }else{
                            $bajo_peso_gestacional += 1;
                        }
                    } 
               }  
            }else{
                $imc_temp = $item->imc/$item->edad;
                if($imc_temp > 2){
                    $obesidad += 1;
                }else{
                    if($imc_temp > 1 && $imc_temp <= 2){
                        $sobrepeso += 1;
                    }else{
                        if($imc_temp >= -1 && $imc_temp <= 1){
                            $imc_adecuado += 1;
                        }else{
                            if($imc_temp >= -2 && $imc_temp < -1){
                                $riesgo_delgadez += 1;
                            }else{
                                $delgadez += 1;
                            }
                        } 
                    }
                }
            }
        }

        $imc = [
            "obesidad" => $obesidad,
            "sobrepeso" => $sobrepeso,
            "imc_adecuado" => $imc_adecuado,
            "riesgo_delgadez" => $riesgo_delgadez,
            "delgadez" => $delgadez,
        ];

        $imc_embarazadas = [
            "obesidad_gestacional" => $obesidad_gestacional,
            "sobrepeso_gestacional" => $sobrepeso_gestacional,
            "adecuado_gestacional" => $adecuado_gestacional,
            "bajo_peso_gestacional" => $bajo_peso_gestacional,
        ];

        //IMC para la Edad

        $respuesta = [     
            "cantidad_personas" => count($de_4_a_5) + count($de_6_a_11) + count($de_12_a_17),
            "imc" => $imc,
            "imc_embarazadas" => $imc_embarazadas
        ];

        return $respuesta;
    
    }

    public static function nutricion_18_60($alias){

        $de_18_a_28_i = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de18a28", "de18a28.id_integrante", "integrantes.id")
        ->select('de18a28.*','integrantes.embarazo')
        ->where('de18a28.estado', 'Activo')
        ->where('de18a28.opci', 'INTE')
        ->where('integrantes.estado', 'Activo')
        ->get();

        $de_18_a_28_j = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias . ".de18a28", "de18a28.id_integrante", "caracterizacion.id")
        ->select('de18a28.*','caracterizacion.embarazo')
        ->where('de18a28.estado', 'Activo')
        ->where('de18a28.opci', 'JEFE')
        ->where('caracterizacion.estado', 'Activo')
        ->get();

        $de_18_a_28 = array();
        foreach ($de_18_a_28_i as $key) {
            array_push($de_18_a_28, $key);
        }

        foreach ($de_18_a_28_j as $key) {
            array_push($de_18_a_28, $key);
        }


        $de_29_a_59_i = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de29a59", "de29a59.id_integrante", "integrantes.id")
        ->select('de29a59.*','integrantes.embarazo')
        ->where('de29a59.estado', 'Activo')
        ->where('de29a59.opci', 'INTE')
        ->where('integrantes.estado', 'Activo')
        ->get();

        $de_29_a_59_j = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias . ".de29a59", "de29a59.id_integrante", "caracterizacion.id")
        ->join($alias . ".hogar", "hogar.id", "de29a59.id_hogar")
        ->select('de29a59.*','caracterizacion.embarazo')
        ->where('de29a59.estado', 'Activo')
        ->where('de29a59.opci', 'JEFE')
        ->where('caracterizacion.estado', 'Activo')
        ->get();

        $de_29_a_59 = array();
        foreach ($de_29_a_59_i as $key) {
            array_push($de_29_a_59, $key);
        }

        foreach ($de_29_a_59_j as $key) {
            array_push($de_29_a_59, $key);
        }

        $de_60_i = DB::connection('mysql')->table($alias.'.integrantes')
        ->join($alias . ".de60", "de60.id_integrante", "integrantes.id")
        ->select('de60.*','integrantes.embarazo')
        ->where('de60.estado', 'Activo')
        ->where('de60.opci', 'INTE')
        ->where('integrantes.estado', 'Activo')
        ->get();

        $de_60_j = DB::connection('mysql')->table($alias.'.caracterizacion')
        ->join($alias . ".de60", "de60.id_integrante", "caracterizacion.id")
        ->join($alias . ".hogar", "hogar.id", "de60.id_hogar")
        ->select('de60.*','caracterizacion.embarazo')
        ->where('de60.estado', 'Activo')
        ->where('de60.opci', 'JEFE')
        ->where('caracterizacion.estado', 'Activo')
        ->get();

        $de_60 = array();
        foreach ($de_60_i as $key) {
            array_push($de_60, $key);
        }

        foreach ($de_60_j as $key) {
            array_push($de_60, $key);
        }

       

        //IMC para la Edad
        $obesidad = 0;
        $sobrepeso = 0;
        $normal = 0;
        $delgadez = 0;

    
        $obesidad_gestacional = 0;
        $sobrepeso_gestacional = 0;
        $adecuado_gestacional = 0;
        $bajo_peso_gestacional = 0;

        
        foreach ($de_18_a_28 as $item) {
            if($item->embarazo == "SI"){   
                $semana = intval(\App\Parpost::buscarSemanas($item->id_integrante, $alias));
                if($semana >= 6){
                    $imc_semana = \App\ImcEmbarazadas::buscar($alias, $semana);
                    if($item->imc > $imc_semana->obesidad){
                        $obesidad_gestacional += 1;
                    }else{
                        if($item->imc >= $imc_semana->sobrepeso_min && $item->imc <= $imc_semana->sobrepeso_max){
                            $sobrepeso_gestacional += 1;
                        }else{
                            if($item->imc >= $imc_semana->adecuado_min && $item->imc <= $imc_semana->adecuado_max){
                                $adecuado_gestacional += 1;
                            }else{
                                $bajo_peso_gestacional += 1;
                            }
                        } 
                    }   
                }else{
                    $imc_temp = $item->imc;
                    if($imc_temp >= 30){
                        $obesidad += 1;
                    }else{
                        if($imc_temp >= 25 && $imc_temp < 30){
                            $sobrepeso += 1;
                        }else{
                            if($imc_temp >= 18.5 && $imc_temp < 25){
                                $normal += 1;
                            }else{
                                if($imc_temp < 18.5){
                                    $delgadez += 1;
                                }
                            } 
                        }
                    }
                }
            }else{
                $imc_temp = $item->imc;
                if($imc_temp >= 30){
                    $obesidad += 1;
                }else{
                    if($imc_temp >= 25 && $imc_temp < 30){
                        $sobrepeso += 1;
                    }else{
                        if($imc_temp >= 18.5 && $imc_temp < 25){
                            $normal += 1;
                        }else{
                            if($imc_temp < 18.5){
                                $delgadez += 1;
                            }
                        } 
                    }
                }
            }
        }

        foreach ($de_29_a_59 as $item) {
            if($item->embarazo == "SI"){   
               $semana = intval(\App\Parpost::buscarSemanas($item->id_integrante, $alias));
                if($semana >= 6){
                    $imc_semana = \App\ImcEmbarazadas::buscar($alias, $semana);
                    if($item->imc > $imc_semana->obesidad){
                        $obesidad_gestacional += 1;
                    }else{
                        if($item->imc >= $imc_semana->sobrepeso_min && $item->imc <= $imc_semana->sobrepeso_max){
                            $sobrepeso_gestacional += 1;
                        }else{
                            if($item->imc >= $imc_semana->adecuado_min && $item->imc <= $imc_semana->adecuado_max){
                                $adecuado_gestacional += 1;
                            }else{
                                $bajo_peso_gestacional += 1;
                            }
                        } 
                    }   
                }else{
                    $imc_temp = $item->imc;
                    if($imc_temp >= 30){
                        $obesidad += 1;
                    }else{
                        if($imc_temp >= 25 && $imc_temp < 30){
                            $sobrepeso += 1;
                        }else{
                            if($imc_temp >= 18.5 && $imc_temp < 25){
                                $normal += 1;
                            }else{
                                if($imc_temp < 18.5){
                                    $delgadez += 1;
                                }
                            } 
                        }
                    }
                }
            }else{
                $imc_temp = $item->imc;
                if($imc_temp >= 30){
                    $obesidad += 1;
                }else{
                    if($imc_temp >= 25 && $imc_temp < 30){
                        $sobrepeso += 1;
                    }else{
                        if($imc_temp >= 18.5 && $imc_temp < 25){
                            $normal += 1;
                        }else{
                            if($imc_temp < 18.5){
                                $delgadez += 1;
                            }
                        } 
                    }
                }
            }
        }

        foreach ($de_60 as $item) {
            if($item->embarazo == "SI"){            
               $semana = intval(\App\Parpost::buscarSemanas($item->id_integrante, $alias));
               if($semana >= 6){
                    $imc_semana = \App\ImcEmbarazadas::buscar($alias, $semana);
                    if($item->imc > $imc_semana->obesidad){
                        $obesidad_gestacional += 1;
                    }else{
                        if($item->imc >= $imc_semana->sobrepeso_min && $item->imc <= $imc_semana->sobrepeso_max){
                            $sobrepeso_gestacional += 1;
                        }else{
                            if($item->imc >= $imc_semana->adecuado_min && $item->imc <= $imc_semana->adecuado_max){
                                $adecuado_gestacional += 1;
                            }else{
                                $bajo_peso_gestacional += 1;
                            }
                        } 
                    }   
                }else{
                    $imc_temp = $item->imc;
                    if($imc_temp >= 30){
                        $obesidad += 1;
                    }else{
                        if($imc_temp >= 25 && $imc_temp < 30){
                            $sobrepeso += 1;
                        }else{
                            if($imc_temp >= 18.5 && $imc_temp < 25){
                                $normal += 1;
                            }else{
                                if($imc_temp < 18.5){
                                    $delgadez += 1;
                                }
                            } 
                        }
                    }
                }
            }else{
                $imc_temp = $item->imc;
                if($imc_temp >= 30){
                    $obesidad += 1;
                }else{
                    if($imc_temp >= 25 && $imc_temp < 30){
                        $sobrepeso += 1;
                    }else{
                        if($imc_temp >= 18.5 && $imc_temp < 25){
                            $normal += 1;
                        }else{
                            if($imc_temp < 18.5){
                                $delgadez += 1;
                            }
                        } 
                    }
                }
            }
        }
        

        $imc = [
            "obesidad" => $obesidad,
            "sobrepeso" => $sobrepeso,
            "normal" => $normal,
            "delgadez" => $delgadez,
        ];

        $imc_embarazadas = [
            "obesidad_gestacional" => $obesidad_gestacional,
            "sobrepeso_gestacional" => $sobrepeso_gestacional,
            "adecuado_gestacional" => $adecuado_gestacional,
            "bajo_peso_gestacional" => $bajo_peso_gestacional,
        ];

        //IMC para la Edad

        $respuesta = [     
            "cantidad_personas" => count($de_18_a_28) + count($de_29_a_59) + count($de_60),
            "imc" => $imc,
            "imc_embarazadas" => $imc_embarazadas
        ];

        return $respuesta;
    
    }

    public static function riesgos_salud($alias, $riesgoSalud)
    {

        if($riesgoSalud == "alteraciones_transtornos_audicion"){
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

        if($riesgoSalud == "alteraciones_transtornos_visuales"){
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

        if($riesgoSalud == "cancer"){
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

        if($riesgoSalud == "consumo_spa"){
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

        if($riesgoSalud == "enfermedad_cardiovascular"){
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

        if($riesgoSalud == "enfermedades_infecciosas"){
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

        if($riesgoSalud == "enfermedades_respiratorias"){
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

        if($riesgoSalud == "enfermedades_zoonoticas"){
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

        if($riesgoSalud == "problemas_salud_mental"){
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

        if($riesgoSalud == "riesgo_delgadez"){
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

        if($riesgoSalud == "riesgo_muerte"){
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

        if($riesgoSalud == "riesgo_sobrepeso"){
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

        if($riesgoSalud == "riesgo_talla_baja"){
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

        if($riesgoSalud == "riesgos_desnutricion_aguda"){
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

        if($riesgoSalud == "riesgos_desnutricion_global"){
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

        if($riesgoSalud == "salud_bucal"){
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

        if($riesgoSalud == "transtornos_asociados_spa"){
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

        if($riesgoSalud == "transtornos_degenartivos"){
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

        if($riesgoSalud == "violencias"){
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

        $inexistente = 0;
        $bajo = 0;
        $moderado = 0;
        $alto = 0;

        $array_alto = array();
        foreach ($array_completo as $key) {
            if ($key->puntaje_riesgo == 1 || $key->puntaje_riesgo == 0) {
                $inexistente += 1;
            } else {
                if ($key->puntaje_riesgo == 2) {
                    $bajo += 1;
                } else {
                    if ($key->puntaje_riesgo == 3) {
                        $moderado += 1;
                    } else {
                        $alto += 1;
                        array_push($array_alto, $key);
                    }
                }
            }
        } 
        
        $masculinos_alto = 0;
        $femeninos_alto = 0;
        $porcentaje_masculinos_alto = 0;
        $porcentaje_femeninos_alto = 0;

        $zona_urbana = 0;
        $porcentaje_zona_urbana = 0;
        $zona_rural = 0;
        $porcentaje_zona_rural = 0;

        $de0a1 = 0;
        $de1a5 = 0;
        $de6a11 = 0;
        $de12a17 = 0;
        $de18a28 = 0;
        $de29a59 = 0;
        $mayores60 = 0;

        foreach ($array_alto as $key) {
            if ($key->genero == "MASCULINO") {
                $masculinos_alto += 1;
            } else {
                $femeninos_alto += 1;
            }

            if ($key->id_zona == 1) {
                $zona_urbana += 1;
            } else {
                $zona_rural += 1;
            }

            if($key->edad == 0){
                $de0a1 += 1;
            }elseif ($key->edad >= 1 && $key->edad <= 5) {
                $de1a5 += 1;
            }elseif ($key->edad >= 6 && $key->edad <= 11) {
                $de6a11 += 1;
            }elseif ($key->edad >= 12 && $key->edad <= 17) {
                $de12a17 += 1;
            }elseif ($key->edad >= 18 && $key->edad <= 28) {
                $de18a28 += 1;
            }elseif ($key->edad >= 29 && $key->edad <= 59) {
                $de29a59 += 1;
            }elseif ($key->edad >= 60) {
                $mayores60 += 1;
            }
        } 

        if(count($array_alto) != 0){
            $porcentaje_femeninos_alto = round(($femeninos_alto / count($array_alto)) * 100, 2);
            $porcentaje_masculinos_alto = round(($masculinos_alto / count($array_alto)) * 100, 2);

            $porcentaje_zona_urbana = round(($zona_urbana / count($array_alto)) * 100, 2);
            $porcentaje_zona_rural = round(($zona_rural / count($array_alto)) * 100, 2);
        }

        $data = [
            'alto' => $alto,
            'moderado' => $moderado,
            'bajo' => $bajo,
            'inexistente' => $inexistente,
            'array_alto' => $array_alto,
            'numero_personas' => count($array_completo),
            'porcentaje_femeninos_alto' => $porcentaje_femeninos_alto,
            'porcentaje_masculinos_alto' => $porcentaje_masculinos_alto,
            'porcentaje_zona_urbana' => $porcentaje_femeninos_alto,
            'porcentaje_zona_rural' => $porcentaje_masculinos_alto,
            'de0a1' => $de0a1,
            'de1a5' => $de1a5,
            'de6a11' => $de6a11,
            'de12a17' => $de12a17,
            'de18a28' => $de18a28,
            'de29a59' => $de29a59,
            'mayores60' => $mayores60,
        ];

        return $data;
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
            ->select("integrantes.id","integrantes.identificacion","integrantes.sexo AS genero", $rango.'.'.$riesgo.' as puntaje_riesgo', 'hogar.id_zona')        
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
            ->select("integrantes.id","integrantes.identificacion","integrantes.sexo AS genero", $rango.'.'.$riesgo.' as puntaje_riesgo', 'hogar.id_zona')        
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
            ->select("caracterizacion.id","caracterizacion.identificacion","caracterizacion.sexo AS genero", $rango.'.'.$riesgo.' as puntaje_riesgo', 'hogar.id_zona')        
            ->selectRaw("CONCAT_WS(' ',caracterizacion.pape,caracterizacion.sape,caracterizacion.pnom,caracterizacion.snom) as nombres")
            ->selectRaw("CONCAT_WS('-',dptos.descripcion,muni.descripcion,corregimientos.descripcion,hogar.direccion) as localizacion")
            ->selectRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, hogar.fecha) AS edad");

            $consulta->union($consultai);

            return $consulta->get();
        }    
    }
    
}
