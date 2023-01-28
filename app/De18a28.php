<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De18a28 extends Model
{
    protected $table = 'de18a28';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'peso', 'talla', 'imc', 'pcintura', 'pb',
        'visuales', 'auditivos', 'conducta', 'enfermedades_cronicas', 'dientes_sanos', 'consultaodon',
        'nocepillado', 'maltrato', 'alcohol', 'fuma', 'spa', 'desparacitado',
        'empleo', 'religion', 'queesvih', 'queescancerutero', 'queespapiloma', 'estado', 'id_compania', 'opci', 'papiloma'
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        if ($data['opci'] == "JEFE") {
            // BUSCAR ID JEFE
            $integrante = \App\Caracterizacion::buscar($data['identificacion'], $alias);
            // BUSCAR ID JEFE
        } else {
            // BUSCAR ID INTEGRANTE
            $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
            // BUSCAR ID INTEGRANTE
        }
        // BUSCAR ID INTEGRANTE

        return DB::connection('mysql')->table($alias . '.de18a28')->updateOrInsert([
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
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pcintura' => $data['pcintura'],
            'pb' => $data['pb'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'conducta' => $data['conducta'],
            'enfermedades_cronicas' => $data['enfermedades_cronicas'],
            'dientes_sanos' => $data['dientes_sanos'],
            'consultaodon' => $data['consultaodon'],
            'nocepillado' => $data['nocepillado'],
            'maltrato' => $data['maltrato'],
            'alcohol' => $data['alcohol'],
            'fuma' => $data['fuma'],
            'spa' => $data['spa'],
            'desparacitado' => $data['desparacitado'],
            'empleo' => $data['empleo'],
            'religion' => $data['religion'],
            'queesvih' => $data['queesvih'],
            'queescancerutero' => $data['queescancerutero'],
            'queespapiloma' => $data['queespapiloma'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'papiloma' => $data['papiloma'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        $de18a281 = DB::connection('mysql')->table($alias . '.de18a28')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de18a28.id_integrante')
            ->where('de18a28.id_hogar', $id_hogar)
            ->where('de18a28.estado', 'Activo')
            ->where('de18a28.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
                , "de18a28.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de18a28.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de18a28.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de18a28.id,0) AS id")
            ->selectRaw("IFNULL(de18a28.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de18a28.imc,(caracterizacion.peso/(caracterizacion.talla*caracterizacion.talla))) AS imc")
            ->selectRaw("IFNULL(de18a28.pcintura,'') AS pcintura")
            ->selectRaw("IFNULL(de18a28.pb,'') AS pb")
            ->selectRaw("IFNULL(de18a28.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de18a28.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de18a28.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de18a28.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de18a28.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de18a28.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de18a28.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de18a28.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de18a28.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de18a28.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de18a28.spa,'') AS spa")
            ->selectRaw("IFNULL(de18a28.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de18a28.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de18a28.religion,'') AS religion")
            ->selectRaw("IFNULL(de18a28.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de18a28.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de18a28.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de18a28.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de18a28.papiloma,'') AS papiloma");

        $de18a282 = DB::connection('mysql')->table($alias . '.de18a28')
            ->join($alias . '.integrantes', 'integrantes.id', 'de18a28.id_integrante')
            ->where('de18a28.id_hogar', $id_hogar)
            ->where('de18a28.estado', 'Activo')
            ->where('de18a28.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de18a28.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de18a28.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de18a28.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de18a28.id,0) AS id")
            ->selectRaw("IFNULL(de18a28.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de18a28.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de18a28.pcintura,'') AS pcintura")
            ->selectRaw("IFNULL(de18a28.pb,'') AS pb")
            ->selectRaw("IFNULL(de18a28.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de18a28.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de18a28.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de18a28.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de18a28.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de18a28.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de18a28.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de18a28.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de18a28.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de18a28.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de18a28.spa,'') AS spa")
            ->selectRaw("IFNULL(de18a28.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de18a28.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de18a28.religion,'') AS religion")
            ->selectRaw("IFNULL(de18a28.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de18a28.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de18a28.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de18a28.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de18a28.papiloma,'') AS papiloma");

        return $de18a281->unionAll($de18a282)->get();

    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de18a28')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarPorIdentificacion($alias, $dentificacion)
    {
        $de18a281 = DB::connection('mysql')->table($alias . '.de18a28')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de18a28.id_integrante')
            ->where('de18a28.identificacion', $dentificacion)
            ->where('de18a28.estado', 'Activo')
            ->where('de18a28.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
                , "de18a28.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de18a28.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de18a28.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de18a28.id,0) AS id")
            ->selectRaw("IFNULL(de18a28.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de18a28.imc,(caracterizacion.peso/(caracterizacion.talla*caracterizacion.talla))) AS imc")
            ->selectRaw("IFNULL(de18a28.pcintura,'') AS pcintura")
            ->selectRaw("IFNULL(de18a28.pb,'') AS pb")
            ->selectRaw("IFNULL(de18a28.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de18a28.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de18a28.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de18a28.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de18a28.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de18a28.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de18a28.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de18a28.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de18a28.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de18a28.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de18a28.spa,'') AS spa")
            ->selectRaw("IFNULL(de18a28.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de18a28.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de18a28.religion,'') AS religion")
            ->selectRaw("IFNULL(de18a28.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de18a28.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de18a28.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de18a28.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de18a28.papiloma,'') AS papiloma");


        $de18a282 = DB::connection('mysql')->table($alias . '.de18a28')
            ->join($alias . '.integrantes', 'integrantes.id', 'de18a28.id_integrante')
            ->where('de18a28.identificacion', $dentificacion)
            ->where('de18a28.estado', 'Activo')
            ->where('de18a28.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de18a28.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de18a28.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de18a28.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de18a28.id,0) AS id")
            ->selectRaw("IFNULL(de18a28.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de18a28.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de18a28.pcintura,'') AS pcintura")
            ->selectRaw("IFNULL(de18a28.pb,'') AS pb")
            ->selectRaw("IFNULL(de18a28.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de18a28.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de18a28.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de18a28.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de18a28.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de18a28.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de18a28.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de18a28.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de18a28.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de18a28.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de18a28.spa,'') AS spa")
            ->selectRaw("IFNULL(de18a28.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de18a28.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de18a28.religion,'') AS religion")
            ->selectRaw("IFNULL(de18a28.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de18a28.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de18a28.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de18a28.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de18a28.papiloma,'') AS papiloma");


        return $de18a281->unionAll($de18a282)->first();    

    }
}
