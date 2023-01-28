<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De10a59 extends Model
{
    protected $table = 'de10a59';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'primera_mes', 'flujo_vaginal', 'flujo_uretral', 'relaciones_sexuales',
        'compa_sexuales', 'usa_condon', 'abortos_seis', 'metodo', 'tiempo_metodo', 'controles',
        'motivo', 'citologia', 'colposcopia', 'examen_seno', 'violencia', 'tdit',
        'tripleviral', 'nacidos_vivos', 'abortos', 'examen_prostata', 'biposia_prostata',
        'estado', 'id_compania', 'opci', 'embarazo_adolecentes',
    ];

    public static function guardar($data, $alias)
    {
        if ($data['opci'] == "JEFE") {
            // BUSCAR ID JEFE
            $integrante = \App\Caracterizacion::buscar($data['identificacion'], $alias);
            // BUSCAR ID JEFE

        } else {
            // BUSCAR ID INTEGRANTE
            $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
            // BUSCAR ID INTEGRANTE
        }
        return DB::connection('mysql')->table($alias . '.de10a59')->updateOrInsert([
            'id' => $data['id'],
        ], [
            'id_integrante' => $integrante->id,
            'id_hogar' => $data['id_hogar'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $integrante->identificacion,
            'pnom' => $data['pnom'],
            'snom' => $data['snom'],
            'pape' => $data['pape'],
            'sape' => $data['sape'],
            'sexo' => $data['sexo'],
            'edad' => $data['edad'],
            'primera_mes' => $data['primera_mes'],
            'flujo_vaginal' => $data['flujo_vaginal'],
            'flujo_uretral' => $data['flujo_uretral'],
            'relaciones_sexuales' => $data['relaciones_sexuales'],
            'compa_sexuales' => $data['compa_sexuales'],
            'usa_condon' => $data['usa_condon'],
            'abortos_seis' => $data['abortos_seis'],
            'metodo' => $data['metodo'],
            'tiempo_metodo' => $data['tiempo_metodo'],
            'controles' => $data['controles'],
            'motivo' => $data['motivo'],
            'citologia' => $data['citologia'],
            'colposcopia' => $data['colposcopia'],
            'examen_seno' => $data['examen_seno'],
            'violencia' => $data['violencia'],
            'tdit' => $data['tdit'],
            'tripleviral' => $data['tripleviral'],
            'nacidos_vivos' => $data['nacidos_vivos'],
            'abortos' => $data['abortos'],
            'examen_prostata' => $data['examen_prostata'],
            'biposia_prostata' => $data['biposia_prostata'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'embarazo_adolecentes' => $data['embarazo_adolecentes'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {

        $de10a591 = DB::connection('mysql')->table($alias . '.de10a59')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de10a59.id_integrante')
            ->where('de10a59.id_hogar', $id_hogar)
            ->where('de10a59.estado', 'Activo')
            ->where('de10a59.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de10a59.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de10a59.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(de10a59.id,0) AS id")            
            ->selectRaw("IFNULL(de10a59.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.primera_mes,''),IFNULL(de10a59.primera_mes,'NA')) AS primera_mes")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.flujo_vaginal,''),IFNULL(de10a59.flujo_vaginal,'NA')) AS flujo_vaginal")
            ->selectRaw("IFNULL(de10a59.flujo_uretral,'') AS flujo_uretral")
            ->selectRaw("IFNULL(de10a59.relaciones_sexuales,'') AS relaciones_sexuales")
            ->selectRaw("IFNULL(de10a59.compa_sexuales,'') AS compa_sexuales")
            ->selectRaw("IFNULL(de10a59.usa_condon,'') AS usa_condon")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.abortos_seis,''),IFNULL(de10a59.abortos_seis,'NA')) AS abortos_seis")
            ->selectRaw("IFNULL(de10a59.metodo,'') AS metodo")
            ->selectRaw("IFNULL(de10a59.tiempo_metodo,'') AS tiempo_metodo")
            ->selectRaw("IFNULL(de10a59.controles,'') AS controles")
            ->selectRaw("IFNULL(de10a59.motivo,'') AS motivo")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.citologia,''),IFNULL(de10a59.citologia,'NA')) AS citologia")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.colposcopia,''),IFNULL(de10a59.colposcopia,'NA')) AS colposcopia")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.examen_seno,''),IFNULL(de10a59.examen_seno,'NA')) AS examen_seno")
            ->selectRaw("IFNULL(de10a59.violencia,'') AS violencia")
            ->selectRaw("IFNULL(de10a59.tdit,'') AS tdit")
            ->selectRaw("IFNULL(de10a59.tripleviral,'') AS tripleviral")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.nacidos_vivos,''),IFNULL(de10a59.nacidos_vivos,'NA')) AS nacidos_vivos")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.abortos,''),IFNULL(de10a59.abortos,'NA')) AS abortos")
            ->selectRaw("if(caracterizacion.sexo='MASCULINO',IFNULL(de10a59.examen_prostata,''),IFNULL(de10a59.examen_prostata,'NA')) AS examen_prostata")
            ->selectRaw("if(caracterizacion.sexo='MASCULINO',IFNULL(de10a59.biposia_prostata,''),IFNULL(de10a59.biposia_prostata,'NA')) AS biposia_prostata")
            ->selectRaw("IFNULL(de10a59.opci,'JEFE') AS opci")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de10a59.embarazo_adolecentes,''),IFNULL(de10a59.embarazo_adolecentes,'NA')) AS embarazo_adolecentes");

        $de10a592 = DB::connection('mysql')->table($alias . '.de10a59')
            ->join($alias . '.integrantes', 'integrantes.id', 'de10a59.id_integrante')
            ->where('de10a59.id_hogar', $id_hogar)
            ->where('de10a59.estado', 'Activo')
            ->where('de10a59.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de10a59.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de10a59.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(de10a59.id,0) AS id")
            ->selectRaw("IFNULL(de10a59.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.primera_mes,''),IFNULL(de10a59.primera_mes,'NA')) AS primera_mes")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.flujo_vaginal,''),IFNULL(de10a59.flujo_vaginal,'NA')) AS flujo_vaginal")
            ->selectRaw("IFNULL(de10a59.flujo_uretral,'') AS flujo_uretral")
            ->selectRaw("IFNULL(de10a59.relaciones_sexuales,'') AS relaciones_sexuales")
            ->selectRaw("IFNULL(de10a59.compa_sexuales,'') AS compa_sexuales")
            ->selectRaw("IFNULL(de10a59.usa_condon,'') AS usa_condon")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.abortos_seis,''),IFNULL(de10a59.abortos_seis,'NA')) AS abortos_seis")
            ->selectRaw("IFNULL(de10a59.metodo,'') AS metodo")
            ->selectRaw("IFNULL(de10a59.tiempo_metodo,'') AS tiempo_metodo")
            ->selectRaw("IFNULL(de10a59.controles,'') AS controles")
            ->selectRaw("IFNULL(de10a59.motivo,'') AS motivo")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.citologia,''),IFNULL(de10a59.citologia,'NA')) AS citologia")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.colposcopia,''),IFNULL(de10a59.colposcopia,'NA')) AS colposcopia")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.examen_seno,''),IFNULL(de10a59.examen_seno,'NA')) AS examen_seno")
            ->selectRaw("IFNULL(de10a59.violencia,'') AS violencia")
            ->selectRaw("IFNULL(de10a59.tdit,'') AS tdit")
            ->selectRaw("IFNULL(de10a59.tripleviral,'') AS tripleviral")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.nacidos_vivos,''),IFNULL(de10a59.nacidos_vivos,'NA')) AS nacidos_vivos")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.abortos,''),IFNULL(de10a59.abortos,'NA')) AS abortos")
            ->selectRaw("if(integrantes.sexo='MASCULINO',IFNULL(de10a59.examen_prostata,''),IFNULL(de10a59.examen_prostata,'NA')) AS examen_prostata")
            ->selectRaw("if(integrantes.sexo='MASCULINO',IFNULL(de10a59.biposia_prostata,''),IFNULL(de10a59.biposia_prostata,'NA')) AS biposia_prostata")
            ->selectRaw("IFNULL(de10a59.opci,'INTE') AS opci")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de10a59.embarazo_adolecentes,''),IFNULL(de10a59.embarazo_adolecentes,'NA')) AS embarazo_adolecentes");
        return $de10a591->unionAll($de10a592)->get();
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de10a59')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }
}
