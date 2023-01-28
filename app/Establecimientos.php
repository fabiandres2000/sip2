<?php

namespace App;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Establecimientos extends Model
{
    protected $table = 'establecimientos';
    protected $fillable = [
        'id_hogar', 'registrado', 'num_matricula', 'naturaleza',
        'otra_naturaleza', 'tipo', 'capital_extranjero', 'permiso', 'otro_permiso', 'anio',
        'num_empleados', 'tiempo_sin_operacion', 'fecha_retorno', 'promedio_ingresos_anterior', 'promedio_ingresos_durante',
        'promedio_ingresos_posterior', 'carga_economica', 'protocolo_bioseguridad', 'tipo_afectacion', 'ayuda',
        'tiempo_recuperacion', 'principal_problema', 'internet', 'estado', 'id_compania',
        'fecha', 'usuario_crear', 'fecha_editar', 'usuario_editar', 'otro_tipo_afectacion',
        'otro_principal_problema', 'nit', 'representante',
        'id_dpto', 'id_mun', 'id_corre', 'id_vereda', 'id_barrio', 'direccion', 'razon', 'tipo_tiempo',
    ];

    public static function listar($busqueda, $alias)
    {
        if (!empty($busqueda)) {
            if (Auth::user()->rol == "Administrador") {
                $respuesta = DB::connection('mysql')->table($alias . '.establecimientos')
                    ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'establecimientos.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
                    ->where(function ($query) use ($busqueda) {
                        $query->where('establecimientos.nit', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('establecimientos.razon', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('establecimientos.representante', 'LIKE', '%' . $busqueda . '%');
                    })
                    ->where("establecimientos.estado", "Activo")
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "establecimientos.estado AS ESTADO",
                        "establecimientos.nit",
                        "establecimientos.id",
                        "establecimientos.representante",
                        "establecimientos.razon",
                        "establecimientos.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('establecimientos.id', 'DESC')
                    ->paginate(10);
            } else {
                $respuesta = DB::connection('mysql')->table($alias . '.establecimientos')
                    ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'establecimientos.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
                    ->where(function ($query) use ($busqueda) {
                        $query->where('establecimientos.nit', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('establecimientos.razon', 'LIKE', '%' . $busqueda . '%')
                            ->orWhere('establecimientos.representante', 'LIKE', '%' . $busqueda . '%');
                    })
                    ->where("establecimientos.estado", "Activo")
                    ->where("establecimientos.usuario_crear", Auth::user()->id)
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "establecimientos.estado AS ESTADO",
                        "establecimientos.nit",
                        "establecimientos.id",
                        "establecimientos.representante",
                        "establecimientos.razon",
                        "establecimientos.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('establecimientos.id', 'DESC')
                    ->paginate(10);
            }
        } else {
            if (Auth::user()->rol == "Administrador") {
                $respuesta = DB::connection('mysql')->table($alias . '.establecimientos')
                    ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'establecimientos.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
                    ->where("establecimientos.estado", "Activo")
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "establecimientos.estado AS ESTADO",
                        "establecimientos.nit",
                        "establecimientos.id",
                        "establecimientos.representante",
                        "establecimientos.razon",
                        "establecimientos.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('establecimientos.id', 'DESC')
                    ->paginate(10);
            } else {
                $respuesta = DB::connection('mysql')->table($alias . '.establecimientos')
                    ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
                    ->join($alias . '.muni', function ($join) {
                        $join->on('muni.coddep', '=', 'dptos.codigo');
                        $join->on('muni.codmun', '=', 'establecimientos.id_mun');
                    })
                    ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
                    ->where("establecimientos.estado", "Activo")
                    ->where("establecimientos.usuario_crear", Auth::user()->id)
                    ->select("dptos.descripcion AS DPTO",
                        "muni.descripcion AS MUNI",
                        "corregimientos.descripcion AS CORREGIMIENTO",
                        "establecimientos.estado AS ESTADO",
                        "establecimientos.nit",
                        "establecimientos.id",
                        "establecimientos.representante",
                        "establecimientos.razon",
                        "establecimientos.id_hogar AS IDHOGAR"
                    )
                    ->orderBy('establecimientos.id', 'DESC')
                    ->paginate(10);
            }
        }

        return $respuesta;
    }

    public static function guardar($data, $alias)
    {

        return DB::connection('mysql')->table($alias . '.establecimientos')->insertGetId([
            'id_hogar' => $data['id_hogar'],
            'registrado' => $data['registrado'],
            'num_matricula' => $data['num_matricula'],
            'naturaleza' => $data['naturaleza'],
            'otra_naturaleza' => $data['otra_naturaleza'],
            'tipo' => $data['tipo'],
            'capital_extranjero' => $data['capital_extranjero'],
            'permiso' => $data['permiso'],
            'otro_permiso' => $data['otro_permiso'],
            'anio' => $data['anio'],
            'num_empleados' => $data['num_empleados'],
            'tiempo_sin_operacion' => $data['tiempo_sin_operacion'],
            'fecha_retorno' => $data['fecha_retorno'],
            'promedio_ingresos_anterior' => $data['promedio_ingresos_anterior'],
            'promedio_ingresos_durante' => $data['promedio_ingresos_durante'],
            'promedio_ingresos_posterior' => $data['promedio_ingresos_posterior'],
            'carga_economica' => $data['carga_economica'],
            'protocolo_bioseguridad' => $data['protocolo_bioseguridad'],
            'tipo_afectacion' => json_encode($data['tipo_afectacion']),
            'ayuda' => $data['ayuda'],
            'tiempo_recuperacion' => $data['tiempo_recuperacion'],
            'principal_problema' => $data['principal_problema'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'internet' => $data['internet'],
            'fecha' => date('Y-m-d'),
            'usuario_crear' => Auth::user()->id,
            'fecha_editar' => '',
            'usuario_editar' => '',
            'otro_tipo_afectacion' => $data['otro_tipo_afectacion'],
            'otro_principal_problema' => $data['otro_principal_problema'],
            'nit' => $data['nit'],
            'representante' => $data['representante'],
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'razon' => $data['razon'],
            'tipo_tiempo' => $data['tipo_tiempo'],
        ]);
    }

    public static function editarestado($estado, $id, $alias)
    {
        return DB::connection('mysql')->table($alias . '.establecimientos')->where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function buscar($alias, $id)
    {
        return DB::connection('mysql')->table($alias . '.establecimientos')
            ->selectRaw("IFNULL(establecimientos.id_hogar,'') AS id_hogar")
            ->selectRaw("IFNULL(establecimientos.registrado,'') AS registrado")
            ->selectRaw("IFNULL(establecimientos.num_matricula,'') AS num_matricula")
            ->selectRaw("IFNULL(establecimientos.naturaleza,'') AS naturaleza")
            ->selectRaw("IFNULL(establecimientos.otra_naturaleza,'') AS otra_naturaleza")
            ->selectRaw("IFNULL(establecimientos.tipo,'') AS tipo")
            ->selectRaw("IFNULL(establecimientos.capital_extranjero,'') AS capital_extranjero")
            ->selectRaw("IFNULL(establecimientos.permiso,'') AS permiso")
            ->selectRaw("IFNULL(establecimientos.otro_permiso,'') AS otro_permiso")
            ->selectRaw("IFNULL(establecimientos.anio,'') AS anio")
            ->selectRaw("IFNULL(establecimientos.num_empleados,'') AS num_empleados")
            ->selectRaw("IFNULL(establecimientos.tiempo_sin_operacion,'') AS tiempo_sin_operacion")
            ->selectRaw("IFNULL(establecimientos.fecha_retorno,'') AS fecha_retorno")
            ->selectRaw("IFNULL(establecimientos.promedio_ingresos_anterior,'') AS promedio_ingresos_anterior")
            ->selectRaw("IFNULL(establecimientos.promedio_ingresos_durante,'') AS promedio_ingresos_durante")
            ->selectRaw("IFNULL(establecimientos.promedio_ingresos_posterior,'') AS promedio_ingresos_posterior")
            ->selectRaw("IFNULL(establecimientos.carga_economica,'') AS carga_economica")
            ->selectRaw("IFNULL(establecimientos.protocolo_bioseguridad,'') AS protocolo_bioseguridad")
            ->selectRaw("IFNULL(establecimientos.tipo_afectacion,'') AS tipo_afectacion")
            ->selectRaw("IFNULL(establecimientos.ayuda,'') AS ayuda")
            ->selectRaw("IFNULL(establecimientos.tiempo_recuperacion,'') AS tiempo_recuperacion")
            ->selectRaw("IFNULL(establecimientos.principal_problema,'') AS principal_problema")
            ->selectRaw("IFNULL(establecimientos.internet,'') AS internet")
            ->selectRaw("IFNULL(establecimientos.estado,'') AS estado")
            ->selectRaw("IFNULL(establecimientos.id_compania,'') AS id_compania")
            ->selectRaw("IFNULL(establecimientos.fecha,'') AS fecha")
            ->selectRaw("IFNULL(establecimientos.usuario_crear,'') AS usuario_crear")
            ->selectRaw("IFNULL(establecimientos.fecha_editar,'') AS fecha_editar")
            ->selectRaw("IFNULL(establecimientos.usuario_editar,'') AS usuario_editar")
            ->selectRaw("IFNULL(establecimientos.otro_tipo_afectacion,'') AS otro_tipo_afectacion")
            ->selectRaw("IFNULL(establecimientos.otro_principal_problema,'') AS otro_principal_problema")
            ->selectRaw("IFNULL(establecimientos.nit,'') AS nit")
            ->selectRaw("IFNULL(establecimientos.representante,'') AS representante")
            ->selectRaw("IFNULL(establecimientos.id_dpto,'') AS id_dpto")
            ->selectRaw("IFNULL(establecimientos.id_mun,'') AS id_mun")
            ->selectRaw("IFNULL(establecimientos.id_corre,'') AS id_corre")
            ->selectRaw("IFNULL(establecimientos.id_vereda,'') AS id_vereda")
            ->selectRaw("IFNULL(establecimientos.id_barrio,'') AS id_barrio")
            ->selectRaw("IFNULL(establecimientos.direccion,'') AS direccion")
            ->selectRaw("IFNULL(establecimientos.razon,'') AS razon")
            ->selectRaw("IFNULL(establecimientos.tipo_tiempo,'') AS tipo_tiempo")
            ->where('establecimientos.id', $id)
            ->where('establecimientos.estado', 'Activo')
            ->first();
    }

    public static function modificar($data, $alias, $id)
    {
        // dd($data);die;
        return DB::connection('mysql')->table($alias . '.establecimientos')->where('id', $id)->update([
            'id_hogar' => $data['id_hogar'],
            'registrado' => $data['registrado'],
            'num_matricula' => $data['num_matricula'],
            'naturaleza' => $data['naturaleza'],
            'otra_naturaleza' => $data['otra_naturaleza'],
            'tipo' => $data['tipo'],
            'capital_extranjero' => $data['capital_extranjero'],
            'permiso' => $data['permiso'],
            'otro_permiso' => $data['otro_permiso'],
            'anio' => $data['anio'],
            'num_empleados' => $data['num_empleados'],
            'tiempo_sin_operacion' => $data['tiempo_sin_operacion'],
            'fecha_retorno' => $data['fecha_retorno'],
            'promedio_ingresos_anterior' => $data['promedio_ingresos_anterior'],
            'promedio_ingresos_durante' => $data['promedio_ingresos_durante'],
            'promedio_ingresos_posterior' => $data['promedio_ingresos_posterior'],
            'carga_economica' => $data['carga_economica'],
            'protocolo_bioseguridad' => $data['protocolo_bioseguridad'],
            'tipo_afectacion' => json_encode($data['tipo_afectacion']),
            'ayuda' => $data['ayuda'],
            'tiempo_recuperacion' => $data['tiempo_recuperacion'],
            'principal_problema' => $data['principal_problema'],
            'id_compania' => 1,
            'estado' => $data['estado'],
            'internet' => $data['internet'],
            'fecha_editar' => date('Y-m-d'),
            'usuario_editar' => Auth::user()->id,
            'otro_tipo_afectacion' => $data['otro_tipo_afectacion'],
            'otro_principal_problema' => $data['otro_principal_problema'],
            'nit' => $data['nit'],
            'representante' => $data['representante'],
            'id_dpto' => $data['id_dpto'],
            'id_mun' => $data['id_mun'],
            'id_corre' => $data['id_corre'],
            'id_vereda' => $data['id_vereda'],
            'id_barrio' => $data['id_barrio'],
            'direccion' => $data['direccion'],
            'razon' => $data['razon'],
            'tipo_tiempo' => $data['tipo_tiempo'],

        ]);
    }

    public static function listar2($alias)
    {
        return DB::connection('mysql')->table($alias . '.establecimientos')
        ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'establecimientos.id_mun');
        })
        ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
        ->where("establecimientos.estado", "Activo")
        ->select("dptos.descripcion AS DPTO",
            "muni.descripcion AS MUNI",
            "corregimientos.descripcion AS CORREGIMIENTO",
            "establecimientos.estado AS ESTADO",
            "establecimientos.nit",
            "establecimientos.id",
            "establecimientos.representante",
            "establecimientos.razon",
            "establecimientos.registrado",
            "establecimientos.direccion",
        )
        ->orderBy('establecimientos.id', 'DESC')
        ->get();
    }

    public static function buscar2($alias, $id)
    {
        $array_n = ["Persona Natural","Sociedad Anónima S.A.","Sociedad por acciones simplificadas. S.A.S","Sociedad Limitada LTDA.","Cooperativa","No registra","Otra"];
        $array_t = ["Tienda de Ropa", "Almacen", "Centros de Belleza", "Restaurantes", "Talleres mecánicos", "Café Internet", "Comidas Rapidas", "Panaderia/ pasteliría", "Ferretería", "Miscelania", "Papelería  y Librerías", "Cafetería", "Frutería", "Venta de loterías o juegos de azar", "Carnicería", "Asaderos", "Lavaderos de Vehículos", "Licorería", "Parqueaderos", "Colegios o centros de estudios", "Consultorios medicos", "Consultorios Juridicos", "Micelania y Cacharrerias", "Agencias de Viajes", "Discotecas y Bares", "Estaciones de servicios", "Hoteles", "Joyerias", "Puesto de Mercado", "Sex Shop", "Supermercados", "Otras Tienda especializada", "Otros Establecimiento de servicios"];
        $array_p = ["Franquicia","Concesión","Patente","Ninguna","Otro"];
        $array_ce = ["Pago de Nóminas.","Pago a proveedores.","Arrendamiento y servicios públicos."];
        $array_tr = ["En los próximos de 6 meses.","Antes de los 6 meses.","No se ha estimado.","No hay afectación."];
        $array_pp = ["Inseguridad.","Falta de servicios públicos.","Vías de acceso.","Falta de Alumbrado Público.","Otro."];

        $establecimiento = DB::connection('mysql')->table($alias . '.establecimientos')
        ->join($alias . '.dptos', 'dptos.codigo', 'establecimientos.id_dpto')
        ->leftjoin($alias . '.barrios', 'barrios.id', 'establecimientos.id_barrio')
        ->join($alias . '.muni', function ($join) {
            $join->on('muni.coddep', '=', 'dptos.codigo');
            $join->on('muni.codmun', '=', 'establecimientos.id_mun');
        })
        ->leftjoin($alias . '.corregimientos', 'corregimientos.id', 'establecimientos.id_corre')
        ->where("establecimientos.estado", "Activo")
        ->select("establecimientos.id",
            "dptos.descripcion AS DPTO",
            "muni.descripcion AS MUNI",
            "corregimientos.descripcion AS CORREGIMIENTO",
            "barrios.barrio AS BARRIO",
            "establecimientos.razon",
            "establecimientos.direccion",
            "establecimientos.registrado",
            "establecimientos.num_matricula",
            "establecimientos.naturaleza",
            "establecimientos.nit",
            "establecimientos.representante",
            "establecimientos.tipo",
            "establecimientos.capital_extranjero",
            "establecimientos.permiso",
            "establecimientos.anio",
            "establecimientos.num_empleados",
            "establecimientos.tiempo_sin_operacion",
            "establecimientos.tipo_tiempo",
            "establecimientos.fecha_retorno",
            "establecimientos.promedio_ingresos_anterior",
            "establecimientos.promedio_ingresos_durante",
            "establecimientos.promedio_ingresos_posterior",
            "establecimientos.carga_economica",
            "establecimientos.protocolo_bioseguridad",
            "establecimientos.tipo_afectacion",
            "establecimientos.ayuda",
            "establecimientos.internet",
            "establecimientos.tiempo_recuperacion",
            "establecimientos.principal_problema",
        )
        ->where('establecimientos.id', $id)
        ->orderBy('establecimientos.id', 'DESC')
        ->first();

        $establecimiento->afectaciones = json_decode($establecimiento->tipo_afectacion, true);
        $establecimiento->actividades_economicas = DB::connection('mysql')->table($alias . '.actividad_establecimientos')
        ->join($alias . '.actividades_economicas', 'actividades_economicas.id', 'actividad_establecimientos.id_actividad')
        ->where('actividad_establecimientos.id_establecimiento', $establecimiento->id)
        ->select("actividades_economicas.*",)
        ->get();
        $establecimiento->naturaleza = $array_n[(int)$establecimiento->naturaleza-1];
        $establecimiento->tipo = $array_t[(int)$establecimiento->tipo-1];
        $establecimiento->permiso = $array_p[(int)$establecimiento->permiso-1];
        $establecimiento->carga_economica = $array_ce[(int)$establecimiento->carga_economica-1];
        $establecimiento->tiempo_recuperacion = $array_tr[(int)$establecimiento->tiempo_recuperacion-1];
        $establecimiento->principal_problema = $array_pp[(int)$establecimiento->principal_problema-1];
        
        return $establecimiento;
    }
}
