<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public static function total_jefes($alias)
    {
        $consulta = DB::table($alias . ".caracterizacion")->where("estado", "Activo")->count();
        return $consulta;
    }

    public static function total_integrantes($alias)
    {
        $consulta = DB::table($alias . ".integrantes")->where("estado", "Activo")->count();
        return $consulta;
    }

    public static function total_hogares($alias)
    {
        $consulta = DB::table($alias . ".hogar")->where("estado", "Activo")->count();
        return $consulta;
    }

    public static function global_personas($alias)
    {
        $consulta = \App\User::join("entes", "entes.id", "users.id_entidad")
            ->where("entes.alias", $alias)
            ->select("entes.poblacion", "entes.viviendas")
            ->first();
        return $consulta;
    }

    public static function hacinamiento($alias)
    {
        /*$consulta = DB::table($alias.".hogar")
        ->join($alias.".vivienda","vivienda.id_hogar","hogar.id")
        ->join($alias.".integrantes","integrantes.id_hogar","hogar.id")
        ->groupBy("hogar.id")
        ->select("hogar.id","vivienda.numero_cuartos")
        ->selectRaw("count(*) as total")
        ->where("hogar.estado","Activo");

        $consulta1 = DB::table($alias.".hogar")
        ->join($alias.".vivienda","vivienda.id_hogar","hogar.id")
        ->join($alias.".caracterizacion","caracterizacion.id_hogar","hogar.id")
        ->groupBy("hogar.id")
        ->union($consulta)
        ->select("hogar.id","vivienda.numero_cuartos")
        ->selectRaw("count(*) as total")
        ->where("hogar.estado","Activo");*/

        $consulta = DB::select("SELECT
        cons.id, SUM(total) as suma_total, v.numero_cuartos, SUM(total)/v.numero_cuartos as indice_hacinamiento,if(SUM(total)/v.numero_cuartos <= 2.4, 'SIN HACINAMIENTO', if(SUM(total)/v.numero_cuartos <= 4.9, 'HACINAMIENTO MEDIO', 'HACINAMIENTO CRITICO') ) as hacinamiento
        FROM
            (SELECT
                h.id, COUNT(*) AS total, 'INTEGRANTES' AS tipo
            FROM
                " . $alias . ".hogar h
            INNER JOIN " . $alias . ".integrantes i ON i.id_hogar = h.id
            WHERE
                h.estado = 'Activo'
            GROUP BY h.id
            UNION
            SELECT
                h.id, COUNT(*) AS total, 'JEFE DE HOGAR' AS tipo
            FROM
                " . $alias . ".hogar h
            INNER JOIN " . $alias . ".caracterizacion c ON c.id_hogar = h.id
            WHERE
                h.estado = 'Activo'
            GROUP BY h.id) AS cons
            INNER JOIN " . $alias . ".vivienda v ON v.id_hogar = cons.id
            GROUP BY cons.id HAVING SUM(total)/v.numero_cuartos >= 2.5");

        return count($consulta);
    }

    public static function municipio($alias, $id, $id_dpto)
    {
        $consulta = DB::table($alias . ".muni")
            ->where("coddep", $id_dpto)
            ->where("codmun", $id)
            ->select("descripcion")
            ->first();
        return $consulta;
    }

    public static function departamento($alias, $id)
    {
        $consulta = DB::table($alias . ".dptos")
            ->where("codigo", $id)
            ->select("descripcion")
            ->first();
        return $consulta;
    }

    public static function corregimiento($alias, $id)
    {
        $consulta = DB::table($alias . ".corregimientos")
            ->select("descripcion")
            ->where("id", $id)
            ->first();
        return $consulta;
    }

    public static function verada($alias, $id)
    {
        $consulta = DB::table($alias . ".veredas")
            ->select("descripcion")
            ->where("id", $id)
            ->first();
        return $consulta;
    }

    public static function total_sexo($alias, $sexo)
    {

        $consulta = DB::table($alias . ".caracterizacion")
            ->where("estado", "Activo")
            ->where("sexo", $sexo)
            ->count();

        $consulta1 = DB::table($alias . ".integrantes")
            ->where("estado", "Activo")
            ->where("sexo", $sexo)
            ->count();
        return $consulta + $consulta1;
    }

    public static function total_migrantes($alias)
    {

        $consulta = DB::table($alias . ".caracterizacion")
            ->where("estado", "Activo")
            ->where("migrante", "SI")
            ->count();

        $consulta1 = DB::table($alias . ".integrantes")
            ->where("estado", "Activo")
            ->where("migrante", "SI")
            ->count();
        return $consulta + $consulta1;
    }

    public static function total_desempleados($alias)
    {

        $consulta = DB::table($alias . ".caracterizacion")
            ->where("estado", "Activo")
            ->where(function ($query) {
                $query->where('tipo_empleo', "1")
                    ->orWhere('tipo_empleo', "NA");
            })
            ->where("tipo_empleo", "1")
            ->count();

        $consulta1 = DB::table($alias . ".integrantes")
            ->where("estado", "Activo")
            ->where("tipo_empleo", "1")
            ->count();
        return $consulta + $consulta1;
    }

    public static function consultarPuntosPoblacion($alias){
        $consulta = DB::table($alias . ".hogar")
        ->where("estado", "Activo")
        ->select("lat", "lng")
        ->get();

        return $consulta;
    }
}
