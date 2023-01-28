<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class De60 extends Model
{
    protected $table = 'de60';
    protected $fillable = [
        'id_integrante', 'id_hogar', 'tipo_id', 'identificacion', 'pnom', 'snom', 'pape',
        'sape', 'sexo', 'edad', 'grupo_ayudas', 'peso', 'talla', 'imc', 'pa', 'glicemia',
        'cigarrillo', 'alcohol', 'actividad_fisica', 'sintomatico', 'examen_seno', 'citologia',
        'colposcopia', 'examen_prostata', 'biposia_prostata', 'agudeza_visual', 'subsidio', 'enfermedades_cronicas',
        'enfermedades_infecciosas', 'estado', 'id_compania', 'opci', 'empleo',
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

        return DB::connection('mysql')->table($alias . '.de60')->updateOrInsert([
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
            'grupo_ayudas' => $data['grupo_ayudas'],
            'peso' => $data['peso'],
            'talla' => $data['talla'],
            'imc' => $data['imc'],
            'pa' => $data['pa'],
            'glicemia' => $data['glicemia'],
            'cigarrillo' => $data['cigarrillo'],
            'alcohol' => $data['alcohol'],
            'actividad_fisica' => $data['actividad_fisica'],
            'sintomatico' => $data['sintomatico'],
            'examen_seno' => $data['examen_seno'],
            'citologia' => $data['citologia'],
            'colposcopia' => $data['colposcopia'],
            'examen_prostata' => $data['examen_prostata'],
            'biposia_prostata' => $data['biposia_prostata'],
            'agudeza_visual' => $data['agudeza_visual'],
            'subsidio' => $data['subsidio'],
            'enfermedades_cronicas' => $data['enfermedades_cronicas'],
            'enfermedades_infecciosas' => $data['enfermedades_infecciosas'],
            'estado' => $data['estado'],
            'id_compania' => 1,
            'opci' => $data['opci'],
            'empleo' => $data['empleo'],
        ]);
    }

    public static function buscar($alias, $id_hogar)
    {

        $de601 = DB::connection('mysql')->table($alias . '.de60')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de60.id_integrante')
            ->where('de60.id_hogar', $id_hogar)
            ->where('de60.estado', 'Activo')
            ->where('de60.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
                , "de60.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("IFNULL(de60.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de60.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de60.id,0) AS id")
            ->selectRaw("IFNULL(de60.grupo_ayudas,'') AS grupo_ayudas")
            ->selectRaw("IFNULL(de60.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de60.imc,(caracterizacion.peso/(caracterizacion.talla*caracterizacion.talla))) AS imc")
            ->selectRaw("IFNULL(de60.pa,'') AS pa")
            ->selectRaw("IFNULL(de60.glicemia,'') AS glicemia")
            ->selectRaw("IFNULL(de60.cigarrillo,'') AS cigarrillo")
            ->selectRaw("IFNULL(de60.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de60.actividad_fisica,'') AS actividad_fisica")
            ->selectRaw("IFNULL(de60.sintomatico,'') AS sintomatico")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de60.examen_seno,''),IFNULL(de60.examen_seno,'NA')) AS examen_seno")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de60.citologia,''),IFNULL(de60.citologia,'NA')) AS citologia")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de60.colposcopia,''),IFNULL(de60.colposcopia,'NA')) AS colposcopia")
            ->selectRaw("if(caracterizacion.sexo='MASCULINO',IFNULL(de60.examen_prostata,''),IFNULL(de60.examen_prostata,'NA')) AS examen_prostata")
            ->selectRaw("if(caracterizacion.sexo='MASCULINO',IFNULL(de60.biposia_prostata,''),IFNULL(de60.biposia_prostata,'NA')) AS biposia_prostata")
            ->selectRaw("IFNULL(de60.agudeza_visual,'') AS agudeza_visual")
            ->selectRaw("IFNULL(de60.subsidio,'') AS subsidio")
            ->selectRaw("IFNULL(de60.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de60.enfermedades_infecciosas,'') AS enfermedades_infecciosas")
            ->selectRaw("IFNULL(de60.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de60.empleo,'') AS empleo");

        $de602 = DB::connection('mysql')->table($alias . '.de60')
            ->join($alias . '.integrantes', 'integrantes.id', 'de60.id_integrante')
            ->where('de60.id_hogar', $id_hogar)
            ->where('de60.estado', 'Activo')
            ->where('de60.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de60.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("IFNULL(de60.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de60.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de60.id,0) AS id")
            ->selectRaw("IFNULL(de60.grupo_ayudas,'') AS grupo_ayudas")
            ->selectRaw("IFNULL(de60.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de60.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de60.pa,'') AS pa")
            ->selectRaw("IFNULL(de60.glicemia,'') AS glicemia")
            ->selectRaw("IFNULL(de60.cigarrillo,'') AS cigarrillo")
            ->selectRaw("IFNULL(de60.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de60.actividad_fisica,'') AS actividad_fisica")
            ->selectRaw("IFNULL(de60.sintomatico,'') AS sintomatico")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de60.examen_seno,''),IFNULL(de60.examen_seno,'NA')) AS examen_seno")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de60.citologia,''),IFNULL(de60.citologia,'NA')) AS citologia")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de60.colposcopia,''),IFNULL(de60.colposcopia,'NA')) AS colposcopia")
            ->selectRaw("if(integrantes.sexo='MASCULINO',IFNULL(de60.examen_prostata,''),IFNULL(de60.examen_prostata,'NA')) AS examen_prostata")
            ->selectRaw("if(integrantes.sexo='MASCULINO',IFNULL(de60.biposia_prostata,''),IFNULL(de60.biposia_prostata,'NA')) AS biposia_prostata")
            ->selectRaw("IFNULL(de60.agudeza_visual,'') AS agudeza_visual")
            ->selectRaw("IFNULL(de60.subsidio,'') AS subsidio")
            ->selectRaw("IFNULL(de60.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de60.enfermedades_infecciosas,'') AS enfermedades_infecciosas")
            ->selectRaw("IFNULL(de60.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de60.empleo,'') AS empleo");

        return $de601->unionAll($de602)->get();

    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.de60')->where('id_hogar', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscarPorIdentificacion($alias, $dentificacion)
    {

        $de601 = DB::connection('mysql')->table($alias . '.de60')
            ->join($alias . '.caracterizacion', 'caracterizacion.id', 'de60.id_integrante')
            ->where('caracterizacion.identificacion', $dentificacion)
            ->where('caracterizacion.estado', 'Activo')
            ->where('de60.opci', 'JEFE')
            ->select("caracterizacion.identificacion AS identificacion"
                , "caracterizacion.tipo_id AS tipo_id"
                , "caracterizacion.pnom AS pnom"
                , "caracterizacion.pape AS pape"
                , "caracterizacion.sexo AS sexo"
                , "caracterizacion.peso AS peso"
                , "caracterizacion.talla AS talla"
                , "de60.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(caracterizacion.snom,'') AS snom")
            ->selectRaw("IFNULL(caracterizacion.sape,'') AS sape")
            ->selectRaw("IFNULL(de60.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de60.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de60.id,0) AS id")
            ->selectRaw("IFNULL(de60.grupo_ayudas,'') AS grupo_ayudas")
            ->selectRaw("IFNULL(de60.edad,YEAR(CURDATE())-YEAR(caracterizacion.fecha_nacimiento) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(caracterizacion.fecha_nacimiento,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de60.imc,(caracterizacion.peso/(caracterizacion.talla*caracterizacion.talla))) AS imc")
            ->selectRaw("IFNULL(de60.pa,'') AS pa")
            ->selectRaw("IFNULL(de60.glicemia,'') AS glicemia")
            ->selectRaw("IFNULL(de60.cigarrillo,'') AS cigarrillo")
            ->selectRaw("IFNULL(de60.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de60.actividad_fisica,'') AS actividad_fisica")
            ->selectRaw("IFNULL(de60.sintomatico,'') AS sintomatico")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de60.examen_seno,''),IFNULL(de60.examen_seno,'NA')) AS examen_seno")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de60.citologia,''),IFNULL(de60.citologia,'NA')) AS citologia")
            ->selectRaw("if(caracterizacion.sexo='FEMENINO',IFNULL(de60.colposcopia,''),IFNULL(de60.colposcopia,'NA')) AS colposcopia")
            ->selectRaw("if(caracterizacion.sexo='MASCULINO',IFNULL(de60.examen_prostata,''),IFNULL(de60.examen_prostata,'NA')) AS examen_prostata")
            ->selectRaw("if(caracterizacion.sexo='MASCULINO',IFNULL(de60.biposia_prostata,''),IFNULL(de60.biposia_prostata,'NA')) AS biposia_prostata")
            ->selectRaw("IFNULL(de60.agudeza_visual,'') AS agudeza_visual")
            ->selectRaw("IFNULL(de60.subsidio,'') AS subsidio")
            ->selectRaw("IFNULL(de60.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de60.enfermedades_infecciosas,'') AS enfermedades_infecciosas")
            ->selectRaw("IFNULL(de60.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de60.empleo,'') AS empleo");

        $de602 = DB::connection('mysql')->table($alias . '.de60')
            ->join($alias . '.integrantes', 'integrantes.id', 'de60.id_integrante')
            ->where('integrantes.identificacion', $dentificacion)
            ->where('integrantes.estado', 'Activo')
            ->where('de60.opci', 'INTE')
            ->select("integrantes.identificacion AS identificacion"
                , "integrantes.tipo_id AS tipo_id"
                , "integrantes.pnom AS pnom"
                , "integrantes.pape AS pape"
                , "integrantes.sexo AS sexo"
                , "integrantes.peso AS peso"
                , "integrantes.talla AS talla"
                , "de60.id_integrante AS id_integrante"
            )
            ->selectRaw("IFNULL(integrantes.snom,'') AS snom")
            ->selectRaw("IFNULL(integrantes.sape,'') AS sape")
            ->selectRaw("IFNULL(de60.estado,'Activo') AS estado")
            ->selectRaw("IFNULL(de60.id_compania,'1') AS id_compania")

            ->selectRaw("IFNULL(de60.id,0) AS id")
            ->selectRaw("IFNULL(de60.grupo_ayudas,'') AS grupo_ayudas")
            ->selectRaw("IFNULL(de60.edad,YEAR(CURDATE())-YEAR(integrantes.fecha_nac) +  IF(DATE_FORMAT(CURDATE(),'%m-%d')>DATE_FORMAT(integrantes.fecha_nac,'%m-%d'),0,-1)) AS edad")
            ->selectRaw("IFNULL(de60.imc,(integrantes.peso/(integrantes.talla*integrantes.talla))) AS imc")
            ->selectRaw("IFNULL(de60.pa,'') AS pa")
            ->selectRaw("IFNULL(de60.glicemia,'') AS glicemia")
            ->selectRaw("IFNULL(de60.cigarrillo,'') AS cigarrillo")
            ->selectRaw("IFNULL(de60.alcohol,'') AS alcohol")
            ->selectRaw("IFNULL(de60.actividad_fisica,'') AS actividad_fisica")
            ->selectRaw("IFNULL(de60.sintomatico,'') AS sintomatico")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de60.examen_seno,''),IFNULL(de60.examen_seno,'NA')) AS examen_seno")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de60.citologia,''),IFNULL(de60.citologia,'NA')) AS citologia")
            ->selectRaw("if(integrantes.sexo='FEMENINO',IFNULL(de60.colposcopia,''),IFNULL(de60.colposcopia,'NA')) AS colposcopia")
            ->selectRaw("if(integrantes.sexo='MASCULINO',IFNULL(de60.examen_prostata,''),IFNULL(de60.examen_prostata,'NA')) AS examen_prostata")
            ->selectRaw("if(integrantes.sexo='MASCULINO',IFNULL(de60.biposia_prostata,''),IFNULL(de60.biposia_prostata,'NA')) AS biposia_prostata")
            ->selectRaw("IFNULL(de60.agudeza_visual,'') AS agudeza_visual")
            ->selectRaw("IFNULL(de60.subsidio,'') AS subsidio")
            ->selectRaw("IFNULL(de60.enfermedades_cronicas,'') AS enfermedades_cronicas")
            ->selectRaw("IFNULL(de60.enfermedades_infecciosas,'') AS enfermedades_infecciosas")
            ->selectRaw("IFNULL(de60.opci,'JEFE') AS opci")
            ->selectRaw("IFNULL(de60.empleo,'') AS empleo");

        return $de601->unionAll($de602)->first();

    }    
}
