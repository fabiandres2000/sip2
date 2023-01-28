<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class RiesgosAmbientalesEstadistica extends Model
{
    public static function listar($alias)
    {
        return DB::connection('mysql')->table($alias.'.riesgos_ambientales')
            ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.riesgos_ambientales.id_hogar')
            ->join($alias.'.caracterizacion',$alias.'.caracterizacion.id_hogar',$alias.'.hogar.id')  
            ->where('riesgos_ambientales.estado', 'Activo')
            ->get();
    }

    public static function filtrar($alias, $tipo, $id)
    {
        if($tipo == "barrio"){
            return DB::connection('mysql')
            ->select('SELECT * FROM '.$alias.'.riesgos_ambientales ra inner join '.$alias.'.hogar h on (ra.id_hogar = h.id) inner join '.$alias.'.caracterizacion c on (c.id_hogar = h.id) where ra.id_hogar in (SELECT id FROM '.$alias.'.hogar where id_barrio = '.$id.')');
        }

        if($tipo == "corregimiento"){
            return DB::connection('mysql')
            ->select('SELECT * FROM '.$alias.'.riesgos_ambientales ra inner join '.$alias.'.hogar h on (ra.id_hogar = h.id) inner join '.$alias.'.caracterizacion c on (c.id_hogar = h.id) where ra.id_hogar in (SELECT id FROM '.$alias.'.hogar where id_corre = '.$id.')');
        }

        if($tipo == "vereda"){
            return DB::connection('mysql')
            ->select('SELECT * FROM '.$alias.'.riesgos_ambientales ra inner join '.$alias.'.hogar h on (ra.id_hogar = h.id) inner join '.$alias.'.caracterizacion c on (c.id_hogar = h.id) where ra.id_hogar in (SELECT id FROM '.$alias.'.hogar where id_vereda = '.$id.')');
        }
        
    }

    public static function listarPorVivienda($alias)
    {
        return DB::connection('mysql')->table($alias.'.riesgos_ambientales')
            ->join($alias.'.hogar',$alias.'.hogar.id',$alias.'.riesgos_ambientales.id_hogar')
            ->where('riesgos_ambientales.estado', 'Activo')
            ->get();
    }

    public static function filtrarPorVivienda($alias, $tipo, $id)
    {
        if($tipo == "barrio"){
            return DB::connection('mysql')
            ->select('SELECT * FROM '.$alias.'.riesgos_ambientales ra inner join '.$alias.'.hogar h on (ra.id_hogar = h.id)  where ra.id_hogar in (SELECT id FROM '.$alias.'.hogar where id_barrio = '.$id.')');
        }

        if($tipo == "corregimiento"){
            return DB::connection('mysql')
            ->select('SELECT * FROM '.$alias.'.riesgos_ambientales ra inner join '.$alias.'.hogar h on (ra.id_hogar = h.id)  where ra.id_hogar in (SELECT id FROM '.$alias.'.hogar where id_corre = '.$id.')');
        }

        if($tipo == "vereda"){
            return DB::connection('mysql')
            ->select('SELECT * FROM '.$alias.'.riesgos_ambientales ra inner join '.$alias.'.hogar h on (ra.id_hogar = h.id)  where ra.id_hogar in (SELECT id FROM '.$alias.'.hogar where id_vereda = '.$id.')');
        }
        
    }

    public static function PorcentajesGeneral($alias){
        //// consultar totales ///////////////////////////////////////////////////
        $totalViviendas =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->select("hogar.id")
        ->count();

        $totalHogares =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->select("hogar.id")
        ->count();

        $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
        ->where('caracterizacion.estado', 'Activo')
        ->select("*")
        ->count();

        $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
        ->where('integrantes.estado', 'Activo')
        ->select("*")
        ->count();

        $totalPoblacion = $integrantes + $jefes;

        //// consultar totales /////////////////////////////////////////////////////
        ////////////// agua potable ////////////////////////////////////////////////
        $hogaresSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("*")
        ->get();

        $viendasSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("*")
        ->get();

        $jefesSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("hogar.id", "hogar.estado")
        ->get();

        $integrantesSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.integrantes', 'hogar.id','integrantes.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("hogar.id", "hogar.estado")
        ->get();

        $poblacionSinAguaPotable = count($jefesSinAguaPotable) + count($integrantesSinAguaPotable);

        $porcentajeviendasSinAguaPotable = (count($viendasSinAguaPotable) / $totalViviendas) * 100;
        $porcentajehogaresSinAguaPotable = (count($hogaresSinAguaPotable) / $totalHogares) * 100;
        $porcentajepoblacionSinAguaPotable = ($poblacionSinAguaPotable / $totalPoblacion) * 100;
        ////////////// agua potable ////////////////////////////////////////////////
        ////////////// alcantarillado ////////////////////////////////////////////////
        $hogaresSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.alcantarillado', "NO")
        ->select("*")
        ->get();

        $viendasSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.alcantarillado', "NO")
        ->select("*")
        ->get();

        $jefesSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.alcantarillado', "NO")
        ->select("hogar.id", "hogar.estado")
        ->get();

        $integrantesSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.integrantes', 'hogar.id','integrantes.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('vivienda.alcantarillado', "NO")
        ->select("hogar.id", "hogar.estado")
        ->get();

        $poblacionSinalcantarillado = count($jefesSinalcantarillado) + count($integrantesSinalcantarillado);

        $porcentajeviendasSinalcantarillado = (count($viendasSinalcantarillado) / $totalViviendas) * 100;
        $porcentajehogaresSinalcantarillado = (count($hogaresSinalcantarillado) / $totalHogares) * 100;
        $porcentajepoblacionSinalcantarillado = ($poblacionSinalcantarillado / $totalPoblacion) * 100;
        ////////////// alcantarillado ////////////////////////////////////////////////


        $info = [
            'totalViviendas' => $totalViviendas,
            'totalHogares' => $totalHogares,  
            'totalPoblacion' => $totalPoblacion, 
            'viendasSinAguaPotable' => count($viendasSinAguaPotable), 
            'porcentajeviendasSinAguaPotable' => $porcentajeviendasSinAguaPotable,
            'hogaresSinAguaPotable' => count($hogaresSinAguaPotable), 
            'porcentajehogaresSinAguaPotable' => $porcentajehogaresSinAguaPotable,
            'poblacionSinAguaPotable' => $poblacionSinAguaPotable, 
            'porcentajepoblacionSinAguaPotable' => $porcentajepoblacionSinAguaPotable,
            'viendasSinalcantarillado' => count($viendasSinalcantarillado), 
            'porcentajeviendasSinalcantarillado' => $porcentajeviendasSinalcantarillado,
            'hogaresSinalcantarillado' => count($hogaresSinalcantarillado), 
            'porcentajehogaresSinalcantarillado' => $porcentajehogaresSinalcantarillado,
            'poblacionSinalcantarillado' => $poblacionSinalcantarillado, 
            'porcentajepoblacionSinalcantarillado' => $porcentajepoblacionSinalcantarillado,
            'viendasSAP' => $viendasSinAguaPotable,
            'viendasSA' => $viendasSinalcantarillado,  
        ];

        return $info;
    }

    public static function filtrarPorcentajesGeneral($alias, $tipo, $id)
    {
        //// consultar totales ///////////////////////////////////////////////////
         $totalViviendas =  DB::connection('mysql')->table($alias.'.vivienda')
         ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
         ->where('hogar.estado', 'Activo')
         ->select("hogar.id")
         ->count();
 
         $totalHogares =  DB::connection('mysql')->table($alias.'.vivienda')
         ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
         ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
         ->where('hogar.estado', 'Activo')
         ->select("hogar.id")
         ->count();
 
         $jefes =  DB::connection('mysql')->table($alias.'.caracterizacion')
         ->where('caracterizacion.estado', 'Activo')
         ->select("*")
         ->count();
 
         $integrantes =  DB::connection('mysql')->table($alias.'.integrantes')
         ->where('integrantes.estado', 'Activo')
         ->select("*")
         ->count();
 
         $totalPoblacion = $integrantes + $jefes;
        //// consultar totales /////////////////////////////////////////////////////
        ////////////// agua potable ////////////////////////////////////////////////
        $hogaresSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("*")
        ->get();

        $viendasSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("*")
        ->get();

        $jefesSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("hogar.id", "hogar.estado")
        ->get();

        $integrantesSinAguaPotable =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.integrantes', 'hogar.id','integrantes.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.tipo_tratamiento_agua', 4)
        ->select("hogar.id", "hogar.estado")
        ->get();

        $poblacionSinAguaPotable = count($jefesSinAguaPotable) + count($integrantesSinAguaPotable);

        $porcentajeviendasSinAguaPotable = (count($viendasSinAguaPotable) / $totalViviendas) * 100;
        $porcentajehogaresSinAguaPotable = (count($hogaresSinAguaPotable) / $totalHogares) * 100;
        $porcentajepoblacionSinAguaPotable = ($poblacionSinAguaPotable / $totalPoblacion) * 100;
        ////////////// agua potable ////////////////////////////////////////////////
        ////////////// alcantarillado ////////////////////////////////////////////////
        $hogaresSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.alcantarillado', "NO")
        ->select("*")
        ->get();

        $viendasSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.alcantarillado', "NO")
        ->select("*")
        ->get();

        $jefesSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.caracterizacion', 'hogar.id','caracterizacion.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.alcantarillado', "NO")
        ->select("hogar.id", "hogar.estado")
        ->get();

        $integrantesSinalcantarillado =  DB::connection('mysql')->table($alias.'.vivienda')
        ->join($alias.'.hogar', 'hogar.id','vivienda.id_hogar')
        ->join($alias.'.integrantes', 'hogar.id','integrantes.id_hogar')
        ->where('hogar.estado', 'Activo')
        ->where('hogar.id_'.$tipo, $id)
        ->where('vivienda.alcantarillado', "NO")
        ->select("hogar.id", "hogar.estado")
        ->get();

        $poblacionSinalcantarillado = count($jefesSinalcantarillado) + count($integrantesSinalcantarillado);

        $porcentajeviendasSinalcantarillado = (count($viendasSinalcantarillado) / $totalViviendas) * 100;
        $porcentajehogaresSinalcantarillado = (count($hogaresSinalcantarillado) / $totalHogares) * 100;
        $porcentajepoblacionSinalcantarillado = ($poblacionSinalcantarillado / $totalPoblacion) * 100;
        ////////////// alcantarillado ////////////////////////////////////////////////


        $info = [
            'totalViviendas' => $totalViviendas,
            'totalHogares' => $totalHogares,  
            'totalPoblacion' => $totalPoblacion, 
            'viendasSinAguaPotable' => count($viendasSinAguaPotable), 
            'porcentajeviendasSinAguaPotable' => $porcentajeviendasSinAguaPotable,
            'hogaresSinAguaPotable' => count($hogaresSinAguaPotable), 
            'porcentajehogaresSinAguaPotable' => $porcentajehogaresSinAguaPotable,
            'poblacionSinAguaPotable' => $poblacionSinAguaPotable, 
            'porcentajepoblacionSinAguaPotable' => $porcentajepoblacionSinAguaPotable,
            'viendasSinalcantarillado' => count($viendasSinalcantarillado), 
            'porcentajeviendasSinalcantarillado' => $porcentajeviendasSinalcantarillado,
            'hogaresSinalcantarillado' => count($hogaresSinalcantarillado), 
            'porcentajehogaresSinalcantarillado' => $porcentajehogaresSinalcantarillado,
            'poblacionSinalcantarillado' => $poblacionSinalcantarillado, 
            'porcentajepoblacionSinalcantarillado' => $porcentajepoblacionSinalcantarillado,
            'viendasSAP' => $viendasSinAguaPotable,
            'viendasSA' => $viendasSinalcantarillado,  
        ];

        return $info;
    }

}
