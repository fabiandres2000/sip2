<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class UnidadesProductivas extends Model
{
    protected $table = 'unidades_productivas';
    protected $fillable = [
        'id_hogar', 'nom_productor', 'nivel_educativo', 'tipo_id', 'identificacion',
        'nom_finca', 'hogares_finca', 'linea_productiva', 'area_total_finca', 'distancia_finca',
        'tenencia_propiedad', 'atiende_entrevista', 'credito_produccion', 'fuentes_prestamo', 'cual_fuente',
        'vias_acceso', 'tipos_vias_acceso', 'fecha', 'usuario_crear', 'fecha_editar',
        'usuario_editar', 'estado', 'id_compania', 'id_dpto', 'id_mun',
        'id_corre', 'id_vereda', 'id_barrio', 'direccion', 'unidad_area',
        'unidad_distancia',
    ];
    protected $casts = [
        'linea_productiva',
    ];

    public static function guardar($data, $alias)
    {
        // dd($data)->die();
        return DB::connection('mysql')->table($alias . '.unidades_productivas')->insertGetId([

            'id_hogar' => $data['id_hogar'],
            'nom_productor' => $data['nom_productor'],
            'nivel_educativo' => $data['nivel_educativo'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $data['identificacion'],
            'nom_finca' => $data['nom_finca'],
            'hogares_finca' => $data['hogares_finca'],
            'linea_productiva' => json_encode($data['linea_productiva']),
            'area_total_finca' => $data['area_total_finca'],
            'distancia_finca' => $data['distancia_finca'],

            'tenencia_propiedad' => $data['tenencia_propiedad'],
            'atiende_entrevista' => $data['atiende_entrevista'],
            'credito_produccion' => $data['credito_produccion'],
            'fuentes_prestamo' => $data['fuentes_prestamo'],
            'cual_fuente' => $data['cual_fuente'],
            'vias_acceso' => $data['vias_acceso'],
            'tipos_vias_acceso' => $data['tipos_vias_acceso'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'fecha' => date('Y-m-d'),

            'usuario_crear' => Auth::user()->id,
            'fecha_editar' => '',
            'usuario_editar' => '',
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'unidad_area' => $data['unidad_area'],

            'unidad_distancia' => $data['unidad_distancia'],
        ]);
    }

    public static function modificar($data, $alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')->where('id', $id)->update([

            'id_hogar' => $data['id_hogar'],
            'nom_productor' => $data['nom_productor'],
            'nivel_educativo' => $data['nivel_educativo'],
            'tipo_id' => $data['tipo_id'],
            'identificacion' => $data['identificacion'],
            'nom_finca' => $data['nom_finca'],
            'hogares_finca' => $data['hogares_finca'],
            'linea_productiva' => json_encode($data['linea_productiva']),
            'area_total_finca' => $data['area_total_finca'],

            'distancia_finca' => $data['distancia_finca'],
            'tenencia_propiedad' => $data['tenencia_propiedad'],
            'atiende_entrevista' => $data['atiende_entrevista'],
            'credito_produccion' => $data['credito_produccion'],
            'fuentes_prestamo' => $data['fuentes_prestamo'],
            'cual_fuente' => $data['cual_fuente'],
            'vias_acceso' => $data['vias_acceso'],
            'tipos_vias_acceso' => $data['tipos_vias_acceso'],
            'id_compania' => 1,
            'estado' => $data['estado'],

            'fecha_editar' => date('Y-m-d'),
            'usuario_editar' => Auth::user()->id,
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'unidad_area' => $data['unidad_area'],
            'unidad_distancia' => $data['unidad_distancia'],
        ]);
    }

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {

            if (Auth::user()->rol == "Administrador" || Auth::user()->rol == "SuperAdministrador") {
                $respuesta = DB::connection('mysql')->table($alias . '.unidades_productivas')
                    ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
                    ->where(function ($query) use ($busqueda) {
                        $query->where('unidades_productivas.nom_productor', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('unidades_productivas.identificacion', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('unidades_productivas.nom_finca', 'LIKE', '%' . $busqueda . '%');
                    })
                    ->where("unidades_productivas.estado", "Activo")
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "unidades_productivas.estado AS ESTADO",
                        "unidades_productivas.nom_finca",
                        "unidades_productivas.id",
                        "unidades_productivas.identificacion",
                        "unidades_productivas.nom_productor",
                        "unidades_productivas.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('unidades_productivas.id', 'DESC')
                    ->paginate(10);
            } else {
                $respuesta = DB::connection('mysql')->table($alias . '.unidades_productivas')
                    ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
                    ->where(function ($query) use ($busqueda) {
                        $query->where('unidades_productivas.nom_productor', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('unidades_productivas.identificacion', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('unidades_productivas.nom_finca', 'LIKE', '%' . $busqueda . '%');
                    })
                    ->where("unidades_productivas.estado", "Activo")
                    ->where("unidades_productivas.usuario_crear", Auth::user()->id)
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "unidades_productivas.estado AS ESTADO",
                        "unidades_productivas.nom_finca",
                        "unidades_productivas.id",
                        "unidades_productivas.identificacion",
                        "unidades_productivas.nom_productor",
                        "unidades_productivas.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('unidades_productivas.id', 'DESC')
                    ->paginate(10);
            }

        } else {
            if (Auth::user()->rol == "Administrador" || Auth::user()->rol == "SuperAdministrador") {
                $respuesta = DB::connection('mysql')->table($alias . '.unidades_productivas')
                    ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
                    ->where("unidades_productivas.estado", "Activo")
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "unidades_productivas.estado AS ESTADO",
                        "unidades_productivas.nom_finca",
                        "unidades_productivas.id",
                        "unidades_productivas.identificacion",
                        "unidades_productivas.nom_productor",
                        "unidades_productivas.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('unidades_productivas.id', 'DESC')
                    ->paginate(10);
            } else {
                $respuesta = DB::connection('mysql')->table($alias . '.unidades_productivas')
                    ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
                    ->where("unidades_productivas.estado", "Activo")
                    ->where("unidades_productivas.usuario_crear", Auth::user()->id)
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "unidades_productivas.estado AS ESTADO",
                        "unidades_productivas.nom_finca",
                        "unidades_productivas.id",
                        "unidades_productivas.identificacion",
                        "unidades_productivas.nom_productor",
                        "unidades_productivas.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('unidades_productivas.id', 'DESC')
                    ->paginate(10);
            }

        }

        return $respuesta;
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscar($alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.unidades_productivas')
            ->select("unidades_productivas.*")
            ->where('unidades_productivas.id', $id)
            ->where('unidades_productivas.estado', 'Activo')
            ->first();
    }

    public static function exportarUnidades($alias){
        return DB::connection('mysql')->table($alias . '.unidades_productivas')
        ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
        })
        ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
        ->where("unidades_productivas.estado", "Activo")
        ->select("dptos.descripcion AS DPTO",
            "muni.descripcion AS MUNI",
            "corregimientos.descripcion AS CORREGIMIENTO",
            "unidades_productivas.estado AS ESTADO",
            "unidades_productivas.nom_finca",
            "unidades_productivas.id",
            "unidades_productivas.identificacion",
            "unidades_productivas.nom_productor",
            "unidades_productivas.id_hogar AS IDHOGAR"
        )
        ->orderBy('unidades_productivas.id', 'DESC')
        ->get();
    }

    public static function exportarUnidad($alias, $id){
        $auma = ["Kilómetro cuadrado.","Metro cuadrado.","Milla cuadrada.","Yarda cuadrada.","Pie cuadrado.","Pulgada cuadrada.","Hectárea.","Acre."];
        $aumdf = ["Kilómetros.","Metros."];
        $atp = ["Arrendamiento.","Propio.","Aparecería.","Comodato.","Usufructo.","Propietario sin título.","Propietarios con Titulo.","Anticresis.","Tenedor.","Adjudicaría o común.","Empeño.","Ocupación de hecho.","Posesión.","Propiedad Colectiva."];
        $aae = ["Pariente.","Productor.","Trabajador."];
        $afp = ["Bancos","Entidades Estatales","Familiares","Agremiaciones","Prestamistas","Empresas de insumos","Otra","No Aplica"];
        $ava = ["Pavimentadas.","No pavimentadas.","Fluviales.","Aéreas."];
        $producto = ["Cereales", "Leguminosas","Oleaginosas","Hortalizas","Frutales","Raíces y tubérculos","Ornamentales","Cultivos para bebidas medicinales y aromáticas","Otros cultivos tradicionles"];
        $especie1 =  ["Maíz","Trigo","Arroz","Cebada","Centeno","Alpiste","Sorgo","Mijo","Avena","Trigo Espelta","Trigo kamut"];
        $especie2 =  ["Frijoles rojo","Frijol negro","Frijol cabecita negra","Frijol","Arvejas","Habas","Lenteja","Garbanzo","Gandul","Alfalfa","Almorta"];
        $especie3 =  ["Soya","Canola","Girasol","Olivo","Maíz","Ajonjolí","Palma de aceite"];
        $especie4 =  ["Acelga","Ajo","Albahaca","Apio","Alcachofa","Berenjena","Brócoli","Calabacín","Calabaza","Cebolla","Col","Coliflor","Espinacas","Pepino","Perejil","Pimiento","Puerro","Rábano","Remolacha","Tomate","Zanahoria","Auyama"];
        $especie5 =  ["Plátano","Cana","coco","Aguacate","Naranja","Mango","Limón","Banano","Mandarina","Sandia","Papaya","Marañón","Guanábana","Guayaba","Piña","Lulo","Maracuyá","Granadilla","Curuba","Níspero","Borojó","Zapote","Carambola","Tomate de árbol", "Melón","Nueces"];
        $especie6 =  ["Arracacha","Papa amarilla","Batata","Yuca","Papa criolla","Ñame","Papa sabanera","Papa","Jengibre","Malanga","Yacón","Otro"];
        $especie7 = ["Ornamentales de exteriores","Ornamentales de Interiores","Otros floricultivos","Rosas","Girasoles","Crisantemo","Tulipan","Clavel","Gerbera","Gladiolo","Acroclinio","Aster","Caléndula"];
        $especie8 =  ["Lavanda","Aloe vera","Romero","Manzanilla","Menta","Calendula","Diente de leon","Albahaca","Algarrobo","Boldo","Acacia","Toronjil","Paja limón","Cidrón","Achiote","Arnica","Canela","Tomillo","Otro"];
        $especie9 =  ["Caña de azucar","Tabaco","Pasto","Café","Cacao"];
        $abeneficios =  ["Económico","En especies","Capacitación","Recreación y deporte","Reconocimiento de la comunidad","Participación en la toma de decisiones","NA"];
        $umm = ["Meses","Bimestres","Trimestres","Semestres","Años"];
        $aup = ["kilogramos","Toneladas","Unidades"];
        $araza = ["Ganado vacuno o bovino" ,"Ganado ovino" ,"Ganado porcino" ,"Ganado caprino" ,"Ganado equino" ,"Avicultura" ,"Apicultura" ,"Acuicultura" ,"Helicicultura" ,"Cunicultura" ,"Sericicultura" ,"Otros" ];
        $especie_arboles = ["Chiche","Palo Maria","Guayabo Volador","Roble","Caoba","Pino","Cedro","Árbol de Caucho","Álamo","Primavera","Hormiguillo colorado","Palo mulato","Bambú","Eucalipto","Canela","Neem","Ciprés","Paulownia","Ceiba","Guariuba","Figueira","Pashaco","Chicalá","Nogal","Abarco","Palo rosa","Campanos","Melina","Igua","Caracolí","Chanul","Dinde"];
        
        $unidad = DB::connection('mysql')->table($alias . '.unidades_productivas')
        ->join($alias . '.dptos', 'dptos.codigo', 'unidades_productivas.id_dpto')
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'unidades_productivas.id_mun');
        })
        ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'unidades_productivas.id_corre')
        ->where("unidades_productivas.id", $id)
        ->select("dptos.descripcion AS DPTO",
            "muni.descripcion AS MUNI",
            "corregimientos.descripcion AS CORREGIMIENTO",
            "unidades_productivas.*",
        )
        ->orderBy('unidades_productivas.id', 'DESC')
        ->first();

        $unidad->herramientas = DB::connection('mysql')->table($alias . '.herramientas')
        ->where("herramientas.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        $unidad->utensilios = DB::connection('mysql')->table($alias . '.utensilios')
        ->where("utensilios.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        $unidad->maquinaria = DB::connection('mysql')->table($alias . '.maquinaria')
        ->where("maquinaria.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        $unidad->instalaciones = DB::connection('mysql')->table($alias . '.instalaciones')
        ->where("instalaciones.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        $unidad->medios_transporte = DB::connection('mysql')->table($alias . '.medios_transporte')
        ->where("medios_transporte.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        $unidad->cultivos_agricolas = DB::connection('mysql')->table($alias . '.cultivos_agricolas')
        ->where("cultivos_agricolas.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        foreach ($unidad->cultivos_agricolas as &$item) {
            $item->unidad_area_produccion = $auma[(int)$item->unidad_area_produccion - 1];

            switch ($item->producto) {
                case "1":
                    $item->variedad = $especie1[(int)$item->variedad - 1];
                    break;
                case "2":
                    $item->variedad = $especie2[(int)$item->variedad - 1];
                    break;
                case "3":
                    $item->variedad = $especie3[(int)$item->variedad - 1];
                    break;
                case "4":
                    $item->variedad = $especie4[(int)$item->variedad - 1];
                    break;
                case "5":
                    $item->variedad = $especie5[(int)$item->variedad - 1];
                    break;
                case "6":
                    $item->variedad = $especie6[(int)$item->variedad - 1];
                    break;
                case "7":
                    $item->variedad = $especie7[(int)$item->variedad - 1];
                    break;
                case "8":
                    $item->variedad = $especie8[(int)$item->variedad - 1];
                    break;
                case "9":
                    $item->variedad = $especie9[(int)$item->variedad - 1];
                    break;
                default:
                    break;
            }

            $item->producto = $producto[(int)$item->producto - 1];
            if ($item->beneficios != "NA") {
                $item->beneficios = $abeneficios[(int)$item->beneficios - 1];
            } 
            $item->unidad_frecuencia_cosecha = $umm[(int)$item->unidad_frecuencia_cosecha - 1];
            $item->unidad_area_cosecha = $auma[(int)$item->unidad_area_cosecha - 1];
            $item->unidad_producion_destinada = $aup[(int)$item->unidad_producion_destinada - 1];
        }

        $unidad->cultivos_forestales = DB::connection('mysql')->table($alias . '.cultivos_forestales')
        ->where("cultivos_forestales.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        foreach ($unidad->cultivos_forestales as &$item) {
            $item->variedad_forestales = $especie_arboles[(int)$item->variedad_forestales - 1];
            $item->unidad_area_forestales = $auma[(int)$item->unidad_area_forestales - 1];
            $item->unidad_producion_destinada_forestales = $aup[(int)$item->unidad_producion_destinada_forestales - 1];
        }

        $unidad->explotaciones_pecuarias = DB::connection('mysql')->table($alias . '.explotaciones_pecuarias')
        ->where("explotaciones_pecuarias.id_unidad", $unidad->id)
        ->select("*")
        ->get();

        foreach ($unidad->explotaciones_pecuarias as &$item) {
            $item->raza = $araza[(int)$item->raza - 1];
            $item->unidad_producion_destinada_pecuaria = $aup[(int)$item->unidad_producion_destinada_pecuaria - 1];
            $item->unidad_area_destinada = $auma[(int)$item->unidad_area_destinada - 1];
            if ($item->beneficios_pecuaria != "NA") {
                $item->beneficios_pecuaria = $abeneficios[(int)$item->beneficios_pecuaria - 1];
            } 
        }

        $unidad->escolaridad = DB::connection('mysql')->table($alias . '.escolaridad')
        ->where("escolaridad.id", $unidad->nivel_educativo)
        ->select("*")
        ->first();

        $unidad->linea_productiva = json_decode($unidad->linea_productiva, true);

        $unidad->unidad_area = $auma[(int)$unidad->unidad_area - 1];
        $unidad->unidad_distancia = $aumdf[(int)$unidad->unidad_distancia - 1];
        $unidad->tenencia_propiedad = $atp[(int)$unidad->tenencia_propiedad - 1];
        $unidad->atiende_entrevista = $aae[(int)$unidad->atiende_entrevista - 1];
        $unidad->fuentes_prestamo = $afp[(int)$unidad->fuentes_prestamo - 1];
        $unidad->tipos_vias_acceso = $ava[(int)$unidad->tipos_vias_acceso - 1];
        return $unidad;
    }
}
