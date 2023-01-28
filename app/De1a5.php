<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De1a5 extends Model
{
    protected $table = 'de1a5';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'beneficiario', 'cyc', 'valoracion_1823', 'valoracion_3035',
        'valoracion_4', 'peso', 'talla', 'imc', 'pb', 'pt',
        'te', 'lenguaje', 'motora', 'conducta', 'visuales', 'auditivos',
        'caries', 'nocepillado', 'consultaodon', 'carnet', 'bcg', 'polio',
        'dpt', 'fiebrea', 'tripleviral', 'otras', 'desparacitado', 'maltrato',
        'enfermedad', 'medicamento', 'estado', 'id_compania', 'opci', 'pentavalente', 'pcefalico', 'desviacion_imc', 'varicela', 'neumococo'
    ];

    public static function guardar($data, $alias)
    {
        // BUSCAR ID INTEGRANTE
        $integrante = \App\Integrante::buscar($data['identificacion'], $alias);
        // dd($integrante);die;
        // BUSCAR ID INTEGRANTE
        return DB::connection('mysql')->table($alias . '.de1a5')->updateOrInsert([
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
            'beneficiario' => $data['beneficiario'],
            'cyc' => $data['cyc'],
            'valoracion_1823' => $data['valoracion_1823'],
            'valoracion_3035' => $data['valoracion_3035'],
            'valoracion_4' => $data['valoracion_4'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pb' => $data['pb'],
            'pt' => $data['pt'],
            'te' => $data['te'],
            'lenguaje' => $data['lenguaje'],
            'motora' => $data['motora'],
            'conducta' => $data['conducta'],
            'visuales' => $data['visuales'],
            'auditivos' => $data['auditivos'],
            'caries' => $data['caries'],
            'nocepillado' => $data['nocepillado'],
            'consultaodon' => $data['consultaodon'],
            'carnet' => $data['carnet'],
            'bcg' => $data['bcg'],
            'polio' => $data['polio'],
            'dpt' => $data['dpt'],
            'fiebrea' => $data['fiebrea'],
            'tripleviral' => $data['tripleviral'],
            'pentavalente' => $data['pentavalente'],
            'otras' => $data['otras'],
            'desparacitado' => $data['desparacitado'],
            'maltrato' => $data['maltrato'],
            'enfermedad' => $data['enfermedad'],
            'medicamento' => $data['medicamento'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'pcefalico' => $data['pcefalico'],
            'desviacion_imc' => $data['desviacion_imc'],
            'varicela' => $data['varicela'],
            'neumococo' => $data['neumococo'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {

        $de1a5 = DB::connection('mysql')->table($alias . '.de1a5')
            ->join($alias . '.integrantes', 'integrantes.id', 'de1a5.id_integrante')
            ->where('de1a5.id_hogar', $id_hogar)
            ->where('de1a5.estado', 'Activo')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de1a5.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("IFNULL(de1a5.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de1a5.id_compania,'1') AS id_compania")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de1a5.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de1a5.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de1a5.id,0) AS id")
            ->selectRaw("IFNULL(de1a5.beneficiario,'') AS beneficiario")
            ->selectRaw("IFNULL(de1a5.cyc,'') AS cyc")
            ->selectRaw("IFNULL(de1a5.valoracion_1823,'') AS valoracion_1823")
            ->selectRaw("IFNULL(de1a5.valoracion_3035,'') AS valoracion_3035")
            ->selectRaw("IFNULL(de1a5.valoracion_4,'') AS valoracion_4")
            ->selectRaw("IFNULL(de1a5.pb,'') AS pb")
            ->selectRaw("IFNULL(de1a5.pt,'') AS pt")
            ->selectRaw("IFNULL(de1a5.te,'') AS te")
            ->selectRaw("IFNULL(de1a5.lenguaje,'') AS lenguaje")
            ->selectRaw("IFNULL(de1a5.motora,'') AS motora")
            ->selectRaw("IFNULL(de1a5.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de1a5.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de1a5.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de1a5.caries,'') AS caries")
            ->selectRaw("IFNULL(de1a5.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de1a5.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de1a5.carnet,'') AS carnet")
            ->selectRaw("IFNULL(de1a5.bcg,'') AS bcg")
            ->selectRaw("IFNULL(de1a5.polio,'') AS polio")
            ->selectRaw("IFNULL(de1a5.dpt,'') AS dpt")
            ->selectRaw("IFNULL(de1a5.fiebrea,'') AS fiebrea")
            ->selectRaw("IFNULL(de1a5.tripleviral,'') AS tripleviral")
            ->selectRaw("IFNULL(de1a5.otras,'') AS otras")
            ->selectRaw("IFNULL(de1a5.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de1a5.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de1a5.enfermedad,'') AS enfermedad")
            ->selectRaw("IFNULL(de1a5.medicamento,'') AS medicamento")
            ->selectRaw("IFNULL(de1a5.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de1a5.pentavalente,'') AS pentavalente")
            ->selectRaw("IFNULL(de1a5.pcefalico,'') AS pcefalico")
            ->selectRaw("IFNULL(de1a5.varicela,'') AS varicela")
            ->selectRaw("IFNULL(de1a5.neumococo,'') AS neumococo");

        return $de1a5->get();

    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de1a5')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarPorIdentificacion($alias, $dentificacion)
    {
        $de1a5 = DB::connection('mysql')->table($alias . '.de1a5')
            ->join($alias . '.integrantes', 'integrantes.id', 'de1a5.id_integrante')
            ->where('integrantes.identificacion', $dentificacion)
            ->where('de1a5.estado', 'Activo')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de1a5.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("IFNULL(de1a5.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de1a5.id_compania,'1') AS id_compania")
            ->selectRaw("YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1) AS edadCal")
            ->selectRaw("IFNULL(de1a5.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de1a5.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de1a5.id,0) AS id")
            ->selectRaw("IFNULL(de1a5.beneficiario,'') AS beneficiario")
            ->selectRaw("IFNULL(de1a5.cyc,'') AS cyc")
            ->selectRaw("IFNULL(de1a5.valoracion_1823,'') AS valoracion_1823")
            ->selectRaw("IFNULL(de1a5.valoracion_3035,'') AS valoracion_3035")
            ->selectRaw("IFNULL(de1a5.valoracion_4,'') AS valoracion_4")
            ->selectRaw("IFNULL(de1a5.pb,'') AS pb")
            ->selectRaw("IFNULL(de1a5.pt,'') AS pt")
            ->selectRaw("IFNULL(de1a5.te,'') AS te")
            ->selectRaw("IFNULL(de1a5.lenguaje,'') AS lenguaje")
            ->selectRaw("IFNULL(de1a5.motora,'') AS motora")
            ->selectRaw("IFNULL(de1a5.conducta,'') AS conducta")
            ->selectRaw("IFNULL(de1a5.visuales,'') AS visuales")
            ->selectRaw("IFNULL(de1a5.auditivos,'') AS auditivos")
            ->selectRaw("IFNULL(de1a5.caries,'') AS caries")
            ->selectRaw("IFNULL(de1a5.nocepillado,'') AS nocepillado")
            ->selectRaw("IFNULL(de1a5.consultaodon,'') AS consultaodon")
            ->selectRaw("IFNULL(de1a5.carnet,'') AS carnet")
            ->selectRaw("IFNULL(de1a5.bcg,'') AS bcg")
            ->selectRaw("IFNULL(de1a5.polio,'') AS polio")
            ->selectRaw("IFNULL(de1a5.dpt,'') AS dpt")
            ->selectRaw("IFNULL(de1a5.fiebrea,'') AS fiebrea")
            ->selectRaw("IFNULL(de1a5.tripleviral,'') AS tripleviral")
            ->selectRaw("IFNULL(de1a5.otras,'') AS otras")
            ->selectRaw("IFNULL(de1a5.desparacitado,'') AS desparacitado")
            ->selectRaw("IFNULL(de1a5.maltrato,'') AS maltrato")
            ->selectRaw("IFNULL(de1a5.enfermedad,'') AS enfermedad")
            ->selectRaw("IFNULL(de1a5.medicamento,'') AS medicamento")
            ->selectRaw("IFNULL(de1a5.opci,'INTE') AS opci")
            ->selectRaw("IFNULL(de1a5.pentavalente,'') AS pentavalente")
            ->selectRaw("IFNULL(de1a5.pcefalico,'') AS pcefalico")
            ->selectRaw("IFNULL(de1a5.varicela,'') AS varicela")
            ->selectRaw("IFNULL(de1a5.neumococo,'') AS neumococo");

            return $de1a5->first();       
    }
}
