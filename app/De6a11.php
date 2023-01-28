<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De6a11 extends Model
{
    protected $table = 'de6a11';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'cyc', 'atencion', 'peso', 'talla',
        'imc', 'pb', 'pt', 'te', 'conducta', 'visuales',
        'auditivos', 'dientes_sanos', 'consultaodon', 'nofluor', 'nocepillado', 'maltrato',
        'sustanciaspsico', 'desparacitado', 'enfermedad', 'medicamento', 'padre', 'madre',
        'hermanos', 'conyuge', 'estado', 'id_compania', 'opci', 'desviacion_imc', 'papiloma'
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
        // dd($integrante);die;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.de6a11')->updateOrInsert([
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
            'cyc' => $data['cyc'],
            'atencion' => $data['atencion'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pb' => $data['pb'],
            'pt' => $data['pt'],
            'te' => $data['te'],
            'conducta' => $data['conducta'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'dientes_sanos' => $data['dientes_sanos'],
            'consultaodon' => $data['consultaodon'],
            'nofluor' => $data['nofluor'],
            'nocepillado' => $data['nocepillado'],
            'maltrato' => $data['maltrato'],
            'sustanciaspsico' => $data['sustanciaspsico'],
            'desparacitado' => $data['desparacitado'],
            'enfermedad' => $data['enfermedad'],
            'medicamento' => $data['medicamento'],
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

        $de6a11 = DB::connection('mysql')->table($alias . '.de6a11')
            ->join($alias . '.integrantes', 'integrantes.id', 'de6a11.id_integrante')
            ->where('de6a11.id_hogar', $id_hogar)
            ->where('de6a11.estado', 'Activo')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de6a11.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de6a11.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de6a11.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(de6a11.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de6a11.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de6a11.id,0) AS id")
            ->selectRaw("IFNULL(de6a11.cyc,'') AS cyc")
            ->selectRaw("IFNULL(de6a11.atencion,'') AS atencion")
            ->selectRaw("IFNULL(de6a11.pb,'') AS pb")
            ->selectRaw("IFNULL(de6a11.pt,'') AS pt")
            ->selectRaw("IFNULL(de6a11.te,'') AS te")
            ->selectRaw("IFNULL(de6a11.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de6a11.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de6a11.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de6a11.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de6a11.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de6a11.nofluor,'') AS nofluor")
            ->selectRaw("IFNULL(de6a11.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de6a11.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de6a11.sustanciaspsico,'') AS sustanciaspsico")
            ->selectRaw("IFNULL(de6a11.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de6a11.enfermedad,'') AS enfermedad")
            ->selectRaw("IFNULL(de6a11.medicamento,'') AS medicamento")
            ->selectRaw("IFNULL(de6a11.padre,'') AS padre")
            ->selectRaw("IFNULL(de6a11.madre,'') AS madre")
            ->selectRaw("IFNULL(de6a11.hermanos,'') AS hermanos")
            ->selectRaw("IFNULL(de6a11.conyuge,'') AS conyuge")
            ->selectRaw("IFNULL(de6a11.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de6a11.papiloma,'INTE') AS papiloma");
        return $de6a11->get();

    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de6a11')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarPorIdentificacion($alias, $dentificacion)
    {

        $de6a11 = DB::connection('mysql')->table($alias . '.de6a11')
            ->join($alias . '.integrantes', 'integrantes.id', 'de6a11.id_integrante')
            ->where('de6a11.identificacion', $dentificacion)
            ->where('de6a11.estado', 'Activo')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de6a11.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de6a11.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de6a11.id_compania,'1') AS id_compania")
            ->selectRaw("IFNULL(de6a11.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de6a11.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de6a11.id,0) AS id")
            ->selectRaw("IFNULL(de6a11.cyc,'') AS cyc")
            ->selectRaw("IFNULL(de6a11.atencion,'') AS atencion")
            ->selectRaw("IFNULL(de6a11.pb,'') AS pb")
            ->selectRaw("IFNULL(de6a11.pt,'') AS pt")
            ->selectRaw("IFNULL(de6a11.te,'') AS te")
            ->selectRaw("IFNULL(de6a11.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de6a11.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de6a11.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de6a11.dientes_sanos,'') AS dientes_sanos")
            ->selectRaw("IFNULL(de6a11.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de6a11.nofluor,'') AS nofluor")
            ->selectRaw("IFNULL(de6a11.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de6a11.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de6a11.sustanciaspsico,'') AS sustanciaspsico")
            ->selectRaw("IFNULL(de6a11.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de6a11.enfermedad,'') AS enfermedad")
            ->selectRaw("IFNULL(de6a11.medicamento,'') AS medicamento")
            ->selectRaw("IFNULL(de6a11.padre,'') AS padre")
            ->selectRaw("IFNULL(de6a11.madre,'') AS madre")
            ->selectRaw("IFNULL(de6a11.hermanos,'') AS hermanos")
            ->selectRaw("IFNULL(de6a11.conyuge,'') AS conyuge")
            ->selectRaw("IFNULL(de6a11.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de6a11.papiloma,'INTE') AS papiloma");
        return $de6a11->first();

    }    
}
