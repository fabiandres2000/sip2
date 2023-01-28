<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De12a17 extends Model
{
    protected $table = 'de12a17';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'peso', 'talla', 'imc', 'te',
        'visuales', 'auditivos', 'conducta', 'enfermedades_cronicas', 'dientes_sanos', 'consultaodon',
        'nocepillado', 'maltrato', 'alcohol', 'fuma', 'spa', 'desparacitado',
        'empleo', 'religion', 'queesvih', 'queescancerutero', 'queespapiloma',
        'queescancerseno', 'padre', 'madre', 'hermanos', 'conyuge', 'estado', 'id_compania', 'opci', 'desviacion_imc', 'papiloma'
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

        return DB::connection('mysql')->table($alias . '.de12a17')->updateOrInsert([
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
            'te' => $data['te'],
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
            'queescancerseno' => $data['queescancerseno'],
            'padre' => $data['padre'],
            'madre' => $data['madre'],
            'hermanos' => $data['hermanos'],
            'conyuge' => $data['conyuge'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'desviacion_imc' => $data['desviacion_imc'],
            'papiloma' => $data['papiloma'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {
        $de12a171 = DB::connection('mysql')->table($alias . '.de12a17')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de12a17.id_integrante')
            ->where('de12a17.id_hogar', $id_hogar)
            ->where('de12a17.estado', 'Activo')
            ->where('de12a17.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
                , "de12a17.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de12a17.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de12a17.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de12a17.id,0) AS id")
            ->selectRaw("IFNULL(de12a17.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de12a17.imc,(caracterizacion.peso/(caracterizacion.talla*caracterizacion.talla))) AS imc")
            ->selectRaw("IFNULL(de12a17.te,'') AS te")
            ->selectRaw("IFNULL(de12a17.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de12a17.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de12a17.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de12a17.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de12a17.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de12a17.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de12a17.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de12a17.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de12a17.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de12a17.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de12a17.spa,'') AS spa")
            ->selectRaw("IFNULL(de12a17.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de12a17.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de12a17.religion,'') AS religion")
            ->selectRaw("IFNULL(de12a17.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de12a17.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de12a17.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de12a17.queescancerseno,'') AS queescancerseno")
            ->selectRaw("IFNULL(de12a17.padre,'') AS padre")
            ->selectRaw("IFNULL(de12a17.madre,'') AS madre")
            ->selectRaw("IFNULL(de12a17.hermanos,'') AS hermanos")
            ->selectRaw("IFNULL(de12a17.conyuge,'') AS conyuge")
            ->selectRaw("IFNULL(de12a17.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de12a17.papiloma,'') AS papiloma");

        $de12a172 = DB::connection('mysql')->table($alias . '.de12a17')
            ->join($alias . '.integrantes', 'integrantes.id', 'de12a17.id_integrante')
            ->where('de12a17.id_hogar', $id_hogar)
            ->where('de12a17.estado', 'Activo')
            ->where('de12a17.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de12a17.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de12a17.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de12a17.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de12a17.id,0) AS id")
            ->selectRaw("IFNULL(de12a17.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de12a17.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de12a17.te,'') AS te")
            ->selectRaw("IFNULL(de12a17.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de12a17.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de12a17.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de12a17.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de12a17.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de12a17.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de12a17.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de12a17.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de12a17.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de12a17.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de12a17.spa,'') AS spa")
            ->selectRaw("IFNULL(de12a17.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de12a17.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de12a17.religion,'') AS religion")
            ->selectRaw("IFNULL(de12a17.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de12a17.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de12a17.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de12a17.queescancerseno,'') AS queescancerseno")
            ->selectRaw("IFNULL(de12a17.padre,'') AS padre")
            ->selectRaw("IFNULL(de12a17.madre,'') AS madre")
            ->selectRaw("IFNULL(de12a17.hermanos,'') AS hermanos")
            ->selectRaw("IFNULL(de12a17.conyuge,'') AS conyuge")
            ->selectRaw("IFNULL(de12a17.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de12a17.papiloma,'') AS papiloma");

        return $de12a171->unionAll($de12a172)->get();

    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de12a17')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarPorIdentificacion($alias, $dentificacion)
    {
        $de12a171 = DB::connection('mysql')->table($alias . '.de12a17')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de12a17.id_integrante')
            ->where('de12a17.identificacion', $dentificacion)
            ->where('de12a17.estado', 'Activo')
            ->where('de12a17.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
                , "de12a17.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de12a17.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de12a17.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de12a17.id,0) AS id")
            ->selectRaw("IFNULL(de12a17.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de12a17.imc,(caracterizacion.peso/(caracterizacion.talla*caracterizacion.talla))) AS imc")
            ->selectRaw("IFNULL(de12a17.te,'') AS te")
            ->selectRaw("IFNULL(de12a17.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de12a17.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de12a17.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de12a17.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de12a17.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de12a17.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de12a17.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de12a17.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de12a17.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de12a17.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de12a17.spa,'') AS spa")
            ->selectRaw("IFNULL(de12a17.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de12a17.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de12a17.religion,'') AS religion")
            ->selectRaw("IFNULL(de12a17.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de12a17.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de12a17.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de12a17.queescancerseno,'') AS queescancerseno")
            ->selectRaw("IFNULL(de12a17.padre,'') AS padre")
            ->selectRaw("IFNULL(de12a17.madre,'') AS madre")
            ->selectRaw("IFNULL(de12a17.hermanos,'') AS hermanos")
            ->selectRaw("IFNULL(de12a17.conyuge,'') AS conyuge")
            ->selectRaw("IFNULL(de12a17.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de12a17.papiloma,'') AS papiloma");

        $de12a172 = DB::connection('mysql')->table($alias . '.de12a17')
            ->join($alias . '.integrantes', 'integrantes.id', 'de12a17.id_integrante')
            ->where('de12a17.identificacion', $dentificacion)
            ->where('de12a17.estado', 'Activo')
            ->where('de12a17.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de12a17.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de12a17.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de12a17.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de12a17.id,0) AS id")
            ->selectRaw("IFNULL(de12a17.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de12a17.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de12a17.te,'') AS te")
            ->selectRaw("IFNULL(de12a17.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de12a17.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de12a17.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de12a17.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de12a17.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de12a17.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de12a17.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de12a17.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de12a17.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de12a17.fuma,'') AS fuma")
            ->selectRaw("IFNULL(de12a17.spa,'') AS spa")
            ->selectRaw("IFNULL(de12a17.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de12a17.empleo,'') AS empleo")
            ->selectRaw("IFNULL(de12a17.religion,'') AS religion")
            ->selectRaw("IFNULL(de12a17.queesvih,'') AS queesvih")
            ->selectRaw("IFNULL(de12a17.queescancerutero,'') AS queescancerutero")
            ->selectRaw("IFNULL(de12a17.queespapiloma,'') AS queespapiloma")
            ->selectRaw("IFNULL(de12a17.queescancerseno,'') AS queescancerseno")
            ->selectRaw("IFNULL(de12a17.padre,'') AS padre")
            ->selectRaw("IFNULL(de12a17.madre,'') AS madre")
            ->selectRaw("IFNULL(de12a17.hermanos,'') AS hermanos")
            ->selectRaw("IFNULL(de12a17.conyuge,'') AS conyuge")
            ->selectRaw("IFNULL(de12a17.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de12a17.papiloma,'') AS papiloma");

        return $de12a171->unionAll($de12a172)->first();

    }    
}
